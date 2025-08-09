document.addEventListener('scroll', function () {
    let scrollPosition = window.scrollY;

    // 控制book图片上升
    let book = document.querySelector('.book');
    let bookOffset = Math.min(scrollPosition * 3, 300); // 控制上升速度，300为最大上升距离
    book.style.transform = `translate(-50%, -${bookOffset}px)`;

    // 控制cloud图片左右平移
    let cloudLeft = document.querySelector('.cloud-left');
    let cloudRight = document.querySelector('.cloud-right');
    let cloudSpeed = 2; 
    cloudLeft.style.transform = `translate(-${scrollPosition * cloudSpeed}px, -50%)`;
    cloudRight.style.transform = `translate(${scrollPosition * cloudSpeed}px, -50%)`;

    // 控制水面背景上升
    let bgWater = document.querySelector('.bg_water');

    let baseWaterSpeed = 0.3;
    let maxWaterOffset = 450; 
    let waterOffset = scrollPosition * baseWaterSpeed;

    // 判断是否已经超过300px水面上升的速度加快
    if (bookOffset >= 300) {
        // 使用缓动函数平滑过渡速度变化
        let speedMultiplier = 10; 
        let distanceAfterBook = scrollPosition - 300;
        
        // 平滑调整速度
        let smoothFactor = easeInOut(distanceAfterBook / 500); // 距离控制速度变化
        waterOffset = Math.min(scrollPosition * (baseWaterSpeed + smoothFactor * (speedMultiplier - baseWaterSpeed)), maxWaterOffset);
    }
    bgWater.style.transform = `translateY(-${waterOffset}px)`;
});

function easeInOut(t) {
    return t < 0.5 ? 4 * t * t * t : (t - 1) * (2 * t - 2) * (2 * t - 2) + 1;
}
const scrollbox1 = {
    container: document.querySelector(".part1_scrollobox"),
    card1: document.querySelector(".part1_card"),
    trigger_distance: 0,
    border_distance: 0,
    distance: 0,
    resize() {
        let _scrollbox = document.querySelector(".book_part1");
        _scrollbox.style.height = `${this.container.offsetWidth}px`;
        this.trigger_distance = _scrollbox.offsetTop;
        this.border_distance = _scrollbox.offsetTop + _scrollbox.offsetHeight - innerHeight;
    },
    move() {
        if (scrollY >= this.trigger_distance && scrollY <= this.border_distance) {
            this.distance = scrollY - this.trigger_distance;
            this.container.style.transform = `translateY(${this.distance}px)`;
            let distance_x = this.distance / (this.border_distance - this.trigger_distance) *
                (this.container.offsetWidth - innerWidth);
            this.card1.style.transform = `translateX(${-distance_x}px)`;
        };
    }
};

const scrollbox2 = {
    container: document.querySelector(".part2_scrollobox"),
    card2: document.querySelector(".part2_card"),
    trigger_distance: 0,
    border_distance: 0,
    distance: 0,
    resize() {
        let _scrollbox = document.querySelector(".book_part2");
        _scrollbox.style.height = `${this.container.offsetWidth}px`;
        this.trigger_distance = _scrollbox.offsetTop;
        this.border_distance = _scrollbox.offsetTop + _scrollbox.offsetHeight - innerHeight;
    },
    move() {
        if (scrollY >= this.trigger_distance && scrollY <= this.border_distance) {
            this.distance = scrollY - this.trigger_distance;
            this.container.style.transform = `translateY(${this.distance}px)`;
            let distance_x = this.distance / (this.border_distance - this.trigger_distance) *
                (this.container.offsetWidth - innerWidth);
            this.card2.style.transform = `translateX(${-distance_x}px)`;
        };
    }
};

const scrollbox3 = {
    container: document.querySelector(".part3_scrollobox"),
    card3: document.querySelector(".part3_card"),
    trigger_distance: 0,
    border_distance: 0,
    distance: 0,
    resize() {
        let _scrollbox = document.querySelector(".book_part3");
        _scrollbox.style.height = `${this.container.offsetWidth}px`;
        this.trigger_distance = _scrollbox.offsetTop;
        this.border_distance = _scrollbox.offsetTop + _scrollbox.offsetHeight - innerHeight;
    },
    move() {
        if (scrollY >= this.trigger_distance && scrollY <= this.border_distance) {
            this.distance = scrollY - this.trigger_distance;
            this.container.style.transform = `translateY(${this.distance}px)`;
            let distance_x = this.distance / (this.border_distance - this.trigger_distance) *
                (this.container.offsetWidth - innerWidth);
            this.card3.style.transform = `translateX(${-distance_x}px)`;
        };
    }
};

function debounce(fn, delay) {
    let timer;
    return function () {
        clearTimeout(timer);
        timer = setTimeout(fn, delay);
    };
}

scrollbox1.resize();
scrollbox2.resize();
scrollbox3.resize();

window.addEventListener("resize", debounce(() => {
    scrollbox1.resize();
    scrollbox2.resize();
    scrollbox3.resize();
}, 200));

window.addEventListener("scroll", () => {
    requestAnimationFrame(() => {
        scrollbox1.move();
        scrollbox2.move();
        scrollbox3.move();
    });
});

const elements = document.querySelectorAll('.author_introduction');
    
    const options = {
        threshold: 0.2 // 触发动画时元素显示比例
    };

    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                observer.unobserve(entry.target); // 动画触发后停止
            }
        });
    }, options);

    elements.forEach(element => {
        observer.observe(element);
    });
    document.querySelector('.book_part1').addEventListener('click', function () {
        window.location.href = '../book_details/first/first.php';
    });
    document.querySelector('.book_part2').addEventListener('click', function () {
        window.location.href = '../book_details/second/second.php';
    });
    document.querySelector('.book_part3').addEventListener('click', function () {
        window.location.href = '../book_details/third/third.php';
    });
    