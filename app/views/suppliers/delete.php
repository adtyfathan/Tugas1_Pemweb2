<?php
require_once __DIR__ . '/../../controllers/SupplierController.php';

if (isset($_GET['id'])) {
    $controller = new SupplierController();
    $controller->delete();
} else {
    echo "Invalid request.";
}
?>