<?php
session_start();
if (!isset($_SESSION['admin_email'])) {
    // 如果管理员未登录，跳转到登录页面
    header("Location: ../user_system/login_signup_page.php");
    exit();
}

require_once 'db.php'; // 引入数据库连接文件

// 获取所有用户信息
$query = "SELECT * FROM user";
$result = mysqli_query($connection, $query);

if (!$result) {
    die("查询失败: " . mysqli_error($connection));
}

$users = mysqli_fetch_all($result, MYSQLI_ASSOC);

// 处理增、删、改操作
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add_user'])) {
        // 增加用户
        $email = mysqli_real_escape_string($connection, $_POST['email']);
        $name = mysqli_real_escape_string($connection, $_POST['name']);
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // 密码加密
        $score = (int)$_POST['score'];

        $add_query = "INSERT INTO user (email, name, password_hash, score) VALUES ('$email', '$name', '$password', $score)";
        if (mysqli_query($connection, $add_query)) {
            header("Location: user_management.php");
            exit();
        } else {
            die("插入失败: " . mysqli_error($connection));
        }
    }

    if (isset($_POST['delete_user'])) {
        // 删除用户
        $id = (int)$_POST['id'];
        $delete_query = "DELETE FROM user WHERE id = $id";
        if (mysqli_query($connection, $delete_query)) {
            header("Location: user_management.php");
            exit();
        } else {
            die("删除失败: " . mysqli_error($connection));
        }
    }

    if (isset($_POST['update_user'])) {
        // 更新用户信息
        $id = (int)$_POST['id'];
        $email = mysqli_real_escape_string($connection, $_POST['email']);
        $name = mysqli_real_escape_string($connection, $_POST['name']);
        $score = (int)$_POST['score'];

        // 密码只有在修改时才更新
        $password = $_POST['password'] ? password_hash($_POST['password'], PASSWORD_DEFAULT) : null;

        // 更新语句
        if ($password) {
            $update_query = "UPDATE user SET email = '$email', name = '$name', score = $score, password_hash = '$password' WHERE id = $id";
        } else {
            $update_query = "UPDATE user SET email = '$email', name = '$name', score = $score WHERE id = $id";
        }

        if (mysqli_query($connection, $update_query)) {
            header("Location: user_management.php");
            exit();
        } else {
            die("更新失败: " . mysqli_error($connection));
        }
    }
}
?>

<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>用户管理</title>
    <link rel="icon" href="../images/home/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/user_management.css">
    <script src="js/script.js" defer></script>
</head>
<body>
<!-- 侧边栏导航 -->
<div class="sidebar">
        <h2>管理员面板</h2>
        <a href="user_management.php" id="user_management_link" class="active">用户管理</a>
        <a href="question_bank.php" id="question_bank_link" >题库管理</a>
        <a href="question_approval.php" id="question_approval_link" >题目审核</a>
        <a href="user_feedback.php" id="user_feedback_link">用户反馈</a>
        <button id="logout-btn">退出登录</button>
    </div>
    <div class="title">
        <h1>用户管理</h1>
    </div>
    
    <!-- 主内容区域 -->  
<div id="user_management" class="main-content" >
<!-- 添加用户表单 -->
<div class="section user-management-section">
    <h3 class="section-title">添加用户</h3>
    <form method="POST" class="user-form">
        <input type="email" name="email" placeholder="邮箱" required class="input-field">
        <input type="text" name="name" placeholder="用户名" required class="input-field">
        <input type="password" name="password" placeholder="密码" required class="input-field">
        <input type="number" name="score" placeholder="积分" required class="input-field">
        <button type="submit" name="add_user" class="submit-btn">添加用户</button>
    </form>
</div>

<!-- 所有用户 -->
<div class="section user-list-section">
    <h3 class="section-title">所有用户</h3>
    <table class="user-table">
        <thead>
            <tr>
                <th>用户名</th>
                <th>邮箱</th>
                <th>积分</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?= htmlspecialchars($user['name']) ?></td>
                <td><?= htmlspecialchars($user['email']) ?></td>
                <td><?= htmlspecialchars($user['score']) ?></td>
                <td>
                    <!-- 更新用户 -->
                    <form method="POST" style="display:inline;">
                        <input type="hidden" name="id" value="<?= $user['id'] ?>">
                        <input type="text" name="name" value="<?= $user['name'] ?>" required class="input-field-small">
                        <input type="email" name="email" value="<?= $user['email'] ?>" required class="input-field-small">
                        <input type="number" name="score" value="<?= $user['score'] ?>" required class="input-field-small">
                        <input type="password" name="password" placeholder="新密码（可选）" class="input-field-small">
                        <button type="submit" name="update_user" class="update-btn">更新</button>
                    </form>
                    <!-- 删除用户 -->
                    <form method="POST" style="display:inline;">
                        <input type="hidden" name="id" value="<?= $user['id'] ?>">
                        <button type="submit" name="delete_user" onclick="return confirm('确定删除此用户？');" class="delete-btn">删除</button>
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
