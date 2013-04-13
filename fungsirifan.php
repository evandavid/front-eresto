<?php
function setpp($url){
   //fungsi untuk mengubah PP resto menjadi default jika ia belum memasang PP
   if (($url=="")||($url==null)){
      return "asset/img/pp_default.jpg";
   }else{
      return $url;
   }
}

function setjenispromo($a){
	if ($a==0){
		return "FREE/Gratis";
	}else{
		return "Berbayar";
	}
}

function setharga($a){
   return "Rp ".number_format($a,0,",",".");
}

function setselected($a,$b){
   if ($a==$b){
      return "selected='selected'";
   }else{
      return "";
   }
}

function stringtrim($batas, $string){
   if (strlen($string)>$batas){
      $string=substr($string,0,$batas).'...'; 
   }
   return $string;
}
?>