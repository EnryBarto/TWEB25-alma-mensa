-- *********************************************
-- * SQL MySQL generation                      
-- *--------------------------------------------
-- * DB-MAIN version: 11.0.2              
-- * Generator date: Sep 14 2021              
-- * Generation date: Sat Jan 10 17:24:14 2026 
-- * LUN file: C:\xampp\htdocs\TWEB25-alma-mensa\database\AlmaMensa.lun 
-- * Schema: almamensa/logico 
-- ********************************************* 


-- Database Section
-- ________________ 

create database almamensa;
use almamensa;


-- Tables Section
-- _____________ 

create table Categoria (
     id int not null,
     nome varchar(25) not null,
     constraint ID_Categoria_ID primary key (id));

create table Cliente (
     email varchar(100) not null,
     nome varchar(25) not null,
     cognome varchar(25) not null,
     constraint FKUse_Cli_ID primary key (email));

create table Composizione (
     email_mensa varchar(100) not null,
     id_menu int not null,
     id_piatto int not null,
     constraint ID_Composizione_ID primary key (id_piatto, id_menu));

create table Mensa (
     email varchar(100) not null,
     nome varchar(50) not null,
     descrizione varchar(255) not null,
     ind_civico varchar(10) not null,
     ind_via varchar(100) not null,
     ind_comune varchar(50) not null,
     ind_cap int not null,
     coo_latitudine varchar(15) not null,
     coo_longitudine varchar(15) not null,
     num_posti char(1) not null,
     immagine varchar(255),
     id int not null,
     constraint FKUse_Men_ID primary key (email));

create table Menu (
     email varchar(100) not null,
     id int not null,
     nome varchar(50) not null,
     attivo char not null,
     constraint ID_Menu_ID primary key (id));

create table Piatto (
     id int not null,
     nome varchar(25) not null,
     descrizione varchar(255) not null,
     prezzo decimal(5,2) not null,
     img varchar(255),
     constraint ID_Piatto_ID primary key (id));

create table Prenotazione (
     data_ora date not null,
     codice varchar(255) not null,
     email varchar(100) not null,
     convalidata char not null,
     num_persone int not null,
     Ric_email varchar(100) not null,
     constraint SID_Prenotazione_ID unique (email, data_ora),
     constraint ID_Prenotazione_ID primary key (codice));

create table Recensione (
     id int not null,
     voto decimal(2,1) not null,
     titolo varchar(25) not null,
     descrizione varchar(255) not null,
     data_ora date not null,
     email varchar(100) not null,
     Vot_email varchar(100) not null,
     constraint ID_Recensione_ID primary key (id));

create table User (
     email varchar(100) not null,
     password varchar(255) not null,
     Mensa varchar(100),
     Cliente varchar(100),
     constraint ID_User_ID primary key (email));


-- Constraints Section
-- ___________________ 

alter table Cliente add constraint FKUse_Cli_FK
     foreign key (email)
     references User (email);

alter table Composizione add constraint FKCom_Pia
     foreign key (id_piatto)
     references Piatto (id);

alter table Composizione add constraint FKCom_Men_FK
     foreign key (id_menu)
     references Menu (id);

alter table Mensa add constraint FKUse_Men_FK
     foreign key (email)
     references User (email);

alter table Mensa add constraint FKTipo_FK
     foreign key (id)
     references Categoria (id);

alter table Menu add constraint FKProposta
     foreign key (email)
     references Mensa (email);

alter table Prenotazione add constraint FKRichiesta
     foreign key (email)
     references Cliente (email);

alter table Prenotazione add constraint FKRicezione_FK
     foreign key (Ric_email)
     references Mensa (email);

alter table Recensione add constraint FKScrittura_FK
     foreign key (email)
     references Cliente (email);

alter table Recensione add constraint FKVotazione_FK
     foreign key (Vot_email)
     references Mensa (email);

alter table User add constraint EXTONE_User
     check((Mensa is not null and Cliente is null)
           or (Mensa is null and Cliente is not null)); 


-- Index Section
-- _____________ 

create unique index ID_Categoria_IND
     on Categoria (id);

create unique index FKUse_Cli_IND
     on Cliente (email);

create unique index ID_Composizione_IND
     on Composizione (id_piatto, id_menu);

create index FKCom_Men_IND
     on Composizione (id_menu);

create unique index FKUse_Men_IND
     on Mensa (email);

create index FKTipo_IND
     on Mensa (id);

create unique index ID_Menu_IND
     on Menu (id);

create unique index ID_Piatto_IND
     on Piatto (id);

create unique index SID_Prenotazione_IND
     on Prenotazione (email, data_ora);

create unique index ID_Prenotazione_IND
     on Prenotazione (codice);

create index FKRicezione_IND
     on Prenotazione (Ric_email);

create unique index ID_Recensione_IND
     on Recensione (id);

create index FKScrittura_IND
     on Recensione (email);

create index FKVotazione_IND
     on Recensione (Vot_email);

create unique index ID_User_IND
     on User (email);

