<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="Content-Language" content="zh-CN">
  <title>测试文章2 -  Johnny的博客 - SYSIT个人博客</title>
		<base href="<?php echo site_url()?>">
		<!-- 文章详情页 -->
    <link rel="stylesheet" href="assets/css/space2011.css" type="text/css" media="screen">
  <link rel="stylesheet" type="text/css" href="assets/css/jquery.css" media="screen">
  <script type="text/javascript" src="assets/js/jquery-1.js"></script>
  <script type="text/javascript" src="assets/js/jquery.js"></script>
  <script type="text/javascript" src="assets/js/jquery_002.js"></script>
  <script type="text/javascript" src="assets/js/oschina.js"></script>
  <style type="text/css">
    body,table,input,textarea,select {font-family:Verdana,sans-serif,宋体;}	
  </style>
</head>
<body>

<div id="OSC_Screen">
<div id="OSC_Banner">
    <div id="OSC_Slogon">Johnny's Blog</div>
    <div id="OSC_Channels">
        <ul>
        <li><a href="#" class="project">心情 here...</a></li>
        </ul>
    </div>
    <div class="clear"></div>
</div><!-- #EndLibraryItem --><div id="OSC_Topbar">
	  <div id="VisitorInfo">
		当前访客身份：
				Johnny [ <a href="#">退出</a>] <span id="OSC_Notification">
			<a href="#" class="msgbox" title="进入我的留言箱">你有<em>0</em>新留言</a>
					</span>
		</div>
		<div id="SearchBar">
    		<form action="#">
								<input name="user" value="154693" type="hidden">
																								<input id="txt_q" name="q" class="SERACH" value="在此空间的博客中搜索" onblur="(this.value=='')?this.value='在此空间的博客中搜索':this.value" onfocus="if(this.value=='在此空间的博客中搜索'){this.value='';};this.select();" type="text">
				<input class="SUBMIT" value="搜索" type="submit">
    		</form>
		</div>
		<div class="clear"></div>
	</div>
	<div id="OSC_Content"><div class="SpaceChannel">
	<div id="portrait"><a href="adminIndex.htm"><img src="assets/images/portrait.gif" alt="Johnny" title="Johnny" class="SmallPortrait" user="154693" align="absmiddle"></a></div>
    <div id="lnks">
		<strong><?php echo $issue->USER_NAME?>的博客</strong>
		<div>
			<a href="blog/his_index/<?php echo $issue->WRITER?>">TA的博客列表</a>&nbsp;|
			<a href="message/sendMsg/<?php echo $issue->WRITER?>">发送留言</a>
</span>
		</div>
	</div>
	<div class="clear"></div>
</div>
<div class="Blog">
	

  <div class="BlogTitle">
    <h1><?php echo $issue->TITLE?></h1>   <!--如果是foreach $issue  循环$value-->
    <div class="BlogStat">
						<span class="admin">
						<a href="blog/edit_blog/<?php echo $issue->BLOG_ID ?>">编辑</a>&nbsp;|&nbsp;<a href="blog/delete/<?php echo $issue->BLOG_ID ?>">删除</a>
		</span>
				发表于1小时前 , 
		已有<strong><?php echo $issue->CLICK_RATE?></strong>次阅读  
		共<strong><a href="#comments"><?php echo $issue->COMM_RATE?></a></strong>个评论
		<strong>1</strong>人收藏此文章
	</div> 
  </div>
  <div class="BlogContent TextContent"><?php echo $issue->CONTENT?></div>
      <div class="BlogLinks">
	<ul>
          <li>上篇 <span>(1小时前)</span>：<a href="#" class="prev">测试文章1</a></li><li>下篇 <span>(11小时前)</span>：<a href="viewPost_comment.htm" class="next">测试文章3</a></li>            	</ul>
  </div>
    <div class="BlogComments">
    <h2><a name="comments" href="#postform" class="opts">发表评论»</a>共有 <?php echo $issue->COMM_RATE?> 条网友评论</h2>
			<ul id="BlogComments">
				<?php foreach($cmt as $value){?>
	<li id="cmt_24026_154693_261665458">
	<div class="portrait">
		<a href="#"><img src="assets/images/portrait.gif" alt="sw0411" title="sw0411" class="SmallPortrait" user="154693" align="absmiddle"></a>
	</div>
	<div class="body">
		<div class="title">
			<?php echo $value->USER_NAME?> 发表于 	<?php echo $value->CMT_TIME?>   			
        	        	  <a href="javascript:delete_c(24026,154693,261665458)">删除</a>
								</div>
		<div class="post =">	<?php echo $value->CMT_CONTENT?></div>
		<div id="inline_reply_of_24026_154693_261665458" class="inline_reply"></div>
    </div>
	<div class="clear"></div>
</li>	
				<?php }?>
