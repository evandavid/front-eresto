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
        foreach ($xml->promo as $promo) {
            $querycek = "SELECT * FROM promo WHERE id_promo ='$promo->id_promo'";
            $qqc=mysql_query($querycek);
            $num_rows = mysql_num_rows($qqc);
     
            if ($num_rows == 0)
            {
                $query = "INSERT INTO promo (
                    promo_judul,
                    promo_poster,
                    promo_mulai,
                    promo_akhir,
                    promo_des,
                    promo_jenis,
                    resto_id_resto,
                    promo_curdate
                    )
                    VALUES (
                    '$promo->promo_judul',
                    '$promo->promo_poster',
                    '$promo->promo_mulai',
                    '$promo->promo_akhir',
                    '$promo->promo_des',
                    '$promo->promo_jenis',
                    '$promo->resto_id_resto',
                    '$promo->promo_curdate'
                    )";
     
            }
            else if ($num_rows == 1)
            {
                $query = "UPDATE promo SET
     
                    promo_judul='$promo->promo_judul',
                    promo_poster='$promo->promo_poster',
                    promo_mulai='$promo->promo_mulai',
                    promo_akhir='$promo->promo_akhir',
                    promo_des='$promo->promo_des',
                    promo_jenis='$promo->promo_jenis',
                    resto_id_resto='$promo->resto_id_resto',
                    promo_curdate='$promo->promo_curdate'

                    WHERE id_promo = '$promo->id_promo'";
     
            }
            $result = mysql_query($query) or die('Query failed: ' . mysql_error());
        }
     
    // METODE REQUEST untuk DELETE
    } else if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
        $input = file_get_contents("php://input");
        $xml = simplexml_load_string($input);
        foreach ($xml->promo as $promo) {
            $query = "DELETE FROM promo WHERE id_promo='$promo->id_promo'";
            $result = mysql_query($query) or die('Query failed: ' . mysql_error());
     
        }
     
    // METODE REQUEST untuk GET
    } else if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        if ($path_params[1] != null) {
                $query = "SELECT * FROM promo WHERE id_promo = $path_params[1]";
        } else {  
            $query = "SELECT * FROM promo ";
        }
        $result = mysql_query($query) or die('Query failed: ' . mysql_error());
     
        echo "<data>";
        while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
            echo "<promo>";
            foreach ($line as $key => $col_value) {
                echo "<$key>$col_value</$key>";
            }
            echo "</promo>";
        }
        echo "</data>";
     
        mysql_free_result($result);
    }
     
    mysql_close($koneksi);
}else{
    echo "API KEY WRONG!";
}

 
?>