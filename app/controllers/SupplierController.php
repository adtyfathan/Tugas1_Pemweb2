<?php
require_once __DIR__ . '/../models/Supplier.php';

class SupplierController {
    private $supplierModel;

    public function __construct() {
        $this->supplierModel = new Supplier();
    }

    public function index() {
        $suppliers = $this->supplierModel->getAllSuppliers();
        return $suppliers;
    }

    public function getSupplier($id){
        $supplier = $this->supplierModel->getSupplierById($id);
        return $supplier;
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->supplierModel->createSupplier($_POST['name'], $_POST['contact']);
            header("Location: ../views/index.php");
        } else {
            include __DIR__ . '../views/suppliers/create.php';
        }
    }

     public function update() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
            $id = $_POST['id'];
            $this->supplierModel->updateSupplier($id, $_POST['name'], $_POST['contact']);
            header("Location: ../views/index.php");
            exit();
        } else {
            if (!isset($_GET['id'])) {
                echo "Invalid request.";
                exit();
            }
            $id = $_GET['id'];
            $supplier = $this->getSupplier($id);
            include __DIR__ . '/../views/suppliers/update.php';
        }
    }

    public function delete() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $this->supplierModel->deleteSupplier($id);
            header("Location: ../views/index.php");
            exit();
        } else {
            echo "Invalid ID.";
            exit();
        }
    }
}

$controller = new SupplierController();

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