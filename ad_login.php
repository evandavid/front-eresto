<script type="text/javascript">
$(document).ready(function () {
    $("#kirim").click(function () {
        var username = $("#usernamelog").val();
        var password = $("#passwordlog").val();

        var error = false;

        if (username.length == 0) {
            var error = true;
            $("#usernamelog_error").fadeIn(500);
        } else {
            $("#usernamelog_error").fadeOut(500);
        }

        if (password.length == 0) {
            var error = true;
            $("#passwordlog_error").fadeIn(500);
        } else {
            $("#passwordlog_error").fadeOut(500);
        }


        // kalau sudah tidak ada yang error (false),
        // artinya semua form input sudah di isi dengan benar  
        if (error == false) {
            // non-aktifkan tombol submit untuk meminimalisir spam
            // ubah teks kirim pada tombol menjadi Loading ...
            $("#kirim").attr({
                "disabled": "true",
                "value": "Loading..."
            });

            $.ajax({
                type: "POST",
                url: "ajax/sent_signin.php",
                data: "username=" + username + "&password=" + password + "&role=2",
                success: function (data) {
                    // setelah ajax request sukses, 
                    // cek data/teks yang dikirimkan dari file sent_signup.php
                    if (data == 'berhasil') {
                        $("#mail_sukses").fadeIn(500);
                        $("#mail_gagal").html(data).fadeOut(500);
                        window.location.replace("admin-menu");
                    } else {
                        $("#mail_sukses").fadeOut(500);
                        $("#mail_gagal").html(data).fadeIn(500);
                        $("#kirim").removeAttr("disabled").attr("value", "Kirim");
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
<h3>Login</h3>
<form class="form-horizontal" method="post" action="ad_main.php">
   <div class="control-group">
      <label class="control-label" for="usernamelog">Username</label>
      <div class="controls">
         <input type="text" id="usernamelog" class="input-medium" placeholder="Username" />
         <div id="usernamelog_error" class="error"><img src="asset/img/error.png" /> Anda belum mengisikan username.</div>
      </div>    
   </div>
   <div class="control-group">
      <label class="control-label" for="passwordlog">Password</label>
      <div class="controls">
         <input type="password" id="passwordlog" class="input-medium" placeholder="Password" />
         <div id="passwordlog_error" class="error"><img src="asset/img/error.png" /> Anda belum mengisikan password.</div>
      </div>    
   </div>
   <div class="control-group">
      <div class="controls">
         <button type="submit" class="btn btn-success" id="kirim">Sign in</button>
      </div>
      <div id="mail_sukses" class="sukses"><img src="asset/img/success.png" /> Login Success.. Redirect to admin page...</div>
      <div id="mail_gagal" class="errorbox"></div>
   </div>
   <div align="center">
      <p>Your resto is not listed? <a href="#signupmodal" data-toggle="modal">Join Now</a></p>
   </div>
</form>
