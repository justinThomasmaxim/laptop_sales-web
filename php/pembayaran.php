<?php

require 'session/session.php';

require __DIR__ . '/library/function.php';

$id_pengguna = $_SESSION['id_pengguna'];

require __DIR__ . '/library/query.php';

$keranjang = mysqli_query($conn, $query);

$total_pembayaran = $_POST['total_pembayaran'];

if (isset($_POST['konfirmasi'])) {
    if (tambahPenjualan($id_pengguna, $keranjang) > 0) {
        echo "
            <script>
                alert('Pembayaran selesai');
                document.location.href = 'index.php';
            </script>
        ";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Style/pembayaran.css">
    <title>Document</title>
</head>

<body>
    <section class="container-pembayaran">
        <div class="pembayaran">
            <div class="content">
                <p>Bayar Sekarang</p>

                <div class="batas-waktu">
                    <p>Batas Waktu Pembayaran</p>
                    <span id="waktu-sisa"></span>
                </div>

                <div class="rekening">
                    <img src="../Image/BANK/BRI.png" alt="">
                    <p><?=$id_pengguna?></p>
                </div>

                <div class="total-pembayaran">
                    <p>Total yang harus dibayarkan</p>
                    <?php

$format_total_pembayaran = number_format($total_pembayaran, 0, ',', '.');
?>

                    <span><?="Rp. " . $format_total_pembayaran?></span>
                </div>

                <div class="btn-pembayaran">
                    <form action="" method="post">
                        <button type="submit" name="konfirmasi">Konfirmasi</button>
                    </form>
                    <p>Laman ini akan otomatis tertutup saat pembayaran di konfirmasi</p>
                </div>
    </section>


    <script src="../Js/pembayaran.js"></script>
</body>

</html>
