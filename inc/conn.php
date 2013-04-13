<?php

$db_host="localhost";
 $db_user="root";
$db_pass="root123";
// $db_name="newbpcom_mfront";
 $db_name="eresto_front_dev"; //development
 $koneksi=mysql_connect ($db_host,$db_user,$db_pass) or die (mysql_error());
mysql_select_db($db_name,$koneksi) or die (mysql_error());

?>