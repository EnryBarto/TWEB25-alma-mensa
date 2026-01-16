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

DELIMITER ;

