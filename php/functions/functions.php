<?php
//Function template
function template($dir, $file){
    require 'php/functions/config.php';
    require 'template/html/' . $dir . '/' . $file . '.php';
}