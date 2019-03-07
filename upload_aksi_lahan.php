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
$ii=$i-1;

	// menangkap data dan memasukkan ke variabel sesuai dengan kolumnya masing-masing
	$kd_fc  = $data->val($i, 1);
	$kd_mu  = $data->val($i, 2);
	$kd_ta 	  = $data->val($i, 3);
	$id_desa 	  = $data->val($i, 4);
	$no_lahan 	  = $data->val($i, 5);
	$status_lahan 	  = $data->val($i, 6);
	$kd_petani 	  = $data->val($i, 7);
	$noGPS 	  = $data->val($i, 8);
	$thn_tanam 	  = $data->val($i, 9);
	$id_lahan 	  = $data->val($i, 10);
	$id_pohon 	  = $data->val($i, 11);
	$luas_lahan 	  = $data->val($i, 12);
	$luas_tanam 	  = $data->val($i, 13);
	$tutup_lahan 	  = $data->val($i, 14);
	$jml_usulan 	  = $data->val($i, 15);
	$acc 	  = $data->val($i, 16);
	$jml_realisasi 	  = $data->val($i, 17);
	$id_pohon2 	  = $data->val($i, 18);
	$wkt_tanam 	  = $data->val($i, 19);
	$acc2 	  = $data->val($i, 20);
	$stok 	  = $data->val($i, 21);
	$kd_lahan 	  = $data->val($i, 22);
	$no_dok 	  = $data->val($i, 23);
	$koordinat 	  = $data->val($i, 24);
	$stok_order 	  = $data->val($i, 25);
	$jml_persetujuan 	  = $data->val($i, 26);


	if($kd_petani != "" ){
		// input data ke database (table data_pegawai)
		mysqli_query($koneksi,"INSERT into t4t_lahan (kd_fc
		,kd_mu
		,kd_ta
		,id_desa
		,no_lahan
		,status_lahan
		,kd_petani
		,noGPS
		,thn_tanam
		,id_lahan
		,id_pohon
		,luas_lahan
		,luas_tanam
		,tutup_lahan
		,jml_usulan
		,acc
		,jml_realisasi
		,id_pohon2
		,wkt_tanam
		,acc2
		,stok
		,kd_lahan
		,no_dok
		,koordinat
		,stok_order
		,jml_persetujuan)
		values ('$kd_fc',
		'$kd_mu',
		'$kd_ta',
		'$id_desa',
		'$no_lahan',
		'$status_lahan',
		'$kd_petani',
		'$noGPS',
		'$thn_tanam',
		'$id_lahan',
		'$id_pohon',
		'$luas_lahan',
		'$luas_tanam',
		'$tutup_lahan',
		'$jml_usulan',
		'$acc',
		'$jml_realisasi',
		'$id_pohon2',
		'$wkt_tanam',
		'$acc2',
		'$stok',
		'$kd_lahan',
		'$no_dok',
		'$koordinat',
		'$stok_order',
		'$jml_persetujuan')");
		$berhasil++;
	}
}

// hapus kembali file .xls yang di upload tadi
unlink($_FILES['filepegawai']['name']);

// alihkan halaman ke index.php
header("location:lahan.php?berhasil=$berhasil");
?>
