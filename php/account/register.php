<?php
//Connect to MySql
require '../database.php';
$data = null;
// pega os dados do formuário
$email = isset($_POST['email']) ? $_POST['email'] : null;
$password = isset($_POST['password']) ? $_POST['password'] : null;
 
// validação (bem simples, só pra evitar dados vazios)
if (empty($email) || empty($password)){
    $data = "campos";
    echo $data;
    exit;
}
 
$passwordsha1 = sha1($password);
$cry9 = sha1($email);
$cry8 = $cry9 . "100010001001";
$cry7 = md5($cry8);
$cry6 = sha1($cry7);
$cry5 = sha1($cry6);
$cry4 = sha1($cry5);
$cry3 = sha1($cry4);
$cry2 = sha1($cry3);
$cry1 = sha1($cry2);
$cry = sha1($cry1);
// insere no banco
$PDO = db_connect();
$sql = "INSERT INTO users(email, password, cry) VALUES(:email, :password, :cry)";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':password', $passwordsha1);
$stmt->bindParam(':cry', $cry);
 
if ($stmt->execute()){
    $data = "sucess";
    echo $data;
    exit;
}else{
    $data = "try";
    echo $data;
    exit;
}
