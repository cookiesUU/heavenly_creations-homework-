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
    <title>天工开物相关器具介绍</title>
    <link rel="icon" href="../images/home/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="object_display.css">
    <script src="https://cdn.jsdelivr.net/npm/matter-js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
      <li id="nav-objects"><a href="object_display.php">器物展示</a></li>
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
<div class="main">
    <div class="title">
        <h1>天工开物提及相关器具介绍</h1>
        <h3 style="margin:20px;font-size:16px">
            《天工开物》作为中国古代科技与工艺的集大成之作，宛如一部生动的史书，详尽地记载了古代劳动人民在各个生产领域的智慧结晶与杰出创造。<br><br>
            在其丰富的篇章中，农业、纺织、交通、兵器等领域的器具闪耀着独特的光芒，它们是时代的产物，更是文明进步的有力见证。<br><br>
            这些器具蕴含着古人对自然规律的深刻洞察、对材料特性的精准把握以及对工艺技巧的娴熟运用。<br><br>
        </h3>
    </div>
    <div class="section zhongdi_gifs" id="introduction">
      
      <p>古代农耕为社稷根基，粮食收成关联民生社稷。灌溉是农业关键，而龙骨水车恰似甘霖。它借助人力、畜力或水力，高效引低处水灌溉高处农田，提升灌溉效率，助力粮食丰收，推动农业发展，彰显古代劳动人民智慧，是农耕文明重要部分。 </p>
      
    <img src="images/zhongdi1.gif" alt="zhongdi1" >
    <img src="images/zhongdi2.gif" alt="zhongdi2" >
    <img src="images/zhongdi3.gif" alt="zhongdi3" >
    <img src="images/zhongdi4.gif" alt="zhongdi4" >
    </div>
    <div class="section interaction" id="LongGuShuiChe">
      <!-- 能量变化图表 -->
      <canvas id="energy-chart" width="300" height="200"></canvas>
        <!-- 物理模拟的画布 -->
        <canvas id="world" width="300" height="200" style="display:none;"></canvas>
        <canvas id="world2" width="300" height="200" ></canvas>
        <button id="startButton">点击模拟水车运动</button>
    </div>
    <div class="section interaction" id="PiLiPao">
    <canvas id="cannon" width="300" height="200" ></canvas> 
    <button id="startButton2">点击模拟霹雳炮</button>
    </div>
    
    <div class="section" id="agricultural-tools">
        <h2>农业器具</h2>
        <div class="cards">
            <div class="card" id="lei-si">
                <img src="images/leisi3.png" alt="耒耜">
                <div class="card-content">
                    <p><strong>介绍：</strong>耒耜是我国古代重要的翻土农具。耒是耒耜的柄，耜是下端的起土部分，一般为木制，也有在耜头部分安装金属刃的情况。其形状类似于现在的铲子，但是结构更为简单、原始。在使用时，人们通过手持耒耜的柄，用力将耜插入土中，然后利用杠杆原理将土块翻起，为播种等农事活动做准备。</p>
                    <p><strong>作用和意义：</strong>它是古代农业生产从刀耕火种阶段进入到耜耕阶段的标志。耒耜的出现大大提高了土地开垦和翻耕的效率，使得人们能够更有效地利用土地进行种植，增加了农作物的产量，推动了古代农业的进步。</p>
                </div>
                <h3>耒耜(lěi sì)</h3>
            </div>

            <div class="card" id="lian-jia">
                <img src="images/lianjia3.png" alt="连枷">
                <div class="card-content">
                    <p><strong>介绍：</strong>连枷是一种由一个长柄和一组可以活动的木板或竹板组成的农具。长柄一般为木制，长度便于人们手持操作。木板或竹板通过绳索等连接在长柄一端，在使用时，人们手持长柄，挥动连枷，使木板或竹板绕轴旋转，拍打在收获后的农作物（如谷物）上，从而将谷粒从谷穗等上面分离出来。</p>
                    <p><strong>作用和意义：</strong>在农业收获季节发挥关键作用。对于谷物等农作物的脱粒，它是一种高效的工具。相比手工剥粒，连枷大大提高了脱粒速度，节省了人力，能够快速地处理大量收获的农作物，是古代农业收获后加工环节必不可少的工具。</p>
                </div>
                <h3>连枷</h3>
            </div>

            <div class="card" id="feng-che">
                <img src="images/fengshanche3.png" alt="风扇车">
                <div class="card-content">
                    <p><strong>介绍：</strong>古代的风车主要用于谷物的清选。它一般是一个方形的木制器具，有一个进料口、一个出风口和一个出料口。内部设有扇叶，通过手摇或者其他动力（如水力、风力）驱动扇叶旋转。当谷物从进料口进入风车后，在扇叶产生的风力作用下，较轻的杂质（如谷壳、灰尘等）会从出风口被吹出，而较重的谷物则从出料口落下，从而实现谷物的筛选和清洁。</p>
                    <p><strong>作用和意义：</strong>这是古代农业生产中谷物加工的重要设备。它能够有效去除谷物中的杂质，提高谷物的质量，保证了粮食储存的安全性和食用的口感。风车的出现体现了古代农业生产在收获后加工环节的精细化程度，对粮食的有效利用起到了积极的促进作用。</p>
                </div>
                <h3>风扇车</h3>
            </div>
        </div>
    </div>

    <div class="section " id="textile-tools">
        <h2>纺织器具</h2>
        <div class="cards">
            <div class="card" id="luo-che">
                <img src="images/luoche1.png" alt="络车">
                <div class="card-content">
                    <p><strong>介绍：</strong>络车是用于将丝线或麻线绕在纡子（一种小型的线轴）上的工具。它通常有一个可以旋转的轴，轴上有一个框架用于放置纡子。使用时，将丝线或麻线的一端固定在纡子上，然后通过转动络车的轴，使丝线或麻线均匀地缠绕在纡子上。络车的大小和形状可以根据实际需要有所不同，有的络车比较小巧，便于家庭使用，有的则相对较大，用于纺织作坊的批量生产。宋应星《天工开物》则对南络车的构造和用法记载得较具体，其文译成白话是：在光线好的屋檐下，把木架铺在地上，木架上插四根竹竿，名叫“络笃”。丝套在四根竹上。</p>
                    <p><strong>作用和意义：</strong>在纺织生产过程中，络车起着承上启下的作用。它将纺好的线进行整理和绕卷，方便后续的织造工序。通过络车缠绕的线更加整齐、均匀，有利于提高织造的质量和效率。同时，络车的使用也便于对线的储存和运输，是纺织生产线上不可或缺的一环。</p>
                </div>
                <h3>络车</h3>
            </div>

            <div class="card" id="hua-ji">
                <img src="images/huaji3.gif" alt="花机">
                <div class="card-content">
                    <p><strong>介绍：</strong>花机是一种复杂的纺织机械，用于织造带有复杂花纹的织物。它的结构较为庞大，主要由机架、经轴、卷轴、提花装置等部分组成。提花装置是花机的关键部件，通过控制经线的升降来织出各种花纹图案。织工需要经过长时间的训练才能熟练操作花机，在织造过程中，要根据织物的设计要求，精心调整花机的各个部件，使纬线准确地穿过经线，形成精美的花纹。</p>
                    <p><strong>作用和意义：</strong>花机的发明和使用代表了古代纺织技术的高度发达。它能够生产出华丽的织物，如丝绸中的云锦、蜀锦等，这些织物不仅用于制作高档的服装，还作为珍贵的商品用于贸易和朝贡等活动。花机所织出的织物体现了古代中国高超的纺织工艺和艺术水平，在国内外都享有很高的声誉。</p>
                </div>
                <h3>花机</h3>
            </div>

            <div class="card" id="sao-che">
                <img src="images/jiaoche1.png" alt="缫车">
                <div class="card-content">
                    <p><strong>介绍：</strong>缫车是用于缫丝的工具。它主要由煮茧锅、索绪装置、集绪和捻鞘装置以及卷绕装置等部分组成。在缫丝时，将蚕茧放入煮茧锅中，通过加热使茧丝的丝胶软化。然后利用索绪装置找出茧丝的头绪，经过集绪和捻鞘装置将多根茧丝合并、加捻，最后通过卷绕装置将缫好的丝绕在丝框上。缫车有手摇式和脚踏式等多种形式，其结构设计充分考虑了缫丝的工艺要求。</p>
                    <p><strong>作用和意义：</strong>缫车是古代丝绸生产的关键设备。它的出现使大规模缫丝成为可能，提高了缫丝的效率和质量。通过缫车缫出的丝可以更好地满足织造丝绸的需求，推动了古代丝绸产业的发展。中国古代丝绸之所以能够闻名世界，缫车在其中发挥了重要的技术保障作用。</p>
                </div>
                <h3>缫车</h3>
            </div>
            </div>
        </div>
    

    <div class="section" id="transportation-tools">
        <h2>交通器具</h2>
        <div class="cards">
            <div class="card" id="mu-chuan">
                <img src="images/shachuan1.png" alt="木船（沙船）">
                <div class="card-content">
                    <p><strong>介绍：</strong>沙船是中国古代一种性能优良的木船。它的船型特征为平底、方头、方艄，船身宽阔，一般有多个舱室。沙船的帆装为多桅多帆，桅杆可以根据风向调整帆的角度。船的吃水较浅，适合在沿海和江河的浅滩区域航行。船身采用榫卯结构和木板拼接而成，结构坚固，能够承受一定的风浪和载重。</p>
                    <p><strong>作用和意义：</strong>沙船是中国古代海上运输和航海活动的重要交通工具。在沿海贸易、渔业和漕运等领域发挥了关键作用。它可以运输大量的货物，如粮食、盐、丝绸等，促进了沿海地区的经济交流和发展。同时，沙船的航海性能使其能够远航，加强了与海外各国的联系，是古代海上丝绸之路的重要载体。</p>
                </div>
                <h3>木船（沙船）</h3>
            </div>

            <div class="card" id="du-lun-che">
                <img src="images/dulunche3.png" alt="独轮车">
                <div class="card-content">
                    <p><strong>介绍：</strong>独轮车是一种只有一个车轮的运输工具。车的主体部分一般由车架、车轮和车把组成。车架用于放置货物或载人，通常为木制，形状有长方形、梯形等多种。车轮位于车架的中间位置，一般比较大，车轮的轮辐和轮毂结构坚固，能够承受一定的重量。车把用于控制车辆的方向，人们通过推动车把来驱动独轮车前进。</p>
                    <p><strong>作用和意义：</strong>独轮车在古代交通中应用广泛，尤其适合在狭窄的道路和田间小道上行驶。它可以运输各种物资，如粮食、农具等，在农业生产和农村运输中发挥了重要作用。同时，独轮车也用于短途的货物运输和载人，方便了人们的出行和货物的流转，是一种简单而实用的交通工具。</p>
                </div>
                <h3>独轮车</h3>
            </div>

            <div class="card" id="hua-gan">
                <img src="images/huagan3.gif" alt="滑竿">
                <div class="card-content">
                    <p><strong>介绍：</strong>滑竿是一种简易的人力交通工具。它主要由两根长竹竿和一个座椅组成。两根竹竿一般比较长且结实，两端用绳索等材料固定，中间悬挂座椅。座椅一般用竹编或木制，上面可以放置坐垫等，以增加乘坐的舒适性。在使用时，由前后两个人抬着竹竿行走，乘客坐在座椅上，通过人力来运输乘客。</p>
                    <p><strong>作用和意义：</strong>滑竿主要用于山区等交通不便的地方。它可以在崎岖的山路等地形上行走，方便人们在没有马车等交通工具的情况下出行。在一些旅游胜地或山区，滑竿也成为一种特色的交通工具，为乘客提供了一种独特的乘坐体验，同时也体现了古代劳动人民因地制宜的交通智慧。</p>
                </div>
                <h3>滑竿</h3>
            </div>
        </div>
    </div>

    <div class="section" id="weapon-tools">
        <h2>兵器器具</h2>
        <div class="cards">
            <div class="card" id="nu">
                <img src="images/nu2.png" alt="弩">
                <div class="card-content">
                    <p><strong>介绍：</strong>弩是一种带有机械装置的射箭兵器。它由弩弓、弩臂、弩机等部分组成。弩弓一般比普通弓箭的弓力更强，弩臂是安装弩弓和弩机的部分，通常为木制，形状有长有短。弩机是弩的关键部件，包括望山（瞄准装置）、牙、悬刀等部分，通过机械结构实现了弩的延时发射功能。使用时，先将弩弦拉开并挂在弩机的牙上，将箭放置在弩臂上的箭槽内，通过瞄准望山进行瞄准，然后扣动悬刀，弩弦就会释放，将箭射出。</p>
                    <p><strong>作用和意义：</strong>弩在古代军事作战中有很大的优势。它的射程比普通弓箭更远，而且弩机的设计使得弩在发射时更加稳定，准确性更高。在战场上，弩可以对敌人进行远距离攻击，尤其是在防御作战中，如城墙上的守军使用弩，可以有效地阻止敌军的进攻。弩的出现改变了古代战争的战术，是冷兵器时代重要的远程兵器。</p>
                </div>
                <h3>弩</h3>
            </div>

            <div class="card" id="dao">
                <img src="images/miaodao2.png" alt="刀（苗刀）">
                <div class="card-content">
                    <p><strong>介绍：</strong>苗刀是中国古代的一种长刀。它的刀身细长，一般长度在一米以上，形状类似于禾苗，故而得名。苗刀的刀身呈弧形，刃口锋利，有单面刃和双面刃之分。刀柄一般也较长，便于双手握持，刀柄的材质多为木质，外面包裹有皮革等材料，增加握持的舒适性。刀鞘一般为木制，表面有漆饰，装饰精美。</p>
                    <p><strong>作用和意义：</strong>苗刀在武术和军事中都有重要作用。在武术领域，苗刀是一种非常有特色的兵器，其刀法多样，动作潇洒，具有很高的武术价值。在军事作战中，苗刀凭借其长度和锋利的刀刃，在近战中能够发挥巨大的威力，是古代士兵近战格斗的利器。</p>
                </div>
                <h3>刀（苗刀）</h3>
            </div>

            <div class="card" id="huo-qi">
                <img src="images/huoqi3.png" alt="火器（霹雳炮）">
                <div class="card-content">
                    <p><strong>介绍：</strong>霹雳炮是古代的一种火器。它的外壳一般为铸铁或竹筒，内部填充火药和各种弹丸（如铁砂、石子等）。在使用时，通过点燃引信，引发内部火药爆炸，将弹丸向外喷射。霹雳炮的形状有球形、筒形等多种，大小也各不相同，有的可以手持发射，有的则需要安装在特定的发射装置上。</p>
                    <p><strong>作用和意义：</strong>霹雳炮的出现是古代兵器从冷兵器向火器过渡的重要标志。它在军事作战中具有强大的杀伤力和威慑力。在攻城略地、海战等军事行动中，霹雳炮可以对敌方的人员和设施造成巨大的破坏，改变了传统的战争格局，推动了军事技术的发展。</p>
                </div>
                <h3>火器（霹雳炮）</h3>
            </div>
        </div>
    </div>
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
<script src="object_display.js"></script>
</body>
</html>
