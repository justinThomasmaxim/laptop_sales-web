<?php

require 'session/session.php';

require __DIR__ . '/library/function.php';

$id_pengguna = $_SESSION['id_pengguna'];

require __DIR__ . '/library/query.php';

$id_detail_keranjang = mysqli_query($conn, $query);

if (isset($_POST['delete'])) {
    $id = $_POST['id_detail_keranjang'];

    if (hapus($id) > 0) {
        echo "
            <script>
            alert('Laptop berhasil dihapus pada keranjang');
            document.location.href = 'keranjang.php';
            </script>
            ";
    }
} elseif (isset($_POST['update'])) {

    $id = $_POST['id_detailKeranjang'];
    $jumlah = $_POST['jumlah'];

    if (ubah($id, $jumlah)) {
        echo "
            <script>
            alert('Laptop berhasil diubahs pada keranjang');
            document.location.href = 'keranjang.php';
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

    <link rel="stylesheet" href="../Style/style-keranjang.css">
    <title>Electrons | Cart</title>
</head>

<body>
    <header>
        <nav>
            <a href="index.php" style="text-decoration: none;" class="brand-link">
                <div class="brand">
                    <p>ElecTrons</p>
                </div>
            </a>

            <div class="search">
                <input type="text" placeholder="Search" />
            </div>

            <div class="nav-right">
                <button class="notif">
                    <svg xmlns="http://www.w3.org/2000/svg" width="27" height="30" viewBox="0 0 27 30" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M18.0312 26.8421C18.0315 27.6388 17.7436 28.4062 17.2254 28.9903C16.7072 29.5745 15.997 29.9324 15.237 29.9921L15.0105 30H11.9898C11.2277 30.0003 10.4936 29.6994 9.93483 29.1576C9.37603 28.6159 9.03374 27.8734 8.97658 27.0789L8.96903 26.8421H18.0312ZM13.5001 1.50642e-09C16.2414 -4.72817e-05 18.8755 1.11299 20.8469 3.10433C22.8182 5.09567 23.9726 7.80961 24.0666 10.6737L24.0727 11.0526V16.9958L26.8245 22.7495C26.9446 23.0005 27.0047 23.2783 26.9997 23.5589C26.9947 23.8396 26.9246 24.1147 26.7956 24.3609C26.6666 24.6071 26.4824 24.8169 26.2589 24.9724C26.0353 25.1279 25.7791 25.2244 25.512 25.2537L25.3383 25.2632H1.66189C1.39329 25.2632 1.12868 25.1952 0.890731 25.065C0.652779 24.9347 0.448584 24.7461 0.295642 24.5153C0.1427 24.2845 0.0455714 24.0183 0.0125804 23.7396C-0.0204107 23.461 0.0117192 23.1781 0.106216 22.9153L0.175693 22.7495L2.92758 16.9958V11.0526C2.92758 8.12129 4.04146 5.31001 6.0242 3.23724C8.00694 1.16447 10.6961 1.50642e-09 13.5001 1.50642e-09ZM13.5001 3.15789C11.5541 3.15801 9.68319 3.94349 8.27762 5.35052C6.87205 6.75754 6.04031 8.6775 5.95585 10.71L5.9483 11.0526V16.9958C5.94832 17.3874 5.87866 17.7756 5.74289 18.1405L5.62962 18.4089L3.86249 22.1053H23.1393L21.3721 18.4074C21.2045 18.0573 21.1005 17.6777 21.0655 17.2879L21.0519 16.9958V11.0526C21.0519 8.95882 20.2563 6.95076 18.8401 5.47021C17.4238 3.98966 15.503 3.15789 13.5001 3.15789Z"
                            fill="#6B6B6B" />
                    </svg>
                </button>

                <div class="profil">

                </div>
            </div>
        </nav>
    </header>

    <div class="container-product-cart">
        <div class="produk-terpilih">
            <input type="checkbox" id="select-all-products" />
            <p>Product</p>
            <div class="row">
                <p>Harga</p>
                <p>Total</p>
                <p>Aksi</p>
            </div>
        </div>
    </div>

    <div class="container-product-on-cart">
        <?php while ($row = mysqli_fetch_assoc($id_detail_keranjang)): ?>
            <div class="bg-product">
                <div class="product-select">
                    <input type="checkbox" id="select-products" />
                    <div class="product-image">
                        <img src="../Image/5.png" alt="product" />
                        <p><?=$row['company'] . ' ' . $row['product']?></p>
                    </div>
                </div>
                <div class="detail-product-cart">
                    <?php
$angka = $row['price'];
$format_uang = number_format($angka, 0, ',', '.')
?>
                    <p><?="Rp. " . $format_uang?></p>
                    <p id="price-raw" style="display: none;"><?=$angka?></p>
                </div>

<?php $jumlah_barang_dibeli = $row['jumlah']?>
                <form action="" method="post">
                    <div class="jumlah-product">
                        <div class="counter-box">
                            <div class="minus">-</div>

                            <input type="number" id="jumlah" name="jumlah" value="<?=$jumlah_barang_dibeli?>" min="1">
                            <div class="plus">+</div>
                        </div>

                    </div>
                    <input type="hidden" name="id_detailKeranjang" value="<?=$row['id_detail_keranjang']?>">
                    <button class="update" name="update" onclick="return confirm('Anda ingin melakukan update barang ini?');">Update</button>
                </form>

                <div class="update-delete-product">
                    <form action="" method="post">
                        <input type="hidden" name="id_detail_keranjang" value="<?=$row['id_detail_keranjang']?>">
                        <button class="delete" name="delete" onclick="return confirm('Yakin ingin menghapus barang pada keranjang');">Hapus</button>
                    </form>
                </div>


            </div>
        <?php endwhile;?>

        <div class="container-checkout">
            <div class="bg-checkout">
                <div class="total-harga">
                    <p></p>
                    <p></p>
                </div>

                <div class="button-checkout">

                    <a href="checkout.php">
                        <button class="checkout" name="checkout">Checkout</button>
                    </a>
                </div>
            </div>
        </div>

        <script src="../Js/coba.js"></script>
        <script src="../Js/Scrip.js"></script>
    </div>
</body>
</html>