<?php 
//Connect to MySql
require '../database.php';
// resgata variáveis do formulário
$email = isset($_POST['email']) ? $_POST['email'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
//$email = 'xande1231231@hotmail.com';
//$password = 'xande321321';
 
if (empty($email) || empty($password))
{
    $data = "campos";
    echo $data;
    exit;
}
 
// cria o hash da senha
$passwordHash = make_hash($password);
 
$PDO = db_connect();
 
$sql = "SELECT id, idnetflix, email FROM users WHERE email = :email AND password = :password";
$stmt = $PDO->prepare($sql);
 
$stmt->bindParam(':email', $email);
$stmt->bindParam(':password', $passwordHash);
 
$stmt->execute();
 
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
 
if (count($users) <= 0)
{
    $data = "senha";
    echo $data;
    exit;
}
else{
    $data = "sucess";
    echo $data;
    // pega o primeiro usuário
    $user = $users[0];
    setcookie("iduser", $user['id']);
    setcookie("cry", $user['cry']);
}