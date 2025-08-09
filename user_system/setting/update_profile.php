<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: ../login_signup_page.php"); // 未登录，跳转到登录页面
    exit;
}

$mysqli = require __DIR__ . "/database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $avatar = trim($_POST['avatar'] ?? 'img/default-avatar.svg');
    $current_password = $_POST['current_password'] ?? '';
    $new_password = $_POST['new_password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';

    // 验证表单数据
    if (!empty($name) && !empty($email)) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['update_error_message'] = "邮箱格式无效!";
        } else {
            // 更新用户信息
            $sql = "UPDATE user SET name = ?, email = ?, avatar = ? WHERE id = ?";
            $stmt = $mysqli->prepare($sql);
            $stmt->bind_param("sssi", $name, $email, $avatar, $_SESSION["user_id"]);
            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                $_SESSION['update_success_message'] = "个人信息更新成功!";
                $_SESSION['avatar_url'] = $avatar;
            } else {
                $_SESSION['update_error_message'] = "个人信息更新失败，请稍后重试!";
            }
        }
    }

    // 处理密码更新
    if (!empty($current_password) && !empty($new_password) && !empty($confirm_password)) {
        if ($new_password !== $confirm_password) {
            $_SESSION['update_error_message'] = "新密码和确认密码不匹配!";
        } else {
            $sql = "SELECT password_hash FROM user WHERE id = ?";
            $stmt = $mysqli->prepare($sql);
            $stmt->bind_param("i", $_SESSION["user_id"]);
            $stmt->execute();
            $result = $stmt->get_result();
            $user = $result->fetch_assoc();

            if (password_verify($current_password, $user['password_hash'])) {
                $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
                $sql = "UPDATE user SET password_hash = ? WHERE id = ?";
                $stmt = $mysqli->prepare($sql);
                $stmt->bind_param("si", $hashed_password, $_SESSION["user_id"]);
                $stmt->execute();

                if ($stmt->affected_rows > 0) {
                    $_SESSION['update_success_message'] = "密码更新成功!";
                } else {
                    $_SESSION['update_error_message'] = "密码更新失败，请稍后重试!";
                }
            } else {
                $_SESSION['update_error_message'] = "当前密码错误!";
            }
        }
    }

    header("Location: setting.php");
    exit;
}
?>