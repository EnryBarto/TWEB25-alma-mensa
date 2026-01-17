<?php
class DatabaseHelper {
    private $db;

    public function __construct($servername, $username, $password, $dbname, $port){
        $this->db = new mysqli($servername, $username, $password, $dbname, $port);
        if ($this->db->connect_error) {
            die("Connection failed: " . $this->db->connect_error);
        }
    }

    public function checkLogin($email, $password){
        $stmt = $this->db->prepare("SELECT * FROM utenti WHERE email = ?;");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function createUser($name, $surname, $email, $hashedPassword){
        $this->db->begin_transaction();
        try {
            $true = true;
            $false = false;
            $stmt = $this->db->prepare('INSERT INTO utenti (email, password, mensa, cliente) VALUES (?, ?, ?, ?);');
            $stmt->bind_param("ssii", $email, $hashedPassword, $false, $true);
            $stmt->execute();
            $stmt = $this->db->prepare("INSERT INTO clienti (email, nome, cognome) VALUES (?, ?, ?);");
            $stmt->bind_param("sss", $email, $name, $surname);
            $stmt->execute();
            $this->db->commit();
        } catch (mysqli_sql_exception $e) {
            $this->db->rollback();
            return $e->getCode();
        }
        return 0;
    }

    public function getCanteens($orderBy, $limit = null) {
        if (empty($orderBy)) {
            $orderBy = "media_recensioni DESC";
        }
        $limit = $limit != null ? "LIMIT " . intval($limit) . " " : "";
        $query = "SELECT m.*, c.nome AS categoria FROM mense AS m JOIN categorie c ON m.id_categoria = c.id ORDER BY $orderBy $limit;";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();

        $list = array();
        foreach ($result->fetch_all(MYSQLI_ASSOC) as $c) {
            array_push($list, new Canteen($c["id"], $c["email"], $c["nome"], $c["descrizione"], $c["ind_civico"], $c["ind_via"], $c["ind_comune"], $c["ind_cap"], $c["telefono"], $c["coo_latitudine"], $c["coo_longitudine"], $c["num_posti"], $c["immagine"], $c["categoria"], $c["media_recensioni"], $c["num_recensioni"]));
        }
        return $list;
    }

    public function getCanteenById($id) {
        $stmt = $this->db->prepare("SELECT m.*, c.nome AS categoria FROM mense AS m JOIN categorie c ON m.id_categoria = c.id WHERE m.id = ?;");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $c = $result->fetch_assoc();
            return new Canteen($c["id"], $c["email"], $c["nome"], $c["descrizione"], $c["ind_civico"], $c["ind_via"], $c["ind_comune"], $c["ind_cap"], $c["telefono"], $c["coo_latitudine"], $c["coo_longitudine"], $c["num_posti"], $c["immagine"], $c["categoria"], $c["media_recensioni"], $c["num_recensioni"]);
        } else {
            return null;
        }
    }

    public function getCategories() {
        $result = $this->db->query("SELECT nome FROM categorie;");
        return array_column($result->fetch_all(MYSQLI_ASSOC), "nome");
    }

    public function getReservationsByCustomerEmail($email) {
        $stmt = $this->db->prepare("SELECT * FROM prenotazioni WHERE email = ? ORDER BY data_ora DESC;");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $resArray = $result->fetch_all(MYSQLI_ASSOC);
        $reservations = [];
        foreach ($resArray as $res) {
            array_push($reservations, new Reservation($res["codice"], $this->getCanteenById($res["id_mensa"]), $res["data_ora"], $email, $res["num_persone"], $res["convalidata"]));
        }
        return $reservations;
    }

