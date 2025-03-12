# SOURCE C:/wamp64/www/Echipa08_F2/database.sql; 
/*          Folositi pentru cale simbolul "/", NU "/"         */ 


/*#############################################################*/
/*        PARTEA 1 - STERGEREA SI RECREAREA BAZEI DE DATE      */

DROP DATABASE ETTI_HOSPITAL;
CREATE DATABASE ETTI_HOSPITAL;
USE ETTI_HOSPITAL;

/*#############################################################*/




/*#############################################################*/
/*                  PARTEA 2 - CREAREA TABELELOR              */




create table tblSectii
(
	IdSectie SMALLINT(10) not null unique,
	NumeSectie VARCHAR(50)
);
alter table tblSectii add constraint pk_tblSectii primary key (IdSectie);
alter table tblSectii add unique (NumeSectie);







create table tblMedici
(
	IdMedic SMALLINT(10) not null,
	CNP VARCHAR(13) not null unique,
	Nume VARCHAR(50) not null,
	Prenume VARCHAR(50) not null,
	Specializare VARCHAR(50) not null,
	Grad VARCHAR(30),
	Sectie SMALLINT(10) not null
);
alter table tblMedici add constraint pk_medici primary key (IdMedic);
alter table tblMedici add constraint fk_medici foreign key (Sectie) references tblSectii (IdSectie)  ON DELETE CASCADE;






create table tblPacienti
(
	IdPacient SMALLINT(10) not null,
	Nume VARCHAR(50) not null,
	Prenume VARCHAR(50) not null,
	CNP VARCHAR(13) not null unique,
	MediuDeProvenienta VARCHAR(10) not null,
	Adresa VARCHAR(100) not null
);
alter table tblPacienti add constraint pk_tblPacienti primary key (IdPacient);
alter table tblPacienti add unique (CNP);






create table tblFiseMedicale
(
	Numar SMALLINT(10) not null unique,
	IdFisa SMALLINT(10) not null,
	Medic SMALLINT(10) not null,
	Pacient SMALLINT(10) not null
);
alter table tblFiseMedicale add constraint pk_fisa primary key (IdFisa);
alter table tblFiseMedicale add constraint fk_medici2 foreign key (Medic) references tblMedici (IdMedic) ON DELETE CASCADE;
alter table tblFiseMedicale add constraint fk_tblPacienti foreign key (Pacient) references tblPacienti (IdPacient) ON DELETE CASCADE;







create table tblInvestigatii
(
	IdInvestigatie SMALLINT(10) not null,
	NumeInvestigatie VARCHAR(50) unique,
	Rezultate VARCHAR(500),
	Fisa SMALLINT(10) not null
);
alter table tblInvestigatii add constraint pk_investigatii primary key (IdInvestigatie);
alter table tblInvestigatii add constraint fk_fisa foreign key (Fisa) references tblFiseMedicale (IdFisa) ON DELETE CASCADE;









create table tblInternari
(
	Numar SMALLINT(10),
	IdInternare SMALLINT(10),
	DataInternarii DATE,
	DataExternarii DATE,
	Fisa SMALLINT(10) not null
);
alter table tblInternari add constraint pk_internari primary key (IdInternare);
alter table tblInternari add constraint fk_fisa2 foreign key (Fisa) references tblFiseMedicale (IdFisa) ON DELETE CASCADE;











/*#############################################################*/




-- /*#############################################################*/
-- /*         PARTEA 3 - INSERAREA INREGISTRARILOR IN TABELE      */

INSERT INTO tblSectii VALUES(1,'Pediatrie'); 
INSERT INTO tblSectii VALUES(2,'Chirurgie');
INSERT INTO tblSectii VALUES(3,'Dermatologie');
INSERT INTO tblSectii VALUES(4,'Oftalmologie');
INSERT INTO tblSectii VALUES(5,'Stomatologie');
INSERT INTO tblSectii VALUES(6,'Ginecologie');
INSERT INTO tblSectii VALUES(7,'Psihiatrie');
INSERT INTO tblSectii VALUES(8,'Ortopedie');
INSERT INTO tblSectii VALUES(9,'Boli infectioase');
INSERT INTO tblSectii VALUES(10,'Obstetrica si Ginecologie');



