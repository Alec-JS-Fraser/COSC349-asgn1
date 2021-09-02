<?php
session_start();

include "conn.php"; // Using database connection file here

$user = !empty($_POST['name']) ? trim($_POST['name']) : null;
$pass = !empty($_POST['password']) ? trim($_POST['password']) : null;

try{
    $q=$pdo->prepare('SELECT * FROM users WHERE userName = :user');
    $q->bindValue(':user',$user);
    $q->execute();
    $u = $q->fetch(PDO::FETCH_ASSOC);
    if ($u==false){
        die('$u==false');
    }else{
        if ($pass==$u['password']){
            $_SESSION['user_id']=$u['userID'];
            $_SESSION['logged_in']=time();
            header('Location: index.php');
            exit;
        }else{
            die('Incorrect username or password');

        }
    }
} catch (PDOException $e) {
    throw $e;  
}
header('Location: index.php');
exit;
?>


