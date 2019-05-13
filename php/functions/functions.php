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
 

//Verificar sessão quando logado
if(isset($_COOKIE['iduser']) && isset($_COOKIE['cry'])){
require 'php/database.php';
$PDO = db_connect();
$iduser = $_COOKIE['iduser'];
$cry = $_COOKIE['cry'];
$sql = "SELECT id, idnetflix, email FROM users WHERE id = :iduser AND idnetflix = :idnetflix";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':iduser', $iduser);
$stmt->bindParam(':idnetflix', $cry);
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
if (count($users) <= 0)
{
setcookie("iduser", "");
setcookie("cry", "");
}
$user = $users[0];
}