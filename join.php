<?php 
session_start();
include "header.php";
include "c_navbar.php";
include "fungsirifan.php";
?>
<script src="asset/clearbox/clearbox.js?dir=asset/clearbox/clearbox" type="text/javascript"></script>
<div class="container-fluid ad_konten">
	<div class="row-fluid">
		<div class="span8 bg1 offset2">
			<div class="hero-unit">
			  <h1>Let's start!</h1>
			  <p>Bergabunglah bersama ratusan resto lainnya dan dapatkan bermacam fitur menarik dari e-resto dengan 
			  	hanya melakukan <a href='#signupdiv'>sign up</a></p>
			</div>
			<a href='images/mobile/2 main.jpg' rel='clearbox[gallery=mockup]'><img src='images/mobile/2 main.jpg' width="24%"></a>
			<a href='images/mobile/3 resto.jpg' rel='clearbox[gallery=mockup]'><img src='images/mobile/3 resto.jpg' width="24%"></a>
			<a href='images/mobile/8 menu.jpg' rel='clearbox[gallery=mockup]'><img src='images/mobile/8 menu.jpg' width="24%"></a>
			<a href='images/mobile/5 photos.jpg' rel='clearbox[gallery=mockup]'><img src='images/mobile/5 photos.jpg' width="24%"></a>
			<p>Dengan hanya melakukan signup, resto Anda sudah dapat dilihat oleh jutaan orang 
				di Indonesia melalui mobile application (e-resto finder) dan <a href='http://eresto.co.id'>e-resto website</a></P><br>
			<div id="signupdiv">
				<hr>
				<center><h4>SIGN UP</h4></center>
				<?php
				include "signup.php";
				?>
			</div>
		</div>
	</div>
</div>
<?php
include "footer.php";
?>