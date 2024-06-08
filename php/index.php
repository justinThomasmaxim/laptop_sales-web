<?php

require 'session/session.php';

require_once __DIR__ . '/library/function.php';

$laptops = query("SELECT * FROM dataset_laptop_new");

if (isset($_GET['terapkan'])) {
    $laptops = cari_SesuaiBatasHarga($_GET);
}

if (isset($_GET['merk'])) {
    $laptops = cari_SesuaiMerk($_GET);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="../Style/style.css">
    <link rel="stylesheet" type="text/css" href="../Style/chat-bot.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>ElecTrons | Beranda</title>
</head>

<body>
    <nav>
        <a href="index.php" class="brand-link">
            <div class="brand">
                <p>ElecTrons</p>
            </div>
        </a>
        <div class="search">
            <input type="text" placeholder="Search" id="search"/>
        </div>
        <div class="nav-right">
            <a href="Tabel.php" class="Tabel"><i class="fa-solid fa-table"></i></a>
            <button class="ai-btn"><img src="../image/gemini.png" alt=""></button>
            <!-- <button class="notif">
                <svg xmlns="http://www.w3.org/2000/svg" width="27" height="30" viewBox="0 0 27 30" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M18.0312 26.8421C18.0315 27.6388 17.7436 28.4062 17.2254 28.9903C16.7072 29.5745 15.997 29.9324 15.237 29.9921L15.0105 30H11.9898C11.2277 30.0003 10.4936 29.6994 9.93483 29.1576C9.37603 28.6159 9.03374 27.8734 8.97658 27.0789L8.96903 26.8421H18.0312ZM13.5001 1.50642e-09C16.2414 -4.72817e-05 18.8755 1.11299 20.8469 3.10433C22.8182 5.09567 23.9726 7.80961 24.0666 10.6737L24.0727 11.0526V16.9958L26.8245 22.7495C26.9446 23.0005 27.0047 23.2783 26.9997 23.5589C26.9947 23.8396 26.9246 24.1147 26.7956 24.3609C26.6666 24.6071 26.4824 24.8169 26.2589 24.9724C26.0353 25.1279 25.7791 25.2244 25.512 25.2537L25.3383 25.2632H1.66189C1.39329 25.2632 1.12868 25.1952 0.890731 25.065C0.652779 24.9347 0.448584 24.7461 0.295642 24.5153C0.1427 24.2845 0.0455714 24.0183 0.0125804 23.7396C-0.0204107 23.461 0.0117192 23.1781 0.106216 22.9153L0.175693 22.7495L2.92758 16.9958V11.0526C2.92758 8.12129 4.04146 5.31001 6.0242 3.23724C8.00694 1.16447 10.6961 1.50642e-09 13.5001 1.50642e-09ZM13.5001 3.15789C11.5541 3.15801 9.68319 3.94349 8.27762 5.35052C6.87205 6.75754 6.04031 8.6775 5.95585 10.71L5.9483 11.0526V16.9958C5.94832 17.3874 5.87866 17.7756 5.74289 18.1405L5.62962 18.4089L3.86249 22.1053H23.1393L21.3721 18.4074C21.2045 18.0573 21.1005 17.6777 21.0655 17.2879L21.0519 16.9958V11.0526C21.0519 8.95882 20.2563 6.95076 18.8401 5.47021C17.4238 3.98966 15.503 3.15789 13.5001 3.15789Z"
                        fill="#6B6B6B" />
                </svg>
            </button> -->
            <button class="cart">
                <a href="keranjang.php">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28" fill="none">
                        <path
                            d="M22.4 22.4C23.1426 22.4 23.8548 22.695 24.3799 23.2201C24.905 23.7452 25.2 24.4574 25.2 25.2C25.2 25.9426 24.905 26.6548 24.3799 27.1799C23.8548 27.705 23.1426 28 22.4 28C21.6574 28 20.9452 27.705 20.4201 27.1799C19.895 26.6548 19.6 25.9426 19.6 25.2C19.6 23.646 20.846 22.4 22.4 22.4ZM0 0H4.578L5.894 2.8H26.6C26.9713 2.8 27.3274 2.9475 27.59 3.21005C27.8525 3.4726 28 3.8287 28 4.2C28 4.438 27.93 4.676 27.832 4.9L22.82 13.958C22.344 14.812 21.42 15.4 20.37 15.4H9.94L8.68 17.682L8.638 17.85C8.638 17.9428 8.67487 18.0318 8.74051 18.0975C8.80615 18.1631 8.89517 18.2 8.988 18.2H25.2V21H8.4C7.65739 21 6.9452 20.705 6.4201 20.1799C5.895 19.6548 5.6 18.9426 5.6 18.2C5.6 17.71 5.726 17.248 5.936 16.856L7.84 13.426L2.8 2.8H0V0ZM8.4 22.4C9.14261 22.4 9.8548 22.695 10.3799 23.2201C10.905 23.7452 11.2 24.4574 11.2 25.2C11.2 25.9426 10.905 26.6548 10.3799 27.1799C9.8548 27.705 9.14261 28 8.4 28C7.65739 28 6.9452 27.705 6.4201 27.1799C5.895 26.6548 5.6 25.9426 5.6 25.2C5.6 23.646 6.846 22.4 8.4 22.4ZM21 12.6L24.892 5.6H7.196L10.5 12.6H21Z"
                            fill="#6B6B6B" />
                    </svg>
                </a>
            </button>
            <div class="profil">
                <i class="fa-regular fa-user"></i>
            </div>
        </div>
    </nav>

    <div class="ai hide">
        <div class="head">Chat Bot</div>
        <div class="chat-room">
            <div class="chat-box user-box">
                <p class="user">...</p>
            </div>
            <div class="chat-box bot-box">
                <p class="bot"></p>
            </div>
        </div>
        <form action="" id="form-ai">
            <input type="text" name="prompt" class="prompt" placeholder="Tuliskan pesan anda disini...">
            <button id="send-btn">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);"><path d="m21.426 11.095-17-8A.999.999 0 0 0 3.03 4.242L4.969 12 3.03 19.758a.998.998 0 0 0 1.396 1.147l17-8a1 1 0 0 0 0-1.81zM5.481 18.197l.839-3.357L12 12 6.32 9.16l-.839-3.357L18.651 12l-13.17 6.197z"></path></svg>
                <!-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="m21.426 11.095-17-8A.999.999 0 0 0 3.03 4.242L4.969 12 3.03 19.758a.998.998 0 0 0 1.396 1.147l17-8a1 1 0 0 0 0-1.81zM5.481 18.197l.839-3.357L12 12 6.32 9.16l-.839-3.357L18.651 12l-13.17 6.197z"></path></svg> -->
            </button>
        </form>
    </div>

    <main>
        <div class="carousel">
            <div class="carousel-container">
                <div class="carousel-item">
                    <img src="../Image/1.png">
                </div>
                <div class="carousel-item">
                    <img src="../Image/2.png">
                </div>
                <div class="carousel-item">
                    <img src="../Image/3.png">
                </div>
                <div class="carousel-item">
                    <img src="../Image/4.png">
                </div>
            </div>
        </div>

        <div class="container">
            <div class="brand-lap">
                <div class="img1" onclick="sendDataMerk('acer')">
                <!-- <div class="img1"> -->
                    <img src="../Image/acer.png">
                </div>

                <div class="img2" onclick="sendDataMerk('asus')">
                    <img src="../Image/asus.png">
                </div>

                <div class="img3" onclick="sendDataMerk('dell')">
                    <img src="../Image/dell.png">
                </div>

                <div class="img4" onclick="sendDataMerk('hp')">
                    <img src="../Image/hp.png">
                </div>

                <div class="img5" onclick="sendDataMerk('apple')">
                    <img src="../Image/ipon.png">
                </div>

                <div class="img6" onclick="sendDataMerk('lenovo')">
                    <img src="../Image/lenovo.png">
                </div>

                <div class="img7" onclick="sendDataMerk('msi')">
                    <img src="../Image/masi.png">
                </div>

            </div>

            <div class="filter">
                <ul class="kategori">


                <ul class="batas-harga">
                    <p>Batas Harga</p>
                    <form action="" method="get">

                        <input type="number" name="Min" placeholder="Min" required>
                        <input type="number" name="Max" placeholder="Max" required>
                        <button type="submit" name="terapkan">Terapkan</button>
                    </form>
                </ul>


            </div>


            <div class="product" id="product">

                <?php foreach ($laptops as $laptop): ?>

                <div class="card">
                    <a href="produk.php?id_laptop=<?=$laptop['id_laptop']?>">
                        <img src="../Image/LAP1.png">

                        <h3><?=$laptop['company'] . ' ' . $laptop['product']?>
                    
                    
                     </h3>
                        <?php
