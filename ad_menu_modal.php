<script type="text/javascript">
$(document).ready(function () {
    $("#harga").keypress(function (data) {
        // kalau data bukan berupa angka, tampilkan pesan error
        if (data.which != 8 && data.which != 0 && (data.which < 48 || data.which > 57)) {
            $("#harga_error2").fadeIn(500);
            var error = true;
        } else {
            $("#harga_error2").fadeOut(500);
        }
    });
    $("#kirim").click(function () {
        var nama = $("#nama").val();
        var deskripsi = $("#deskripsi").val();
        var harga = $("#harga").val();

        var error = false;

        if (nama.length == 0) {
            var error = true;
            $("#nama_error").fadeIn(500);
        } else {
            $("#nama_error").fadeOut(500);
        }

        if (harga.which != 8 && harga.which != 0 && (harga.which < 48 || harga.which > 57)) {
            $("#harga_error2").fadeIn(500);
            var error = true;
        } else {
            $("#harga_error2").fadeOut(500);
        }

        if (deskripsi.length == 0) {
            var error = true;
            $("#deskripsi_error").fadeIn(500);
        } else {
            $("#deskripsi_error").fadeOut(500);
        }

        //harga boleh NULL
        /*if (harga.length == 0) {
            var error = true;
            $("#harga_error").fadeIn(500);
        } else {
            $("#harga_error").fadeOut(500);
        }*/

        if (error) {
            return false;
        }
    });
});
</script>

<!-- Modal Input Excel-->
<div id="addexcel" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      <h3 id="myModalLabel">Add Menu via xls</h3>
   </div>
   <div class="modal-body">
      <p>COMING SOON…</p>
   </div>
   <div class="modal-footer">
      <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
      <!--<button class="btn btn-primary">Save changes</button>-->
   </div>
</div>
<!-- Modal Input Web-->
<div id="addweb" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      <h3 id="myModalLabel">Add Menu</h3>
   </div>
   <div class="modal-body">
      <form class="form-horizontal" method="post" action="admin-menu" enctype="multipart/form-data">
         <div class="control-group">
            <label class="control-label" for="nama">Nama</label>
            <div class="controls">
               <input type="text" id="nama" name="nama" placeholder="Nama Menu" />
               <div id="nama_error" class="error"><img src="asset/img/error.png" /> Anda belum mengisikan Nama Menu.</div>
            </div>
         </div>
         <div class="control-group">
            <label class="control-label" for="deskripsi">Deskripsi</label>
            <div class="controls">
               <textarea rows="3" id="deskripsi" name="deskripsi" Placeholder="Penjelasan singkat mengenai menu"></textarea>
               <div id="deskripsi_error" class="error"><img src="asset/img/error.png" /> Anda belum mengisikan deskripsi menu.</div>
            </div>     
         </div>
         <div class="control-group">
            <label class="control-label" for="kategori">Kategori</label>
            <div class="controls">
               <select id="kategori" name="kategori" placeholder="kategori" />
                  <?php
                  $qk=mysql_query("SELECT * FROM kategori");
                  while ( $rk=mysql_fetch_array($qk)) {
                     echo "<option value=$rk[id_kategori]>$rk[kategori_nama]</option>";
                  }
                  ?>
               </select>
            </div>
         </div>
         <div class="control-group">
            <label class="control-label" for="harga">Harga</label>
            <div class="controls">
               <input type="text" id="harga" name="harga" placeholder="harga" />
               <div id="harga_error" class="error"><img src="asset/img/error.png" /> Anda belum mengisikan harga menu.</div>
               <div id="harga_error2" class="error"><img src="asset/img/error.png" />Harga haruslah dalam bentuk angka</div>
            </div>
         </div>
         <div class="control-group">
            <label class="control-label" for="picture">Foto</label>
            <div class="controls">
               <input type="file" id="picture" name="picture" placeholder="picture" />
            </div>
         </div>
   </div>
   <div class="modal-footer">
      <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cancel</button>
      <button class="btn btn-primary" id="kirim" type="submit" name="addmenu">Save</button>
   </div>
   </form>
</div>