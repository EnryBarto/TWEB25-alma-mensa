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

    public function getCanteens() {
        $stmt = $this->db->prepare("SELECT m.*, r.media_voti, c.nome AS categoria FROM mense AS m JOIN (SELECT id_mensa, AVG(voto) as media_voti FROM `recensioni` GROUP BY id_mensa) AS r ON m.id = r.id_mensa JOIN categorie c ON m.id_categoria = c.id;");
        $stmt->execute();
        $result = $stmt->get_result();

        $list = array();
        foreach ($result->fetch_all(MYSQLI_ASSOC) as $c) {
            array_push($list, new Canteen($c["id"], $c["email"], $c["nome"], $c["descrizione"], $c["ind_civico"], $c["ind_via"], $c["ind_comune"], $c["ind_cap"], $c["coo_latitudine"], $c["coo_longitudine"], $c["num_posti"], $c["immagine"], $c["categoria"], $c["media_voti"]));
        }
        return $list;
    }
}
?>