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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>全书概要</title>
    <link rel="icon" href="../images/home/icon.png" type="image/x-icon">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
             
        }
        body {
            width: 100vw;
            background-image: url("images/bg.jpg");
            background-size: cover;
            background-attachment: fixed;
        }

        .header {
            position: relative;
            margin: -100vh 0 20px 0;
            width: 100%;
            height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background-color: rgba(255, 255, 255, 0.5);
            z-index: 1;
        }

        .header h1 {
            font: 70px/60px 'kaiti';
            -webkit-text-fill-color: rgba(0, 0, 0, 0.864);
            color: #0a231b;
            font-weight: 550;
            text-shadow: 10px 1px 10px #ffc3c3;
            line-height: 1.5;
        }

        .header h3{
            font: 18px/22px 'kaiti';

        }
        .main a {
            font-weight: 600;
            font-size: 20px;
            text-decoration: none;
            color: #384962;
        }

        a:hover {
            color: #85a5d2;
        }

        a h2:hover {
            font: 60px/60px 'kaiti';
            -webkit-text-fill-color: rgba(242, 255, 0, 0.864);
            -webkit-text-stroke-color: #7bbd24;
            -webkit-text-stroke-width: 0.1px;
            fill: rgb(255, 255, 255);
            font-weight: 900;
            color: #0a231b;
            text-shadow: 10px 1px 10px #ffc3c3;
            transform: translateY(-20px);
            transition: .9s;
        }
        
        .main {
            width: 100%;
            height: auto;
            top: 100vh;
            position: relative;
            transition: .2s;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 100px;
            font: 16px/1 'kaiti'; 
        }
        
        .section {
            width: 90%;
            height: auto;
            display: flex;
            flex-direction: column;
            margin-bottom: 100px;
            overflow: hidden;
            align-items: center;
            position: relative;
        }
        
        .row {
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 50px;
        }
        
        .content {
            width: 55%;
            height: 400px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            box-shadow: 0 0 15px rgba(95, 95, 95, 0.5);
            background-color: rgba(255, 255, 255, 0.581);
            overflow: hidden;
            position: relative;
            margin: 20px 10px;
        }
        
        @keyframes transform {
            0% {
                transform: rotate(30deg) translate(0);
            }
        
            50% {
                transform: rotate(40deg) translate(10px);
            }
        
            100% {
                transform: rotate(30deg) translate(0px);
            }
        }
        
        .footer {
            position: relative;
            width: 80%;
            margin-top: 40px;
            transform: translateY(400px);
            opacity: 0;
            transition: .9s;
            transition-delay: .3s;
        }
        
        .footer p {
            position: absolute;
            display: block;
            right: 0;
            font-family: 'kaiti'; 
        }
        
        .top {
            display: flex;
            position: relative;
            width: 85%;
            transform: translateY(400px);
            opacity: 0;
            transition: .8s;
        }
        
        .top h2 {
            font: 60px/60px 'kaiti';
            -webkit-text-fill-color: rgba(90, 94, 0, 0.864);
            -webkit-text-stroke-color: #1b2f00;
            -webkit-text-stroke-width: 0.1px;
            fill: rgb(255, 255, 255);
            font-weight: 900;
            color: #0a231b;
            text-shadow: 10px 1px 10px #ffc3c3;
            transform: translateY(-20px);
            transition: .8s;
        }
        
        .top span {
            -webkit-text-fill-color: rgba(0, 0, 0, 0.2);
            -webkit-text-stroke-color: #4d6077;
            -webkit-text-stroke-width: 2px;
            margin-left: 20px;
            margin-top: 0;
            font: 40px 'kaiti';
        }

        .bottom {
            width: 85%;
            height: auto;
            transform: translateY(400px);
            transition: .8s;
            transition-delay: .2s;
            font-size: 16px;
        }
        
        .image {
            width: 30%;
            height: 500px;
            background-size: cover;
            border: 5px solid #000;
            margin: 0px 10px;
        }

        .image:hover {
            transform: scale(0.9);
            transition: transform 0.3s ease;
        }
        .image:not(:hover) {
            transform: scale(1);
            transition: transform 0.5s ease;
        }

        .image-1 {
            background-image: url("images/image1.jpg");
            background-size: cover;
        }

        .image-2 {
            background-image: url("images/image2.jpg");
        }

        .image-3 {
            background-image: url("images/image3.jpg");
        }

        .book-row {
            display: flex;
            justify-content: space-around;
            width: 100%;
        }
        .book {
            text-align: center;
            width: 30%;
        }
        .book img {
            width: 100%;
            height: auto;
        }

    </style>
    <link rel="stylesheet" href="header.css">
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
      <li id="nav-book"><a href="introduction.php">全书概览 <span class="arrow-icon">&#60;</span></a>
        <ul class="nav-secondary">
          <li id="nav-bookPart1"><a href="first/first.php">上篇<span class="arrow-icon">&#60;</span></a>
            <ul class="nav-tertiary">
                <li id="book-naili"><a href="first/first.php#sec1">乃粒（谷物种植）</a></li>
                <li id="book-naifu"><a href="first/first.php#sec3">乃服（纺织制衣）</a></li>
                <li id="book-zhangshi"><a href="first/first.php#sec5">彰施（染色工艺）</a></li>
                <li id="book-cuijing"><a href="first/first.php#sec7">粹精（谷物提纯）</a></li>
                <li id="book-zuoxian"><a href="first/first.php#sec9">作咸（食盐制造）</a></li>
                <li id="book-zheshi"><a href="first/first.php#sec11">甘嗜（甘蔗制糖）</a></li>
                    </ul>
          </li>
          <li id="nav-bookPart2"><a href="second/second.php">中篇<span class="arrow-icon">&#60;</span></a>
            <ul class="nav-tertiary">
              <li id="taoshan"><a href="second/second.php">陶埏（陶瓷烧制）</a></li>
              <li id="yezhu"><a href="second/second.php">冶铸（金属冶铸）</a></li>
              <li id="zhouche"><a href="second/second.php">舟车（舟车制造）</a></li>
              <li id="chuiduan"><a href="second/second.php">锤锻（金属锤锻）</a></li>
              <li id="fanshi"><a href="second/second.php">燔石（矿石煅烧）</a></li>
              <li id="gaoye"><a href="second/second.php">膏液（油脂榨取）</a></li>
              <li id="shaqing"><a href="second/second.php">杀青（造纸工序）</a></li>
            </ul>
          </li>
          <li id="nav-bookPart3"><a href="third/third.php">下篇<span class="arrow-icon">&#60;</span></a>
            <ul class="nav-tertiary">
              <li id="wujin"><a href="third/third.php">五金（五金冶炼）</a></li>
              <li id="jiabing"><a href="third/third.php">佳兵（兵器制造）</a></li>
              <li id="danqing"><a href="third/third.php">丹青（颜料制作）</a></li>
              <li id="qvnie"><a href="third/third.php">曲蘖（酒曲酿造）</a></li>
              <li id="zhuyu"><a href="third/third.php">珠玉（珠宝采琢）</a></li>
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
    
    <div class="main" style="place-items: center;">
        <div class="header">
            <h1>关于本书</h1><br><br>
            <h3>· 《天工开物》是明代学者宋应星所著，刊印于明朝崇祯十年（1637年），全书分上、中、下 三篇，又细分做18卷。<br><br>
                · <a href="first/first.php">上篇</a>记载了常见谷物的栽培和加工方法，养蚕、纺织和染色的技术， 以及制盐、造糖的工艺。<br><br>
                · <a href= "second/second.php" >中篇</a>包括砖瓦、陶瓷的制作，舟车的制造，金属的铸锻，煤炭、石灰、硫黄、白矾的开采和烧制，以及榨油、造纸方法等。<br><br>
                · <a href="third/third.php" >下篇</a>则主要集中于矿物的开采和冶 炼，兵器的制造，颜料、酒曲的生产，以及宝石的采集加工等。</h3>
        </div>
        <div class="section">
            <div class="row">
                <div class="content">
                    <div class="top">
                        <a href="first/first.php"><h2>上</h2></a>
                        <span>篇所收入6卷</span>
                    </div>
                    <div class="bottom">
                        <br><br>
                        <span style="color: rgb(25, 25, 25); font-size: large;">其主题都离不开百姓“吃”“穿”二字，哲学工艺的产品是人们在生活中须臾不可离开的。由于作者所怀有的重视农业与民生的思想，本篇在全书中不仅着墨最多，所绘制的插图也极其详细、鲜活。</span><br /><br />
                    </div>
                    <div class="footer">
                        <span style="font-family: font;"><p>点击图片查看详情  >></p></span>
                    </div>
                </div>
                <div class="image image-1"></div>
            </div>
            <div class="row">
                    <div class="image image-2"></div>
                <div class="content">
                    <div class="top">
                        <a href="second/second.php"><h2>中</h2></a>
                        <span>篇提及7种产业</span>
                    </div>
                    <div class="bottom">
                        <br><br>
                        <span style="color: rgb(25, 25, 25); font-size: large;">同样是对于百姓生活非常重要的工艺。所谓“天工开物”，讲的正是人力对天然之物的巧妙利用。这一思想在本篇中体现得最为充分。没有古人不断总结的经验与智慧，也不可能产生出烧制陶瓷、冶铸与锤锻、制作舟车等等这些巧夺天工的技艺。</span><br /><br />
                        
                    </div>
                    <div class="footer">
                        <span ><p style="left: 0;"><<  点击图片查看详情</p></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="content">
                    <div class="top">
                        <a href="third/third.php"><h2>下</h2></a>
                        <span>篇所收入5卷</span>
                    </div>
                    <div class="bottom">
                        <br><br>
                        <span style="color: rgb(25, 25, 25); font-size: large;">各种矿产的开采与冶炼是其中最大的亮点。除此之外，对墨的 制作以及兵器种类的介绍也占据了一定比重。价值连城的珠玉因与百姓生活殊无关联，被放在了最后一卷，再一次体现出作者朴素的农本思想。</span><br /><br />
                    </div>
                    <div class="footer">
                                                <span style="font-family: font;"><p>点击图片查看详情  >></p></span>

                    </div>
                </div>
                <div class="image image-3"></div>
            </div>
        </div>
        <div class="divider">
            <img src="images/🐂.jpg" alt="Divider" style="width: 100%; height: auto;">
        </div>
    </div>
