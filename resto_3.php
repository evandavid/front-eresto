<div class="mainContents">
<?php
         $sphoto="SELECT * FROM foto WHERE resto_id_resto=$id_resto ORDER BY RAND()";
         $qphoto=mysql_query($sphoto);
         if (mysql_num_rows($qphoto)>=1){
         	while ($rphoto=mysql_fetch_array($qphoto)){
         	echo "<div class='photothumb2'><a href='upload_files/$rphoto[dir]' rel='clearbox[gallery=photo]'><img src='upload_files/$rphoto[dir]'></a></div>";
         	}
         }else{
         	echo "No Photos Available";
         }
         	
?>
<br>
</div>