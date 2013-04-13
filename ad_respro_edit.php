<script type="text/javascript" src="asset/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
// Creates a new plugin class and a custom listbox
tinymce.create('tinymce.plugins.ExamplePlugin', {
    createControl: function(n, cm) {
        switch (n) {
            case 'mylistbox':
                var mlb = cm.createListBox('mylistbox', {
                     title : 'My list box',
                     onselect : function(v) {
                         tinyMCE.activeEditor.windowManager.alert('Value selected:' + v);
                     }
                });

                // Add some values to the list box
                mlb.add('Some item 1', 'val1');
                mlb.add('some item 2', 'val2');
                mlb.add('some item 3', 'val3');

                // Return the new listbox instance
                return mlb;

            case 'mysplitbutton':
                var c = cm.createSplitButton('mysplitbutton', {
                    title : 'My split button',
                    image : 'img/example.gif',
                    onclick : function() {
                        tinyMCE.activeEditor.windowManager.alert('Button was clicked.');
                    }
                });

                c.onRenderMenu.add(function(c, m) {
                    m.add({title : 'Some title', 'class' : 'mceMenuItemTitle'}).setDisabled(1);

                    m.add({title : 'Some item 1', onclick : function() {
                        tinyMCE.activeEditor.windowManager.alert('Some  item 1 was clicked.');
                    }});

                    m.add({title : 'Some item 2', onclick : function() {
                        tinyMCE.activeEditor.windowManager.alert('Some  item 2 was clicked.');
                    }});
                });

                // Return the new splitbutton instance
                return c;
        }

        return null;
    }
});

// Register plugin with a short name
tinymce.PluginManager.add('example', tinymce.plugins.ExamplePlugin);

// Initialize TinyMCE with the new plugin and listbox
tinyMCE.init({
    plugins : '-example', // - tells TinyMCE to skip the loading of the plugin
    mode : "textareas",
    theme : "advanced",
    theme_advanced_buttons1 : "mylistbox,mysplitbutton,bold,italic,underline,separator,strikethrough,justifyleft,justifycenter,justifyright,justifyfull,bullist,numlist,undo,redo,link,unlink",
    theme_advanced_buttons2 : "",
    theme_advanced_buttons3 : "",
    theme_advanced_toolbar_location : "top",
    theme_advanced_toolbar_align : "left",
    theme_advanced_statusbar_location : "bottom"
});

$('#save').click(function(){
    var val = [];
    $(':checkbox:checked').each(function(i){
      val[i] = $(this).val();
    });
});
</script>
<?php
$sres="SELECT * FROM resto WHERE id_resto='$usr_resto'";
$qres=mysql_query($sres);
$rres=mysql_fetch_array($qres);
$nama=$rres['resto_nama'];
$latt=$rres['resto_latt'];
$long=$rres['resto_long'];
$des=$rres['resto_des'];
$like=$rres['resto_like'];
$telp=$rres['resto_telp'];
$harga1="Rp ".number_format($rres['resto_harga1'],0,",",".");
$harga2="Rp ".number_format($rres['resto_harga2'],0,",",".");
$alamat=$rres['resto_alamat'];
$fb=$rres['resto_fb'];
$twitter=$rres['resto_twitter'];
$thumb=$rres['resto_thumb'];
$email=$rres['resto_email'];
$web=$rres['resto_web'];
$jamb=$rres['resto_jamb'];
$jamt=$rres['resto_jamt'];

	
?>
<div class="row-fluid">
	<div class="span12">
		<h3 class="h3">[EDIT] Profil Resto</h3><div style="margin-top:11px;"></div>
	</div>
