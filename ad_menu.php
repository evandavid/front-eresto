<?php
$sqmenu="SELECT * FROM menu m, kategori k WHERE resto_id_resto='$usr_resto' AND m.kategori_id_kategori=k.id_kategori";
$qmenu=mysql_query($sqmenu);

//insert new menu
if (isset($_POST['addmenu'])){
	$menu_nama=$_POST['nama'];
	$menu_des=$_POST['deskripsi'];
	$menu_kat=$_POST['kategori'];
	$menu_harga=$_POST['harga'];
	$dir="";

    $target_path = "upload_files/$username/";

	$target_path = $target_path . basename( $_FILES['picture']['name']); 
	$max_size=800000; //800KB
	if ($_FILES["picture"]["size"] > $max_size){
		echo "<script>Ukuran file harus <800KB !</script>";
	}else{
		if(move_uploaded_file($_FILES['picture']['tmp_name'], $target_path)) {
		    echo "The file ".  basename( $_FILES['picture']['name']). 
		    " has been uploaded";
		    $dir=$target_path;
		} else{
		    echo "<script>Mohon Maaf.. Terjadi ERROR saat upload file!</script>";
		}
	}
	//echo $_FILES["picture"]["size"];
	$sqim="INSERT INTO menu (menu_nama, menu_des, menu_thumb, menu_harga, resto_id_resto, kategori_id_kategori)
                VALUES ('$menu_nama', '$menu_des', '$dir', '$menu_harga', '$usr_resto', '$menu_kat')";
    //echo $sqim;
    $qim=mysql_query($sqim);
    if (!$qim){
    	echo "<script>Insert Menu Gagal! Silahkan ulangi lagi</script>";
    	echo "$sqim";
    }
    echo "<script>location.href='admin-menu'</script>";

}

//delete
if (isset($_GET['act'])){
	if ($_GET['act']=='del'){
		$sqdf="SELECT * FROM menu WHERE id_menu='$_GET[id]'";
		$qdf=mysql_query($sqdf);
		$rdf=mysql_fetch_array($qdf);
		$namafile=$rdf['menu_thumb'];
		$sdel="DELETE FROM menu WHERE id_menu='$_GET[id]'";
		$qdel=mysql_query($sdel);
		if ($qdel){
			unlink($namafile);
		}else{
			echo "<script>alert('DELETE GAGAL!')</script>";	
		}
		echo "<script>location.href='admin-menu'</script>";
	}
}
?>
<script type="text/javascript">
$(document).ready(function() {
    	oTable = $('#menu').dataTable({
        	"bJQueryUI": true,
        	"bAutoWidth": false,
        	"bAutoWidth": false,
        	"aoColumns" : [
        	{ sWidth: '60px' },
            { sWidth: '130px' },
            { sWidth: '280px' },
            { sWidth: '100px' },
            { sWidth: '100px' },
            { sWidth: '80px' }],  
        	//"sPaginationType": "full_numbers"
    	});
	} );
</script>
<div class="row-fluid hidden-phone">
	<div class="span7"><img src="asset/img/admin/menu.jpg"></div>
	<div class="span5">
		<h3>Menu</h3><hr>
		<p style="text-align:justify">Buat Restomu <b>makin terlihat indah</b> di website <a href="index.php">e-resto</a> dengan mengupload menu-menu keren yang ada di restomu. Manjakan pengunjung dengan menu yang dilengkapi dengan <b>harga</b> dan <b>foto</b>.</p>
	</div>
</div>
<div class="row-fluid">
	<div class="span12" align="right">
		<a href="#addexcel" role="button" class="btn btn-success" data-toggle="modal">Add Menu via xls</a>
		<a href="#addweb" role="button" class="btn btn-primary" data-toggle="modal">Add Menu</a>
		<hr>
	</div>
</div>
<div class="row-fluid">
	<div class="span12" align="right">
		<table id="menu">
			<thead>
				<tr>
					<th>Photo</th>
					<th>Title</th>
					<th>Description</th>
					<th>Category</th>
					<th>Harga</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				while ($rmenu=mysql_fetch_array($qmenu)) {
					$harga="Rp ".number_format($rmenu["menu_harga"],0,",",".");
					$idmenu=$rmenu['id_menu'];
					?>
				<tr>
					<td align="center"><a href="<?php echo setpp($rmenu['menu_thumb']); ?>" rel="clearbox"><img src="<?php echo setpp($rmenu['menu_thumb']); ?>" class="thumbmenu"></a></td>
					<td><?php echo $rmenu['menu_nama'] ?></td>
					<td><?php echo $rmenu['menu_des'] ?></td>
					<td align="center"><?php echo $rmenu['kategori_nama'] ?></td>
					<td><?php echo $harga ?></td>
					<td align="center">
						<a href="" type="button" class="btn btn-mini btn-success"><i class="icon-white icon-edit"></i></a>
						<a href="ad_main.php?mod=menu&act=del&id=<?php echo $idmenu?>" type="button" class="btn btn-mini btn-danger" onclick="return confirm('Yakin?');"><i class="icon-white icon-remove"></i></a>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>
<script src="asset/clearbox/clearbox.js?dir=asset/clearbox/clearbox" type="text/javascript"></script>
<?php include "ad_menu_modal.php";?>