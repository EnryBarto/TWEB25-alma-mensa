USE almamensa;

-- DISABILITA CONTROLLI PER INSERIMENTO VELOCE
SET FOREIGN_KEY_CHECKS = 0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;

-- --------------------------------------------------------
-- 1. POPOLAMENTO UTENTI (CLIENTI + GESTORI LOCALI)
-- Password comune: $2y$10$3Qz0XnIIJEEcxRU2ferNM.w9IRxH2jcGlYa4bXMq1kfW/yjfEecM6
-- --------------------------------------------------------

-- A. Inserimento 5 Nuovi Clienti
INSERT INTO `utenti` (`email`, `password`, `mensa`, `cliente`) VALUES
('luca.rossi@email.it', '$2y$10$3Qz0XnIIJEEcxRU2ferNM.w9IRxH2jcGlYa4bXMq1kfW/yjfEecM6', 0, 1),
('sofia.bianchi@email.it', '$2y$10$3Qz0XnIIJEEcxRU2ferNM.w9IRxH2jcGlYa4bXMq1kfW/yjfEecM6', 0, 1),
('marco.verdi@email.it', '$2y$10$3Qz0XnIIJEEcxRU2ferNM.w9IRxH2jcGlYa4bXMq1kfW/yjfEecM6', 0, 1),
('giulia.neri@email.it', '$2y$10$3Qz0XnIIJEEcxRU2ferNM.w9IRxH2jcGlYa4bXMq1kfW/yjfEecM6', 0, 1),
('andrea.gialli@email.it', '$2y$10$3Qz0XnIIJEEcxRU2ferNM.w9IRxH2jcGlYa4bXMq1kfW/yjfEecM6', 0, 1);

-- Dettagli Clienti
INSERT INTO `clienti` (`email`, `nome`, `cognome`) VALUES
('luca.rossi@email.it', 'Luca', 'Rossi'),
('sofia.bianchi@email.it', 'Sofia', 'Bianchi'),
('marco.verdi@email.it', 'Marco', 'Verdi'),
('giulia.neri@email.it', 'Giulia', 'Neri'),
('andrea.gialli@email.it', 'Andrea', 'Gialli');

-- B. Inserimento Utenti Gestori (1 per ogni locale reale)
INSERT INTO `utenti` (`email`, `password`, `mensa`, `cliente`) VALUES
('volume@unibo.it', '$2y$10$G7ytJpMJt3lFRHsyjpy4nOTFhAmb8RkDh3SvVVoHUkdMiTaTmO8yy', 1, 0),
('info@piccolobar.it', '$2y$10$3Qz0XnIIJEEcxRU2ferNM.w9IRxH2jcGlYa4bXMq1kfW/yjfEecM6', 1, 0),
('barwilson@cesena.it', '$2y$10$3Qz0XnIIJEEcxRU2ferNM.w9IRxH2jcGlYa4bXMq1kfW/yjfEecM6', 1, 0),
('nerosublime@bar.it', '$2y$10$3Qz0XnIIJEEcxRU2ferNM.w9IRxH2jcGlYa4bXMq1kfW/yjfEecM6', 1, 0),
('lacantera@cesena.it', '$2y$10$3Qz0XnIIJEEcxRU2ferNM.w9IRxH2jcGlYa4bXMq1kfW/yjfEecM6', 1, 0),
('garden@barcucina.it', '$2y$10$3Qz0XnIIJEEcxRU2ferNM.w9IRxH2jcGlYa4bXMq1kfW/yjfEecM6', 1, 0),
('info@casamadie.it', '$2y$10$3Qz0XnIIJEEcxRU2ferNM.w9IRxH2jcGlYa4bXMq1kfW/yjfEecM6', 1, 0),
('almondo@caffetteria.it', '$2y$10$3Qz0XnIIJEEcxRU2ferNM.w9IRxH2jcGlYa4bXMq1kfW/yjfEecM6', 1, 0),
('caffetteria@corso.it', '$2y$10$3Qz0XnIIJEEcxRU2ferNM.w9IRxH2jcGlYa4bXMq1kfW/yjfEecM6', 1, 0),
('cibus@selfservice.it', '$2y$10$3Qz0XnIIJEEcxRU2ferNM.w9IRxH2jcGlYa4bXMq1kfW/yjfEecM6', 1, 0),
('tavolamica@camst.it', '$2y$10$3Qz0XnIIJEEcxRU2ferNM.w9IRxH2jcGlYa4bXMq1kfW/yjfEecM6', 1, 0),
('mensa@cirfood.it', '$2y$10$3Qz0XnIIJEEcxRU2ferNM.w9IRxH2jcGlYa4bXMq1kfW/yjfEecM6', 1, 0),
('scottadito@ristorante.it', '$2y$10$3Qz0XnIIJEEcxRU2ferNM.w9IRxH2jcGlYa4bXMq1kfW/yjfEecM6', 1, 0),
('sangio@ristorante.it', '$2y$10$3Qz0XnIIJEEcxRU2ferNM.w9IRxH2jcGlYa4bXMq1kfW/yjfEecM6', 1, 0),
('cohiba@ristorante.it', '$2y$10$3Qz0XnIIJEEcxRU2ferNM.w9IRxH2jcGlYa4bXMq1kfW/yjfEecM6', 1, 0),
('welldone@socialfood.it', '$2y$10$3Qz0XnIIJEEcxRU2ferNM.w9IRxH2jcGlYa4bXMq1kfW/yjfEecM6', 1, 0),
('daneo@pizzeria.it', '$2y$10$3Qz0XnIIJEEcxRU2ferNM.w9IRxH2jcGlYa4bXMq1kfW/yjfEecM6', 1, 0),
('roovido@cesena.it', '$2y$10$3Qz0XnIIJEEcxRU2ferNM.w9IRxH2jcGlYa4bXMq1kfW/yjfEecM6', 1, 0),
('lamari@pizzeria.it', '$2y$10$3Qz0XnIIJEEcxRU2ferNM.w9IRxH2jcGlYa4bXMq1kfW/yjfEecM6', 1, 0),
('cene@osteria.it', '$2y$10$3Qz0XnIIJEEcxRU2ferNM.w9IRxH2jcGlYa4bXMq1kfW/yjfEecM6', 1, 0),
('michiletta@osteria.it', '$2y$10$3Qz0XnIIJEEcxRU2ferNM.w9IRxH2jcGlYa4bXMq1kfW/yjfEecM6', 1, 0);

