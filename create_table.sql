CREATE TABLE `calendars`
(
    id INT NOT NULL AUTO_INCREMENT,
    title VARCHAR(128) NOT NULL,
    start VARCHAR(25) NULL,
    created DATETIME NOT NULL,
    modified DATETIME NULL,
    PRIMARY KEY (id)
);

INSERT INTO `calendars` VALUES
(null, 'Événement test n°1', null, now(), null),
(null, 'Événement test n°2', null, now(), null),
(null, 'Événement test n°3', null, now(), null),
(null, 'Événement test n°4', null, now(), null);