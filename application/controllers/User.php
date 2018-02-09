<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class User extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
//            $this->load->helper('cookie');
            $this->load->helper('captcha');
            $this->load->library('session');
            $this->load->model('user_model');
        }

        public function index(){

        }
        public function login(){
            $this->load->view('login.php');
        }
        public function do_login(){
            $uname=$this->input->post('email');
            $pass=$this->input->post('pwd');

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
            redirect('blog/index');
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

    }







