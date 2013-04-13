<?php
include "header.php";
include "inc/conn.php";
include "fungsirifan.php";
include "c_navbar.php";

if (isset($_GET['id'])){
	$id_resto=$_GET['id'];
	$sqr="SELECT * FROM resto WHERE id_resto='$id_resto'";
	$qr=mysql_query($sqr);
	$r1=mysql_fetch_array($qr);
	$nama=$r1['resto_nama'];
	$latt=$r1['resto_latt'];
	$long=$r1['resto_long'];
	$des=$r1['resto_des'];
	$like=$r1['resto_like'];
	$telp=$r1['resto_telp'];
	$harga1=setharga($r1['resto_harga1']);
	$harga2=setharga($r1['resto_harga2']);
	$alamat=$r1['resto_alamat'];
	$fb=$r1['resto_fb'];
	$twitter=$r1['resto_twitter'];
	$thumb=setpp($r1['resto_thumb']);
	$email=$r1['resto_email'];
	$web=$r1['resto_web'];
	$jamb=$r1['resto_jamb'];
	$jamt=$r1['resto_jamt'];
}else{
	echo "<script>location.href='index.php'</script>";
}
?>
<script src="asset/clearbox/clearbox.js?dir=asset/clearbox/clearbox" type="text/javascript"></script>
<script type="text/javascript" src="asset/Socialite-master/socialite.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	var tab1 = $("#tab1");
	var tab2 = $("#tab2");
	var tab3 = $("#tab3");
	var tab4 = $("#tab4");
	var tab5 = $("#tab5");
	var tab22 = $("#tab22");
	var tab23 = $("#tab23");
	var tab24 = $("#tab24");

	//inisialisasi
	tab1.show(1000);
	tab2.hide();
	tab3.hide();
	tab4.hide();
	tab5.hide();

	$("#nav1").click(function(){
		tab1.show(1000);
		tab2.hide();
		tab3.hide();
		tab4.hide();
		tab5.hide();
		$("#nav1").attr({class:"active"});
		$("#nav3").attr({class:"hahaha"});
		$("#nav4").attr({class:"hahaha"});
		$("#nav5").attr({class:"hahaha"});
		$("#nav2").attr({class:"hahaha"});
		return false;
	});

	$("#nav2").click(function(){
		tab2.show(1000);
		tab1.hide();
		tab3.hide();
		tab4.hide();
		tab5.hide();
		$("#nav1").attr({class:"hahaha"});
		$("#nav3").attr({class:"hahaha"});
		$("#nav4").attr({class:"hahaha"});
		$("#nav5").attr({class:"hahaha"});
		$("#nav2").attr({class:"active"});
		return false;
	});

	$("#nav3").click(function(){
		tab3.show(1000);
		tab1.hide();
		tab2.hide();
		tab4.hide();
		tab5.hide();
		$("#nav1").attr({class:"hahaha"});
		$("#nav3").attr({class:"active"});
		$("#nav4").attr({class:"hahaha"});
		$("#nav5").attr({class:"hahaha"});
		$("#nav2").attr({class:"hahaha"});
		return false;
	});

	$("#nav4").click(function(){
		tab4.show(1000);
		tab1.hide();
		tab3.hide();
		tab2.hide();
		tab5.hide();
		$("#nav1").attr({class:"hahaha"});
		$("#nav3").attr({class:"hahaha"});
		$("#nav2").attr({class:"hahaha"});
		$("#nav5").attr({class:"hahaha"});
		$("#nav4").attr({class:"active"});
		return false;
	});

	$("#nav5").click(function(){
		tab5.show(1000);
		tab1.hide();
		tab3.hide();
		tab4.hide();
		tab2.hide();
		$("#nav1").attr({class:"hahaha"});
		$("#nav3").attr({class:"hahaha"});
		$("#nav4").attr({class:"hahaha"});
		$("#nav2").attr({class:"hahaha"});
		$("#nav5").attr({class:"active"});
		return false;
	});

	$("#nav21").click(function(){
		tab22.fadeIn(500);
		tab23.fadeIn(500);
		tab24.fadeIn(500);
		$("#nav24").attr({class:"hahaha"});
		$("#nav21").attr({class:"active"});
		$("#nav22").attr({class:"hahaha"});
		$("#nav23").attr({class:"hahaha"});
		return false;
	});

	$("#nav22").click(function(){
		tab22.fadeIn(1000);
		tab23.fadeOut();
		tab24.fadeOut();
		$("#nav24").attr({class:"hahaha"});
		$("#nav22").attr({class:"active"});
		$("#nav21").attr({class:"hahaha"});
		$("#nav23").attr({class:"hahaha"});
		return false;
	});

	$("#nav23").click(function(){
		tab23.fadeIn(1000);
		tab22.fadeOut();
		tab24.fadeOut();
		$("#nav24").attr({class:"hahaha"});
		$("#nav23").attr({class:"active"});
		$("#nav22").attr({class:"hahaha"});
		$("#nav21").attr({class:"hahaha"});
		return false;
	});

	$("#nav24").click(function(){
		tab24.fadeIn(1000);
		tab22.fadeOut();
		tab23.fadeOut();
		$("#nav24").attr({class:"active"});
		$("#nav23").attr({class:"hahah"});
		$("#nav22").attr({class:"hahaha"});
		$("#nav21").attr({class:"hahaha"});
		return false;
	});


});
</script>
	<div id="secondHeader">
		<div class="centerContainer">
			<div>
				<div id="secondHeaderInfo" class="fl">
					<h1><?php echo $nama ?></h1>
					
					
					<div class="row-fluid">
						<div class="span7">
							<h2><?php echo $telp ?></h2>
							<h3><?php echo $alamat ?></h3>
							<a href="http://<?php echo $web ?>" target="_blank"><?php echo $web ?></a>
						</div>
						<div class="span5" style="text-align:right">
							<ul class="social-buttons cf">
								<li><div class="socialite twitter-share socialite-instance socialite-loaded" data-text="<?php echo 'e-resto | '.$nama?>" data-url="http://eresto.co.id/resto.php?id=<?php echo $id_resto?>" data-count="vertical" data-default-href="http://twitter.com/share" data-socialite="0"><iframe allowtransparency="true" frameborder="0" scrolling="no" src="http://platform.twitter.com/widgets/tweet_button.1354270846.html#_=1354489578790&amp;count=vertical&amp;id=twitter-widget-0&amp;lang=en&amp;original_referer=http%3A%2F%2Flocalhost%2Feresto%2Ffront%2Fasset%2FSocialite-master%2Fdemo%2Fhover.html&amp;size=m&amp;text=<?php echo 'e-resto | '.$nama?>&amp;url=http%3A%2F%2Feresto.co.id/resto.php?id=<?php echo $id_resto?>" class="twitter-share-button twitter-count-vertical" style="width: 59px; height: 62px;" title="Twitter Tweet Button" data-twttr-rendered="true"></iframe></div></li>
								<li><div class="socialite googleplus-one socialite-instance socialite-loaded" data-size="tall" data-href="http://eresto.co.id/resto.php?id=<?php echo $id_resto?>" data-default-href="https://plus.google.com/share?url=http://eresto.co.id/resto.php?id=<?php echo $id_resto?>" data-socialite="1"><div class="g-plusone" data-size="tall" data-href="http://eresto.co.id/resto.php?id=<?php echo $id_resto?>" data-default-href="https://plus.google.com/share?url=http://eresto.co.id/resto.php?id=<?php echo $id_resto?>" data-socialite="1" id="___plusone_0" style="height: 60px; width: 50px; display: inline-block; text-indent: 0px; margin: 0px; padding: 0px; background-color: transparent; border-style: none; float: none; line-height: normal; font-size: 1px; vertical-align: baseline; background-position: initial initial; background-repeat: initial initial;"><iframe allowtransparency="true" frameborder="0" hspace="0" marginheight="0" marginwidth="0" scrolling="no" style="position: static; top: 0px; width: 50px; margin: 0px; border-style: none; left: 0px; visibility: visible; height: 60px;" tabindex="0" vspace="0" width="100%" id="I0_1354489578814" name="I0_1354489578814" src="https://plusone.google.com/_/+1/fastbutton?bsv&amp;size=tall&amp;default-href=https%3A%2F%2Fplus.google.com%2Fshare%3Furl%3Dhttp%3A%2F%2Feresto.co.id/resto.php?id=<?php echo $id_resto?>&amp;socialite=1&amp;hl=en-GB&amp;origin=http%3A%2F%2Flocalhost&amp;url=http%3A%2F%2Feresto.co.id/resto.php?id=<?php echo $id_resto?>%2F&amp;jsh=m%3B%2F_%2Fscs%2Fapps-static%2F_%2Fjs%2Fk%3Doz.gapi.en.SLP5qkZ8HQc.O%2Fm%3D__features__%2Fam%3DAQ%2Frt%3Dj%2Fd%3D1%2Frs%3DAItRSTP8oF4OdmXigTxJ29Ec8A0jrMsu_A#_methods=onPlusOne%2C_ready%2C_close%2C_open%2C_resizeMe%2C_renderstart%2Concircled%2Constartinteraction%2Conendinteraction&amp;id=I0_1354489578814&amp;parent=http%3A%2F%2Flocalhost" title="+1"></iframe></div></div></li>
								<li><div class="socialite facebook-like socialite-instance socialite-loaded" data-href="http://eresto.co.id/resto.php?id=<?php echo $id_resto?>" data-send="false" data-layout="box_count" data-width="60" data-show-faces="false" data-default-href="http://www.facebook.com/sharer.php?u=http://eresto.co.id/resto.php?id=<?php echo $id_resto?>&amp;t=<?php echo 'e-resto | '.$nama?>" data-socialite="2"><div class="fb-like fb_edge_widget_with_comment fb_iframe_widget" data-href="http://eresto.co.id/resto.php?id=<?php echo $id_resto?>" data-send="false" data-layout="box_count" data-width="60" data-show-faces="false" data-default-href="http://www.facebook.com/sharer.php?u=http://eresto.co.id/resto.php?id=<?php echo $id_resto?>&amp;t=<?php echo 'e-resto | '.$nama?>" data-socialite="2" fb-xfbml-state="rendered"><span style="height: 61px; width: 44px;"><iframe id="f33906d838" name="f2e7b340bc" scrolling="no" style="border: none; overflow: hidden; height: 61px; width: 44px;" title="Like this content on Facebook." class="fb_ltr" src="http://www.facebook.com/plugins/like.php?api_key=&amp;locale=en_GB&amp;sdk=joey&amp;channel_url=http%3A%2F%2Fstatic.ak.facebook.com%2Fconnect%2Fxd_arbiter.php%3Fversion%3D17%23cb%3Df260269fb8%26origin%3Dhttp%253A%252F%252Flocalhost%252Ff24d0a1c14%26domain%3Dlocalhost%26relation%3Dparent.parent&amp;href=http%3A%2F%2Feresto.co.id/resto.php?id=<?php echo $id_resto?>&amp;node_type=link&amp;width=60&amp;layout=box_count&amp;colorscheme=light&amp;show_faces=false&amp;send=false&amp;extended_social_context=false"></iframe></span></div></div></li>
							</ul>
						</div>
					</div>
					
					<!--<a href="http://www.facebook.com/dialog/feed?app_id=425020537556495&redirect_uri=www.eresto.co.id/resto.php?id=<?php echo $id_resto ?>">share</a>
					-->
				</div>
				<div class="avatarContainer fl">
					<img alt="eResto logo" src="<?php echo $thumb ?>">
				</div>
				<span class="clear"></span>
			</div>
			<div id="mainNavi">
				<ul class="menu" rel="sam1">  
					<li class="active" id="nav1"><a href="">Overview</a></li>  
					<li id="nav2"><a href="">Menu</a></li>  
					<li id="nav3"><a href="">Photos</a></li>  
					<li id="nav4"><a href="">Events&Promo</a></li>  
					<li id="nav5"><a href="">About</a></li>  
				</ul>  
			</div>
		</div>
	</div>

	<div class="centerContainer">
		<div id="mainContainer">
			<div id="leftContainer" class="fl">
				
					<div id="tab1">
						<?php
						include "resto_1.php";
						?>
					</div>
					<div id="tab2">
						<?php
						include "resto_2.php";
						?>
					</div>
					<div id="tab3">
						<?php
						include "resto_3.php";
						?>
					</div>
					<div id="tab4">
						<?php
						include "resto_4.php";
						?>
					</div>
					<div id="tab5">
						<?php
						include "resto_1.php";
						?>
					
				</div>
			</div>
			<div id="rightContainer" class="fr">
				<div class="rightItem">
					<p class="rightItemTitle">About</p>
					<p><?php echo $des ?></p>
				</div>
				<div class="rightItem">
					<p class="rightItemTitle">Price Range</p>
					<p><?php echo $harga1." - ".$harga2?></P>
				</div>
				<div class="rightItem">
					<p class="rightItemTitle">Facilities</p>
					<table border="0">
						<?php
						$sqfas="SELECT * FROM fasilitas f, resto r, resto_has_fasilitas rf 
									WHERE r.id_resto=rf.resto_id_resto and 
										r.id_resto='$id_resto' and f.id_fasilitas=rf.fasilitas_id_fasilitas;";
						$qfas=mysql_query($sqfas);
						if (mysql_num_rows($qfas)>=1){
							$i=1;
							while ($rfas=mysql_fetch_array($qfas)){
								if ($i%2!=0){
									echo "<tr>";
								}
								echo "<td width=\"50%\">$rfas[fasilitas_nama]</td>";
								if ($i%2==0){
									echo "</tr>";
								}
								$i++;
							}
						}else{
							echo "Not Specified";
						}
						?>
					</table>
				</div>
				<div class="rightItem">
					<p class="rightItemTitle">Random Resto</p>
					<?php
					$sqrr="SELECT * FROM resto ORDER BY RAND() LIMIT 1,7";
					$qrr=mysql_query($sqrr);
					while($rrr=mysql_fetch_array($qrr)){
						echo "<a href='resto.php?id=$rrr[id_resto]'>".$rrr['resto_nama']."</a><br>";
					}
					?>
				</div>
			</div>
			<span class="clears"></span>
		</div>
	</div>


<?php
include "footer.php";
?>