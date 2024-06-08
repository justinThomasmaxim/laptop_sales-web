<?php

$query = "SELECT dk.id_detail_keranjang, dk.id_keranjang, dl.company, dl.product, dl.price, dl.cpu, dk.jumlah
FROM detail_keranjang AS dk
INNER JOIN dataset_laptop_new AS dl ON (dk.id_produk = dl.id_laptop)
INNER JOIN keranjang AS k ON (dk.id_keranjang = k.id_keranjang)
WHERE k.id_pengguna = '$id_pengguna'";
