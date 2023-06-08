CREATE DATABASE IF NOT EXISTS `APP_BREUKH`;

USE `APP_BREUKH`;

CREATE TABLE
    AnneeScolaire(
        id_anneeScolaire INT NOT NULL primary KEY AUTO_INCREMENT,
        libelle VARCHAR(30) NOT NULL,
        statut ENUM("EN COURS", "TERMINÉ")
    );

DESCRIBE AnneeScolaire;

CREATE TABLE
    GROUPENIVEAU(
        ID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        LIBELLE VARCHAR(55) NOT NULL
    );

INSERT INTO GROUPENIVEAU (LIBELLE) VALUES ("ELEMENTAIRE");

INSERT INTO GROUPENIVEAU (LIBELLE) VALUES ("MOYEN");

INSERT INTO GROUPENIVEAU (LIBELLE) VALUES ("SECONDAIRE");

TRUNCATE GROUPENIVEAU;

DESC GROUPENIVEAU;

SELECT * FROM GROUPENIVEAU;

CREATE TABLE
    ANNEE_GROUPENIVEAU(
        ID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        ID_GROUPENIVEAU INT NOT NULL,
        Foreign Key (ID_GROUPENIVEAU) REFERENCES AnneeScolaire(id_anneeScolaire),
        ID_GRPLEVEL INT NOT NULL,
        Foreign Key (ID_GRPLEVEL) REFERENCES GROUPENIVEAU(ID)
    );

CREATE TABLE
    NIVEAU(
        id_niveau INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        libelle VARCHAR(30) NOT NULL,
        NIVEAU_ID INT NOT NULL,
        Foreign Key (NIVEAU_ID) REFERENCES GROUPENIVEAU(ID)
    );

SELECT *FROM GROUPENIVEAU;

INSERT INTO NIVEAU (libelle,`NIVEAU_ID`) VALUES ("CI",1);

INSERT INTO NIVEAU (libelle,`NIVEAU_ID`) VALUES ("CP",1);

INSERT INTO NIVEAU (libelle,`NIVEAU_ID`) VALUES ("CE1",1);

INSERT INTO NIVEAU (libelle,`NIVEAU_ID`) VALUES ("CE2",1);

INSERT INTO NIVEAU (libelle,`NIVEAU_ID`) VALUES ("CM1",1);

INSERT INTO NIVEAU (libelle,`NIVEAU_ID`) VALUES ("CM2",1);

INSERT INTO NIVEAU (libelle,`NIVEAU_ID`) VALUES ("6ième",7);

INSERT INTO NIVEAU (libelle,`NIVEAU_ID`) VALUES ("5ième",7);

INSERT INTO NIVEAU (libelle,`NIVEAU_ID`) VALUES ("4ième",7);

INSERT INTO NIVEAU (libelle,`NIVEAU_ID`) VALUES ("3ième",7);

INSERT INTO NIVEAU (libelle,`NIVEAU_ID`) VALUES ("2nd",8);

INSERT INTO NIVEAU (libelle,`NIVEAU_ID`) VALUES ("1ière",8);

INSERT INTO NIVEAU (libelle,`NIVEAU_ID`) VALUES ("Terminal",8);

SELECT * FROM `NIVEAU`;

TRUNCATE TABLE `NIVEAU`;

SELECT * FROM `NIVEAU`;

CREATE TABLE
    ANNEE_NIVEAU(
        ID INT NOT NULL,
        ID_AnneeNiveau INT NOT NULL,
        Foreign Key (ID_AnneeNiveau) REFERENCES AnneeScolaire(id_anneeScolaire),
        ID_levelAnnee INT NOT NULL,
        Foreign Key (ID_levelAnnee) REFERENCES NIVEAU(id_niveau)
    );

CREATE TABLE
    CLASSE(
        id_classe INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        EFFECTIF INT NOT NULL,
        NOM VARCHAR(30),
        CLASSID INT NOT NULL,
        Foreign Key (CLASSID) REFERENCES NIVEAU(id_niveau)
    );

INSERT INTO `CLASSE`(EFFECTIF,NOM,CLASSID) VALUES (38,'CI A',1);

INSERT INTO `CLASSE`(EFFECTIF,NOM,CLASSID) VALUES (38,'CI B',1);

INSERT INTO `CLASSE`(EFFECTIF,NOM,CLASSID) VALUES (38,'CP A',2);

INSERT INTO `CLASSE`(EFFECTIF,NOM,CLASSID) VALUES (38,'CE1 A',3);

INSERT INTO `CLASSE`(EFFECTIF,NOM,CLASSID) VALUES (38,'CE2 A',4);

INSERT INTO `CLASSE`(EFFECTIF,NOM,CLASSID) VALUES (38,'CM1 C',5);

INSERT INTO `CLASSE`(EFFECTIF,NOM,CLASSID) VALUES (38,'CM2 A',6);

INSERT INTO `CLASSE`(EFFECTIF,NOM,CLASSID) VALUES (38,'6ième A',9);

INSERT INTO `CLASSE`(EFFECTIF,NOM,CLASSID) VALUES (38,'5ième B',10);

INSERT INTO `CLASSE`(EFFECTIF,NOM,CLASSID) VALUES (38,'4ième c',11);

INSERT INTO `CLASSE`(EFFECTIF,NOM,CLASSID) VALUES (38,'2ndS 3 ',13);

INSERT INTO `CLASSE`(EFFECTIF,NOM,CLASSID) VALUES (38,'1 l2 d',14);

INSERT INTO `CLASSE`(EFFECTIF,NOM,CLASSID) VALUES (38,'TL2 C',15);

