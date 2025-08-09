<?php
session_start();
include('backend/db.php');

// 检查用户是否已登录
if (!isset($_SESSION['user_id'])) {
    header("Location: ../user_system/login_signup_page.php");
    exit();
}

// 从数据库获取题目
$query = "SELECT * FROM questions ORDER BY RAND() LIMIT 5";
$result = $connection->query($query);

if ($result->num_rows < 5) {
    die("题目不足，无法进行答题！");
}

$questions = [];
while ($row = $result->fetch_assoc()) {
    $questions[] = $row;
}
?>
<?php
$is_login = false;
  session_start();
  if(isset($_SESSION['avatar_url'])){
      $is_login = true;
  }
?>
<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>答题界面</title>
    <link rel="icon" href="../images/home/icon.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+SC:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/quiz.css">
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

<div class="quiz-container">
    <h1 class="quiz-header">知识竞答</h1>
    <div id="question-container">
        <!-- 用来动态显示题目 -->
    </div>
    <div class="check_score">
     
    <button id="view-score" onclick="viewScore()">查看分数</button>
    </div>

    <div class="score-display" id="score-display"></div>
    <button class="back-button" onclick="window.history.back();">返回</button>
</div>

<script>
    let scores = 0;
    let answers = [];
    let currentQuestionIndex = 0;
    let timers = [];
    let totalQuestions = <?= count($questions) ?>;

    // 初始化题目和计时器
    const questions = <?= json_encode($questions) ?>;
    
    // 显示题目
    function showQuestion(index) {
        const questionContainer = document.getElementById('question-container');
        questionContainer.innerHTML = `
            <div class="question-container" id="question-${index}">
                <div class="question-header">第 ${index + 1} 题</div>
                <p class="question-text">${questions[index].question_text}</p>
                <div class="options">
                    <button class="option" onclick="submitAnswer(${index}, 'A')">${questions[index].option_a}</button>
                    <button class="option" onclick="submitAnswer(${index}, 'B')">${questions[index].option_b}</button>
                    <button class="option" onclick="submitAnswer(${index}, 'C')">${questions[index].option_c}</button>
                    <button class="option" onclick="submitAnswer(${index}, 'D')">${questions[index].option_d}</button>
                </div>
                <div class="timer" id="timer-${index}">20</div>
            </div>
        `;

        // 启动计时器
        timers[index] = setInterval(function() {
            let timer = document.getElementById('timer-' + index);
            let timeLeft = parseInt(timer.innerText);
            if (timeLeft > 0) {
                timer.innerText = timeLeft - 1;
            } else {
                clearInterval(timers[index]);
                submitAnswer(index, null); // 时间到，自动提交
            }
        }, 1000);
    }

    // 提交答案
    function submitAnswer(index, selectedOption) {
        clearInterval(timers[index]); // 停止计时器
        const correctAnswer = questions[index].correct_answer;
        // 判断是否正确
        if (selectedOption === correctAnswer) {
            scores += 5; // 每题得5分
            document.querySelectorAll('#question-' + index + ' .option').forEach(button => {
                if (button.innerText === correctAnswer) {
                    button.classList.add('correct');
                }
            });
        } else {
            document.querySelectorAll('#question-' + index + ' .option').forEach(button => {
                if (button.innerText === selectedOption) {
                    button.classList.add('incorrect');
                }
                if (button.innerText === correctAnswer) {
                    button.classList.add('correct');
                }
            });
        }
        answers[index] = selectedOption;
        setTimeout(function() {
            // 隐藏当前题目并显示下一题
            document.getElementById('question-' + index).style.display = 'none';
            if (index + 1 < totalQuestions) {
                showQuestion(index + 1);
            } else {
                document.getElementById('view-score').style.display = 'block'; // 显示查看分数按钮
            }
        }, 100); // 延迟1秒后跳转到下一题
    }
    // 查看分数并显示
    function viewScore() {
        document.getElementById('score-display').innerText = `本次得分是：${scores} 分`;
        document.getElementById('view-score').style.display = 'none'; // 隐藏查看分数按钮
        submitQuiz();
    }

    // 初始化显示第一题
    showQuestion(currentQuestionIndex);
    // 提交答题并更新数据库
    function submitQuiz() {
        // 使用 fetch 将得分和答案提交到后端
        fetch('backend/submit_answer.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                user_id: <?= $_SESSION['user_id'] ?>,  // 这里传递用户ID
                score: scores,                        // 传递本次答题得分
                answers: answers                      // 传递用户提交的答案
            })
        })
        .then(response => response.json())   // 解析响应为JSON
        .then(data => {
            // 处理返回的数据，这里是更新后的总分
            document.getElementById('score-display').innerText = `本次得分是：${scores} 分`;
            document.getElementById('view-score').style.display = 'none';  // 隐藏查看分数按钮
        })
        .catch(error => {
            console.error('提交失败，稍后再试。', error);
        });
    }
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
