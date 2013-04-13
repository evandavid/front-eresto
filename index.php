<?php 
include "header.php";
include "inc/conn.php";
include "c_navbar.php";
include "fungsirifan.php";
//session_start();
function gantilatar(){ 
   //fungsi ini digunakan untuk ganti2 latar pada div home header
   $aa=rand(1,3);
   echo "background: url('asset/img/bgimage/bg-food-$aa.jpg') 0 0 no-repeat;";
}

//ambil resto highlight
$sqh="SELECT * FROM resto a, featured b WHERE a.id_resto=b.resto_id_resto AND b.featured_mode=1 ORDER BY featured_order LIMIT 0,3";
$qh=mysql_query($sqh);
$i=1;
while ($rh=mysql_fetch_array($qh)){
  $id[$i]=$rh['id_resto'];
   $nama[$i]=$rh['resto_nama'];
   $latt[$i]=$rh['resto_latt'];
   $long[$i]=$rh['resto_long'];
   $des[$i]=$rh['resto_des'];
   $like[$i]=$rh['resto_like'];
   $telp[$i]=$rh['resto_telp'];
   $harga1[$i]=setharga($rh['resto_harga1']);
   $harga2[$i]=setharga($rh['resto_harga2']);
   $alamat[$i]=$rh['resto_alamat'];
   $fb[$i]=$rh['resto_fb'];
   $twitter[$i]=$rh['resto_twitter'];
   $thumb[$i]=setpp($rh['featured_thumb']);
   $email[$i]=$rh['resto_email'];
   $web[$i]=$rh['resto_web'];
   $jamb[$i]=$rh['resto_jamb'];
   $jamt[$i]=$rh['resto_jamt'];
   $i++; 
}


//ambil resto featured
$sqf="SELECT * FROM resto a, featured b WHERE a.id_resto=b.resto_id_resto AND b.featured_mode=2 ORDER BY RAND() LIMIT 0,4";
$qf=mysql_query($sqf);
$i=1;
while ($rf=mysql_fetch_array($qf)){
   $fid[$i]=$rf['id_resto'];
   $fnama[$i]=$rf['resto_nama'];
   $fthumb[$i]=setpp($rf['resto_thumb']); 
   $i++;
}

//ambil resto random
$sqr="SELECT * FROM resto ORDER BY RAND() LIMIT 0,4";
$qr=mysql_query($sqr);
$i=1;
while ($rr=mysql_fetch_array($qr)){
   $rid[$i]=$rr['id_resto'];
   $rnama[$i]=$rr['resto_nama'];
   $rthumb[$i]=setpp($rr['resto_thumb']); 
   $i++;
}
?>
<script type="text/javascript" src="asset/parallax/js/jquery.cslider.js"></script>
<script type="text/javascript" src="asset/parallax/js/modernizr.custom.28468.js"></script>
<script type="text/javascript">
   $(function() {         
      $('#da-slider').cslider({            
         autoplay : true,
         bgincrement : 2050
      });      
   });
</script>
<div class="centerContainer980">
   <div id="homeHeader" style="<?php gantilatar() ?>">
      <div id="searchHome">
         <div class="searchHomeGroup">
            <p class="big">I'm looking for</p>
            <form action="search.php" method="get">
               <select id="selcat" name="q2">
                  <option value="0">Category</option>
                  <?php 
                  $sqcat="SELECT katresto_nama, id_katresto FROM katresto ORDER BY katresto_nama ASC";
                  $qcat=mysql_query($sqcat);
                  while ($rcat=mysql_fetch_array($qcat)){
                     echo "<option value='$rcat[id_katresto]'>$rcat[katresto_nama]</option>";
                  }?>
               </select>
               <p class="big">In</p>
               <select id="selkot" name="q3">
                  <option value="0">City</option>
                  <?php 
                  $sqkot="SELECT nama_kota, id_kota FROM kota ORDER BY kota_order ASC LIMIT 1,10";
                  $qkot=mysql_query($sqkot);
                  while ($rkot=mysql_fetch_array($qkot)){
                     echo "<option value='$rkot[id_kota]'>$rkot[nama_kota]</option>";
                  }?>
               </select>
               <input type="hidden" name="q" value="">
               <input type="hidden" name="show" value="10">
               <input type="hidden" name="page" value="1">
               <button type="submit" class="btn homeSubmit" />search</a>
            </form>
         </div>
      </div>
      <div id="da-slider" class="da-slider">
         <div class="da-slide">
               <h2><?php echo $nama[1] ?></h2>
               <p>
                  Telp: <b><?php echo $telp[1] ?></b><br>
                  Email: <b><?php echo $email[1] ?></b><br>
                  Address: <b><?php echo $alamat[1] ?></b><br>
                  Price range: <b><?php echo $harga1[1]." - ".$harga2[1] ?></b><br>
                  Hours: <b><?php echo $jamb[1]." - ".$jamt[1] ?></b>
               </p>
               <a href="resto.php?id=<?php echo $id[1] ?>" class="da-link">View</a>
               <div class="da-img"><img src="<?php echo $thumb[1] ?>" alt="<?php echo $nama[1] ?>" /></div>
         </div>
         <div class="da-slide">
               <h2><?php echo $nama[2] ?></h2>
               <p>
                  Telp: <b><?php echo $telp[2] ?></b><br>
                  Email: <b><?php echo $email[2] ?></b><br>
                  Address: <b><?php echo $alamat[2] ?></b><br>
                  Price range: <b><?php echo $harga1[2]." - ".$harga2[2] ?></b><br>
                  Hours: <b><?php echo $jamb[2]." - ".$jamt[2] ?></b>
               </p>
               <a href="resto.php?id=<?php echo $id[2] ?>" class="da-link">View</a>
               <div class="da-img"><img src="<?php echo $thumb[2] ?>" alt="<?php echo $nama[2] ?>" /></div>
         </div>
         <div class="da-slide">
               <h2><?php echo $nama[3] ?></h2>
               <p>
                  Telp: <b><?php echo $telp[3] ?></b><br>
                  Email: <b><?php echo $email[3] ?></b><br>
                  Address: <b><?php echo $alamat[3] ?></b><br>
                  Price range: <b><?php echo $harga1[3]." - ".$harga3[3] ?></b><br>
                  Hours: <b><?php echo $jamb[3]." - ".$jamt[3] ?></b>
               </p>
               <a href="resto.php?id=<?php echo $id[3] ?>" class="da-link">View</a>
               <div class="da-img"><img src="<?php echo $thumb[3] ?>" alt="<?php echo $nama[3] ?>" /></div>
         </div>
         <nav class="da-arrows">
            <span class="da-arrows-prev"></span>
            <span class="da-arrows-next"></span>
         </nav>
      </div>
   </div>
