CREATE TABLE AGENTS(
	id INTEGER PRIMARY KEY AUTO_INCREMENT,
	nom VARCHAR(40),
	prenom VARCHAR(40),
	caracteristique TEXT,
	note INTEGER (10),
	prix_journee INTEGER,
	photo TEXT
	);



INSERT INTO AGENTS_LISTE(id,nom,prenom,caracteristique,note,prix_journee,photo) VALUES
	(00000001,"Duvier","Pascal","taille : 1m93 , age : 48",9,1500,"agent1.jpg"),
	(00000002,"Budd","David","",10,900,"agent2.jpg"),
	(00000003,"Dupont","Maurice","",1,120,"agent3.jpg")
	(00000004,"James","Bond","",7,420,"agent0.jpg")
