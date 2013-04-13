<?php
include "header.php";
include "inc/conn.php";
include "sa_navbar.php";
//pilih page
if (isset($_GET['mod'])){
	$mod=$_GET['mod'];
}else{
	$mod="menu";
}
switch ($mod) {
	case 'resto-management': $FILE_INC="sa_resto.php"; break;
	case 'user-management': $FILE_INC="sa_user.php"; break;
	case 'photos-management': $FILE_INC="sa_photos.php"; break;
	case 'eventpromo': $FILE_INC="sa_evpro.php"; break;
	case 'featured': $FILE_INC="sa_featured.php"; break;
	
	default: $FILE_INC="ad_menu.php";break;
}
?>


<?php
include "footer.php";
?>