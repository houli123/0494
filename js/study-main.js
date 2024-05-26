// 用于储存平年和闰年中各个月份的天数
var month_olypic = [31, 29, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31]; // 闰年中12个月对应的天数
var month_normal = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31]; // 平年12个月对应的天数
var month_name = ["1月", "2月", "3月", "4月", "5月", "6月", "7月", "8月", "9月", "10月", "11月", "12月"]; // 用于显示的月份名称数组

// 需要用到的DOM元素
var days = document.getElementById("days"); // 用于显示月份天数的容器
var pre = document.getElementById("pre"); // "上一个月"按钮
var next = document.getElementById("next"); // "下一个月"按钮
var cmonth = document.getElementById("calendar-month"); // 显示当前月份的容器
var cyear = document.getElementById("calendar-year"); // 显示当前年份的容器

// 获取当前日期并储存年、月、日信息
var my_date = new Date(); // 当前时间对象
var my_year = my_date.getFullYear(); // 获取当前年份
var my_month = my_date.getMonth(); // 获取当前月份（0-11）
var my_day = my_date.getDate(); // 获取当前天数

// 计算某年某月的第一天是星期几
function dayStart(month, year) {
    var tmpDate = new Date(year, month, 1); // 生成该月第一天的日期对象
    return (tmpDate.getDay()); // 返回该天是星期几
}

// 同时处理平年和闰年，判断某个月有多少天
function daysMonth(month, year) {
    // 闰年判定逻辑
    var tmp1 = year % 4;
    var tmp2 = year % 100;
    var tmp3 = year % 400;

    if ((tmp1 == 0 && tmp2 != 0) || (tmp3 == 0)) {
        return (month_olypic[month]); // 如果是闰年返回该月天数
    } else {
        return (month_normal[month]); // 如果是平年返回该月天数
    }
}

// 动态更新日历显示的日期
function refreshDate() {
    var str = ""; // 用于拼接显示所有日期的HTML字符串
    // 获取当月总天数和第一天是星期几
    var totalDay = daysMonth(my_month, my_year); // 当月总天数
    var firstDay = dayStart(my_month, my_year); // 当月第一天是星期几
    // 先添加空白占位符到第一天位置
    for (var i = 0; i < firstDay; i++) {
        str += "<li></li>";
    }

    var myclass; // 用于给不同日期设置不同的CSS类
    // 添加本月所有天数
    for (var i = 1; i <= totalDay; i++) {
        // 通过比较年月日设置日期的显示类
        // 如果日期已经过去，使用浅灰色(lightgrey)显示
        if ((my_year < my_date.getFullYear()) || (my_year == my_date.getFullYear() && my_month < my_date.getMonth()) || (my_year == my_date.getFullYear() && my_month == my_date.getMonth() && i < my_day)) {
            myclass = " class='lightgrey'";
        }
        // 如果日期是当天，使用绿色(green)显示
        else if (my_year == my_date.getFullYear() && my_month == my_date.getMonth() && i == my_day) {
            myclass = "class='green greenbox'";
        }
        // 其他将来日期使用深灰色(darkgrey)显示
        else {
            myclass = "class='darkgrey'";
        }
        // 使用myclass追加<li>标签到HTML字符串
        str += "<li " + myclass + ">" + i + "</li>";
    }
    // 使用innerHTML属性更新页面中的元素
    days.innerHTML = str;
    cmonth.innerHTML = month_name[my_month];
    cyear.innerHTML = my_year;
}
// 页面加载完成后刷新显示日期
refreshDate();

// 绑定"上一个月"按钮点击事件
pre.onclick = function(e) {
    e.preventDefault(); // 阻止默认跳转行为
    my_month--; // 切换至上个月
    if (my_month < 0) { // 年份和月份的处理
        my_year--;
        my_month = 11;
    }
    refreshDate(); // 刷新显示的日期
};

// 绑定"下一个月"按钮点击事件
next.onclick = function(e) {
    e.preventDefault(); // 阻止默认跳转行为
    my_month++; // 切换至下个月
    if (my_month > 11) { // 年份和月份的处理
        my_month = 0;
        my_year++;
    }
    refreshDate(); // 刷新显示的日期
};



// 签到按钮
function sign() {
    var signgo = '已完成';
    document.getElementById('signs').innerHTML = signgo;
    document.getElementById("signLogs").style.display = "block";
    var signUsers = document.querySelectorAll('#signUsers');
    signUsers.forEach(function(item) {
        item.style.display = "block";
    })
    //     x.style.display = "block";
    // }
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
    // var o = '0';
    var hours = data.getHours();
    var min = data.getMinutes();
    var mao = ':';
    var signday = year + nian +  month + yue  + today + ri; //签到年月日拼接
    var signmin = hours + mao + min; // 签到小时分钟
    document.getElementById('todays').innerHTML = signday; //更新签到日期
    document.getElementById('signMin').innerHTML = signmin; //更新签到时间
    adjustHeights();
}