<?php

require 'connect.php';

function query($query): array
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// PEMBELIAN LAPTOP

function tambah($data)
{
    global $conn;

    $id_user = $data["id_user"];
    $id_laptop = $data["id_laptop"];
    $jumlah_pembelian = $data["jumlah_pembelian"];

    $query = "INSERT INTO pembelian_laptop (id_user, id_laptop, jumlah_pembelian)
    VALUES ('$id_user', '$id_laptop', '$jumlah_pembelian')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus($id_detail_keranjang)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM detail_keranjang WHERE id_detail_keranjang = $id_detail_keranjang");

    return mysqli_affected_rows($conn);
}

function ubah($id_detail_keranjang, $jumlah)
{
    global $conn;

    $query = "UPDATE detail_keranjang SET
                jumlah = ' $jumlah'
            WHERE id_detail_keranjang = '$id_detail_keranjang'";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}

// KERANJANG
function tambahKeranjang($data)
{
    global $conn;

    $id_pengguna = $data["id_pengguna"];

    $query = "INSERT INTO keranjang (id_pengguna)
    VALUES ('$id_pengguna')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// DETAIL KERANJANG
function tambahDetailKeranjang($data, $hasil)
{
    global $conn;

    $id_produk = $data['id_laptop'];

    $id_keranjang = $hasil['id_keranjang'];

    $jumlah = 1;

    $query = "INSERT INTO detail_keranjang (id_keranjang, id_produk, jumlah)
    VALUES ('$id_keranjang', '$id_produk', '$jumlah')";

    mysqli_query($conn, $query);

}

// PENJUALAN
function tambahPenjualan($id_pengguna, $keranjang)
{
    global $conn;

    while ($i = mysqli_fetch_assoc($keranjang)) {
        // echo $i['id_keranjang'];
        $id_keranjang = $i['id_keranjang'];
        $total_harga = $i['price'] * $i['jumlah'];
        $query = "INSERT INTO penjualan (id_pengguna, id_keranjang, total_harga)
                    VALUES ('$id_pengguna', '$id_keranjang', '$total_harga')";
        mysqli_query($conn, $query);
    }

    return mysqli_affected_rows($conn);

}

// DETAIL PENGGUNA
function tambahDetailPengguna($id_pengguna, $data)
{
    global $conn;

    $nama_pengguna = $data['nama_pengguna'];
    $no_telp = $data['no_telp'];
    $alamat = $data['alamat'];
    $kota = $data['kota'];

    $query = "INSERT INTO detail_pengguna (id_pengguna, nama_pengguna, no_telp, alamat, kota)
                  VALUES ('$id_pengguna', '$nama_pengguna', '$no_telp', '$alamat', '$kota')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function ubahDetailPengguna($id_pengguna, $data)
{
    global $conn;

    $id_detail_pengguna = $id_pengguna;
    $nama_pengguna = $data['nama_pengguna'];
    $no_telp = $data['no_telp'];
    $alamat = $data['alamat'];
    $kota = $data['kota'];

    $query_select = "SELECT * FROM detail_pengguna
                    WHERE id_pengguna = '$id_pengguna'";

    $qs = mysqli_query($conn, $query_select);

    $i = mysqli_fetch_assoc($qs);
    $id_detail_pengguna = $i['id_detail_pengguna'];

    $query = "UPDATE detail_pengguna SET
                id_detail_pengguna = '$id_detail_pengguna',
                id_pengguna = '$id_pengguna',
                nama_pengguna = '$nama_pengguna',
                no_telp = '$no_telp',
                alamat = '$alamat',
                kota = '$kota'
                WHERE id_pengguna = '$id_pengguna'";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// Cari berdasarkan MERK LAPTOP
function cari_SesuaiMerk($data)
{
    $merk = $_GET['merk'];

    $query = "SELECT * FROM dataset_laptop_new
                WHERE company LIKE '$merk'";

    return query($query);
}

// Cari berdasarkan BATAS HARGA
function cari_SesuaiBatasHarga($data)
{
    $min = $_GET['Min'];
    $max = $_GET['Max'];

    $query = "SELECT * FROM dataset_laptop_new
                WHERE price >= '$min' AND price <= '$max'";

    return query($query);
}