    public function getCanteenByEmail($email) {
        $stmt = $this->db->prepare("SELECT m.*, c.nome AS categoria FROM mense AS m JOIN categorie c ON m.id_categoria = c.id WHERE m.email = ?;");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $c = $result->fetch_assoc();
            return new Canteen($c["id"], $c["email"], $c["nome"], $c["descrizione"], $c["ind_civico"], $c["ind_via"], $c["ind_comune"], $c["ind_cap"], $c["telefono"], $c["coo_latitudine"], $c["coo_longitudine"], $c["num_posti"], $c["immagine"], $c["categoria"], $c["media_recensioni"], $c["num_recensioni"]);
        } else {
            return null;
        }
    }

    public function getCustomerByEmail($email) {
        $stmt = $this->db->prepare("SELECT * FROM clienti WHERE email = ?;");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $c = $result->fetch_all(MYSQLI_ASSOC)[0];
            return new Customer($c["email"], $c["nome"], $c["cognome"]);
        } else {
            return null;
        }
    }

    public function updateCustomerData($email, $name, $surname) {
        $stmt = $this->db->prepare("UPDATE clienti SET nome = ?, cognome = ? WHERE email = ?;");
        $stmt->bind_param("sss", $name, $surname, $email);
        try {
            $stmt->execute();
        } catch (mysqli_sql_exception $e) {
            return $e->getCode();
        }
        return 0;
    }

    public function updateUserPassword($email, $hashedPassword) {
        $stmt = $this->db->prepare("UPDATE utenti SET password = ? WHERE email = ?;");
        $stmt->bind_param("ss", $hashedPassword, $email);
        try {
            $stmt->execute();
        } catch (mysqli_sql_exception $e) {
            return $e->getCode();
        }
        return 0;
    }

    public function getAllDishes() {
        $stmt = $this->db->prepare("SELECT * FROM piatti ORDER BY nome ASC;");
        $stmt->execute();
        $result = $stmt->get_result();

        $list = array();
        foreach ($result->fetch_all(MYSQLI_ASSOC) as $d) {
            array_push($list, new Dish($d["id"], $d["nome"], $d["descrizione"], $d["prezzo"], $d["id_mensa"]));
        }
        return $list;
    }

    public function getMenusByCanteenId($canteenId) {
        $stmt = $this->db->prepare("SELECT * FROM menu WHERE id_mensa = ? ORDER BY attivo DESC, nome ASC;");
        $stmt->bind_param("i", $canteenId);
        $stmt->execute();
        $result = $stmt->get_result();

        $list = array();
        foreach ($result->fetch_all(MYSQLI_ASSOC) as $m) {
            $dishes = $this->getDishesByMenuId($m["id"]);
            array_push($list, new Menu($m["id"], $m["nome"], $m["attivo"], $m["id_mensa"], $dishes));
        }
        return $list;
    }

    public function getMenuById($menuId) {
        $stmt = $this->db->prepare("SELECT * FROM menu WHERE id = ?;");
        $stmt->bind_param("i", $menuId);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $m = $result->fetch_assoc();
            $dishes = $this->getDishesByMenuId($m["id"]);
            return new Menu($m["id"], $m["nome"], $m["attivo"], $m["id_mensa"], $dishes);
        } else {
            return null;
        }
    }

    public function getDishesByMenuId($menuId) {
        $stmt = $this->db->prepare("SELECT p.* FROM piatti p JOIN composizioni c ON p.id = c.id_piatto WHERE c.id_menu = ? ORDER BY p.nome ASC;");
        $stmt->bind_param("i", $menuId);
        $stmt->execute();
        $result = $stmt->get_result();

        $list = array();
        foreach ($result->fetch_all(MYSQLI_ASSOC) as $d) {
            array_push($list, new Dish($d["id"], $d["nome"], $d["descrizione"], $d["prezzo"], $d["id_mensa"]));
        }
        return $list;
    }

    public function getDishesByCanteenId($canteenId) {
        $stmt = $this->db->prepare("SELECT * FROM piatti WHERE id_mensa = ? ORDER BY nome ASC;");
        $stmt->bind_param("i", $canteenId);
        $stmt->execute();
        $result = $stmt->get_result();

        $list = array();
        foreach ($result->fetch_all(MYSQLI_ASSOC) as $d) {
            array_push($list, new Dish($d["id"], $d["nome"], $d["descrizione"], $d["prezzo"], $d["id_mensa"]));
        }
        return $list;
    }

    public function getDishById($dishId) {
        $stmt = $this->db->prepare("SELECT * FROM piatti WHERE id = ?;");
        $stmt->bind_param("i", $dishId);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $d = $result->fetch_assoc();
            return new Dish($d["id"], $d["nome"], $d["descrizione"], $d["prezzo"], $d["id_mensa"]);
        } else {
            return null;
        }
    }

    public function insertDish($nome, $descrizione, $prezzo, $id_mensa) {
        $stmt = $this->db->prepare("INSERT INTO piatti (nome, descrizione, prezzo, id_mensa) VALUES (?, ?, ?, ?);");
        $stmt->bind_param("ssdi", $nome, $descrizione, $prezzo, $id_mensa);
        $stmt->execute();
        return $stmt->affected_rows > 0;
    }

    public function updateDish($dishId, $nome, $descrizione, $prezzo) {
        $stmt = $this->db->prepare("UPDATE piatti SET nome = ?, descrizione = ?, prezzo = ? WHERE id = ?;");
        $stmt->bind_param("ssdi", $nome, $descrizione, $prezzo, $dishId);
        $stmt->execute();
        return $stmt->affected_rows > 0;
    }

    public function insertMenu($nome, $id_mensa, $attivo = 0, $dishes = []) {
        $stmt = $this->db->prepare("INSERT INTO menu (nome, attivo, id_mensa) VALUES (?, ?, ?);");
        $stmt->bind_param("sii", $nome, $attivo, $id_mensa);
        $stmt->execute();
        $menuId = $this->db->insert_id;

        // Inserting dishes into the compositions table
        if (!empty($dishes)) {
            $stmt = $this->db->prepare("INSERT INTO composizioni (id_menu, id_piatto) VALUES (?, ?);");
            foreach ($dishes as $dishId) {
                $stmt->bind_param("ii", $menuId, $dishId);
                $stmt->execute();
            }
        }
        return $menuId;
    }

    public function updateMenu($menuId, $nome, $attivo = 0, $dishes = []) {
        $this->db->begin_transaction();
        try {
            // Update menu core data
            $stmt = $this->db->prepare("UPDATE menu SET nome = ?, attivo = ? WHERE id = ?;");
            $stmt->bind_param("sii", $nome, $attivo, $menuId);
            $stmt->execute();

            // Delete compositions
            $stmt = $this->db->prepare("DELETE FROM composizioni WHERE id_menu = ?");
            $stmt->bind_param("i", $menuId);
            $stmt->execute();

            // Re-insert compositions
            if (!empty($dishes)) {
                $stmt = $this->db->prepare("INSERT INTO composizioni (id_menu, id_piatto) VALUES (?, ?);");
                foreach ($dishes as $dishId) {
                    $stmt->bind_param("ii", $menuId, $dishId);
                    $stmt->execute();
                }
            }

            $this->db->commit();
            return true;
        } catch (mysqli_sql_exception $e) {
            $this->db->rollback();
            return false;
        }
    }

    public function getCanteenReviews($canteenId) {
        $query = "SELECT r.*, c.* FROM `recensioni` r JOIN utenti u ON r.email = u.email JOIN clienti c ON u.email = c.email WHERE r.id_mensa = ? ORDER BY data_ora DESC;";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $canteenId);
        $stmt->execute();
        $result = $stmt->get_result();

        $list = array();
        foreach ($result->fetch_all(MYSQLI_ASSOC) as $r) {
            array_push($list, new Review($r["id"], $r["voto"], $r["titolo"], $r["descrizione"], $r["data_ora"], $r["id_mensa"], $r["email"], $r["cognome"], $r["nome"]));
        }
        return $list;
    }

    public function getCanteenReviewById($reviewId) {
        $query = "SELECT r.*, c.* FROM `recensioni` r JOIN utenti u ON r.email = u.email JOIN clienti c ON u.email = c.email WHERE r.id = ?;";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $reviewId);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $r = $result->fetch_assoc();
            return new Review($r["id"], $r["voto"], $r["titolo"], $r["descrizione"], $r["data_ora"], $r["id_mensa"], $r["email"], $r["cognome"], $r["nome"]);
        } else {
            return null;
        }
    }

    public function insertReview($canteenId, $authorEmail, $title, $description, $value) {
        $timestamp = date("Y/m/d H:i:s");
        try {
            $stmt = $this->db->prepare('INSERT INTO recensioni (voto, titolo, descrizione, data_ora, id_mensa, email) VALUES (?, ?, ?, ?, ?, ?);');
            $stmt->bind_param("isssis", $value, $title, $description, $timestamp, $canteenId, $authorEmail);
            $stmt->execute();
        } catch (Exception $e) {
            return $e->getCode();
        }
        return 0;
    }

    public function updateReview($reviewId, $title, $description, $value) {
        $timestamp = date("Y/m/d H:i:s");
        try {
            $stmt = $this->db->prepare('UPDATE recensioni SET voto=?, titolo=?, descrizione=?, data_ora=? WHERE id=?');
            $stmt->bind_param("isssi", $value, $title, $description, $timestamp, $reviewId);
            $stmt->execute();
        } catch (Exception $e) {
            return $e->getCode();
        }
        if ($stmt->affected_rows == 0) {
            return -2;
        } else {
            return 0;
        }
    }

    public function deleteReview($reviewId) {
        $stmt = $this->db->prepare('DELETE FROM recensioni WHERE id=?');
        $stmt->bind_param("i", $reviewId);
        $stmt->execute();
    }

    public function deleteMenu($menuId) {
        $this->db->begin_transaction();
        try {
            // Delete compositions first (foreign key constraint)
            $stmt = $this->db->prepare('DELETE FROM composizioni WHERE id_menu = ?');
            $stmt->bind_param("i", $menuId);
            $stmt->execute();

            // Delete the menu
            $stmt = $this->db->prepare('DELETE FROM menu WHERE id = ?');
            $stmt->bind_param("i", $menuId);
            $stmt->execute();

            $this->db->commit();
            return true;
        } catch (mysqli_sql_exception $e) {
            $this->db->rollback();
            return false;
        }
    }

    public function deleteDish($dishId) {
        $this->db->begin_transaction();
        try {
            // Delete compositions first (foreign key constraint)
            $stmt = $this->db->prepare('DELETE FROM composizioni WHERE id_piatto = ?');
            $stmt->bind_param("i", $dishId);
            $stmt->execute();

            // Delete the dish
            $stmt = $this->db->prepare('DELETE FROM piatti WHERE id=?');
            $stmt->bind_param("i", $dishId);
            $stmt->execute();

            $this->db->commit();
            return true;
        } catch (mysqli_sql_exception $e) {
            $this->db->rollback();
            return false;
        }
    }

}
?>