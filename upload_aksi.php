<!-- import excel ke mysql -->
<!-- www.malasngoding.com -->

<?php
// menghubungkan dengan koneksi
include 'koneksi.php';
// menghubungkan dengan library excel reader
include "excel_reader2.php";
?>

<?php
// upload file xls
$target = basename($_FILES['filepegawai']['name']) ;
move_uploaded_file($_FILES['filepegawai']['tmp_name'], $target);

// beri permisi agar file xls dapat di baca
chmod($_FILES['filepegawai']['name'],0777);

// mengambil isi file xls
$data = new Spreadsheet_Excel_Reader($_FILES['filepegawai']['name'],false);
// menghitung jumlah baris data yang ada
$jumlah_baris = $data->rowcount($sheet_index=0);

// jumlah default data yang berhasil di import
$berhasil = 0;
for ($i=2; $i<=$jumlah_baris; $i++){

	// menangkap data dan memasukkan ke variabel sesuai dengan kolumnya masing-masing
	$kd_petani  = $data->val($i, 1);
	$nm_petani  = $data->val($i, 2);
	$alamat 	  = $data->val($i, 3);
	$id_desa 	  = $data->val($i, 4);
	$digawe 	  = $data->val($i, 5);
	$no_ktp 	  = $data->val($i, 6);
	if($kd_petani != "" && $nm_petani != "" && $alamat != "" && $id_desa != "" && $digawe != "" && $no_ktp != ""){
		// input data ke database (table data_pegawai)
		mysqli_query($koneksi,"INSERT into t4t_petani (kd_petani,nm_petani,alamat,id_desa,digawe,no_ktp)
		values('$kd_petani','$nm_petani','$alamat','$id_desa','$digawe','$no_ktp')");
		$berhasil++;
	}
}

// hapus kembali file .xls yang di upload tadi
unlink($_FILES['filepegawai']['name']);

// alihkan halaman ke index.php
header("location:index.php?berhasil=$berhasil");
?>