</div>
<div class="centerContainer">
   <div id="mainContainer">
      <div class="rowContainer">
         <p class="rowHeader">featured places</p>
         <div class="menuGrid41">
            <a href="resto.php?id=<?php echo $fid[1] ?>">
               <img src="<?php echo $fthumb[1] ?>" alt="American Favourite" />
               <div class="menuCaption outer212">
                  <div class="inner10">
                     <h5><?php echo stringtrim(19,$fnama[1]) ?></h5>
                  </div>
               </div>
            </a>
         </div>
         <div class="menuGrid42">
            <a href="resto.php?id=<?php echo $fid[2] ?>">
               <img src="<?php echo $fthumb[2] ?>" alt="American Favourite" />
               <div class="menuCaption outer212">
                  <div class="inner10">
                     <h5><?php echo stringtrim(19,$fnama[2]) ?></h5>
                  </div>
               </div>
            </a>
         </div>
         <div class="menuGrid43">
            <a href="resto.php?id=<?php echo $fid[3] ?>">
               <img src="<?php echo $fthumb[3] ?>" alt="American Favourite" />
               <div class="menuCaption outer212">
                  <div class="inner10">
                     <h5><?php echo stringtrim(19,$fnama[3]) ?></h5>
                  </div>
               </div>
            </a>
         </div>
         <div class="menuGrid44">
            <a href="resto.php?id=<?php echo $fid[4] ?>">
               <img src="<?php echo $fthumb[4] ?>" alt="American Favourite" />
               <div class="menuCaption outer212">
                  <div class="inner10">
                     <h5><?php echo stringtrim(19,$fnama[4]) ?></h5>
                  </div>
               </div>
            </a>
         </div>
         <span class="clears"></span>
      </div>
      <div class="rowContainer">
         <p class="rowHeader">random places</p>
         <div class="menuGrid41">
            <a href="resto.php?id=<?php echo $rid[1] ?>">
               <img src="<?php echo $rthumb[1] ?>" alt="American Favourite" />
               <div class="menuCaption outer212">
                  <div class="inner10">
                     <h5><?php echo stringtrim(19,$rnama[1]) ?></h5>
                  </div>
               </div>
            </a>
         </div>
         <div class="menuGrid42">
            <a href="resto.php?id=<?php echo $rid[2] ?>">
               <img src="<?php echo $rthumb[2] ?>" alt="American Favourite" />
               <div class="menuCaption outer212">
                  <div class="inner10">
                     <h5><?php echo stringtrim(19,$rnama[2]) ?></h5>
                  </div>
               </div>
            </a>
         </div>
         <div class="menuGrid43">
            <a href="resto.php?id=<?php echo $rid[3] ?>">
               <img src="<?php echo $rthumb[3] ?>" alt="American Favourite" />
               <div class="menuCaption outer212">
                  <div class="inner10">
                     <h5><?php echo stringtrim(19,$rnama[3]) ?></h5>
                  </div>
               </div>
            </a>
         </div>
         <div class="menuGrid44">
            <a href="resto.php?id=<?php echo $rid[4] ?>">
               <img src="<?php echo $rthumb[4] ?>" alt="American Favourite" />
               <div class="menuCaption outer212">
                  <div class="inner10">
                     <h5><?php echo stringtrim(19,$rnama[4])?></h5>
                  </div>
               </div>
            </a>
         </div>
         <span class="clears"></span>
      </div>
   </div>
</div>
<?php
include "footer.php";
?>