<?php
function show($stuff) {
    echo '<pre>';
    print_r($stuff);
    echo '</pre>';
}
function esc($string){
    return htmlentities($string);
}
function redirect($path){
    header("Location: ". ROOT."/".$path);
    die; 
}