-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Gen 18, 2026 alle 12:52
-- Versione del server: 8.0.44
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
CREATE DATABASE IF NOT EXISTS `almamensa` DEFAULT CHARACTER SET utf8mb4;
USE `almamensa`;

-- --------------------------------------------------------

--
-- Struttura della tabella `categorie`
--

CREATE TABLE `categorie` (
  `id` int NOT NULL,
  `nome` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `clienti`
--

CREATE TABLE `clienti` (
  `email` varchar(100) NOT NULL,
  `nome` varchar(25) NOT NULL,
  `cognome` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `composizioni`
--

CREATE TABLE `composizioni` (
  `id_menu` int NOT NULL,
  `id_piatto` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `mense`
--

CREATE TABLE `mense` (
  `id` int NOT NULL,
  `email` varchar(100) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `descrizione` varchar(1024) NOT NULL,
  `ind_civico` varchar(10) NOT NULL,
  `ind_via` varchar(100) NOT NULL,
  `ind_comune` varchar(50) NOT NULL,
  `ind_cap` int NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `coo_latitudine` varchar(15) NOT NULL,
  `coo_longitudine` varchar(15) NOT NULL,
  `num_posti` int NOT NULL,
  `immagine` varchar(255) DEFAULT NULL,
  `id_categoria` int NOT NULL,
  `media_recensioni` decimal(3,2) NOT NULL,
  `num_recensioni` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `menu`
--

CREATE TABLE `menu` (
  `id` int NOT NULL,
  `nome` varchar(50) NOT NULL,
  `attivo` char(1) NOT NULL,
  `id_mensa` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `orari`
--

CREATE TABLE `orari` (
  `id_mensa` int NOT NULL,
  `giorno` varchar(10) NOT NULL,
  `ora_apertura` TIME NOT NULL,
  `ora_chiusura` TIME NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `piatti`
--

CREATE TABLE `piatti` (
  `id` int NOT NULL,
  `nome` varchar(25) NOT NULL,
  `descrizione` varchar(255) NOT NULL,
  `prezzo` decimal(5,2) NOT NULL,
  `id_mensa` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `prenotazioni`
--

CREATE TABLE `prenotazioni` (
  `data_ora` datetime NOT NULL,
  `codice` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `convalidata` tinyint(1) NOT NULL DEFAULT FALSE,
  `num_persone` int NOT NULL,
  `id_mensa` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `recensioni`
--

CREATE TABLE `recensioni` (
  `id` int NOT NULL,
  `voto` decimal(2,1) NOT NULL,
  `titolo` varchar(255) NOT NULL,
  `descrizione` varchar(1024) NOT NULL,
  `data_ora` datetime NOT NULL,
  `id_mensa` int NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

CREATE TABLE `utenti` (
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mensa` tinyint(1) NOT NULL,
  `cliente` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Indici per le tabelle `orari`
--
ALTER TABLE `orari`
  ADD PRIMARY KEY (`id_mensa`,`giorno`,`ora_apertura`);

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `mense`
--
ALTER TABLE `mense`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `piatti`
--
ALTER TABLE `piatti`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `recensioni`
--
ALTER TABLE `recensioni`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

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
-- Limiti per la tabella `orari`
--
ALTER TABLE `orari`
  ADD CONSTRAINT `FKR` FOREIGN KEY (`id_mensa`) REFERENCES `mense` (`id`);

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
  
--
-- Stored Procedure `recensioni`
--

DELIMITER $$
CREATE PROCEDURE aggiorna_recensioni(IN id_m INT)
BEGIN
	-- Aggiornamento
    UPDATE mense m
    SET media_recensioni = (SELECT COALESCE(AVG(voto), 0)
							FROM recensioni
                            WHERE id_mensa = id_m),
		num_recensioni = (SELECT COUNT(voto)
							FROM recensioni
                            WHERE id_mensa = id_m)
	WHERE id = id_m;
END
$$
DELIMITER ;

--
-- Trigger `recensioni`
--

DELIMITER $$
CREATE TRIGGER `dopo_delete_recensione` AFTER DELETE ON `recensioni` FOR EACH ROW BEGIN
    CALL aggiorna_recensioni(OLD.id_mensa);
END
$$
DELIMITER ;

DELIMITER $$
CREATE TRIGGER `dopo_insert_recensione` AFTER INSERT ON `recensioni` FOR EACH ROW BEGIN
    CALL aggiorna_recensioni(NEW.id_mensa);
END
$$
DELIMITER ;

DELIMITER $$
CREATE TRIGGER `dopo_update_recensione` AFTER UPDATE ON `recensioni` FOR EACH ROW BEGIN
    CALL aggiorna_recensioni(NEW.id_mensa);
END
$$
DELIMITER ;

--
-- Trigger `composizioni`
--
DELIMITER $$
CREATE TRIGGER `check_composition_mensa` BEFORE INSERT ON `composizioni` FOR EACH ROW BEGIN
  IF (SELECT p.id_mensa FROM piatti p WHERE p.id = NEW.id_piatto) !=
     (SELECT m.id_mensa FROM menu m WHERE m.id = NEW.id_menu) THEN
    SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Il piatto e il menu devono appartenere alla stessa mensa';
  END IF;
END
$$
DELIMITER ;

--
-- Dump dei dati per la tabella `categorie`
--

INSERT INTO `categorie` (`id`, `nome`) VALUES
(1, 'Bar'),
(2, 'Mensa'),
(3, 'Ristorante');

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;