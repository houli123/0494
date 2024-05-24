var month_olypic = [31, 29, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31]; //正常年份12个月对应的天数
var month_normal = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31]; //闰年中12个月对应的天数
var month_name = ["1月", "2月", "3月", "4月", "5月", "6月", "7月", "8月", "9月", "10月", "11月", "12月"]; //定义要显示的月份数组
//获取以上各个部分的id
var holder = document.getElementById("days");
var prev = document.getElementById("prev"); //上个月份的超链接id
var next = document.getElementById("next"); //下个月份的超链接id
var ctitle = document.getElementById("calendar-title");
var cyear = document.getElementById("calendar-year");
//获取当天的年月日
var my_date = new Date();
var my_year = my_date.getFullYear(); //获取年份
var my_month = my_date.getMonth(); //获取月份，下标从0开始
var my_day = my_date.getDate(); //获取当前日期

//根据年月获取当月第一天是周几
function dayStart(month, year) {
    var tmpDate = new Date(year, month, 1);
    return (tmpDate.getDay());
}
//根据年份判断某月有多少天，主要是区分闰年
function daysMonth(month, year) {
    var tmp1 = year % 4;
    var tmp2 = year % 100;
    var tmp3 = year % 400;

    if ((tmp1 == 0 && tmp2 != 0) || (tmp3 == 0)) {
        return (month_olypic[month]); //闰年
    } else {
        return (month_normal[month]); //非闰年
    }
}

function refreshDate() {
    var str = "";
    //计算当月的天数和每月第一天都是周几
    var totalDay = daysMonth(my_month, my_year);
    var firstDay = dayStart(my_month, my_year);
    //添加每个月前面的空白部分，即若某个月的第一天是从周三开始，则前面的周一，周二需要空出来
    for (var i = 0; i < firstDay; i++) {
        str += "<li>" + "</li>";
    }

    //从一号开始添加到totalDay（每个月的总天数），并为pre，next和当天添加样式
    var myclass;
    for (var i = 1; i <= totalDay; i++) {
        //如果是已经过去的日期，则用浅灰色显示
        if ((my_year < my_date.getFullYear()) || (my_year == my_date.getFullYear() &&
                my_month < my_date.getMonth()) || (my_year == my_date.getFullYear() &&
                my_month == my_date.getMonth() && i < my_day)) {
            myclass = " class='lightgrey'";
        }
        //如果正好是今天，则用绿色显示
        else if (my_year == my_date.getFullYear() && my_month == my_date.getMonth() && i == my_day) {
            myclass = "class = 'green greenbox'";
        }
        //将来的日期用深灰色显示
        else {
            myclass = "class = 'darkgrey'";
        }
        str += "<li " + myclass + ">" + i + "</li>";
    }
    holder.innerHTML = str; //为日期的列表标签设置HTML；
    ctitle.innerHTML = month_name[my_month]; //设置当前显示的月份
    cyear.innerHTML = my_year; //设置当前显示的年份
}
refreshDate(); //显示日期，更新界面
//上个月的点击事件
pre.onclick = function(e) {
        e.preventDefault();
        my_month--;
        if (my_month < 0) {
            my_year--;
            my_month = 11;
        }
        refreshDate(); //更新界面
    }
    //下个月的点击事件
next.onclick = function(e) {
    e.preventDefault();
    my_month++;
    if (my_month > 11) {
        my_month = 0;
        my_year++;
    }
    refreshDate(); //更新界面
}

// 签到按钮
function sign() {
    var signgo = '已完成';
    document.getElementById('signs').innerHTML = signgo;
    document.getElementById("signLogs").style.display = "block";
    document.getElementById('signUsers').style.display = "block";
    // 获取签到时间
    var data = new Date();
    var year = data.getFullYear(); //获取年份
    var month = data.getMonth() + 1; //获取月份
    var today = data.getDate(); //获取当日
    var year = year.toString();
    var month = month.toString();
    var today = today.toString();
    var nian = '年';
    var yue = '月';
    var ri = '日';
    var o = '0';
    var hours = data.getHours();
    var min = data.getMinutes();
    var mao = ':';
    var signday = year + nian + o + month + yue + o + today + ri; //签到年月日拼接
    var signmin = hours + mao + min; // 签到小时分钟
    document.getElementById('todays').innerHTML = signday; //更新签到日期
    document.getElementById('signMin').innerHTML = signmin; //更新签到时间
    adjustHeights();
}

function adjustHeights() {
    var left = document.getElementById('left');
    var right = document.getElementById('right');
    left.style.height = right.offsetHeight - 20 + 'px'; // 设置#left的高度与#right相同
}

window.onload = adjustHeights;
window.onresize = adjustHeights; // 当窗口尺寸改变时再次调整高度