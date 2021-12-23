<?php
include('includes/config.php');
error_reporting(0);
$nama=$_POST['nama'];
$jenis=$_POST['jenis'];
$deskripsi=$_POST['deskripsi'];
$kategori=$_POST['kategori'];
$harga=$_POST['harga'];
$s=$_POST['s'];
$m=$_POST['m'];
$l=$_POST['l'];
$xl=$_POST['xl'];
$img1=$_FILES["img1"]["name"];
$str1 = substr($img1,-5);
$vimage1 = date('dmYHis').$str1;
$img2=$_FILES["img2"]["name"];
$str2 = substr($img2,-5);
$vimage2 = date('dmYHis').$str2;
$img3=$_FILES["img3"]["name"];
$str3 = substr($img3,-5);
$vimage3 = date('dmYHis').$str3;
$sql 	= "INSERT INTO baju (nama_baju,id_jenis,kategori,deskripsi,harga,s,m,l,xl,gambar1,gambar2,gambar3)
			VALUES ('$nama','$jenis','$kategori','$deskripsi','$harga','$s','$m','$l','$xl','$vimage1','$vimage2','$vimage3')";
$query 	= mysqli_query($koneksidb,$sql);
if($query){
	move_uploaded_file($_FILES["img1"]["tmp_name"],"img/baju/".$vimage1);
	move_uploaded_file($_FILES["img2"]["tmp_name"],"img/baju/".$vimage2);
	move_uploaded_file($_FILES["img3"]["tmp_name"],"img/baju/".$vimage3);
	echo "<script type='text/javascript'>
			alert('Berhasil tambah data.'); 
			document.location = 'baju.php'; 
		</script>";
}else {
			echo "No Error : ".mysqli_errno($koneksidb);
			echo "<br/>";
			echo "Pesan Error : ".mysqli_error($koneksidb);

	echo "<script type='text/javascript'>
			alert('Terjadi kesalahan, silahkan coba lagi!.'); 
			document.location = 'baju_tambah.php'; 
		</script>";
}
?>