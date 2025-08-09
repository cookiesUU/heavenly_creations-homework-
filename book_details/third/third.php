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
  <title>Third</title>
  <link rel="icon" href="../../images/home/icon.png" type="image/x-icon">
  <link rel="stylesheet" href="third.css">
</head>

<body>
  <!-- 头部 -->
<header>
  <div class="title">
    <div class="logo">
      <img src="../../images/home/logo.png" alt="天工开物">
    </div>
    
    <h1>天工开物</h1>
  </div>
 

<!-- 总导航栏 -->
<nav id="main-nav" class="top-nav">
  <ul class="nav-primary">
    <li id="nav-home"><a href="../../basic_display/basic_display.php">首页</a></li>
    <li id="nav-book"><a href="../introduction.php">全书概览 <span class="arrow-icon">&#60;</span></a>
      <ul class="nav-secondary">
        <li id="nav-bookPart1"><a href="../first/first.php">上篇<span class="arrow-icon">&#60;</span></a>
          <ul class="nav-tertiary">
              <li id="book-naili"><a href="../first/first.php#sec1">乃粒（谷物种植）</a></li>
              <li id="book-naifu"><a href="../first/first.php#sec3">乃服（纺织制衣）</a></li>
              <li id="book-zhangshi"><a href="../first/first.php#sec5">彰施（染色工艺）</a></li>
              <li id="book-cuijing"><a href="../first/first.php#sec7">粹精（谷物提纯）</a></li>
              <li id="book-zuoxian"><a href="../first/first.php#sec9">作咸（食盐制造）</a></li>
              <li id="book-zheshi"><a href="../first/first.php#sec11">甘嗜（甘蔗制糖）</a></li>
                  </ul>
        </li>
        <li id="nav-bookPart2"><a href="../second/second.php">中篇<span class="arrow-icon">&#60;</span></a>
          <ul class="nav-tertiary">
            <li id="taoshan"><a href="../second/second.php">陶埏（陶瓷烧制）</a></li>
            <li id="yezhu"><a href="../second/second.php">冶铸（金属冶铸）</a></li>
            <li id="zhouche"><a href="../second/second.php">舟车（舟车制造）</a></li>
            <li id="chuiduan"><a href="../second/second.php">锤锻（金属锤锻）</a></li>
            <li id="fanshi"><a href="../second/second.php">燔石（矿石煅烧）</a></li>
            <li id="gaoye"><a href="../second/second.php">膏液（油脂榨取）</a></li>
            <li id="shaqing"><a href="../second/second.php">杀青（造纸工序）</a></li>
          </ul>
        </li>
        <li id="nav-bookPart3"><a href="third.php">下篇<span class="arrow-icon">&#60;</span></a>
          <ul class="nav-tertiary">
            <li id="wujin"><a href="third.php">五金（五金冶炼）</a></li>
            <li id="jiabing"><a href="third.php">佳兵（兵器制造）</a></li>
            <li id="danqing"><a href="third.php">丹青（颜料制作）</a></li>
            <li id="qvnie"><a href="third.php">曲蘖（酒曲酿造）</a></li>
            <li id="zhuyu"><a href="third.php">珠玉（珠宝采琢）</a></li>
          </ul>
        </li>
      </ul>
    </li>
    <li id="nav-objects"><a href="../../object_display/object_display.php">器物展示</a></li>
    <li id="nav-knowledge-contest"><a href="../../knowledge_contest/leaderboard.php">知识竞赛 <span class="arrow-icon">&#60;</span></a>
      <ul class="nav-secondary">
        <li id="qustions"><a href="../../knowledge_contest/quiz.php">答题</a></li>
          <li id="ranking-list"><a href="../../knowledge_contest/leaderboard.php">排行榜</a></li>
          <li id="setter"><a href="../../knowledge_contest/proposition.php">我要出题</a></li>
      </ul>
    </li>

  </ul>
</nav>
<div id="loginupORsetting">
    <?php if($is_login):?>
      <img id="logined" src="<?php echo '/web_final_work(Heavenly Creations)/user_system/setting/' . $_SESSION['avatar_url']; ?>" alt="login" width="50" height="50">
    <?php else:?>
      <img id="login" src="../../images/home/log.svg" alt="login" width="50" height="50">
    <?php endif;?>
  </div>

