<?php
    class Comt_model extends CI_Model{
        public function issue_cmt($issue_id){//这篇文章的评论
            $where="t_blogs.BLOG_ID=t_comments.BLOG_ID and t_blogs.BLOG_ID='$issue_id' and t_users.USER_ID=t_comments.COMMENTATOR";
            $this->db->where($where);
            $cmt=$this->db->get("t_blogs,t_comments,t_users");
            return $cmt->result();
        }
        public function get_comt(){  //当前用户收到的所有评论
//            select * from t_blogs,t_comments where t_blogs.BLOG_ID=t_comments.BLOG_ID and t_blogs.WRITER='$_SESSION['bid']'
            $sess_id = $_SESSION['bid'];
//            if ($sess_id){
                $where="t_blogs.BLOG_ID=t_comments.BLOG_ID and t_users.USER_ID=t_comments.COMMENTATOR and t_blogs.WRITER='$sess_id'";
//            }else{
//                $where="t_blogs.BLOG_ID=t_comments.BLOG_ID and t_users.USER_ID=t_comments.COMMENTATOR";
//            }
            $this->db->where($where);
//            $this->db->order_by('CMT_TIME', 'DESC');
            $mycomt=$this->db->get('t_blogs,t_comments,t_users');
            return $mycomt->result();
        }
        public function get_all_cmts(){
            $where="t_blogs.BLOG_ID=t_comments.BLOG_ID and t_users.USER_ID=t_comments.COMMENTATOR";
            $this->db->where($where);
            $comt=$this->db->get('t_blogs,t_comments,t_users');
            return $comt->result();
        }

        public function new_cmt($blogid,$cmt_con,$date){
            $sess_id = $_SESSION['bid'];
            $data = array(
             //   'title' => 'My title',
                'COMMENTATOR'=>$sess_id,
                'BLOG_ID'=>$blogid,
                'CMT_CONTENT'=>$cmt_con,
                'CMT_TIME'=>$date
            );
            $pub=$this->db->insert('t_comments', $data);
           return $pub;
        }

    }