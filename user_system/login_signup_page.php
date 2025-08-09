<?php

$is_invalid = false;
$is_empty = false;
$error_message = [];  // 用于存储错误信息
$success_message = ''; // 注册成功消息


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // 登录部分
    if (isset($_POST["email"]) && isset($_POST["password"])) {
        $mysqli = require __DIR__ . "/database.php";
        $is_administrator=$_POST["is_admin"];
        // 使用 prepared statement 防止 SQL 注入
        if($is_administrator){
            session_start();
            $adEmail = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? ''; 
            var_dump($adEmail, $password);
            $adminstrators = [
                '1068008782@qq.com' => ['password' => '123456', 'id' => 1],
                '1277339251@qq.com' => ['password' => '1234567', 'id' => 2]
            ];
            if (isset($adminstrators[$adEmail]) && $adminstrators[$adEmail]['password'] === $password) {
                // 设置会话变量
                $_SESSION['admin_id'] = $adminstrators[$adEmail]['id'];
                $_SESSION['admin_email'] = $adEmail;
            
                header("Location: ../admin_system/user_management.php");
                exit();
            } else {
                
                echo "<script>alert('邮箱或密码错误');window.location.href='login_signup_page.php';</script>";
            }
        }
        else{
            $sql = "SELECT * FROM user WHERE email = ?";
            $stmt = $mysqli->prepare($sql);
            $stmt->bind_param("s", $_POST["email"]);
            $stmt->execute();
            $result = $stmt->get_result();

            $user = $result->fetch_assoc();

            if (password_verify($_POST["password"], $user["password_hash"])) {
                session_start();
                session_regenerate_id();
                $_SESSION["user_id"] = $user["id"];
                $_SESSION['avatar_url'] = $user['avatar'];
                header("Location: ../basic_display/basic_display.php");
                exit;
            } 
            else {
                $is_invalid = true;
            }
        }
    }

    // 注册部分
    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password_confirmation'])) {
        // 字段验证
        if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['password_confirmation'])) {
            $is_empty = true;
            $error_message[] = 'All fields are required.';
        } else {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $password_confirmation = $_POST['password_confirmation'];

            // 邮箱格式验证
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error_message[] = "Invalid email format.";
            }

            // 密码长度验证
            if (strlen($password) < 8) {
                $error_message[] = "Password must be at least 8 characters.";
            }

            // 密码包含字母验证
            if (!preg_match("/[a-z]/i", $password)) {
                $error_message[] = "Password must contain at least one letter.";
            }

            // 密码包含数字验证
            if (!preg_match("/[0-9]/", $password)) {
                $error_message[] = "Password must contain at least one number.";
            }

            // 密码与确认密码匹配验证
            if ($password !== $password_confirmation) {
                $error_message[] = "Passwords must match.";
            }

            // 如果没有错误信息，则继续注册
            if (count($error_message) === 0) {
                $password_hash = password_hash($password, PASSWORD_DEFAULT);

                // 数据库操作
                $mysqli = require __DIR__ . "/database.php";
                $sql = "INSERT INTO user (name, email, password_hash) VALUES (?, ?, ?)";
                $stmt = $mysqli->prepare($sql);
                $stmt->bind_param("sss", $name, $email, $password_hash);

                if ($stmt->execute()) {
                    $success_message = "Registration successful! Please log in."; // 成功消息
                    echo "<script>alert('{$success_message}');</script>";
                } else {
                    if ($mysqli->errno === 1062) {
                        $error_message[] = "Email already taken.";
                    } else {
                        $error_message[] = "Error: " . $mysqli->error . " " . $mysqli->errno;
                    }
                }
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="login_signup_page.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <title>Login&Signup</title>
    <link rel="icon" href="../images/home/icon.png" type="image/x-icon">
    <style>
        .wrapper {
            flex-direction: column;
            display: flex;
            justify-content: center;
            align-items: center;
        }   
        .flower {
            position: absolute;
            pointer-events: none;
            filter: drop-shadow(0 0 15px rgba(255, 255, 255, 0.5));
            animation: fadeInOut 2s linear infinite;
            z-index: 1;
        }
        .flower:before {
            content: "";
            position: absolute;
            width: 100%;
            height: 100%;
            background: url(images/flower.png) no-repeat;
            background-size: contain;
            animation: move 2s linear infinite;
        }
        
        @keyframes move {
            0% {
            transform: translate(0) rotate(0deg);
            }
            100% {
            transform: translate(300px) rotate(360deg);
            }
        }
        
        @keyframes fadeInOut {
            0%,
            100% {
            opacity: 0;
            }
            20%,
            80% {
            opacity: 1;
            }
        }
    </style>
</head>
<body>
 <div class="wrapper">
        <div class="nav-button">
            <button class="btn white-btn" id="loginBtn" onclick="login()">Sign In</button>
            <button class="btn" id="registerBtn" onclick="register()">Sign Up</button>
        </div>
        <div class="nav-menu-btn">
            <i class="bx bx-menu" onclick="myMenuFunction()"></i>
        </div>
<!----------------------------- Form box ----------------------------------->    
    <div class="form-box">
        <!------------------- login form -------------------------->
        <div class="login-container" id="login"> 
            <form method="post">
                <div class="input-box">
                    <input type="email" class="input-field" placeholder="Email" name="email" id="email" value="<?= htmlspecialchars($_POST["email"] ?? "") ?>" required>
                    <i class="bx bx-user"></i>
                </div>
                <div class="input-box">
                    <input type="password" class="input-field" placeholder="Password"  name="password" id="password" required>
                    <i class="bx bx-lock-alt"></i>
                </div>
                <?php if ($is_invalid): ?>
                    <em style="color: red;">Invalid login. Please check your email and password.</em>
                <?php endif; ?>
                <div class="input-box">
                    <input type="submit" class="submit" value="Sign In">
                </div>
                <div class="two-col">
                    <div class="one">
                        
                        <input type="checkbox" id="login-check" name="is_admin">
                        <label for="login-check">Administrator login</label>
                    </div>
                    <div class="two">
                        <label><a href="#">Forgot password?</a></label>
                    </div>
                </div>              
            </form>           
        </div>
        <!------------------- registration form -------------------------->
        <div class="register-container" id="register">
                <form method="post">
                    <div class="input-box">
                        <input type="text" class="input-field" id="name" name="name" placeholder="Name">
                    </div>
                    <div class="input-box">
                        <input type="email" class="input-field" id="email" name="email" placeholder="Email">
                    </div>
                    <div class="input-box">
                        <input type="password" class="input-field" id="password" name="password" placeholder="Password">
                    </div>
                    <div class="input-box">
                        <input type="password" class="input-field" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">
                    </div>
                    <div class="input-box">
                        <input type="submit" class="submit" value="Register">
                    </div>
                    <!-- 错误信息 -->
                    <?php if ($is_empty): ?>
                        <em style="color: red;">All fields are required.</em>
                    <?php endif; ?>
                    <?php if (!empty($error_message)): ?>
                        <ul style="color: red;">
                            <?php foreach ($error_message as $msg): ?>
                                <li><?= htmlspecialchars($msg) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                    <!-- 成功消息 -->
                    <?php if ($success_message): ?>
                        <script>
                            showSuccessMessage("<?= $success_message ?>");
                        </script>
                    <?php endif; ?>
                </form>
            </div>
    </div>
</div>   
<script>
   function myMenuFunction() {
    var i = document.getElementById("navMenu");

    if(i.className === "nav-menu") {
        i.className += " responsive";
    } else {
        i.className = "nav-menu";
    }
   }
</script>
<script>
    var a = document.getElementById("loginBtn");
    var b = document.getElementById("registerBtn");
    var x = document.getElementById("login");
    var y = document.getElementById("register");
    function login() {
        x.style.left = "4px";
        y.style.right = "-520px";
        a.className += " white-btn";
        b.className = "btn";
        x.style.opacity = 1;
        y.style.opacity = 0;
    }
    function register() {
        x.style.left = "-510px";
        y.style.right = "5px";
        a.className = "btn";
        b.className += " white-btn";
        x.style.opacity = 0;
        y.style.opacity = 1;
    }
    document.addEventListener('mousemove', function (e) {
      let body = document.querySelector('body');
      
      let flower = document.createElement('div');
      flower.classList.add('flower');
      
      let x = e.clientX; // Use clientX and clientY for screen-relative positioning
      let y = e.clientY;

      flower.style.left = x + 'px';
      flower.style.top = y + 'px';

      let size = Math.random() * 60;
      flower.style.width = 10 + size + 'px';
      flower.style.height = 10 + size + 'px';

      let rotation = Math.random() * 150;
      flower.style.transform = `rotate(${rotation}deg)`;

      body.appendChild(flower);

      setTimeout(function () {
        flower.remove();
      }, 2000);
    });

    <?php if ($is_empty): ?>
        register();
    <?php endif; ?>
    <?php if (!empty($error_message)): ?>
        register();
    <?php endif; ?>
</script>
</body>
</html>