</header>

  <div id="header">
    <div id="header-title"><h1>下    篇</h1></div>
    <div id="header-content"><p>· 下篇共有5卷，各种矿产的开采与冶炼是其中最大的亮点。</p><br>
      <p>· 除此之外，对墨的制作以及兵器种类的介绍也占据了一定比重。</p><br>
      <p>· 价值连城的珠玉因与百姓生活殊无关联，被放在了最后一卷，再一次体现出作者朴素的农本思想。</p></div>
  </div>
  
  <div id="main">
    <div id="click-section">
      <div id="drawerboxes">
        <div class="drawerbox active">
          <button class="drawer-btn active" onclick="slideTo(1)"><h1>五金</h1>拾肆<span
              class="drawer-head">壹</span></button>
        </div>
        <div class="drawerbox">
          <button class="drawer-btn" onclick="slideTo(2)"><h1>佳兵</h1>拾伍<span
              class="drawer-head">贰</span></button>
        </div>
        <div class="drawerbox">
          <button class="drawer-btn" onclick="slideTo(3)"><h1>丹青</h1>拾陆<span 
            class="drawer-head">叁</span></button>
        </div>
        <div class="drawerbox">
          <button class="drawer-btn" onclick="slideTo(4)"><h1>曲蘗</h1>拾柒<span 
            class="drawer-head">肆</span></button>
        </div>
        <div class="drawerbox">
          <button class="drawer-btn" onclick="slideTo(5)"><h1>珠玉</h1>拾捌<span 
            class="drawer-head">伍</span></button>
        </div>
      </div>
    </div>
    <div id="slide-section">
      <div id="slide-bar">
        <div id="bar"></div>
      </div>
      <div id="card-section">
        <div id="card1" class="card">
          <div class="card-small-title">ShiSi WuJin</div>
          <div class="card-title">金属的开釆与冶炼</div>
          <div class="card-content">这一章介绍的是各种常见金属，包括金、银、铜、铁、锡、铅等的冶炼。
            冶炼金属在中国古代的各类著作一向少有叙述，而本书所介绍的内容则提供了极为宝贵的资料，例如
            古人已开始把冶炼生铁的冶铁炉跟制熟铁的设备共同使用，趁着生铁未冷却的时候，进 行脱碳过程，
            由此制成熟铁，从而减少再熔化的程序，以降低生产成本。</div>
          
          <div class="card-img">
            <img src="./img/wujin1.png" alt="">
          </div>
        </div>
        <div id="card2" class="card">
          <div class="card-small-title">ShiWu JiaBin</div>
          <div class="card-title">制造武器的方法</div>
          <div class="card-content">有人的地方就会有争端存在，如果得不到很好的调节，最终难免要诉诸武力。
            这一章主要提及的武器是弓与弩，特别是将弓箭的制造介绍得十分详尽，从制法、试弓到弓的保存，无一
            不全。不过，它的缺憾就是对火药的配方及配制讲得太简单，对中国战争史上频 繁出现的火箭更是连提也没
            有提到，总之，在这一方面，作者的记录不如明代其他的兵书来得详尽。</div>
          <div class="card-img">
            <img src="./img/jiabin2.png" alt="">
          </div>
        </div>
        <div id="card3" class="card">
          <div class="card-small-title">ShiLiu DanQin</div>
          <div class="card-title">墨与朱砂的制作</div>
          <div class="card-content">墨是文房四宝之一，对于文化传播的益处并不亚于纸。从“墨”字的写法来看，
            它是 由“黑”和“土”两部分构成，可能古人最早是用黑色的土壤之类的天然物质来制墨。至于用松烟或油烟
            来制墨的方法具体在什么年代出现，已经无法查证，只是知道至少在春秋时代就已经有墨的存在。中国制墨
            的技术，至明代已经发展到巅峰，尤其以宣德时代所产的为最佳。凡是松树分布广泛的地方，制墨就会比较
            发达，因此历史尤以安徽省出现的制墨名家最多。 </div>
          <div class="card-img">
            <img src="./img/danqin1.png" alt="">
          </div>
        </div>
        <div id="card4" class="card">
          <div class="card-small-title">ShiQi QuNie</div>
          <div class="card-title">制酒的酒曲</div>
          <div class="card-content">酒，在中国传统文化之中，占据着极其重要的地位。李白有诗云：“古来圣贤皆
            寂寞， 唯有饮者留其名。”中国人爱酒，也格外会酿酒。酿酒时，酒曲的选择最为重要。酒曲的好坏直接决
            定着酿酒的成败与否。甚至可以说，中国酿酒术的成就，就取决于制造酒曲的技术发展。</div>
          <div class="card-img">
            <img src="./img/qunie1.png" alt="">
          </div>
        </div>
        <div id="card5" class="card">
          <div class="card-small-title">ShiBa ZhuYu</div>
          <div class="card-title">宝石的产地与釆集</div>
          <div class="card-content">本篇主要是讲到各种稀有的珍珠、宝石、玉的产地与开采手段，另外也提到了水晶、
             玛瑙、玻璃等等。虽然本篇在解释珠玉宝石形成的原因时并不准确，并有神话传说的色彩，但是它介绍的水底、
             深井的操作技术，却是非常有用的记录。珠玉被放在本书的最后一篇，是因为作者认为这些东西与民生无关，与
             其民本思想是一致的。</div>
          <div class="card-img">
            <img src="./img/zhuyu1.png" alt="">
          </div>
        </div>
      </div>
    </div>
  </div>
  

  <script src="https://ajax.aspnetcdn.com/ajax/jquery/jquery-3.5.1.min.js"></script>
  <script>
    window.addEventListener('scroll', function () {
        let top = window.scrollY
        if (top != 0) {
                $('#header').css('top', '-100vh');
                $('#main').css('top', '30vh');
            } else {
                $('#header').css('top', '0');
                $('#main').css('top', '100vh');
            }
    })
    // 定义变量 
    let chosenSlideNumber = 1; // 当前选择的幻灯片编号 
    let offset = 0; // 幻灯片偏移量 
    let barOffset = 0; // 导航条偏移量 
    let intervalID; // 定时器 ID 
    // 获取所有抽屉按钮，并为每个按钮添加点击事件监听器 
    const drawerBtns = Array.from(document.querySelectorAll(".drawer-btn"));
    drawerBtns.forEach(btn => {
      btn.addEventListener("click", () => {
        clearInterval(intervalID); // 清除定时器 
      })
    })
    // 获取幻灯片区域 
    const slideSection = document.querySelector("#slide-section");
    // 鼠标移入幻灯片区域时清除定时器 
    slideSection.addEventListener("mouseenter", () => {
      clearInterval(intervalID);
    })
    // 切换到指定编号的幻灯片 
    function slideTo(slideNumber) {
      drawerboxToggle(slideNumber); // 切换抽屉面板状态 
      drawerbtnToggle(slideNumber); // 切换抽屉按钮状态 
      // 更新偏移量 
      let previousSlideNumber = chosenSlideNumber;
      chosenSlideNumber = slideNumber;
      offset += (chosenSlideNumber - previousSlideNumber) * (-100); // 计算幻灯片偏移量 
      barOffset += (chosenSlideNumber - previousSlideNumber) * (100); // 计算导航条偏移量 
      barSlide(barOffset); // 移动导航条 
      // 获取所有幻灯片，为每个幻灯片设置偏移量 
      const slides = document.querySelectorAll(".card");
      Array.from(slides).forEach(slide => {
        slide.style.transform = `translateY(${offset}%)`;
      })
    }
    // 切换抽屉面板状态 
    function drawerboxToggle(drawerboxNumber) {
      let prevDrawerboxNumber = chosenSlideNumber;
      const drawerboxes = document.querySelectorAll(".drawerbox");
      drawerboxes[prevDrawerboxNumber - 1].classList.toggle("active"); // 切换前一个抽屉面板的状态 
      drawerboxes[drawerboxNumber - 1].classList.toggle("active"); // 切换当前抽屉面板的状态 
    }
    // 切换抽屉按钮状态 
    function drawerbtnToggle(drawerBtnNumber) {
      let prevDrawerBtnNumber = chosenSlideNumber;
      const drawerBtns = document.querySelectorAll(".drawer-btn");
      drawerBtns[prevDrawerBtnNumber - 1].classList.toggle("active"); // 切换前一个抽屉按钮的状态 
      drawerBtns[drawerBtnNumber - 1].classList.toggle("active"); // 切换当前抽屉按钮的状态 
    }
    // 移动导航条 
    function barSlide(barOffset) {
      const bar = document.querySelector("#bar");
      bar.style.transform = `translateY(${barOffset}%)`;
    }

    
      document.getElementById("loginupORsetting").addEventListener('click', function () {
        <?php if($is_login):?>
          window.location.href = '../../user_system/setting/setting.php';
        <?php else:?>
          window.location.href = '../../user_system/login_signup_page.php';
        <?php endif;?>   
      })
  </script>
</body>
</html>