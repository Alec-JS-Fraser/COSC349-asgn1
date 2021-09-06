<!-- php script for registerign a new user and addingf them to the users table -->
<?php
include 'conn.php';

$name = $_POST['regName'];
$password = $_POST['regPass'];
$confirm = $_POST['conPass'];


if ($password!=$confirm){
    die('Passwords do not match!');
}
try{
    $q=$pdo->prepare('INSERT INTO users (userName, password) VALUES (:username,:password)'); // query to add new user in table
    $q->bindValue(':username',$name);
    $q->bindValue(':password',$password);
    $result=$q->execute();

} catch (PDOException $e) {
    throw $e;  
}
header('Location: index.php');
exit;
?>
