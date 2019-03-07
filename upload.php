
<?php
include 'koneksi.php';
error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Import Excel Data Petani Baru Trees4Trees</title>
</head>
<body>
	<style type="text/css">
	body{
		font-family: sans-serif;
	}

	p{
		color: green;
	}
</style>

<?php
if ($_GET['data']=='lahan') {
	$link = 'upload_aksi_lahan.php';
	$data = 'Lahan';
}else{
	$link = 'upload_aksi.php';
	$data = 'Petani';
}

?>

<h2>Import Excel Data <?php echo $data ?> Baru Trees4Trees</h2>




<a href="index.php">Kembali</a>
<br/><br/>


<form method="post" enctype="multipart/form-data" action="<?php echo $link ?>">
	Pilih File:
	<input name="filepegawai" type="file" required="required">
	<input name="upload" type="submit" value="Import">
</form>

<br/><br/>



</body>
</html>
