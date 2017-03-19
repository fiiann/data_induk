<?php
	require_once('functions.php');
	
	$isbn = mysqli_real_escape_string($con, $_GET['isbn']);
	// Assign the query
	$query = " SELECT * FROM buku b LEFT JOIN kategori k ON b.idkategori=k.idkategori WHERE isbn='".$isbn."'";
	// Execute the query
	$result = $con->query($query);
	$row = $result->fetch_object();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Detail Buku | <?php echo $row->judul; ?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="assets/css/main.css" type="text/css">
    <link rel="stylesheet" href="assets/extras/owl.carousel.css" type="text/css">
    <link rel="stylesheet" href="assets/extras/owl.theme.css" type="text/css">    
    <!-- Responsive CSS Styles -->
    <link rel="stylesheet" href="assets/css/responsive.css" type="text/css">
    <!-- Bootstrap Select -->
    <link rel="stylesheet" href="assets/css/bootstrap-select.min.css">
    <!-- Bootstrap Core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Theme CSS -->
    <link href="assets/css/freelancer.min.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>

<body id="page-top" class="index">

    <?php
		include_once('header.php');
	?>

    <!-- Portfolio Grid Section -->
    <div id="koleksi" class="wrapper">
      <!-- Featured Listings Start -->
      <section class="featured-lis" >
        <div class="container">
          <div class="row">
            <div id="hasil_cari" class="col-md-12 wow fadeIn" data-wow-delay="0.5s">
                <div class="row">
					<div class="col-lg-12 text-center">
						<h3><?php echo $row->judul; ?></h3>
						<hr/>
					</div>
				</div>
				<div class="col-md-3 col-sm-12 col-xs-12">                       
					<div class="panel panel-primary text-center no-boder bg-color-green">
						<div class="panel-body">
							<?php echo '<img src="dashboard/assets/img/'.$row->file_gambar.'" height="auto" />'; ?>
							<h5><?php echo $row->judul; ?></h5>
						</div>
						<div class="panel-footer back-footer-green">
						   <?php if(empty($row->nama)) echo 'uncategories' ; else echo $row->nama; ?>
						</div>
					</div> 
				</div>
				<div class="col-md-9 col-sm-12 col-xs-12">   
					<?php
						echo '<table border="0" style="font-size:20px">';
						echo '<tbody>';
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
							echo '<td> : '; if(empty($row->nama)) echo 'Uncategories' ; else echo $row->nama; echo'</td>';
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
							echo '<td>Stok Tersedia</td>';
							echo '<td> : '.$row->stok_tersedia.'</td>';
						echo '</tr>';
					echo '</tbody>';
					echo '</table>';
					echo '<br />';
					?>
				</div>
				<div class="row">
					<div class="col-lg-12 text-center">
						<h2>BUKU SERUPA</h2>
						<hr/>
					</div>
				</div>
				<?php include 'list_buku.php' ?>
            </div> 
          </div>
        </div>
      </section>
      <!-- Featured Listings End -->
    </div>
	
	
	
    <!-- Footer -->
    <footer class="text-center">
        <div class="footer-above">
            <div class="container">
                <div class="row">
                    <div class="footer-col col-md-4">
                        <h3>Location</h3>
                        <p>Dekanat FSM
                            <br>UNDIP</p>
                    </div>
                    <div class="footer-col col-md-4">
                        <h3>Around the Web</h3>
                        <ul class="list-inline">
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-google-plus"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-linkedin"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-github"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="footer-col col-md-4">
                        <h3>About SIP</h3>
                        <p>script is create with Bootstrap theme <a href="http://startbootstrap.com">Start Bootstrap</a> and Modified by <a href="#">SIP Team</a>.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        Copyright &copy; SIP
                    </div>
                </div>
            </div>
        </div>
    </footer>

   
    <!-- jQuery -->
    <script src="assets/js/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Plugin JavaScript -->
    <script src="assets/js/jquery.easing.min.js"></script>
    <!-- Theme JavaScript -->
    <script src="assets/js/freelancer.min.js"></script>
    <script type="text/javascript" src="assets/js/owl.carousel.min.js"></script>
    <script type="text/javascript" src="assets/js/wow.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/main.js"></script>
</body>
</html>