INSERT INTO tblPacienti VALUES (95, 'Halep','Adriana','2790713321695', 'Urban', 'Strada Florilor nr. 23, Bucuresti, sector 3');
INSERT INTO tblPacienti VALUES (96, 'Manea','Teodor','1790714321697','Rural', 'Aleea Padurii nr. 7, Cluj-Napoca, jud. Cluj');
INSERT INTO tblPacienti VALUES (97, 'Gutui','Florica','2820527453728', 'Urban', 'Bulevardul Trandafirilor nr. 15, Timisoara, jud. Timis');
INSERT INTO tblPacienti VALUES (98, 'Chitu','Andrei','1570408573417','Rural', 'Strada Mihai Viteazu nr. 10, Iasi, jud. Iasi');
INSERT INTO tblPacienti VALUES (99, 'Zamfir','Ioana','3310105462866','Urban', 'Piata Libertătii nr. 12, Brasov, jud. Brasov');
INSERT INTO tblPacienti VALUES (100,'Tasbac','Maria','3601123454734', 'Rural', 'Bulevardul Independentei nr. 30, Constanta, jud. Constanta');
INSERT INTO tblPacienti VALUES (101,'Costea','Flavius','1820525453727','Urban', 'Strada Revolutiei nr. 8, Craiova, jud. Dolj');
INSERT INTO tblPacienti VALUES (102,'Tapu','Florina','6010415345120', 'Rural', 'Bulevardul Unirii nr. 5, Galati, jud. Galati');
INSERT INTO tblPacienti VALUES (103, 'Mitu','Madalina','6310132490891', 'Urban', 'Aleea Castanilor nr. 17, Ploiesti, jud. Prahova');
INSERT INTO tblPacienti VALUES(104,'Duta','Catalin','5040316314696', 'Rural', 'Strada Crangului nr. 20, Sibiu, jud. Sibiu');




INSERT INTO tblMedici VALUES (1003,'1650101234567','Albulescu','Ion','Medic Chirurg-Estetic','rezident',2);
INSERT INTO tblMedici VALUES (1015,'2780412345678','Nedelcu','Lucian','Medic Pediatru','generalist',1);
INSERT INTO tblMedici VALUES (1023,'1820709876543','Ciobanu','Rares','Medic Neurochirurg','rezident',2);
INSERT INTO tblMedici VALUES (1031,'2900208765432','Enache','Simona','Medic Oftalmolog ','rezident',4);
INSERT INTO tblMedici VALUES (1044,'1730407654321','Boja','Violeta','Medic Chirurg-cardiac','primar',2);
INSERT INTO tblMedici VALUES (1059,'2861216543210','Bajenaru','Razvan','Medic Ginecolog','primar',6);
INSERT INTO tblMedici VALUES (1061,'1680225432109','Dedu','Leonora','Psiholog/Psihiatru','primar',7);
INSERT INTO tblMedici VALUES (1072,'2800314321098','Bizdideanu','Laur','Medic Specialist','generalist',9);
INSERT INTO tblMedici VALUES (1085,'1950113210987','Vladau','Medeea','Medic Dermatolog ','specialist',3);
INSERT INTO tblMedici VALUES (1091,'2710922109876','Nedelea','Vasile','Medic Ortoped','specialist',8);




