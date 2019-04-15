USE sports_cms;

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






 





