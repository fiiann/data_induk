<?php
$isbn = $_GET['isbn'];
include_once('sidebar.php');
// Assign the query
$query = " SELECT * FROM buku b LEFT JOIN kategori k ON b.idkategori=k.idkategori WHERE isbn='".$isbn."'";
// Execute the query
$result = $con->query($query);
$row = $result->fetch_object();
?>
<div class="col-md-3 col-sm-12 col-xs-12">                       
	<div class="panel panel-primary text-center no-boder bg-color-green">
		<div class="panel-body">
			<?php echo '<img src="assets/img/'.$row->file_gambar.'" width="100%;" />'; ?>
			<h5><?php echo $row->judul; ?></h5>
		</div>
		<div class="panel-footer back-footer-green">
		   <?php if(empty($row->nama)) echo '<i>uncategories</i>' ; else echo $row->nama; ?>
		</div>
	</div>                      
</div>
<?php
		echo '<table border="0">';
			echo '<tr>';
				echo '<td>ISBN</td>';
				echo '<td> : '.$row->isbn.'</td>';
			echo '</tr>';
			echo '<tr>';
				echo '<td>Judul</td>';
				echo '<td> : '.$row->judul.'</td>';
			echo '</tr>';
			echo '<tr>';
				echo '<td>Kategori</td>';
				echo '<td> : '; if(empty($row->nama)) echo 'uncategories' ; else echo $row->nama; echo'</td>';
			echo '</tr>';
			echo '<tr>';
				echo '<td>Pengarang</td>';
				echo '<td> : '.$row->pengarang.'</td>';
			echo '</tr>';
			echo '<tr>';
				echo '<td>Penerbit</td>';
				echo '<td> : '.$row->penerbit.'</td>';
			echo '</tr>';
			echo '<tr>';
				echo '<td>Kota Terbit</td>';
				echo '<td> : '.$row->kota_terbit.'</td>';
			echo '</tr>';
			echo '<tr>';
				echo '<td>Stok Tersedia</td>';
				echo '<td> : '.$row->stok_tersedia.'</td>';
			echo '</tr>';
		echo '</table>';
		echo '<br />';
		echo '<a href="daftar_buku.php">Daftar Buku</a>';
		$con->close();
?>
<?php
	include_once('footer.php');
?>
