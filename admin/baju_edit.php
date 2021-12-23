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
					
						<h2 class="page-title">Edit Data </h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">Form Edit Data </div>
									<div class="panel-body">
										<?php 
										$id=intval($_GET['id']);
										$sql ="SELECT baju.*, jenis.* FROM baju, jenis WHERE baju.id_jenis=jenis.id_jenis AND baju.id_baju='$id'";
										$query = mysqli_query($koneksidb,$sql);
										$result = mysqli_fetch_array($query);
										?>

										<form method="post" class="form-horizontal" name="theform" action ="baju_upd.php" onsubmit="return valid(this);" enctype="multipart/form-data">
										<div class="form-group">
											<label class="col-sm-2 control-label">Nama <span style="color:red">*</span></label>
											<div class="col-sm-4">
												<input type="hidden" name="id" class="form-control" value="<?php echo $id;?>" required>
												<input type="text" name="nama" class="form-control" value="<?php echo htmlentities($result['nama_baju']);?>" required>
											</div>
											<label class="col-sm-2 control-label">Jenis<span style="color:red">*</span></label>
											<div class="col-sm-4">
												<select class="form-control" name="jenis" required="" data-parsley-error-message="Field ini harus diisi" >
														<?php
														$mySql = "SELECT * FROM jenis ORDER BY nama_jenis";
														$myQry = mysqli_query($koneksidb, $mySql);
														$dataJenis = $result['id_jenis'];
														while ($jenisData = mysqli_fetch_array($myQry)) {
															if ($jenisData['id_jenis']== $dataJenis) {
															$cek = " selected";
															} else { $cek=""; }
															echo "<option value='$jenisData[id_jenis]' $cek>".$jenisData[nama_jenis]."</option>";
														}
														?>
												</select>
											</div>
										</div>
																					
										<div class="hr-dashed"></div>
										<div class="form-group">
											<label class="col-sm-2 control-label">Deskripsi<span style="color:red">*</span></label>
											<div class="col-sm-4">
												<textarea class="form-control" name="deskripsi" rows="3" required><?php echo htmlentities($result['deskripsi']);?></textarea>
											</div>
											<label class="col-sm-2 control-label">Kategori<span style="color:red">*</span></label>
											<div class="col-sm-4">
												<select class="form-control" name="kategori" required>
													<?php
														$cat = $result['kategori'];
														echo "<option value='$cat' selected>".$cat."</option>";
														echo "<option value='Anak Laki-Laki'>Anak Laki-Laki</option>";
														echo "<option value='Anak Perempuan'>Anak Perempuan</option>";
														echo "<option value='Dewasa Laki-Laki'>Dewasa Laki-Laki</option>";
														echo "<option value='Dewasa Perempuan'>Dewasa Perempuan</option>";
													?>
												</select>
											</div>
										</div>

										<div class="form-group">
											<label class="col-sm-2 control-label">Harga /Hari<span style="color:red">*</span></label>
											<div class="col-sm-4">
												<input type="text" name="harga" class="form-control" value="<?php echo htmlentities($result['harga']);?>" required>
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
											<input type="number" min="0" name="s" class="form-control" value="<?php echo htmlentities($result['s']);?>" required>
										</div>
										<!-- <label class="col-sm-1 control-label">M<span style="color:red">*</span></label>
										<div class="col-sm-2">
											<input type="number" min="0" name="m" class="form-control" value="<?php echo htmlentities($result['m']);?>" required>
										</div> -->
										<label class="col-sm-1 control-label">L<span style="color:red">*</span></label>
										<div class="col-sm-2">
											<input type="number" min="0" name="l" class="form-control" value="<?php echo htmlentities($result['l']);?>" required>
										</div>
										<label class="col-sm-1 control-label">XL<span style="color:red">*</span></label>
										<div class="col-sm-2">
											<input type="number" min="0" name="xl" class="form-control" value="<?php echo htmlentities($result['xl']);?>" required>
										</div>
									</div>
									<div class="hr-dashed"></div>
										
									<div class="form-group">
										<div class="col-sm-12">
											<h4 align="center"><b>Gambar</b></h4>
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-4">
											<center>Gambar 1 <img src="img/baju/<?php echo htmlentities($result['gambar1']);?>" width="300" height="200" style="border:solid 1px #000">
											<a href="changeimage1.php?imgid=<?php echo htmlentities($result['id_baju'])?>">Ganti Gambar 1</a></center>
										</div>
										<div class="col-sm-4">
											<center>Gambar 2<img src="img/baju/<?php echo htmlentities($result['gambar2']);?>" width="300" height="200" style="border:solid 1px #000">
											<a href="changeimage2.php?imgid=<?php echo htmlentities($result['id_baju'])?>">Ganti Gambar 2</a></center>
										</div>
										<div class="col-sm-4">
											<center>Gambar 3<img src="img/baju/<?php echo htmlentities($result['gambar3']);?>" width="300" height="200" style="border:solid 1px #000">
											<a href="changeimage3.php?imgid=<?php echo htmlentities($result['id_baju'])?>">Ganti Gambar 3</a><center>
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
												<button class="btn btn-primary" type="submit">Update</button>
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
				</form>

			</div>
		</div>
	</div>

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