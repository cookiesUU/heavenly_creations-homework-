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
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>天工开物</title>
    <link rel="icon" href="../images/home/icon.png" type="image/x-icon">
    <script src="https://kit.fontawesome.com/32d3642e24.js" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="basic_display.css">
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
      <li id="nav-home"><a href="basic_display.php">首页</a></li>
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
      <li id="nav-knowledge-contest"><a href="../knowledge_contest/leaderboard.php">知识竞赛 <span class="arrow-icon">&#60;</span></a>
        <ul class="nav-secondary">
          <li id="qustions"><a href="../knowledge_contest/quiz.php">答题</a></li>
          <li id="ranking-list"><a href="../knowledge_contest/leaderboard.php">排行榜</a></li>
          <li id="setter"><a href="../knowledge_contest/proposition.php">我要出题</a></li>
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
  <div class="main-content">   
  <!-- 视差动画层 -->
  <div class="background">
    <img class="bg_sky" src="../images/home/bg.jpg" alt="bg_sky">
    <img class="bg_water" src="../images/home/bg_water.png" alt="bg_water">
    <img class="book" src="../images/home/book(+500).png" alt="book">
    <img class="cloud cloud-left" src="../images/home/left_cloud(-420).png" alt="cloud-left">
    <img class="cloud cloud-right" src="../images/home/right_could(+500).png" alt="cloud-right">   
</div>
<!-- 书籍介绍 -->
<div class="brief_introduction">
<div class="book_container">
  <div class="page1" style="--i:4;background-image: url(../images/home/1.png);"></div>
  <div class="page2" style="--i:4;--s:1; background-image: url(../images/home/2.png);"></div>
  <div class="page3" style="--i:3;--s:2; background-image: url(../images/home/3.png);"></div>
  <div class="page4" style="--i:2;--s:3; background-image: url(../images/home/4.png);"></div>
  <div class="page5" style="--i:1;--s:4; background-image: url(../images/home/2.png);"></div>
</div>
<div class="ancient-text">
  <h2>《天工开物》简介</h2>
  <p>《天工开物》由明代宋应星著成，是一部涵盖多领域科技的古籍。它在中国古代物理方面意义非凡，涉及力学器械、流体力学水利、声学乐器、光学器具等知识应用，以详实图文记录古人智慧结晶，为研究古代物理发展提供关键依据，堪称科技史上的璀璨明珠。</p>
</div>
</div>
<!-- 书籍章节介绍(横向滚动) -->
<div class="book_sections">
  <div class="book_part book_part1">
    <div class="scrollobox part1_scrollobox">
      <div class="part_bg">
        <img id="part1_bg" src="../images/home/上篇.png">
        <p>上篇</p>
      </div>
      <div class="card part1_card">
      <img class="part_img" id="part1_img" src="../images/home/section1.png" onclick="alert('上篇');" >
    </div>
  </div>
</div>
  <div class="book_part book_part2">
    <div class="scrollobox part2_scrollobox">
      <div class="part_bg">
        <img id="part2_bg" src="../images/home/中篇.png">
        <p>中篇</p>
      </div>
      <div class="card part2_card">
      <img class="part_img" id="part2_img" src="../images/home/section2.png"> 
    </div>
  </div>
    </div>
  <div class="book_part book_part3">
    <div class="scrollobox part3_scrollobox">
      <div class="part_bg">
        <img id="part3_bg" src="../images/home/下篇.png">
        <p>下篇</p>
      </div>
      <div class="card part3_card">
      <img class="part_img" id="part3_img" src="../images/home/section3.png">
      
    </div>
  </div>
  </div>
</div>
<div class="author">
  <h1>宋应星简介</h1>
<div class="author_introduction">
    <div class="image-wrapper">
        <img src="../images/home/author.jpg" alt="宋应星">
    </div>
    <div class="intro">
        宋应星（1587年－1666年），字景星，号石门，明末清初的著名<strong class="highlight">工艺学家</strong>、技术专家。他是《<span class="highlight">天工开物</span>》的作者，这部书是中国古代工艺学的经典之作，详细记录了当时的农业、手工业、矿业等领域的技术与生产过程。
    </div>
    <div class="intro">
        宋应星通过广泛的实践与研究，对多种工艺技术进行了系统总结，尤其在机械、冶金、纺织等领域有显著贡献。他的理论和实践为中国古代工艺发展提供了宝贵的知识，影响深远。
    </div>    
</div>
</div>
  </div>
  </main>

  <footer>
    <p>联系我们</p>
    <p>1277339231@163.com| 19106825607</p>
  </footer> 
  <script src="basic_display.js"></script>
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