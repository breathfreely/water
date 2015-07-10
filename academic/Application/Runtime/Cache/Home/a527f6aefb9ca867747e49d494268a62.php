<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>重置密码</title>
<link rel="stylesheet" type="text/css" href="/academic/Public/css/login.css"/>
<script src="/academic/Public/js/jquery.js"></script>
<script src="/academic/Public/js/md5.js"></script>
<script>
    $(function(){
        $(".confirm").click(function(){
            var password=$("input[name='password']").val();
            var password2=$("input[name='password2']").val();
            if(password==""||password2==""){
                alert("密码不能为空");
                return false;
            }
            if(password!=password2){
                alert("两次输入不一致");
                return false;
            }
            var $input=$("input");
            var data="";
            $input.each(function(){
                if($(this).attr("name")=="password"||$(this).attr("name")=="password2"){
                    data+=$(this).attr("name")+"="+faultylabs.MD5($(this).val())+"&";                                        
                }else{
                    data+=$(this).attr("name")+"="+$(this).val()+"&";                    
                }
            });
            $.ajax({
                url:"<?php echo U('index/doReset');?>",
                type:"POST",
                data:data,
                success:function(msg){
                    if(msg==1){
                        alert("修改成功");
                        window.location.href="<?php echo U('index/index');?>";
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
<div  class="log1"><p>重置密码</p></div>
<div style="text-align:center;padding-top:15px;"><img src="/academic/Public/images/index/school.jpg"></div>
<div class="input">
    <input type="hidden" name="type" value="<?php echo ($type); ?>"> 
    <input type="hidden" name="username" value="<?php echo ($username); ?>"> 
    <input type="hidden" name="rand" value="<?php echo ($rand); ?>"> 
    <p>密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 码：<input type="password" name="password" style="width:240px;"></p>   
    <p>再次输入：<input type="password" name="password2" style="width:240px;"></p>   
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