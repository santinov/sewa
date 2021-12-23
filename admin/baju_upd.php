<?php
include('includes/config.php');
error_reporting(0);
$id=$_POST['id'];
$nama=$_POST['nama'];
$jenis=$_POST['jenis'];
$deskripsi=$_POST['deskripsi'];
$kategori=$_POST['kategori'];
$harga=$_POST['harga'];
$s=$_POST['s'];
$m=$_POST['m'];
$l=$_POST['l'];
$xl=$_POST['xl'];

$sql 	= "UPDATE baju SET nama_baju='$nama',id_jenis='$jenis',kategori='$kategori',deskripsi='$deskripsi',
		   harga='$harga',s='$s',m='$m',l='$l',xl='$xl' WHERE id_baju='$id'";
$query 	= mysqli_query($koneksidb,$sql);
if($query){
	echo "<script type='text/javascript'>
			alert('Berhasil ubah data.'); 
			document.location = 'baju.php'; 
		</script>";
}else {
			echo "No Error : ".mysqli_errno($koneksidb);
			echo "<br/>";
			echo "Pesan Error : ".mysqli_error($koneksidb);

	echo "<script type='text/javascript'>
			alert('Terjadi kesalahan, silahkan coba lagi!.'); 
			document.location = 'baju_edit.php?id=$id'; 
		</script>";
}
?>