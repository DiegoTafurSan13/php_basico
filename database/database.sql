create table oneDeck(
	id_key int not null primary key AUTO_INCREMENT,
    name varchar(50),
    description text,
    quality varchar(20),
    objetives varchar(20),
    attack_speed decimal(10,2),
    affected_target decimal(10,2),
    scope decimal(10,2),
    speed varchar(20),
    letter_level int,
    life_points int,
    damage int,
    damage_for_seconds int  
);