<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0){	
header('location:index.php');
}else{
?>
<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title>Arrahma Wedding</title>
	<!-- <link rel="shortcut icon" href="img/fav.png"> -->
	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">
<script type="text/javascript">
function valid(theform){
		pola_nama=/^[a-zA-Z]*$/;
		if (!pola_nama.test(theform.vehicletitle.value)){
		alert ('Hanya huruf yang diperbolehkan untuk Nama Baju!');
		theform.vehicletitle.focus();
		return false;
		}
		return (true);
}
</script>
</head>
<body>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
	<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<h2 class="page-title">Tambah Data</h2>
					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-default">
									<div class="panel-heading">Form Tambah Data</div>
								<div class="panel-body">
									<form method="post" name="theform" action="baju_add.php" class="form-horizontal" onsubmit="return valid(this);" enctype="multipart/form-data">
									<div class="form-group">
										<label class="col-sm-2 control-label">Nama<span style="color:red">*</span></label>
										<div class="col-sm-4">
											<input type="text" name="nama" class="form-control" required>
										</div>
										<label class="col-sm-2 control-label">Jenis<span style="color:red">*</span></label>
										<div class="col-sm-4">
											<select class="form-control" name="jenis" required="" data-parsley-error-message="Field ini harus diisi" >
												<option value="">== Pilih Jenis ==</option>
													<?php
														$mySql = "SELECT * FROM jenis ORDER BY nama_jenis ASC";
														$myQry = mysqli_query($koneksidb, $mySql);
														while ($myData = mysqli_fetch_array($myQry)) {
															if ($myData['id_jenis']== $dataMerek) {
															$cek = " selected";
															} else { $cek=""; }
															echo "<option value='$myData[id_jenis]' $cek>$myData[nama_jenis] </option>";
														}
													?>
											</select>
										</div>
									</div>
																				
									<div class="hr-dashed"></div>
									<div class="form-group">
										<label class="col-sm-2 control-label">Deskripsi <span style="color:red">*</span></label>
										<div class="col-sm-4">
											<textarea class="form-control" name="deskripsi" rows="3" required></textarea>
										</div>
										<label class="col-sm-2 control-label">Kategori<span style="color:red">*</span></label>
										<div class="col-sm-4">
											<select class="form-control" name="kategori" required>
												<option value=""> == Pilih Kategori == </option>
												<option value="Dekorasi">Dekorasi</option>
												<option value="Pakaian">Pakaian</option>
											
											</select>
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-2 control-label">Harga /Hari<span style="color:red">*</span></label>
										<div class="col-sm-4">
											<input type="number" min="0" name="harga" class="form-control" required>
										</div>
									</div>

									<div class="form-group">
										<div class="col-sm-12">
											<h5 align="center"><b>Stok Ukuran</b></h5>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-1 control-label">S<span style="color:red">*</span></label>
										<div class="col-sm-2">
											<input type="number" min="0" name="s" class="form-control" required>
										</div>
										<!-- <label class="col-sm-1 control-label">M<span style="color:red">*</span></label>
										<div class="col-sm-2">
											<input type="number" min="0" name="m" class="form-control" required>
										</div> -->
										<label class="col-sm-1 control-label">L<span style="color:red">*</span></label>
										<div class="col-sm-2">
											<input type="number" min="0" name="l" class="form-control" required>
										</div>
										<label class="col-sm-1 control-label">XL<span style="color:red">*</span></label>
										<div class="col-sm-2">
											<input type="number" min="0" name="XL" class="form-control" required>
										</div>
									</div>
									<div class="hr-dashed"></div>

									<div class="form-group">
										<div class="col-sm-12">
											<h4 align="center"><b>Upload Gambar</b></h4>
										</div>
									</div>

									<div class="form-group">
										<div class="col-sm-4">
											Gambar 1<span style="color:red">*</span><input type="file" name="img1" accept="image/*" required>
										</div>
										<div class="col-sm-4">
											Gambar 2<span style="color:red">*</span><input type="file" name="img2" accept="image/*" required>
										</div>
										<div class="col-sm-4">
											Gambar 3<span style="color:red">*</span><input type="file" name="img3" accept="image/*" required>
										</div>
									</div>
									<div class="hr-dashed"></div>									
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-default">
								<div class="panel-body">
									<div class="form-group">
										<div class="col-sm-3">
											<div class="checkbox checkbox-inline">
												<button class="btn btn-primary" type="submit">Simpan</button>
												<a href="baju.php" class="btn btn-default">Batal</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>					
					</div>
				</div>
				
			</div>
		</div>
	</div>
</form>

	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
</body>
</html>
<?php } ?>