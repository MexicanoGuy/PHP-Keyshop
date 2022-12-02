CREATE TABLE product(  
  `productId` bigint(255) AUTO_INCREMENT NOT NULL PRIMARY KEY ,
  `name` varchar(80) DEFAULT NULL,
  `description` TEXT,
  `imageURL` varchar(100) DEFAULT NULL,
  `price` DECIMAL(10,2) NOT NULL
);
INSERT INTO product (name,description, imageURL,price) VALUES('gta V','Grand Theft Auto V (also known as Grand Theft Auto Five) 
is a video game developed by Rockstar North. It is the fifteenth instalment in the Grand Theft Auto series and the fifth game title in the 
HD Universe of the series.','productImg/gta5.png',100.75);
INSERT INTO product (name,description, imageURL,price) VALUES('Kirby Forgotten Land','Kirby and the Forgotten Land is a 3D platformer 
Kirby game developed by HAL Laboratory and published by Nintendo for the Nintendo Switch. 
The game was announced in a Nintendo Direct on September 23, 2021 and released worldwide on March 25, 2022.'
,'productImg/KirbyForgottenLand.jpg',289.99);
INSERT INTO product (name,description, imageURL,price) VALUES('Overwatch 2','Overwatch 2 is the next iteration, and sequel of Overwatch. It took over after the first game`s servers were closed down.','productImg/overwatch2.png',200.20);
INSERT INTO product (name,description,imageURL,price) VALUES('The Legend of Zelda: Breath Of The Wild','The Legend of Zelda: Breath of the Wild is the nineteenth main installment of The Legend of Zelda series. 
It was released simultaneously worldwide for the Wii U and Nintendo Switch on March 3, 2017.','productImg/TLOZ.jpg',289.10);
INSERT INTO product (name,description,imageURL,price) VALUES('Mario Kart 8','Mario Kart 8 is a racing game developed primarily by Nintendo EAD, with Namco Bandai Holdings assisting, for the Wii U. It is the eighth console installment in the Mario Kart series (hence the game`s name).
','productImg/marioKart8.jpg',299.50);