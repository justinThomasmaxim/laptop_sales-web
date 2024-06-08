<?php

require_once '../php/library/function.php';

// data didapatkan dari ajax yang dikirimkan dengan method GET
$search = $_GET['search'];

$query = "SELECT * FROM dataset_laptop_new
            WHERE
            company LIKE '%$search' OR
            product LIKE '$search%'
            ";

$laptops = query($query);

?>

<?php foreach ($laptops as $laptop): ?>

<div class="card">
    <a href="produk.php?id_laptop=<?=$laptop['id_laptop']?>">
        <img src="../Image/LAP1.png">

        <h3><?=$laptop['company'] . ' ' . $laptop['product']?> </h3>
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
