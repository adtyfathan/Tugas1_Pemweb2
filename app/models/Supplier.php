<?php
require_once __DIR__ . '/../../config/database.php';

class Supplier {
    private $pdo;

    public function __construct() {
        $this->pdo = Database::getInstance()->getConnection();
    }

    public function getAllSuppliers() {
        $stmt = $this->pdo->query("SELECT * FROM suppliers");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createSupplier($name, $contact) {
        $stmt = $this->pdo->prepare("INSERT INTO suppliers (name, contact) VALUES (?, ?)");
        return $stmt->execute([$name, $contact]);
    }

    public function getSupplierById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM suppliers WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateSupplier($id, $name, $contact) {
        $stmt = $this->pdo->prepare("UPDATE suppliers SET name=?, contact=? WHERE id=?");
        return $stmt->execute([$name, $contact, $id]);
    }

    public function deleteSupplier($id) {
        $stmt = $this->pdo->prepare("DELETE FROM suppliers WHERE id = ?");
        return $stmt->execute([$id]);
    }

}