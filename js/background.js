window.onload = function(){
        var imgs = document.getElementsByClassName("photo1");
        for (var i = 0; i < imgs.length; i++) {
            imgs[i].onclick = function(){
                document.body.style.background = "url("+this.src+") no-repeat";//通过js控制改变行内样式
                document.body.style.backgroundSize = "cover";
                document.body.style.backgroundPosition = "none middle";
                document.body.style.backgroundAttachment="fixed";
            }
        }
    }



// 当页面滚动时执行函数
window.onscroll = function () {
    scrollFunction();
};

function scrollFunction() {
    // 获取回到顶部的元素
    var goTop = document.getElementById("go-top");

    // 当用户下滑100px时显示按钮
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
        goTop.style.display = "block";
    } else {
        goTop.style.display = "none";
    }
}

// 点击按钮时，滚动到页面顶部
document.getElementById("go-top").addEventListener("click", function () {
    document.body.scrollTop = 0; // 对于Safari
    document.documentElement.scrollTop = 0; // 对于Chrome, Firefox, IE和Opera
});