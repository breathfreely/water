<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="author" content="Jiangting@WiiPu -- http://www.wiipu.com" />
        <title> 后台管理中心  </title>
    </head>
    <frameset rows="94,*,23" frameborder="no" border="0" framespacing="0" id="top">
      <frame src="header.html" id="topFrame" scrolling="no" noresize="noresize" title="TopFrame" />
      <frameset cols="205,7,*" frameborder="no" border="0" framespacing="0" id="frams">
        <frame src="menu.html" id="menuFrame" noresize="noresize" title="menuFrame"/>
        <frame src="switchframe.html"  noresize="noresize" title="switchFrame"/>

        <frame src="main.html" id="mainFrame" name="mainFrame" title="mainFrame" />
      </frameset>
      <frame src="footer.html" id="footFrame" scrolling="no" noresize="noresize" title="FootFrame" />
    </frameset>
    <noframes>
        <body>
        </body>
    </noframes>
</html>