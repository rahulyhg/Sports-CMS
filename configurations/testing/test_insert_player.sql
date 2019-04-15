USE sports_cms;

insert into `rating` (mean, standard_deviation, last_calculated, sport_id) VALUES (1500, 200, NOW(), 2);
insert into `player` (given_name, family_name, gender, date_of_birth, email, last_played, receive_emails, country_id, rating_id) 
	VALUES ('Grant', 'Upson', 'M', NOW(), 'grantaupson@gmail.com', NOW(), 'Y', '1', LAST_INSERT_ID());







 





