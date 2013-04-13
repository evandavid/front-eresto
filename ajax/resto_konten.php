<?php
include "../inc/conn.php";
if (isset($_POST['tab'])){
	$tab=$_POST['tab'];
	if ($tab=='1'){
		include "resto_overview.php";
	}elseif($tab=='2'){
		echo "hahaha";
	}elseif($tab=='3'){
		
	}elseif($tab=='4'){
		
	}
}

?>