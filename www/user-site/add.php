<?php
include 'conn.php';

session_start();
$user = $_SESSION['user_id'];

$coin = $_POST['coin'];
$price = $_POST['price'];
$amount = $_POST['amount'];

try {
    $sql = "INSERT INTO coin (coinName, coinValue) VALUES ('$coin', $price)";
    $pdo->query($sql);
    $q = $pdo->query("SELECT coinID FROM coin WHERE coinName = '$coin'");
    $coinid = $q->fetch();
    $coinid2 = $coinid['coinID'];
    $sql1 = "INSERT INTO wallets (walletID, userID, coinID, amount) VALUES (NULL, $user, $coinid2, $amount)";
    $q =$pdo->query($sql1);
    $pdo->exec($q);

    $sql2 = "INSERT INTO transactions (userID, coinID, tranType) VALUES ($user, $coinid2, 'Added Coin')";
    $pdo->query($sql2);
}   catch (PDOException $e) {
    throw $e;  
}
header('Location: index.php');
exit;
?>