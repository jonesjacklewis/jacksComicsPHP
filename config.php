<?php 

$mysqli = new mysqli('localhost', 'root', '', 'jacks-comics-php');
$sql = "
CREATE TABLE IF NOT EXISTS `comics` (
  `id` int(11) NOT NULL PRIMARY KEY,
  `isbn` varchar(32) NOT NULL UNIQUE,
  `title` varchar(256) NOT NULL,
  `mainCharacter` varchar(64) DEFAULT NULL,
  `author` varchar(256) DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `link` varchar(512) NOT NULL,
  `rating` int(11) DEFAULT NULL,
  `image` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

$mysqli->query($sql);

?>