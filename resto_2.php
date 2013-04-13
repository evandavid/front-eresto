<div id="secondaryNavContainer">
   <div class="secondaryNav">
      <ul class="nav2">
         <li class="active" id="nav21"><a href="">All</a></li>
         <li id="nav22"><a href="">Foods</a></li>
         <li id="nav23"><a href="">Beverages</a></li>
         <li id="nav24"><a href="">Other</a></li>
      </ul>
   </div>
</div>
<div class="mainContents">
   <div id="tab22">
      <h4>Foods</h4><hr>
      <?php
      $sqfood="SELECT * FROM kategori a, menu b 
         WHERE b.resto_id_resto='$id_resto' AND a.id_kategori=b.kategori_id_kategori AND a.id_kategori='26'";
      //echo "$sqfood";
      $qfood=mysql_query($sqfood);
      if(mysql_num_rows($qfood)<=0){
         echo "Undefined";
      }else{
         $i=1;
         while($rfood=mysql_fetch_array($qfood)){
            $baris=ceil($i/3);
            $letak=$i-($baris-1)*3;
            if ($letak==1){
              echo "<div class=\"menuRowContainer\">";
            }
            ?>
            <div class="menuGrid3<?php echo $letak ?>">
               <a href="menu.php?idmenu=<?php echo $rfood['id_menu']?>" rel="clearbox[gallery=gallerymenu,,width=550,,height=530]">
                  <img alt="<?php echo $rfood['menu_nama'] ?>" src="<?php echo setpp($rfood['menu_thumb']) ?>" />
               </a>
               <div class="menuCaption outer212">
                  <div class="inner10">
                     <h5><?php echo $rfood['menu_nama'] ?></h5>
                  </div>
               </div>
            </div>
            <?php
            if ($letak==3){
               echo "<span class=\"clears\"></span></div>";
            }

            $i++;
         }
         if ($letak!=3){
           echo "<span class=\"clears\"></span></div><br>"; 
         }
      }
      ?>   
   </div>
   <div id="tab23">
      <h4>Beverages</h4><hr>
      <?php
      $sqfood="SELECT * FROM kategori a, menu b 
         WHERE b.resto_id_resto='$id_resto' AND a.id_kategori=b.kategori_id_kategori AND a.id_kategori='27'";
      //echo "$sqfood";
      $qfood=mysql_query($sqfood);
      if(mysql_num_rows($qfood)<=0){
         echo "Undefined";
      }else{
         $i=1;
         while($rfood=mysql_fetch_array($qfood)){
            $baris=ceil($i/3);
            $letak=$i-($baris-1)*3;
            if ($letak==1){
              echo "<div class=\"menuRowContainer\">";
            }
            ?>
            <div class="menuGrid3<?php echo $letak ?>">
               <a href="menu.php?idmenu=<?php echo $rfood['id_menu']?>" rel="clearbox[gallery=gallerymenu,,width=550,,height=530]">
                  <img alt="<?php echo $rfood['menu_nama'] ?>" src="<?php echo setpp($rfood['menu_thumb']) ?>" />
               </a>
               <div class="menuCaption outer212">
                  <div class="inner10">
                     <h5><?php echo $rfood['menu_nama'] ?></h5>
                  </div>
               </div>
            </div>
            <?php
            if ($letak==3){
               echo "<span class=\"clears\"></span></div>";
            }

            $i++;
         }
         if ($letak!=3){
           echo "<span class=\"clears\"></span></div><br>"; 
           //echo "$i";
         }else{
            echo "<br>";
         }
      }?>
   </div>
   <div id="tab24">
      <h4>Other</h4><hr>
      <?php
      $sqfood="SELECT * FROM kategori a, menu b 
         WHERE b.resto_id_resto='$id_resto' AND a.id_kategori=b.kategori_id_kategori AND a.id_kategori='28'";
      //echo "$sqfood";
      $qfood=mysql_query($sqfood);
      if(mysql_num_rows($qfood)<=0){
         echo "Undefined";
      }else{
         $i=1;
         while($rfood=mysql_fetch_array($qfood)){
            $baris=ceil($i/3);
            $letak=$i-($baris-1)*3;
            if ($letak==1){
              echo "<div class=\"menuRowContainer\">";
            }
            ?>
            <div class="menuGrid3<?php echo $letak ?>">
               <a href="menu.php?idmenu=<?php echo $rfood['id_menu']?>" rel="clearbox[gallery=gallerymenu,,width=550,,height=530]">
                  <img alt="<?php echo $rfood['menu_nama'] ?>" src="<?php echo setpp($rfood['menu_thumb']) ?>" />
               </a>
               <div class="menuCaption outer212">
                  <div class="inner10">
                     <h5><?php echo $rfood['menu_nama'] ?></h5>
                  </div>
               </div>
            </div>
            <?php
            if ($letak==3){
               echo "<span class=\"clears\"></span></div>";
            }

            $i++;
         }
         if ($letak!=3){
           echo "<span class=\"clears\"></span></div><br>"; 
         }
      }?>
   </div>
</div>