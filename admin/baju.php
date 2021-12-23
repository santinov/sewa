<?php
session_start();
error_reporting(0);
include('includes/config.php');
include('includes/format_rupiah.php');
include('includes/library.php');
if(strlen($_SESSION['alogin'])==0){	
	header('location:index.php');
} else{ ?>
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
</head>
<body>
	<?php include('includes/header.php');?>

	<div class="ts-main-content">
		<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<h2 class="page-title">Kelola Data</h2>
						<!-- Zero Configuration Table -->
						<div class="panel panel-default">
							<div class="panel-heading">
								<a href="baju_tambah.php" class="btn btn-success">Tambah</a>
							</div>
							<div class="panel-body">
							<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
							<div class = "table-responsive">
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>No</th>
											<th>Nama </th>
											<th>Jenis</th>
											<th>Kategori</th>
											<th>Harga /Hari</th>
											<th>Opsi</th>
										</tr>
									</thead>
									<tbody>
									<?php 
										$nomor = 0;
										$sqlmobil = "SELECT baju.*, jenis.* FROM baju, jenis
													 WHERE baju.id_jenis=jenis.id_jenis ORDER BY baju.nama_baju ASC";
										$querymobil = mysqli_query($koneksidb,$sqlmobil);
										while ($result = mysqli_fetch_array($querymobil)){
											$nomor++;
											?>
										<tr>
											<td><?php echo htmlentities($nomor);?></td>
											<td><?php echo htmlentities($result['nama_baju']);?></td>
											<td><?php echo htmlentities($result['nama_jenis']);?></td>
											<td><?php echo htmlentities($result['kategori']);?></td>
											<td><?php echo format_rupiah($result['harga']);?></td>
											<td align="center">
												<a href="baju_detail.php?id=<?php echo $result['id_baju'];?>" class="btn btn-primary btn-xs">&nbsp;&nbsp;Detail&nbsp;&nbsp;</a>&nbsp;&nbsp;
												<a href="baju_edit.php?id=<?php echo $result['id_baju'];?>" class="btn btn-warning btn-xs">&nbsp;&nbsp;Ubah&nbsp;&nbsp;</a>&nbsp;&nbsp;
												<a href="baju_hapus.php?id=<?php echo $result['id_baju'];?>" onclick="return confirm('Apakah anda yakin akan menghapus <b><?php echo $result['nama_baju'];?></b>?');" class="btn btn-danger btn-xs">&nbsp;&nbsp;Hapus&nbsp;&nbsp;</a>
											</td>
										</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
							</div>
						</div>
					</div>
				</div>
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