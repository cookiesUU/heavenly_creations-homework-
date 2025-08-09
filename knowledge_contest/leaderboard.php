<?php
$is_login = false;
  session_start();
  if(isset($_SESSION['avatar_url'])){
      $is_login = true;
  }
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>排行榜</title>
    <link rel="icon" href="../images/home/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="css/leaderboard.css">
    
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
<main>
    <div class="leaderboard">
    <h2 style="text-align: center;">用户排行榜</h2>
    <table>
        <thead>
            <tr>
                <th>排名</th>
                <th>用户名</th>
                <th>分数</th>
            </tr>
        </thead>
        <tbody id="leaderboard">
            <!-- 排行榜数据将插入这里 -->
        </tbody>
    </table>
</div>
<div class="isQuiz">
    <button type="submit" id="start-quiz-btn" name="start_quiz">我要答题</button>
      </div>
<div class="isProposition">
      <button type="submit" id="start-proposition-btn" name="start_proposition">我要出题</button>
        </div>
    <script>
        // 页面加载时获取排行榜数据
        window.onload = function() {
            fetch('backend/leaderboard.php')
                .then(response => response.json())  // 解析为 JSON
                .then(data => {
                    // 检查返回的状态
                    if (data.status === 'error') {
                        alert('错误: ' + data.message);  // 如果有错误，弹出错误信息
                    } else {
                        displayLeaderboard(data.data);  // 否则，显示排行榜
                    }
                })
                .catch(error => {
                    alert('发生了一个错误: ' + error.message);
                });
        };

        // 显示排行榜
        function displayLeaderboard(users) {
            let leaderboardElement = document.getElementById('leaderboard');
            leaderboardElement.innerHTML = ''; // 清空原有内容

            // 遍历数据，按顺序插入到表格中
            users.forEach((user, index) => {
                let row = document.createElement('tr');
                let rankCell = document.createElement('td');
                let usernameCell = document.createElement('td');
                let scoreCell = document.createElement('td');

                rankCell.innerText = index + 1;
                usernameCell.innerText = user.name;  // 显示用户名
                scoreCell.innerText = user.score;    // 显示分数

                row.appendChild(rankCell);
                row.appendChild(usernameCell);
                row.appendChild(scoreCell);
                leaderboardElement.appendChild(row);
            });
        }
      document.getElementById('start-quiz-btn').addEventListener('click', function(event) {
          window.location.href = 'quiz.php';
      });
      document.getElementById('start-proposition-btn').addEventListener('click', function(event) {
          window.location.href = 'proposition.php';
      });
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
