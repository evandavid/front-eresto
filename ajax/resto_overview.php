<?php 
?>
					<div id="loading" align="center"><img src="asset/img/load.gif" /></div>
					<iframe width="670" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=+&amp;q=the+valley+bandung&amp;ie=UTF8&amp;hq=the+valley&amp;hnear=Bandung,+West+Java,+Indonesia&amp;ll=-6.863595,107.63399&amp;spn=0.075757,0.132093&amp;t=m&amp;z=14&amp;iwloc=A&amp;cid=13284970342866694116&amp;output=embed"></iframe><br /><small><a href="https://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=+&amp;q=the+valley+bandung&amp;ie=UTF8&amp;hq=the+valley&amp;hnear=Bandung,+West+Java,+Indonesia&amp;ll=-6.863595,107.63399&amp;spn=0.075757,0.132093&amp;t=m&amp;z=14&amp;iwloc=A&amp;cid=13284970342866694116" style="color:white;text-decoration:none;text-align:left;">View Larger Map</a></small>
					<div class="about">
						<p class="story"><?php echo $des ?></p>
					</div>
					<h4>Menu</h4><hr>
					<div class="menuRowContainer">
					<?php
					$sqmenu="SELECT menu_thumb, menu_nama FROM menu WHERE resto_id_resto='$id_resto' ORDER BY RAND() LIMIT 1,3";
					$qmenu=mysql_query($sqmenu);
					if (mysql_num_rows($qmenu)>=1){
						$i=1;
						while($rmenu=mysql_fetch_array($qmenu)){
							$menu_thumb=$rmenu['menu_thumb'];
							$menu_nama=$rmenu['menu_nama'];
							?>
							<div class="menuGrid3<?php echo $i ?>">
								<img alt="<?php echo $menu_nama ?>" src="<?php echo setpp($menu_thumb)?>">
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

					<h4>Testimonial</h4>
					<div class="menuRowContainer outer">
						<div class="inner">
							
						</div>
						<span class="clears"></span>
					</div>

<?php 
?>