<?php
require_once __DIR__ . '/../../controllers/ProductController.php';

if (isset($_GET['id'])) {
    $controller = new ProductController();
    $controller->delete();
} else {
    echo "Invalid request.";
}
?>