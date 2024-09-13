CREATE DATABASE Boutique_BD;

CREATE TABLE categorie (
    idC INT PRIMARY KEY AUTO_INCREMENT,
    libelleC VARCHAR(25) NOT NULL
);

CREATE TABLE boutiquier(
    idb INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(25) NOT NULL,
    prenom VARCHAR(15) NOT NULL,
    email VARCHAR(20) NOT NULL,
    mdp VARCHAR(25) NOT NULL,
    telephone VARCHAR(15) NOT NULL
    
);

CREATE TABLE client (
    idcl INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(25) NOT NULL,
    prenom VARCHAR(15) NOT NULL,
    email VARCHAR(20) NOT NULL,
    telephone VARCHAR(15) NOT NULL,
    adresse VARCHAR(15) NOT NULL,
    photo VARCHAR(25) NOT NULL,
    idC INT NOT NULL,
    FOREIGN KEY (idC) REFERENCES categorie(idC)
    
);

CREATE TABLE depot (
    iddep INT PRIMARY KEY AUTO_INCREMENT,
    numero VARCHAR(25) NOT NULL,
    montantdep VARCHAR(15) NOT NULL,
    datedep DATE NOT NULL,
    idcl INT NOT NULL,
    FOREIGN KEY (idcl) REFERENCES client(idcl)
);


CREATE TABLE dette (
    idd INT PRIMARY KEY AUTO_INCREMENT,
    numero VARCHAR(25) NOT NULL,
    dated DATE NOT NULL,
    montantd VARCHAR(20) NOT NULL,
    etat VARCHAR(15) NOT NULL,
    idcl INT NOT NULL,
    FOREIGN KEY (idcl) REFERENCES client(idcl)
    
);

CREATE TABLE paiement (
    idp INT PRIMARY KEY AUTO_INCREMENT,
    referencep VARCHAR(25) NOT NULL,
    datep VARCHAR(15) NOT NULL,
    montantpay VARCHAR(20) NOT NULL,
    idd INT NOT NULL,
    FOREIGN KEY (idd) REFERENCES dette(idd)
    
);

CREATE TABLE article (
    idA INT PRIMARY KEY AUTO_INCREMENT,
    libelle VARCHAR(25) NOT NULL,
    prixU VARCHAR(15) NOT NULL,
    qtestock VARCHAR(20) NOT NULL,
    refA VARCHAR(15) NOT NULL
);

CREATE TABLE artDette(
   idA int NOT NULL,
   idd int NOT NULL,
   qtecmd VARCHAR(15) NOT NULL,
   prixAchat VARCHAR(15) NOT NULL,
   FOREIGN KEY(idA) REFERENCES article(idA),
   FOREIGN KEY(idd) REFERENCES dette(idd)
);

INSERT INTO categorie (idC,libelleC) VALUES
(NULL,'Nouveau'),
(NULL,'Fidele'),
(NULL,'Solde'),
(NULL,'Non Solde')

INSERT INTO boutiquier (idb,nom, prenom, email, mdp, telephone) VALUES 
(NULL,'Ba', 'Aliou', 'aliou@gmail.com', 'mdp123', '778098909'),
(NULL,'sow', 'Mansour', 'zo@gmail.com', 'mdp123', '778087261');

INSERT INTO client (idcl,nom, prenom, email, telephone, adresse, photo, idC) VALUES 
(NULL,'Ba', 'Amadou', 'amadou@gmail.com', '77', 'Keur Massar', 'client1.png', 1),
(NULL,'Diallo', 'Mahmoud', 'momo@gmail.com', '763048794', 'Diamaguene', 'client1.png', 1),
(NULL,'Niang', 'Ndeye fatou', 'ndeya@gmail.com', '702908787', 'Thiaroye', 'client1.png', 1),
(NULL,'Ba', 'Badara', 'badou@gmail.com', '783907645', 'Ouakam', 'client1.png', 1),
(NULL,'Mane', 'Ibrahima', 'ibou@gmail.com', '702905782', 'Niarry Tally', 'client1.png', 1),
(NULL,'Sene', 'Awa Moussa', 'awa@gmail.com', '765239084', 'Dakar', 'client1.png', 1),
(NULL,'Ndiaye', 'Khamidou', 'khaf@gmail.com', '775027406', 'Malika', 'client1.png', 1);

INSERT INTO depot (iddep,numero, montantdep, datedep, idcl) VALUES 
(NULL,'D0001', '35000', '2024-07-01', 1),
(NULL,'D0002', '40000', '2024-07-10', 2),
(NULL,'D0003', '30000', '2024-07-19', 3),
(NULL,'D0004', '25000', '2024-08-05', 4),
(NULL,'D0005', '50000', '2024-07-31', 5),
(NULL,'D0006', '20000', '2024-07-24', 6);


INSERT INTO dette (idd,numero, dated, montantd, etat, idcl) VALUES 
(NULL,'DT0001', '2024-07-30', '20000', 'Non soldé', 1),
(NULL,'DT0002', '2024-07-12', '15000', 'Non soldé', 2),
(NULL,'DT0003', '2024-07-25', '50000', 'Non soldé', 3),
(NULL,'DT0004', '2024-07-22', '8000', 'Non soldé', 4),
(NULL,'DT0005', '2024-07-20', '25000', 'Non soldé', 5),
(NULL,'DT0006', '2024-07-18', '20000', 'Payé', 6);

INSERT INTO paiement (idp,referencep, datep, montantpay, idd) VALUES 
(NULL,'P0001', '2024-07-31', '5000', 1),
(NULL,'P0002', '2024-07-30', '10000', 2),
(NULL,'P0003', '2024-07-31', '20000', 3),
(NULL,'P0004', '2024-07-29', '1000', 4),
(NULL,'P0004', '2024-07-06', '1000', 5),
(NULL,'P0002', '2024-07-06', '20000', 6)


INSERT INTO article (idA,refA,libelle, prixU, qtestock) VALUES 
(NULL,'A0001','Riz','500', '200'),
(NULL,'A0002','Huile', '700', '1000'),
(NULL,'A0003','Omo', '250', '2500'),
(NULL,'A0004','Mil', '1750', '500'),
(NULL,'A0005','Mais', '250', '500'),
(NULL,'A0006','Lait en poudre', '150', '500'),

INSERT INTO artDette (idA, idd,qtecmd,prixAchat)  VALUES 
(1, 1,10,500),
(2, 2,20,700),
(3, 3,5,250),
(4, 4,10,1750),
(5, 5,5,250),
(6, 6,15,150)



