CREATE TABLE cart(
    `cartId` bigint(255) AUTO_INCREMENT NOT NULL PRIMARY KEY ,
    `productNo` bigint(255) NOT NULL,
    `userNo` bigint(255) NOT NULL,
    `quantity` bigint(255) NOT NULL DEFAULT '1'
);
INSERT INTO cart (productNo,userNo,quantity) VALUES(2,1,4);
INSERT INTO cart (productNo,userNo,quantity) VALUES(2,2,1);
INSERT INTO cart (productNo,userNo,quantity) VALUES(2,3,3);
INSERT INTO cart (productNo,userNo,quantity) VALUES(1,4,5);
INSERT INTO cart (productNo,userNo,quantity) VALUES(3,1,4);
INSERT INTO cart (productNo,userNo,quantity) VALUES(5,2,1);
INSERT INTO cart (productNo,userNo,quantity) VALUES(4,3,3);
INSERT INTO cart (productNo,userNo,quantity) VALUES(1,4,5);

SELECT cartId, userId, productNo, quantity FROM cart INNER JOIN users WHERE userId=$userId;
SELECT cartId, userId, productNo, quantity FROM cart INNER JOIN users WHERE userId=3;