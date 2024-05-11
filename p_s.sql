
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
    pic varchar(15)
);
INSERT INTO users (uname, pwd, phone, email, bio, sex, gra, xinzuo,pic) 
VALUES ('Jack', '123456', '13536627999', '123456789@qq.com', '我是一个又菜又爱玩电脑的少年，作为计算机专业的学生，我热爱我的专业并为其投入巨大的热情和精力。希望大家能和我一同热爱计算机！', '男', '深造小学', '双子座','photo.png');