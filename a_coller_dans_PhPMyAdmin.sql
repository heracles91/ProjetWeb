CREATE TABLE AGENTS_LISTE(
	id INTEGER PRIMARY KEY AUTO_INCREMENT,
	nom VARCHAR(40),
	prenom VARCHAR(40),
	caracteristique TEXT,
	note INTEGER (10),
	prix_journee INTEGER,
	photo TEXT
	);



INSERT INTO AGENTS_LISTE(id,nom,prenom,caracteristique,note,prix_journee,photo)
VALUES
(00000001,"Duvier","Pascal","Taille : 193, Âge : 48",9,1500,"agent1.jpg"),
(00000002,"Budd","David","Violent",10,900,"agent2.jpg"),
(00000003,"Wick","John","Visée parfaite",1,120,"agent3.jpg"),
(00000004,"Bond","James","Discret et calme",7,420,"agent0.jpg");
