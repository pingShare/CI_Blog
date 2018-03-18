<?php defined('BASEPATH') OR exit('No direct script access allowed');
// 指定允许其他域名访问    
header('Access-Control-Allow-Origin:*');    
// 响应类型    
header('Access-Control-Allow-Methods:POST');    
// 响应头设置    
header('Access-Control-Allow-Headers:x-requested-with,content-type'); 
	class User extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
//            $this->load->helper('cookie');
            $this->load->helper('captcha');
            $this->load->library('session');
            $this->load->model('user_model');
            $this->load->helper('cookie');
        }

        public function index(){

        }
        public function login(){
            $this->load->view('login.php');
        }
        public function do_login($uname,$pass){
          /*   $uname=$this->input->post('email'); vue暂时注释掉
            $pass=$this->input->post('pwd'); */ 
            $this->load->model('user_model');
            $query=$this->user_model->get_login($uname,$pass);
            /*var_dump($query);
            die();*/
           /*if ($query){
               set_cookie('id',$query->USER_ID);
               set_cookie('name',$query->NAME);
               redirect('blog/index');
           }*/
           $array=array(
               'bid'=>$query->USER_ID,
               'name'=>$query->USER_NAME,
           );
           $this->session->set_userdata($array);
//           var_dump($array);die();
           // redirect('blog/index');  vue中暂时删除，php中要恢复
        }
        public function do_reg(){
            $account=$this->input->post('email');
            $pass=$this->input->post('pwd');
            $name=$this->input->post('name');
            $gender=$this->input->post('gender');
     /*       $province=$this->input->post('province');
            $city=$this->input->post('city');*/

            $query=$this->user_model->set_reg($account,$pass,$name,$gender);
            if($query){
                redirect('user/login');
            }
        }
        public function reg(){
            $this->load->view('reg.php');
        }

        //vue使用的登录
        public function login($uname,$pass){
// 指定允许其他域名访问    
header('Access-Control-Allow-Origin:*');    
// 响应类型    
header('Access-Control-Allow-Methods:POST');    
// 响应头设置    
header('Access-Control-Allow-Headers:x-requested-with,content-type');
            $uname=$_GET['name'];
            $pass=$_GET['pwd'];
            $this->load->model('user_model');
            $query=$this->user_model->checkUser($uname,$pass);
            /* set_cookie("name",$uname);
            set_cookie("pwd",$pass); */
            if($query){
                echo "<script>alert("登录成功")</script>"
            }
        }

    }