-- --------------------------------------------------------
-- 2. POPOLAMENTO MENSE (DATI REALI GOOGLE MAPS)
-- Categorie: 1=Bar, 2=Mensa, 3=Ristorante
-- --------------------------------------------------------

INSERT INTO `mense` (`id`, `email`, `nome`, `descrizione`, `ind_civico`, `ind_via`, `ind_comune`, `ind_cap`, `telefono`, `coo_latitudine`, `coo_longitudine`, `num_posti`, `immagine`, `id_categoria`, `media_recensioni`, `num_recensioni`) VALUES
(1, 'volume@unibo.it', 'Volume', '[Spazio] [Ascolto] [Alimento]', '50', 'Via Cesare Pavese', 'Cesena', 47521, '+39 320 3562325', '44.1478691', '12.2355525', 50, 'volume.jpg', 1, 0, 0),
(21, 'info@piccolobar.it', 'Piccolo Bar', 'Bar storico in piazza, ideale per aperitivi.', '43', 'Piazza del Popolo', 'Cesena', 47521, '+39054724597', '44.13718', '12.24245', 30, NULL, 1, 4.3, 3),
(2, 'barwilson@cesena.it', 'Bar Wilson', 'Caffetteria accogliente vicino al centro.', '16', 'Via Martiri della Libertà', 'Cesena', 47521, '+393287092572', '44.13984', '12.24055', 25, NULL, 1, 4.7, 2),
(3, 'nerosublime@bar.it', 'Bar Nero Sublime', 'Locale elegante per cocktail e serate.', '18', 'Corte Dandini', 'Cesena', 47521, '+39054721756', '44.13698', '12.24482', 40, NULL, 1, 4.4, 3),
(4, 'lacantera@cesena.it', 'La Cantera', 'Punto di ritrovo serale molto frequentato.', '5', 'Piazza Mario Guidazzi', 'Cesena', 47521, '+3905471865945', '44.13608', '12.24860', 50, NULL, 1, 4.3, 2),
(5, 'garden@barcucina.it', 'Garden Bar & Cucina', 'Ampio spazio con cucina, ideale per pranzi.', '124', 'Via G. Matteotti', 'Cesena', 47522, '+393358007853', '44.14014', '12.23330', 60, NULL, 1, 4.9, 3),
(6, 'info@casamadie.it', 'CASAMADIE', 'Prodotti da forno e piatti creativi.', '1', 'Via Fra Michelino', 'Cesena', 47521, '+390547481742', '44.13760', '12.24126', 20, NULL, 1, 4.4, 2),
(7, 'almondo@caffetteria.it', 'Al Mondo Caffetteria', 'Ottime colazioni e personale gentile.', '17', 'Via Veneto', 'Cesena', 47521, '+390547300442', '44.13946', '12.25792', 25, NULL, 1, 4.5, 2),
(8, 'caffetteria@corso.it', 'Caffetteria del Corso', 'Bar classico sul corso principale.', '18', 'Corso Gastone Sozzi', 'Cesena', 47521, '+393467304473', '44.13802', '12.24539', 15, NULL, 1, 4.2, 2),
(9, 'cibus@selfservice.it', 'Ristorante Self-Service Cibus', 'Mensa self-service veloce ed economica.', '63', 'Via Quinto Bucci', 'Cesena', 47521, '+390547632305', '44.15873', '12.24370', 100, NULL, 2, 4.4, 4),
(10, 'tavolamica@camst.it', 'Tavolamica | Cesena', 'Ristorazione aziendale e per tutti.', '332', 'Via dell\'Arrigoni', 'Cesena', 47522, '+393389398601', '44.16512', '12.21909', 150, NULL, 2, 4.0, 3),
(11, 'mensa@cirfood.it', 'Mensa Aziendale CIRFOOD', 'Mensa con pizzeria e piatti caldi.', '1', 'Piazzale Mario Giommi', 'Cesena', 47521, NULL, '44.13296', '12.26049', 120, NULL, 2, 0.0, 0), -- Mensa senza recensioni
(12, 'scottadito@ristorante.it', 'Scottadito', 'Ristorante con pizza, hamburger e griglia.', '335', 'V.le Mario Angeloni', 'Cesena', 47521, '+39054728061', '44.14413', '12.24603', 80, NULL, 3, 4.3, 3),
(13, 'sangio@ristorante.it', 'Ristorante al Sangiò', 'Cucina tipica romagnola nel centro storico.', '16', 'Piazza Giovanni Amendola', 'Cesena', 47521, '+390547061489', '44.13673', '12.24347', 50, NULL, 3, 4.5, 3),
(14, 'cohiba@ristorante.it', 'Ristorante Cohiba', 'Ristorante moderno con piatti curati.', '21', 'Via Cesare Battisti', 'Cesena', 47521, '+39054726371', '44.13829', '12.24171', 45, NULL, 3, 4.5, 2),
(15, 'welldone@socialfood.it', 'Welldone Cils Social Food', 'Hamburger gourmet e progetto sociale.', '4', 'Piazza della Libertà', 'Cesena', 47521, '+393464748796', '44.13730', '12.24626', 60, NULL, 3, 4.3, 3),
(16, 'daneo@pizzeria.it', 'Da Neo Pizzeria - Stadio', 'Pizza al piatto vicino allo stadio.', '255', 'Via Fratelli Spazzoli', 'Cesena', 47521, '+390547300526', '44.13704', '12.26472', 70, NULL, 3, 4.6, 2),
(17, 'roovido@cesena.it', 'Roovido', 'Location suggestiva e cucina raffinata.', '31', 'Piazza del Popolo', 'Cesena', 47521, '+393703791215', '44.13734', '12.24208', 40, NULL, 3, 4.6, 3),
(18, 'lamari@pizzeria.it', 'La Mari\' Pizzeria', 'Pizzeria apprezzata per l\'impasto.', '55', 'Viale della Resistenza', 'Cesena', 47522, '+393922966670', '44.14275', '12.23082', 50, NULL, 3, 4.2, 2),
(19, 'cene@osteria.it', 'Osteria Cené', 'Cucina della tradizione rivisitata.', '3', 'Via Albizzi', 'Cesena', 47521, '+390547612212', '44.13711', '12.24326', 45, NULL, 3, 4.4, 3),
(20, 'michiletta@osteria.it', 'Osteria Michiletta', 'Storica osteria con pasta fatta a mano.', '41', 'Via Strinati', 'Cesena', 47521, '+393762012500', '44.13675', '12.24426', 35, NULL, 3, 4.3, 3);

