
CREATE TABLE users (
  userID int NOT NULL AUTO_INCREMENT,
  userName varChar(16) NOT NULL UNIQUE,
  userTotal int,
  gain int,
  password varChar(100) NOT NULL,
  
  PRIMARY KEY (userID)
);

CREATE TABLE coin (
  coinID int NOT NULL AUTO_INCREMENT,
  coinName varchar(16) NOT NULL UNIQUE,
  coinValue int NOT NULL,
  
  PRIMARY KEY (coinID)
);
CREATE TABLE wallets (
  walletID int NOT NULL AUTO_INCREMENT,
  userID int NOT NULL ,
  coinID int NOT NULL ,
  amount int,
  
  PRIMARY KEY (walletID)
);

CREATE TABLE transactions (
  tranID int NOT NULL AUTO_INCREMENT,
  userID int NOT NULL,
  coinID int NOT NULL,
  tranType varchar(50) NOT NULL,
  tranTime TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,

  PRIMARY KEY (tranID)
);


INSERT INTO coin (coinName, coinValue)
VALUES ('binance',223);
INSERT INTO coin (coinName, coinValue)
VALUES ('cardano',254);
INSERT INTO coin (coinName, coinValue)
VALUES ('exodus',22);
INSERT INTO coin (coinName, coinValue)
VALUES ('bitcoin',566);
INSERT INTO coin (coinName, coinValue)
VALUES ('huhubug',9);
INSERT INTO coin (coinName, coinValue)
VALUES ('smoochcoin',1);

INSERT INTO users (userName, password)
VALUES ('Admin','Admin');
INSERT INTO users (userName, password)
VALUES ('Ally','AllyIsC00l');
INSERT INTO users (userName, password)
VALUES ('Brian','BitcoinRulz');
INSERT INTO users (userName, password)
VALUES ('Charlie','OwMyHead');
INSERT INTO users (userName, password)
VALUES ('Daria','NSAisWatching');
INSERT INTO users (userName, password)
VALUES ('Elon','HelpMeTheyTookMyKids');
INSERT INTO users (userName, password)
VALUES ('Fred','xHwejd*672-0*)))@');

INSERT INTO wallets VALUES  (NULL, 1, 1, 34 );
INSERT INTO wallets VALUES  (NULL, 1, 4, 99 );