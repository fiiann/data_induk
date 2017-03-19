<div id="new-products" class="owl-carousel">
	<?php
	require_once('functions.php');
	
	if(isset($_GET['isbn'])){
		$query = " SELECT * FROM buku b LEFT JOIN kategori k ON b.idkategori=k.idkategori WHERE isbn='".$isbn."'";
		// Execute the query
		$result = $con->query($query);
		$row = $result->fetch_object();
		$idkategori=$row->idkategori;
		$pengarang=$row->pengarang;
		$penerbit=$row->penerbit;
		
		$query = "SELECT * FROM buku WHERE (idkategori='$idkategori' OR pengarang='$pengarang' OR penerbit='$penerbit') AND isbn!='$isbn' ORDER BY tgl_update LIMIT 10";
	}else{
		$query = "SELECT * FROM buku ORDER BY tgl_update LIMIT 10";
	}
	
	
	$result = $con->query($query);
	if ($result){
		while ($row = $result->fetch_object()){
			echo '<div class="item" align="text-center">
				  <div class="product-item">
					<div class="carousel-thumb">
					  <a href="buku.php?isbn='.$row->isbn.'"><img src="dashboard/assets/img/'.$row->file_gambar.'" alt="" height="150px"> 
					  <div class="overlay">
						<i class="fa fa-link"></i></a>
					  </div> 
					</div>    
					<a href="buku.php?isbn='.$row->isbn.'" class="item-name">'.$row->judul.'</a><br>  
					<span class="price">'.$row->pengarang.'</span>  
				  </div>
				</div>';
		}
	}
	
	?>
</div>