SELECT *
from `CLASSE`, `NIVEAU`
WHERE
    CLASSE.`CLASSID` = NIVEAU.`id_niveau`;

CREATE TABLE
    CLASSE_ANNEE(
        ID INT NOT NULL,
        ID_CLASSYEAR INT NOT NULL,
        Foreign Key (ID_CLASSYEAR) REFERENCES CLASSE(id_classe),
        ID_ANNEE INT NOT NULL
    );

CREATE TABLE
    ELEVE(
        id_eleVE INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        NOM VARCHAR(30) NOT NULL,
        PRENOM VARCHAR (65) NOT NULL,
        DATE_DE_NAISSANCE VARCHAR (20),
        NUMERO_ID INT NOT NULL,
        TYPE ENUM ("INTERNE", "EXTERNE") DEFAULT "INTERNE" NOT NULL,
        IDCLASSE INT NOT NULL,
        Foreign Key (IDCLASSE) REFERENCES CLASSE(id_classe)
    );

ALTER TABLE ELEVE MODIFY NUMERO_ID INT NULL;

USE DAARA_BREUKH;

SELECT * FROM AnneeScolaire;

DESC AnneeScolaire;

TRUNCATE AnneeScolaire;

CREATE TABLE
    `USERS`(
        `id_users` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        `telephone` VARCHAR (30) NOT NULL,
        `password` VARCHAR (30) NOT NULL
    );

INSERT INTO
    `USERS` (telephone, password)
VALUES ('781483023', 'kimpou05');

TRUNCATE `GROUPENIVEAU`;

SHOW TABLES;

SELECT NOM
FROM
    GROUPENIVEAU,
    NIVEAU,
    CLASSE
WHERE
    NIVEAU_ID = 1
    AND ID_niveau = CLASSID;

SELECT `NOM`, EFFECTIF
FROM `CLASSE`
    JOIN `NIVEAU` ON NIVEAU.`id_niveau` = CLASSE.`CLASSID`
    JOIN `GROUPENIVEAU` ON GROUPENIVEAU.`ID` = NIVEAU.`NIVEAU_ID`
WHERE `ID` = 1
ORDER BY `NOM` ASC;

SELECT `NOM`, EFFECTIF
FROM `CLASSE`
    JOIN `NIVEAU` ON NIVEAU.`id_niveau` = CLASSE.`CLASSID`
    JOIN `GROUPENIVEAU` ON GROUPENIVEAU.`ID` = NIVEAU.`NIVEAU_ID`
WHERE `ID` = 8
ORDER BY `NOM` ASC;

INSERT INTO
    CLASSE (NOM, EFFECTIF, CLASSID,)
VALUES ('CE1 D', 34,);

DESCRIBE CLASSE;

SELECT * FROM CLASSE;

SELECT * FROM NIVEAU where NIVEAU_ID=1;

SELECT * FROM CLASSE where NIVEAU_ID=1;

CREATE TABLE
    Groupe_Discipline (
        id_gd int NOT NULL PRIMARY KEY AUTO_INCREMENT,
        nom_gd VARCHAR(25) not NULL
    );

INSERT INTO Groupe_Discipline (nom_gd) VALUES ('BREUKH');

INSERT INTO Groupe_Discipline (nom_gd) VALUES ('MBIRKI');

CREATE TABLE
    Discipline (
        id_disc int NOT NULL PRIMARY KEY AUTO_INCREMENT,
        nom_disc VARCHAR(25) not NULL,
        id_gd int not NULL,
        Foreign Key (id_gd) REFERENCES Groupe_Discipline(id_gd)
    );

CREATE TABLE
    CLASSDISCIP(
        id_classdisc int NOT NULL PRIMARY KEY AUTO_INCREMENT,
        DISC_ID INT NOT NULL,
        FOREIGN KEY (DISC_ID) REFERENCES Discipline(id_disc),
        CLASSE_ID INT NOT NULL,
        FOREIGN KEY (CLASSE_ID) REFERENCES CLASSE(id_classe)
    );
    INSERT INTO CLASSDISCIP (DISC_ID ,CLASSE_ID) VALUES (7,3);
SELECT * FROM CLASSDISCIP;
INSERT INTO Discipline (nom_disc) VALUES ('BREUKH');

SELECT * FROM Groupe_Discipline;

DROP TABLE Discipline;
SELECT * FROM CLASSE;

DROP TABLE Groupe_Discipline;

SELECT * FROM DISCIPLINE;

SELECT * FROM GROUPEDISCIPLINE;

INSERT INTO
    GROUPEDISCIPLINE (ID_GRPEDISIPLINE, LIBELLE)
VALUES (1, "");

SELECT * FROM NIVEAU;

-- SELECT * FROM CLASSE WHERE CLASSID=GROUPENIVEAU.IDGR;

SELECT
    CLASSE.id_classe,
    CLASSE.NOM
FROM CLASSE
    INNER JOIN NIVEAU ON CLASSE.CLASSID = NIVEAU.id_niveau
where NIVEAU.NIVEAU_ID = 1;


SELECT * FROM Discipline;
SELECT
    nom_disc
FROM Discipline
    JOIN CLASSDISCIP ON CLASSDISCIP.DISC_ID = Discipline.id_disc
WHERE id_classdisc = 7
ORDER BY nom_disc ASC;

SELECT
    nom_disc
FROM Discipline
    JOIN CLASSDISCIP ON CLASSDISCIP.DISC_ID = Discipline.id_disc
WHERE id_classdisc = 2
ORDER BY nom_disc ASC;