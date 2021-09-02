<?php

include "conn.php"; // Using database connection file here

$id = $_GET['id']; // get id through query string


$q = $pdo->query("SELECT * FROM wallets WHERE walletID = $id");
$data = $q->fetch();
$cid = $data['coinID'];
$q1 = $pdo->query("SELECT * FROM coin WHERE coinID = $cid");
$name = $q1->fetch();

if(isset($_POST['update'])) // when click on Update button
{
    $nAmount= $_POST['newAmount'];
	
    $edit = $pdo->query("UPDATE wallets SET amount = $nAmount WHERE walletID = $id");
	$pdo->exec($edit);
    if($edit)
    {
        
        header("location:index.php"); 
        exit;
    }
    else
    {
        echo "Update Error";
    }    	
}

if(isset($_POST['cancel'])){
    header("location:index.php"); 
    exit;
}
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">


<div class="modal is-active" >
    <div class="modal-background" ></div>
    <div class="modal-content has-background-white py-5 px-5">
        <h3 class="title mb-5">Edit <?php echo $name['coinName'] ?> Amount</h3>
        <form action="" method="post">
            <div class="field">
                
                <label class="label">New Holding Amount</label>
                <div class="control">
                    <input type="number" class="input" placeholder="Amount" name="newAmount" value="<?php echo $data['amount'] ?>" required>
                </div>
                <div class="control pt-5">
                    <input type="submit" class="button is-success" name="update" value="Update"/>
                    <input type="submit" class="button is-dark" name="cancel" value="Cancel"/> 
                </div>                   
            </div>
        </form>
    </div>
</div>
