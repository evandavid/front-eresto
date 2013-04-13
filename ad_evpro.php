<?php
//action for save new evpro
if (isset($_POST['saveevpro'])){
	$jenis=$_POST['jenis'];
	$judul=$_POST['judul'];
	$tgl1=$_POST['tgl1'];
	$tgl2=$_POST['tgl2'];
	$des=$_POST['des'];

	$dirp="";

    $target_path = "upload_files/$username/";

	$target_path = $target_path . basename( $_FILES['picture']['name']); 
	$max_size=800000; //800KB
	if ($_FILES["picture"]["size"] > $max_size){
		echo "<script>Ukuran file harus <800KB !</script>";
	}else{
		if(move_uploaded_file($_FILES['picture']['tmp_name'], $target_path)) {
		    echo "The file ".  basename( $_FILES['picture']['name']). 
		    " has been uploaded";
		    $dirp=$target_path;
		} else{
		    echo "<script>Mohon Maaf.. Terjadi ERROR saat upload file!</script>";
		}
	}


	//lihat apakah ini promo berbayar atau free
	if ($jenis==0){ //FREE
		$si="INSERT INTO promo (promo_judul, promo_poster, promo_mulai, promo_akhir, promo_des, resto_id_resto)
				VALUES ('$judul','$dirp','$tgl1','$tgl2','$des','$usr_resto')";
		$qi=mysql_query($si);
		if (!$qi){
			echo "<script>alert('event/promo gagal dibuat!')</script>";
		}
	}else{
		//kalau berbayar harus 2x insert, ke promo sama promo2
		$si="INSERT INTO promo (promo_judul, promo_poster, promo_mulai, promo_akhir, promo_des, resto_id_resto)
				VALUES ('$judul','$dirp','$tgl1','$tgl2','$des','$usr_resto')";
		$qi=mysql_query($si);
		if (!$qi){
			echo "<script>alert('event/promo gagal dibuat!')</script>";
		}else{
			$ss="SELECT * FROM promo WHERE 
					promo_judul LIKE '$judul' AND
					promo_poster LIKE '$dirp' AND
					promo_mulai LIKE '$tgl1' AND
					promo_akhir LIKE '$tgl2' AND
					promo_des LIKE '$des' AND
					resto_id_resto = '$usr_resto'";
			//echo "$ss";
			$qs=mysql_query($ss);
			$rs=mysql_fetch_array($qs);
			$id_promo=$rs['id_promo'];
			$si2="INSERT INTO promo2 (promo_id_promo, promo2_idresto)
					VALUES ('$id_promo','$usr_resto')";
			//echo "$si2";
			$qi2=mysql_query($si2);
			if (!$qi2){
				//jika insert ke promo2 gagal, maka data ini harus dihapus juga di promo 1.
				$sd="DELETE FROM promo WHERE id_promo='$id_promo'";
				$sq=mysql_query($sd);
				echo "<script>alert('event/promo gagal dibuat!')</script>";
			}
		}
	}

	echo "<script>location.href='admin-evpro'</script>";
}

//action for delete
if (isset($_GET['delid'])){
	$sqdelp="DELETE FROM promo2 WHERE promo_id_promo='$_GET[delid]'";
	$qdelp=mysql_query($sqdelp);
	$sqdelp="DELETE FROM promo WHERE id_promo='$_GET[delid]'";
	$qdelp=mysql_query($sqdelp);
	echo "<script>location.href='admin-evpro'</script>";
}
?>

<div class="row-fluid">
	<div class="span8">
		<img src="asset/img/admin/promo.jpg">
	</div>
	<div class="span4">
		<h3>Event & Promotion </h3><hr>
		<p style="text-align:justify">Ayoo buat restomu <b>makin eksis</b> dan bikin orang makin pengen banget datang ke restomu dengan cara <b>membuat Event atau Promosi disini</b>. Caranya mudah, kamu tinggal buat banner semenarik mungkin dengan ukuran <b>lebar 670px</b> dan <b>tinggi maksimal 340px</b> lalu upload disini. Dan eng ing eng... bannermu akan dilihat jutaan orang se-Indonesia ;) Masih bingung juga? Lihat contoh2 banner <a href="attachment/banner_sample.html" target="_blank">disini</a></p>
	</div>
</div>
<div class="row-fluid">
	<div class="span12" align="right">
		<a href="#addevpro" role="button" class="btn btn-success" data-toggle="modal">Create Event/Promotion</a>
	</div>
</div>

<?php
$sprom="SELECT * FROM promo WHERE resto_id_resto='$usr_resto'";
$qprom=mysql_query($sprom);
while($rprom=mysql_fetch_array($qprom)){
?>	<div style="width:98%;">
		<div class="row-fluid adbgpromo">
			<div class="span7">
				<img src="<?php echo $rprom['promo_poster']?>"/>
			</div>
			<div class="span5">
				<table class="table table-striped table-hover" style="margin-bottom:0px;">
					<tr>
						<td>Judul</td>
						<td><b><?php echo $rprom['promo_judul'] ?></b></td>
					</tr>
					<tr>
						<td>Jenis promo</td>
						<td><?php echo setjenispromo($rprom['promo_jenis']) ?></td>
					</tr>

					<tr>
						<td>Tanggal Berlaku</td>
						<td><b><?php echo $rprom['promo_mulai']." - ".$rprom['promo_akhir'] ?></b></td>
					</tr>
					<tr>
						<td>Deskripsi</td>
						<td><?php echo $rprom['promo_des'] ?></td>
					</tr>
					<tr>
						<td colspan="2" style="text-align:right">
							<a href="" class="btn">Edit</a>
							<a href="ad_main.php?mod=evpro&delid=<?php echo $rprom['id_promo']?>" onlick="return confirm('YAKIN?')" class="btn btn-danger">Delete</a>
						</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
<?php
}
?>



<?php 
include "ad_evpro_modal.php" 
?> 