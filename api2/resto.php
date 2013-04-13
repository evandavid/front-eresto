<?php
/*
* @author   : Rifan M Fauzi - Newbee Corporation
* @email    : rifan@newbee-corp.com
* @project  : Eresto Webservices
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
        foreach ($xml->resto as $resto) {
            $querycek = "SELECT * FROM resto WHERE id_resto ='$resto->id_resto'";
            $qqc=mysql_query($querycek);
            $num_rows = mysql_num_rows($qqc);
     
            if ($num_rows == 0)
            {
                $query = "INSERT INTO resto (
                    katresto_id_katresto,
                    resto_nama,
                    resto_latt,
                    resto_long,
                    resto_des,
                    resto_telp,
                    resto_harga1,
                    resto_harga2,
                    resto_alamat,
                    resto_fb,
                    resto_twitter,
                    resto_thumb,
                    resto_email,
                    resto_web,
                    resto_jamb,
                    resto_jamt,
                    kota_id_kota
                    )
                    VALUES ( 
                    '$resto->katresto_id_katresto',
                    '$resto->resto_nama',
                    '$resto->resto_latt',
                    '$resto->resto_long',
                    '$resto->resto_des',
                    '$resto->resto_telp',
                    '$resto->resto_harga1',
                    '$resto->resto_harga2',
                    '$resto->resto_alamat',
                    '$resto->resto_fb',
                    '$resto->resto_twitter',
                    '$resto->resto_thumb',
                    '$resto->resto_email',
                    '$resto->resto_web',
                    '$resto->resto_jamb',
                    '$resto->resto_jamt',
                    '$resto->kota_id_kota')";
     
            }
            else if ($num_rows == 1)
            {
                $query = "UPDATE resto SET
     
                    katresto_id_katresto='$resto->katresto_id_katresto',
                    resto_nama='$resto->resto_nama',
                    resto_latt='$resto->resto_latt',
                    resto_long='$resto->resto_long',
                    resto_des='$resto->resto_des',
                    resto_telp='$resto->resto_telp',
                    resto_harga1='$resto->resto_harga1',
                    resto_harga2='$resto->resto_harga2',
                    resto_alamat='$resto->resto_alamat',
                    resto_fb='$resto->resto_fb',
                    resto_twitter='$resto->resto_twitter',
                    resto_thumb='$resto->resto_thumb',
                    resto_email='$resto->resto_email',
                    resto_web='$resto->resto_web',
                    resto_jamb='$resto->resto_jamb',
                    resto_jamt='$resto->resto_jamt',
                    kota_id_kota='$resto->kota_id_kota'

                    WHERE id_resto = '$resto->id_resto'";
     
            }
            $result = mysql_query($query) or die('Query failed: ' . mysql_error());
        }
     
    // METODE REQUEST untuk DELETE
    } else if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
        $input = file_get_contents("php://input");
        $xml = simplexml_load_string($input);
        foreach ($xml->resto as $resto) {
            $query = "DELETE FROM resto WHERE id_resto='$resto->id_resto'";
            $result = mysql_query($query) or die('Query failed: ' . mysql_error());
     
        }
     
    // METODE REQUEST untuk GET
    } else if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        if ($path_params[1] != null) {
                $query = "SELECT * FROM resto WHERE id_resto = $path_params[1]";
        } else {  
            $query = "SELECT * FROM resto ";
        }
        $result = mysql_query($query) or die('Query failed: ' . mysql_error());
     
        echo "<data>";
        while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
            echo "<resto>";
            foreach ($line as $key => $col_value) {
                echo "<$key>$col_value</$key>";
            }
            echo "</resto>";
        }
        echo "</data>";
     
        mysql_free_result($result);
    }
     
    mysql_close($koneksi);
}else{
    echo "API KEY WRONG!";
}

 
?>