<?php
include "header.php";
include "inc/conn.php";
include "c_navbar.php";
include "fungsirifan.php";

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
?>
<script src="asset/clearbox/clearbox.js?dir=asset/clearbox/clearbox" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
   $("#search").change(function(){
      var q=$("#search").val();
      var q2 = $('#selkat :selected').val();
      location.href='promo.php?q='+q+'&q2='+q2;
   });
   $("#selkot").change(function(){
      var q=$("#search").val();
      var q2 = $('#selkot :selected').val();
      location.href='promo.php?q='+q+'&q2='+q2;
   });
});
</script>
<div class="centerContainer" style="margin-top:50px">
   <div id="mainContainer">
      <div id="leftContainer2" class="fl">
         <div class="rightItem">
            <p class="rightItemTitle">Search</p>
            <input type="text" id="search" placeholder="What are you looking for.." value="<?php if (isset($_GET['q'])){echo $_GET['q'];}?>"/>
            <p>Select City</p>
            <select id="selkot" name="selkot">
               <option value="0">City</option>
               <?php 
               $sqkot="SELECT nama_kota, id_kota FROM kota ORDER BY kota_order ASC LIMIT 1,10";
               $qkot=mysql_query($sqkot);
               while ($rkot=mysql_fetch_array($qkot)){
                  if (isset($_GET["q2"])){
                     if ($_GET["q2"]==$rkot["id_kota"]){
                        echo "<option value='$rkot[id_kota]' selected='selected'>$rkot[nama_kota]</option>";
                     }else{
                        echo "<option value='$rkot[id_kota]'>$rkot[nama_kota]</option>"; 
                     }
                  }else{
                     echo "<option value='$rkot[id_kota]'>$rkot[nama_kota]</option>";
                  } 
               }?>
            </select>
            
         </div>
         <div class="rightItem">
            <p class="rightItemTitle">Featured Resto</p>
            <div class="sideFeatured">
               <a href="resto.php?id=<?php echo $hid[1] ?>"><img src="<?php echo $hthumb[1] ?>" /></a>
               <h5><?php echo $hnama[1] ?></h5>
            </div>
            <div class="sideFeatured">
               <a href="resto.php?id=<?php echo $hid[2] ?>"><img src="<?php echo $hthumb[2] ?>" /></a>
               <h5><?php echo $hnama[2] ?></h5>
            </div>
            <div class="sideFeatured">
               <a href="resto.php?id=<?php echo $fid[1] ?>"><img src="<?php echo $fthumb[1] ?>" /></a>
               <h5><?php echo $fnama[1] ?></h5>
            </div>
            <div class="sideFeatured">
               <a href="resto.php?id=<?php echo $fid[2] ?>"><img src="<?php echo $fthumb[2] ?>" /></a>
               <h5><?php echo $fnama[2] ?></h5>
            </div>
         </div>
      </div>
      <div id="rightContainer2" class="fr">
         <div id="secondaryNavContainer" class="right">
            <?php
            if (isset($_GET['q'])){?>
            	<div class="form-horizontal" align="right">
				   <div class="controls">
				      <select id="sorting">
				         <option>Sort by Relevance</option>
				         <option>Sort by Top Rated</option>
				         <option>Sort by Top Commented</option>
				      </select>
				   </div>
				</div>
				<span class="clears"></span>
            <?php
            }else{
               echo "<h3>TOP EVENT & PROMOTION</h3>";
            }
            ?>
         </div>
         <div class="mainContents">
            <div class="result">
            	<?php
            	if (isset($_GET['q'])){?>
            		<h3>Result ...</h3><hr>
            	<?php
                  //include "search_result.php";
            	}else{
            		//jika tidak dalam modus pencarian maka tampilkan promo berbayar
            		include "promo_top.php";
            	}
            	?>
            </div>
         </div>
      </div>
      <span class="clears"></span>
   </div>
</div>

<?php
include "footer.php";
?>