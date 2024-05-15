总体目标：学习空间：
日历签到功能：为用户提供在线签到，记录学习习惯和进度。
计时器/番茄钟：帮助用户管理学习时间，使用工作休息法提高效率。
学习进度追踪器：让用户设置学习目标，并追踪他们的完成情况。
音乐空间：
在线音乐播放器：为用户提供一个界面友好的音乐播放器。
相册空间：
图片轮播展示：展示用户上传的图片，提供自动播放或者手动控制功能。

接下来完成学习空间的网页设计
学习空间主页：study.php
完成日历签到功能：为用户提供在线签到，记录学习习惯和进度。
study-time.php完成计时器/番茄钟：帮助用户管理学习时间，使用工作休息法提高效率。
study-goal.php学习进度追踪器：让用户设置学习目标，并追踪他们的完成情况。要求css样式要设计得完美，要好看、完美、适合、贴合我的偏绿色的主题画风，还要可爱。可以使用JavaScript技术，下面先做study.php一个一个来吧，如果你需要创建文件和我说


CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    uname VARCHAR(50) NOT NULL UNIQUE,
    pwd VARCHAR(255) NOT NULL,
    phone varchar(11) NULL,
    email VARCHAR(100) NOT NULL,
    bio TEXT NULL,
    sex ENUM('男', '女') NOT NULL,
    gra VARCHAR(255) NULL,
    xinzuo ENUM('白羊座', '金牛座', '双子座', '巨蟹座', '狮子座', '处女座', '天秤座', '天蝎座', '射手座', '摩羯座', '水瓶座', '双鱼座') NULL,
    pic varchar(15) NULL,
    age int NULL
);
INSERT INTO users (uname, pwd, phone, email, bio, sex, gra, xinzuo,pic,age) 
VALUES ('Jack', '123456', '13536627999', '123456789@qq.com', '我是一个又菜又爱玩电脑的少年，作为计算机专业的学生，我热爱我的专业并为其投入巨大的热情和精力。希望大家能和我一同热爱计算机！', '男', '深造小学', '双子座','photo.png',18);

CREATE TABLE blog
(
    bno int primary key AUTO_INCREMENT,
    bcontent varchar(5000) not null,
    uname VARCHAR(50) NOT NULL,
    bdate date not null ,
    btitle VARCHAR(50) not null ,
    foreign key (uname) references users(uname)
);
INSERT INTO blog (bcontent, uname, bdate, btitle) VALUES 
('HTML，或超文本标记语言，是构成互联网基础的一种语言。它不仅定义了网页内容的含义和结构，还与CSS和JavaScript共同工作，创造出功能丰富且外观吸引的网页。通过使用各种HTML标签，开发者可以插入文本、图片、链接等多种元素，使网页成为信息共享和互动的平台。', 'Jack', '2024-05-10', 'Web基础: HTML的重要性'),
('CSS，或层叠样式表，是用来控制网页的视觉外观的一个强大工具。通过CSS，开发者可以指定文本颜色、字体、间距、布局、响应式设计及更多元素的样式，使网页不仅功能全面，也视觉上更加吸引人。CSS的使用大大提升了网页设计的灵活性和创造性，使得每个网页都能有其独特的风貌。', 'Jack', '2024-05-11', '设计魅力: CSS在现代网页设计中的角色'),
('JavaScript是一种高级编程语言，让网页从静态文档变为了可以互动的应用。通过JavaScript，可以实现用户与网页的交互效果，如表单验证、动态内容加载、动画等。随着Node.js的出现，JavaScript更是超越了客户端，成为了全栈开发的语言，极大地扩展了其使用场景和影响力。', 'Jack', '2024-05-12', '互动体验: JavaScript的力量'),
('响应式网页设计是一种现代网页设计理念，目的是让网站能够自动适配各种屏幕尺寸和分辨率，保证无论在任何设备上都能提供优秀的用户体验。利用CSS媒体查询、灵活的网格布局、图片和布局的动态调整，响应式设计能够让网站布局在桌面、平板和手机等设备上都能完美展现。', 'Jack', '2024-05-13', '适应性强: 探索响应式网页设计'),
('近年来，随着前端技术的不断进步，各种JavaScript框架和库的出现极大地促进了Web应用的开发。React、Vue和Angular就是其中最受欢迎的几个例子，每个框架都有自己的特点和优势。例如，React以其简洁的设计和组件化的开发方式受到青睐，Vue以其轻量和易上手著称，Angular则是一个由谷歌维护的全能型框架，适合构建大型应用。这些框架都为现代Web应用的开发提供了强大的支持。', 'Jack', '2024-05-14', '前端趋势: 现代Web框架解析');
INSERT INTO blog (bcontent, uname, bdate, btitle) VALUES 
('HTML不仅是网络世界的一砖一瓦，其发展历程几乎与互联网同步。从简单的文本标记，到多媒体和互动元素，HTML的演变反映了Web技术的壮大和多元化。', 'root', '2024-05-11', 'HTML: 回顾网络的基石'),
('CSS的发展改变了网页的面貌。一开始的网站设计基本局限在文本和简单图像，但随着的CSS的出现，网站开始变得多彩且个性化。透过一行行的样式代码，每个网站都可以有属于自己的特色和氛围。', 'root', '2024-05-13', '从简到繁: CSS带来的革新'),
('JavaScript的出现让网页变得 “活”起来。以前的网站只能做到展示信息，而现在，利用JavaScript，网站可以实现诸多与用户的交互，比如弹出对话框、动态改变页面内容等。JavaScript为网站带来了更加丰富的用户体验。', 'root', '2024-05-14', '探索动态: JavaScript的魅力'),
('响应式设计是现代Web开发中的一个重要理念。随着移动设备使用的普及，如何保证网站在任何设备上所有看起来和使用起来都完美，已经变得越来越重要。响应式设计的应用可以让网站的布局、图片、文字等元素自动适应屏幕大小，从而提供优质的用户体验。', 'root', '2024-05-01', '一致与自适应: 探讨响应式设计'),
('随着JavaScript生态环境的丰富，React、Vue、Angular等前端框架的兴起，为开发者提供了更加高效、便捷的开发方案，且这些框架或库还在不断地被优化和更新，预计在未来的Web开发领域中，这种趋势还会继续。', 'root', '2024-05-07', '框架新纪元: 现代Web开发趋势');

create table comment
(
    cno int primary key AUTO_INCREMENT,
    ccontent varchar(500) not null,
    uname varchar(25) not null,
    bno int,
    cdate datetime not null ,
    foreign key (uname) references users(uname),
    foreign key (bno) references blog(bno)
);
INSERT INTO comment (ccontent, uname, bno, cdate) VALUES ('你是一个一个，对，好人', 'Jack', 1, '2024-05-11');
