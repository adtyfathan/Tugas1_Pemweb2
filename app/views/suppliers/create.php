<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Supplier</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white text-center">
                        <h3>Tambah Supplier</h3>
                    </div>
                    <div class="card-body p-4">
                        <form action="../../controllers/SupplierController.php?action=create" method="POST">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Supplier</label>
                                <input type="text" name="name" id="name" class="form-control"
                                    placeholder="Nama Supplier" required>
                            </div>

                            <div class="mb-3">
                                <label for="contact" class="form-label">Kontak</label>
                                <input type="text" name="contact" id="contact" class="form-control" placeholder="Kontak"
                                    required>
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="../index.php" class="btn btn-secondary">Kembali</a>
                                <button type="submit" name="submit" class="btn btn-success">Tambah Supplier</button>
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