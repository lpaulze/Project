DROP database IF exists bdPokeCarte;
CREATE DATABASE if not exists bdPokeCarte;
USE bdPokeCarte;

--
-- Table Bloc --
--
CREATE TABLE IF NOT EXISTS Bloc
(
	 id  int(2) NOT NULL AUTO_INCREMENT,
	 nom   varchar(15),
     image   varchar(500),
	 PRIMARY KEY (id)
)
ENGINE=InnoDB;

--
-- Table Serie --
--
CREATE TABLE IF NOT EXISTS Serie
(
	 id  int(2) NOT NULL AUTO_INCREMENT,
	 nom   varchar(15),
     image   varchar(500),
     stamp   varchar(500),
	 langue varchar(50),
     date   Date,
     idBloc int,
	 PRIMARY KEY (id),
     foreign key (idBloc) references Bloc(id)
)
ENGINE=InnoDB;

--
-- Table Carte --
--
CREATE TABLE IF NOT EXISTS Carte
(
	 id  int(2) NOT NULL AUTO_INCREMENT,
	 nom   varchar(15),
     numero   varchar(15),
     image   varchar(50),
     rarete   varchar(20),
     idSerie int,
	 PRIMARY KEY (id),
     foreign key (idSerie) references Serie(id)
)
ENGINE=InnoDB;

--
-- Table Connexion --
--
CREATE TABLE IF NOT EXISTS Connexion
(
	 id  int(2) NOT NULL AUTO_INCREMENT,
	 login   varchar(15),
     mdp   varchar(15),
     role varchar(15),
	 PRIMARY KEY (id)
)
ENGINE=InnoDB;

DELIMITER $$

CREATE TRIGGER SupprimerCartesAvantSerie
BEFORE DELETE ON serie
FOR EACH ROW
BEGIN
    -- Supprimer toutes les cartes liées à cette serie
    DELETE FROM Carte WHERE idSerie = OLD.id;
END $$

DELIMITER ;


--
-- Contenu de la table `Connexion`
--
INSERT INTO Connexion (login,mdp,role) VALUES 
('admin', 'admin','admin');

INSERT INTO Bloc (nom) VALUES 
('EV'),
('EVO CELESTE'),
('DESTINEE A PALDEA');

INSERT INTO Serie (nom,image,stamp,idBloc,langue) VALUES 
('151', './Image/Logos/MEW.png','./Image/Stamps/MEW.png',1,'fr'),
('Set de base', './Image/Logos/BS.png',null,1,'fr'),
('151', './Image/Logos/SV2A.png','./Image/Stamps/SV2A.png',1,'jap'),
('Stellar Miracle', './Image/Logos/SV7.png','./Image/Stamps/SV7.png',1,'jap'),
('Stellar Miracle', './Image/Logos/SV7.png','./Image/Stamps/SV7.png',1,'jap');

INSERT INTO Carte (nom,numero,image,rarete,idSerie) VALUES 
('Dracaufeu', '183','./Image/Cartes/183.jpg','Ultra Rare','1'),
('Electore', '202','./Image/Cartes/202.jpg','Ilustration Speciale Rare','1'),
('Dracaufeu', '199','./Image/Cartes/199.jpg','Ilustration Speciale Rare','1'),
('Tortank', '200','./Image/Cartes/200.jpg','Ilustration Speciale Rare','1'),
('Dachsbun', '129',null,'SAR','4'),
('Dachsbun', '129',null,'SAR','5');

Select C.id, C.nom, C.numero, C.image, C.rarete, C.idSerie From Carte C inner Join Serie S on S.id = C.idSerie where C.idSerie = 1 order by C.numero;
Select * From Serie;
select b.nom from serie s inner join bloc b on b.id = idBloc where idBloc = 3;

delete from serie where id = 5;


