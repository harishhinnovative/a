<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function dd($var){
    echo "<pre>"; var_dump($var); die;
}

function pr($var){
    echo "<pre>"; print_r($var);
}
