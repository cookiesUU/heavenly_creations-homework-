<?php
session_start(); // 开始会话

// 清除所有会话变量
$_SESSION = [];
echo "123";

// 彻底销毁会话
session_destroy();

// 重定向到登录页面
header("Location: ../basic_display/basic_display.php");
exit;
?>