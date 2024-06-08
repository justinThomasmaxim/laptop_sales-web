-- Active: 1698482339185@@localhost@3306@database_laptop
USE database_laptop;

DROP TABLE keranjang;

CREATE TABLE keranjang (
    id_keranjang INT PRIMARY KEY AUTO_INCREMENT,
    id_pengguna INT,
    id_laptop INT,
    tanggal DATE DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_pengguna) REFERENCES pengguna (id_pengguna),
    FOREIGN KEY (id_laptop) REFERENCES dataset_laptop_new (id_laptop)
);

CREATE TABLE penjualan (
    id_penjualan INT PRIMARY KEY AUTO_INCREMENT,
    id_pengguna INT,
    id_keranjang INT,
    tanggal DATE DEFAULT CURRENT_TIMESTAMP,
    total_harga DOUBLE,
    FOREIGN KEY (id_pengguna) REFERENCES pengguna (id_pengguna),
CREATE TABLE keranjang (
    id_keranjang INT PRIMARY KEY AUTO_INCREMENT,
    id_pengguna INT,
    id_laptop INT,
    tanggal DATE DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_pengguna) REFERENCES pengguna (id_pengguna),
    FOREIGN KEY (id_laptop) REFERENCES dataset_laptop_new (id_laptop)
);
    FOREIGN KEY (id_keranjang) REFERENCES keranjang (id_keranjang)
);