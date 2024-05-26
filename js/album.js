var imgShow = document.getElementsByClassName('parent')[0],
    dotList = document.querySelectorAll('.dots >.clearfix > li');
var btnLeft = document.getElementsByClassName('btnLeft')[0],
    btnRight = document.getElementsByClassName('btnRight')[0];
var dotLen = dotList.length,
    index = 0; //轮播层的图片索引，0表示第一张

//圆点显示
function showRadius() {
    for (var i = 0; i < dotLen; i++) {
        if (dotList[i].className === "on") {
            dotList[i].className = "off";
        }
    }
    dotList[index].className = "on";
}

//向左移动
btnLeft.onclick = function() {
    index--;
    if (index < 0) { /*第1张向左时，变为第5张*/
        index = 4;
    }
    showRadius();
    var left;
    var imgLeft = imgShow.style.left;
    if (imgLeft === "0px") { /*当是第1张时，每张图片左移，移4张图，位置为-(4*700)*/
        left = -2800;
    } else {
        left = parseInt(imgLeft) + 700; /*由于left为负数，每左移一张加700*/
    }
    imgShow.style.left = left + "px";
}

//向右移动
btnRight.onclick = function() {
    index++;
    if (index > 4) { /*第5张向右时，变为第1张*/
        index = 0;
    }
    showRadius();
    var right;
    var imgLeft = imgShow.style.left;
    if (imgLeft === "-2800px") { /*当是第5张时，第1张的位置为0*/
        right = 0;
    } else {
        right = parseInt(imgLeft) - 700; /*由于left为负数，每右移一张减700*/
    }
    imgShow.style.left = right + "px";
}

// 自动轮播
// var timer;
// function autoPlay() {
// 	timer = setInterval(function() {
// 		var right;
// 		var imgLeft = imgShow.style.left;
// 		if(imgLeft === "-2800px") {
// 			right = 0;
// 		}
// 		else{
// 			right = parseInt(imgLeft) - 700;
// 		}
// 		imgShow.style.left = right + "px";
// 	} ,2700)
// }
// autoPlay()