</div>
<div class="row-fluid">
	<div class="span2">
		<?php
		if ($thumb==""){
			echo "<img src='asset/img/picture.png'>";
		}else{
			echo "<img src='$thumb'>";
		}
		?>
		
	</div>
	<div class="span10">
		<form action="ad_main.php?mod=respro" method="post">
		<table class="table table-striped table-hover">
			<tr>
				<td width="30%">Nama Resto</td>
				<td><input type="text" value="<?php echo $nama ?>" id="nama" name="nama"></td>
			</tr>
			<tr>
				<td>Deskripsi</td>
				<td colspan="2"><textarea rows="3" name="des" id="des"><?php echo $des ?></textarea></td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td><input type="text" value="<?php echo $alamat ?>" id="alamat" name="alamat"></td>
			</tr>
			<tr>
				<td>Lattitude/Longitude</td>
				<td><input type="text" value="<?php echo $latt ?>" id="latt" name="latt" class="input-medium">&nbsp;/&nbsp;<input type="text" value="<?php echo $long ?>" id="long" name="long" class="input-medium"></td>
			</tr>
			<tr>
				<td>Jam Operasional</td>
				<td><input type="text" value="<?php echo $jamb ?>" id="jamb" class="input-mini" name="jamb">&nbsp;-&nbsp;<input type="text" class="input-mini" value="<?php echo $jamt ?>" id="jamt" name="jamt"></td>
			</tr>
			<tr>
				<td>Range Harga</td>
				<td>
					<div class="input-prepend" style="float:left;"><span class="add-on">Rp</span>
						<input type="text" value="<?php echo $rres['resto_harga1'] ?>" id="harga1" name="harga1" class="input-mini"></div><div style="height:30px;float:left;">&nbsp;-&nbsp;</div>
					<div class="input-prepend"><span class="add-on">Rp</span>
						<input type="text" value="<?php echo $rres['resto_harga2'] ?>" id="harga2" name="harga2" class="input-mini"></div>
				</td>
			</tr>
			<tr>
				<td>Telp</td>
				<td><input type="text" value="<?php echo $telp ?>" id="telp" name="telp"></td>
			</tr>
			<tr>
				<td>Fasilitas</td>
				<td><table border="0"><?php
				$sfas="SELECT * FROM fasilitas";
				$qfas=mysql_query($sfas);
				$i=1;
				while($rfas=mysql_fetch_array($qfas)){
					$sqff="SELECT * FROM resto_has_fasilitas WHERE resto_id_resto=$usr_resto AND fasilitas_id_fasilitas=$rfas[id_fasilitas]";
					$qff=mysql_query($sqff);
					if (mysql_num_rows($qff)>=1){
						$cff="checked='checked'";
					}else{
						$cff="";
					}
					if ($i==1 || $i==4 || $i==7 || $i==10 || $i==13){ echo "<tr>";}
					echo "<td>
							<label class='checkbox inline'>
							<input type='checkbox' name='fasilitas[$i]' $cff id='fas$rfas[id_fasilitas]' value='$rfas[id_fasilitas]'> $rfas[fasilitas_nama] &nbsp;&nbsp;&nbsp;
							</label>
							</td>";
					if ($i%3==0){ echo "</tr>";}
					$i++;
				} 
				?></table>
				</td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input type="text" value="<?php echo $email ?>" id="email" name="email"></td>
			</tr>
			<tr>
				<td>Website</td>
				<td><div class="input-prepend">
					<span class="add-on">http://</span>
					<input type="text" value="<?php echo $web ?>" id="web" name="web"></div></td>
			</tr>
			<tr>
				<td>Facebook</td>
				<td><div class="input-prepend"><span class="add-on">facebook.com/</span>
					<input type="text" class="input-medium" value="<?php echo $fb ?>" id="fb" name="fb"></div>
				</td>
			</tr>
			<tr>
				<td>Twitter</td>
				<td><div class="input-prepend">
					<span class="add-on">@</span>
					<input type="text" value="<?php echo $twitter ?>" id="twitter" name="twitter" class="input-medium"></div>
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center">
					<a href="?mod=respro" class="btn btn-danger">Cancel</a>
					<input type="submit" class="btn btn-primary" id"save" value="Save" name="update">
				</td>
			</tr>
		</table>
	</div>
	</form>
</div>