INSERT INTO tblFiseMedicale VALUES (1,365,1003,101);
INSERT INTO tblFiseMedicale VALUES (2,502,1044,100);
INSERT INTO tblFiseMedicale VALUES (3,715,1023,104);
INSERT INTO tblFiseMedicale VALUES (4,847,1031,103);
INSERT INTO tblFiseMedicale VALUES (5,906,1023,102);
INSERT INTO tblFiseMedicale VALUES (6,1005,1003,99);
INSERT INTO tblFiseMedicale VALUES (7,1163,1085,96);
INSERT INTO tblFiseMedicale VALUES (8,1255,1091,98);
INSERT INTO tblFiseMedicale VALUES (9,1459,1061,97);
INSERT INTO tblFiseMedicale VALUES (10,1500,1031,95);




INSERT INTO tblInvestigatii VALUES(1001,'Inv01','Obezitate faza II',365);
INSERT INTO tblInvestigatii VALUES(1025,'Inv02','Tahicardie',502);
INSERT INTO tblInvestigatii VALUES(1102,'Inv03','Parkinson',715);
INSERT INTO tblInvestigatii VALUES(1123,'Inv04','Miopie in faza avansata',847);
INSERT INTO tblInvestigatii VALUES(1156,'Inv05','Tumoare cerebrala',906);
INSERT INTO tblInvestigatii VALUES(1210,'Inv06','Pneumonie Lobara',1005);
INSERT INTO tblInvestigatii VALUES(1256,'Inv07','Acnee Severa',1163);
INSERT INTO tblInvestigatii VALUES(1295,'Inv08','Osteogeneza',1255);
INSERT INTO tblInvestigatii VALUES(1369,'Inv09','Stres',1459);
INSERT INTO tblInvestigatii VALUES(1356 ,'Inv10','Inflamarea irisului',1500);



INSERT INTO tblInternari VALUES (1,2411,'2024-10-07','2024-10-10',365);
INSERT INTO tblInternari VALUES (2,3235,'2024-07-23','2024-08-10',502);
INSERT INTO tblInternari VALUES (3,5611,'2024-11-05','2024-11-13',715);
INSERT INTO tblInternari VALUES (4,1226,'2024-12-12','2024-12-13',847);
INSERT INTO tblInternari VALUES (5,1450,'2024-10-15','2024-10-25',906);
INSERT INTO tblInternari VALUES (6,1910,'2024-11-18','2024-11-25',1005);
INSERT INTO tblInternari VALUES (7,2141,'2024-08-08','2024-08-12',1163);
INSERT INTO tblInternari VALUES (8,3155,'2024-11-10','2024-11-13',1255);
INSERT INTO tblInternari VALUES (9,4168,'2024-08-15','2024-09-15',1459);
INSERT INTO tblInternari VALUES (10,7421,'2024-10-15','2024-10-16',1500);




/*#############################################################*/


/*#############################################################*/
/*  PARTEA 4 - VIZUALIZAREA STUCTURII BD SI A INREGISTRARILOR  */
DESCRIBE tblSectii;
DESCRIBE tblPacienti;
DESCRIBE tblMedici;
DESCRIBE tblInvestigatii;
DESCRIBE tblFiseMedicale;
DESCRIBE tblInternari;

SELECT * from tblSectii;
SELECT * from tblPacienti;
SELECT * from tblMedici;
SELECT * from tblInvestigatii;
SELECT * from tblFiseMedicale;
SELECT * from tblInternari;
/*#############################################################*/

-- DELETE FROM tblInvestigatii
-- WHERE IdInvestigatie = 1001;

-- Interogari
/*#############################################################*/

-- I1
SELECT 
    p.Nume AS NumePacient,
    p.Prenume AS PrenumePacient,
    p.CNP,
    i.Rezultate AS RezultatInvestigatie,
    i.NumeInvestigatie AS NumeInvestigatie
FROM 
    tblPacienti p
LEFT JOIN 
    tblFiseMedicale fm ON p.IdPacient = fm.Pacient
LEFT JOIN 
    tblInvestigatii i ON fm.IdFisa = i.Fisa;
-- I1





