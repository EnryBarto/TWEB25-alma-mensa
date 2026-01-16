-- PASSWORD: Pass123

-- 1. Inserimento Utenti per le mense (Necessario per FK email)
INSERT INTO utenti (email, password, mensa, cliente) VALUES 
('info@osteriacene.it', '$2y$10$3Qz0XnIIJEEcxRU2ferNM.w9IRxH2jcGlYa4bXMq1kfW/yjfEecM6', 1, 0),
('prenotazioni@sangio.it', '$2y$10$3Qz0XnIIJEEcxRU2ferNM.w9IRxH2jcGlYa4bXMq1kfW/yjfEecM6', 1, 0),
('staff@lacantera.it', '$2y$10$3Qz0XnIIJEEcxRU2ferNM.w9IRxH2jcGlYa4bXMq1kfW/yjfEecM6', 1, 0),
('contatti@casamadie.it', '$2y$10$3Qz0XnIIJEEcxRU2ferNM.w9IRxH2jcGlYa4bXMq1kfW/yjfEecM6', 1, 0),
('caffe.barriera@cesena.it', '$2y$10$3Qz0XnIIJEEcxRU2ferNM.w9IRxH2jcGlYa4bXMq1kfW/yjfEecM6', 1, 0),
('mensa.studenti@campus.it', '$2y$10$3Qz0XnIIJEEcxRU2ferNM.w9IRxH2jcGlYa4bXMq1kfW/yjfEecM6', 1, 0),
('pizzeria.dafero@cesena.it', '$2y$10$3Qz0XnIIJEEcxRU2ferNM.w9IRxH2jcGlYa4bXMq1kfW/yjfEecM6', 1, 0),
('osteria.buonumore@libero.it', '$2y$10$3Qz0XnIIJEEcxRU2ferNM.w9IRxH2jcGlYa4bXMq1kfW/yjfEecM6', 1, 0),
('bar.piazza@cesena.it', '$2y$10$3Qz0XnIIJEEcxRU2ferNM.w9IRxH2jcGlYa4bXMq1kfW/yjfEecM6', 1, 0),
('chiosco.ippodromo@parco.it', '$2y$10$3Qz0XnIIJEEcxRU2ferNM.w9IRxH2jcGlYa4bXMq1kfW/yjfEecM6', 1, 0);

-- 2. Inserimento di 10 Mense con località reali a Cesena
INSERT INTO mense (email, nome, descrizione, ind_civico, ind_via, ind_comune, ind_cap, coo_latitudine, coo_longitudine, num_posti, immagine, id_categoria) VALUES 
-- Ristoranti (ID Categoria: 3)
('info@osteriacene.it', 'Osteria Cené', 'Cucina tipica nel cuore del centro storico.', '3', 'Via Albizzi', 'Cesena', 47521, '44.13711', '12.24326', 45, 'img/cene.jpg', 3),
('prenotazioni@sangio.it', 'Ristorante al Sangiò', 'Specialità romagnole e ambiente accogliente.', '16', 'Piazza Giovanni Amendola', 'Cesena', 47521, '44.13673', '12.24347', 60, 'img/sangio.jpg', 3),
('osteria.buonumore@libero.it', 'Osteria del Buonumore', 'Trattoria storica con primi fatti a mano.', '18', 'Via Chiaramonti', 'Cesena', 47521, '44.13980', '12.24210', 40, 'img/buonumore.jpg', 3),

-- Bar / Tavola Calda (ID Categoria: 1)
('staff@lacantera.it', 'La Cantera', 'Punto di riferimento per caffè e pranzi veloci vicino al teatro.', '5', 'Piazza Mario Guidazzi', 'Cesena', 47521, '44.13608', '12.24860', 30, 'img/cantera.jpg', 1),
('contatti@casamadie.it', 'CASAMADIE', 'Prodotti da forno artigianali e piatti mediterranei creativi.', '1', 'Via Fra Michelino', 'Cesena', 47521, '44.13760', '12.24126', 25, 'img/madie.jpg', 1),
('caffe.barriera@cesena.it', 'Ristorante Caffé Barriera', 'Bar storico all ingresso del centro ideale per break.', '82', 'Corso Gastone Sozzi', 'Cesena', 47521, '44.13941', '12.24651', 50, 'img/barriera.jpg', 1),
('bar.piazza@cesena.it', 'Bar Piazza del Popolo', 'Il cuore della città, ideale per colazioni e spuntini.', '10', 'Piazza del Popolo', 'Cesena', 47521, '44.13790', '12.24140', 20, 'img/piazza.jpg', 1),

