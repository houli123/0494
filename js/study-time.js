function updateClock() {
    const now = new Date(); // 获取当前的日期和时间
    let hours = now.getHours(); // 获取小时
    let minutes = now.getMinutes(); // 获取分钟

    // 为了让时间始终保持两位数格式
    hours = hours < 10 ? '0' + hours : hours;
    minutes = minutes < 10 ? '0' + minutes : minutes;

    const timeString = hours + ':' + minutes;

    document.getElementById('real-time-clock').textContent = timeString;

    setTimeout(updateClock, 1000); // 每秒更新时间
}

document.addEventListener('DOMContentLoaded', updateClock); // 当页面加载完成时启动时钟



function updateTimeshowClass(isPomodoro) {
    const timeshow = document.getElementById('timeshow');
    const progressBar = document.getElementById('pb');

    if (isPomodoro) {
        timeshow.classList.add('timeshow-start');
        timeshow.classList.remove('timeshow-end');
        progressBar.classList.add('progress-bar-ltr');
        progressBar.classList.remove('progress-bar-rtl');
    } else {
        timeshow.classList.add('timeshow-end');
        timeshow.classList.remove('timeshow-start');
        progressBar.classList.add('progress-bar-rtl');
        progressBar.classList.remove('progress-bar-ltr');
    }
}


var countdownInterval;
var isPomodoro = true;

function start() {
    clearInterval(countdownInterval); // 清除任何现有的计时器
    isPomodoro = true; // 显式设置状态为工作模式
    updateTimeshowClass(isPomodoro); // 更新显示样式和进度条方向

    var minutes = isPomodoro ? parseInt(document.getElementById('pomodoro_minutes').value) : parseInt(document.getElementById('rest_minutes').value);
    var seconds = minutes * 60;

    // 更新时钟颜色
    updateTimeshowClass(isPomodoro);
    countdownInterval = setInterval(function() {
        seconds--; // 每次调用减少一秒
        var remainingMinutes = parseInt(seconds / 60);
        var remainingSeconds = seconds % 60;

        // 格式化剩余时间字符串
        remainingSeconds = remainingSeconds < 10 ? '0' + remainingSeconds : remainingSeconds;
        document.getElementById('timeshow').textContent = remainingMinutes + ":" + remainingSeconds;

        // 更新进度条
        var progress = ((minutes * 60 - seconds) / (minutes * 60)) * 100;
        document.getElementById('pb').style.width = progress + '%';

        if (seconds <= 0) {
            clearInterval(countdownInterval);
            if (isPomodoro) {
                isPomodoro = false; // 切换到休息状态
                start(); // 自动开始休息时间
            } else {
                isPomodoro = true; // 切换到工作状态
            }
        }
    }, 1000);
}

function rest() {
    clearInterval(countdownInterval); // 清除任何现有的计时器
    isPomodoro = false; // 显式设置状态为休息模式
    updateTimeshowClass(isPomodoro); // 更新显示样式和进度条方向

    var minutes = parseInt(document.getElementById('rest_minutes').value); // 获取休息时间长度
    var seconds = minutes * 60;

    countdownInterval = setInterval(function() {
        seconds--; // 每秒递减
        var remainingMinutes = parseInt(seconds / 60);
        var remainingSeconds = seconds % 60;

        // 保证时间显示始终为两位数
        remainingSeconds = remainingSeconds < 10 ? '0' + remainingSeconds : remainingSeconds;
        document.getElementById('timeshow').textContent = remainingMinutes + ":" + remainingSeconds; // 更新显示的时间

        // 更新进度条
        var progressPercentage = 100 - ((seconds / (minutes * 60)) * 100); // 计算剩余时间的百分比
        document.getElementById('pb').style.width = progressPercentage + '%';

        // 如果倒计时结束
        if (seconds <= 0) {
            clearInterval(countdownInterval); // 停止计时器
            document.getElementById('timeshow').textContent = ""; // 可以选择清除时间显示
            // 可以在这里添加倒计时结束后需要执行的其他操作，例如提示用户
            alert("休息时间结束");
        }
    }, 1000);
}

function end() {
    clearInterval(countdownInterval); // 清除任何现有的倒计时
    document.getElementById('timeshow').textContent = ""; // 清除显示的时间
    document.getElementById('pb').style.width = "0%"; // 清除进度条
    updateTimeshowClass(isPomodoro); // 更新显示样式和进度条方向
}


// 页面加载时重置默认倒计时颜色和默认设置
document.addEventListener('DOMContentLoaded', function() {
    updateTimeshowClass(isPomodoro);
    document.getElementById('pomodoro_minutes').value = '25'; // 设置默认工作时间
    document.getElementById('rest_minutes').value = '5'; // 设置默认休息时间
});