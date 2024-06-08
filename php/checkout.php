<?php

require 'session/session.php';

require __DIR__ . '/library/function.php';

$id_pengguna = $_SESSION['id_pengguna'];

require __DIR__ . '/library/query.php';

$id_detail_keranjang = mysqli_query($conn, $query);

$id_dk = mysqli_query($conn, $query);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../Style/style-checkout.css">
    <title>Document</title>
</head>

<body>
    <header>
        <nav>
            <a href="index.php" style="text-decoration: none;" class="brand-link">
                <div class="brand">
                    <p>ElecTrons</p>
                </div>
            </a>
        </nav>
    </header>

    <main>
        <div class="container-alamat">
            <div id="alamat-pengiriman">
                <h2>Alamat Pengiriman</h2>
                <p id="alamat-tersimpan"></p>
                <a href="alamat.php"><button id="btn-tambah-alamat">Tambahkan Alamat</button></a>
            </div>

            <div class="product-check">
                <div class="container-product-check">
                    <p>Produk Dipesan</p>
                    <div class="label-produk">
                        <label>Harga</label>
                        <label>Jumlah</label>
                        <label>Total</label>
                    </div>

                    <?php while ($row = mysqli_fetch_assoc($id_detail_keranjang)): ?>
                    <div class="produk-dipesan">

                        <img src="../Image/5.png">

                        <div class="produk-checkout">
                            <div class="detail-produk">
                                <h3><?=$row['company'] . ' ' . $row['product']?></h3>
                                <p><?=$row['cpu']?></p>
                            </div>

                            <div class="detail-lainnya">
                            <?php
$angka = $row['price'];
$format_uang = number_format($angka, 0, ',', '.');

?>
                                <div class="harga">
                                    <p><?="Rp. " . $format_uang?></p>
                                </div>
                                <div class="jumlah">
                                    <p><?=$row['jumlah']?></p>
                                </div>
                                <?php
$total_harga = $row['price'] + $row['jumlah'];
$angka1 = $row['price'];
$format_uang_total_harga = number_format($angka1, 0, ',', '.');

?>
                                <div class="total">
                                    <p><?="Rp. " . $format_uang_total_harga?></p>
                                </div>
                            </div>

                        </div>
                    </div>
                    <?php endwhile;?>

                    <div class="voucher">
                        <div class="button-voucher">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="21" viewBox="0 0 25 21"
                                fill="none">
                                <path
                                    d="M2.5 0.5C1.83696 0.5 1.20107 0.763392 0.732233 1.23223C0.263392 1.70107 0 2.33696 0 3V8C0.663041 8 1.29893 8.26339 1.76777 8.73223C2.23661 9.20107 2.5 9.83696 2.5 10.5C2.5 11.163 2.23661 11.7989 1.76777 12.2678C1.29893 12.7366 0.663041 13 0 13V18C0 18.663 0.263392 19.2989 0.732233 19.7678C1.20107 20.2366 1.83696 20.5 2.5 20.5H22.5C23.163 20.5 23.7989 20.2366 24.2678 19.7678C24.7366 19.2989 25 18.663 25 18V13C24.337 13 23.7011 12.7366 23.2322 12.2678C22.7634 11.7989 22.5 11.163 22.5 10.5C22.5 9.83696 22.7634 9.20107 23.2322 8.73223C23.7011 8.26339 24.337 8 25 8V3C25 2.33696 24.7366 1.70107 24.2678 1.23223C23.7989 0.763392 23.163 0.5 22.5 0.5H2.5ZM16.875 4.25L18.75 6.125L8.125 16.75L6.25 14.875L16.875 4.25ZM8.5125 4.3C9.7375 4.3 10.725 5.2875 10.725 6.5125C10.725 7.09929 10.4919 7.66205 10.077 8.07697C9.66205 8.4919 9.09929 8.725 8.5125 8.725C7.2875 8.725 6.3 7.7375 6.3 6.5125C6.3 5.92571 6.5331 5.36295 6.94803 4.94803C7.36295 4.5331 7.92571 4.3 8.5125 4.3ZM16.4875 12.275C17.7125 12.275 18.7 13.2625 18.7 14.4875C18.7 15.0743 18.4669 15.6371 18.052 16.052C17.6371 16.4669 17.0743 16.7 16.4875 16.7C15.2625 16.7 14.275 15.7125 14.275 14.4875C14.275 13.9007 14.5081 13.338 14.923 12.923C15.338 12.5081 15.9007 12.275 16.4875 12.275Z"
                                    fill="#FFB800" />
                            </svg>
                            <p>Voucher</p>
                        </div>

                        <div class="voucher-digunakan">
                            <label>Voucher Potongan Rp300.000</label>
                            <p>Digunakan</p>
                        </div>
                    </div>

                </div>
            </div>

            <div class="container-detail-checkout">
                <div class="metode-pembayaran">
                    <p>Metode Pembayaran</p>
                    <div class="bank">
                        <div class="bank-select">
                            <img src="../Image/BANK/BRI.png">
                        </div>
                        <div class="bank-select">
                            <img src="../Image/BANK/Group 76.png">
                        </div>
                        <div class="bank-select">
                            <img src="../Image/BANK/Group 77.png">
                        </div>
                        <div class="bank-select">
                            <img src="../Image/BANK/Group 78.png">
                        </div>
                        <div class="bank-select">
                            <img src="../Image/BANK/Layer 1.png">
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-detail-checkout-all">

            <?php $total_pembayaran = 0?>
                <?php while ($rows = mysqli_fetch_assoc($id_dk)): ?>
                <div class="detail-checkout">
                    <div class="title-detail-checkout">
                        <p>Sutotal Produk</p>
                        <p>Potongan Voucher</p>
                        <p>Total Pembayaran</p>
                    </div>

                    <div class="jumlah-detail-checkout-all">

                    <?php
$angka1 = $rows['price'];
$format_angka1 = number_format($angka1, 0, ',', '.');
$total_harga = $rows['price'] * $rows['jumlah'];
$format_uang_total_harga = number_format($total_harga, 0, ',', '.');

?>
                        <p><?="Rp. " . $format_angka1?></p>
                        <p>Rp 0</p>
                        <label><?="Rp. " . $format_uang_total_harga?></label>
                    </div>


                </div>
                <?php $total_pembayaran += $total_harga?>
                <?php endwhile;?>
            </div>

            <div class="checkout-out">
                <div class="button-checkout">
                    <form action="pembayaran.php" method="post">
                        <p>Dengan melanjutkan, Saya setuju dengan Syarat & ketentuan yang berlaku</p>

                        <input type="hidden" name="total_pembayaran" value="<?=$total_pembayaran?>">
                        <button id="btn-bayar">Bayar</button>
                    </form>
                </div>
            </div>

            <script src="../Js/coba.js"></script>
            <script src="../Js/Scrip.js"></script>
            <script>
                function sendBank(data) {

                }
            </script>
        </div>
    </main>
</body>

</html>