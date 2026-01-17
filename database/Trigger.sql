DELIMITER //

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
END //

CREATE TRIGGER dopo_insert_recensione
AFTER INSERT ON recensioni
FOR EACH ROW
BEGIN
    CALL aggiorna_recensioni(NEW.id_mensa);
END//

CREATE TRIGGER dopo_update_recensione
AFTER UPDATE ON recensioni
FOR EACH ROW
BEGIN
    CALL aggiorna_recensioni(NEW.id_mensa);
END//

CREATE TRIGGER dopo_delete_recensione
AFTER DELETE ON recensioni
FOR EACH ROW
BEGIN
    CALL aggiorna_recensioni(OLD.id_mensa);
END//

--
-- Trigger per validare che piatto e menu appartengono alla stessa mensa
--
CREATE TRIGGER check_composition_mensa
BEFORE INSERT ON composizioni
FOR EACH ROW
BEGIN
  IF (SELECT p.id_mensa FROM piatti p WHERE p.id = NEW.id_piatto) !=
     (SELECT m.id_mensa FROM menu m WHERE m.id = NEW.id_menu) THEN
    SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Il piatto e il menu devono appartenere alla stessa mensa';
  END IF;
END//

DELIMITER ;

