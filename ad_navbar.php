<?php
//ambil kelas aktif
$active1="";
$active2=$active1;$active3=$active1;$active4=$active1;$active5=$active1;
if (isset($_GET['mod'])){
   switch ($_GET['mod']) {
      case 'respro': $active1="class='active'"; break;
      case 'menu': $active2="class='active'"; break;
      case 'photos': $active3="class='active'"; break;
      case 'evpro': $active4="class='active'"; break;
      case 'featured': $active5="class='active'"; break;
   }
}
?>
<div class="navbar navbar-darkbrown navbar-fixed-top">
   <div class="navbar-inner">
      <div class="container-fluid">
         <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         </a>
         <a class="brand" href="index.php">e-resto</a>
         <div class="nav-collapse collapse"> <!-- nav-collapse -->
            <ul class="nav">
               <li <?php echo $active1 ?>>
                  <a href="admin-respro">
                  Resto Profile
                  </a>
               </li>
               <li <?php echo $active2 ?>><a href="admin-menu">Menu</a></li>
               <li <?php echo $active3 ?>><a href="admin-photos">Photos</a></li>
               <li <?php echo $active4 ?>>
                  <a  href="admin-evpro">
                  Event & Promo
                  </a>
               </li> 
               <li <?php echo $active5 ?>><a href="admin-featured">Featured</a></li>
            </ul>
            <ul class="nav pull-right">
            	<li class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                  <?php echo $username ?>
                  <b class="caret"></b>
                  </a>
                  <ul class="dropdown-menu">
                  	 <li><a href="">Edit Password</a></li>
                  	 <li class="divider"></li>
                     <li><a href="index.php?act=logout">Sign Out</a></li>
                  </ul>
               </li>
            </ul>
         </div><!--/.nav-collapse -->
      </div>
   </div>
</div>
