

CREATE TABLE `authentication` (
  `auth_id` int(110) NOT NULL AUTO_INCREMENT,
  `auth_code` varchar(205) NOT NULL,
  `new` datetime NOT NULL,
  `expire` datetime NOT NULL,
  `user_id` int(100) NOT NULL,
  PRIMARY KEY (`auth_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `authentication_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8mb4;


INSERT INTO authentication VALUES
("70","bjzlyq","2021-04-29 18:21:47","2021-04-29 18:26:47","19"),
("71","jpou20","2021-05-27 21:50:48","2021-05-27 21:55:48","19"),
("72","618cm7","2021-05-27 21:55:26","2021-05-27 22:00:26","19"),
("73","sfab9c","2021-05-27 21:56:39","2021-05-27 22:01:39","19"),
("74","krgvz2","2021-05-27 21:57:46","2021-05-27 22:02:46","19"),
("75","zkqx5w","2021-05-27 22:25:54","2021-05-27 22:30:54","19"),
("76","9j87fi","2021-06-09 22:29:05","2021-06-09 22:34:05","19"),
("77","s6ywk7","2021-06-09 22:44:51","2021-06-09 22:49:51","20");




CREATE TABLE `event_log` (
  `event_id` int(110) NOT NULL AUTO_INCREMENT,
  `event_user` varchar(250) NOT NULL,
  `event_act` varchar(230) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8mb4;


INSERT INTO event_log VALUES
("47","moy","Registered","2021-04-29 18:21:19"),
("48","moy","Signed-In","2021-04-29 18:21:46"),
("49","moy","Signed-Out","2021-04-29 18:22:19"),
("50","moy","Change Password","2021-04-29 18:22:46"),
("51","moy","Signed-In","2021-05-27 21:50:45"),
("52","moy","Signed-Out","2021-05-27 21:55:03"),
("53","moy","Signed-In","2021-05-27 21:55:24"),
("54","moy","Signed-Out","2021-05-27 21:56:28"),
("55","moy","Signed-In","2021-05-27 21:56:37"),
("56","moy","Signed-Out","2021-05-27 21:57:35"),
("57","moy","Signed-In","2021-05-27 21:57:45"),
("58","moy","Signed-Out","2021-05-27 22:09:42"),
("59","moy","Signed-In","2021-05-27 22:25:51"),
("60","DanielleCedric","Registered","2021-06-09 22:24:01"),
("61","danielle_capistrano","Registered","2021-06-09 22:26:46"),
("62","danielle27","Registered","2021-06-09 22:28:29"),
("63","moy","Signed-In","2021-06-09 22:29:02"),
("64","moy","Signed-Out","2021-06-09 22:30:07"),
("65","danielle27","Registered","2021-06-09 22:32:54"),
("66","danielle27","Registered","2021-06-09 22:34:20"),
("67","danielle27","Registered","2021-06-09 22:40:02"),
("68","danielle27","Registered","2021-06-09 22:42:29"),
("69","danielle27","Signed-In","2021-06-09 22:44:49");




CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `question` varchar(230) NOT NULL,
  `answer` varchar(250) NOT NULL,
  `user_type` varchar(250) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;


INSERT INTO users VALUES
("19","moy","cedcapistrano27@gmail.com","Mama27","mom\'s name","maria","","2021-04-29"),
("20","danielle27","danielle27@gmail.com","Admin12","mom","mama","admin","2021-06-09");


