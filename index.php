<?php
include 'koneksi.php';
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
	<h2>Import Excel Data Petani Baru Trees4Trees </h2>
	<h4><font color="green"><?php echo $host." [".$user."]" ?></font></h4>
	<?php
	if(isset($_GET['berhasil'])){
		echo "<p>".$_GET['berhasil']." Data berhasil di import.</p>";
	}
	?>
	<a href="lahan.php">Menu Import Lahan</a>
	<hr>
	<a href="upload.php">IMPORT DATA</a>
	<table border="1">
		<tr>
			<th>No</th>
			<th>Kd Petani</th>
			<th>ID Desa</th>
			<th>Nama</th>
			<th>Alamat</th>
			<th>No Ktp</th>
			<th>Waktu</th>
		</tr>
		<?php

		$no=1;
		$data = mysqli_query($koneksi,"SELECT * from t4t_petani order by no desc limit 100");
		while($d = mysqli_fetch_array($data)){

			?>
			<tr>
				<th><?php echo $no++; ?></th>
				<th><?php echo $d['kd_petani']; ?></th>
				<th><?php echo $d['id_desa']; ?></th>
				<th><?php echo $d['nm_petani']; ?></th>
				<th><?php echo $d['alamat']; ?></th>
				<th><?php echo $d['no_ktp']; ?></th>
				<th><?php echo $d['digawe']; ?></th>

			</tr>
			<?php
		}
		?>

	</table>


</body>
</html>
