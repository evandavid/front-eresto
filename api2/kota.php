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
        foreach ($xml->kota as $kota) {
            $querycek = "SELECT * FROM kota WHERE id_kota ='$kota->id_kota'";
            $qqc=mysql_query($querycek);
            $num_rows = mysql_num_rows($qqc);
     
            if ($num_rows == 0)
            {
                $query = "INSERT INTO kota (
                    nama_kota,
                    provinsi_id_provinsi,
                    kota_order,
                    kota_stat
                    )
                    VALUES (
                    '$kota->nama_kota',
                    '$kota->provinsi_id_provinsi',
                    '$kota->kota_order',
                    '$kota->kota_stat'
                    )";
     
            }
            else if ($num_rows == 1)
            {
                $query = "UPDATE kota SET
     
                    nama_kota='$kota->nama_kota',
                    provinsi_id_provinsi='$kota->provinsi_id_provinsi',
                    provinsi_id_provinsi='$kota->kota_order',
                    kota_stat='$kota->kota_stat'

                    WHERE id_kota = '$kota->id_kota'";
     
            }
            $result = mysql_query($query) or die('Query failed: ' . mysql_error());
        }
     
    // METODE REQUEST untuk DELETE
    } else if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
        $input = file_get_contents("php://input");
        $xml = simplexml_load_string($input);
        foreach ($xml->kota as $kota) {
            $query = "DELETE FROM kota WHERE id_kota='$kota->id_kota'";
            $result = mysql_query($query) or die('Query failed: ' . mysql_error());
     
        }
     
    // METODE REQUEST untuk GET
    } else if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        if ($path_params[1] != null) {
                $query = "SELECT * FROM kota WHERE id_kota = $path_params[1]";
        } else {  
            $query = "SELECT * FROM kota ";
        }
        $result = mysql_query($query) or die('Query failed: ' . mysql_error());
     
        echo "<data>";
        while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
            echo "<kota>";
            foreach ($line as $key => $col_value) {
                echo "<$key>$col_value</$key>";
            }
            echo "</kota>";
        }
        echo "</data>";
     
        mysql_free_result($result);
    }
     
    mysql_close($koneksi);
}else{
    echo "API KEY WRONG!";
}

 
?>