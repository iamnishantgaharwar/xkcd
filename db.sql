CREATE TABLE users (
	xkcd_userid INT(11) NOT NULL AUTO_INCREMENT,
    xkcd_username VARCHAR(30) NOT NULL,
    xkcd_email VARCHAR(100) NOT NULL,
    xkcd_pwd VARCHAR(255) NOT NULL,
    xkcd_created_at DATETIME NOT NULL DEFAULT CURRENT_TIME,
    PRIMARY KEY (xkcd_userid)
);