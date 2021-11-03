DROP DATABASE IF EXISTS `jarvis-chat`;
CREATE DATABASE `jarvis-chat`;
USE `jarvis-chat`;
CREATE TABLE `berichten` (
	id MEDIUMINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    auteur_id VARCHAR (100),
    bericht VARCHAR(25000) NOT NULL, 
    tijd_verstuurd DATETIME DEFAULT CURRENT_TIMESTAMP, 
    kanaal_id INT
);
USE `jarvis-chat`;
CREATE TABLE `gebruikers` (
	id MEDIUMINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    naam VARCHAR(100) NOT NULL, 
    iscoach BOOLEAN 
);  
USE `jarvis-chat`;
CREATE TABLE `kanalen` (
	id MEDIUMINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    module VARCHAR(100)
);
USE `jarvis-chat`;
CREATE TABLE `kanaal_gebruikers` (
	kanaal_id INT,
    gebruiker_id INT
);
INSERT INTO `kanalen` (`id`, `module`) VALUES ('1', 'HTML/CSS');
INSERT INTO `kanalen` (`id`, `module`) VALUES ('2', 'Git beginner');
INSERT INTO `kanalen` (`id`, `module`) VALUES ('3', 'PHP beginner');