<?php

require 'session/session.php';

require __DIR__ . '/library/function.php';

$id_pengguna = $_SESSION['id_pengguna'];

$query = "SELECT * FROM detail_pengguna WHERE id_pengguna = '$id_pengguna'";

$dp = mysqli_query($conn, $query);

// Memeriksa apakah hasil query tidak null sebelum mengambil nilainya
$detail_pengguna = mysqli_fetch_assoc($dp);

if ($dp && mysqli_num_rows($dp) > 0) {
    if (isset($_POST['submit'])) {
        if (ubahDetailPengguna($id_pengguna, $_POST) > 0) {
            echo "
                <script>
                    alert('Alamat pengiriman berhasil diubah');
                    document.location.href = 'checkout.php';
                </script>
            ";
        }
    }

} else {
    $detail_pengguna['nama_pengguna'] = '';
    $detail_pengguna['no_telp'] = '';
    $detail_pengguna['alamat'] = '';
    $detail_pengguna['kota'] = '';

    if (isset($_POST['submit'])) {
        if (tambahDetailPengguna($id_pengguna, $_POST) > 0) {
            echo "
                <script>
                    alert('Alamat pengiriman berhasil ditambahkan');
                    document.location.href = 'checkout.php';
                </script>
            ";
        }
    }

}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../Style/style-alamat.css">
    <title>Document</title>
</head>

<body>
    <div class="container-alamat">
        <div class="bg-alamat">

            <div class="title">
                <h2>Alamat Pengiriman</h2>
            </div>
            <div class="alamat">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" id="nama" name="nama_pengguna" value="<?=$detail_pengguna['nama_pengguna']?>" required>
                        <label for="no-telp">No. Telp</label>
                        <input type="text" id="no-telp" name="no_telp"  value="<?=$detail_pengguna['no_telp']?>" required>
                        <label for="alamat">Alamat</label>
                        <input type="text" id="alamat" name="alamat"  value="<?=$detail_pengguna['alamat']?>" required>
                        <label for="kota">Kota</label>
                        <input type="text" id="kota" name="kota"  value="<?=$detail_pengguna['kota']?>" required>
                    </div>
                    <div class="simpan-alamat">
                        <button type="submit" name="submit">Simpan</button>
                    </div>
                </form>

            </div>
        </div>
    </div>



    <script src="../Js/Scrip.js"></script>
</body>

</html>
