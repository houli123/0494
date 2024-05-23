// window.onload = function() {
//     var imgs = document.getElementsByClassName("photo1");
//     for (var i = 0; i < imgs.length; i++) {
//         imgs[i].onclick = function() {
//             document.body.style.background = "url(" + this.src + ") no-repeat"; //通过js控制改变行内样式
//             document.body.style.backgroundSize = "cover";
//             document.body.style.backgroundPosition = "none middle";
//             document.body.style.backgroundAttachment = "fixed";
//         }
//     }
// }
function adjustHeights() {
    var left = document.getElementById('left');
    var right = document.getElementById('right');
    left.style.height = right.offsetHeight - 20 + 'px'; // 设置#left的高度与#right相同
}
window.onload = function() {
    var imgs = document.getElementsByClassName("photo1");
    for (var i = 0; i < imgs.length; i++) {
        imgs[i].onclick = function() {
            document.body.style.background = "url(" + this.src + ") no-repeat"; //通过js控制改变行内样式
            document.body.style.backgroundSize = "cover";
            document.body.style.backgroundPosition = "none middle";
            document.body.style.backgroundAttachment = "fixed";
        }
    }
    adjustHeights(); // 页面加载时调整高度
}
window.onresize = adjustHeights; // 当窗口尺寸改变时再次调整高度


var goTopBtn = document.getElementById('go-top');
window.addEventListener('scroll', function() {
    // 当页面滚动到一定位置时显示按钮，否则隐藏
    if (window.scrollY > 200) {
        goTopBtn.style.display = 'block';
    } else {
        goTopBtn.style.display = 'none';
    }
});

//为按钮添加点击事件，当点击时页面滚动到顶部
goTopBtn.addEventListener('click', function() {
    window.scrollTo({
        top: 0,
        behavior: 'smooth' // 平滑滚动到页面顶部
    });
});