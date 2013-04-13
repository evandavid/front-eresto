<script type="text/javascript">
$(document).ready(function () {
   $( "#tgl1" ).datepicker({dateFormat: "yy-mm-dd"});
   $( "#tgl2" ).datepicker({dateFormat: "yy-mm-dd"});
   $("#kirim").click(function () {
        var judul = $("#judul").val();
        var des = $("#des").val();
        var tgl1 = $("#tgl1").val();
        var tgl2 = $("#tgl2").val();

        var error = false;

        if (judul.length == 0) {
            var error = true;
            $("#judul_error").fadeIn(500);
        } else {
            $("#judul_error").fadeOut(500);
        }
        if (des.length == 0) {
            var error = true;
            $("#des_error").fadeIn(500);
        } else {
            $("#des_error").fadeOut(500);
        }
        if (tgl1.length == 0) {
            var error = true;
            $("#tgl_error").fadeIn(500);
        } else {
            $("#tgl_error").fadeOut(500);
        }
        if (tgl2.length == 0) {
            var error = true;
            $("#tgl_error").fadeIn(500);
        } else {
            $("#tgl_error").fadeOut(500);
        }
        if (error) {
            return false; //jika masih ada error maka data tidak akan di post
        }
    });
 });
</script>
<!-- Modal add evro -->
<div id="addevpro" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      <h3 id="myModalLabel">Create Event/Promotion</h3>
   </div>
   <div class="modal-body">
      <form class="form-horizontal" action="admin-evpro" method="post" enctype="multipart/form-data">
         <div class="control-group">
            <label class="control-label" for="jenis">Jenis event/promosi</label>
            <div class="controls">
               <select id="jenis" name="jenis">
                  <option value="0">FREE/Gratis</option>
                  <option value="1">Berbayar</option>
               </select>
            </div>
         </div>
         <div class="control-group">
            <label class="control-label" for="judul">Judul event/promosi</label>
            <div class="controls">
               <input type="text" id="judul" name="judul" placeholder="Judul event/promosi" />
               <div id="judul_error" class="error"><img src="asset/img/error.png" /> Anda belum mengisikan Judul event/promosi</div>
            </div>           
         </div>
         <div class="control-group">
            <label class="control-label" for="tgl1">Tanggal event/promosi</label>
            <div class="controls">
               <input type="text" class="input-mini" id="tgl1" name="tgl1" placeholder="Mulai" />&nbsp;-&nbsp;
               <input type="text" class="input-mini" id="tgl2" name="tgl2" placeholder="Selesai" />
               <div id="tgl_error" class="error"><img src="asset/img/error.png" /> Anda belum melengkapi tanggal event/promosi.</div>
            </div>       
         </div>
         <div class="control-group">
            <label class="control-label" for="des">Deskripsi</label>
            <div class="controls">
               <textarea id="des" name="des" placeholder="Deskripsikan sekilas ttg event/promosi anda" rows="3"></textarea>
               <div id="des_error" class="error"><img src="asset/img/error.png" /> Anda belum mengisikan deskripsi singkat mengenai event/promosi anda</div>
            </div>      
         </div>
         <div class="control-group">
            <label class="control-label" for="picture">Poster/Banner</label>
            <div class="controls">
               <input id="picture" type="file" name="picture">
            </div>
         </div>
   </div>
   <div class="modal-footer">
      <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
      <button class="btn btn-primary" id="kirim" name="saveevpro">Save</button>
   </div>
   </form>
</div>
