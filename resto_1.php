<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=425020537556495";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="mainContents">
						<div>

						</div>
						<div class="about">
							<?php 
							$latlong="$latt".","."$long"; 
							$staticmap="http://maps.googleapis.com/maps/api/staticmap?zoom=14&markers=color:red%7Ccolor:red%7Clabel:C%7C"."$latlong"."&sensor=true&size=640x300&key=AIzaSyC-OIZq8IRFtikFAj42BLSlCnRGs4L-u3E";
							//echo "$staticmap";
							?>							
							<a href="http://maps.google.com/maps?z=18&q=<?php echo $latlong ?>" target="_blank"><img class="staticmap" src="<?php echo $staticmap ?>"></a>
							<p class="story"><?php echo $des ?></p>
						</div>
						<h4>Menu</h4><hr>
						<div class="menuRowContainer">
						<?php
						$sqmenu="SELECT * FROM menu WHERE resto_id_resto='$id_resto' ORDER BY RAND() LIMIT 1,3";
						$qmenu=mysql_query($sqmenu);
						if (mysql_num_rows($qmenu)>=1){
							$i=1;
							while($rmenu=mysql_fetch_array($qmenu)){
								$menu_thumb=$rmenu['menu_thumb'];
								$menu_nama=$rmenu['menu_nama'];
								?>
								<div class="menuGrid3<?php echo $i ?>">
									<a href="menu.php?idmenu=<?php echo $rmenu['id_menu']?>" rel="clearbox[gallery=gallerymenu,,width=550,,height=530]">
										<img alt="<?php echo $menu_nama ?>" src="<?php echo setpp($menu_thumb)?>">
									</a>
									<div class="menuCaption outer212">
										<div class="inner10">
											<h5><?php echo $menu_nama ?></h5>
										</div>
									</div>
								</div>
								<?php
								$i++;
							}
							echo "
							<span class=\"clears\"></span>
							<div align=\"right\" style=\"margin-top:10px;\">
								<a href=\"\">view all menu</a>
							</div>";
						}else{
							echo "No Menu Available in this resto!";
							echo "<span class=\"clears\"></span>";
						}
						
						?>
							
						</div>

						<h4>Photos</h4><hr>
						<div class="menuRowContainer outer">
							<div class="inner">
								<?php
								$sqpho="SELECT dir from foto WHERE resto_id_resto='$id_resto' ORDER BY RAND() LIMIT 1,3 ";
								$qpho=mysql_query($sqpho);
								$i=1;
								if (mysql_num_rows($qpho)>=1){
									while ($rpho=mysql_fetch_array($qpho)) {
										?>
										<div class="menuGrid3<?php echo $i?>">
											<a href="upload_files/<?php echo $rpho['dir']?>" rel="clearbox[gallery=photos]"><img src="upload_files/<?php echo $rpho['dir']?>"></a>
										</div>
										<?php
										$i++;
									}
									echo "</div>
									<span class=\"clears\"></span>
									<div align=\"right\" style=\"margin-top:10px;\">
										<a href=\"\">view all photos</a>
									</div>";
								}else{
									echo "No Photos Available in this resto!";
									echo "</div><span class=\"clears\"></span>";
								}
								?>
						</div>

						<h4>Testimonial</h4><hr>
						<div class="menuRowContainer outer">
							<div class="inner">
								<div class="fb-comments" data-href="http://eresto.co.id/resto.php?id=<?php echo $id_resto ?>" data-width="670" data-num-posts="5"></div> 
							</div>
							<span class="clears"></span>
						</div>

						</div>