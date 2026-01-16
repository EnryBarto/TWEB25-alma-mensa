<?php
class DatabaseHelper{
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
        $stmt = $this->db->prepare("SELECT m.*, r.media_voti, r.num_voti, c.nome AS categoria FROM mense AS m LEFT JOIN (SELECT id_mensa, TRUNCATE(AVG(voto), 1) as media_voti, COUNT(voto) AS num_voti FROM `recensioni` GROUP BY id_mensa) AS r ON m.id = r.id_mensa JOIN categorie c ON m.id_categoria = c.id WHERE m.email = ?;");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $c = $result->fetch_assoc();
            return new Canteen($c["id"], $c["email"], $c["nome"], $c["descrizione"], $c["ind_civico"], $c["ind_via"], $c["ind_comune"], $c["ind_cap"], $c["telefono"], $c["coo_latitudine"], $c["coo_longitudine"], $c["num_posti"], $c["immagine"], $c["categoria"], $c["media_voti"], $c["num_voti"]);
        } else {
            return null;
        }
    }

    public function getAllDishes() {
        $stmt = $this->db->prepare("SELECT * FROM piatti ORDER BY nome ASC;");
        $stmt->execute();
        $result = $stmt->get_result();

        $list = array();
        foreach ($result->fetch_all(MYSQLI_ASSOC) as $d) {
            array_push($list, new Dish($d["id"], $d["nome"], $d["descrizione"], $d["prezzo"], $d["img"]));
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

    public function getDishesByMenuId($menuId) {
        $stmt = $this->db->prepare("SELECT p.* FROM piatti p JOIN composizioni c ON p.id = c.id_piatto WHERE c.id_menu = ? ORDER BY p.nome ASC;");
        $stmt->bind_param("i", $menuId);
        $stmt->execute();
        $result = $stmt->get_result();

        $list = array();
        foreach ($result->fetch_all(MYSQLI_ASSOC) as $d) {
            array_push($list, new Dish($d["id"], $d["nome"], $d["descrizione"], $d["prezzo"], $d["img"]));
        }
        return $list;
    }

    public function getDishesByCanteenId($canteenId) {
        $stmt = $this->db->prepare("SELECT DISTINCT p.* FROM piatti p JOIN composizioni c ON p.id = c.id_piatto JOIN menu m ON c.id_menu = m.id WHERE m.id_mensa = ? ORDER BY p.nome ASC;");
        $stmt->bind_param("i", $canteenId);
        $stmt->execute();
        $result = $stmt->get_result();

        $list = array();
        foreach ($result->fetch_all(MYSQLI_ASSOC) as $d) {
            array_push($list, new Dish($d["id"], $d["nome"], $d["descrizione"], $d["prezzo"], $d["img"]));
        }
        return $list;
    }
}
?>