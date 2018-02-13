<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xml:lang="zh-CN" xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN"><head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="Content-Language" content="zh-CN">
  <title>Johnny的博客 - SYSIT个人博客</title>
    <base href="<?php echo site_url() ?>">
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

<div id="OSC_Screen"><!-- #BeginLibraryItem "/Library/OSC_Banner.lbi" -->
<div id="OSC_Banner">
    <div id="OSC_Slogon"><a href="blog/index" style="text-decoration: none">Blog</a></div>
    <div id="OSC_Channels">
        <ul>
        <li><a href="#" class="project">心情 here...</a></li>
        </ul>
    </div>
    <div class="clear"></div>
</div><!-- #EndLibraryItem --><div id="OSC_Topbar">
	  <div id="VisitorInfo">
		当前访客身份：    <!--点击文章进入他的首页-->
				<?php echo $_SESSION['name']?> [ <a href="user/login">登录</a> | <a href="user/reg">注册</a> ]
				<span id="OSC_Notification">
<!--			<a href="message/leavemessage" class="msgbox" title="进入我的留言箱">你有<em>0</em>新留言</a>-->
					</span>
  </div>
		<div id="SearchBar">
    		<form action="Search">
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
		<strong><?php echo $user->USER_NAME?>的博客</strong>
		<div>  <!-- $user是用户他的用户信息 -->
			<a href="#">TA的博客列表</a>&nbsp;|
			<a href="sendMsg.htm">发送留言</a>
</span>
		</div>
	</div>
	<div class="clear"></div>
</div>
<div class="BlogList">
    <ul>
        <?php foreach($all as $value){?>
            <li class="Blog" id="blog_24027">
                <h2 class="BlogAccess_true BlogTop_0"><a href="viewPost_comment.htm"><?php echo $value->TITLE ?></a></h2>
                <div class="outline">
                    <span class="time">发表于 <?php echo $value->ADD_TIME?></span>
                    <span class="catalog">分类: <a href="#"><?php echo $value->NAME?></a></span>
                    <span class="stat">统计: <?php echo $value->COMM_RATE?>评/<?php echo $value->CLICK_RATE?>阅</span>
<!--                    <span class="blog_admin">( <a href="blog/edit_blog/--><?php //echo $value->BLOG_ID ?><!--">修改</a> | <a href="blog/delete/--><?php //echo $value->BLOG_ID ?><!--">删除</a> )</span>-->
                </div>
                <div class="TextContent" id="blog_content_24027">
                    <?php echo $value->CONTENT ?>
                    <div class="fullcontent"><a href="viewPost_comment.htm">阅读全文...</a></div>
                </div>
            </li>
        <?php } ?>
    </ul>
<div class="clear"></div>
	</div>
<!--<div class="BlogMenu"><div class="catalogs SpaceModule">
  <strong>博客分类</strong>
        <ul class="LinkLine">
            <?php /*foreach($kind as $value){*/?>
                <li><a href="#"><?php /*echo $value->NAME*/?></a></li>

            <?php /*} */?>
        </ul>
</div>-->
<!-- <div class="comments SpaceModule" style="display: inline-block;">
        <strong>最新网友评论</strong>
    <ul >
        <?php foreach($com as $value){?>
            <li>
                <span class="u"><a href="#"><img src="assets/images/portrait.gif" alt="Johnny" title="Johnny" class="SmallPortrait" user="154693" align="absmiddle"></a></span>
                <span class="c"><?php echo $value->USER_NAME?>
                <span class="t">发布于 11分钟前 <a href="viewPost_comment.htm">查看»</a></span>
		</span>
                <div class="clear"></div>
            </li>
        <?php }?>
    </ul>
    </div></div>
<div class="clear"></div>
<script type="text/javascript" src="assets/js/brush.js"></script>
<link type="text/css" rel="stylesheet" href="assets/css/shCore.css">
<link type="text/css" rel="stylesheet" href="assets/css/shThemeDefault.css"></div>
	<div class="clear"></div>
	<div id="OSC_Footer">© 赛斯特(WWW.SYSIT.ORG)</div>
</div> -->
</body></html>