// clear_notifications.php
<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: ../login_signup_page.php");
    exit;
}

$mysqli = require __DIR__ . "/database.php";

$user_id = $_SESSION['user_id'];

// 删除该用户的所有通知
$sql = "DELETE FROM responses WHERE user_id = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->close();
?>