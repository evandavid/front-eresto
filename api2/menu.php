<?php
/*
* @author   : Rifan M Fauzi - Newbee Corporation
* @email    : rifan@newbee-corp.com
* @project  : eresto Webservices
* @publish  : @2013
*/
include "apikey.php";
// include "jsoncek.php";
 
//header untuk format XML, jika dihilangkan maka akan berbentuk data String
header('Content-Type: text/xml; charset=ISO-8859-1');
// header('Content-Type: application/json');
 
// Check for the path elements
$path = $_SERVER['PATH_INFO'];    
if ($path != null) {
    $path_params = explode ("/", $path);
}

if (isset($_GET['api'])){
    $apiakses=$_GET['api'];
}else{
    $apiakses="";
}

if ($apiakses==$apikey){
    include "conn.php";
    // METODE REQUEST untuk POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $input = file_get_contents("php://input");
        $xml = simplexml_load_string($input);
        foreach ($xml->menu as $menu) {
            $querycek = "SELECT * FROM menu WHERE id_menu ='$menu->id_menu'";
            $qqc=mysql_query($querycek);
            $num_rows = mysql_num_rows($qqc);
     
            if ($num_rows == 0)
            {
                $query = "INSERT INTO menu (
                    resto_id_resto,
                    menu_nama,
                    menu_kuota,
                    menu_des,
                    menu_like,
                    menu_thumb,
                    menu_harga,
                    menu_jenis,
                    kategori_id_kategori
                    )
                    VALUES ( 
                    '$menu->resto_id_resto',
                    '$menu->menu_nama',
                    '$menu->menu_kuota',
                    '$menu->menu_des',
                    '$menu->menu_like',
                    '$menu->menu_thumb',
                    '$menu->menu_harga',
                    '$menu->menu_jenis',
                    '$menu->kategori_id_kategori')";
     
            }
            else if ($num_rows == 1)
            {
                $query = "UPDATE menu SET
     
                    resto_id_resto='$menu->resto_id_resto',
                    menu_nama='$menu->menu_nama',
                    menu_kuota='$menu->menu_kuota',
                    menu_des='$menu->menu_des',
                    menu_like='$menu->menu_like',
                    menu_thumb='$menu->menu_thumb',
                    menu_harga='$menu->menu_harga',
                    menu_jenis='$menu->menu_jenis',
                    kategori_id_kategori='$menu->kategori_id_kategori'

                    WHERE id_menu = '$menu->id_menu'";
     
            }
            $result = mysql_query($query) or die('Query failed: ' . mysql_error());
        }
     
    // METODE REQUEST untuk DELETE
    } else if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
        $input = file_get_contents("php://input");
        $xml = simplexml_load_string($input);
        foreach ($xml->menu as $menu) {
            $query = "DELETE FROM menu WHERE id_menu='$menu->id_menu'";
            $result = mysql_query($query) or die('Query failed: ' . mysql_error());
     
        }
     
    // METODE REQUEST untuk GET
    } else if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        if ($path_params[1] != null) {
                $query = "SELECT * FROM menu WHERE id_menu = $path_params[1]";
        } else {  
            $query = "SELECT * FROM menu ";
        }
        $result = mysql_query($query) or die('Query failed: ' . mysql_error());
     
        echo "<data>";
        while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
            echo "<menu>";
            foreach ($line as $key => $col_value) {
                echo "<$key>$col_value</$key>";
            }
            echo "</menu>";
        }
        echo "</data>";
     
        mysql_free_result($result);
    }
     
    mysql_close($koneksi);
}else{
    echo "API KEY WRONG!";
}

 
?>