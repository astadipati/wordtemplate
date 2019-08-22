<?php include("config.php"); ?>


<!DOCTYPE html>
<html>
<head>
	<title>Pendaftaran Siswa Baru | SMK Coding</title>
</head>

<body>
	<header>
		<h3>Siswa yang sudah mendaftar</h3>
	</header>
	
	<nav>
		<a href="form-daftar.php">[+] Tambah Baru</a>
	</nav>
	
	<br>
	
	<table border="1">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Alamat</th>
			<th>Jenis Kelamin</th>
			<th>Agama</th>
			<th>Sekolah Asal</th>
			<th>Tindakan</th>
		</tr>
	</thead>
	<tbody>
		
		<?php
		$sql = "SELECT * FROM perkara_banding";
		$query = mysqli_query($db, $sql);
		
		while($siswa = mysqli_fetch_array($query)){
			echo "<tr>";
			
			echo "<td>".$siswa['perkara_id']."</td>";
			echo "<td>".$siswa['nomor_perkara_pn']."</td>";
			echo "<td>".$siswa['putusan_pn']."</td>";
			echo "<td>".$siswa['permohonan_banding']."</td>";
			echo "<td>".$siswa['pemohon_banding']."</td>";
			echo "<td>".$siswa['pemberitahuan_permohonan_banding']."</td>";
			
			echo "<td>";
			echo "<a href='form-edit.php?id=".$siswa['perkara_id']."'>Edit</a> | ";
			echo "<a href='data.php?id=".$siswa['perkara_id']."'>Cetak</a> | ";
			echo "<a href='list-detil.php?id=".$siswa['perkara_id']."'>Detil</a> | ";
			echo "<a href='hapus.php?id=".$siswa['perkara_id']."'>Hapus</a>";
			echo "</td>";
			
			echo "</tr>";
		}		
		?>
		
	</tbody>
	</table>
	
	<p>Total: <?php echo mysqli_num_rows($query) ?></p>
	
	</body>
</html>
