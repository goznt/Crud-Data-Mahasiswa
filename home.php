<?php
require "koneksi.php";
//Perintah include digunakan untuk menyisipkan sebuah file php ke dalam file php lainnya. Jika terdapat error pada program yang disertakan, maka error akan ditampilkan di layar dan program selanjutnya (setelah include) akan tetap dijalankan walaupun ditampilkan error.
//Perintah require() pada saat file yang disertakan tidak ditemukan, maka perintah-perintah selanjutnya tidak akan dijalankan. (full error jika salah/tidak ditemukan file yg terhubung)
?>

<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <!--data diambil dari session-->
    <title>Selamat datang </title>
    <link rel="icon" type="image/x-icon" href="images/logoatas.png">
    <link type="text/css" href="style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>
    <?php

//query menampilkan seluruh data pada tabel mahasiswa
$sql = "SELECT * FROM mahasiswa";

//menjalankan query ke database
$hasil = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
//Fungsi mysql_error di php yakni untuk menampilkan penjelasan pesan error yang terjadi
//Die() adalah digunakan untuk menghentikan eksekusi skrip, menghentikan skrip sebelum mengeksekusi kode yang mungkin akan menyebabkan error masalah lebih lanjut.
//Fungsi mysql_query dalam PHP adalah untuk menjalankan perintah atau instruksi query ke database MySQL dimana mysql_query() merupakan sarana dasar yang akan menampung jenis query apapun di dalam nya
//result set lebih > 0 (query menghasilkan record data)
echo "<nav>";
if (mysqli_num_rows($hasil) > 0) {
    echo "<br>";
    echo "<h1>DAFTAR MAHASISWA</h1>"; //caption

    //menampilkan jumlah data
    echo "<h5>Jumlah Data: " . mysqli_num_rows($hasil) . "</h5>";
    echo "<br>";
    //Fungsi mysql_num_rows pada php adalah untuk mengetahui berapa jumlah baris di dalam tabel database yang dipanggil oleh perintah mysql_query() sehingga nilai dapat ditampilkan dalam bentuk angka numerik

    echo "</nav>";

    $counter = 1; //membuat nomor urut data 
    //menampilkan record ke web (bentuk tabel)

    //membuat header tabel
    echo "<table border=\"1\" width=\"100%\" class=\"table  table-striped\">
	<thead>
	<tr>
			<th>No</th>
			<th>NIM</th>
			<th>Nama</th>
			<th>Alamat</th>
			<th>Jenis Kelamin</th>
			<th>Foto</th>
			<th>Action</th>
	</tr>
	</thead>";
    //membuat isi tabel dalam perulangan / looping
    while ($data = mysqli_fetch_array($hasil)) { //array -> bisa menggunakan nama field/atribut bisa juga menggunakan indeks
        //mysql_fetch_array() merupakan salah satu fungsi yang banyak digunakan dalam proses pengambilan data MySQL. Fungsi ini akan menangkap data dari hasil perintah query dan membentuknya ke dalam array asosiatif dan array numerik. Index(nomor/angka)/nama/kata (lebih lengkap)
        //mysql_fetch_assoc nama/kata atribut (kurang lengkap)
        //array adalah tipe data yang digunakan untuk menyimpan beberapa nilai dalam satu variabel. 
        
        //untuk mengubah jenis kelamin 0=perempuan, 1=laki-laki
        $jenis_sts = "1";
        $sts = "Laki-Laki";
        if ($data["jenis_kelamin"] == 0) {
            $jenis_sts = "0";
            $sts = "Perempuan";}

        echo "<tr>
			<td>$counter</td>
			<td>$data[nim]</td>
			<td>$data[nama]</td>
			<td>$data[alamat]</td>
			<td>$sts</td>
			<td><img src=\"images/$data[foto]\" alt=\"$data[foto]\" width=\"64px\"/></td>
			<td>
				<span><a class=\"btn btn-warning \" href=\"nim-view.php?id=$data[nim]\">Ubah</a></span>
				<span><a class=\"btn btn-danger \" href=\"nim-del.php?id=$data[nim]\">Hapus</a></span>
			</td>
		</tr>";
        $counter++; //increment
        //Operator Increment digunakan untuk menambah nilai variable sebanyak 1 angka, sedangkan Decrement digunakan untuk mengurang nilai variable sebanyak 1 angka.
    }
    echo "</table>";

} else {
    echo "<h3>Data tidak tersedia!</h3>";
}

//menutup koneksi
mysqli_close($koneksi);
//Fungsi mysql_close pada PHP adalah untuk menghentikan koneksi php ke server mysql dengan cara otomatis menggunakan fungsi mysql_close() setelah instruksi atau query mysql selesai dilakukan.
?>
    <br>
    <p><a href="nim-add.php" class="btn btn-primary">Tambah Mahasiswa baru</a></p>

    <footer class="bg-light">
        <div class="text-center p-3" style="background:#CCCCCC">
            All Rights Reserved. &copy; 2023
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

</body>

</html>