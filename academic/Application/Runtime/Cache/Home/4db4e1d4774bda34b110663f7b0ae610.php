<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>课程管理</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="author" content="liuxiao@WiiPu -- http://www.wiipu.com" />
        <link rel="stylesheet" href="/academic/Public/css/style2.css" type="text/css" />
        <link rel="stylesheet" href="/academic/Public/css/page.css" type="text/css" />
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
                        <li><a href="#">课程管理</a></li>
                    </ul>       
                </div>
                <div class="header1"><img src="/academic/Public/images/images/square.gif" width="6" height="6" alt="" />
                    <span>位置：课程管理 －&gt; <strong>所有课程</strong></span>
                </div>
                <div class="pagination"><?php echo ($page); ?></div>                
                <!--<div class="pagination pagination-large"><?php echo ($page); ?></div> 大号数字样式-->                     
                <div>
                <table class="table table-hover table-bordered">
                    <tr><td class="text-center">课程编号</td><td class="text-center">课程名</td><td class="text-center">操作</td></tr>
                    <?php if(is_array($result)): foreach($result as $key=>$vo): ?><tr value="<?php echo ($vo["id"]); ?>"><td class="text-center"><?php echo ($vo["id"]); ?></td><td class="text-center"><?php echo ($vo["name"]); ?></td><td class="text-center"><a href="<?php echo U('admin/modify_course');?>?id=<?php echo ($vo["id"]); ?>"  class="modify">修改</a>|
                            <a href="javascript:void(0)" class="delete">删除</a></td>
                            </tr><?php endforeach; endif; ?>                     
                </table>                                                       
                </div>                                                                                                          
            </div>
        </div>
    </body>
</html>
<script>
    $(function(){
        $(".delete").click(function(){
            if(confirm("确认删除")){
                var id=$(this).parents("tr").attr("value");
                //var url="delete?id="+id;
                var url="<?php echo U('admin/delete_course');?>"+"?id="+id;
                window.location.href=url;
            }
        })     
    })
</script>