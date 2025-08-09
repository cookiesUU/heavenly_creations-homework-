<?php
session_start();
if (!isset($_SESSION['admin_email'])) {
    // 如果管理员未登录，跳转到登录页面
    header("Location: ../user_system/login_signup_page.php");
    exit();
}

require_once 'db.php'; // 引入数据库连接文件

// 获取所有待审核题目
$query = "SELECT * FROM pending_questions";
$result = mysqli_query($connection, $query);

if (!$result) {
    die("查询失败: " . mysqli_error($connection));
}

$pending_questions = mysqli_fetch_all($result, MYSQLI_ASSOC);

// 处理题目审核操作
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['approve_question'])) {
        // 通过审核，移到正式题库
        $question_id = (int)$_POST['question_id'];
        $question_text = mysqli_real_escape_string($connection, $_POST['question_text']);
        $option_a = mysqli_real_escape_string($connection, $_POST['option_a']);
        $option_b = mysqli_real_escape_string($connection, $_POST['option_b']);
        $option_c = mysqli_real_escape_string($connection, $_POST['option_c']);
        $option_d = mysqli_real_escape_string($connection, $_POST['option_d']);
        $correct_answer = $_POST['correct_answer'];
        $difficulty = $_POST['difficulty'];
        $user_id = (int)$_POST['user_id']; // 获取用户ID

        // 将题目插入正式题库表
        $insert_query = "INSERT INTO questions (question_text, option_a, option_b, option_c, option_d, correct_answer, difficulty)
                         VALUES ('$question_text', '$option_a', '$option_b', '$option_c', '$option_d', '$correct_answer', '$difficulty')";
        
        if (mysqli_query($connection, $insert_query)) {
            // 删除待审核题目
            $delete_query = "DELETE FROM pending_questions WHERE question_id = $question_id";
            mysqli_query($connection, $delete_query);

            // 向 responses 表插入答复信息
            $response_text = "感谢您提供的题目，我们已加入题库中";
            $insert_response_query = "INSERT INTO responses (user_id, response) VALUES ('$user_id', '$response_text')";
            mysqli_query($connection, $insert_response_query);

            header("Location: question_approval.php"); // 页面重定向到审核页面
            exit();
        } else {
            die("审核通过失败: " . mysqli_error($connection));
        }
    }

    if (isset($_POST['reject_question'])) {
        // 没通过审核，删除待审核题目
        $question_id = (int)$_POST['question_id'];
        $user_id = (int)$_POST['user_id']; // 获取用户ID

        $delete_query = "DELETE FROM pending_questions WHERE question_id = $question_id";
        if (mysqli_query($connection, $delete_query)) {
            // 向 responses 表插入答复信息
            $response_text = "抱歉您的题目并没有通过审核";
            $insert_response_query = "INSERT INTO responses (user_id, response) VALUES ('$user_id', '$response_text')";
            mysqli_query($connection, $insert_response_query);

            header("Location: question_approval.php"); // 页面重定向到审核页面
            exit();
        } else {
            die("删除失败: " . mysqli_error($connection));
        }
    }
}
?>

<!DOCTYPE html>
<html lang="zh">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>题目审核</title>
    <link rel="icon" href="../images/home/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/question_approval.css">
</head>

<body>
    <!-- 侧边栏导航 -->
    <div class="sidebar">
        <h2>管理员面板</h2>
        <a href="user_management.php" id="user_management_link">用户管理</a>
        <a href="question_bank.php" id="question_bank_link">题库管理</a>
        <a href="question_approval.php" id="question_approval_link" class="active">题目审核</a>
        <a href="user_feedback.php" id="user_feedback_link">用户反馈</a>
        <button id="logout-btn">退出登录</button>
    </div>
    <div class="main-content">
        <div class="page-title">
            <h1>题目审核</h1>
        </div>
        <div class="approval-table-container">
    <table class="approval-table">
        <thead>
            <tr>
                <th>题目ID</th>
                <th>题目内容</th>
                <th>选项A</th>
                <th>选项B</th>
                <th>选项C</th>
                <th>选项D</th>
                <th>正确答案</th>
                <th>难度等级</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pending_questions as $question): ?>
                <tr>
                    <td><?= htmlspecialchars($question['question_id']) ?></td>
                    <td>
                        <form method="POST" class="question-form">
                            <input type="hidden" name="question_id" value="<?= $question['question_id']?>">
                            <input type="hidden" name="user_id" value="<?= $question['user_id']?>">
                            <textarea name="question_text" required><?= htmlspecialchars($question['question_text']) ?></textarea>
                    </td>
                    <td><input type="text" name="option_a" value="<?= htmlspecialchars($question['option_a']) ?>" required></td>
                    <td><input type="text" name="option_b" value="<?= htmlspecialchars($question['option_b']) ?>" required></td>
                    <td><input type="text" name="option_c" value="<?= htmlspecialchars($question['option_c']) ?>"></td>
                    <td><input type="text" name="option_d" value="<?= htmlspecialchars($question['option_d']) ?>"></td>
                    <td>
                        <select name="correct_answer" required>
                            <option value="A" <?= $question['correct_answer'] == 'A' ? 'selected' : '' ?>>A</option>
                            <option value="B" <?= $question['correct_answer'] == 'B' ? 'selected' : '' ?>>B</option>
                            <option value="C" <?= $question['correct_answer'] == 'C' ? 'selected' : '' ?>>C</option>
                            <option value="D" <?= $question['correct_answer'] == 'D' ? 'selected' : '' ?>>D</option>
                        </select>
                    </td>
                    <td>
                        <select name="difficulty" required>
                            <option value="easy" <?= $question['difficulty'] == 'easy' ? 'selected' : '' ?>>简单</option>
                            <option value="medium" <?= $question['difficulty'] == 'medium' ? 'selected' : '' ?>>中等</option>
                            <option value="hard" <?= $question['difficulty'] == 'hard' ? 'selected' : '' ?>>困难</option>
                        </select>
                    </td>
                    <td>
                        <!-- 通过审核按钮 -->
                        <form method="POST" class="action-form">
                            <input type="hidden" name="question_id" value="<?= $question['question_id']?>">
                            <input type="hidden" name="user_id" value="<?= $question['user_id']?>">
                            <button type="submit" name="approve_question" class="approve-btn">通过审核</button>
                        </form>

                        <!-- 不通过审核按钮 -->
                        <form method="POST" class="action-form">
                            <input type="hidden" name="question_id" value="<?= $question['question_id']?>">
                            <input type="hidden" name="user_id" value="<?= $question['user_id']?>">
                            <button type="submit" name="reject_question" class="reject-btn" onclick="return confirm('确定不通过审核吗？');">不通过</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<script src="js/script.js"></script>
</body>

</html>