CREATE DATABASE sports_cms;
USE sports_cms;

CREATE TABLE IF NOT EXISTS `country` (
  `country_id` INT NOT NULL UNIQUE AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL UNIQUE,
  PRIMARY KEY (`country_id`)
);

CREATE TABLE IF NOT EXISTS `state` (
  `state_id` INT NOT NULL UNIQUE AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL UNIQUE,
  `country_id` INT NOT NULL,
  PRIMARY KEY (`state_id`),
  FOREIGN KEY (`country_id`) REFERENCES country(country_id)
);

CREATE TABLE IF NOT EXISTS `sport` (
  `sport_id` INT NOT NULL UNIQUE AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`sport_id`)
);

CREATE TABLE IF NOT EXISTS `rating` (
  `rating_id` INT NOT NULL UNIQUE AUTO_INCREMENT,
  `mean` DOUBLE NOT NULL,
  `standard_deviation` DOUBLE NOT NULL,
  `last_calculated` DATETIME NOT NULL,
  `sport_id` INT NOT NULL,
  PRIMARY KEY (`rating_id`),
  FOREIGN KEY (`sport_id`) REFERENCES sport(sport_id)
);

CREATE TABLE IF NOT EXISTS `club` (
  `club_id` INT NOT NULL UNIQUE AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL UNIQUE,
  `country_id` INT NOT NULL,
  `state_id` INT NOT NULL,
  PRIMARY KEY (`club_id`),
  FOREIGN KEY (`country_id`) REFERENCES country(country_id),
  FOREIGN KEY (`state_id`) REFERENCES state(state_id)
);

CREATE TABLE IF NOT EXISTS `event` (
  `event_id` INT NOT NULL UNIQUE AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `country_id` INT NOT NULL,
  `state_id` INT NOT NULL,
  `sport_id` INT NOT NULL,
  PRIMARY KEY (`event_id`),
  FOREIGN KEY (`country_id`) REFERENCES country(country_id),
  FOREIGN KEY (`state_id`) REFERENCES state(state_id),
  FOREIGN KEY (`sport_id`) REFERENCES sport(sport_id)
);

CREATE TABLE IF NOT EXISTS `plays_at` (
  `club_id` INT NOT NULL,
  `event_id` INT NOT NULL,
  PRIMARY KEY (`club_id`, `event_id`),
  FOREIGN KEY (`club_id`) REFERENCES club(club_id),
  FOREIGN KEY (`event_id`) REFERENCES event(event_id)
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
  `country_id` INT NOT NULL,
  `rating_id` INT NOT NULL,
  PRIMARY KEY (`player_id`),
  FOREIGN KEY (`country_id`) REFERENCES country(country_id),
  FOREIGN KEY (`rating_id`) REFERENCES rating(rating_id)
);

CREATE TABLE IF NOT EXISTS `team` (
  `team_id` INT NOT NULL UNIQUE AUTO_INCREMENT,
  `rating_id` INT NOT NULL,
  PRIMARY KEY (`team_id`),
  FOREIGN KEY (`rating_id`) REFERENCES rating(rating_id)
);

CREATE TABLE IF NOT EXISTS `consists_of` (
  `player_id` INT NOT NULL,
  `team_id` INT NOT NULL,
  PRIMARY KEY (`player_id`, `team_id`),
  FOREIGN KEY (`player_id`) REFERENCES player(player_id),
  FOREIGN KEY (`team_id`) REFERENCES team(team_id)
);

CREATE TABLE IF NOT EXISTS `match_result` (
  `match_result_id` INT NOT NULL UNIQUE AUTO_INCREMENT,
  `won` VARCHAR(1) NOT NULL CHECK (won IN ('Y', 'N')),
  `player_id` INT NOT NULL,
  PRIMARY KEY (`match_result_id`),
  FOREIGN KEY (`player_id`) REFERENCES player(player_id)
);

CREATE TABLE IF NOT EXISTS `account` (
  `account_id` INT NOT NULL UNIQUE AUTO_INCREMENT,
  `given_name` VARCHAR(45) NOT NULL,
  `family_name` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL UNIQUE,
  `password` VARCHAR(255) NOT NULL,
  `access_level` TINYINT NOT NULL DEFAULT '2' CHECK (access_level IN ('0', '1', '2')),
  `date_created` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` VARCHAR(1) NOT NULL DEFAULT 'N',
  PRIMARY KEY (`account_id`)
);

CREATE TABLE IF NOT EXISTS `membership` (
  `club_id` INT NOT NULL,
  `player_id` INT NOT NULL,
  PRIMARY KEY (`club_id`, `player_id`),
  FOREIGN KEY (`club_id`) REFERENCES club(club_id),
  FOREIGN KEY (`player_id`) REFERENCES player(player_id)
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

CREATE TABLE IF NOT EXISTS `match` (
  `match_id` INT NOT NULL UNIQUE AUTO_INCREMENT,
  `type` VARCHAR(10) NOT NULL CHECK (type in ('Single', 'Double')),
  `date_played` DATETIME NOT NULL,
  `event_id` INT NOT NULL,
  `match_result_id` INT NOT NULL,
  `match_statistics_id` INT NOT NULL,
  PRIMARY KEY (`match_id`),
  FOREIGN KEY (`event_id`) REFERENCES event(event_id),
  FOREIGN KEY (`match_result_id`) REFERENCES match_result(match_result_id),
  FOREIGN KEY (`match_statistics_id`) REFERENCES match_statistics(match_statistics_id)
);


