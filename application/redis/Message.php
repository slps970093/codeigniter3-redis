<?php
/**
 * Created by PhpStorm.
 * User: Yu-Hsien Chou
 * Date: 2019/2/5
 * Time: 下午 04:53
 */

namespace redis;

use Predis\Client;
class Message
{

    private $redisClient;

    const message = 'messages';
    public function __construct( $config = null )
    {
        if( is_array($config) ){
            $this->redisClient = new Client($config);
        }else{
            $this->redisClient = new Client();
        }

    }


    public function setCacheByPrimary( int $primaryKey, array $content){
        $this->redisClient->hmset(self::message.":".$primaryKey,$content);
    }


    public function getCacheByPrimary( int $primaryKey ){
        return $this->redisClient->hgetall(self::message.":".$primaryKey);
    }

    public function removeCache(int $primaryKey){
        $this->redisClient->hdel(self::message.":".$primaryKey);
    }


}