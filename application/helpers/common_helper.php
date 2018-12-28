<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function dd($var){
    echo "<pre>"; var_dump($var); die;
}

function pr($var){
    echo "<pre>"; print_r($var);
}
function getActualPrice($price,$discount){
    if($discount > 0 ){ $price = $price - ($price * $discount/100); }
    return $price; 
}
function getSortDes($des){
    $sortdes = substr($des,100)."...";
    return $sortdes;
}
