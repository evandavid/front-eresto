<?php
//action for update
if (isset($_POST['update'])){
	$nama=$_POST['nama'];
	$latt=$_POST['latt'];
	$long=$_POST['long'];
	$des=$_POST['des'];
	$telp=$_POST['telp'];
	$harga1=$_POST['harga1'];
	$harga2=$_POST['harga2'];
	$alamat=$_POST['alamat'];
	$fb=$_POST['fb'];
	$twitter=$_POST['twitter'];
	$email=$_POST['email'];
	$web=$_POST['web'];
	$jamb=$_POST['jamb'];
	$jamt=$_POST['jamt'];
	$squ="UPDATE resto SET
			resto_nama='$nama',
			resto_latt='$latt',
			resto_long='$long',
			resto_des='$des',
			resto_telp='$telp',
			resto_harga1='$harga1',
			resto_harga2='$harga2',
			resto_alamat='$alamat',
			resto_fb='$fb',
			resto_twitter='$twitter',
			resto_email='$email',
			resto_web='$web',
			resto_jamb='$jamb',
			resto_jamt='$jamt'
		WHERE id_resto='$usr_resto'";
	$qu=mysql_query($squ);

	//fasilitas
	$sqfd="DELETE FROM resto_has_fasilitas WHERE resto_id_resto=$usr_resto";
	$qfd=mysql_query($sqfd);
	foreach ($_POST['fasilitas'] as $key=> $value) {
		$sqf="INSERT INTO resto_has_fasilitas VALUES ($usr_resto,$value)";
		$qf=mysql_query($sqf);
	}
	echo "<script>location.href='ad_main.php?mod=respro'</script>";
}

//select fasilitas
$sqfas="SELECT * FROM fasilitas f, resto r, resto_has_fasilitas rf 
			WHERE r.id_resto=rf.resto_id_resto and 
				r.id_resto=$usr_resto and f.id_fasilitas=rf.fasilitas_id_fasilitas;";
$qfas=mysql_query($sqfas);

if (isset($_GET['tab'])){
	if ($_GET['tab']=='edit'){
		include "ad_respro_edit.php";
	}
}else{

//--------------- ACTION change PP ------------------------------
if (isset($_FILES['picture']['name'])){

	$dir="";

    $target_path = "upload_files/".$username."/";
	if (!file_exists ( $target_path )) {
		mkdir($target_path, 0777, true) or die('Ada kesalahan sistem! Upload file gagal');
	}

	$target_path = $target_path . basename( $_FILES['picture']['name']); 
	//echo "$target_path";
	$max_size=800000; //800KB
	if ($_FILES["picture"]["size"] > $max_size){
		$alert="<div class='alert alert-error fade in'>
					<a class='close' data-dismiss='alert' href='#'>&times;</a>
					Gambar harus <b><800 Kb</b>!
				</div>";
	}else{
		if(move_uploaded_file($_FILES['picture']['tmp_name'], $target_path)) {
		    $dir=$target_path;
		    //sebelum di upload, gambar yang sebelumnya harus di hapus dulu
			$sqpp="SELECT resto_thumb FROM resto 
				WHERE id_resto='$usr_resto'";
			$qpp=mysql_query($sqpp);
			$rpp=mysql_fetch_array($qpp);
			$pp=$rpp['resto_thumb'];
			if (!($pp=="")||!($pp==null)){
				unlink($pp);
			}
			$sqip="UPDATE resto SET resto_thumb='$dir' WHERE id_resto='$usr_resto'";
			//echo $sqip;
			$qip=mysql_query($sqip);
			if ($qip){
				$alert="<div class='alert alert-success fade in'>
								<a class='close' data-dismiss='alert' href='#'>&times;</a>
							Gambar ".  basename( $_FILES['picture']['name']). " Berhasil di upload
						</div>";
			}
		} else{
		    $alert="<div class='alert alert-error fade in'>
						<a class='close' data-dismiss='alert' href='#'>&times;</a>
						Maaf, terjadi <b>error</b> saat upload file
					</div>";
		}
	}	
}

//--------------------END OF CHANGE PP -------------------------------

$sres="SELECT * FROM resto WHERE id_resto='$usr_resto'";
$qres=mysql_query($sres);
$rres=mysql_fetch_array($qres);
$nama=$rres['resto_nama'];
$latt=$rres['resto_latt'];
$long=$rres['resto_long'];
$des=$rres['resto_des'];
$like=$rres['resto_like'];
$telp=$rres['resto_telp'];
$harga1="Rp ".number_format($rres['resto_harga1'],0,",",".");
$harga2="Rp ".number_format($rres['resto_harga2'],0,",",".");
$alamat=$rres['resto_alamat'];
$fb=$rres['resto_fb'];
$twitter=$rres['resto_twitter'];
$thumb=$rres['resto_thumb'];
$email=$rres['resto_email'];
$web=$rres['resto_web'];
$jamb=$rres['resto_jamb'];
$jamt=$rres['resto_jamt'];
?>
<div class="row-fluid">
	<div class="span12">
		<div id="alert">
			<?php
			if (isset($alert)){
				echo $alert;
			}
			?>
		</div>
		<h3 class="h3">Profil Resto</h3><div style="margin-top:11px;"><a href="ad_main.php?mod=respro&tab=edit"><i>&nbsp;&nbsp;[ EDIT ]</i></a></div>
	</div>
</div>
<div class="row-fluid">
	<div class="span2">
		<?php
		if ($thumb==""){
			echo "<img src='asset/img/picture.png'>";
		}else{
			echo "<img src='$thumb'>";
		}
		?>
		<form method="post" enctype="multipart/form-data">
			<input type="file" onchange="this.form.submit()" name="picture"/>
		</form>
	</div>
	<div class="span10">
		<table class="table table-striped table-hover">
			<tr>
				<td width="30%">Nama Resto</td>
				<td><?php echo $nama ?></td>
			</tr>
			<tr>
				<td>Deskripsi</td>
				<td><?php echo $des ?></td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td><?php echo $alamat ?></td>
			</tr>
			<tr>
				<td>Lattitude/Longitude</td>
				<td><?php echo $latt." / ".$long ?></td>
			</tr>
			<tr>
				<td>Jam Operasional</td>
				<td><?php echo $jamb." - ".$jamt ?></td>
			</tr>
			<tr>
				<td>Range Harga</td>
				<td><?php echo $harga1." - ".$harga2 ?></td>
			</tr>
			<tr>
				<td>Telp</td>
				<td><?php echo $telp ?></td>
			</tr>
			<tr>
				<td>Fasilitas</td>
				<td><?php
				while ($rfas=mysql_fetch_array($qfas)){
					echo $rfas['fasilitas_nama'].", ";
				}
				?>
				</td>
			</tr>
			<tr>
				<td>Email</td>
				<td><a href="mailto:<?php echo $email ?>"><?php echo $email ?></a></td>
			</tr>
			<tr>
				<td>Website</td>
				<td><a href="http://<?php echo $web ?>"><?php echo $web ?></a></td>
			</tr>
			<tr>
				<td>Facebook</td>
				<td><a href="http://www.facebook.com/<?php echo $fb ?>">facebook.com/<?php echo $fb ?></a></td>
			</tr>
			<tr>
				<td>Twitter</td>
				<td>
					<a href="http://twitter.com/<?php echo $twitter ?>">@<?php echo $twitter ?></a>
				</td>
			</tr>
		</table>
	</div>
</div>
<?php
} //ujung dari tab edit
?>