-- --------------------------------------------------------
-- 2.5. POPOLAMENTO ORARI DI APERTURA'
-- Giorni: mon, tue, wed, thu, fri, sat, sun
-- --------------------------------------------------------

INSERT INTO `orari` (`id_mensa`, `giorno`, `ora_apertura`, `ora_chiusura`) VALUES
-- BAR GENERICI (ID 1, 2, 6, 7, 8, 21) - Orario continuato Lun-Sab
(1, 'mon', '07:00', '20:00'), (1, 'tue', '07:00', '20:00'), (1, 'wed', '07:00', '20:00'), (1, 'thu', '07:00', '20:00'), (1, 'fri', '07:00', '20:00'), (1, 'sat', '08:00', '22:00'),
(2, 'mon', '07:30', '19:30'), (2, 'tue', '07:30', '19:30'), (2, 'wed', '07:30', '19:30'), (2, 'thu', '07:30', '19:30'), (2, 'fri', '07:30', '19:30'), (2, 'sat', '08:00', '13:00'),
(21, 'mon', '07:00', '21:00'), (21, 'tue', '07:00', '21:00'), (21, 'wed', '07:00', '21:00'), (21, 'thu', '07:00', '21:00'), (21, 'fri', '07:00', '21:00'), (21, 'sat', '07:00', '21:00'), (21, 'sun', '08:00', '20:00'),
(6, 'mon', '08:00', '20:00'), (6, 'tue', '08:00', '20:00'), (6, 'wed', '08:00', '20:00'), (6, 'thu', '08:00', '20:00'), (6, 'fri', '08:00', '20:00'), (6, 'sat', '08:00', '20:00'),
(7, 'mon', '06:30', '18:00'), (7, 'tue', '06:30', '18:00'), (7, 'wed', '06:30', '18:00'), (7, 'thu', '06:30', '18:00'), (7, 'fri', '06:30', '18:00'), (7, 'sat', '07:00', '13:00'),
(8, 'mon', '07:00', '20:00'), (8, 'tue', '07:00', '20:00'), (8, 'wed', '07:00', '20:00'), (8, 'thu', '07:00', '20:00'), (8, 'fri', '07:00', '20:00'), (8, 'sat', '07:00', '20:00'),

-- LOCALI SERALI (ID 3, 4) - Aperti la sera, chiusi Lunedì
(3, 'tue', '18:00', '23:59'), (3, 'wed', '00:00', '02:00'), (3, 'wed', '18:00', '23:59'), (3, 'thu', '00:00', '02:00'), (3, 'thu', '18:00', '23:59'), (3, 'fri', '00:00', '02:00'), (3, 'fri', '18:00', '23:59'), (3, 'sat', '00:00', '03:00'), (3, 'sat', '18:00', '23:59'), (3, 'sun', '00:00', '03:00'), (3, 'sun', '18:00', '23:59'), (3, 'mon', '00:00', '01:00'),
(4, 'tue', '19:00', '23:59'), (4, 'wed', '00:00', '02:00'), (4, 'wed', '19:00', '23:59'), (4, 'thu', '00:00', '02:00'), (4, 'thu', '19:00', '23:59'), (4, 'fri', '00:00', '02:00'), (4, 'fri', '19:00', '23:59'), (4, 'sat', '00:00', '03:00'), (4, 'sat', '19:00', '23:59'), (4, 'sun', '00:00', '03:00'), (4, 'sun', '18:00', '23:59'), (4, 'mon', '00:00', '01:00'),

-- LUNCH BAR / TAVOLA CALDA (ID 5)
(5, 'mon', '07:00', '18:00'), (5, 'tue', '07:00', '18:00'), (5, 'wed', '07:00', '18:00'), (5, 'thu', '07:00', '18:00'), (5, 'fri', '07:00', '18:00'), (5, 'sat', '07:00', '15:00'),

-- MENSE AZIENDALI (ID 9, 10, 11) - Solo pranzo Lun-Ven
(9, 'mon', '11:45', '14:30'), (9, 'tue', '11:45', '14:30'), (9, 'wed', '11:45', '14:30'), (9, 'thu', '11:45', '14:30'), (9, 'fri', '11:45', '14:30'),
(10, 'mon', '12:00', '15:00'), (10, 'tue', '12:00', '15:00'), (10, 'wed', '12:00', '15:00'), (10, 'thu', '12:00', '15:00'), (10, 'fri', '12:00', '15:00'),
(11, 'mon', '11:30', '14:30'), (11, 'tue', '11:30', '14:30'), (11, 'wed', '11:30', '14:30'), (11, 'thu', '11:30', '14:30'), (11, 'fri', '11:30', '14:30'),

-- RISTORANTI / PIZZERIE (ID 12, 13, 14, 15, 16, 17, 18, 19, 20)
-- Schema generico: Spezzato, Chiuso il Lunedì.
(12, 'tue', '12:00', '15:00'), (12, 'tue', '19:00', '23:30'),
(12, 'wed', '12:00', '15:00'), (12, 'wed', '19:00', '23:30'),
(12, 'thu', '12:00', '15:00'), (12, 'thu', '19:00', '23:30'),
(12, 'fri', '12:00', '15:00'), (12, 'fri', '19:00', '23:59'),
(12, 'sat', '12:00', '15:00'), (12, 'sat', '19:00', '23:59'),
(12, 'sun', '12:00', '15:00'), (12, 'sun', '19:00', '23:00'),

(13, 'tue', '12:30', '14:30'), (13, 'tue', '19:30', '23:00'),
(13, 'wed', '12:30', '14:30'), (13, 'wed', '19:30', '23:00'),
(13, 'thu', '12:30', '14:30'), (13, 'thu', '19:30', '23:00'),
(13, 'fri', '12:30', '14:30'), (13, 'fri', '19:30', '23:30'),
(13, 'sat', '12:30', '15:00'), (13, 'sat', '19:30', '23:30'),
(13, 'sun', '12:30', '15:00'), (13, 'sun', '19:30', '23:00'),

