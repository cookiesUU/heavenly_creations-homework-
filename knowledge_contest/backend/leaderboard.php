<?php
session_start();
include('db.php');  // 引入数据库连接

// 查询数据库，按分数从高到低排序
$query = "SELECT id, name, score FROM user ORDER BY score DESC";
$result = $connection->query($query);

// 检查查询是否成功
if ($result === false) {
    // 如果查询失败，返回 JSON 格式的错误信息
    echo json_encode([
        'status' => 'error',
        'message' => "数据库查询失败: " . $connection->error
    ]);
    // 关闭连接并终止脚本
    $connection->close();
    exit;
}

// 将结果转换为数组
$users = [];
while ($row = $result->fetch_assoc()) {
    $users[] = $row;
}

// 返回 JSON 格式的用户数据
echo json_encode([
    'status' => 'success',
    'data' => $users
]);

// 关闭数据库连接
$connection->close();
?>
