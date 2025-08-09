<?php
session_start();
if (!isset($_SESSION['admin_email'])) {
    // 如果管理员未登录，跳转到登录页面
    header("Location: ../user_system/login_signup_page.php");
    exit();
}

require_once 'db.php'; // 引入数据库连接文件

// 获取所有题目
$query = "SELECT * FROM questions";
$result = mysqli_query($connection, $query);

if (!$result) {
    die("查询失败: " . mysqli_error($connection));
}

$questions = mysqli_fetch_all($result, MYSQLI_ASSOC);

// 处理增、删、改操作
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add_question'])) {
        // 添加题目
        $question_text = mysqli_real_escape_string($connection, $_POST['question_text']);
        $option_a = mysqli_real_escape_string($connection, $_POST['option_a']);
        $option_b = mysqli_real_escape_string($connection, $_POST['option_b']);
        $option_c = mysqli_real_escape_string($connection, $_POST['option_c']);
        $option_d = mysqli_real_escape_string($connection, $_POST['option_d']);
        $correct_answer = mysqli_real_escape_string($connection, $_POST['correct_answer']);
        $difficulty = mysqli_real_escape_string($connection, $_POST['difficulty']);

        $add_query = "INSERT INTO questions (question_text, option_a, option_b, option_c, option_d, correct_answer, difficulty) 
                      VALUES ('$question_text', '$option_a', '$option_b', '$option_c', '$option_d', '$correct_answer', '$difficulty')";

        if (mysqli_query($connection, $add_query)) {
            header("Location: question_bank.php");
            exit();
        } else {
            die("插入失败: " . mysqli_error($connection));
        }
    }

    if (isset($_POST['delete_question'])) {
        // 删除题目
        $question_id = (int)$_POST['question_id'];
        $delete_query = "DELETE FROM questions WHERE question_id = $question_id";
        if (mysqli_query($connection, $delete_query)) {
            header("Location: question_bank.php");
            exit();
        } else {
            die("删除失败: " . mysqli_error($connection));
        }
    }

    if (isset($_POST['update_question'])) {
        // 更新题目信息
        $question_id = (int)$_POST['question_id'];
        $question_text = mysqli_real_escape_string($connection, $_POST['question_text']);
        $option_a = mysqli_real_escape_string($connection, $_POST['option_a']);
        $option_b = mysqli_real_escape_string($connection, $_POST['option_b']);
        $option_c = mysqli_real_escape_string($connection, $_POST['option_c']);
        $option_d = mysqli_real_escape_string($connection, $_POST['option_d']);
        $correct_answer = mysqli_real_escape_string($connection, $_POST['correct_answer']);
        $difficulty = mysqli_real_escape_string($connection, $_POST['difficulty']);

        $update_query = "UPDATE questions SET question_text = '$question_text', option_a = '$option_a', option_b = '$option_b', 
                         option_c = '$option_c', option_d = '$option_d', correct_answer = '$correct_answer', difficulty = '$difficulty' 
                         WHERE question_id = $question_id";

        if (mysqli_query($connection, $update_query)) {
            header("Location: question_bank.php");
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
    <title>管理员题库管理</title>
    <link rel="icon" href="../images/home/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/question_bank.css">
</head>
<body>
    <!-- 侧边栏导航 -->
    <div class="sidebar">
        <h2>管理员面板</h2>
        <a href="user_management.php" id="user_management_link" >用户管理</a>
        <a href="question_bank.php" id="question_bank_link" class="active" >题库管理</a>
        <a href="question_approval.php" id="question_approval_link" >题目审核</a>
        <a href="user_feedback.php" id="user_feedback_link">用户反馈</a>
        <button id="logout-btn">退出登录</button>
    </div>

    <div class="title">
        <h1>题库管理</h1>
    </div>

    <div id="question_bank" class="main-content">
        <!-- 添加题目表单 -->
        <div class="add_question section">
            <h2>添加题目</h2>
            <form method="POST">
                <input type="text" name="question_text" placeholder="题目内容" required>
                <input type="text" name="option_a" placeholder="选项A" required>
                <input type="text" name="option_b" placeholder="选项B" required>
                <input type="text" name="option_c" placeholder="选项C">
                <input type="text" name="option_d" placeholder="选项D">
                <select name="correct_answer" required>
                    <option value="A">选项A</option>
                    <option value="B">选项B</option>
                    <option value="C">选项C</option>
                    <option value="D">选项D</option>
                </select>
                <select name="difficulty" required>
                    <option value="easy">简单</option>
                    <option value="medium">中等</option>
                    <option value="hard">困难</option>
                </select>
                <button type="submit" name="add_question" class="button">添加题目</button>
            </form>
        </div>

        <!-- 所有题目展示 -->
        <div class="update_question section">
            <h2>所有题目</h2>
            <div class="table-wrapper">
            <table class="table">
                <thead>
                    <tr>
                        <th>题目</th>
                        <th>选项A</th>
                        <th>选项B</th>
                        <th>选项C</th>
                        <th>选项D</th>
                        <th>正确答案</th>
                        <th>难度</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($questions as $question): ?>
                        <tr>
                            <td>
                                <textarea name="question_text" rows="3" required><?= htmlspecialchars($question['question_text']) ?></textarea>
                            </td>
                            <td>
                                <textarea name="option_a" rows="3" required><?= htmlspecialchars($question['option_a']) ?></textarea>
                            </td>
                            <td>
                                <textarea name="option_b" rows="3" required><?= htmlspecialchars($question['option_b']) ?></textarea>
                            </td>
                            <td>
                                <textarea name="option_c" rows="3"><?= htmlspecialchars($question['option_c']) ?></textarea>
                            </td>
                            <td>
                                <textarea name="option_d" rows="3"><?= htmlspecialchars($question['option_d']) ?></textarea>
                            </td>
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
                                <!-- 更新题目 -->
                                <form method="POST" style="display:inline;">
                                    <input type="hidden" name="question_id" value="<?= $question['question_id'] ?>">
                                    <button type="submit" name="update_question" class="button">更新</button>
                                </form>
                                <!-- 删除题目 -->
                                <form method="POST" style="display:inline;">
                                    <input type="hidden" name="question_id" value="<?= $question['question_id'] ?>">
                                    <button type="submit" name="delete_question" class="button" onclick="return confirm('确定删除此题目？');">删除</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            </div>
        </div>
    </div>
    <script src="js/script.js"></script>
</body>
</html>
