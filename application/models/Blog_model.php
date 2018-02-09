<?php
    class Blog_model extends  CI_Model{
        public function get_detail($issue_id){
           /*  $this->db->where("t_blogs.BLOG_ID='$issue_id' and t_blogs.CATALOG_ID=t_blog_catalogs.CATALOG_ID
                    and t_blogs.BLOG_ID=t_comments.BLOG_ID"); */
                    $this->db->where("t_blogs.BLOG_ID='$issue_id' and t_blogs.CATALOG_ID=t_blog_catalogs.CATALOG_ID");
                    
            $issueinfo=$this->db->get("t_blogs,t_blog_catalogs");
            return $issueinfo->row();
        }
        public function get_all(){       //查到所有数据库所有文章
            $this->db->order_by('BLOG_ID', 'DESC');
            $this->db->where("t_blogs.CATALOG_ID=t_blog_catalogs.CATALOG_ID");
            $allinfo=$this->db->get("t_blogs,t_blog_catalogs");
            return $allinfo->result();
        }
        public function get_myblog($userid){
            $this->db->order_by('BLOG_ID', 'DESC');
//            if ($_SESSION['bid']){
              
// 查分类           $where="t_blogs.CATALOG_ID=t_blog_catalogs.CATALOG_ID and t_users.USER_ID=t_blogs.WRITER and t_blog_catalogs.USER_ID='$sess_id'";
                $where="t_blogs.CATALOG_ID=t_blog_catalogs.CATALOG_ID and t_users.USER_ID=t_blogs.WRITER and t_blogs.WRITER='$userid'";  //查该userid的文章
//            }else{
//                $where="t_blogs.CATALOG_ID=t_blog_catalogs.CATALOG_ID and t_users.USER_ID=t_blogs.WRITER";  //查所有人的文章
//            }
            $this->db->where($where);
            $myblogs=$this->db->get("t_blogs,t_blog_catalogs,t_users");
            return $myblogs->result();
        }
        public function delete($blog_id){
            $query=$this->db->delete('t_blogs', array('BLOG_ID' => $blog_id));
            return $query;
        }
        public function edit_up($blog_id,$title,$catalog,$date,$content,$type){
            $data = array(
                'TITLE' => $title,
                'CATALOG_ID' => $catalog,
                'CONTENT' => $content,
                'IS_YOURS'=> $type,
                'ADD_TIME'=>$date,
            );
            $this->db->where('BLOG_ID', $blog_id);
            $update= $this->db->update('t_blogs', $data);
//            echo 122;die();
            return $update;
        }

        public function newblog($title,$catalog,$date,$content,$type,$writer){
            $data = array(   //发表新文章
                'TITLE' => $title,
                'CATALOG_ID' => $catalog,
                'CONTENT' => $content,
                'IS_YOURS'=> $type,
                'ADD_TIME'=>$date,
                'WRITER'=>$writer
            );
            $insert= $this->db->insert('t_blogs', $data);
            return $insert;
        }

        public function get_blog($blog_id){
//            $this->db->get_where('', array('id' => $id), $limit, $offset);
      $sql="select * from t_blogs,t_blog_catalogs where BLOG_ID='$blog_id' and t_blogs.CATALOG_ID=t_blog_catalogs.CATALOG_ID";
     /*   $arr=array(
                ''
            );*/
        $query=$this->db->query($sql);
        return $query->row();
        }


    }