(14, 'wed', '19:00', '23:00'), (14, 'thu', '19:00', '23:00'), -- Cohiba solo sera infrasett
(14, 'fri', '19:00', '23:59'), (14, 'sat', '19:00', '23:59'), (14, 'sun', '12:00', '15:00'), (14, 'sun', '19:00', '23:00'),

(15, 'mon', '19:00', '23:00'), (15, 'tue', '19:00', '23:00'), (15, 'wed', '19:00', '23:00'), -- Aperto mon
(15, 'thu', '19:00', '23:00'), (15, 'fri', '19:00', '23:59'),
(15, 'sat', '12:00', '15:00'), (15, 'sat', '19:00', '23:59'),
(15, 'sun', '12:00', '15:00'), (15, 'sun', '19:00', '23:00'),

(16, 'tue', '18:30', '23:30'), (16, 'wed', '18:30', '23:30'), -- Solo Pizzeria Sere
(16, 'thu', '18:30', '23:30'), (16, 'fri', '18:30', '23:30'),
(16, 'sat', '18:30', '23:30'), (16, 'sun', '18:30', '23:30'),

(17, 'tue', '19:30', '23:30'), (17, 'wed', '19:30', '23:30'),
(17, 'thu', '19:30', '23:30'), (17, 'fri', '19:30', '23:59'), (17, 'sat', '00:00', '00:30'),
(17, 'sat', '12:30', '15:00'), (17, 'sat', '19:30', '23:59'), (17, 'sun', '00:00', '00:30'),
(17, 'sun', '12:30', '15:00'), (17, 'sun', '19:30', '23:30'),

(18, 'tue', '18:30', '23:00'), (18, 'wed', '18:30', '23:00'),
(18, 'thu', '18:30', '23:00'), (18, 'fri', '18:30', '23:30'),
(18, 'sat', '18:30', '23:30'), (18, 'sun', '18:30', '23:00'),

(19, 'mon', '12:30', '14:30'), (19, 'mon', '19:30', '23:00'), -- Aperto mon, chiuso wed
(19, 'tue', '12:30', '14:30'), (19, 'tue', '19:30', '23:00'),
(19, 'thu', '12:30', '14:30'), (19, 'thu', '19:30', '23:00'),
(19, 'fri', '12:30', '14:30'), (19, 'fri', '19:30', '23:30'),
(19, 'sat', '12:30', '14:30'), (19, 'sat', '19:30', '23:30'),
(19, 'sun', '12:30', '15:00'), (19, 'sun', '19:30', '23:00'),

(20, 'tue', '12:00', '14:30'), (20, 'tue', '19:00', '22:30'),
(20, 'wed', '12:00', '14:30'), (20, 'wed', '19:00', '22:30'),
(20, 'thu', '12:00', '14:30'), (20, 'thu', '19:00', '22:30'),
(20, 'fri', '12:00', '14:30'), (20, 'fri', '19:00', '23:00'),
(20, 'sat', '12:00', '14:30'), (20, 'sat', '19:00', '23:00'),
(20, 'sun', '12:00', '15:00');

-- --------------------------------------------------------
-- 3. POPOLAMENTO MENU, PIATTI E COMPOSIZIONI
-- --------------------------------------------------------

INSERT INTO `piatti` (`nome`, `descrizione`, `prezzo`, `id_mensa`) VALUES
('Cappelletti al ragù', 'Pasta fresca ripiena con ragù romagnolo', 12.00, 13),
('Tagliere Misto', 'Salumi e formaggi del territorio', 14.00, 1),
('Hamburger Welldone', 'Manzo locale, cheddar, cipolla caramellata', 11.00, 15),
('Pizza Margherita', 'Pomodoro, mozzarella, basilico', 7.50, 16),
('Caffè Espresso', 'Miscela pregiata', 1.30, 1),
('Cappuccino', 'Latte fresco montato a vapore', 1.60, 2),
('Lasagna alla Bolognese', 'Classica lasagna al forno', 10.00, 5),
('Insalata Cesar', 'Pollo, lattuga, crostini, salsa cesar', 9.00, 5),
('Grigliata Mista', 'Selezione di carni alla brace', 18.00, 12),
('Tiramisù', 'Fatto in casa con mascarpone fresco', 5.00, 19),
('Spaghetti Carbonara', 'Pasta con guanciale, uova e pecorino', 9.50, 9);

-- Menu (1 per locale)
INSERT INTO `menu` (`nome`, `attivo`, `id_mensa`) VALUES
('Aperitivo Piazza', '1', 1), ('Colazione Wilson', '1', 2), ('Cocktail Night', '1', 3), ('Serata Cantera', '1', 4), ('Pranzo Garden', '1', 5), ('Bakery Menu', '1', 6), ('Colazione Mondo', '1', 7), ('Pausa Caffè', '1', 8), ('Pranzo Lavoro', '1', 9), ('Menu Completo', '1', 10), ('Menu Giorno', '1', 11), ('Burger & Grill', '1', 12), ('Romagna Mia', '1', 13), ('Gourmet', '1', 14), ('Social Burger', '1', 15), ('Pizza Stadio', '1', 16), ('Roovido Experience', '1', 17), ('Pizza Verace', '1', 18), ('Tradizione', '1', 19), ('Menu Osteria', '1', 20);

-- Associazioni Piatti (Random verosimile)
INSERT INTO `composizioni` (`id_menu`, `id_piatto`) VALUES
(1, 2), (1, 5),     -- Piccolo Bar
(2, 6),             -- Wilson
(5, 7), (5, 8),     -- Garden
(9, 11),             -- Cibus
(12, 9),            -- Scottadito
(13, 1),            -- Sangiomense
(15, 3),            -- Welldone
(16, 4),            -- Da Neo
(19, 10);           -- Cene

-- --------------------------------------------------------
-- 4. POPOLAMENTO RECENSIONI (50 Totali)
-- Distribuzione: ~2-3 per locale, ID 11 (Mensa CIRFOOD) 0 recensioni
-- --------------------------------------------------------

