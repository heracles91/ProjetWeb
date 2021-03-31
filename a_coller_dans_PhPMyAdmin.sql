CREATE TABLE AGENTS_LISTE(
	id INTEGER PRIMARY KEY AUTO_INCREMENT,
	nom VARCHAR(40),
	prenom VARCHAR(40),
	sexe VARCHAR(10),
	caracteristique TEXT,
	note INTEGER (10),
	prix_journee INTEGER,
	photo TEXT
	);



INSERT INTO AGENTS_LISTE(id,nom,prenom,sexe,caracteristique,note,prix_journee,photo)
VALUES
(00000001,"Duvier","Pascal","homme","Taille : 193, Âge : 48",9,1500,"agent1.jpg"),
(00000002,"Budd","David","homme","Violent",10,900,"agent2.jpg"),
(00000003,"Wick","John","homme","Visée parfaite",1,120,"agent3.jpg"),
(00000004,"Bond","James","homme","Discret et calme",7,420,"agent0.jpg");



CREATE TABLE NOTES_AGENTS(
	id_note INT AUTO_INCREMENT,
	PRIMARY KEY(id_note),
	id_agent INT,
	FOREIGN KEY(id_agent) REFERENCES AGENTS_LISTE(id) ,
	note FLOAT
	);

CREATE TABLE RESERVATIONS(
	id_resa INT AUTO_INCREMENT,
	PRIMARY KEY(id_resa),
	id_client INT,
	FOREIGN KEY(id_client) REFERENCES Clients(id),
	id_agent INT,
	FOREIGN KEY(id_agent) REFERENCES AGENTS_LISTE(id) ,
	premier_jour DATE,
	dernier_jour DATE
	);

-- INSERT INTO RESERVATIONS(id_resa,id_client,id_agent,premier_jour,dernier_jour)
-- VALUES
-- 	(33,1,2021-03-28,2021-03-31,0),
-- 	(34,1,2021-04-04,2021-04-07,0),
-- 	(35,1,2021-04-23,2021-04-29,0),
-- 	(36,2,2021-03-28,2021-03-30,0),
-- 	(37,3,2021-03-28,2021-03-31,0),
-- 	(39,1,2021-06-09,2021-06-13,0),	
-- 	(42,2,2021-03-31,2021-03-31,0),
-- 	(43,1,2021-04-08,2021-04-22,0);

CREATE TABLE CLIENTS(
	id INT AUTO_INCREMENT,
	PRIMARY KEY(id),
	prenom VARCHAR(40),
	nom VARCHAR(40),
	mail TEXT,
	mdp TEXT
	);






