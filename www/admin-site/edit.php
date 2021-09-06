<!-- PHP script to edit the price of a coin  -->
<?php

include "conn.php"; 

session_start();
$user = $_SESSION['user_id'];

$id = $_GET['id']; 

$q = $pdo->query("SELECT * FROM coin WHERE coinID = $id"); //Query to select the coin
$data = $q->fetch();

if(isset($_POST['update'])) // when click on Update button
{
    $nValue= $_POST['newValue'];
	
    $edit = $pdo->query("UPDATE coin SET coinValue = $nValue WHERE coinID = $id"); //Query to upate the selected coin
	$pdo->exec($edit);

    $sql2 = $pdo->query("INSERT INTO transactions (userID, coinID, tranType) VALUES ($user, $id, 'Edited Coin Price')"); //query to add the transaction record 
    $pdo->exec($sql2);
    if($edit) // executed once query has run
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

<!-- popup for the edit coin section --> 
<div class="modal is-active" >
    <div class="modal-background" ></div>
    <div class="modal-content has-background-white py-5 px-5">
        <h3 class="title mb-5">Edit <?php echo $data['coinName'] ?> Price</h3>
        <form action="" method="post">
            <div class="field">
                
                <label class="label">New Coin Price</label>
                <div class="control">
                    <input type="number" class="input" placeholder="Price" name="newValue" value="<?php echo $data['coinValue'] ?>" required>
                </div>
                <div class="control pt-5">
                    <input type="submit" class="button is-success" name="update" value="Update"/>
                    <input type="submit" class="button is-dark" name="cancel" value="Cancel"/> 
                </div>                   
            </div>
        </form>
    </div>
</div>
