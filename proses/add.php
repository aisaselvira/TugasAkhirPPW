<?php
include '../koneksi/koneksi.php';

$id_pembeli = $_GET['id_pembeli'];
$id_produk = $_GET['produk'];
$id_kategori = $_GET['kategori'];

// Ambil data produk
$result = mysqli_query($conn, "SELECT * FROM produk WHERE id_produk = '$id_produk'");
$row_produk = mysqli_fetch_assoc($result);

// Ambil data kategori
$result_kategori = mysqli_query($conn, "SELECT * FROM kategori WHERE id_kategori = '$id_kategori'");
$row_kategori = mysqli_fetch_assoc($result_kategori);

$nama_produk = $row_produk['nama_produk'];
$gambar_produk = $row_produk['gambar_produk'];
$jenis_kategori = $row_kategori['nama_kategori'];
$harga_produk = $row_produk['harga_produk'];

$insert = mysqli_query($conn, "INSERT INTO wishlist (id_pembeli, id_produk, id_kategori, nama_produk, gambar_produk, jenis_kategori, harga_produk) 
VALUES ('$id_pembeli', '$id_produk', '$id_kategori', '$nama_produk', '$gambar_produk', '$jenis_kategori', $harga_produk)");

if ($insert) {
    echo "
        <script>
        alert('BERHASIL DITAMBAHKAN KE wishlist');
        window.location = '../wishlistt.php';
        </script>
    ";
    die;
} else {
    echo "
        <script>
        alert('GAGAL MENAMBAHKAN KE wishlist');
        window.location = '../wishlistt.php';
        </script>
    ";
    die;
}
?>
