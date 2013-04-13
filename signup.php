<!-- Pendafataran Resto Baru -->
<?php
//include 'header.php';

$_SESSION['n1'] = rand(1,20);
$_SESSION['n2'] = rand(1,20);
$_SESSION['hasil'] = $_SESSION['n1']+$_SESSION['n2'];
?>
<script type="text/javascript">
$(document).ready(function () {
    var errorp = false;
   $("#username").change(function () {
        var username = $("#username").val();
        $.ajax({
            type: "POST",
            url: "ajax/sent_signup_checkuser.php",
            data: "username=" + username,
            success: function(data){
               if (data=='gagal'){
                  $("#username_error2").fadeIn(500);
               }else{
                  $("#username_error2").fadeOut(500);
               }
            }
        })
    });
    $("#password2").change(function () {
        var password = $("#password").val();
        var confirmPassword = $("#password2").val();
        if (password != confirmPassword) {
          errorp=true;
          $("#divCheckPasswordMatch").fadeIn(500);
        }else {
          errorp=false;
          $("#divCheckPasswordMatch").fadeOut(500);
        }
    });
    $("#signup").click(function () {
        var username = $("#username").val();
        //var email  = $("#email").val();
        var password = $("#password").val();
        var namaresto = $("#namaresto").val();
        var deskripsi = $("#deskripsi").val();
        var alamat = $("#alamat").val();
        var captcha = $("#captcha").val();
        var error = false;
        if (username.length == 0) {
            var error = true;
            $("#username_error").fadeIn(500);
        } else {
            $("#username_error").fadeOut(500);
        }

        if (password.length == 0) {
            var error = true;
            $("#password_error").fadeIn(500);
        } else {
            $("#password_error").fadeOut(500);
        }
        if (namaresto.length == 0) {
            var error = true;
            $("#namaresto_error").fadeIn(500);
        } else {
            $("#namaresto_error").fadeOut(500);
        }
        if (deskripsi.length == 0) {
            var error = true;
            $("#deskripsi_error").fadeIn(500);
        } else {
            $("#deskripsi_error").fadeOut(500);
        }
        if (alamat.length == 0) {
            var error = true;
            $("#alamat_error").fadeIn(500);
        } else {
            $("#alamat_error").fadeOut(500);
        }
        if (captcha.length == 0) {
            var error = true;
            $("#captcha_error").fadeIn(500);
        } else {
            $("#captcha_error").fadeOut(500);
        }

        // kalau sudah tidak ada yang error (false),
        // artinya semua form input sudah di isi dengan benar  
        if ((error == false)&&(errorp==false)) {
            // non-aktifkan tombol submit untuk meminimalisir spam
            // ubah teks kirim pada tombol menjadi Loading ...
            $("#signup").attr({
                "disabled": "true",
                "value": "Loading..."
            });

            $.ajax({
                type: "POST",
                url: "ajax/sent_signup.php",
                data: "username=" + username + "&namaresto=" + namaresto + "&password=" + password + "&deskripsi=" + deskripsi + "&captcha=" + captcha + "&alamat=" + alamat,
                success: function (data) {
                    // setelah ajax request sukses, 
                    // cek data/teks yang dikirimkan dari file sent_signup.php
                    if (data == 'berhasil') {
                        $("#signup").remove();
                        $("#signup_sukses").fadeIn(500);
                        $("#signup_gagal").html(data).fadeOut(500);
                    } else {
                        $("#signup_sukses").fadeOut(500);
                        $("#signup_gagal").html(data).fadeIn(500);
                        $("#signup").removeAttr("disabled").attr("value", "signup");
                    }
                }
            });
        }
        // Batalkan pengiriman melalui form standar, 
        // Karena akan dikirimkan via ajax request. 
        return false;
    });
});
</script>
<br />
<form class="form-horizontal" method="post">
   <div class="control-group">
      <label class="control-label" for="username">Username</label>
      <div class="controls">
         <input type="text" id="username" placeholder="Username" />
         <div id="username_error" class="error"><img src="asset/img/error.png" /> Anda belum mengisikan username.</div>
         <div id="username_error2" class="error"><img src="asset/img/error.png" /> Username sudah dipakai, silakan ganti username anda</div>
      </div>
   </div>
   <div class="control-group">
      <label class="control-label" for="password">Password</label>
      <div class="controls">
         <input type="password" id="password" placeholder="Password" />
         <div id="password_error" class="error"><img src="asset/img/error.png" /> Anda belum mengisikan password.</div>
      </div>
   </div>
   <div class="control-group">
      <label class="control-label" for="password2">Password (again)</label>
      <div class="controls">
         <input type="password" id="password2" placeholder="Password" />
         <div class="error" id="divCheckPasswordMatch"><img src="asset/img/error.png" /> password tidak sama!</div>
      </div>
   </div>
   <div class="control-group">
      <label class="control-label" for="namaresto">Nama Resto</label>
      <div class="controls">
         <input type="text" id="namaresto" name="namaresto" placeholder="Nama Resto" />
         <div id="namaresto_error" class="error"><img src="asset/img/error.png" /> Anda belum mengisikan nama resto.</div>
      </div>
   </div>
   <div class="control-group">
      <label class="control-label" for="deskripsi">Deskripsi Resto</label>
      <div class="controls">
         <textarea rows="3" id="deskripsi" name="deskripsi" Placeholder="Deskripsi Resto"></textarea>
         <div id="deskripsi_error" class="error"><img src="asset/img/error.png" /> Anda belum mengisikan deskripsi resto.</div>
      </div>
   </div>
   <div class="control-group">
      <label class="control-label" for="alamat">Alamat Resto</label>
      <div class="controls">
         <input type="text" id="alamat" name="alamat" placeholder="Alamat" />
         <div id="alamat_error" class="error"><img src="asset/img/error.png" /> Anda belum mengisikan alamat resto.</div>
      </div>  
   </div>
   <div class="control-group">
      <label class="control-label" for="captcha"><?php echo "$_SESSION[n1] + $_SESSION[n2] = "; ?></label>
      <div class="controls">
         <input type="text" id="captcha" name="captcha" placeholder="<?php echo "$_SESSION[n1] + $_SESSION[n2] = ... "; ?>" />
         <div id="captcha_error" class="error"><img src="asset/img/error.png" /> Anda belum mengisikan Kode Captcha.</div>
      </div> 
   </div>
   <div class="control-group">
      <div class="controls">
         <button type="submit" class="btn btn-primary" id="signup">Sign Up</button>
      </div>
      <div id="signup_sukses" class="sukses"><img src="asset/img/success.png" /> Data berhasil disimpan</div>
      <div id="signup_gagal" class="errorbox"></div>
   </div>
</form>

<?php
//include "footer.php";

?>
