<?php
//Connect to MySql
require '../database.php';
$data = null;
// pega os dados do formuário
$email = isset($_POST['email']) ? $_POST['email'] : null;
$senha = isset($_POST['password']) ? $_POST['password'] : null;
 
// validação (bem simples, só pra evitar dados vazios)
if (empty($email) || empty($senha)){
    $data = "campos";
    echo $data;
    exit;
}
 
$passwordsha1 = sha1($senha);
$cry9 = sha1($email);
$cry8 = $cry9 . "100010001001";
$cry7 = md5($cry8);
$cry6 = sha1($cry7);
$cry5 = sha1($cry6);
$cry4 = sha1($cry5);
$cry3 = sha1($cry4);
$cry2 = sha1($cry3);
$cry1 = sha1($cry2);
$idnetflix = sha1($cry1);

$PDO = db_connect();
 
$sql = "SELECT id, email FROM users WHERE email = :email";
$stmt2 = $PDO->prepare($sql);
 
$stmt2->bindParam(':email', $email);
 
$stmt2->execute();
 
$users = $stmt2->fetchAll(PDO::FETCH_ASSOC);
 
if (count($users) <= 0)
{
    // insere no banco
    $data = [
        'idnetflix' => $idnetflix,
        'email' => $email,
        'senha' => $passwordsha1,
        'admin' => 0,
        'banned' => 0,
    ];
    $sql = "INSERT INTO users (idnetflix, email, senha, admin, banned) VALUES (:idnetflix, :email, :senha, :admin, :banned)";
    $stmt= $PDO->prepare($sql);
    $stmt->execute($data);
    $sql3 = "SELECT id, email, idnetflix FROM users WHERE email = :email AND idnetflix = :idnetflix";
    $stmt3 = $PDO->prepare($sql3);
    
    $stmt3->bindParam(':email', $email);
    $stmt3->bindParam(':idnetflix', $idnetflix);
    
    $stmt3->execute();
    
    $users = $stmt3->fetchAll(PDO::FETCH_ASSOC);
    $user = $users[0];
    setcookie("iduser", $user['id']);
    setcookie("cry", $user['idnetflix']);
    $data = "sucess";
    echo $data;
}
else{
    $data = "existe";
    echo $data;
    exit;
}
