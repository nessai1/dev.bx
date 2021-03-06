CREATE TABLE `store` (
    `ID` int(11) NOT NULL AUTO_INCREMENT,
    `CITY` varchar(500) NOT NULL,
    PRIMARY KEY(`ID`)
);

INSERT INTO `store` (`CITY`) VALUES ('Калининград'), ('Черняховск'), ('Советск');

CREATE TABLE `book_store` (
  `BOOK_ID` int NOT NULL REFERENCES book(ID),
  `STORE_ID` int NOT NULL REFERENCES store(ID),
  `PRICE` DECIMAL(10, 2),
  `QUANTITY` int unsigned default 0,
  PRIMARY KEY (BOOK_ID, STORE_ID)
);

INSERT INTO `book_store` (`STORE_ID`,`BOOK_ID`, `PRICE`, `QUANTITY`)
SELECT 1, `ID`, `PRICE`, `QUANTITY` FROM `book`;

ALTER TABLE `book`
DROP COLUMN `QUANTITY`, DROP COLUMN `PRICE`;