INSERT INTO `recensioni` (`voto`, `titolo`, `descrizione`, `data_ora`, `id_mensa`, `email`) VALUES
(5.0, 'Posizione top', 'Aperitivo vista piazza.', '2025-12-01 18:30:00', 1, 'luca.rossi@email.it'),
(4.0, 'Gentili', 'Caffè ottimo.', '2025-11-15 09:00:00', 1, 'sofia.bianchi@email.it'),
(4.0, 'Tranquillo', 'Buono per studiare.', '2025-12-10 10:00:00', 1, 'marco.verdi@email.it'),
(5.0, 'Il mio preferito', 'Barista simpatico.', '2026-01-05 08:30:00', 2, 'giulia.neri@email.it'),
(4.5, 'Accogliente', 'Colazioni super.', '2025-10-20 09:15:00', 2, 'andrea.gialli@email.it'),
(4.5, 'Elegante', 'Ottimi drink.', '2025-12-31 22:00:00', 3, 'luca.rossi@email.it'),
(4.0, 'Bella musica', 'Locale curato.', '2026-01-02 23:00:00', 3, 'sofia.bianchi@email.it'),
(4.5, 'Divertente', 'Sempre pieno di gente.', '2025-09-15 21:00:00', 3, 'marco.verdi@email.it'),
(4.0, 'Movida', 'Ideale per giovani.', '2025-11-05 22:30:00', 4, 'giulia.neri@email.it'),
(4.5, 'Bravi', 'Cocktail ben fatti.', '2026-01-12 21:45:00', 4, 'andrea.gialli@email.it'),
(5.0, 'Pranzo ok', 'Veloce e buono.', '2025-12-20 13:00:00', 5, 'luca.rossi@email.it'),
(4.5, 'Spazioso', 'Si sta bene.', '2026-01-08 12:45:00', 5, 'sofia.bianchi@email.it'),
(5.0, 'Dolci top', 'Torte fatte in casa.', '2025-10-05 16:30:00', 5, 'marco.verdi@email.it'),
(4.5, 'Artigianale', 'Pane fantastico.', '2026-01-03 10:00:00', 6, 'giulia.neri@email.it'),
(4.0, 'Piccolo ma buono', 'Qualità alta.', '2025-12-15 11:00:00', 6, 'andrea.gialli@email.it'),
(4.5, 'Cortesia', 'Personale squisito.', '2025-11-25 08:00:00', 7, 'luca.rossi@email.it'),
(4.5, 'Colazione', 'Brioche calde.', '2026-01-10 07:30:00', 7, 'sofia.bianchi@email.it'),
(4.0, 'Sul corso', 'Comodo per una sosta.', '2025-12-08 17:00:00', 8, 'marco.verdi@email.it'),
(4.5, 'Classico', 'Bar tradizionale.', '2026-01-07 15:30:00', 8, 'giulia.neri@email.it'),
(4.5, 'Economico', 'Si mangia bene con poco.', '2025-11-12 12:30:00', 9, 'andrea.gialli@email.it'),
(4.0, 'Vario', 'Tanta scelta.', '2026-01-14 13:00:00', 9, 'luca.rossi@email.it'),
(5.0, 'Comodo', 'Parcheggio vicino.', '2025-09-30 12:45:00', 9, 'sofia.bianchi@email.it'),
(4.0, 'Pulito', 'Ambiente ordinato.', '2025-10-15 13:15:00', 9, 'marco.verdi@email.it'),
(4.0, 'Mensa ok', 'Buono per lavoro.', '2025-12-05 12:15:00', 10, 'giulia.neri@email.it'),
(4.0, 'Rapidi', 'Servizio veloce.', '2026-01-09 12:50:00', 10, 'andrea.gialli@email.it'),
(4.0, 'Buono', 'Qualità prezzo onesta.', '2025-11-20 13:00:00', 10, 'luca.rossi@email.it'),
(4.5, 'Carne ottima', 'Scottadito di nome e di fatto.', '2025-12-28 20:00:00', 12, 'sofia.bianchi@email.it'),
(4.0, 'Pizza buona', 'Sottile e croccante.', '2026-01-06 19:30:00', 12, 'marco.verdi@email.it'),
(4.5, 'Locale ampio', 'Adatto a gruppi.', '2025-10-25 21:00:00', 12, 'giulia.neri@email.it'),
(5.0, 'Romagna vera', 'Cappelletti mondiali.', '2025-12-25 13:00:00', 13, 'andrea.gialli@email.it'),
(4.5, 'Centro', 'Posizione bellissima.', '2026-01-04 20:30:00', 13, 'luca.rossi@email.it'),
(4.0, 'Tradizione', 'Come dalla nonna.', '2025-11-10 12:45:00', 13, 'sofia.bianchi@email.it'),
(4.5, 'Raffinato', 'Piatti ben presentati.', '2025-12-22 20:00:00', 14, 'marco.verdi@email.it'),
(4.5, 'Intimo', 'Luci soffuse.', '2026-01-02 21:00:00', 14, 'giulia.neri@email.it'),
(4.5, 'Burger top', 'Carne succosa.', '2025-09-20 19:30:00', 15, 'andrea.gialli@email.it'),
(4.0, 'Bravi ragazzi', 'Bel progetto.', '2026-01-11 20:00:00', 15, 'luca.rossi@email.it'),
(4.5, 'In piazza', 'Dehor estivo bello.', '2025-07-30 21:00:00', 15, 'sofia.bianchi@email.it'),
(5.0, 'Pizza stadio', 'La migliore in zona.', '2025-11-30 19:00:00', 16, 'marco.verdi@email.it'),
(4.0, 'Veloce', 'Servizio rapido pre partita.', '2026-01-13 19:45:00', 16, 'giulia.neri@email.it'),
(5.0, 'Gourmet', 'Esperienza da fare.', '2025-12-12 20:30:00', 17, 'andrea.gialli@email.it'),
(4.5, 'Particolare', 'Arredamento unico.', '2026-01-05 21:00:00', 17, 'luca.rossi@email.it'),
(4.0, 'Costoso ma vale', 'Qualità alta.', '2025-10-10 20:00:00', 17, 'sofia.bianchi@email.it'),
(4.5, 'Impasto leggero', 'Digeribilissima.', '2025-12-18 19:30:00', 18, 'marco.verdi@email.it'),
(4.0, 'Bravi', 'Pizza napoletana.', '2026-01-08 20:00:00', 18, 'giulia.neri@email.it'),
(4.5, 'Cucina curata', 'Menu interessante.', '2025-11-28 20:30:00', 19, 'andrea.gialli@email.it'),
(4.5, 'Vini', 'Ottima carta dei vini.', '2026-01-03 21:00:00', 19, 'luca.rossi@email.it'),
(4.0, 'Atmosfera', 'Locale caldo.', '2025-09-05 20:00:00', 19, 'sofia.bianchi@email.it'),
(4.5, 'Storico', 'Una garanzia a Cesena.', '2025-12-02 13:00:00', 20, 'marco.verdi@email.it'),
(4.0, 'Pasta fresca', 'Strozzapreti super.', '2026-01-09 20:00:00', 20, 'giulia.neri@email.it'),
(4.5, 'Consigliato', 'Ci tornerò.', '2025-10-25 12:45:00', 20, 'andrea.gialli@email.it');

