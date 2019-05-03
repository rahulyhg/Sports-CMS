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
  PRIMARY KEY (`player_id`),
  FOREIGN KEY (`country_id`) REFERENCES country(country_id)
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
  `type` VARCHAR(10) NOT NULL CHECK (type in ('Single', 'Double')),
  `start_date` DATETIME NOT NULL,
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

CREATE TABLE IF NOT EXISTS `team` (
  `team_id` INT NOT NULL UNIQUE AUTO_INCREMENT,
  `player_one_id` INT NOT NULL,
  `player_two_id` INT NOT NULL,
  PRIMARY KEY (`team_id`, `player_one_id`, `player_two_id`),
  FOREIGN KEY (`player_one_id`) REFERENCES player(player_id),
  FOREIGN KEY (`player_two_id`) REFERENCES player(player_id)
);

CREATE TABLE IF NOT EXISTS `rating` (
  `rating_id` INT NOT NULL UNIQUE AUTO_INCREMENT,
  `mean` DOUBLE NOT NULL,
  `standard_deviation` DOUBLE NOT NULL,
  `last_calculated` DATETIME NOT NULL,
  `sport_id` INT NOT NULL,
  `player_id` INT DEFAULT NULL,
  `team_id` INT DEFAULT NULL,
  PRIMARY KEY (`rating_id`, `sport_id`),
  FOREIGN KEY (`sport_id`) REFERENCES sport(sport_id),
  FOREIGN KEY (`player_id`) REFERENCES player(player_id),
  FOREIGN KEY (`team_id`) REFERENCES team(team_id)
);

CREATE TABLE IF NOT EXISTS `game` (
  `game_id` INT NOT NULL UNIQUE AUTO_INCREMENT,
  `mean_before_winning` DOUBLE NOT NULL,
  `mean_after_winning` DOUBLE,
  `standard_deviation_before_winning` DOUBLE NOT NULL,
  `standard_deviation_after_winning` DOUBLE,
  `mean_before_losing` DOUBLE NOT NULL,
  `mean_after_losing` DOUBLE,
  `standard_deviation_before_losing` DOUBLE NOT NULL,
  `standard_deviation_after_losing` DOUBLE,
  `event_id` INT NOT NULL,
  PRIMARY KEY (`game_id`),
  FOREIGN KEY (`event_id`) REFERENCES event(event_id)
);

CREATE TABLE IF NOT EXISTS `game_result` (
  `game_result_id` INT NOT NULL UNIQUE AUTO_INCREMENT,
  `won` VARCHAR(1) NOT NULL CHECK (won IN ('Y', 'N')),
  `player_id` INT NOT NULL,
  `game_id` INT NOT NULL,
  PRIMARY KEY (`game_result_id`),
  FOREIGN KEY (`player_id`) REFERENCES player(player_id),
  FOREIGN KEY (`game_id`) REFERENCES game(game_id)
);

CREATE TABLE IF NOT EXISTS `account` (
  `account_id` INT NOT NULL UNIQUE AUTO_INCREMENT,
  `given_name` VARCHAR(45) NOT NULL,
  `family_name` VARCHAR(45) NOT NULL,
  `organisation` VARCHAR(90) NOT NULL,
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



insert into `country`(name) VALUES ('Australia');
insert into `country`(name) VALUES ('New Zealand');

insert into `state`(name, country_id) VALUES ('Tasmania', '1');
insert into `state`(name, country_id) VALUES ('Western Australia', '1');
insert into `state`(name, country_id) VALUES ('Auckland', '2');
insert into `state`(name, country_id) VALUES ('Otago', '2');

insert into `sport` (name) VALUES ('Badminton');
insert into `sport` (name) VALUES ('Squash');
insert into `sport` (name) VALUES ('Table tennis');

insert into `club` (name, country_id, state_id) VALUES ('Launceston Squash Club', 1, 1);
insert into `club` (name, country_id, state_Id) VALUES ('Otago Badminton Club', 2, 4);

insert into `player` (given_name, family_name, gender, date_of_birth, email, last_played, receive_emails, country_id) 
  VALUES ('Grant', 'Upson', 'M', NOW(), 'grantaupson@gmail.com', NOW(), 'Y', '1');
insert into `rating` (mean, standard_deviation, last_calculated, sport_id, player_id, team_id) VALUES (1500, 200, NOW(), 2, 1, null);





