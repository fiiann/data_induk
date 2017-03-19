<?php
$nim = $_GET['nim'];
include_once('sidebar.php');
// Assign the query
$query = " SELECT * FROM anggota WHERE nim='".$nim."'";
// Execute the query
$result = $con->query($query);
$row = $result->fetch_object();
?>
<div class="col-md-3 col-sm-12 col-xs-12">
<?php
		echo '<table border="0">';
			echo '<tr>';
				echo '<td>NIM</td>';
				echo '<td> : '.$row->nim.'</td>';
			echo '</tr>';
			echo '<tr>';
				echo '<td>nama</td>';
				echo '<td> : '.$row->nama.'</td>';
			echo '</tr>';
      echo '<tr>';
				echo '<td>Fakultas</td>';
				echo '<td> : '.$row->fakultas.'</td>';
			echo '</tr>';
      echo '<tr>';
				echo '<td>Program Studi</td>';
				echo '<td> : '.$row->program_studi.'</td>';
			echo '</tr>';
      echo '<tr>';
				echo '<td>tanggal_masuk</td>';
				echo '<td> : '.$row->tanggal_masuk.'</td>';
			echo '</tr>';
      echo '<tr>';
				echo '<td>tanggal_lulus</td>';
				echo '<td> : '.$row->tanggal_lulus.'</td>';
			echo '</tr>';
      echo '<tr>';
				echo '<td>alamat</td>';
				echo '<td> : '.$row->alamat.'</td>';
			echo '</tr>';
      echo '<tr>';
				echo '<td>kota lahir</td>';
				echo '<td> : '.$row->kota.'</td>';
			echo '</tr>';
      echo '<tr>';
				echo '<td>tanggal_lahir</td>';
				echo '<td> : '.$row->tanggal_lahir.'</td>';
			echo '</tr>';
			echo '<tr>';
      echo '<tr>';
				echo '<td>email</td>';
				echo '<td> : '.$row->email.'</td>';
			echo '</tr>';
			echo '<tr>';
      echo '<tr>';
				echo '<td>Telepon</td>';
				echo '<td> : '.$row->no_telp.'</td>';
			echo '</tr>';
			echo '<tr>';
      echo '<tr>';
				echo '<td>Kewarganegaraan</td>';
				echo '<td> : '.$row->warga_negara.'</td>';
			echo '</tr>';
			echo '<tr>';
      echo '<tr>';
				echo '<td>gender</td>';
				echo '<td> : '.$row->gender.'</td>';
			echo '</tr>';
			echo '<tr>';
      echo '<tr>';
				echo '<td>agama</td>';
				echo '<td> : '.$row->agama.'</td>';
			echo '</tr>';
    echo '</table>';
		echo '<br />';
		echo '<a href="daftar_buku.php">Daftar Buku</a>';
		$con->close();
?>
<?php
	include_once('footer.php');
?>
