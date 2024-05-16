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
}



// var goTopBtn = document.getElementById('go-top');

// window.addEventListener('scroll', function () {
//     // 当页面滚动到一定位置（例如：200px）时显示按钮，否则隐藏
//     if (window.scrollY > 200) {
//         goTopBtn.style.display = 'block';
//     } else {
// goTopBtn.style.display = 'none';
//             }
//         });

// // 为按钮添加点击事件，当点击时页面滚动到顶部
// goTopBtn.addEventListener('click', function () {
//     window.scrollTo({
//         top: 0,
//         behavior: 'smooth' // 平滑滚动到页面顶部
//     });
// });