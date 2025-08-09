<?php
$is_login = false;
  session_start();
  if(isset($_SESSION['avatar_url'])){
      $is_login = true;
  }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>first</title>
	<link rel="icon" href="../../images/home/icon.png" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="first.css">

	<style>

		/* 添加浮动导航栏的样式 */
		.vertical-navbar {
			left: -150px;
			transition: left 0.3s ease;
			position: fixed;
			top: 50%;
			transform: translateY(-50%);
			background-color: rgba(255, 255, 255, 0.8);
			padding: 50px;
			border-radius: 0 5px 5px 0;
			box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
			z-index: 10;
		}
		.vertical-navbar ul {
			list-style-type: none;
			padding: 0;
		}
		.vertical-navbar ul li {
			height: 50px;
			margin: 10px 0;
		}
		.vertical-navbar ul li a {
			text-decoration: none;
			font-size: 20px;
			color: #333;
			font-weight: bold;
		}
		.vertical-navbar ul li a:hover {
			color: #f00;
		}

		

		.vertical-navbar:hover {
			left: 0;
		}
	</style>
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
          <li id="nav-bookPart1"><a href="first.php">上篇<span class="arrow-icon">&#60;</span></a>
            <ul class="nav-tertiary">
                <li id="book-naili"><a href="#sec1">乃粒（谷物种植）</a></li>
                <li id="book-naifu"><a href="#sec3">乃服（纺织制衣）</a></li>
                <li id="book-zhangshi"><a href="#sec5">彰施（染色工艺）</a></li>
                <li id="book-cuijing"><a href="#sec7">粹精（谷物提纯）</a></li>
                <li id="book-zuoxian"><a href="#sec9">作咸（食盐制造）</a></li>
                <li id="book-zheshi"><a href="#sec11">甘嗜（甘蔗制糖）</a></li>
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
<div class="vertical-navbar">
	<ul>
		<li><a href="#sec1">壹 乃粒</a></li>
		<li><a href="#sec3">贰 乃服</a></li>
		<li><a href="#sec5">叁 彰施</a></li>
		<li><a href="#sec7">肆 粹精</a></li>
		<li><a href="#sec9">伍 作咸</a></li>
		<li><a href="#sec11">陆 甘嗜</a></li>
		<li><a href="#banner" style="color: #451212;">回到顶部</a></li>
	</ul>
