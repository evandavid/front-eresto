<script type="text/javascript" src="asset/js/axuploader.js"></script>
<script>
	$(document).ready(function(){
		$('.prova').axuploader({
			url:'upload_files/upload_file.php',
			allowExt:['jpg','gif','jpeg','png'],
			data:'id=<?php echo $usr_resto ?>',
			finish:function(x,files){  },
			enable:true,
			remotePath:function(){
				return '<?php echo $username ?>/';
			}
		});
	});
	</script>
<div class="row-fluid hidden-phone">
	<div class="span7"><img src="asset/img/admin/resto.jpg"></div>
	<div class="span5">
		<h3>Photos</h3><hr>
		<p style="text-align:justify">Pengen pengunjung makin penasaran dengan restomu? Ayoo <b>upload foto-foto spot terbaik</b> di resto mu agar pengunjung makin tertarik untuk datang dan menikmati hidangan sekaligus nuansa restomu</p>
	</div>
</div><br>

<div class="row-fluid">
   <div class="span12">
      <ul class="nav nav-tabs" id="tabmenu">
         <li class="active"><a href="#Photos">Photos</a></li>
         <li><a href="#UploadPhoto">Upload Photo</a></li>
         <li><a href="#ManagePhoto">Manage Photos</a></li>
      </ul>
      <div class="tab-content">
         <div class="tab-pane active" id="Photos">
         	<?php
         	$sphoto="SELECT * FROM foto WHERE resto_id_resto=$usr_resto ORDER BY RAND()";
         	$qphoto=mysql_query($sphoto);
         	while ($rphoto=mysql_fetch_array($qphoto)){
         		echo "<div class='photothumb'><a href='upload_files/$rphoto[dir]' rel='clearbox[gallery=menu]'><img src='upload_files/$rphoto[dir]'></a></div>";
         	}
         	?>
         </div>
         <div class="tab-pane" id="UploadPhoto">
            <h4>Upload Photos</h4>
            <div class="prova"></div>
            <!-- tombol disable dan enable
               <input type="button" onclick="$('.prova').axuploader('disable')" value="asd" />
               <input type="button" onclick="$('.prova').axuploader('enable')" value="ok" />-->
            <div id="debug"></div>
         </div>
         <div class="tab-pane" id="ManagePhoto">Coming Soon</div>

      </div>
   </div>
</div>
<script src="asset/clearbox/clearbox.js?dir=asset/clearbox/clearbox" type="text/javascript"></script>
<script>
  $(function () {
  	$('#tabmenu a').click(function (e) {
	  e.preventDefault();
	  $(this).tab('show');
	});
  })
</script>
