<?php
$host="localhost";
$username="root";
$password="";
$database="uas";

//membuat koneksi
$koneksi=mysqli_connect($host, $username, $password, $database);
//mysqli_connect adalah nama fungsi php untuk menjalankan argumen agar terkoneksi ke server mysql dan atau database.

//cek koneksi
if (!$koneksi) {
	//error
	//Die() adalah digunakan untuk menghentikan eksekusi skrip, menghentikan skrip sebelum mengeksekusi kode yang mungkin akan menyebabkan error masalah lebih lanjut.
	die("Koneksi gagal: " .  mysqli_connect_error());	
	//fungsi mysqli_connect_error() PHP yang digunakan untuk mengecek kesalahan saat mencoba menghubungkan ke server 
}
?>