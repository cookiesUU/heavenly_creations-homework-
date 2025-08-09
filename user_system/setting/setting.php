<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: ../login_signup_page.php"); // 未登录，跳转到登录页面
    exit;
}

$mysqli = require __DIR__ . "/database.php";

// 获取用户信息
$user_id = $_SESSION['user_id'];
$sql = "SELECT name, email, avatar FROM user WHERE id = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();

// 获取用户的通知
$sql = "SELECT id, response, status FROM responses WHERE user_id = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$responses = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();
?>

<!DOCTYPE html>
<html lang="zh-cn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CodingDung | 个人资料模板</title>
    <link rel="icon" href="../../images/home/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="setting.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .avatar-option {
            width: 80px;
            height: 80px;
            margin: 5px;
            cursor: pointer;
            border: 2px solid transparent;
        }

        .avatar-option.selected {
            border-color: #007bff;
        }

        .unread {
            font-weight: bold;
        }

        .read {
            font-weight: normal;
            color: grey;
        }

        .unprocessed {
            color: red;
            font-weight: bold;
            margin-left: 10px;
        }

        .fade-out {
            animation: fadeOut 1s forwards;
        }

        @keyframes fadeOut {
            from {
                opacity: 1;
            }
            to {
                opacity: 0;
                height: 0;
                padding: 0;
                margin: 0;
            }
        }

        .toast {
            position: fixed;
            bottom: 10px;
            right: 10px;
            background-color: #343a40;
            color: #fff;
            padding: 10px;
            border-radius: 5px;
            opacity: 0.9;
            z-index: 1000;
        }

        /* 统一按钮样式 */
        .btn-custom {
            display: inline-block;
            margin: 20px auto; /* 居中对齐并添加上下边距 */
            padding: 10px 20px;
            font-size: 16px;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-align: center;
        }

        .btn-custom:hover {
            background-color: #0056b3;
        }

        .btn-custom-secondary {
            background-color: #6c757d;
        }

        .btn-custom-secondary:hover {
            background-color: #5a6268;
        }

        .button-container {
            text-align: right; /* 居中对齐 */
        }
    </style>
</head>

