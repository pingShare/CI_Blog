<?php
	class User_model extends  CI_Model{
		public function get_login($uname,$pass){
			$arr=array(
				'ACCOUNT'=>$uname,
				'PASSWORD'=>$pass,
			);
			
			$query=$this->db->get_where('t_users',$arr);
			return $query->row();
		}
		public function set_reg($account,$pass,$name,$gender){
            $arr=array(
                'ACCOUNT'=>$account,
                'PASSWORD'=>$pass,
                'NAME'=>$name,
                'GENDER'=>$gender,
              /*  'PROVINCE'=>$province,
                'CITY'=>$city*/
            );
            echo $arr;
            $query=$this->db->insert('t_users', $arr);
            return $query;
        }
        public function getNamebyId($userid){
            $arr=array(
				'USER_ID'=>$userid,
			);		
			$query=$this->db->get_where('t_users',$arr);
			return $query->row();
        }


        //vue用的登录注册
        public function checkUser(name,pwd){
            $select = "select * from t_users where USER_NAME='name' and PASSWORD='pwd'";
            $query=$this->db->query($select);
            return $query;
        }
	}

?>