<!-- PHP script to delete a coin from the database -->
<?php

include "conn.php"; 

session_start();
$user = $_SESSION['user_id'];

$id = $_GET['id']; 

$q = $pdo->query("SELECT * FROM coin WHERE coinID = $id"); //query to select coorect coin
$data = $q->fetch();

if(isset($_POST['delete'])) // when click on Update button
{
    $del = $pdo->query("DELETE FROM coin WHERE coinID = $id"); // query to delete coin
    $pdo->exec($del);
    
    if($del) //executed once query has run
    {
    
        header("location:index.php"); 
        exit;	
    }
    else
    {
        echo "Error deleting record"; 
    } 
}
if(isset($_POST['cancel'])){
    header("location:index.php"); 
    exit;
}
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">

<!-- popup for deleting coin -->
<div class="modal is-active" >
    <div class="modal-background" ></div>
    <div class="modal-content has-background-white py-5 px-5">
        <h3 class="title mb-5">Do you want to delete <?php echo $data['coinName'] ?> ?</h3>
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
