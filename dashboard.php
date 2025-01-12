<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendataan Barang di Toko</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: url('back.jpg') center/cover no-repeat fixed;
            font-family: 'Arial', sans-serif;
        }
        .container {
            margin-top: 40px;
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }
        h1, h2 {
            color: #007BFF;
        }
        .logout-link {
            color: #dc3545;
            text-decoration: none;
            font-weight: bold;
        }
        .logout-link:hover {
            text-decoration: underline;
        }
        .table {
            border-radius: 8px;
            overflow: hidden;
        }
        .btn-danger {
            background-color: #dc3545;
            border: none;
        }
        .btn-danger:hover {
            background-color: #b02a37;
        }
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.15);
        }
    </style>
</head>
<body>
    <?php
    session_start();
    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit;
    }
    echo "<div class='container'><h1>Welcome: {$_SESSION['username']}</h1>";
    ?>
    <a href="logout.php" class="logout-link mb-4 d-block">Logout</a>

    <div class="row">
        <div class="col-lg-6 mb-4">
            <h2>Tambah Barang</h2>
            <div class="card p-4">
                <form action="add_barang.php" method="POST">
                    <div class="mb-3">
                        <input type="text" name="nama_barang" placeholder="Nama Barang" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" name="harga" placeholder="Harga" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <input type="number" name="stok" placeholder="Stok" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <select name="kategori_id" class="form-control" required>
                            <option value="">Pilih Kategori</option>
                            <?php
                            include "connection.php";
                            $kategori = $dbh->query("SELECT * FROM kategori");
                            while ($row = $kategori->fetch(PDO::FETCH_ASSOC)) {
                                echo "<option value='{$row['id']}'>{$row['nama_kategori']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Tambah Barang</button>
                </form>
            </div>
        </div>

        <div class="col-lg-6 mb-4">
            <h2>Tambah Kategori</h2>
            <div class="card p-4">
                <form action="add_kategori.php" method="POST">
                    <div class="mb-3">
                        <input type="text" name="nama_kategori" placeholder="Nama Kategori" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Tambah Kategori</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Tabel Barang -->
    <h2>Daftar Barang</h2>
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                try {
                    $stmt = $dbh->query("SELECT barang.*, kategori.nama_kategori FROM barang 
                                        JOIN kategori ON barang.kategori_id = kategori.id");
                    $no = 1;
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr>
                                <td>{$no}</td>
                                <td>{$row['nama_barang']}</td>
                                <td>{$row['harga']}</td>
                                <td>{$row['stok']}</td>
                                <td>{$row['nama_kategori']}</td>
                                <td>
                                    <a href='delete_barang.php?id={$row['id']}' class='btn btn-danger btn-sm'>Hapus</a>
                                </td>
                            </tr>";
                        $no++;
                    }
                } catch (PDOException $e) {
                    echo "<tr><td colspan='5'>Error: {$e->getMessage()}</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Tabel Kategori -->
    <h2>Daftar Kategori</h2>
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="table-success">
                <tr>
                    <th>No</th>
                    <th>Nama Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                try {
                    $stmt = $dbh->query("SELECT * FROM kategori");
                    $no = 1;
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr>
                                <td>{$no}</td>
                                <td>{$row['nama_kategori']}</td>
                                <td>
                                    <a href='delete_kategori.php?id={$row['id']}' class='btn btn-danger btn-sm'>Hapus</a>
                                </td>
                            </tr>";
                        $no++;
                    }
                } catch (PDOException $e) {
                    echo "<tr><td colspan='3'>Error: {$e->getMessage()}</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
