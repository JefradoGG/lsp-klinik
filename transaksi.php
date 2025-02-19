<?php
$id = $_GET['id'];

include "datadummy.php";

$totalharga = 0;
$pembayaran = 0;
$kembalian = 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $notransaksi = $_POST['notransaksi'] ?? "";
    $namacustomer = $_POST['namacustomer'] ?? "";
    $tanggal = $_POST['tanggal'] ?? "";

    $pembayaran = $_POST['pembayaran'];
    $kembalian = $_POST['kembalian'];
    $jumlah = $_POST['jumlah'];
    $harga = $_POST['harga'];
    $totalharga = $_POST['totalharga'];

    if (isset($_POST['hitung'])) {
        $totalharga = $harga * $jumlah;
    }

    if (isset($_POST['hitungkembalian'])) {
        if ($pembayaran < $totalharga) {
            echo "<script>alert('Uang Tidak Cukup!');</script>";
        } else {
            $kembalian = $pembayaran - $totalharga;
        }
    }

    if (isset($_POST['simpan'])) {
        echo "<script>
        alert('Transaksi berhasil disimpan');
        window.location.href = 'beranda.php'; // Redirect ke halaman beranda
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klinik Perawatan</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet"> <!-- Menggunakan Bootstrap -->
</head> 
<body>

    <!-- Navbar -->
    <nav class="navbar bg-primary navbar-primary shadow">
        <div class="container-fluid">
            <a class="navbar-brand text-white fw-bold" href="#">Klinik Perawatan</a>
            <ul class="navbar-nav d-flex flex-row gap-4">
                <li class="nav-item">
                    <a class="nav-link text-white fw-bold" href="beranda.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white fw-bold" href="#">Transaksi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white fw-bold" href="#">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- End Navbar -->

    <!-- Form Transaksi -->
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <form method="POST">
                            <h2 class="text-center text-primary fw-bold">TRANSAKSI</h2>

                            <!-- Input No Transaksi -->
                            <div class="mb-3">
                                <label class="form-label">No Transaksi</label>
                                <input type="text" class="form-control" name="notransaksi">
                            </div>

                            <!-- Input Nama Customer -->
                            <div class="mb-3">
                                <label class="form-label">Nama Customer</label>
                                <input type="text" class="form-control" name="namacustomer">
                            </div>

                            <!-- Input Tanggal -->
                            <div class="mb-3">
                                <label class="form-label">Tanggal</label>
                                <input type="date" class="form-control" name="tanggal">
                            </div>

                            <!-- Input Pilih Paket -->
                            <div class="mb-3">
                                <label class="form-label">Pilih Perawatan</label>
                                <input type="text" class="form-control" value="<?= $perawatanList[$id][0] ?>" name="pilih" readonly>
                            </div>

                            <!-- Input Harga Paket -->
                            <div class="mb-3">
                                <label class="form-label">Harga Perawatan</label>
                                <input type="text" class="form-control" value="<?= $perawatanList[$id][2] ?>" name="harga" readonly>
                            </div>

                            <!-- Input Jumlah Orang -->
                            <div class="mb-3">
                                <label class="form-label">Jumlah Perawatan</label>
                                <input type="number" class="form-control" name="jumlah" min="1">
                            </div>

                            <!-- Tombol Hitung Total -->
                            <button type="submit" class="btn btn-primary mb-3 mt-3" name="hitung">Hitung Total</button>

                            <!-- Input Total Harga -->
                            <div class="mb-3">
                                <label class="form-label">Total Harga</label>
                                <input type="text" class="form-control" name="totalharga" value="<?= $totalharga ?>" readonly>
                            </div>

                            <!-- Input Pembayaran -->
                            <div class="mb-3">
                                <label class="form-label">Pembayaran</label>
                                <input type="text" class="form-control" name="pembayaran" value="<?= $pembayaran ?>">
                            </div>

                            <!-- Tombol Hitung Kembalian -->
                            <button type="submit" class="btn btn-primary mb-3 mt-3" name="hitungkembalian">Hitung Kembalian</button>

                            <!-- Input Kembalian -->
                            <div class="mb-3">
                                <label class="form-label">Kembalian</label>
                                <input type="text" class="form-control" name="kembalian" value="<?= $kembalian ?>" readonly>
                            </div>

                            <!-- Tombol Simpan -->
                            <button type="submit" class="btn btn-primary mb-3 mt-3" name="simpan">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Font Awesome untuk ikon -->
    <script src="assets/js/bootstrap.min.js" crossorigin="anonymous"></script>
</body>
</html>

<!-- Tantangan -->

<!-- User 2 akun dan pembayaran tidak boleh kurang dari total harga -->