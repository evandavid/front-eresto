<?php
include "inc/conn.php";
include "fungsirifan.php";

$sqm="SELECT * FROM menu where id_menu='$_GET[idmenu]'";
$qm=mysql_query($sqm);
$rm=mysql_fetch_array($qm);
$menu_nama=$rm['menu_nama'];
$menu_kuota=$rm['menu_kuota'];
$menu_des=$rm['menu_des'];
$menu_thumb=$rm['menu_thumb'];
$menu_harga=$rm['menu_harga'];
$id_kat=$rm['kategori_id_kategori'];
?>
<html>
<!DOCTYPE HTML>
<html>
<head>
	<title>e-resto | <?php echo $menu_nama ?></title>
	<!-- bootstrap -->
	<link rel="stylesheet" href="asset/css/bootstrap.css" type="text/css">
	<!--<link rel="stylesheet" href="asset/css/bootstrap-responsive.css" type="text/css">-->
	<script src="asset/js/bootstrap.min.js"></script>
	<!-- end of bootstrap -->
	<style type="text/css">
	body{
		background:#EBEBEB;
	}
	.menumodal{
    	width:520px; height:500px;
    	padding: 0px 10px 0px 10px;
	}

	img{
		width: 196px;
	}

	</style>
</head>
<body>
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=425020537556495";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
	<div class="menumodal">
		<center><h3 style="margin-bottom:0px"><?php echo $menu_nama ?></h3></center><hr>
		<div class="row-fluid">
			<div class="span5">	
				<img class="thumbnail" src="<?php echo setpp($menu_thumb) ?>">
			</div>
			<div class="span7">
				<p><?php echo $menu_des ?></p>
				<p>Kuota: <b><?php echo $menu_kuota ?></b></p>
				<p>Harga: <b><?php echo setharga($menu_harga)?></b></p>
				<div class="fb-like" data-href="http://eresto.co.id/menu.php?idmenu=<?php echo $_GET['idmenu']?>" data-send="true" data-width="280" data-show-faces="false" data-font="arial"></div>
			</div>
		</div>
		<br>
		<div class="row-fluid">
			<div class="span12">
				<b>Testimonial</b><hr>
				<div class="fb-comments" data-href="http://eresto.co.id/menu.php?idmenu=<?php echo $_GET['idmenu']?>" data-width="500" data-num-posts="6"></div>
			</div>
		</div>
	</div>
</body>
</html>