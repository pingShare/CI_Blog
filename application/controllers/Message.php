<?php
defined('BASEPATH') OR exit('No direct script access allowed');
    class Message extends CI_Controller{
        public function __construct()
        {
            parent::__construct();
            $this->load->model('msg_model');
        }
        public function do_send(){
            $msgcon=$this->input->post('content');
            $this->msg_model->sendmsg($msgcon);
            redirect('message/sendMsg');
            
        }

        public function leaveMsg(){
            $this->load->view('inbox.php');
        }
        public function sendMsg(){
            $this->load->view('sendMsg.php');  
            //异步的ajax提示留言成功，输入框内内容清空
        }

    }