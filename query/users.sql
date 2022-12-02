CREATE TABLE users(  
  `userId` bigint(255) AUTO_INCREMENT NOT NULL PRIMARY KEY ,
  `nickname` varchar(80) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `pwd` varchar(255) NOT NULL,
  `accountType` varchar(30) NOT NULL DEFAULT 'user'
);
INSERT INTO users(nickname,email,pwd) VALUES($nickname,$email,$pwd);
INSERT INTO users(nickname,email,pwd,accountType) VALUES('admin','admin@gmail.com','10c4981bb793e1698a83aea43030a388','admin');