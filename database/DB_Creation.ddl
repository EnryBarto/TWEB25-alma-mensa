-- *********************************************
-- * SQL MySQL generation                      
-- *--------------------------------------------
-- * DB-MAIN version: 11.0.2              
-- * Generator date: Sep 14 2021              
-- * Generation date: Wed Jan 14 16:34:23 2026 
-- * LUN file: C:\xampp\htdocs\TWEB25-alma-mense\database\Almamensa.lun 
-- * Schema: almamensa/logico 
-- ********************************************* 


-- Database Section
-- ________________ 

create database almamensa;
use almamensa;


-- Tables Section
-- _____________ 

create table categorie (
     id int not null auto_increment,
     nome varchar(25) not null,
     constraint ID_categorie_ID primary key (id));

create table clienti (
     email varchar(100) not null,
     nome varchar(25) not null,
     cognome varchar(25) not null,
     constraint FKUse_Cli_ID primary key (email));

create table composizioni (
     id_menu int not null,
     id_piatto int not null,
     constraint ID_composizioni_ID primary key (id_piatto, id_menu));

create table mense (
     id int not null auto_increment,
     email varchar(100) not null,
     nome varchar(50) not null,
     descrizione varchar(255) not null,
     ind_civico varchar(10) not null,
     ind_via varchar(100) not null,
     ind_comune varchar(50) not null,
     ind_cap int not null,
     coo_latitudine varchar(15) not null,
     coo_longitudine varchar(15) not null,
     num_posti int not null,
     immagine varchar(255),
     id_categoria int not null,
     constraint ID_mense_ID primary key (id),
     constraint FKUse_Men_ID unique (email));

create table menu (
     id int not null auto_increment,
     nome varchar(50) not null,
     attivo char not null,
     id_mensa int not null,
     constraint ID_menu_ID primary key (id));

create table piatti (
     id int not null auto_increment,
     nome varchar(25) not null,
     descrizione varchar(255) not null,
     prezzo decimal(5,2) not null,
     img varchar(255),
     constraint ID_piatti_ID primary key (id));

create table prenotazioni (
     data_ora date not null,
     codice varchar(255) not null,
     email varchar(100) not null,
     convalidata char not null,
     num_persone int not null,
     id_mensa int not null,
     constraint SID_prenotazioni_ID unique (email, data_ora),
     constraint ID_prenotazioni_ID primary key (codice));

create table recensioni (
     id int not null auto_increment,
     voto decimal(2,1) not null,
     titolo varchar(25) not null,
     descrizione varchar(255) not null,
     data_ora date not null,
     id_mensa int not null,
     email varchar(100) not null,
     constraint ID_recensioni_ID primary key (id));

create table utenti (
     email varchar(100) not null,
     password varchar(255) not null,
     mensa boolean not null,
     cliente	 boolean not null,
     constraint ID_utenti_ID primary key (email));


-- Constraints Section
-- ___________________ 

alter table clienti add constraint FKUse_Cli_FK
     foreign key (email)
     references utenti (email);

alter table composizioni add constraint FKCom_Pia
     foreign key (id_piatto)
     references piatti (id);

alter table composizioni add constraint FKCom_Men_FK
     foreign key (id_menu)
     references menu (id);

alter table mense add constraint FKUse_Men_FK
     foreign key (email)
     references utenti (email);

alter table mense add constraint FKTipo_FK
     foreign key (id_categoria)
     references categorie (id);

alter table menu add constraint FKProposta_FK
     foreign key (id_mensa)
     references mense (id);

alter table prenotazioni add constraint FKRichiesta
     foreign key (email)
     references clienti (email);

alter table prenotazioni add constraint FKRicezione_FK
     foreign key (id_mensa)
     references mense (id);

alter table recensioni add constraint FKVotazione_FK
     foreign key (id_mensa)
     references mense (id);

alter table recensioni add constraint FKScrittura_FK
     foreign key (email)
     references clienti (email);


-- Index Section
-- _____________ 

create unique index ID_categorie_IND
     on categorie (id);

create unique index FKUse_Cli_IND
     on clienti (email);

create unique index ID_composizioni_IND
     on composizioni (id_piatto, id_menu);

create index FKCom_Men_IND
     on composizioni (id_menu);

create unique index ID_mense_IND
     on mense (id);

create unique index FKUse_Men_IND
     on mense (email);

create index FKTipo_IND
     on mense (id_categoria);

create unique index ID_menu_IND
     on menu (id);

create index FKProposta_IND
     on menu (id_mensa);

create unique index ID_piatti_IND
     on piatti (id);

create unique index SID_prenotazioni_IND
     on prenotazioni (email, data_ora);

create unique index ID_prenotazioni_IND
     on prenotazioni (codice);

create index FKRicezione_IND
     on prenotazioni (id_mensa);

create unique index ID_recensioni_IND
     on recensioni (id);

create index FKVotazione_IND
     on recensioni (id_mensa);

create index FKScrittura_IND
     on recensioni (email);

create unique index ID_utenti_IND
     on utenti (email);

