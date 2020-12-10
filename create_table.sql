CREATE TABLE `calendars`
(
    id VARCHAR(8) NOT NULL,
    title VARCHAR(128) NOT NULL,
    start VARCHAR(19) NULL,
    end VARCHAR(19) NULL,
    allDay BOOLEAN,
    color VARCHAR(7) NOT NULL,
    created DATETIME NOT NULL,
    modified DATETIME NULL,
    PRIMARY KEY (id)
);

INSERT INTO `calendars` VALUES
('aaaaaaaa', 'Événement test n°1', null, null, null, '#3788d8', now(), null),
('bbbbbbbb', 'Événement test n°2', null, null, null, '#ff0000', now(), null),
('cccccccc', 'Événement test n°3', null, null, null, '#008000', now(), null),
('dddddddd', 'Événement test n°4', null, null, null, '#ffa500', now(), null);