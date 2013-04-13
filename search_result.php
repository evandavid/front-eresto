<?php
//ambil q1, q2, q3
$q1="";$q2="0";$q3="0";
if (isset($_GET['q'])){
   $q=$_GET['q'];
}
if (isset($_GET['q2'])){
   $q2=$_GET['q2'];
}
if (isset($_GET['q3'])){
   $q3=$_GET['q3'];
}

if ($q==""){
   $sq="";
}else{
   $sq="AND a.resto_nama LIKE '%$q%'";
}

if ($q2=="0"){
   $sq2="";
}else{
   $sq2="AND b.id_katresto='$q2'";
}

if ($q3=="0"){
   $sq3="";
}else{
   $sq3="AND c.id_kota='$q3'";
}

include "search_result_pagi.php";
$sqres="SELECT * FROM resto a, katresto b, kota c WHERE
         a.katresto_id_katresto=b.id_katresto AND a.kota_id_kota=c.id_kota
         $sq $sq2 $sq3";
//echo "$sqres";

$qres=mysql_query($sqres);
while ($rres=mysql_fetch_array($result)){
   $id_resto=$rres['id_resto'];
   $resto_nama=$rres['resto_nama'];
   $resto_telp=$rres['resto_telp'];
   $resto_alamat=$rres['resto_alamat'];
   $nama_kota=$rres['nama_kota'];
   $resto_web=$rres['resto_web'];
   $resto_thumb=$rres['resto_thumb'];
   $harga1=setharga($rres['resto_harga1']);
   $harga2=setharga($rres['resto_harga2']);
   ?>
   <div class="resultsearch">
      <div class="row-fluid">
         <div class="span3">
            <ul class="thumbnails">
               <li class="span12">
                  <a href="resto.php?id=<?php echo $id_resto ?>" class="thumbnail">
                     <img src="<?php echo setpp($resto_thumb) ?>" alt="" />
                  </a>
               </li>
            </ul>
         </div>
         <div class="span9">
            <a href="resto.php?id=<?php echo $id_resto ?>"><h4><?php echo $resto_nama ?></h4></a>
            <p><?php echo $resto_alamat." ".$nama_kota."&nbsp;&nbsp;<b>telp: </b>".$resto_telp ?>
               <br> <?php if($resto_web!=""){ echo "<a href=\"http://$resto_web\" target=\"_blank\">$resto_web</a>";} ?>
               <br> <b>Price Range:&nbsp;</b><?php echo $harga1." - ".$harga2 ?>
            </p>
            <?php 
            $sqmen="SELECT * FROM resto a, menu b WHERE a.id_resto='$id_resto' AND a.id_resto=b.resto_id_resto ORDER BY RAND() LIMIT 1,10";
            $qmen=mysql_query($sqmen);
            $nrmen=mysql_num_rows($qmen);
            if ($nrmen>=1){
               echo "<p><b>menu: </b>";
               while($rmen=mysql_fetch_array($qmen)){
                  echo $rmen['menu_nama'].", ";
               }
            }
            ?>
            </p>
         </div>
      </div>
   </div>  
<?php
}
//select MENU
if (isset($_GET['page'])){
   $pagem=$_GET['page'];
}else{
   $pagem=1;
}
if ($q==""||$pagem!=1){
   //kalau query kosong, maka hasil query makanan tidak akan tampil
   $sq="";
   $nrmenu=0;
}else{
   $sq="AND d.menu_nama LIKE '%$q%'";
   $sqmenu="SELECT * FROM resto a, katresto b, kota c, menu d WHERE
         a.katresto_id_katresto=b.id_katresto AND a.kota_id_kota=c.id_kota AND d.resto_id_resto=a.id_resto
         $sq $sq2 $sq3 LIMIT 0,10";
   $qmenu=mysql_query($sqmenu);
   $nrmenu=mysql_num_rows($qmenu);
   while ($rmenu=mysql_fetch_array($qmenu)){
      $id_resto=$rmenu['id_resto'];
      $resto_nama=$rmenu['resto_nama'];
      $resto_telp=$rmenu['resto_telp'];
      $resto_alamat=$rmenu['resto_alamat'];
      $nama_kota=$rmenu['nama_kota'];
      $resto_web=$rmenu['resto_web'];
      $resto_thumb=$rmenu['resto_thumb'];
      $menu_nama=$rmenu['menu_nama'];
      $menu_thumb=$rmenu['menu_thumb'];
      $menu_des=$rmenu['menu_des'];
      ?>
      <div class="resultsearch">
         <div class="row-fluid">
            <div class="span3">
               <ul class="thumbnails">
                  <li class="span12">
                     <a href="resto.php?id=<?php echo $id_resto ?>" class="thumbnail">
                        <img src="<?php echo setpp($menu_thumb) ?>" alt="" />
                     </a>
                  </li>
               </ul>
            </div>
            <div class="span9">
               <a href="resto.php?id=<?php echo $id_resto ?>"><h4><?php echo $menu_nama ?></h4></a>
               <p><?php echo $menu_des ?></p>
               <span>by&nbsp;</span><a href="resto.php?id=<?php echo $id_resto ?>"><h5><?php echo $resto_nama ?></h5></a>
            </div>
         </div>
      </div>  
   <?php
   }
}

if ((mysql_num_rows($qres)==0)&&($nrmenu)==0){
   echo "No Resto Found ..";
}


