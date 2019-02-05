<?php
/**
 * Created by PhpStorm.
 * User: Yu-Hsien Chou
 * Date: 2019/2/5
 * Time: 下午 12:54
 */


class MessageController extends CI_Controller
{
    public function index() {
        $data['result'] = $this->MessageModel->getData();
        $this->load->view('Message/index',$data);
    }

    public function create () {
        $this->form_validation->set_rules('title', 'title', 'required|min_length[3]|max_length[20]');
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('Message/create');
        }else{
            $this->MessageModel->append( $this->input->post() );
            self::redirectToPage(site_url('message')."?status=1");
        }
    }

    public function update ($primaryKey) {
        $this->form_validation->set_rules('title', 'title', 'required|min_length[3]|max_length[20]');
        if ($this->form_validation->run() === FALSE) {
            $data['result'] = $this->MessageModel->getWhereByPrimary($primaryKey);
            $this->load->view('Message/update',$data);
        }else{
            $this->MessageModel->updateByPrimary( $this->input->post(),$primaryKey );
            self::redirectToPage(site_url('message')."?status=1");
        }
    }

    public function content( $primaryKey ){
        $data['result'] = $this->MessageModel->getWhereByPrimary($primaryKey);
        $this->load->view('Message/content',$data);
    }

    public function remove( $primaryKey ){
        $this->MessageModel->delete($primaryKey);
        self::redirectToPage(site_url('message')."?status=1");
    }

    private function redirectToPage( $url ){
        $url ="Location: ". $url ;
        header($url);
    }
}