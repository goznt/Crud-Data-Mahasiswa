<?php
require "koneksi.php";

//data dari halaman nim-view.php dimasukkan ke dalam variable dgn method POST
$nim=$_POST['nim']; //input name="nim" 
$nama=$_POST['nama']; //input name="nama"
$alamat=$_POST['alamat']; //input name="alamat"
$jeniskelamin=$_POST['jenis_kelamin']; //input name="jenis kelamin"

$nama_file = $_FILES['foto']['name']; //menyimpan nama file pada tabel
$asal_file = $_FILES['foto']['tmp_name']; //digunakan untuk upload file ke server

//directory lokasi Foto Profile pada server
//$_SERVER['DOCUMENT_ROOT'] -> Foder HTDOCS -> localhost
$tujuan_file = $_SERVER['DOCUMENT_ROOT'] . "/uas_210030178/images/".$_FILES['foto']['name']; //htdocs > uas_210030178 > images 

//membuat variable untuk concate query sql dgn kondisi tertentu
$x="";
$z="";

//query basic
$x="update mahasiswa set nama='$nama', alamat='$alamat', jenis_kelamin='$jeniskelamin' ";

if ($nama_file != "") { //merubah foto jika ada file yg diupload (!= yaitu tidak samadengan) 
	$z=", foto='$nama_file' ";
}

//menggabungkan kedua query dan menambahkan klausa where
$sql = $x . $z . " where (nim = '$nim')";

//eksekusi perintah update
$update = mysqli_query($koneksi,$sql) or die (mysqli_error($koneksi));

//data berhasil di-update
if ($update){
	
	if ($nama_file != "") { //ada file yg diupload
	$copy=copy($asal_file, $tujuan_file);} //copy file foto ke server
	//copy() salinan fungsi file. Fungsi ini mengembalikan TRUE pada keberhasilan dan FALSE pada kegagalan
	//tampilkan messagebox berhasil update dan redirect ke halaman home.php
	echo "<script>alert('User telah berhasil di-update.'); document.location='home.php'</script>";
} 
else {
	echo "<script>alert('User gagal di-update. Silahkan ulangi kembali.'); document.location='nim-view.php?id=$nim'</script>";}

//menutup koneksi
mysqli_close($koneksi);

?>