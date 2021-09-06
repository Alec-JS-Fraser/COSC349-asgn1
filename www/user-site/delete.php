<!-- PHP script for deleing a wallet entry of a user-->
<?php

include "conn.php"; 

session_start();
$user = $_SESSION['user_id'];

$id = $_GET['id']; 

$q = $pdo->query("SELECT * FROM wallets WHERE walletID = $id"); // selecting correct wallet
$data = $q->fetch();
$cid = $data['coinID'];
$q1 = $pdo->query("SELECT * FROM coin WHERE coinID = $cid"); //selcting correct coin
$name = $q1->fetch();
if(isset($_POST['delete'])) // when click on Update button
{
    $del = $pdo->query("DELETE FROM wallets WHERE walletID = $id"); //query deleting entry from the wallet 
    $pdo->exec($del);

    $sql2 = $pdo->query("INSERT INTO transactions (userID, coinID, tranType) VALUES ($user, $cid, 'Removed Coin From Wallet')"); // adding record to transactions
    $pdo->exec($sql2);
    
    if($del){
        header("location:index.php"); 
        exit;	
    }else{
        echo "Error deleting record"; 
    } 
}
if(isset($_POST['cancel'])){
    header("location:index.php"); 
    exit;
}
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">

<!-- popup to delete the coin from wallet --> 
<div class="modal is-active" >
    <div class="modal-background" ></div>
    <div class="modal-content has-background-white py-5 px-5">
        <h3 class="title mb-5">Do you want to remove <?php echo $name['coinName'] ?> ?</h3>
        <form action="" method="post">
            <div class="field">
                <div class="control pt-5">
                    <input type="submit" class="button is-danger" name="delete" value="Delete"/>
                    <input type="submit" class="button is-dark" name="cancel" value="Cancel"/> 
                </div>                   
            </div>
        </form>
    </div>
</div>