<body>
    <div class="container light-style flex-grow-1 container-p-y">
        <div class="card overflow-hidden" style="background-color: #ffffff23; margin: 15vh 0 0 0;">
            <div class="row no-gutters row-bordered row-border-light">
                <div class="col-md-3 pt-0" style="background-color: #ffffff4d;">
                    <div class="list-group list-group-flush account-settings-links">
                        <a class="list-group-item list-group-item-action active" data-toggle="list" href="#account-general" style="background-color: #ffffffbd;">常规</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-change-password" style="background-color: #ffffffbd;">更改密码</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-info" style="background-color: #ffffffbd;">通知</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-feedback" style="background-color: #ffffffbd;">反馈</a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="account-general">
                            <div class="card-body media align-items-center">
                                <img id="current-avatar" src="<?php echo htmlspecialchars($user['avatar']); ?>" alt class="d-block ui-w-80">
                                <div class="media-body ml-4">
                                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#avatarModal">
                                        选择头像
                                    </button>
                                </div>
                            </div>
                            <hr class="border-light m-0">
                            <div class="card-body">
                                <?php
                                if (isset($_SESSION['update_error_message'])) {
                                    echo '<div class="alert alert-danger" role="alert">' . htmlspecialchars($_SESSION['update_error_message']) . '</div>';
                                    unset($_SESSION['update_error_message']);
                                }
                                if (isset($_SESSION['update_success_message'])) {
                                    echo '<div class="alert alert-success" role="alert">' . htmlspecialchars($_SESSION['update_success_message']) . '</div>';
                                    unset($_SESSION['update_success_message']);
                                }
                                ?>
                                <?php
                                if (isset($_SESSION['feedback_error_message'])) {
                                    echo '<div class="alert alert-danger" role="alert">' . htmlspecialchars($_SESSION['feedback_error_message']) . '</div>';
                                    unset($_SESSION['feedback_error_message']);
                                }
                                if (isset($_SESSION['feedback_success_message'])) {
                                    echo '<div class="alert alert-success" role="alert">' . htmlspecialchars($_SESSION['feedback_success_message']) . '</div>';
                                    unset($_SESSION['feedback_success_message']);
                                }
                                ?>
                                <form action="update_profile.php" method="post" enctype="multipart/form-data">
                                    <input type="hidden" id="selected-avatar" name="avatar" value="<?php echo htmlspecialchars($user['avatar']); ?>">
                                    <div class="form-group">
                                        <label class="form-label" for="name">用户名</label>
                                        <input type="text" id="name" class="form-control mb-1" name="name" value="<?php echo htmlspecialchars($user['name']); ?>" required>
                                        <div class="valid-feedback">用户名有效</div>
                                        <div class="invalid-feedback">用户名无效</div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="email">邮箱</label>
                                        <input type="email" id="email" class="form-control mb-1" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
                                        <div class="valid-feedback">邮箱有效</div>
                                        <div class="invalid-feedback">请输入有效的邮箱地址</div>
                                    </div>
                                    <div class="button-container">
                                        <button type="submit" class="btn btn-custom">保存更改</button>
                                        <button id="reset-button" type="button" class="btn btn-custom btn-custom-secondary">重置</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-change-password">
                            <div class="card-body pb-2">
                                <form action="update_profile.php" method="post">
                                    <div class="form-group">
                                        <label class="form-label">当前密码</label>
                                        <input type="password" class="form-control" name="current_password" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">新密码</label>
                                        <input type="password" class="form-control mb-1" name="new_password" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">确认新密码</label>
                                        <input type="password" class="form-control mb-1" name="confirm_password" required>
                                    </div>
                                    <div class="button-container">
                                        <button type="submit" class="btn btn-custom">更新密码</button>
                                    </div>
                                </form>
                                <?php
                                if (isset($_SESSION['update_error_message'])) {
                                    echo '<div class="alert alert-danger" role="alert">' . htmlspecialchars($_SESSION['update_error_message']) . '</div>';
                                    unset($_SESSION['update_error_message']);
                                }
                                if (isset($_SESSION['update_success_message'])) {
                                    echo '<div class="alert alert-success" role="alert">' . htmlspecialchars($_SESSION['update_success_message']) . '</div>';
                                    unset($_SESSION['update_success_message']);
                                }
                                ?>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-info">
                            <!-- 通知内容 -->
                            <div class="card-body">
                                <h5 class="card-title">通知</h5>
                                <ul class="list-group" id="notification-list">
                                    <?php foreach ($responses as $response): ?>
                                        <li class="list-group-item <?php echo $response['status'] ? 'read' : 'unread'; ?>" data-id="<?php echo $response['id']; ?>">
                                            <?php echo htmlspecialchars($response['response']); ?>
                                            <?php if (!$response['status']): ?>
                                                <span class="unprocessed">未处理</span>
                                            <?php endif; ?>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                                <div class="button-container">
                                    <button id="clear-notifications" class="btn btn-custom btn-custom-secondary mt-2">清空通知</button>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="account-feedback">
                            <div class="card-body">
                                <h5 class="card-title">向我们反馈</h5><br>
                                <form action="submit_feedback.php" method="post">
                                    <div class="form-group">
                                        <label for="feedback">您有什么想法，请告诉我们!</label>
                                        <textarea class="form-control" id="feedback" name="question" rows="5" required></textarea>
                                    </div>
                                    <div class="button-container">
                                        <button type="submit" class="btn btn-custom">提交反馈</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>


                </div>

            </div>

        </div>
        <button id="btn-return" class=" btn btn-custom btn-custom-secondary mt-2">退出设置</button>
        <button id="logout-btn"  class="btn btn-custom btn btn-custom btn-custom-secondary mt-2">退出登录</button>



    </div>

    <!-- Modal -->
    <div class="modal fade" id="avatarModal" tabindex="-1" aria-labelledby="avatarModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="avatarModalLabel">选择一个头像</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="d-flex flex-wrap">
                        <img src="img/default-avatar.svg" class="avatar-option" alt="Default Avatar" data-avatar="img/default-avatar.svg">
                        <img src="img/avatar1.svg" class="avatar-option" alt="Avatar 1" data-avatar="img/avatar1.svg">
                        <img src="img/avatar2.svg" class="avatar-option" alt="Avatar 2" data-avatar="img/avatar2.svg">
                        <img src="img/avatar3.svg" class="avatar-option" alt="Avatar 3" data-avatar="img/avatar3.svg">
                        <img src="img/avatar4.svg" class="avatar-option" alt="Avatar 4" data-avatar="img/avatar4.svg">
                        <img src="img/avatar5.svg" class="avatar-option" alt="Avatar 5" data-avatar="img/avatar5.svg">
                        <img src="img/avatar6.svg" class="avatar-option" alt="Avatar 6" data-avatar="img/avatar6.svg">
                        <img src="img/avatar7.svg" class="avatar-option" alt="Avatar 7" data-avatar="img/avatar7.svg">
                        <img src="img/avatar8.svg" class="avatar-option" alt="Avatar 8" data-avatar="img/avatar8.svg">
                        <img src="img/avatar9.svg" class="avatar-option" alt="Avatar 9" data-avatar="img/avatar9.svg">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">关闭</button>
                    <button type="button" class="btn btn-primary" id="save-avatar">保存选择</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function () {
            const avatarOptions = document.querySelectorAll('.avatar-option');
            const currentAvatar = document.getElementById('current-avatar');
            const selectedAvatarInput = document.getElementById('selected-avatar');
            const saveAvatarButton = document.getElementById('save-avatar');
            const resetButton = document.getElementById('reset-button');
            const nameInput = document.getElementById('name');
            const emailInput = document.getElementById('email');
            const returnButton = document.getElementById('btn-return');
            let selectedAvatar = null;

            const originalAvatar = '<?php echo htmlspecialchars($user['avatar']); ?>';
            const originalName = '<?php echo htmlspecialchars($user['name']); ?>';
            const originalEmail = '<?php echo htmlspecialchars($user['email']); ?>';

            avatarOptions.forEach(option => {
                option.addEventListener('click', function () {
                    avatarOptions.forEach(opt => opt.classList.remove('selected'));
                    this.classList.add('selected');
                    selectedAvatar = this.getAttribute('data-avatar');
                });
            });

            saveAvatarButton.addEventListener('click', function () {
                if (selectedAvatar) {
                    currentAvatar.src = selectedAvatar;
                    selectedAvatarInput.value = selectedAvatar;
                }
                $('#avatarModal').modal('hide');
            });

            resetButton.addEventListener('click', function () {
                // Reset avatar
                currentAvatar.src = originalAvatar;
                selectedAvatarInput.value = originalAvatar;
                avatarOptions.forEach(opt => opt.classList.remove('selected'));

                // Reset name and email
                nameInput.value = originalName;
                emailInput.value = originalEmail;

                // Remove validation classes
                nameInput.classList.remove('is-invalid', 'is-valid');
                emailInput.classList.remove('is-invalid', 'is-valid');
            });

            nameInput.addEventListener('input', function () {
                if (nameInput.value.length >= 3) {
                    nameInput.classList.remove('is-invalid');
                    nameInput.classList.add('is-valid');
                } else {
                    nameInput.classList.remove('is-valid');
                    nameInput.classList.add('is-invalid');
                }
            });

            emailInput.addEventListener('input', function () {
                const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (emailPattern.test(emailInput.value)) {
                    emailInput.classList.remove('is-invalid');
                    emailInput.classList.add('is-valid');
                } else {
                    emailInput.classList.remove('is-valid');
                    emailInput.classList.add('is-invalid');
                }
            });

            // Notification click event to delete
            const notificationList = document.getElementById('notification-list');
            notificationList.addEventListener('click', function (event) {
                const target = event.target.closest('.list-group-item');
                if (target) {
                    const notificationId = target.getAttribute('data-id');
                    // Delete the notification
                    $.post('delete_notification.php', { id: notificationId }, function () {
                        // Add fade-out class for animation
                        target.classList.add('fade-out');
                        // Remove the element after the animation completes
                        setTimeout(function () {
                            target.remove();
                        }, 1000);
                        // Show toast message
                        showToast('通知已删除');
                    });
                }
            });

            // Clear all notifications
            const clearNotificationsButton = document.getElementById('clear-notifications');
            clearNotificationsButton.addEventListener('click', function () {
                $.post('clear_notifications.php', function () {
                    document.querySelectorAll('#notification-list .list-group-item').forEach(function (notification) {
                        notification.remove();
                    });
                    // Show toast message
                    showToast('所有通知已清空');
                });
            });

            // Function to show toast message
            function showToast(message) {
                const toast = document.createElement('div');
                toast.className = 'toast';
                toast.textContent = message;
                document.body.appendChild(toast);
                setTimeout(function () {
                    toast.remove();
                }, 3000);
            }
            returnButton.addEventListener('click', function () {
                window.location.href = '../../basic_display/basic_display.php';
            });
           
            const logoutButton = document.getElementById('logout-btn');
            logoutButton.addEventListener('click', function () {
                window.location.href = 'logout.php';
            });
        });
        
    </script>
</body>

</html>