</div>

	<div class="banner parallax" id="banner">
		<div class="info">
			<h1>上    篇</h1>
			<h3>记载了常见谷物的栽培和加工方法，养蚕、纺织和染色的技术，以及制盐、造糖的工艺。</h3>
		</div>
	</div>
	<div id='sec1' class="sec1">
		<h1>壹 乃粒</h1>
		
	</div>
	<div class="sec2 parallax">
		<p>
			<span style="font-size: 24px;text-shadow: #370c0c 1px 1px 1px;">乃粒指天下谷物的栽培</span><br><br><br>
			· 古往今来，百姓都以粮食为自己生活所系。<br><br>
			· 尤其是中国很早即进入农耕时代，在漫长的农业社会，由于生产力水平低下，使老百姓不得不对温饱问题给予更多的关注。<br><br>
			· 俗语“民以食为天”出自《汉书·郦食其传》，书中说：“王者以民为天，而民以食为天。”<br><br>
			· 古人的“食”，多指“手中有粮，心中不慌”之意，因此谷物的种类和粮食作物的生产技术，是非常重要的。<br><br>
			· 原作者将其列为开篇第一卷，也是有意而为之。<br><br>
			· 本卷不仅讲述了水稻、小麦的 种植、栽培技术以及各种农具、水利灌溉器具，还提及了如黍、粟、菽（豆类）等农产品。
			<br><br><br>
			(背景展示了牛耕的场景)
		</p>	
	</div>
	<div id='sec3'class="sec3">
		<h1>贰 乃服</h1>
	</div>
	<div class="sec4 parallax">
		<p>
			<span style="font-size: 24px;text-shadow: #370c0c 1px 1px 1px;">乃服指养蚕、织布与制衣</span><br><br><br>
			· 人们常说“衣食住行”，日常穿用的衣服被排在了最前的位置。<br><br>
			· 中国的传统农业社会自古就强调“男耕女织”，在棉织业发展起来之前，丝织业是中国最重要的生产项目之一。<br><br>
			· 中国是世界上最早养蚕和织造丝绸的国家，早在三千多年前的商朝，蚕丝业就己经初具规模。<br><br>
			· 本书对于养蚕取丝和丝织品的制造过程讲述得特别详细，由蚕的生长、习性， 桑树的栽种，结茧时所需的照顾，取丝，织造，以及纺织机的各部构造都一一加以详述。<br><br>
			· 此外，本文还介绍了棉、麻等制衣的原料。<br><br><br>
			(背景展示了制丝过程)

		</p>
	</div>
	<div class="sec5" id="sec5">
		<h1>叁 彰施</h1>
	</div>
	<div class="sec6 parallax">
		<p>
			<span style="font-size: 24px;text-shadow: #370c0c 1px 1px 1px;">彰施指施染七彩的技艺</span><br><br><br>
			· 爱美的心理使得人类乐于追求缤纷的色彩。<br><br>
			· 既然提到织造的技巧，那么。染色这一古考的传统工艺自然也要添上一笔。<br><br>
			· 这一章主要讲述的是染料的制作方法和染色的种类。<br><br>
			· 当时染色最常见的是青、黄、红、白、黑五种，这五种是基本颜色，其他颜色都是由这五种基本色调再加上一些其他材料，混合变化而成的。<br><br><br>
			(背景展示了染色过程)
		</p>
	</div>
	<div id="sec7" class="sec7">
		<h1>肆 粹精</h1>
	</div>
	<div class="sec8 parallax">
		<p>
			<span style="font-size: 24px;text-shadow: #370c0c 1px 1px 1px;">粹精指各种谷物的加工</span><br><br><br>
			· 本书特别以专门的一章来记述谷类的加工，尤其偏重于稻麦。<br><br>
			· 这同样是与民生息息相关的事情。<br><br>
			· 特别有趣的是，在这一章中作者提到稻谷的脱粒有两种方法，一种是用手拍打，另一种是在晒谷场上用牛拉石磙使谷粒脱落。<br><br>
			· 第二种方法比第一种方法省力，但做种子的谷粒却不可以用这种方法脱粒，因为它会降低种子发茅的能力。<br><br><br>
			(背景展示了稻谷的加工过程)
		</p>
	</div>
	<div class="sec9" id="sec9">
		<h1>伍 作咸</h1>
	</div>
	<div class="sec10 parallax">
		<p>
			<span style="font-size: 24px;text-shadow: #370c0c 1px 1px 1px;">作咸指各种盐的制造方法</span><br><br><br>

			· 盐是人类生活的必需品。它不仅仅是调味品，更是人体不可缺的营养成分之一。<br><br>
			· 自古以来，盐在我国政治领域里一直扮演重要的角色，盐业曾多次被列为国家的专卖的产业，甚至早在周朝就已出现盐人的官职。<br><br>
			· 盐以各种形式出现在自然界，本书把盐分成六种，其中海盐、池盐、井盐因为出产较多，所以也就比较重要。<br><br>
			· 作者对制盐的过程记述得极为详尽，取得海盐还要依地势高低分成三种方法。<br><br>
			· 地势最高的用草木灰种盐；地势稍低、近海的地方，只要等潮水退去，可以 直接利用太阳晒出盐霜；而地势最低的海边，挖个深坑，<br>
			铺好沙子和竹席，等待潮水从坑口流过，海水就会渗进坑里，累积到一定程度就可以拿去煎煮。<br><br><br>
			(背景展示了制盐的过程)
		</p>
	</div>
	<div class="sec11" id="sec11">
		<h1>陆 甘嗜</h1>
	</div>
	<div class="sec12 parallax">
		<p>
			<span style="font-size: 24px;text-shadow: #370c0c 1px 1px 1px;">甘嗜指糖的种类与制造</span><br><br><br>
			· 糖对于百姓的日常生活来说，同样也是不可或缺的。<br><br>
			· 糖的来源有三种：一是甘蔗榨糖；二是蜂蜜；三是源于稻、麦等含糖的谷物。<br><br>
			· 《天工开物》中记载得最为详细的，是以甘蔗制糖的技术。<br><br>
			· 制糖要先榨汁，每枝甘蔗可以榨三次，然后把甘蔗汁放在锅里熬煮，火力要 强，否则所制的糖就会变成“顽糖”，最后一个步骤是结晶，<br>
			用一种叫做瓦溜的工具，把熬 好的糖浆倒进里面，再用黄泥水脱色，使杂质流掉，瓦溜里留下的就是白糖。<br><br><br>
			(图示为西方版画《制糖工坊》)
		</p>
	</div>
</div>
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