<?php
require_once 'config/db.php';

class Member {
    private $db;

    public function __construct() {
        $this->db = (new Database())->conn;
    }

    public function getAllMembers() {
        $stmt = $this->db->query("SELECT * FROM members");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function InputMember($nama, $email, $notelp) {
        $this->db->query("INSERT INTO members VALUES(null, '$nama', '$email', '$notelp')");
    }

    public function UpdateMember($id, $nama, $email, $notelp) {
        $this->db->query("UPDATE members SET name = '$nama', email = '$email', phone = '$notelp' WHERE id = $id");
    }
}
?>