$angka = $laptop['price'];
$format_uang = number_format($angka, 0, ',', '.');

?>
                        <span><?="Rp. " . $format_uang?></span>
                        <div class="bintang">
                            <svg xmlns="http://www.w3.org/2000/svg" width="98" height="15" viewBox="0 0 98 15"
                                fill="none">
                                <path
                                    d="M7.5 0L9.18386 5.18237H14.6329L10.2245 8.38525L11.9084 13.5676L7.5 10.3647L3.09161 13.5676L4.77547 8.38525L0.367076 5.18237H5.81614L7.5 0Z"
                                    fill="#80FF00" />
                                <path
                                    d="M28 0L29.7961 5.18237H35.6085L30.9062 8.38525L32.7023 13.5676L28 10.3647L23.2977 13.5676L25.0938 8.38525L20.3915 5.18237H26.2039L28 0Z"
                                    fill="#80FF00" />
                                <path
                                    d="M49 0L50.7961 5.18237H56.6085L51.9062 8.38525L53.7023 13.5676L49 10.3647L44.2977 13.5676L46.0938 8.38525L41.3915 5.18237H47.2039L49 0Z"
                                    fill="#80FF00" />
                                <path
                                    d="M70 0L71.7961 5.18237H77.6085L72.9062 8.38525L74.7023 13.5676L70 10.3647L65.2977 13.5676L67.0938 8.38525L62.3915 5.18237H68.2039L70 0Z"
                                    fill="#80FF00" />
                                <path
                                    d="M90.5 0L92.1839 5.18237H97.6329L93.2245 8.38525L94.9084 13.5676L90.5 10.3647L86.0916 13.5676L87.7755 8.38525L83.3671 5.18237H88.8161L90.5 0Z"
                                    fill="#80FF00" />
                            </svg>
                            <p>500 terjual</p>
                        </div>
                    </a>
                </div>
                <?php endforeach;?>

            </div>
    </main>



    <script src="../Js/chatGemini.js" type="module"></script>
    <script src="../Js/Scrip.js"></script>

    <script>
    function sendDataMerk(data) {
        // Anda bisa mengarahkan pengguna ke URL dengan data yang ingin dikirimkan

        window.location.href = 'index.php?merk=' + data;



        // Atau Anda bisa menggunakan AJAX untuk mengirim data tanpa mengarahkan halaman
        /*
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'contoh.php?brand=' + data, true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Handle response dari server jika diperlukan
            }
        };
        xhr.send();
        */
    }
</script>
</body>

</html>
