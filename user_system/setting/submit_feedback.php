<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: ../login_signup_page.php");
    exit;
}

$mysqli = require __DIR__ . "/database.php";

// 获取用户ID和反馈内容
$user_id = $_SESSION['user_id'];
$question = $_POST['question'];

// 插入反馈内容到数据库
$sql = "INSERT INTO user_feedback (user_id, question, status) VALUES (?, ?, '未答复')";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("is", $user_id, $question);

if ($stmt->execute()) {
    // 设置成功消息
    $_SESSION['feedback_success_message'] = "反馈提交成功！";
} else {
    // 设置错误消息
    $_SESSION['feedback_error_message'] = "反馈提交失败，请稍后再试。";
}

$stmt->close();

header("Location: setting.php");
exit;
?>