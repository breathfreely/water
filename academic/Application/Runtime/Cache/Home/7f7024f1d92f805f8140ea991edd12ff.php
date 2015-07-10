<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>个人管理</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="author" content="liuxiao@WiiPu -- http://www.wiipu.com" />
        <link rel="stylesheet" href="/academic/Public/css/style2.css" type="text/css" />
        <!-- 新 Bootstrap 核心 CSS 文件 -->
        <link rel="stylesheet" href="/academic/Public/bootstrap/css/bootstrap.min.css">
        
        <!-- 可选的Bootstrap主题文件（一般不用引入） -->
        <link rel="stylesheet" href="/academic/Public/bootstrap/css/bootstrap-theme.min.css">
        
        <!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
        <script src="/academic/Public/bootstrap/js/jquery.js"></script>
        
        <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
        <script src="/academic/Public/bootstrap/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="bgintor">               
            <div class="listintor">
                <div class="tit1">
                    <ul>                
                        <li><a href="#">个人管理</a></li>
                    </ul>       
                </div>
                <div class="header1"><img src="../images/square.gif" width="6" height="6" alt="" />
                    <span>位置：个人管理 －&gt; <strong>基本信息</strong></span>
                </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-2">姓名</div>
                                <div class="col-sm-10"><?php echo ($info["name"]); ?></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-2">学号</div>
                                <div class="col-sm-10"><?php echo ($info["serial"]); ?></div>
                            </div>
                        </div>                        
                    </div>   
                   <div class="row">
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-2">班级</div>
                                <div class="col-sm-10"><?php echo ($info["class_name"]); ?></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-2">学院</div>
                                <div class="col-sm-10"><?php echo ($info["depart_name"]); ?></div>
                            </div>
                        </div>                        
                    </div>
                   <div class="row">
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-2">性别</div>
                                <div class="col-sm-10"><?php if($info['sex'] == 1): ?>男<?php else: ?>女<?php endif; ?></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-2">出生日期</div>
                                <div class="col-sm-10"><?php echo date("Y-m-d",$info['born']);?></div>
                            </div>
                        </div>                        
                    </div> 
                   <div class="row">
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-2">邮箱</div>
                                <div class="col-sm-4"><?php echo ($info["email"]); ?></div>
                            </div>
                        </div>                      
                    </div>                                                                                                  
            </div>
        </div>
    </body>
</html>