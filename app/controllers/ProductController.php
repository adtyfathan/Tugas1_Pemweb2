<?php
require_once __DIR__ . '/../models/Product.php';

class ProductController {
    private $productModel;

    public function __construct() {
        $this->productModel = new Product();
    }

    public function index() {
        $products = $this->productModel->getAllProducts();
        return $products;
    }

    public function getProduct($id){
        $product = $this->productModel->getProductById($id);
        return $product;
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->productModel->createProduct($_POST['name'], $_POST['supplier_id']);
            header("Location: ../views/index.php");
        } else {
            include __DIR__ . '../views/products/create.php';
        }
    }

     public function update() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
            $id = $_POST['id'];
            $this->productModel->updateProduct($id, $_POST['name'], $_POST['supplier_id']);
            header("Location: ../views/index.php");
            exit();
        } else {
            if (!isset($_GET['id'])) {
                echo "Invalid request.";
                exit();
            }
            $id = $_GET['id'];
            $product = $this->getProduct($id);
            include __DIR__ . '/../views/products/update.php';
        }
    }

    public function delete() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $this->productModel->deleteProduct($id);
            header("Location: ../views/index.php");
            exit();
        } else {
            echo "Invalid ID.";
            exit();
        }
    }
}

$controller = new ProductController();

if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'create':
            $controller->create();
            break;
        case 'update':
            $controller->update();
            break;
        case 'delete':
            $controller->delete();  
            break;
        default:
            echo "Invalid action.";
    }
}