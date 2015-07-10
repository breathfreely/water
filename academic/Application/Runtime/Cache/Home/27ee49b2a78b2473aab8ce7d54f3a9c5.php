<?php if (!defined('THINK_PATH')) exit();?><html xmlns="http://www.w3.org/1999/xhtml">
 <head>
  <title> 菜单 </title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="author" content="Jiangting@WiiPu -- http://www.wiipu.com" />
    <link rel="stylesheet" href="/academic/Public/css/style2.css" type="text/css"/>
  <style>
  .menu_h3{cursor:pointer;}
  </style>
  <script src="/academic/Public/js/jquery.js">
  </script>
  <script>
  $(function(){
    $(".menu_intor").hide();
    $(".menu_h3").click(function(){
        if($(this).siblings(".menu_intor").is(":hidden")){
            $(this).siblings(".menu_intor").show();
        }else{
            $(this).siblings(".menu_intor").hide();
        }
        
    })
  })
  </script>
 </head>    
    <body id="flow">
        <div class="menu" id="me">
            <div class="menu_content">
                <div class="menu_h menu_h3">个人管理</div>
                <div class="menu_intor">
                    <p><a href="detail" target="mainFrame">基本信息</a></p>
                    <!--<p><a href="info" target="mainFrame">个人信息</a></p>-->                    
                    <p><a href="modify_pass" target="mainFrame">修改密码</a></p>
                </div>               
            </div>
            <div class="menu_content">
                <div class="menu_h menu_h3">选课管理</div>
                <div class="menu_intor">
                    <p><a href="info" target="mainFrame">网上选课</a></p>
                    <p><a href="modify_pass" target="mainFrame">选课结果</a></p>
                </div>               
            </div>
            <div class="menu_content">
                <div class="menu_h menu_h3">考务管理</div>
                <div class="menu_intor">
                    <p><a href="info" target="mainFrame">全部成绩</a></p>
                    <p><a href="modify_pass" target="mainFrame">本学期成绩</a></p>
                </div>               
            </div>                        
        </div>
    </body>
</html>