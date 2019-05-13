<?php
//Function template
require 'php/functions/config.php';

function template($dir, $file){
    require 'template/html/' . $dir . '/' . $file . '.php';
}

function payload(){
if(isset($_COOKIE['iduser']) && isset($_COOKIE['cry'])){
    template('home', 'index');
} else{
    if($_GET['account']){
        template('dashboard/account', 'login');
    }
    else if($_GET['registro']){
        template('dashboard/account', 'registro');
    } else{
    template('dashboard', 'index');
    }
}
}