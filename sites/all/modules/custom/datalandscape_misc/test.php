<?php

function _datalandscape_misc_get_site_info($url){
    
    $curl = curl_init($url);
    $opt = array(
        CURLOPT_HEADER => false,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT => 2
      ); 
    
    curl_setopt_array($curl,$opt);
    $res =  curl_exec($curl);
    
    return $res;
}

$url[]="http://criteo.com";

print_r(_datalandscape_misc_get_site_info($url[0]));