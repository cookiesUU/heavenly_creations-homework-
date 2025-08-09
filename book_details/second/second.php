<?php
$is_login = false;
  session_start();
  if(isset($_SESSION['avatar_url'])){
      $is_login = true;
  }
?>
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Second</title>
    <link rel="icon" href="../../images/home/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="second.css">
   
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
          <li id="nav-bookPart2"><a href="second.php">中篇<span class="arrow-icon">&#60;</span></a>
            <ul class="nav-tertiary">
              <li id="taoshan"><a href="second.php">陶埏（陶瓷烧制）</a></li>
              <li id="yezhu"><a href="second.php">冶铸（金属冶铸）</a></li>
              <li id="zhouche"><a href="second.php">舟车（舟车制造）</a></li>
              <li id="chuiduan"><a href="second.php">锤锻（金属锤锻）</a></li>
              <li id="fanshi"><a href="second.php">燔石（矿石煅烧）</a></li>
              <li id="gaoye"><a href="second.php">膏液（油脂榨取）</a></li>
              <li id="shaqing"><a href="second.php">杀青（造纸工序）</a></li>
            </ul>
          </li>
          <li id="nav-bookPart3"><a href="../third/third.php">下篇<span class="arrow-icon">&#60;</span></a>
            <ul class="nav-tertiary">
              <li id="wujin"><a href="../third/third.php">五金（五金冶炼）</a></li>
              <li id="jiabing"><a href="../third/third.php">佳兵（兵器制造）</a></li>
              <li id="danqing"><a href="../third/third.php">丹青（颜料制作）</a></li>
              <li id="qvnie"><a href="../third/third.php">曲蘖（酒曲酿造）</a></li>
              <li id="zhuyu"><a href="../third/third.php">珠玉（珠宝采琢）</a></li>
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
<div class="main">
    <div id="header">
        <div id="header-title"><h1>中    篇</h1></div>
        <div id="header-content"><p>· 中篇提及的7种产业，同样是对于百姓生活非常重要的工艺。</p><br>
            <p>· 所谓“天工开物”，讲的正是人力对天然之物的巧妙利用。这一思想在本篇中体现得最为充分。</p><br>
            <p>· 没有古人不断总结的经验与智慧，也不可能产生出烧制陶瓷、冶铸与锤锻、制作舟车等等这些巧夺天工的技艺。</p>
          </div>
        </div>
    
    <div class="main1">
        <nav> 
        <div class="a">
            <div class='b'><img src='img/taoyan2.png' data-content='content1'></div>
            <div class='b'><img src='img/yanzhu2.png' data-content='content2'></div>
            <div class='b'><img src='img/zhouche2.png' data-content='content3'></div>
            <div class='b'><img src='img/chuiduan2.png' data-content='content4'></div>
            <div class='b'><img src='img/fanshi2.png' data-content='content5'></div>
            <div class='b'><img src='img/gaoyou2.png' data-content='content6'></div>
            <div class='b'><img src='img/shaqin2.png' data-content='content7'></div>
        </div>
        </nav>
    </div>

        <div class="main2">
            <div id='content'>
                <div id='content1' class='content-div'>
                    <div class="number">7</div>
                    <h1>柒 陶埏</h1><br>
                    <h2>烧制砖、瓦与陶瓷</h2><br>
                    <p>
                        我国陶瓷器皿的起源，可以追溯到早在六千多年前的石器时代，新石器时代的彩陶所表现出的高度艺术性已足以令今人瞠目结舌。<br>
                        而随后发展出来的中国瓷器工艺，更是扬名于世界各地。<br>
                        古人制陶，一开始仅是单纯地利用双手，后来出现了陶车，而且人们逐渐对于陶土的黏性和可塑性，以及火的利用和控制都有了更深刻的认识。<br>
                        制陶的大略过程要经过选土、 陶车造坯、过水、上釉、进窑等许多程序，至于一些微细的环节还没有计算在内。
                    </p>
                    <img src="img/taoyan1.png" style="height: 40vh; width: auto; margin: 50px 50px;">
                </div>
                <div id='content2' class='content-div'>
                    <div class="number">8</div>
                    <h1>捌 冶铸</h1><br>
                    <h2>钟、鼎等器物的铸造</h2><br>
                    <p>
                        这一章介绍的是各种常见金属，包括金、银、铜、铁、锡、铅等的冶炼。<br>
                        冶炼金属在中国古代的各类著作一向少有叙述。<br>
                        而本书所介绍的内容则提供了极为宝贵的资料，例如,古人已开始把冶炼生铁的冶铁炉跟制熟铁的设备共同使用，趁着生铁未冷却的时候，进行脱碳过程，由此制成熟铁，从而减少再熔化的程序，以降低生产成本。<br>
                        冶铸这门工艺，从黄帝时代在首山采铜铸鼎开始，已经有很长的历史了。<br>
                        夏禹时期，九州进贡金属给禹王，之后便铸成大鼎。<br>
                        自此以后，冶铸的技术就日新月异地发展起来。<br>
                    </p>
                    <img src="img/yanzhu1.png" style="height: 40vh; width: auto; margin: 50px 50px;">


                </div>
                <div id='content3' class='content-div'>
                    <div class="number">9</div>

                    <h1>玖 舟车</h1><br>
                    <h2>舟车的制作及使用</h2><br>
                    <p>
                        中国北方黄河急湍，水位变化又大，其他较小的河流也不适宜行舟，所以通常以各类马车为最主要的工具。<br>
                        南方则因湖泊密布，沿海一带生产和贸易又特别兴盛，舟船自然发达。<br>
                        明代时，郑和七次下西洋，可见当时的造船技术已相当发达，足以抵御一般的风浪，航行到更开阔的远洋之中。<br>
                    </p>
                    <img src="img/zhouche1.png" style="height: 40vh; width: auto; margin: 50px 50px;">
                </div>
                <div id='content4' class='content-div'>
                    <div class="number">10</div>

                    <h1>拾 锤锻</h1><br>
                    <h2>铁器和铜器的制作</h2><br>
                    <p>
                        锻造是对金属更进一步的加工。<br>
                        古代锻造技术对于熟铁最重要的热处理方法是“淬”，又称为“健”。<br>
                        这道工序是为了使钢铁具有更好的韧性。<br>
                        值得注意的，还有另外一种技术“生铁淋口”，基本上可以算是灌钢技术的进一步发展。<br>
                        把生铁熔成铁液，淋在刚锻打好的熟铁用具的刀口上，然后入水淬过，这样刀口的部分就变成了钢。<br>
                        书中举例说，一斤重的锄，淋上常铁三钱，太少不够坚硬，太多又过于坚硬反而容易折断。<br>
                    </p>

                    <img src="img/chuiduan1.png" style="height: 40vh; width: auto; margin: 50px 50px;">
                </div>
                <div id='content5' class='content-div'>
                    <div class="number">11</div>

                    <h1>拾壹 燔石</h1><br>
                    <h2>石灰、煤炭等的煅烧</h2><br>
                    <p>
                        火与石的结合可以发生非常神奇的化学变化。<br>
                        这一篇所主要讲述的就是一些非金属类矿石的炼制方法，特别讨论了一些烧制石灰、采煤和烧炼矾石、硫磺、砒石的技术，并且对煤炭分类、采掘，以及矿业安全措施也都有所记载。<br>
                    </p>
                    <img src="img/fanshi1.png" style="height: 40vh; width: auto; margin: 50px 50px;">

                </div>
                <div id='content6' class='content-div'>
                    <div class="number">12</div>

                    <h1>拾贰 膏液</h1><br>
                    <h2>油的种类与榨油的方法</h2><br>
                    <p>
                        这一章所讲的是制油的技术，中国古代的北方游牧民族自早的时候就懂得和何利用动物性油脂，至于植物性油脂的取得，就不知道自何时、何人开始了。<br>
                        油的应用非常广泛，古人所用的油灯要用油，烧菜要用油，有些交通工具也要用油来润滑。<br>
                        时于天然可以利用来榨油的草木之实，本书都一一对其加以分类和排名，例如制作食用油时，原料以芝麻、萝卜子、黄豆、大白菜籽等为一级原料等等。<br>
                    </p>
                    <img src="img/gaoyou1.png" style="height: 40vh; width: auto; margin: 50px 50px;">
                </div>
                <div id='content7' class='content-div'>
                    <div class="number">13</div>

                    <h1>拾叁 杀青</h1><br>
                    <h2>造纸的方法</h2><br>
                    <p>
                        中国最早是没有纸的，由结绳记事到利用竹简，直至最后纸才出现。<br>
                        纸给人们的日常生活带来了很大的便利，如果没有它，简直无法想象知识和信息该如何广泛地传递。<br>
                        这一章详细讲述了造纸的方法，对于常人所认为的造纸由东汉蔡伦发明的说法，本书的作者很不以为然，认为中国造纸的历史其实要久远得多。<br>
                    </p>
                    <img src="img/shaqin1.png" style="height: 40vh; width: auto; margin: 50px 50px;">
                </div>
            </div>
        </div>
      </div>    
    <script>
        document.querySelectorAll('nav .b img').forEach(img => {
            img.addEventListener('click', function() {
                document.querySelectorAll('.content-div').forEach(div => div.style.display = 'none');
                document.getElementById(this.dataset.content).style.display = 'block';
            });
            img.addEventListener('mouseover', function() {
                document.querySelectorAll('.content-div').forEach(div => div.style.display = 'none');
                document.getElementById(this.dataset.content).style.display = 'block';
            });
        });
        document.querySelectorAll('.content-div').forEach(div => div.style.display = 'none');
        document.getElementById('content1').style.display = 'block';
    </script>

    <script>
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