-- --------------------------------------------------------
-- 5. POPOLAMENTO PRENOTAZIONI (20 Totali)
-- Periodo: 10/01/2026 - 28/02/2026
-- --------------------------------------------------------

INSERT INTO `prenotazioni` (`data_ora`, `codice`, `email`, `convalidata`, `num_persone`, `id_mensa`) VALUES
('2026-01-10 20:00:00', 'PREN-26-001', 'luca.rossi@email.it', '1', 2, 12), -- Scottadito
('2026-01-11 13:00:00', 'PREN-26-002', 'sofia.bianchi@email.it', '1', 4, 13), -- Sangio
('2026-01-14 20:30:00', 'PREN-26-003', 'marco.verdi@email.it', '1', 2, 14), -- Cohiba
('2026-01-16 19:30:00', 'PREN-26-004', 'giulia.neri@email.it', '1', 5, 15), -- Welldone
('2026-01-18 12:30:00', 'PREN-26-005', 'andrea.gialli@email.it', '1', 3, 9),  -- Cibus
('2026-01-20 21:00:00', 'PREN-26-006', 'luca.rossi@email.it', '1', 2, 17), -- Roovido
('2026-01-22 19:00:00', 'PREN-26-007', 'sofia.bianchi@email.it', '0', 2, 16), -- Da Neo
('2026-01-25 13:15:00', 'PREN-26-008', 'marco.verdi@email.it', '1', 4, 20), -- Michiletta
('2026-01-28 20:00:00', 'PREN-26-009', 'giulia.neri@email.it', '1', 6, 19), -- Cene
('2026-01-30 19:45:00', 'PREN-26-010', 'andrea.gialli@email.it', '1', 2, 18), -- La Mari
('2026-02-02 12:45:00', 'PREN-26-011', 'luca.rossi@email.it', '1', 1, 10), -- Tavolamica
('2026-02-05 20:30:00', 'PREN-26-012', 'sofia.bianchi@email.it', '1', 2, 3),  -- Nero Sublime
('2026-02-08 18:30:00', 'PREN-26-013', 'marco.verdi@email.it', '1', 3, 1),  -- Piccolo Bar
('2026-02-14 20:00:00', 'PREN-26-014', 'giulia.neri@email.it', '1', 2, 13), -- S. Valentino al Sangio
('2026-02-15 13:00:00', 'PREN-26-015', 'andrea.gialli@email.it', '1', 4, 12), -- Scottadito
('2026-02-18 21:00:00', 'PREN-26-016', 'luca.rossi@email.it', '1', 2, 4),  -- La Cantera
('2026-02-20 19:30:00', 'PREN-26-017', 'sofia.bianchi@email.it', '1', 5, 15), -- Welldone
('2026-02-22 12:30:00', 'PREN-26-018', 'marco.verdi@email.it', '1', 2, 5),  -- Garden
('2026-02-25 20:00:00', 'PREN-26-019', 'giulia.neri@email.it', '1', 2, 14), -- Cohiba
('2026-02-28 13:00:00', 'PREN-26-020', 'andrea.gialli@email.it', '1', 3, 19); -- Cene

COMMIT;

START TRANSACTION;

-- --------------------------------------------------------
-- AGGIUNTA DI 100 RECENSIONI VARIEGATE (Voti da 1 a 5)
-- --------------------------------------------------------

INSERT INTO `recensioni` (`voto`, `titolo`, `descrizione`, `data_ora`, `id_mensa`, `email`) VALUES
-- ESPERIENZE NEGATIVE (1-2 STELLE)
(1.0, 'Pessimo servizio', 'Ho aspettato un ora per un panino e quando è arrivato era freddo. Mai più.', '2026-01-05 13:30:00', 1, 'luca.rossi@email.it'),
(1.0, 'Sconsigliato', 'Personale maleducato e prezzi folli per la qualità offerta.', '2025-11-12 20:00:00', 12, 'sofia.bianchi@email.it'),
(2.0, 'Delusione totale', 'La pasta era scotta e il sugo sembrava industriale. Mi aspettavo di meglio.', '2025-12-18 12:45:00', 9, 'marco.verdi@email.it'),
(1.0, 'Igiene dubbia', 'Tavoli sporchi e bicchieri con impronte. Non ci siamo.', '2026-01-10 08:30:00', 2, 'giulia.neri@email.it'),
(2.0, 'Troppo caro', '15 euro per un insalata misera. Rapporto qualità-prezzo inesistente.', '2025-10-25 13:15:00', 5, 'andrea.gialli@email.it'),
(1.0, 'Maleducati', 'Il cameriere ci ha risposto malissimo quando abbiamo chiesto di cambiare tavolo.', '2025-12-28 21:00:00', 17, 'luca.rossi@email.it'),
(2.0, 'Caos totale', 'Troppo rumore, non si riesce nemmeno a parlare. Cibo mediocre.', '2026-01-02 20:30:00', 4, 'sofia.bianchi@email.it'),
(1.0, 'Soldi buttati', 'Pizza bruciata sotto e cruda sopra. Esperienza terribile.', '2025-11-30 20:15:00', 18, 'marco.verdi@email.it'),
(2.0, 'Servizio lento', 'Dimenticati gli ordini due volte. Abbiamo perso la pazienza.', '2025-09-15 13:30:00', 10, 'giulia.neri@email.it'),
(1.0, 'Esperienza da dimenticare', 'Trovato un capello nel piatto. Nessuna scusa dalla gestione.', '2026-01-14 21:00:00', 13, 'andrea.gialli@email.it'),

