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

