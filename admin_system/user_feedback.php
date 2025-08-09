<?php
session_start();
if (!isset($_SESSION['admin_email'])) {
    // 如果管理员未登录，跳转到登录页面
    header("Location: ../user_system/login_signup_page.php");
    exit();
}

require_once 'db.php'; // 引入数据库连接文件

// 获取所有未答复的用户反馈
$query = "SELECT * FROM user_feedback WHERE status = '未答复'"; // 获取未答复的反馈
$result = mysqli_query($connection, $query);

if (!$result) {
    die("查询失败: " . mysqli_error($connection));
}

$user_feedbacks = mysqli_fetch_all($result, MYSQLI_ASSOC);

// 处理管理员回复
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['reply_feedback'])) {
    // 获取回复的内容和用户ID
    $feedback_id = (int)$_POST['feedback_id'];
    $user_id = (int)$_POST['user_id']; // 获取用户ID
    $response_text = mysqli_real_escape_string($connection, $_POST['response_text']); // 回复内容

    // 向 responses 表插入管理员回复
    $insert_response_query = "INSERT INTO responses ( user_id, response) 
                               VALUES ( '$user_id', '$response_text')";
    if (mysqli_query($connection, $insert_response_query)) {
        // 更新 feedback 的状态为已答复
        $update_feedback_status = "UPDATE user_feedback SET status = '已答复' WHERE feedback_id = $feedback_id";
        mysqli_query($connection, $update_feedback_status);

        header("Location: user_feedback.php"); // 页面重定向到反馈页面
        exit();
    } else {
        die("回复失败: " . mysqli_error($connection));
    }
}
?>

<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>用户反馈管理</title>
    <link rel="icon" href="../images/home/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/user_feedback.css">
</head>
<body>
    <!-- 侧边栏导航 -->
    <div class="sidebar">
        <h2>管理员面板</h2>
        <a href="user_management.php" id="user_management_link">用户管理</a>
        <a href="question_bank.php" id="question_bank_link">题库管理</a>
        <a href="question_approval.php" id="question_approval_link">题目审核</a>
        <a href="user_feedback.php" id="user_feedback_link" class="active">用户反馈</a>
        <button id="logout-btn">退出登录</button>
    </div>

    <div class="main-content">
        <div class="title">
            <h1>用户反馈管理</h1>
        </div>
        <div id="user_feedback">
            <table class="feedback-table">
                <thead>
                    <tr>
                        <th>反馈ID</th>
                        <th>用户ID</th>
                        <th>反馈内容</th>
                        <th>状态</th>
                        <th>回复</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($user_feedbacks as $feedback): ?>
                        <tr>
                            <td><?= htmlspecialchars($feedback['feedback_id']) ?></td>
                            <td><?= htmlspecialchars($feedback['user_id']) ?></td>
                            <td><?= nl2br(htmlspecialchars($feedback['question'])) ?></td>
                            <td><?= htmlspecialchars($feedback['status']) ?></td>
                            <td>
                                <form method="POST" action="user_feedback.php" class="response-form">
                                    <input type="hidden" name="feedback_id" value="<?= $feedback['feedback_id'] ?>">
                                    <input type="hidden" name="user_id" value="<?= $feedback['user_id'] ?>">
                                    <textarea name="response_text" required placeholder="请输入回复内容"></textarea><br>
                                    <button type="submit" name="reply_feedback" class="reply-btn">回复</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="js/script.js"></script>
</body>
</html>