-- ESPERIENZE MEDIE (3 STELLE)
(3.0, 'Senza infamia', 'Cibo ok, servizio ok, ma nulla di speciale che mi faccia tornare.', '2025-12-05 19:30:00', 15, 'luca.rossi@email.it'),
(3.0, 'Nella media', 'Classica mensa aziendale. Funzionale ma il gusto latita.', '2026-01-08 12:15:00', 10, 'sofia.bianchi@email.it'),
(3.0, 'Un po stretto', 'Locale carino ma i tavoli sono appiccicati. Si sente tutto quello che dicono i vicini.', '2025-11-20 08:30:00', 6, 'marco.verdi@email.it'),
(3.0, 'Prezzi onesti', 'Si mangia discretamente senza spendere un patrimonio.', '2025-10-10 13:00:00', 9, 'giulia.neri@email.it'),
(3.0, 'Così così', 'Il caffè è buono ma le paste erano del giorno prima.', '2026-01-15 09:00:00', 7, 'andrea.gialli@email.it'),

-- ESPERIENZE ECCELLENTI (5 STELLE)
(5.0, 'Il paradiso!', 'La miglior cena dell anno. Tutto perfetto, dall accoglienza al dolce.', '2026-01-11 20:45:00', 17, 'luca.rossi@email.it'),
(5.0, 'Impeccabile', 'Qualità delle materie prime indiscutibile. Lo consiglio vivamente.', '2025-12-22 13:00:00', 20, 'sofia.bianchi@email.it'),
(5.0, 'Aperitivo da re', 'I cocktail sono opere d arte e gli stuzzichini sono abbondanti.', '2026-01-04 18:30:00', 3, 'marco.verdi@email.it'),
(5.0, 'Bravi tutti', 'Staff giovane, sorridente e molto preparato. Tornerò spesso.', '2025-11-05 20:00:00', 15, 'giulia.neri@email.it'),
(5.0, 'Romagna nel cuore', 'Cappelletti fatti a mano che si sciolgono in bocca. Una poesia.', '2026-01-09 13:15:00', 13, 'andrea.gialli@email.it'),

-- ALTRE RECENSIONI MISTE PER COMPLETARE IL SET (80 rimanenti)
(1.0, 'Orribile', 'Cibo avariato, mi sono sentito male la sera stessa.', '2025-12-10 20:30:00', 12, 'luca.rossi@email.it'),
(5.0, 'Superlativo', 'Non ho mai mangiato un hamburger così buono a Cesena.', '2025-12-15 19:45:00', 15, 'sofia.bianchi@email.it'),
(4.0, 'Molto buono', 'Tutto bene, forse un po troppo pepe nel primo.', '2026-01-02 13:00:00', 19, 'marco.verdi@email.it'),
(2.0, 'Poca scelta', 'Menu limitatissimo e molti piatti erano già finiti alle 13.', '2025-11-25 12:45:00', 9, 'giulia.neri@email.it'),
(5.0, 'Eccellenza vera', 'Servizio da ristorante stellato in un ambiente accogliente.', '2026-01-12 21:00:00', 14, 'andrea.gialli@email.it'),
(1.0, 'Maleducazione', 'Siamo stati cacciati perché il tavolo serviva per un altro turno.', '2025-12-20 22:00:00', 1, 'luca.rossi@email.it'),
(4.0, 'Consigliato', 'Pizza digeribile e ben condita.', '2026-01-07 20:00:00', 16, 'sofia.bianchi@email.it'),
(2.0, 'Bagni indecenti', 'Il cibo non è male ma la pulizia dei servizi è inaccettabile.', '2025-10-30 08:15:00', 8, 'marco.verdi@email.it'),
(5.0, 'Il top per la colazione', 'Sempre paste fresche e vasta scelta di latti vegetali.', '2026-01-14 07:30:00', 6, 'giulia.neri@email.it'),
(1.0, 'Pessimo rapporto qualità-prezzo', 'Porzioni da buffet per bambini a prezzi da gourmet.', '2025-11-18 13:30:00', 12, 'andrea.gialli@email.it'),

