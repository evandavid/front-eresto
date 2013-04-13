<?php 
session_start();
include "header.php";
include "inc/conn.php";
include "fungsirifan.php";

if ($_SESSION['ad_signed_in']){ //cek apakah sudah login atau belum
$username = $_SESSION['ad_username'];
$usr_role = "Admin Resto";
$usr_resto = $_SESSION['ad_id_resto'];
//echo "$username";

//ambil featured resto dari highlight
$sqh="SELECT * FROM resto a, featured b WHERE a.id_resto=b.resto_id_resto AND b.featured_mode=1 ORDER BY RAND() LIMIT 0,2";
$qh=mysql_query($sqh);
$i=1;
while ($rh=mysql_fetch_array($qh)){
   $hid[$i]=$rh['id_resto'];
   $hnama[$i]=$rh['resto_nama'];
   $hthumb[$i]=setpp($rh['resto_thumb']); 
   $i++;
}

//ambil featured resto dari featured
$sqf="SELECT * FROM resto a, featured b WHERE a.id_resto=b.resto_id_resto AND b.featured_mode=2 ORDER BY RAND() LIMIT 0,3";
$qf=mysql_query($sqf);
$i=1;
while ($rf=mysql_fetch_array($qf)){
   $fid[$i]=$rf['id_resto'];
   $fnama[$i]=$rf['resto_nama'];
   $fthumb[$i]=setpp($rf['resto_thumb']); 
   $i++;
}

//pilih page
if (isset($_GET['mod'])){
	$mod=$_GET['mod'];
}else{
	$mod="menu";
}
switch ($mod) {
	case 'respro': $FILE_INC="ad_respro.php"; break;
	case 'menu': $FILE_INC="ad_menu.php"; break;
	case 'photos': $FILE_INC="ad_photos.php"; break;
	case 'evpro': $FILE_INC="ad_evpro.php"; break;
	case 'featured': $FILE_INC="ad_featured.php"; break;
	
	default: $FILE_INC="ad_menu.php";break;
}
include "ad_navbar.php";
?>
<div class="container-fluid ad_konten">
   <div class="row-fluid">
      <div class="span2 bg2 hidden-phone bgbrowndark">
         <!-- Featured Resto -->
         <p class="rightItemTitle">Featured Resto</p>
         <div class="sideFeatured">
               <img src="<?php echo $hthumb[1] ?>" />
               <h5><?php echo $hnama[1] ?></h5>
            </div>
            <div class="sideFeatured">
               <img src="<?php echo $hthumb[2] ?>" />
               <h5><?php echo $hnama[2] ?></h5>
            </div>
            <div class="sideFeatured">
               <img src="<?php echo $fthumb[1] ?>" />
               <h5><?php echo $fnama[1] ?></h5>
            </div>
            <div class="sideFeatured">
               <img src="<?php echo $fthumb[2] ?>" />
               <h5><?php echo $fnama[2] ?></h5>
            </div>
      </div>
      <div class="span8 bg1">
         <?php include $FILE_INC ?>
      </div>
      <div class="span2 bg2 visible-desktop bgbrowndark">
         <!-- Event dan promosi -->
         <p class="rightItemTitle">Event & Promo</p>
      </div>
   </div>
</div>


<?php 
}else{
	echo "<script>alert('Anda Harus Login Terlebih Dahulu!')</script>";
	echo "<script>location.href='index.php'</script>";
};
include "footer.php"; ?>