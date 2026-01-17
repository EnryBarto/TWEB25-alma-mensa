-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Gen 14, 2026 alle 17:27
-- Versione del server: 10.4.32-MariaDB
-- Versione PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `almamensa`
--
create database if not exists almamensa;
use almamensa;

-- --------------------------------------------------------

--
-- Struttura della tabella `categorie`
--

CREATE TABLE if not exists `categorie` (
  `id` int(11) NOT NULL,
  `nome` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `categorie`
--

INSERT INTO `categorie` (`id`, `nome`) VALUES
(1, 'Bar'),
(2, 'Mensa'),
(3, 'Ristorante');

-- --------------------------------------------------------

--
-- Struttura della tabella `clienti`
--

CREATE TABLE if not exists `clienti` (
  `email` varchar(100) NOT NULL,
  `nome` varchar(25) NOT NULL,
  `cognome` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `composizioni`
--

CREATE TABLE if not exists `composizioni` (
  `id_menu` int(11) NOT NULL,
  `id_piatto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `mense`
--

CREATE TABLE if not exists `mense` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `descrizione` varchar(255) NOT NULL,
  `ind_civico` varchar(10) NOT NULL,
  `ind_via` varchar(100) NOT NULL,
  `ind_comune` varchar(50) NOT NULL,
  `ind_cap` int(11) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `coo_latitudine` varchar(15) NOT NULL,
  `coo_longitudine` varchar(15) NOT NULL,
  `num_posti` int(11) NOT NULL,
  `immagine` varchar(255) DEFAULT NULL,
  `id_categoria` int(11) NOT NULL,
  `media_recensioni` decimal(3,2) NOT NULL,
  `num_recensioni` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `mense`
--

INSERT INTO `mense` (`id`, `email`, `nome`, `descrizione`, `ind_civico`, `ind_via`, `ind_comune`, `ind_cap`, `telefono`, `coo_latitudine`, `coo_longitudine`, `num_posti`, `immagine`, `id_categoria`) VALUES
(1, 'volume@unibo.it', 'Volume', '[Spazio] [Ascolto] [Alimento]', '50', 'Via Cesare Pavese', 'Cesena', 47521, '+39 320 3562325', '44.1478691', '12.2355525', 50, 'Volume.jpg', 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `menu`
--

CREATE TABLE if not exists `menu` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `attivo` char(1) NOT NULL,
  `id_mensa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `piatti`
--

CREATE TABLE if not exists `piatti` (
  `id` int(11) NOT NULL,
  `nome` varchar(25) NOT NULL,
  `descrizione` varchar(255) NOT NULL,
  `prezzo` decimal(5,2) NOT NULL,
  `id_mensa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `prenotazioni`
--

CREATE TABLE if not exists `prenotazioni` (
  `data_ora` datetime NOT NULL,
  `codice` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `convalidata` char(1) NOT NULL,
  `num_persone` int(11) NOT NULL,
  `id_mensa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `recensioni`
--

CREATE TABLE if not exists `recensioni` (
  `id` int(11) NOT NULL,
  `voto` decimal(2,1) NOT NULL,
  `titolo` varchar(25) NOT NULL,
  `descrizione` varchar(255) NOT NULL,
  `data_ora` datetime NOT NULL,
  `id_mensa` int(11) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

CREATE TABLE if not exists `utenti` (
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mensa` tinyint(1) NOT NULL,
  `cliente` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `utenti`
--

INSERT INTO `utenti` (`email`, `password`, `mensa`, `cliente`) VALUES
('volume@unibo.it', '$2y$10$G7ytJpMJt3lFRHsyjpy4nOTFhAmb8RkDh3SvVVoHUkdMiTaTmO8yy', 1, 0);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ID_categorie_IND` (`id`);

--
-- Indici per le tabelle `clienti`
--
ALTER TABLE `clienti`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `FKUse_Cli_IND` (`email`);

--
-- Indici per le tabelle `composizioni`
--
ALTER TABLE `composizioni`
  ADD PRIMARY KEY (`id_piatto`,`id_menu`),
  ADD UNIQUE KEY `ID_composizioni_IND` (`id_piatto`,`id_menu`),
  ADD KEY `FKCom_Men_IND` (`id_menu`);

--
-- Indici per le tabelle `mense`
--
ALTER TABLE `mense`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `FKUse_Men_ID` (`email`),
  ADD UNIQUE KEY `ID_mense_IND` (`id`),
  ADD UNIQUE KEY `FKUse_Men_IND` (`email`),
  ADD KEY `FKTipo_IND` (`id_categoria`);

--
-- Indici per le tabelle `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ID_menu_IND` (`id`),
  ADD KEY `FKProposta_IND` (`id_mensa`);

--
-- Indici per le tabelle `piatti`
--
ALTER TABLE `piatti`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ID_piatti_IND` (`id`),
  ADD KEY `FKCom_Pia_IND` (`id_mensa`);

--
-- Indici per le tabelle `prenotazioni`
--
ALTER TABLE `prenotazioni`
  ADD PRIMARY KEY (`codice`),
  ADD UNIQUE KEY `SID_prenotazioni_ID` (`email`,`data_ora`),
  ADD UNIQUE KEY `SID_prenotazioni_IND` (`email`,`data_ora`),
  ADD UNIQUE KEY `ID_prenotazioni_IND` (`codice`),
  ADD KEY `FKRicezione_IND` (`id_mensa`);

--
-- Indici per le tabelle `recensioni`
--
ALTER TABLE `recensioni`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ID_recensioni_IND` (`id`),
  ADD KEY `FKVotazione_IND` (`id_mensa`),
  ADD KEY `FKScrittura_IND` (`email`);

--
-- Indici per le tabelle `utenti`
--
ALTER TABLE `utenti`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `ID_utenti_IND` (`email`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT per la tabella `mense`
--
ALTER TABLE `mense`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT per la tabella `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `piatti`
--
ALTER TABLE `piatti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `recensioni`
--
ALTER TABLE `recensioni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `clienti`
--
ALTER TABLE `clienti`
  ADD CONSTRAINT `FKUse_Cli_FK` FOREIGN KEY (`email`) REFERENCES `utenti` (`email`);

--
-- Limiti per la tabella `composizioni`
--
ALTER TABLE `composizioni`
  ADD CONSTRAINT `FKCom_Men_FK` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id`),
  ADD CONSTRAINT `FKCom_Pia` FOREIGN KEY (`id_piatto`) REFERENCES `piatti` (`id`);

--
-- Limiti per la tabella `mense`
--
ALTER TABLE `mense`
  ADD CONSTRAINT `FKTipo_FK` FOREIGN KEY (`id_categoria`) REFERENCES `categorie` (`id`),
  ADD CONSTRAINT `FKUse_Men_FK` FOREIGN KEY (`email`) REFERENCES `utenti` (`email`);

--
-- Limiti per la tabella `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `FKProposta_FK` FOREIGN KEY (`id_mensa`) REFERENCES `mense` (`id`);

--
-- Limiti per la tabella `piatti`
--
ALTER TABLE `piatti`
  ADD CONSTRAINT `FKCom_Pia_FK` FOREIGN KEY (`id_mensa`) REFERENCES `mense` (`id`);

--
-- Limiti per la tabella `prenotazioni`
--
ALTER TABLE `prenotazioni`
  ADD CONSTRAINT `FKRicezione_FK` FOREIGN KEY (`id_mensa`) REFERENCES `mense` (`id`),
  ADD CONSTRAINT `FKRichiesta` FOREIGN KEY (`email`) REFERENCES `clienti` (`email`);

--
-- Limiti per la tabella `recensioni`
--
ALTER TABLE `recensioni`
  ADD CONSTRAINT `FKScrittura_FK` FOREIGN KEY (`email`) REFERENCES `clienti` (`email`),
  ADD CONSTRAINT `FKVotazione_FK` FOREIGN KEY (`id_mensa`) REFERENCES `mense` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
