<?php
/**
 * Created by PhpStorm.
 * User: Yu-Hsien Chou
 * Date: 2019/2/5
 * Time: 下午 12:59
 */

use redis\Message;

class MessageModel extends CI_Model
{

    private $table = 'messages';

    private $messageRedis;

    public function __construct()
    {
        parent::__construct();
        $this->config->load('redis');
        $this->messageRedis = new Message([
            'scheme' => $this->config->item('scheme'),
            'host' => $this->config->item('host'),
            'port' =>  $this->config->item('port'),
        ]);
    }

    public function getData(){
        $query = $this->db->get($this->table);
        return $query->result_array();
    }

    public function append( $data ){
        $data['create_time'] = date('Y-m-d H:i:s');
        $result = $this->db->insert( $this->table,$this->security->xss_clean($data) );
        if( $result ){
            $this->messageRedis->setCacheByPrimary($this->db->insert_id(),self::getWhereByPrimary($this->db->insert_id()));
            return true;
        }
        return false;
    }

    public function updateByPrimary($data,$primaryKey){
        $this->db->where('id' , $primaryKey);
        $result = $this->db->update($this->table,$data);
        if( $result ){
            $this->messageRedis->setCacheByPrimary($primaryKey,self::getWhereByPrimary($primaryKey));
            return true;
        }
        return false;
    }

    public function getWhereByPrimary( $primaryKey ){
        $result = $this->messageRedis->getCacheByPrimary($primaryKey);
        if( count($result) == 0){
            $result = $this->db->get_where( $this->table , array('id' => $primaryKey));
            $this->messageRedis->setCacheByPrimary($primaryKey,$result->row_array());
            return $result->row_array();
        }
        return $result;

    }
    public function delete( $primaryKey ){
        $result = $this->db->delete( $this->table , array('id' => $primaryKey ));
        if( $result ){
            return true;
        }
        return false;
    }
}