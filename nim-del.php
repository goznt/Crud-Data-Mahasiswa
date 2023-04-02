<?php
require "koneksi.php";

//data dari halaman home.php dimasukkan ke dalam variable dgn method GET
$nim=$_GET['id']; 

//user tidak menjadi FK di tabel lain, melanjutkan proses delete
$sql="delete from mahasiswa where (nim = '$nim');";

//eksekusi perintah delete
$del = mysqli_query($koneksi,$sql) or die (mysqli_error($koneksi));

//berhasil delete data user
if ($del){	
	//tampilkan messagebox berhasil simpan dan redirect ke halaman home.php
	echo "<script>alert('User telah berhasil dihapus.'); document.location='home.php'</script>";
} 
else {
	echo "<script>alert('User gagal dihapus. Silahkan ulangi kembali.'); document.location='home.php'</script>";}
//menutup koneksi
mysqli_close($koneksi);
?>