-- Mense / Punti Ristoro Campus (ID Categoria: 2)
('mensa.studenti@campus.it', 'Mensa Universitaria Campus', 'Ristoro principale per gli studenti del nuovo polo di Cesena.', '50', 'Via dell\'Università', 'Cesena', 47521, '44.14850', '12.23520', 180, 'img/mensa_campus.jpg', 2),
('pizzeria.dafero@cesena.it', 'Ristoro Da Fero', 'Punto ristoro molto frequentato dagli universitari della zona ex-zuccherificio.', '20', 'Via Cavalcavia', 'Cesena', 47521, '44.14210', '12.23810', 70, 'img/fero.jpg', 2),
('chiosco.ippodromo@parco.it', 'Chiosco Ippodromo', 'Punto ristoro immerso nel verde, perfetto per studenti e famiglie.', '1', 'Via G. d\'Arezzo', 'Cesena', 47521, '44.14420', '12.23150', 100, 'img/ippo.jpg', 2);

-- Inserimento nuovi Utenti (Login)
INSERT INTO `utenti` (`email`, `password`, `mensa`, `cliente`) VALUES
('mario.rossi@email.it', '$2y$10$mYqy1XnnlTNaHdDDwuDWmOYXcUAdAV.R5z4rvw8ihJWDdu..Rx9Fa', 0, 1),
('giulia.bianchi@email.it', '$2y$10$mYqy1XnnlTNaHdDDwuDWmOYXcUAdAV.R5z4rvw8ihJWDdu..Rx9Fa', 0, 1);

-- Inserimento nuovi Clienti (Anagrafica)
INSERT INTO `clienti` (`email`, `nome`, `cognome`) VALUES
('mario.rossi@email.it', 'Mario', 'Rossi'),
('giulia.bianchi@email.it', 'Giulia', 'Bianchi');

INSERT INTO `prenotazioni` (`data_ora`, `codice`, `email`, `convalidata`, `num_persone`, `id_mensa`) VALUES
-- Prenotazioni Nicolas Tazzieri
('2025-01-10', 'PREN-2025-001', 'n.tazzieri@gmail.com', '1', 2, 2),  -- Osteria Cené
('2025-01-15', 'PREN-2025-002', 'n.tazzieri@gmail.com', '1', 4, 3),  -- Ristorante al Sangiò
('2025-01-22', 'PREN-2025-003', 'n.tazzieri@gmail.com', '1', 1, 9),  -- Mensa Campus
('2025-01-28', 'PREN-2025-004', 'n.tazzieri@gmail.com', '0', 2, 5),  -- La Cantera (Non convalidata ancora)

-- Prenotazioni Mario Rossi (Nuovo utente)
('2025-01-12', 'PREN-2025-005', 'mario.rossi@email.it', '1', 1, 9),  -- Mensa Campus
('2025-01-18', 'PREN-2025-006', 'mario.rossi@email.it', '1', 6, 10), -- Ristoro Da Fero (Gruppo studio)
('2025-01-25', 'PREN-2025-007', 'mario.rossi@email.it', '1', 2, 11), -- Chiosco Ippodromo

-- Prenotazioni Giulia Bianchi (Nuovo utente)
('2025-01-11', 'PREN-2025-008', 'giulia.bianchi@email.it', '1', 2, 6),  -- CASAMADIE
('2025-01-20', 'PREN-2025-009', 'giulia.bianchi@email.it', '1', 3, 1),  -- Volume
('2025-01-24', 'PREN-2025-010', 'giulia.bianchi@email.it', '1', 2, 8),  -- Bar Piazza del Popolo
('2025-01-30', 'PREN-2025-011', 'giulia.bianchi@email.it', '1', 5, 4);  -- Osteria del Buonumore