
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    uname VARCHAR(50) NOT NULL UNIQUE,
    pwd VARCHAR(255) NOT NULL,
    phone varchar(11),
    email VARCHAR(100) NOT NULL UNIQUE,
    bio TEXT,
    sex ENUM('男', '女') NOT NULL,
    gra VARCHAR(255),
    xinzuo ENUM('白羊座', '金牛座', '双子座', '巨蟹座', '狮子座', '处女座', '天秤座', '天蝎座', '射手座', '摩羯座', '水瓶座', '双鱼座'),
    pic varchar(15),
    age int
);
INSERT INTO users (uname, pwd, phone, email, bio, sex, gra, xinzuo,pic,age) 
VALUES ('Jack', '123456', '13536627999', '123456789@qq.com', '我是一个又菜又爱玩电脑的少年，作为计算机专业的学生，我热爱我的专业并为其投入巨大的热情和精力。希望大家能和我一同热爱计算机！', '男', '深造小学', '双子座','photo.png',18);

CREATE TABLE blog
(
    bno int primary key AUTO_INCREMENT,
    bcontent varchar(5000) not null,
    uname VARCHAR(50) NOT NULL,
    bdate date not null ,
    foreign key (uname) references users(uname)
);
INSERT INTO blog (bcontent, uname, bdate) VALUES ('HTML是超文本标记语言，是一个网站页面的主要内容和主体框架。主要用来实现静态页面，目前我们看到的文字、图片、动画、声音、表格、超链接等网页元素都是通过HTML实现的。HTML是由各种标签组成的，所学习HTML就是在了解HTML主体框架的结构基础上学习各种标签的使用方法。', 'Jack', '2023-04-04');

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
