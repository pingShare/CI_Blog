<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Blog extends CI_Controller{
    public function __construct(){
        parent::__construct();
//        $this->load->helper('cookie');
        $this->load->library('session');
        $this->load->model('blog_model');
        $this->load->model('catalog_model');
        $this->load->model('comt_model');
        $this->load->model('user_model');   
    }
    public function index(){
        $userid = $this->session->userdata('bid');
        $myblogs=$this->blog_model->get_all();
        $data['all']=$myblogs;
        $comts=$this->comt_model->get_all_cmts();
        $data['com']=$comts;
        if (!$userid ){
            $this->load->view('index_unlogin.php',$data);  //未登录 all
        }else{ //session存在，跳转到登陆后的首页
            $re=$this->catalog_model->select_cata($userid);
            $data['kind']=$re;
            $this->load->view('index_logined.php',$data);
        }
    }
    public function my_index(){
        $userid = $this->session->userdata('bid');
        $myblogs=$this->blog_model->get_myblog($userid);
        $comts=$this->comt_model->get_comt();
        $data['com']=$comts;
        $data['all']=$myblogs;
        $re=$this->catalog_model->select_cata($userid);
        $data['kind']=$re;
        $this->load->view('my_index.php',$data);
    }
   /*  public function detail(){             
        $issue_id=$this->uri->segment(3);
        $this->blog_model->get_detail($issue_id);
    } */
    public function read_issue(){  //由博客列表点击查看文章详情
        $issue_id=$this->uri->segment(3);
        $issueinfo=$this->blog_model->get_detail($issue_id);
        $cmt=$this->comt_model->issue_cmt($issue_id);
      // var_dump($issueinfo);die();
       $data['cmt']=$cmt;
        $data['issue']=$issueinfo;
        $this->load->view('viewPost_logined.php',$data);
    }
    public function issue(){
        $this->load->view('issue.php');
    }
    public function delete(){
        $blog_id=$this->uri->segment(3);
        $query=$this->blog_model->delete($blog_id);
        if ($query)
            redirect('blog/my_index');
    }
    public function edit_blog(){
        $blog_id=$this->uri->segment(3);
        $arr=$this->blog_model->get_blog($blog_id);
        $data['blog']=$arr;
        $this->load->view('updateBlog.php',$data);   //将内容存到发表页面
    }
    public function edit_update(){    //修改文章
        $blog_id=$this->uri->segment(3);
        $title=$this->input->post('title');
        $catalog=$this->input->post('catalog');
        $content=$this->input->post('content');
        $type =$this->input->post('type');
        date_default_timezone_set('PRC');
        $date=date('Y-m-d H:i:s',time());
        $update=$this->blog_model->edit_up($blog_id,$title,$catalog,$date,$content,$type);
//       var_dump($update);die();
        if ($update){
            redirect('blog/my_index');
        }
    }

    public function pub_blog(){
        $userid = $this->session->userdata('bid');
        $re=$this->catalog_model->select_cata($userid);
        $data['kind']=$re;
        $this->load->view('newBlog.php',$data);
    }
    public function new_blog(){  //新文章
        $title=$this->input->post('title');
        $catalog=$this->input->post('catalog');
        $content=$this->input->post('content');
        $type =$this->input->post('type');
        $writer = $this->session->userdata('bid');
        date_default_timezone_set('PRC');
        $date=date('Y-m-d H:i:s',time());
        $insert=$this->blog_model->newblog($title,$catalog,$date,$content,$type,$writer);
        if($insert){
            redirect('blog/index');  //跳到主页
        }
    }


    public function unlogin(){
        unset(       //删除
            $_SESSION['bid'],
            $_SESSION['name']
        );
        $myblogs=$this->blog_model->get_all();
        $data['all']=$myblogs;
        $comts=$this->comt_model->get_all_cmts();
        $data['com']=$comts;
//        var_dump($data['com']);die();

        $this->load->view('index_unlogin.php',$data);

//       session_destroy();   //销毁

         /*  $ex= isset($_SESSION['bid']);
           if ($ex) echo 'cunzai';*/
    }
    public function viewPost_login(){
        $this->load->view('viewPost_logined.php');
    }

    public function his_index(){   //跳转到他的博客列表
        $userid = $this->uri->segment(3);
        $myblogs=$this->blog_model->get_myblog($userid);
        $comts=$this->comt_model->get_comt();
        $user=$this->user_model->getNamebyId($userid);
        $data['user']=$user;
        $data['com']=$comts;
        $data['all']=$myblogs;
        $re=$this->catalog_model->select_cata($userid);
        $data['kind']=$re;
        $this->load->view('his_index.php',$data);
    }
}


?>