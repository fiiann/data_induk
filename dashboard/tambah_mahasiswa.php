<?php
	require_once('sidebar.php');
	if($status=="anggota"){
		header('Location:./index.php');
	}

	$sukses=TRUE;

	// eksekusi tombol daftar
	if (isset($_POST['daftar'])) {
		// Cek Nim
		$nim=test_input($_POST['nim']);
		if ($nim=='') {
			$errorNim='wajib diisi';
			$validNim=FALSE;
		}elseif (!preg_match("/^[0-9]{14}$/",$nim)) {
			$errorNim='NIM harus terdiri dari 14 digit angka';
			$validNim=FALSE;
		}else{
			$query = " SELECT * FROM anggota WHERE nim='".$nim."'";
			$result = $con->query( $query );
			if($result->num_rows!=0){
				$errorNim="NIM sudah pernah digunakan, harap masukkan NIM lain";
				$validNim=FALSE;
			}
			else{
				$validNim = TRUE;
			}
		}

		// Cek Nama
		$nama=test_input($_POST['nama']);
		if ($nama=='') {
			$errorNama='wajib diisi';
			$validNama=FALSE;
		}elseif (!preg_match("/^[a-zA-Z ]*$/",$nama)) {
			$errorNama='hanya mengizinkan huruf dan spasi';
			$validNama=FALSE;
		}else{
			$validNama=TRUE;
		}



		// cek alamat
		$alamat=test_input($_POST['alamat']);
		if ($alamat=='') {
			$errorAlamat='wajib diisi';
			$validAlamat=FALSE;
		}else{
			$validAlamat=TRUE;
		}

		// cek kota
		$kota=test_input($_POST['kota']);
		if($kota=='') {
			$errorKota='wajib diisi';
			$validKota=FALSE;
		}else{
			$validKota=TRUE;
		}

		// cek email
		$email=test_input($_POST['email']);
		if ($email=='') {
			$errorEmail='wajib diisi';
			$validEmail=FALSE;
		}else{
			$validEmail=TRUE;
		}

		// cek nomor telpon
		$noTlp=test_input($_POST['telpon']);
		if ($noTlp=='') {
			$errorTlp='wajib diisi';
			$validTlp=FALSE;
		}elseif (!preg_match("/^[0-9]*$/",$noTlp)) {
			$errorTlp='hanya mengizinkan angka 0-9';
			$validTlp=FALSE;
		}else{
			$validTlp=TRUE;
		}

    // cek fakultas
    $fakultas=test_input($_POST['fakultas']);
    if($fakultas=='') {
      $errorFakultas='wajib diisi';
      $validFakultas=FALSE;
    }else{
      $validFakultas=TRUE;
    }

    // cek program Studi
    $program_studi=test_input($_POST['program_studi']);
    if($program_studi=='') {
      $errorJurusan='wajib diisi';
      $validJurusan=FALSE;
    }else{
      $validJurusan=TRUE;
    }

    // cek tanggal masuk
    $tanggal_masuk=test_input($_POST['tanggal_masuk']);
    if($tanggal_masuk=='') {
      $errorMasuk='wajib diisi';
      $validMasuk=FALSE;
    }else{
      $validMasuk=TRUE;
    }

    // cek tanggal lahir
    $tanggal_lahir=test_input($_POST['tanggal_lahir']);
    if($tanggal_lahir=='') {
      $errorLahir='wajib diisi';
      $validLahir=FALSE;
    }else{
      $validLahir=TRUE;
    }

    // cek warga negara
    $warga_negara=test_input($_POST['warga_negara']);
    if($warga_negara=='') {
      $errorNegara='wajib diisi';
      $validNegara=FALSE;
    }else{
      $validNegara=TRUE;
    }

    // cek program Studi
    $gender=test_input($_POST['gender']);
    if($gender=='') {
      $errorGender='wajib diisi';
      $validGender=FALSE;
    }else{
      $validGender=TRUE;
    }

    // cek program Studi
    $agama=test_input($_POST['agama']);
    if($agama=='') {
      $errorAgama='wajib diisi';
      $validAgama=FALSE;
    }else{
      $validAgama=TRUE;
    }

		// jika tidak ada kesalahan input
		if ($validNim && $validNama && $validAlamat && $validKota && $validEmail && $validTlp && $validAgama && $validGender && $validNegara && $validLahir && $validMasuk && $validJurusan && $validFakultas) {
      $nim=$con->real_escape_string($nim);
			$nama=$con->real_escape_string($nama);
			$alamat=$con->real_escape_string($alamat);
			$kota=$con->real_escape_string($kota);
			$email=$con->real_escape_string($email);
			$noTlp=$con->real_escape_string($noTlp);
      $fakultas=$con->real_escape_string($fakultas);
			$program_studi=$con->real_escape_string($program_studi);
			$tanggal_masuk=$con->real_escape_string($tanggal_masuk);
			$tanggal_lahir=$con->real_escape_string($tanggal_lahir);
			$warga_negara=$con->real_escape_string($warga_negara);
			$gender=$con->real_escape_string($gender);
      $agama=$con->real_escape_string($agama);

			$query = "INSERT INTO anggota (nim, nama, alamat, kota, email, no_telp, fakultas, program_studi, tanggal_masuk, tanggal_lahir, warga_negara, gender, agama) VALUES ('".$nim."','".$nama."','".$alamat."','".$kota."','".$email."','".$noTlp."','".$fakultas."','".$program_studi."','".$tanggal_masuk."','".$tanggal_lulus."','".$warga_negara."','".$gender."','".$agama."')";

			$hasil=$con->query($query);
			if (!$hasil) {
				die("Tidak dapat menjalankan query database: <br>".$con->error);
			}else{
				$sukses=TRUE;
			}
			$pesan_sukses="Berhasil menambahkan data.";
		}
		else{
			$sukses=FALSE;
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Form Pendaftaran</title>
</head>
<body>
<div class="row">
	<div class="col-md-6">
		<!-- Form Elements -->
		<div class="panel panel-default">
			<div class="panel-heading">
				Tambah Anggota
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-md-12">
						<form method="POST" role="form" autocomplete="on" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
							<span class="label label-success"><?php if(isset($pesan_sukses)) echo $pesan_sukses;?></span>
							<div class="form-group">
								<label>NIM</label>&nbsp;<span class="label label-warning">* <?php if(isset($errorNim)) echo $errorNim;?></span>
								<input class="form-control" type="text" name="nim" maxlength="14" size="30" placeholder="nim 14 digit angka" required autofocus value="<?php if(!$sukses&&$validNim){echo $nim;} ?>">
							</div>
							<div class="form-group">
								<label>Nama</label>&nbsp;<span class="label label-warning">* <?php if(isset($errorNama)) echo $errorNama;?></span>
								<input class="form-control" type="text" name="nama" maxlength="50" size="30" placeholder="masukan nama" required value="<?php if(!$sukses&&$validNama){echo $nama;} ?>">
							</div>
							<div class="form-group">
								<label>Alamat</label>&nbsp;<span class="label label-warning">* <?php if(isset($errorAlamat)) echo $errorAlamat;?></span>
								<textarea class="form-control" name="alamat" placeholder="masukan alamat rumah" cols="26" rows="5" required maxlength="150"><?php if(!$sukses&&$validAlamat){echo $alamat;} ?></textarea>
							</div>
							<div class="form-group">
								<label>Kota</label>&nbsp;<span class="label label-warning">* <?php if(isset($errorKota)) echo $errorKota;?></span>
								<input class="form-control" type="text" name="kota" maxlength="50" size="30" placeholder="kota asal" required value="<?php if(!$sukses&&$validKota){echo $kota;} ?>">
							</div>
							<div class="form-group">
								<label>Telp/HP</label>&nbsp;<span class="label label-warning">* <?php if(isset($errorTlp)) echo $errorTlp;?></span>
								<input class="form-control" type="text" name="telpon" maxlength="15" size="30" placeholder="nomor telpon HP aktif" required value="<?php if(!$sukses&&$validTlp){echo $noTlp;} ?>">
							</div>
							<div class="form-group">
								<label>Email</label>&nbsp;<span class="label label-warning">* <?php if(isset($errorEmail)) echo $errorEmail;?></span>
								<input class="form-control" type="email" name="email" size="30" placeholder="example@email.com" required value="<?php if(!$sukses&&$validEmail){echo $email;} ?>">
							</div>
							<div class="form-group">
								<label>Fakultas</label>&nbsp;<span class="label label-warning">* <?php if(isset($errorFakultas)) echo $errorFakultas;?></span>
								<input class="form-control" type="text" name="fakultas" maxlength="20" size="30" placeholder="Masukan fakultas" required value="<?php if(!$sukses&&$validFakultas){echo $fakultas;} ?>">
							</div>
              <div class="form-group">
								<label>Program Studi</label>&nbsp;<span class="label label-warning">* <?php if(isset($errorJurusan)) echo $errorJurusan;?></span>
								<input class="form-control" type="text" name="program_studi" maxlength="15" size="30" placeholder="Masukan program studi" required value="<?php if(!$sukses&&$validJurusan){echo $program_studi;} ?>">
							</div>
              <div class="form-group">
								<label>Tanggal Masuk</label>&nbsp;<span class="label label-warning">* <?php if(isset($errorMasuk)) echo $errorMasuk;?></span>
								<input class="form-control" type="date" name="tanggal_masuk" maxlength="15" size="30" placeholder="Tanggal masuk kuliah" required value="<?php if(!$sukses&&$validMasuk){echo $tanggal_masuk;} ?>">
							</div>
              <div class="form-group">
								<label>Tanggal Lahir</label>&nbsp;<span class="label label-warning">* <?php if(isset($errorLahir)) echo $errorLahir;?></span>
								<input class="form-control" type="text" name="tanggal_lahir" maxlength="15" size="30" placeholder="ex : 2017-12-12" required value="<?php if(!$sukses&&$validLahir){echo $tanggal_lahir;} ?>">
							</div>
              <div class="form-group">
								<label>Warga Negara</label>&nbsp;<span class="label label-warning">* <?php if(isset($errorNegara)) echo $errorNegara;?></span>
								<input class="form-control" type="text" name="warga_negara" maxlength="15" size="30" placeholder="Kebangsaan" required value="<?php if(!$sukses&&$validNegara){echo $warga_negara;} ?>">
							</div>
              <div class="form-group">
								<label>Jenis Kelamin</label>&nbsp;<span class="label label-warning">* <?php if(isset($errorGender)) echo $errorGender;?></span>
								<input class="form-control" type="text" name="gender" maxlength="15" size="30" placeholder="diganti dropdown" required value="<?php if(!$sukses&&$validGender){echo $gender;} ?>">
							</div>
              <div class="form-group">
								<label>Agama</label>&nbsp;<span class="label label-warning">* <?php if(isset($errorAgama)) echo $errorAgama;?></span>
								<input class="form-control" type="text" name="agama" maxlength="15" size="30" placeholder="dropdown juga" required value="<?php if(!$sukses&&$validAgama){echo $agama;} ?>">
							</div>
							<div class="form-group">
								<input class="form-control" type="submit" name="daftar" value="Daftar">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
include_once('footer.php');
$con->close();
?>
