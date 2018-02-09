<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Comment extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('comt_model');

    }
    public function blogComments(){
        $comts=$this->comt_model->get_comt();
        $data['mycom']=$comts;
        $this->load->view('blogComments.php',$data);
        //评论
    }
    public function pub_cmt(){  //文章详情页的发布评论
        $blogid=$this->uri->segment(3);
        $cmt_con=$this->input->post('content');
        date_default_timezone_set('PRC');
        $date=date('Y-m-d H:i:s',time());
        $pub=$this->comt_model->new_cmt($blogid,$cmt_con,$date);
        if($pub)     //异步的ajax？
            redirect("blog/read_issue/$blogid");
        else echo 345;
    }
}