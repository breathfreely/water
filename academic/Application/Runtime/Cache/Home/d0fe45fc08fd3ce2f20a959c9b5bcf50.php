<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>学院管理</title>
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
                        <li><a href="#">学院管理</a></li>
                    </ul>       
                </div>
                <div class="header1"><img src="/academic/Public/images/images/square.gif" width="6" height="6" alt="" />
                    <span>位置：学院管理 －&gt; <strong><?php echo ($data["name"]); ?></strong> －&gt; <strong>添加班级</strong></span>
                </div>  
                <form class="form-horizontal" action="do_d_class_add" method="post">
                  <input type="hidden" name="depart_id" value="<?php echo ($data['id']); ?>">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">班级名</label>
                    <div class="col-sm-2">
                      <input type="text" name="name" class="form-control" id="inputEmail3" placeholder="请输入班级名">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">人数</label>
                    <div class="col-sm-2">
                      <input type="text" name="number" class="form-control" id="inputEmail3" placeholder="请输入班级人数">
                    </div>
                  </div>  
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">年级</label>
                    <div class="col-sm-2">
                      <input type="text" name="grade" class="form-control" id="inputEmail3" placeholder="请输入年级，比如12级，输入12就好了">
                    </div>
                  </div>                   
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-default">确认</button>
                    </div>
                  </div>
                </form>                                                                                                             
            </div>
        </div>
    </body>
</html>