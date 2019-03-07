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
	<h2>Import Excel Data Lahan Baru Trees4Trees </h2>
	<h4><font color="green"><?php echo $host." [".$user."]" ?></font></h4>
	<?php
	if(isset($_GET['berhasil'])){
		echo "<p>".$_GET['berhasil']." Data berhasil di import.</p>";
	}
	?>
	<a href="index.php">Menu Import Petani</a>
	<hr>
	<a href="upload.php?data=lahan">IMPORT DATA</a>
	<table border="1">
		<tr>
			<th>No</th>
			<th>ID</th>
			<th>Kd FC</th>
			<th>Kd MU</th>
			<th>Kd TA</th>
			<th>ID Desa</th>
			<th>Kd Petani</th>
			<th>Usul</th>
			<th>Realisasi</th>
			<th>Koordinat</th>
			<th>Th. Tanam</th>
		</tr>
		<?php

		$no=1;
		$data = mysqli_query($koneksi,"SELECT * from t4t_lahan order by no desc limit 100");
		while($d = mysqli_fetch_array($data)){

			?>
			<tr>
				<th><?php echo $no++; ?></th>
				<th><?php echo $d['no']; ?></th>
				<th><?php echo $d['kd_fc']; ?></th>
				<th><?php echo $d['kd_mu']; ?></th>
				<th><?php echo $d['kd_ta']; ?></th>
				<th><?php echo $d['id_desa']; ?></th>
				<th><?php echo $d['kd_petani']; ?></th>
				<th><?php echo $d['jml_usulan']; ?></th>
				<th><?php echo $d['jml_realisasi']; ?></th>
				<th><?php echo $d['koordinat']; ?></th>
				<th><?php echo $d['thn_tanam']; ?></th>

			</tr>
			<?php
		}
		?>

	</table>


</body>
</html>
