<?php
include "../inc/conn.php";
session_start();

if (isset($_POST['username'])&&isset($_POST['password'])){
	$usr=strtolower($_POST['username']);
	$pswd=sha1($_POST['password']);
	$role=$_POST['role'];

	switch ($role) {
		case '2': 	
			$sq="SELECT * FROM user WHERE username='$usr' AND user_pswd='$pswd'";
			$q=mysql_query($sq);
			$cr=mysql_num_rows($q);
			$r=mysql_fetch_array($q);
			if ($cr==1){
				echo "berhasil";
				$_SESSION['ad_signed_in'] = true;
				$_SESSION['ad_username'] = $r['username'];
				$_SESSION['ad_id_resto']=$r['id_resto']; 	
			}else{
				echo "<img src=\"asset/img/error.png\" />&nbsp;Username/Password Salah";
			}	
		break;
		case '1': 	
			$sq="SELECT * FROM superadmin WHERE sa_username='$usr' AND sa_password='$pswd'";
			$q=mysql_query($sq);
			$cr=mysql_num_rows($q);
			$r=mysql_fetch_array($q);
			if ($cr==1){
				echo "berhasil";
				$_SESSION['sa_signed_in'] = true;
				$_SESSION['sa_username'] = $r['sa_username'];
				$_SESSION['sa_id_resto']=$r['sa_password']; 	
			}else{
				echo "<img src=\"asset/img/error.png\" />&nbsp;Username/Password Salah";
			}		
		break;
		case '3':
			$sq="SELECT * FROM customer WHERE customer_username='$usr' AND customer_pswd='$pswd'";
			$q=mysql_query($sq);
			$cr=mysql_num_rows($q);
			$r=mysql_fetch_array($q);
			if ($cr==1){
				echo "berhasil";
				$_SESSION['c_signed_in'] = true;
				$_SESSION['c_username'] = $r['customer_username'];
				$_SESSION['c_id_resto']=$r['customer_pswd']; 	
			}else{
				echo "<img src=\"asset/img/error.png\" />&nbsp;Username/Password Salah";
			} 
		break;
			}

}

?>