<?php
$sprom="SELECT * FROM promo";
$qprom=mysql_query($sprom);
if (mysql_num_rows($qprom)<=0){
	echo "Undefined";
}
while($rprom=mysql_fetch_array($qprom)){
?>	<div style="width:98%;">
		<div class="row-fluid adbgpromo">
			<div class="span7">
				<a href="<?php echo $rprom['promo_poster']?>" rel="clearbox[gallery=promo]">
					<img src="<?php echo $rprom['promo_poster']?>">
				</a>
			</div>
			<div class="span5">
				<table class="table table-striped table-hover" style="margin-bottom:0px;">
					<tr>
						<td>Judul</td>
						<td><b><?php echo $rprom['promo_judul'] ?></b></td>
					</tr>
					<tr>
						<td>Tanggal Berlaku</td>
						<td><b><?php echo $rprom['promo_mulai']." - ".$rprom['promo_akhir'] ?></b></td>
					</tr>
					<tr>
						<td>Deskripsi</td>
						<td><?php echo $rprom['promo_des'] ?></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
<?php
}
?>