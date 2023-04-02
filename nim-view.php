<?php
require "koneksi.php";
?>

<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Selamat datang </title>
    <link rel="icon" type="image/x-icon" href="images/logoatas.png">
    <link type="text/css" href="style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!--melakukan validasai terhadap inputan data menggunakan JavaScript -->
    <!--Fungsi atau function di javascript adalah sebuah blok kode yang digunakan untuk membungkus suatu proses dengan tujuan agar penulisan kode atau proses yang sama tidak ditulis secara berulang kali.-->
    <!--Fungsi alert() adalah fungsi untuk menampilkan jendela dialog. Fungsi sebenarnya berada pada objek window 
    Dialog Alert. Dialog alert() biasanya digunakan untuk menampilkan sebuah pesan peringatan atau informasi
    Kegunaan return false : membuat browser tidak mengikuti prilaku default dari tag tersebut
    Return True : membuat browser mengikuti prilaku default dari tag tersebut
    focus biasanya disematkan atau diletakan pada form, gunanya untuk membuat user paham form yang sedang aktif adalah form yang mana.-->
    <script type="text/javascript">
    /*ketika pengguna mengirimkan sebuah formulir. Fungsi ini memeriksa apakah bidang tertentu seperti "nim", "nama", "alamat", 
    "jenis_kelamin", "foto" diisi sebelum formulir dikirimkan. Jika salah satu bidang ini kosong, fungsi akan menampilkan pesan 
    peringatan yang memberitahu pengguna untuk mengisi bidang tertentu dan mengembalikan false */
    function cek_form(frm) {
        if (frm.nim.value == "") {
            alert("Silahkan lengkapi kolom NIM");
            frm.nim.focus();
            return false;
        } else if (frm.nama.value == "") {
            alert("Silahkan lengkapi kolom Nama");
            frm.nama.focus();
            return false;
        } else if (frm.alamat.value == "") {
            alert("Silahkan lengkapi kolom Alamat");
            frm.alamat.focus();
            return false;
        } else if (frm.jenis_kelamin.value == "") {
            alert("Silahkan lengkapi kolom Jenis Kelamin");
            frm.jenis_kelamin.focus();
            return false;
        } else if (frm.foto.value == "") {
            alert("Silahkan pilih file Foto Profile");
            frm.foto.focus();
            return false;
        } else
            return true; /*Jika semua bidang diisi, fungsi akan mengembalikan true, memungkinkan formulir dikirimkan. Ini terlihat seperti skrip ini digunakan untuk memvalidasi input form dan memastikan bahwa pengguna menyelesaikan semua bidang yang diperlukan sebelum mengirimkan.*/
    }
    </script>

</head>

<body>

    <br>
    <h1 style="color: #fff;">UBAH DATA MAHASISWA</h1>
    <br>
    <?php
//data dari halaman home.php dimasukkan ke dalam variable dgn method GET
$nim=$_GET['id']; 

//load data User sesuai dengan NIM
$sql ="select * from mahasiswa where (nim = '$nim')";

//eksekusi query
$hasil = mysqli_query($koneksi,$sql) or die (mysqli_error($koneksi));

//jika record ditemukan
if (mysqli_num_rows($hasil) > 0) {
	
//Menampilkan data user pada script HTML
$data=mysqli_fetch_array($hasil);
?>

    <br><br>
    <!--input data akan diproses pada halaman nim-save.php-->
    <form name="form1" action="nim-update.php" method="post" onSubmit="return cek_form(this)"
        enctype="multipart/form-data">
        <!--method:POST -> ID/pengenal yg akan diparsing adalah atribut "name" pada masing-masing control-->
        <!--enctype="multipart/form-data" digunakan untuk kebutuhan upload file -->
        <!--Tag Fieldset berfungsi untuk mengelompokkan beberapa objek form menjadi sebuah kelompok, 
        sedangkan Tag Legend berfungsi untuk menampilkan judul dari kelompok objek form tersebut
        GET (mengambil/menangkap data) digunakan untuk select / menghapus (digunakan misalnya pada ubah data mahasiswa )
        POST (mengirim data) digunakan untuk membuat data pribadi seperti password, tambah/ubah. ( digunakan pada saat mengambil data yang banyak, dan membuat password supaya aman)
        Action attribute ini artinya mau dieksekusi ke mana data itu ketika tombol submit diklik.
        action attribute ini berfungsi untuk  eksekusi data yang akan dituju ketika tombol submit diklik-->

        <div class="card">

            <table>
                <tr><br>
                    <td>NIM</td>
                    <!--menyisipkan kode PHP pada script HTML-->
                    <td>
                        <input type="text" name="nim" class="txt" value="<?php echo "$data[nim]"; ?>" readonly>
                    </td>
                </tr>

                <tr>
                    <td>Nama</td>
                    <td>
                        <input type="text" name="nama" class="txt" maxlength="50" value="<?php echo "$data[nama]"; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Alamat</td>
                    <td>
                        <input type="text" name="alamat" class="txt" maxlength="60"
                            value="<?php echo "$data[alamat]"; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Jenis Kelamin</td>
                    <td>
                        <input type="radio" value="1" name="jenis_kelamin"
                            <?php if($data['jenis_kelamin']==1){echo "checked=checked";} ?>>laki-laki
                        <input type="radio" value="0" name="jenis_kelamin"
                            <?php if($data['jenis_kelamin']==0){echo "checked=checked";} ?>>Perempuan
                    </td>

                </tr>

                <tr>
                    <td>Foto Profile</td>
                    <td>
                        <input name="foto" type="file" />
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Simpan" class="btn btn-success">
                        <input type="reset" value="Reset" class="btn btn-danger">
                    </td>
                </tr>
            </table>
            <p><a class="btn btn-primary" href="home.php">Kembali</a></p>
        </div>
    </form>

    <?php
}

else {//tidak ada user dengan id yg digunakan 
	echo "<script> alert('Data User tidak ditemukan.');
		  document.location='home.php'</script>";
}
?>
    <!--Background Video-->
    <video id="background-video" autoplay loop muted>
        <source src="images/bg-video1.mp4" type="video/mp4">
    </video>

    <br><br><br><br><br><br><br>

    <footer>
        <div class="text-center p-3">
            All Rights Reserved. &copy; 2023
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

</body>

</html>