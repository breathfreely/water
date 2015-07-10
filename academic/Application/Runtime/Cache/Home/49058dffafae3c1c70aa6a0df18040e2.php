<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>找回密码</title>
<link rel="stylesheet" type="text/css" href="/academic/Public/css/login.css"/>
<script src="/academic/Public/js/jquery.js"></script>
<script src="/academic/Public/js/md5.js"></script>
<script>
	$(function(){
		$(".confirm").click(function(){
            var type=$("select").val();		    
		    var username=$("input[name='username']").val();
		    var email=$("input[name='email']").val();
		    if(username==""||email==""){
		        alert("用户名或邮箱不能为空");
		        return false;
		    }
		    $.ajax({
		        url:"<?php echo U('index/send');?>",
		        type:"POST",
		        data:"type="+type+"&username="+username+"&email="+email,
		        success:function(msg){
		            if(msg==1){
		                alert("已发送到您邮箱");
		            }else{
		                alert(msg);
		            }
		        }
		    })		
		})
	})
</script>
</head>
<body>
<div class="head">
<p>&nbsp;&nbsp;欢迎使用<span id="school">&nbsp;&nbsp;西安电子科技大学教务系统</span></p>
</div>
<div class="middle">
<div class="login">
<div  class="log1"><p>找回密码</p></div>
<div style="text-align:center;padding-top:15px;"><img src="/academic/Public/images/index/school.jpg"></div>
<div class="input">
    <p>方&nbsp;&nbsp;&nbsp;式：<select name="type" style="width:245px;"><option value="0" select="selected">学生</option>
    <option value="1">教师</option>
    <option value="2">管理员</option></select></p><br/>    
	<p>账&nbsp;&nbsp;&nbsp;号：<input type="text" name="username" style="width:240px;"></p>
	</br>
	<p>邮&nbsp;&nbsp;&nbsp;箱：<input type="text" name="email" style="width:240px;"></p>	
	<div class="button2"><a href="javascript:void(0)" class="confirm">确认</a></div>
</div>
</div>
</div>
<div class="footer">
	<p>Copyright @2015 www.xidian.edu.com</p>
	<p>西安电子科技大学&nbsp;&nbsp;版权所有&nbsp;&nbsp;&nbsp;制作人：<a href="#">402工作室</a></p>
    <p>地址：陕西省西安市西沣路兴隆段266号&nbsp;&nbsp;&nbsp;邮编：710126&nbsp;&nbsp;&nbsp;电话：029-81891205</p>
</div>
</body>
</html>