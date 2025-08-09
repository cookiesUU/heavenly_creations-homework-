
<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../user_system/login_signup_page.php");
    exit;
}

// 用户ID
$user_id = $_SESSION['user_id'];


include('backend/db.php');
// 检查表单是否提交
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $question_text = $_POST['question_text'];
    $option_a = $_POST['option_a'];
    $option_b = $_POST['option_b'];
    $option_c = $_POST['option_c'];
    $option_d = $_POST['option_d'];
    $correct_answer = $_POST['correct_answer'];
    $difficulty = $_POST['difficulty'];

    // 准备 SQL 语句
    $sql = "INSERT INTO pending_questions (user_id, question_text, option_a, option_b, option_c, option_d, correct_answer, difficulty)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    // 使用 prepare 和 bind_param 防止 SQL 注入
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("isssssss", $user_id, $question_text, $option_a, $option_b, $option_c, $option_d, $correct_answer, $difficulty);

    // 执行 SQL 语句
    if ($stmt->execute()) {
        echo "<script>alert('感谢您的出题！审核后题目将出现在题库中！');</script>";
    } else {
        echo "<script>alert('请检查您的题目信息是否填写完整！');</script>";
    }

    // 关闭语句和连接
    $stmt->close();
}

$connection->close();
?>
<?php
$is_login = false;
  session_start();
  if(isset($_SESSION['avatar_url'])){
      $is_login = true;
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>出题界面</title>
    <link rel="icon" href="../images/home/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="css/proposition.css">
</head>
<body>
    <!-- 头部 -->
    <header>
    <div class="title">
      <div class="logo">
        <img src="../images/home/logo.png" alt="天工开物">
      </div>
      
      <h1>天工开物</h1>
    </div>
  <!-- 总导航栏 -->
  <nav id="main-nav" class="top-nav">
    <ul class="nav-primary">
      <li id="nav-home"><a href="../basic_display/basic_display.php">首页</a></li>
      <li id="nav-book"><a href="../book_details/introduction.php">全书概览 <span class="arrow-icon">&#60;</span></a>
        <ul class="nav-secondary">
          <li id="nav-bookPart1"><a href="../book_details/first/first.php">上篇<span class="arrow-icon">&#60;</span></a>
            <ul class="nav-tertiary">
              <li id="book-naili"><a href="../book_details/first/first.php#sec1">乃粒（谷物种植）</a></li>
              <li id="book-naifu"><a href="../book_details/first/first.php#sec3">乃服（纺织制衣）</a></li>
              <li id="book-zhangshi"><a href="../book_details/first/first.php#sec5">彰施（染色工艺）</a></li>
              <li id="book-cuijing"><a href="../book_details/first/first.php#sec7">粹精（谷物提纯）</a></li>
              <li id="book-zuoxian"><a href="../book_details/first/first.php#sec9">作咸（食盐制造）</a></li>
              <li id="book-zheshi"><a href="../book_details/first/first.php#sec11">甘嗜（甘蔗制糖）</a></li>
            </ul>
          </li>
          <li id="nav-bookPart2"><a href="../book_details/second/second.php">中篇<span class="arrow-icon">&#60;</span></a>
            <ul class="nav-tertiary">
              <li id="taoshan"><a href="../book_details/second/second.php">陶埏（陶瓷烧制）</a></li>
              <li id="yezhu"><a href="../book_details/second/second.php">冶铸（金属冶铸）</a></li>
              <li id="zhouche"><a href="../book_details/second/second.php">舟车（舟车制造）</a></li>
              <li id="chuiduan"><a href="../book_details/second/second.php">锤锻（金属锤锻）</a></li>
              <li id="fanshi"><a href="../book_details/second/second.php">燔石（矿石煅烧）</a></li>
              <li id="gaoye"><a href="../book_details/second/second.php">膏液（油脂榨取）</a></li>
              <li id="shaqing"><a href="../book_details/second/second.php">杀青（造纸工序）</a></li>
            </ul>
          </li>
          <li id="nav-bookPart3"><a href="../book_details/third/third.php">下篇<span class="arrow-icon">&#60;</span></a>
            <ul class="nav-tertiary">
              <li id="wujin"><a href="../book_details/third/third.php">五金（五金冶炼）</a></li>
              <li id="jiabing"><a href="../book_details/third/third.php">佳兵（兵器制造）</a></li>
              <li id="danqing"><a href="../book_details/third/third.php">丹青（颜料制作）</a></li>
              <li id="qvnie"><a href="../book_details/third/third.php">曲蘖（酒曲酿造）</a></li>
              <li id="zhuyu"><a href="../book_details/third/third.php">珠玉（珠宝采琢）</a></li>
            </ul>
          </li>
        </ul>
      </li>
      <li id="nav-objects"><a href="../object_display/object_display.php">器物展示</a></li>
      <li id="nav-knowledge-contest"><a href="leaderboard.php">知识竞赛 <span class="arrow-icon">&#60;</span></a>
        <ul class="nav-secondary">
          <li id="qustions"><a href="quiz.php">答题</a></li>
          <li id="ranking-list"><a href="leaderboard.php">排行榜</a></li>
          <li id="setter"><a href="proposition.php">我要出题</a></li>
        </ul>
      </li>

    </ul>
  </nav>
  <div id="loginupORsetting">
    <?php if($is_login):?>
      <img id="logined" src="<?php echo '/web_final_work(Heavenly Creations)/user_system/setting/' . $_SESSION['avatar_url']; ?>" alt="login" width="50" height="50">
    <?php else:?>
      <img id="login" src="../images/home/log.svg" alt="login" width="50" height="50">
    <?php endif;?>
  </div>
</header>
<div class="container">
    <h2>请出题</h2>
    <form method="POST" action="">
        <div class="form-group">
            <label for="question_text">问题文本:</label>
            <textarea id="question_text" name="question_text" rows="4" required></textarea>
        </div>
        <div class="form-group">
            <label for="option_a">选项 A:</label>
            <input type="text" id="option_a" name="option_a" maxlength="255" required>
        </div>
        <div class="form-group">
            <label for="option_b">选项 B:</label>
            <input type="text" id="option_b" name="option_b" maxlength="255" required>
        </div>
        <div class="form-group">
            <label for="option_c">选项 C:</label>
            <input type="text" id="option_c" name="option_c" maxlength="255">
        </div>
        <div class="form-group">
            <label for="option_d">选项 D:</label>
            <input type="text" id="option_d" name="option_d" maxlength="255">
        </div>
        <div class="form-group">
            <label for="correct_answer">正确答案:</label>
            <select id="correct_answer" name="correct_answer" required>
                <option value="">请选择</option>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
            </select>
        </div>
        <div class="form-group">
            <label for="difficulty">难度:</label>
            <select id="difficulty" name="difficulty">
                <option value="easy">简单</option>
                <option value="medium">中等</option>
                <option value="hard">困难</option>
            </select>
        </div>
        <div class="form-group">
            <input type="submit" value="提交">
        </div>
    </form>
</div>
<script>
  document.getElementById("loginupORsetting").addEventListener('click', function () {
        <?php if($is_login):?>
          window.location.href = '../user_system/setting/setting.php';
        <?php else:?>
          window.location.href = '../user_system/login_signup_page.php';
        <?php endif;?>   
      })
</script>

</body>
</html>