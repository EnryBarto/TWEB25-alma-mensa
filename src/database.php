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
            $stmt = $this->db->prepare("INSERT INTO utenti (email, password) VALUES (?, ?);");
            $stmt->bind_param("ss", $email, $hashedPassword);
            $stmt->execute();
            $stmt = $this->db->prepare("INSERT INTO clienti (email, name, surname) VALUES (?, ?, ?);");
            $stmt->bind_param("sss", $email, $name, $surname);
            $stmt->execute();
            $this->db->commit();
        } catch (mysqli_sql_exception $e) {
            $this->db->rollback();
            return false;
        }
        return true;
    }
}
?>