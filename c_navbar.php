<?php
function curPageName() {
 return substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
}
//ambil kelas aktif
$active1="";
$active2=$active1;$active3=$active1;$active4=$active1;$active5=$active1;
if (curPageName()=='index.php'){
   $active1="class='active'";
}elseif (curPageName()=='search.php'){
   $active2="class='active'";
}elseif (curPageName()=='promo.php'){
   $active3="class='active'";
}else{
   //$active1="class='active'";
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
                  <a href="index.php">
                  Home
                  </a>
               </li>
               <li <?php echo $active2 ?>><a href="search.php">Restaurant</a></li>
               <li <?php echo $active3 ?>><a href="promo.php">Event & Promo</a></li>
               <li><a href="http://blog.eresto.co.id">Blog</a></li>
            </ul>
            <form class="navbar-search" action="search.php" method="get">
               <input type="hidden" name="q2" value="0">
               <input type="hidden" name="q3" value="0">
               <input type="hidden" name="show" value="10">
               <input type="hidden" name="page" value="1">
               <input type="text" name="q" class="search-query" placeholder="Search">
            </form>
         </div><!--/.nav-collapse -->
      </div>
   </div>
</div>