-- I2
SELECT 
    p.Nume AS NumePacient,
    p.Prenume AS PrenumePacient,
    p.CNP,
    i.Rezultate AS RezultatInvestigatie,
    i.NumeInvestigatie AS NumeInvestigatie
FROM 
    tblPacienti p
JOIN 
    tblFiseMedicale fm ON p.IdPacient = fm.Pacient
JOIN 
    tblInvestigatii i ON fm.IdFisa = i.Fisa;
-- I2


-- I3
SELECT 
    fm.IdFisa AS 'Medical File ID',
    CONCAT(m.Nume, ' ', m.Prenume) AS 'Medic Full Name',
    CONCAT(p.Nume, ' ', p.Prenume) AS 'Patient Full Name'
FROM 
    tblFiseMedicale fm
JOIN 
    tblMedici m ON fm.Medic = m.IdMedic
JOIN 
    tblPacienti p ON fm.Pacient = p.IdPacient;
-- I3


-- I4
SELECT 
    fm.IdFisa AS 'Medical File ID',
    CONCAT(m.Nume, ' ', m.Prenume) AS 'Medic Full Name',
    CONCAT(p.Nume, ' ', p.Prenume) AS 'Patient Full Name',
    i.NumeInvestigatie AS 'Investigation Name',
    i.Rezultate AS 'Investigation Result'
FROM 
    tblFiseMedicale fm
JOIN 
    tblMedici m ON fm.Medic = m.IdMedic
JOIN 
    tblPacienti p ON fm.Pacient = p.IdPacient
LEFT JOIN 
    tblInvestigatii i ON fm.IdFisa = i.Fisa;
-- I4


-- I5
SELECT 
    fm.IdFisa AS 'Medical File ID',
    CONCAT(m.Nume, ' ', m.Prenume) AS 'Medic Full Name',
    CONCAT(p.Nume, ' ', p.Prenume) AS 'Patient Full Name',
    i.NumeInvestigatie AS 'Investigation Name',
    i.Rezultate AS 'Investigation Result',
    inr.DataInternarii AS 'Admission Date',
    inr.DataExternarii AS 'Discharge Date'
FROM 
    tblFiseMedicale fm
JOIN 
    tblMedici m ON fm.Medic = m.IdMedic
JOIN 
    tblPacienti p ON fm.Pacient = p.IdPacient
LEFT JOIN 
    tblInvestigatii i ON fm.IdFisa = i.Fisa
LEFT JOIN 
    tblInternari inr ON fm.IdFisa = inr.Fisa;
-- I5


-- I6
SELECT 
    fm.IdFisa AS 'Medical File ID',
    CONCAT(m.Nume, ' ', m.Prenume) AS 'Medic Full Name',
    CONCAT(p.Nume, ' ', p.Prenume) AS 'Patient Full Name',
    i.Rezultate AS 'Investigation Result',
    inr.DataInternarii AS 'Admission Date',
    inr.DataExternarii AS 'Discharge Date'
FROM 
    tblFiseMedicale fm
JOIN 
    tblMedici m ON fm.Medic = m.IdMedic
JOIN 
    tblPacienti p ON fm.Pacient = p.IdPacient
LEFT JOIN 
    tblInvestigatii i ON fm.IdFisa = i.Fisa
LEFT JOIN 
    tblInternari inr ON fm.IdFisa = inr.Fisa;
-- I6



/*#############################################################*/



-- /* 
-- - REDENUMITI FISIERUL  scriptXX.sql astfel incat XX sa coincida cu numarul echipei de BD. Ex: script07.sql

-- - SCRIPTUL AR TREBUI SA POATA FI RULAT FARA NICI O EROARE!

-- - ATENTIE LA CHEILE STRAINE! Nu uitati sa modificati motorul de stocare pentru tabele, la InnoDB, pentru a functiona constrangerile de cheie straina (vezi laborator 1, pagina 16 - Observatie)

-- */

