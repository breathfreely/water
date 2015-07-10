<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="author" content="liuxiao@WiiPu -- http://www.wiipu.com" />
        <link rel="stylesheet" href="/academic/Public/css/style2.css" type="text/css" />
        <script src="/academic/Public/js/jquery.js" type="text/javascript"></script>
        <script type="text/javascript" src="../../js/upload.js"></script>
    </head>
    <body>
        <div class="bgintor">               
            <div class="listintor">
                <div class="tit1">
                    <ul>                
                        <li><a href="#">个人信息</a></li>
                    </ul>       
                </div>
                <div class="header1"><img src="../images/square.gif" width="6" height="6" alt="" />
                    <span>位置：个人管理 －&gt; <strong>个人信息</strong></span>
                </div><div class="fromcontent">
            <form action="modify_info" method="post" id="doForm">
                 <p>姓名：<input class="in1" type="text" name="name" id="name" value="<?php echo ($info['name']); ?>" /></p>          
                 <p>学号：
                 <input type="text" class="in1" name="serial" id="serial" value="<?php echo ($info['serial']); ?>" />（多个关键字以，分隔）
                 </p>                           
                 <p>照片：
                 <?php if(!empty($$info[image])): ?><img src="<?php echo ($info['image']); ?>" width="50px" height="60px" alt="照片"/><?php endif; ?>
                 <span id="shop_images" name=""></span>
                 <input type="file" name="file" id="file_image"/>
                    <span id="loading_image" style="display:none;">
                    <img src="../../admin_manage/images/loading.gif" alt="loading...">
                    </span>
                    <span id="logo_image"></span>
                    <input type="button" value="上传" onclick="return ajaxFileUpload('image');" 
                    class="btn btn-large btn-primary" />(*海报尺寸：500*500以内)   
                </p>                    
                <br>
                <!--<p>热门关键词：<input class="in1" type="text" name="hot_word" id="name" value="<?php echo ($array['hot_word']); ?>" /></p>(多个关键字以,分隔)-->
                <p>性别：<input class="in1" type="text" name="sex" id="sex" value="<?php echo ($info['sex']); ?>" /></p>
                <p>出生日期：<input class="in1" type="text" name="born" id="born" value="<?php echo ($array['born']); ?>" /></p>
                <p>Email：<input class="in1" type="text" name="email" id="email" value="<?php echo ($array['email']); ?>" /></p>
                <p><input type="submit" value="确定" id="submit" onclick="return check()" /></p>
            </form>
        </div>
    </div>
  </div>
 </body>
</html>
<script>
form=document.getElementById("doForm");
function check()
{
    if(form.name.value=="")
    {
        alert('请填写姓名！');
        form.name.focus();
        return false;
    }
    if(form.serial.value=="") 
    {
        alert('请填写学号！');
        form.serial.focus();
        return false;
    }
    if(form.born.value=="") 
    {
        alert('请填写出生日期！');
        form.born.focus();
        return false;
    }
    if(form.email.value=="") 
    {
        alert('请填写邮箱！');
        form.email.focus();
        return false;
    }    
    form.submit();   
}
</script>