</body>
<!-- 引入jquery -->
<script src="https://ajax.aspnetcdn.com/ajax/jquery/jquery-3.5.1.min.js"></script>
<script>
       window.addEventListener('scroll', function () {
        let top = window.scrollY;
        
        // 上篇上浮效果
        if (top > 300) {
            $('.row:nth-child(1) .top').css('opacity', '1');
            $('.row:nth-child(1) .top').css('transform', 'translateY(0px)');
            $('.row:nth-child(1) .bottom').css('opacity', '1');
            $('.row:nth-child(1) .bottom').css('transform', 'translateY(0px)');
            $('.row:nth-child(1) .footer').css('opacity', '1');
            $('.row:nth-child(1) .footer').css('transform', 'translateY(0px)');
        } else {
            $('.row:nth-child(1) .top').css('opacity', '0');
            $('.row:nth-child(1) .top').css('transform', 'translateY(400px)');
            $('.row:nth-child(1) .bottom').css('opacity', '0');
            $('.row:nth-child(1) .bottom').css('transform', 'translateY(400px)');
            $('.row:nth-child(1) .footer').css('opacity', '0');
            $('.row:nth-child(1) .footer').css('transform', 'translateY(400px)');
        }

        // 中篇上浮效果
        if (top > 750) {
            $('.row:nth-child(2) .top').css('opacity', '1');
            $('.row:nth-child(2) .top').css('transform', 'translateY(0px)');
            $('.row:nth-child(2) .bottom').css('opacity', '1');
            $('.row:nth-child(2) .bottom').css('transform', 'translateY(0px)');
            $('.row:nth-child(2) .footer').css('opacity', '1');
            $('.row:nth-child(2) .footer').css('transform', 'translateY(0px)');
        } else {
            $('.row:nth-child(2) .top').css('opacity', '0');
            $('.row:nth-child(2) .top').css('transform', 'translateY(400px)');
            $('.row:nth-child(2) .bottom').css('opacity', '0');
            $('.row:nth-child(2) .bottom').css('transform', 'translateY(400px)');
            $('.row:nth-child(2) .footer').css('opacity', '0');
            $('.row:nth-child(2) .footer').css('transform', 'translateY(400px)');
        }

        // 下篇上浮效果
        if (top > 1200) {
            $('.row:nth-child(3) .top').css('opacity', '1');
            $('.row:nth-child(3) .top').css('transform', 'translateY(0px)');
            $('.row:nth-child(3) .bottom').css('opacity', '1');
            $('.row:nth-child(3) .bottom').css('transform', 'translateY(0px)');
            $('.row:nth-child(3) .footer').css('opacity', '1');
            $('.row:nth-child(3) .footer').css('transform', 'translateY(0px)');
        } else {
            $('.row:nth-child(3) .top').css('opacity', '0');
            $('.row:nth-child(3) .top').css('transform', 'translateY(400px)');
            $('.row:nth-child(3) .bottom').css('opacity', '0');
            $('.row:nth-child(3) .bottom').css('transform', 'translateY(400px)');
            $('.row:nth-child(3) .footer').css('opacity', '0');
            $('.row:nth-child(3) .footer').css('transform', 'translateY(400px)');
        }
    });

    $('.image-1').click(function () {
        window.location.href = 'first/first.php';
    });

    $('.image-2').click(function () {
        window.location.href = 'second/second.php';
    });

    $('.image-3').click(function () {
        window.location.href = 'third/third.php';
    });

    document.getElementById("loginupORsetting").addEventListener('click', function () {
    <?php if($is_login):?>
        window.location.href = '../user_system/setting/setting.php';
    <?php else:?>
        window.location.href = '../user_system/login_signup_page.php';
    <?php endif;?>   
    })
</script>
</html>