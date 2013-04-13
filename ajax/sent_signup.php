<?php
// file ini akan dipake dari signup.php
include "../inc/conn.php";
session_start();

if(!empty($_POST['captcha'])){
  if ($_POST['captcha'] == $_SESSION['hasil']) {
    $username     = strtolower($_POST['username']);  
    $password    = sha1($_POST['password']);
    $namaresto   = $_POST['namaresto'];
    $deskripsi    = $_POST['deskripsi'];
    $alamat    = $_POST['alamat'];
    
    $sq="INSERT INTO resto (resto_nama,resto_des,resto_alamat) VALUES ('$namaresto', '$deskripsi', '$alamat')";
    $q=mysql_query($sq);

    // mail() adalah fungsi di PHP untuk mengirimkan email 
    if($q){
      $sc="SELECT id_resto FROM resto WHERE resto_nama LIKE '$namaresto' AND resto_des LIKE '$deskripsi' AND resto_alamat='$alamat'";
      $qc=mysql_query($sc);
      $rc=mysql_fetch_array($qc);
      $id_resto=$rc['id_resto'];
      $sq2="INSERT INTO user (username, user_pswd, user_role, id_resto) VALUES ('$username', '$password', '2','$id_resto')";
      $q2=mysql_query($sq2);

      if ($q2){
        echo "berhasil";
      }else{
        echo "gagal";
      }
    } 
    else{
        echo "gagal";     
    }  
  }
  else{
    echo "Kode captcha yang Anda masukkan salah";
  }
}
else{
   echo "Anda belum memasukkan kode captcha";
}
?>
