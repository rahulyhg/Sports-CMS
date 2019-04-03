CREATE DATABASE sports_cms;
USE sports_cms;

CREATE TABLE IF NOT EXISTS `rating` (
  `rating_id` INT NOT NULL UNIQUE AUTO_INCREMENT,
  `mean` DOUBLE NOT NULL,
  `standard_deviation` DOUBLE NOT NULL,
  `last_calculated` DATETIME NOT NULL,
  `sport_id` INT NOT NULL,
  PRIMARY KEY (`rating_id`),
  KEY `FK` (`sport_id`)
);

CREATE TABLE IF NOT EXISTS `plays_at` (
  `club_id` INT NOT NULL,
  `event_id` INT NOT NULL,
  KEY `PK, FK` (`club_id`, `event_id`)
);

CREATE TABLE IF NOT EXISTS `club` (
  `club_id` INT NOT NULL UNIQUE AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL UNIQUE,
  `region_id` INT NOT NULL,
  PRIMARY KEY (`club_id`),
  KEY `FK` (`region_id`)
);

CREATE TABLE IF NOT EXISTS `region` (
  `region_id` INT NOT NULL UNIQUE AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL UNIQUE,
  PRIMARY KEY (`region_id`)
);

CREATE TABLE IF NOT EXISTS `consists_of` (
  `player_id` INT NOT NULL,
  `team_id` INT NOT NULL,
  KEY `PK, FK` (`player_id`, `team_id`)
);

CREATE TABLE IF NOT EXISTS `event` (
  `event_id` INT NOT NULL UNIQUE AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `region_id` INT NOT NULL,
  `sport_id` INT NOT NULL,
  PRIMARY KEY (`event_id`),
  KEY `FK` (`region_id`, `sport_id`)
);

CREATE TABLE IF NOT EXISTS `match_result` (
  `match_result_id` INT NOT NULL UNIQUE AUTO_INCREMENT,
  `won` VARCHAR(1) NOT NULL CHECK (won IN ('Y', 'N')),
  `player_id` INT NOT NULL,
  PRIMARY KEY (`match_result_id`),
  KEY `FK` (`player_id`)
);

CREATE TABLE IF NOT EXISTS `account` (
  `account_id` INT NOT NULL UNIQUE AUTO_INCREMENT,
  `given_name` VARCHAR(45) NOT NULL,
  `family_name` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL UNIQUE,
  `password` VARCHAR(128) NOT NULL,
  `salt` VARCHAR(128) NOT NULL,
  `access_level` TINYINT NOT NULL DEFAULT '2' CHECK (access_level IN ('0', '1', '2')),
  `date_created` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` VARCHAR(1) NOT NULL DEFAULT 'N' ,
  `club_id` INT NOT NULL,
  PRIMARY KEY (`account_id`),
  KEY `FK` (`club_id`)
);

CREATE TABLE IF NOT EXISTS `sport` (
  `sport_id` INT NOT NULL UNIQUE AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`sport_id`)
);

CREATE TABLE IF NOT EXISTS `membership` (
  `club_id` INT NOT NULL,
  `player_id` INT NOT NULL,
  KEY `PK, FK` (`club_id`, `player_id`)
);

CREATE TABLE IF NOT EXISTS `match` (
  `match_id` INT NOT NULL UNIQUE AUTO_INCREMENT,
  `type` VARCHAR(10) NOT NULL CHECK (type in ('Single', 'Double')),
  `date_played` DATETIME NOT NULL,
  `event_id` INT NOT NULL,
  `match_result_id` INT NOT NULL,
  `match_statistics_id` INT NOT NULL,
  PRIMARY KEY (`match_id`),
  KEY `FK` (`event_id`, `match_result_id`, `match_statistics_id`)
);

CREATE TABLE IF NOT EXISTS `player` (
  `player_id` INT NOT NULL UNIQUE AUTO_INCREMENT,
  `given_name` VARCHAR(45) NOT NULL,
  `family_name` VARCHAR(45) NOT NULL,
  `gender` VARCHAR(1) NOT NULL CHECK (gender in ('M', 'F')),
  `date_of_birth` DATETIME NOT NULL,
  `email` VARCHAR(45) NOT NULL UNIQUE,
  `last_played` DATETIME NOT NULL,
  `receive_emails` VARCHAR(1) NOT NULL DEFAULT 'Y'  CHECK (receive_emails IN ('Y', 'N')),
  `rating_id` INT NOT NULL,
  PRIMARY KEY (`player_id`),
  KEY `FK` (`rating_id`)
);

CREATE TABLE IF NOT EXISTS `team` (
  `team_id` INT NOT NULL UNIQUE AUTO_INCREMENT,
  `rating_id` INT NOT NULL,
  PRIMARY KEY (`team_id`),
  KEY `FK` (`rating_id`)
);

CREATE TABLE IF NOT EXISTS `match_statistics` (
  `match_statistics_id` INT NOT NULL UNIQUE AUTO_INCREMENT,
  `mean_before_winning` DOUBLE NOT NULL,
  `mean_after_winning` DOUBLE NOT NULL,
  `standard_deviation_before_winning` DOUBLE NOT NULL,
  `standard_deviation_after_winning` DOUBLE NOT NULL,
  `mean_before_losing` DOUBLE NOT NULL,
  `mean_after_losing` DOUBLE NOT NULL,
  `standard_deviation_before_losing` DOUBLE NOT NULL,
  `standard_deviation_after_losing` DOUBLE NOT NULL,
  PRIMARY KEY (`match_statistics_id`)
);

