<?php
require_once __DIR__ . '/../../controllers/ProductController.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $productController = new ProductController();
    $product = $productController->getProduct($id);
} 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white text-center">
                        <h3>Update Produk</h3>
                    </div>
                    <div class="card-body p-4">
                        <form action="../../controllers/ProductController.php?action=update" method="POST">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($product['id'] ?? '') ?>">

                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Produk</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Nama Produk"
                                    value="<?= htmlspecialchars($product['name'] ?? '') ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="supplier_id" class="form-label">ID Supplier</label>
                                <input type="text" name="supplier_id" id="supplier_id" class="form-control"
                                    placeholder="ID Supplier"
                                    value="<?= htmlspecialchars($product['supplier_id'] ?? '') ?>" required>
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="../index.php" class="btn btn-secondary">Kembali</a>
                                <button type="submit" name="submit" class="btn btn-success">Update Produk</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>