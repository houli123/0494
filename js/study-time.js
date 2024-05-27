function updateClock() {
    // 获取当前时间
    const now = new Date();
    // 提取小时和分钟
    let hours = now.getHours();
    let minutes = now.getMinutes();

    // 确保小时和分钟都是两位数显示
    hours = hours < 10 ? '0' + hours : hours;
    minutes = minutes < 10 ? '0' + minutes : minutes;

    // 创建时间字符串并显示在页面上
    const timeString = hours + ':' + minutes;
    document.getElementById('real-time-clock').textContent = timeString;

    // 每秒钟调用一次updateClock函数，更新显示的时间
    setTimeout(updateClock, 1000);
}

// 当页面内容完全加载后执行updateClock函数
document.addEventListener('DOMContentLoaded', updateClock);



// 根据是否是工作时间（isStart）改变时钟和进度条的显示样式
function updateTimeClass(isStart) {
    // 获取显示时间和进度条的元素
    const timeshow = document.getElementById('timeshow');
    const progressBar = document.getElementById('pb');

    // 如果是工作时间，应用特定的样式
    if (isStart) {
        timeshow.classList.add('timeshow-start');
        timeshow.classList.remove('timeshow-end');
        progressBar.classList.add('progress-bar-ltr');
        progressBar.classList.remove('progress-bar-rtl');
    }
    // 如果不是工作时间（即休息时间），应用另一组样式
    else {
        timeshow.classList.add('timeshow-end');
        timeshow.classList.remove('timeshow-start');
        progressBar.classList.add('progress-bar-rtl');
        progressBar.classList.remove('progress-bar-ltr');
    }
}



// 设置一个变量来存储setInterval函数返回的值，用于之后清除计时器
var countdown;
// 初始化状态为工作状态
var isStart = true;

// 用于开始和休息的倒计时的函数
function start(isStart) {
    // 清除之前可能存在的计时器
    clearInterval(countdown);
    // 更新样式
    updateTimeClass(isStart);

    // 根据状态选择工作时间或休息时间
    var minutes = isStart ? parseInt(document.getElementById('start_minutes').value) : parseInt(document.getElementById('rest_minutes').value);
    // 计算总秒数
    var seconds = minutes * 60;

    // 启动倒计时，每一秒更新一次显示的时间
    countdown = setInterval(function() {
        // 每过一秒减少总秒数
        seconds--;
        // 计算剩余分钟和秒数
        var remainMinutes = parseInt(seconds / 60);
        var remainSeconds = seconds % 60;

        // 确保时间是两位数表示
        remainSeconds = remainSeconds < 10 ? '0' + remainSeconds : remainSeconds;
        // 更新显示的时间
        document.getElementById('timeshow').textContent = remainMinutes + ":" + remainSeconds;

        // 每秒更新进度条宽度，进度条的比例为已过去的秒数/总秒数，然后用该比例给进度条的宽度
        var progress = ((minutes * 60 - seconds) / (minutes * 60)) * 100;
        document.getElementById('pb').style.width = progress + '%';

        // 当倒计时结束时
        if (seconds <= 0) {
            // 清除计时器
            clearInterval(countdown);
            // 根据当前状态切换到另一状态并重新启动倒计时
            if (isStart) {
                start(false); // 自动开始休息时间
            } else {
                start(true);  //自动开始学习时间
            }
        }
    }, 1000);
}

// 用于停止倒计时的函数
function end() {
    // 清除现有的倒计时
    clearInterval(countdown);
    // 清除显示的时间
    document.getElementById('timeshow').textContent = "";
    // 清除进度条
    document.getElementById('pb').style.width = "0%";
    // 更新样式
    updateTimeClass(isStart);
}