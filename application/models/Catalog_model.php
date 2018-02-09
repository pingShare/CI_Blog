<?php
    class Catalog_model extends  CI_Model
    {
      /*  public function get_cata(){

        }*/

        public function select_cata($userid)
        {
            $this->db->where('USER_ID', $userid);
            $query = $this->db->get('t_blog_catalogs');
            return $query->result();
        }
        public function addcata($name,$userid,$sort_order){
            $data = array(
                'NAME'=>$name,
                'USER_ID'=>$userid,
                'SORT_ORDER'=>$sort_order
            );
            $query = $this->db->insert('t_blog_catalogs', $data);
            return $query;
        }
    }