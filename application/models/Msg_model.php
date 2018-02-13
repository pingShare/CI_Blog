<?php
    class Msg_model extends CI_Controller{
    public function sendmsg($writerId,$msgcon,$date){
        //bb登录了给aa留言  SENDER=$_SESSION['bid']  RECEIVER?
         /* 访客身份SENDER=$_SESSION['bid']  给  
            在所有人的文章页面和我自己文章列表 留言 是自己给自己留
            文章详情页是 当前登录访客给文章writer(id->name)留
        */
        //index显示所有人的文章，blog_id选择receiver
        $data = array(
            'RECEIVER' => $writerId,
            'SENDER' => $_SESSION['bid'],
            'CONTENT' => $msgcon,
            'ADD_TIME'=>$date
        );
        
        $msg=$this->db->insert('t_messages', $data);
        return $msg;
    }

    public function showMsg(){  //显示当前用户收到的所有留言
        $bid=$_SESSION['bid'];
        $sql="select * from t_messages,t_users where RECEIVER='$bid' and t_messages.SENDER=t_users.USER_ID";
        $query = $this->db->query($sql);
        return $query->result();
    }
}