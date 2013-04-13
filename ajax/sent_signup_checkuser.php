<?php
include "../inc/conn.php";
if (isset($_POST['username'])){
	$username = $_POST['username'];
	$sq="SELECT * FROM user WHERE username='$username'";
	$q=mysql_query($sq);
	$rq=mysql_num_rows($q);
	if ($rq>=1){
		echo "gagal";
	}
}




?>