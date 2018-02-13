<?php
defined('BASEPATH') OR exit('No direct script access allowed');
    class Message extends CI_Controller{
        public function __construct()
        {
            parent::__construct();
            $this->load->model('msg_model');
        }
        public function do_send(){   //留言
            $msgcon=$this->input->post('content');
            $writerId=$this->input->post('writerId');  
            if(!$writerId){
                $writerId = $_SESSION['bid'];
            }       
            date_default_timezone_set('PRC');
            $date=date('Y-m-d H:i:s',time());
            $msg=$this->msg_model->sendmsg($writerId,$msgcon,$date);
            if($msg){
               echo"<script>alert('留言成功');</script>";  
               //echo 在当前页面弹出，但是已经跳转了  一直没跳转！！
               redirect("message/sendMsg/$writerId"); 
            }
               
        }

        public function leaveMsg(){  //显示当前用户所有留言
            $msg=$this->msg_model->showMsg();
            $data['msg']=$msg;
            $this->load->view('inbox.php',$data);
        }
        public function sendMsg(){  //跳转到留言页面
            $writerId=$this->uri->segment(3);
            $data['writer']=$writerId;
            $this->load->view('sendMsg.php',$data); 
            //异步的ajax提示留言成功，输入框内内容清空
        }

    }