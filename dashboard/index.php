﻿        <?php 
			include_once('sidebar.php');
			if($status=='petugas'){
				$pesanWelcome='"Mari berikan layanan yang SIP bagi setiap pengunjung"';
			}else{
				$pesanWelcome='"Banyak baca buku biar makin SIP"';
			}
			
			// $query="SELECT count(idbuku) as counter FROM buku";
			// $result = $con->query($query);
			// $row=$result->fetch_object();
			// $jml_buku=$row->counter;
			// $query="SELECT sum(stok) as counter FROM buku";
			// $result = $con->query($query);
			// $row=$result->fetch_object();
			// $total_buku=$row->counter;
			// $query="SELECT count(nim) as counter FROM anggota";
			// $result = $con->query($query);
			// $row=$result->fetch_object();
			// $jml_anggota=$row->counter;
			// $query="SELECT count(idtransaksi) as counter FROM detail_transaksi WHERE tgl_kembali='0000-00-00'";
			// $result = $con->query($query);
			// $row=$result->fetch_object();
			// $jml_dipinjam=$row->counter;
			// $query="SELECT sum(denda) as counter FROM detail_transaksi";
			// $result = $con->query($query);
			// $row=$result->fetch_object();
			// $jml_denda=$row->counter;
			
			// if($status=='anggota'){
			// 	$query="SELECT count(detail_transaksi.idtransaksi) as counter FROM detail_transaksi INNER JOIN peminjaman ON detail_transaksi.idtransaksi=peminjaman.idtransaksi WHERE detail_transaksi.tgl_kembali='0000-00-00' AND peminjaman.nim='".$anggota->nim."'";
			// 	$result = $con->query($query);
			// 	$row=$result->fetch_object();
			// 	$belum_kembali = $row->counter;
			// 	$query="SELECT count(detail_transaksi.idtransaksi) as counter FROM detail_transaksi INNER JOIN peminjaman ON detail_transaksi.idtransaksi=peminjaman.idtransaksi WHERE peminjaman.nim='".$anggota->nim."'";
			// 	$result = $con->query($query);
			// 	$row=$result->fetch_object();
			// 	$jml_peminjaman = $row->counter;
			// 	$query="SELECT sum(detail_transaksi.denda) as counter FROM detail_transaksi INNER JOIN peminjaman ON detail_transaksi.idtransaksi=peminjaman.idtransaksi WHERE peminjaman.nim='".$anggota->nim."'";
			// 	$result = $con->query($query);
			// 	$row=$result->fetch_object();
			// 	$jml_denda=$row->counter;
			// }
		?>
                <div class="row">
                    <div class="col-md-12">
                     <h2>Dashboard</h2>   
                        <h5>Selamat datang <b><?php if($status=="petugas") echo $petugas->nama; else echo $anggota->nama; ?></b>. <small><i><?php echo $pesanWelcome ?></i></small></h5>
                    </div>
                </div>              
                 <!-- /. ROW  -->
                <hr />
                <div class="row">
					<div class="col-md-3 col-sm-6 col-xs-6">           
						<div class="panel panel-back noti-box">
							<span class="icon-box bg-color-green set-icon">
								<i class="fa fa-book"></i>
							</span>
							<div class="text-box" >
								<div class="main-text"><?php echo $jml_buku ?></div>
								<div class="text-muted">Judul Buku</div>
							</div>
						</div>
					</div>
                    <div class="col-md-3 col-sm-6 col-xs-6">           
						<div class="panel panel-back noti-box">
							<span class="icon-box bg-color-blue set-icon">
								<i class="fa fa-book"></i>
							</span>
							<div class="text-box" >
								<div class="main-text"><?php if($status=='anggota') echo $jml_peminjaman; else echo $jml_dipinjam.' / '.$total_buku; ?></div>
								<div class="text-muted"><?php if($status=='anggota') echo 'Pernah dipinjam'; else echo 'Terpinjam'; ?></div>
							</div>
						 </div>
					</div>
                    <div class="col-md-3 col-sm-6 col-xs-6">           
						<div class="panel panel-back noti-box">
							<span class="icon-box bg-color-red set-icon">
								<?php if($status=='anggota') echo '<i class="fa fa-book"></i>'; else echo '<i class="fa fa-users"></i>'; ?>
							</span>
							<div class="text-box" >
								<div class="main-text"><?php if($status=='anggota') echo $belum_kembali; else echo $jml_anggota; ?></div>
								<div class="text-muted"><?php if($status=='anggota') echo 'Belum kembali'; else echo 'Anggota'; ?></div>
							</div>
						 </div>
					</div>
                    <div class="col-md-3 col-sm-6 col-xs-6">           
						<div class="panel panel-back noti-box">
							<span class="icon-box bg-color-brown set-icon">
								<i class="fa fa-money"></i>
							</span>
							<div class="text-box" >
								<div class="main-text">Rp <?php echo $jml_denda ?></div>
								<div class="text-muted"><?php if($status=='anggota') echo 'Total Denda Anda'; else echo 'Denda'; ?></div>
							</div>
						 </div>
					</div>
				</div>
                 <!-- /. ROW  -->
                <hr />                
                 <!-- /. ROW  -->
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
						<div class="panel panel-default">
							<div class="panel-heading">
							   Kategori Buku
							</div>
							<div class="panel-body">
								<a href='daftar_buku.php?search=Uncategories'><span class='label label-warning'>Uncategories</span></a>&nbsp;
								<?php
									// Assign a query
									$query = "SELECT * FROM kategori";
									// Execute the query
									$result = $con->query( $query );
									if(!$result){
										die('Could not connect to database : <br/>'.$con->error);
									}
									while($row = $result->fetch_object()){
										echo "<a href='daftar_buku.php?search=".$row->nama."'><span class='label label-success'>".$row->nama."</span></a> ";
									}		
								?>
							</div>
						</div>
                    </div>
                </div>     
                 <!-- /. ROW  -->           
        <?php include_once('footer.php') ?>
