const { Engine, Render, Runner, World, Bodies, Body, Events } = Matter;

let engine, world, render, runner, wheel, support, bucket, rope;
let energyChart, ctx;

// 获取页面元素
const startButton = document.getElementById('startButton');
const canvas = document.getElementById('world');
const chartCanvas = document.getElementById('energy-chart');

// 图表初始化
function initChart() {
    ctx = chartCanvas.getContext('2d');
    energyChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [], // 时间轴
            datasets: [{
                label: '动能 (K)',
                borderColor: 'rgb(75, 192, 192)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                fill: true,
                data: []
            },
            {
                label: '势能 (U)',
                borderColor: 'rgb(255, 99, 132)',
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                fill: true,
                data: []
            }]
        },
        options: {
            responsive: true,
            scales: {
                x: { type: 'linear', position: 'bottom' }
            }
        }
    });
}

// 初始化 Matter.js 物理引擎
function initPhysics() {
    engine = Engine.create();
    world = engine.world;

    // 创建渲染器 (物理引擎用于模拟，但不可见)
    render = Render.create({
        element: document.body,
        canvas: canvas,
        engine: engine,
        options: {
            width: 600,
            height: 400,
            wireframes: false, // 禁用 wireframe 模式，确保看到填充颜色
            background: '#f4f4f9', // 设置背景色
            showAngleIndicator: false // 禁用角度指示器
        }
    });

    // 启动渲染
    Render.run(render);  // 让渲染器开始工作

    // 创建物理引擎的运行器
    runner = Runner.create();
    Runner.run(runner, engine);  // 使用 Runner 运行引擎

    // 创建龙骨水车的轮子
    wheel = Bodies.circle(200, 200, 50, {
        isStatic: false,
        friction: 0.1,
        restitution: 0.6,
        render: {
            fillStyle: '#888' // 给水车设置颜色，确保它可见
        }
    });

    // 创建一个简单的支架
    support = Bodies.rectangle(200, 250, 200, 10, { isStatic: true });

    // 创建水桶
    bucket = Bodies.rectangle(200, 300, 60, 60, {
        restitution: 0.5,
        render: { fillStyle: '#4CAF50' }
    });

    // 创建绳子（模拟连接水桶的绳子）
    rope = Bodies.rectangle(200, 170, 10, 300, { isStatic: true });

    // 将物体添加到世界中
    World.add(world, [wheel, support, bucket, rope]);

    // 启动能量计算与更新
    Events.on(engine, 'afterUpdate', function () {
        Body.rotate(wheel, 0.01);  // 让辘轳轮旋转
        Body.applyForce(bucket, bucket.position, { x: 0, y: -0.005 });  // 提升水桶
        updateEnergyData();
    });
}

// 能量计算与图表更新
function updateEnergyData() {
    const time = engine.timing.timestamp / 1000; // 当前时间
    const wheelSpeed = wheel.angularVelocity; // 水车的角速度
    const wheelMass = wheel.mass; // 水车的质量
    const wheelRadius = wheel.circleRadius; // 水车的半径

    // 动能 K = 1/2 * I * ω² (I 是转动惯量, ω 是角速度)
    const I = 0.5 * wheelMass * Math.pow(wheelRadius, 2);  // 简化的转动惯量公式
    const kineticEnergy = 0.5 * I * Math.pow(wheelSpeed, 2);

    // 势能 U = mgh (m 是质量, g 是重力加速度, h 是高度)
    const g = 9.81;  // 重力加速度
    const height = rope.position.y - bucket.position.y;  // 水桶的高度差
    const potentialEnergy = wheelMass * g * height;

    // 更新图表数据
    energyChart.data.labels.push(time);
    energyChart.data.datasets[0].data.push(kineticEnergy);
    energyChart.data.datasets[1].data.push(potentialEnergy);
    energyChart.update();
}



    const canvas2 = document.getElementById('world2');
    const ctx2 = canvas2.getContext('2d');
    const video = document.createElement('video');
    

    function init() {
        video.src = "images/shuiche.mp4";  // 视频路径
        video.load();  // 加载视频
        video.loop = true;  // 设置视频循环播放

        // 监听点击事件来播放视频
        startButton.addEventListener('click', function() {
            video.play();  // 用户点击按钮后播放视频
            startButton.style.display = 'none';  // 隐藏按钮
            drawShuicheFrame();  // 开始逐帧绘制
        });
    }
   

    function drawShuicheFrame() {
        // 清除 canvas 上的内容
        ctx2.clearRect(0, 0, canvas2.width, canvas2.height);
        
        // 绘制当前视频帧到 canvas
        ctx2.drawImage(video, 0, 0, canvas2.width, canvas2.height);
        
        // 使用 requestAnimationFrame 进行下一帧绘制
        requestAnimationFrame(drawShuicheFrame);
    }
    // 启动模拟的点击事件
startButton.addEventListener('click', function() {
    startButton.style.display = 'none'; // 隐藏按钮
    initPhysics(); // 初始化物理引擎
    initChart(); // 初始化图表
    
});
init();
const canvas3 = document.getElementById('cannon');
const ctx3 = canvas3.getContext('2d');
const startButton2 = document.getElementById('startButton2');
const video_cannon = document.createElement('video');
let id;

// 加载大炮封面图
const cannonCoverImage = new Image();
cannonCoverImage.src = 'images/cannon_cover.png';  // 封面图路径
let videoPlaying = false;

// 初始化：加载大炮封面图
function drawCannonCover() {
    ctx3.clearRect(0, 0, canvas3.width, canvas3.height);
    ctx3.drawImage(cannonCoverImage, 0, 0, canvas3.width, canvas3.height);
}

// 播放视频，并在3.5秒后启动震颤效果
function playCannonVideoAndShake() {
    video_cannon.src = 'images/cannon.mp4';  // 替换成您的视频路径
    video_cannon.load();

    // 播放视频
    video_cannon.play();
    
    video_cannon.addEventListener('play', function() {
        setTimeout(() => {
            // 在视频播放3.5秒后启动震颤效果
            startShakeEffect();
        }, 3500);
    });

    // 视频结束时恢复封面图
    video_cannon.addEventListener('ended', function() {
        stopShakeEffect();  // 停止震颤效果
        console.log('视频播放结束');
        cancelAnimationFrame(id);
        drawCannonCover();   // 恢复封面图
        startButton2.style.display = 'block';
    });

    video_cannon.addEventListener('loadeddata', function() {
        // 在视频数据加载完后，开始绘制视频帧
        id=drawCannonVideo();
    });
}

// 逐帧绘制视频
function drawCannonVideo() {
    ctx3.clearRect(0, 0, canvas3.width, canvas3.height);
    ctx3.drawImage(video_cannon, 0, 0, canvas3.width, canvas3.height);
    if (!video_cannon.paused && !video_cannon.ended) {
        id=requestAnimationFrame(drawCannonVideo);
    }
    else{
        cancelAnimationFrame(id);
    }
}

// 启动页面震颤效果
function startShakeEffect() {
    if (!videoPlaying) {
        videoPlaying = true;
        document.body.classList.add('shake');
    }
}

// 停止页面震颤效果
function stopShakeEffect() {
    document.body.classList.remove('shake');
    videoPlaying = false;
}

// 按钮点击事件：点击按钮后播放视频并开始模拟
startButton2.addEventListener('click', function() {
    startButton2.style.display = 'none';  // 隐藏按钮
    playCannonVideoAndShake();  // 播放视频并开始震颤效果
});

// 加载初始封面图
cannonCoverImage.onload = function() {
    drawCannonCover();
};