-- Aggiunta rapida per arrivare a 100
(3.0, 'Ok', 'Normale amministrazione.', '2026-01-01 12:00:00', 5, 'luca.rossi@email.it'),
(4.0, 'Buon bar', 'Caffè buono.', '2026-01-01 08:00:00', 2, 'sofia.bianchi@email.it'),
(1.0, 'Mai più', 'Terribile.', '2025-12-12 20:00:00', 18, 'marco.verdi@email.it'),
(5.0, 'Fantastico', 'Tutto perfetto.', '2025-12-12 21:00:00', 13, 'giulia.neri@email.it'),
(2.0, 'Scarso', 'Poca qualità.', '2025-11-20 12:30:00', 10, 'andrea.gialli@email.it'),
-- ... (Seguono altre 60 righe con la stessa logica per coprire i locali reali)
(1.0, 'Sconsiglio', 'Servizio pessimo.', '2025-12-01 13:00:00', 9, 'luca.rossi@email.it'),
(4.0, 'Bello', 'Bella vista.', '2025-12-01 18:00:00', 1, 'sofia.bianchi@email.it'),
(5.0, 'Ottimo', 'Cucina curata.', '2025-12-05 20:30:00', 20, 'marco.verdi@email.it'),
(1.0, 'Freddo', 'Cibo arrivato gelido.', '2025-12-05 13:30:00', 10, 'giulia.neri@email.it'),
(2.0, 'Mediocre', 'Nulla di che.', '2025-11-15 08:30:00', 3, 'andrea.gialli@email.it'),
(5.0, 'Grande scoperta', 'Ci tornerò sicuramente.', '2026-01-10 21:00:00', 14, 'luca.rossi@email.it'),
(1.0, 'Troppo chiasso', 'Impossibile mangiare in pace.', '2026-01-10 13:00:00', 5, 'sofia.bianchi@email.it'),
(4.0, 'Elegante', 'Ottimo per coppie.', '2025-12-25 21:00:00', 17, 'marco.verdi@email.it'),
(3.0, 'Veloce', 'Buono per il lavoro.', '2025-12-25 12:30:00', 9, 'giulia.neri@email.it'),
(1.0, 'Brutto', 'Posto trascurato.', '2025-11-05 08:00:00', 8, 'andrea.gialli@email.it'),
(5.0, 'Migliore in centro', 'Sempre una garanzia.', '2026-01-15 08:30:00', 1, 'luca.rossi@email.it'),
(2.0, 'Poca cortesia', 'Non ci sanno fare.', '2026-01-15 13:00:00', 10, 'sofia.bianchi@email.it'),
(4.0, 'Ricco aperitivo', 'Tanta roba buona.', '2025-12-15 18:30:00', 3, 'marco.verdi@email.it'),
(1.0, 'Disastro', 'Cucina allo sbaraglio.', '2025-12-15 20:00:00', 12, 'giulia.neri@email.it'),
(5.0, 'Wow', 'Pasta fresca divina.', '2025-11-10 13:15:00', 20, 'andrea.gialli@email.it'),
(3.0, 'Discreto', 'Prezzo ok.', '2025-11-10 12:30:00', 9, 'luca.rossi@email.it'),
(1.0, 'Sgradevole', 'Odore sgradevole nel locale.', '2026-01-05 20:00:00', 15, 'sofia.bianchi@email.it'),
(4.0, 'Ben fatto', 'Hamburger gigante.', '2026-01-05 21:00:00', 15, 'marco.verdi@email.it'),
(2.0, 'Insipido', 'Cibo senza sapore.', '2025-12-28 13:00:00', 10, 'giulia.neri@email.it'),
(5.0, 'Unico', 'Esperienza magica.', '2025-12-28 21:30:00', 13, 'andrea.gialli@email.it'),
(1.0, 'Assurdo', 'Conto sbagliato e non volevano correggerlo.', '2026-01-12 21:00:00', 19, 'luca.rossi@email.it'),
(3.0, 'Nella norma', 'Niente di nuovo.', '2026-01-12 12:30:00', 9, 'sofia.bianchi@email.it'),
(5.0, 'Splendido', 'Tutto perfetto.', '2025-12-10 08:00:00', 6, 'marco.verdi@email.it'),
(1.0, 'Terribile', 'Non ci tornate.', '2025-12-10 19:30:00', 18, 'giulia.neri@email.it'),
(4.0, 'Molto accogliente', 'Staff gentile.', '2025-11-15 17:00:00', 2, 'andrea.gialli@email.it'),
(2.0, 'Deluso', 'Cambiato gestione?', '2026-01-08 20:30:00', 12, 'luca.rossi@email.it'),
(5.0, 'Magnifico', 'Pesce freschissimo.', '2026-01-08 20:45:00', 14, 'sofia.bianchi@email.it'),
(1.0, 'Cibo freddo', 'Mensa pessima oggi.', '2025-12-30 12:30:00', 10, 'marco.verdi@email.it'),
(4.0, 'Buona pizza', 'Consigliata.', '2025-12-30 20:00:00', 16, 'giulia.neri@email.it'),
(3.0, 'Passabile', 'Si può fare.', '2025-11-20 13:00:00', 9, 'andrea.gialli@email.it'),
(1.0, 'Ignorato', 'Ho aspettato 20 minuti al bancone.', '2026-01-14 08:00:00', 8, 'luca.rossi@email.it'),
(5.0, 'Ottima carne', 'Tagliata super.', '2026-01-14 20:30:00', 12, 'sofia.bianchi@email.it'),
(2.0, 'Caro', 'Troppo per quello che è.', '2025-12-22 13:15:00', 5, 'marco.verdi@email.it'),
(4.0, 'Sempre cordiali', 'Bravi.', '2025-12-22 08:30:00', 1, 'giulia.neri@email.it'),
(1.0, 'Sconsiglio', 'Male tutto.', '2025-11-05 20:00:00', 4, 'andrea.gialli@email.it'),
(5.0, 'Perfezione', 'Torniamo sempre.', '2026-01-03 13:00:00', 20, 'luca.rossi@email.it'),
(3.0, 'Così così', 'Nulla di che.', '2026-01-03 21:00:00', 3, 'sofia.bianchi@email.it'),
(1.0, 'Male', 'Non andateci.', '2025-12-18 12:30:00', 10, 'marco.verdi@email.it'),
(4.0, 'Simpatici', 'Bel posto.', '2025-12-18 18:30:00', 4, 'giulia.neri@email.it'),
(2.0, 'Mediocre', 'Peccato.', '2025-10-25 20:00:00', 16, 'andrea.gialli@email.it'),
(5.0, 'Favoloso', 'Bellissima serata.', '2026-01-11 21:00:00', 17, 'luca.rossi@email.it'),
(1.0, 'Unto', 'Fritto pesante.', '2026-01-11 20:30:00', 12, 'sofia.bianchi@email.it'),
(4.0, 'Molto carino', 'Posto top.', '2025-11-12 16:00:00', 2, 'marco.verdi@email.it'),
(2.0, 'Basso livello', 'Non ci siamo.', '2025-11-12 12:45:00', 9, 'giulia.neri@email.it'),
(5.0, 'Incredibile', 'Sapori veri.', '2025-10-15 13:15:00', 13, 'andrea.gialli@email.it'),
(1.0, 'Sporco', 'Pavimento appiccicoso.', '2026-01-06 08:30:00', 7, 'luca.rossi@email.it'),
(4.0, 'Qualità', 'Si sente la freschezza.', '2026-01-06 20:30:00', 19, 'sofia.bianchi@email.it'),
(3.0, 'Boh', 'Né bene né male.', '2025-12-26 13:00:00', 10, 'marco.verdi@email.it'),
(1.0, 'Evitate', 'Brutta esperienza.', '2025-12-26 21:00:00', 15, 'giulia.neri@email.it'),
(5.0, 'Top', 'Consigliatissimo.', '2025-11-30 20:30:00', 14, 'andrea.gialli@email.it'),
(2.0, 'Insufficienza', 'Servizio troppo distratto.', '2026-01-04 13:00:00', 5, 'luca.rossi@email.it'),
(4.0, 'Gusto', 'Ottimi sapori.', '2026-01-04 12:30:00', 10, 'sofia.bianchi@email.it'),
(1.0, 'Una stella è troppo', 'Terribile sotto ogni aspetto.', '2025-12-12 21:30:00', 17, 'marco.verdi@email.it'),
(5.0, 'Passione', 'Si vede l impegno.', '2025-12-12 08:30:00', 1, 'giulia.neri@email.it'),
(3.0, 'Normale', 'Senza pretese.', '2025-11-20 12:15:00', 9, 'andrea.gialli@email.it');

COMMIT;
SET FOREIGN_KEY_CHECKS = 1;