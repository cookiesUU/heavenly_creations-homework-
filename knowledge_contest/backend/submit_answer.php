<?php
include('db.php');  // 包含数据库连接

// 获取请求数据
$data = json_decode(file_get_contents('php://input'), true);
$user_id = $data['user_id'];
$new_score = $data['score'];  // 本次答题得分
$answers = $data['answers'];  // 用户提交的答案

// 查询用户当前分数
$query = "SELECT score FROM user WHERE id = ?";
$stmt = $connection->prepare($query);
$stmt->bind_param('i', $user_id);
$stmt->execute();
$stmt->bind_result($old_score);
$stmt->fetch();
$stmt->close();

// 计算新分数
$total_score = $old_score + $new_score;

// 更新用户分数
$query = "UPDATE user SET score = ? WHERE id = ?";
$stmt = $connection->prepare($query);
$stmt->bind_param('ii', $total_score, $user_id);
$stmt->execute();
$stmt->close();

// 返回新的总分
echo json_encode(['new_score' => $total_score]);
?>