</ul>
			</div>
			  
  <div class="CommentForm">
    <a name="postform"></a>
    <form id="form_comment" action="comment/pub_cmt/<?php echo $issue->BLOG_ID?>" method="POST">          
      <textarea id="ta_post_content" name="content" style="width: 450px; height: 100px;"></textarea><br>
	  <input value="发表评论" id="btn_comment" class="SUBMIT" type="submit"> 
	  <img id="submiting" style="display: none;" src="assets/images/loading.gif" align="absmiddle">
	  <span id="cmt_tip">文明上网，理性发言</span>
    </form>
	<a href="#" class="more">回到顶部</a>
	<a href="#comments" class="more">回到评论列表</a>
  </div>
  </div>
<div class="BlogMenu"><div class="RecentBlogs SpaceModule">
	<strong>最新博文</strong><ul>
    		<li><a href="#">测试文章2</a></li>
				<li><a href="#">测试文章1</a></li>
			<li class="more"><a href="index.htm">查看所有博文»</a></li>
    </ul>
</div>

</div>
<div class="clear"></div>

<div id="inline_reply_editor" style="display:none;">
<div class="CommentForm">
	<form id="form_inline_comment" action="/action/blog/add_comment?blog=24026" method="POST">
	  <input id="inline_reply_id" name="reply_id" value="" type="hidden">          
      <textarea name="content" style="width: 450px; height: 60px;"></textarea><br>
	  <input value="回复" id="btn_comment" class="SUBMIT" type="submit"> 
	  <input value="关闭" class="SUBMIT" id="btn_close_inline_reply" type="button"> 文明上网，理性发言
    </form>
</div>
</div>
<script type="text/javascript" src="assets/js/blog.htm" defer="defer"></script>
<script type="text/javascript" src="assets/js/brush.js"></script>
<link type="text/css" rel="stylesheet" href="assets/css/shCore.css">
<link type="text/css" rel="stylesheet" href="assets/css/shThemeDefault.css">
<!--<script type="text/javascript"><!--
$(document).ready(function(){
	SyntaxHighlighter.config.clipboardSwf = '/js/syntax-highlighter-2.1.382/scripts/clipboard.swf';
	SyntaxHighlighter.all();
});

</script>
<script type="text/javascript">

function delete_c(nid,uid,cid){
  if(confirm("您确认要删除此篇评论？")){
    var args = "cmt="+cid+"#"+uid+"#"+nid;
    ajax_post("/action/blog/delete_blog_comments?space=154693",args,function(){$("#cmt_"+nid+"_"+uid+"_"+cid).fadeOut();});
  }
}
function delete_blog(blog_id){
if(!confirm("文章删除后无法恢复，请确认是否删除此篇文章？")) return;
ajax_post("/action/blog/delete?id="+blog_id,"",function(html){
	location.href="index.htm";
});
}
function ReplyInline(blog,user,reply){
	$('.inline_reply').empty();
	var div_id = '#inline_reply_of_'+blog+'_'+user+'_'+reply;
	$('#inline_reply_id').val(user+'_'+reply);
	$(div_id).html($('#inline_reply_editor').html());
	$('#txt_focus').focus();
	$('#btn_close_inline_reply').click(function(){
		$(div_id).empty();
	});
	$('#form_inline_comment').ajaxForm({
		dataType: 'json',
    	success: function(json) {
        	if(json.msg){
        		alert(json.msg);
        	}
        	else if(json.id){
    			location.reload();
        	}
    	}
	});
}

</script>-->
</div>
	<div class="clear"></div>
	<div id="OSC_Footer">© 赛斯特(WWW.SYSIT.ORG)</div>
</div>
<script type="text/javascript" src="js/space.htm" defer="defer"></script>
<!--<script type="text/javascript">

$(document).ready(function() {
	$('a.fancybox').fancybox({titleShow:false});
});

function pay_attention(pid,concern_it){
	if(concern_it){
		$("#p_attention_count").load("/action/favorite/add?mailnotify=true&type=3&id="+pid);
		$('#attention_it').html('<a href="javascript:pay_attention('+pid+',false)" style="color:#A00;">取消关注</a>');	
	}
	else{
		$("#p_attention_count").load("/action/favorite/cancel?type=3&id="+pid);
		$('#attention_it').html('<a href="javascript:pay_attention('+pid+',true)" style="color:#3E62A6;">关注此文章</a>');
	}
}

</script>-->
</body></html>