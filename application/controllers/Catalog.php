<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Catalog extends CI_Controller{
        public function __construct()
        {
            parent::__construct();
            $this->load->model('catalog_model');
        }
        public function blogCatalogs(){
            $userid = $this->session->userdata('bid');
            $re=$this->catalog_model->select_cata($userid);
            $data['kind']=$re;
            $this->load->view('blogCatalogs.php',$data);
        }
        public function addBlogCatalog(){
            $name=$this->input->post('name');
            $userid = $this->session->userdata('bid');
            $sort_order =$this->input->post('sort_order');
            $query=$this->catalog_model->addcata($name,$userid,$sort_order);
            if ($query){
                echo '<script>alert("添加成功")</script>';
            }
            $re=$this->catalog_model->select_cata($userid);
            $data['kind']=$re;
            $this->load->view('blogCatalogs.php',$data);
        }

    }