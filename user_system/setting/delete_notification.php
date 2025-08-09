// delete_notification.php
<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: ../login_signup_page.php");
    exit;
}

$mysqli = require __DIR__ . "/database.php";

if (isset($_POST['id'])) {
    $notification_id = $_POST['id'];
    $user_id = $_SESSION['user_id'];

    $sql = "DELETE FROM responses WHERE id = ? AND user_id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("ii", $notification_id, $user_id);
    $stmt->execute();
    $stmt->close();
}
?>