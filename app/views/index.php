<?php
    require_once __DIR__ . '/../controllers/SupplierController.php';
    require_once __DIR__ . '/../controllers/ProductController.php';

    $supplierController = new SupplierController();
    $suppliers = $supplierController->index();
    $productController = new ProductController();
    $products = $productController->index();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Supplier & Product Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-4">
        <h1 class="text-primary">Suppliers</h1>
        <a href="./suppliers/create.php" class="btn btn-success mb-3">Tambah Suplier</a>

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Kontak</th>
                        <th>Operasi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($suppliers)): ?>
                    <?php foreach ($suppliers as $supplier): ?>
                    <tr>
                        <td><?= htmlspecialchars($supplier['id']); ?></td>
                        <td><?= htmlspecialchars($supplier['name']); ?></td>
                        <td><?= htmlspecialchars($supplier['contact']); ?></td>
                        <td>
                            <a href="./suppliers/update.php?id=<?= $supplier['id'] ?>"
                                class="btn btn-warning btn-sm">Edit</a>
                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                data-bs-target="#deleteModal<?= $supplier['id'] ?>">Hapus</button>
                        </td>
                    </tr>

                    <div class="modal fade" id="deleteModal<?= $supplier['id'] ?>" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Confirm Delete</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to delete supplier
                                    <b><?= htmlspecialchars($supplier['name']) ?></b>?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cancel</button>
                                    <a href="../controllers/SupplierController.php?action=delete&id=<?= $supplier['id'] ?>"
                                        class="btn btn-danger">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php endforeach; ?>
                    <?php else: ?>
                    <tr>
                        <td colspan="4" class="text-center">Tidak ada suplier</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <h1 class="text-primary mt-5">Products</h1>
        <a href="./products/create.php" class="btn btn-success mb-3">Tambah Produk</a>

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Supplier ID</th>
                        <th>Operasi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($products)): ?>
                    <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?= htmlspecialchars($product['id']); ?></td>
                        <td><?= htmlspecialchars($product['name']); ?></td>
                        <td><?= htmlspecialchars($product['supplier_id']); ?></td>
                        <td>
                            <a href="./products/update.php?id=<?= $product['id'] ?>"
                                class="btn btn-warning btn-sm">Edit</a>
                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                data-bs-target="#deleteModalProduct<?= $product['id'] ?>">Hapus</button>
                        </td>
                    </tr>

                    <div class="modal fade" id="deleteModalProduct<?= $product['id'] ?>" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Confirm Delete</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to delete product
                                    <b><?= htmlspecialchars($product['name']) ?></b>?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cancel</button>
                                    <a href="../controllers/ProductController.php?action=delete&id=<?= $product['id'] ?>"
                                        class="btn btn-danger">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php endforeach; ?>
                    <?php else: ?>
                    <tr>
                        <td colspan="4" class="text-center">Tidak ada produk</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>