<!-- main page for the admin site-->
<html lang="en" >
<head>
<title>Crypto Holder Admin</title>
<!-- bulmo.io open source css --> 
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">  
</head>

<body>

<!-- header-->
<nav class="navbar has-shadow is-light">
    <div class="navbar-brand">
        <a class="navbar-item">
            <img src="assets/logo.png" alt="logo" style="max-height: 70px" class="py-2 px-2">
        </a>
        <h1 class="navbar-item title">Crypto Holder Admin</h1>
    </div>

    <div class="navbar-menu " id="navlink">
        <div class="navbar-end">
            <div class="navbar-item">
                <p class="control">
                    <button class="button is-dark py-2" id="login1">Admin Login</button>
                </p>
            </div>
        </div>
    </div>

</nav>

<!-- PHP script to connect to database and get the user session -->
<?php
include "conn.php";
session_start();
$user = $_SESSION['user_id'];

if($user != 1){
    echo "<p class='text px-3'> Please login in with Admin to view tables </p>";
}
?>
<!-- transaction table -->

<div class="content">
<h1 class="py-2 px-3">Transaction Table</h1>
</div>
<div >
    <table class="table is-striped  is-fullwidth">
        <thead>
            <tr>
                <th>User</th>
                <th>Coin Name</th>
                <th>Transaction</th>
                <th>Timestamp</th>
            </tr>
        </thead>
    
    <?php
        // function to update the contents of the table
        function updateTable($pdo){
            // query thay selects the details for the transaction table
            $q = $pdo->query("SELECT u.userName, c.coinName, t.tranType, t.tranTime FROM  users u, coin c, transactions t WHERE t.coinID = c.coinID AND u.userID = t.userID ORDER BY t.tranID DESC");
            while($row = $q->fetch()){
                ?>
                <tr>
                    <th><?php echo $row['userName']; ?></th>
                    <td><?php echo $row['coinName']; ?></td>
                    <td><?php echo $row['tranType']; ?> </td>
                    <td><?php echo $row['tranTime']; ?></td>
                </tr>
                <?php
            }
        }
        if($user == 1){
            updateTable($pdo); 
        }
    ?>
    </table>
</div>

<!-- update table button -->
<div class="px-3 mt-2 control">
<button class="button is-dark" onClick="window.location.reload();">Update Table</button>
</div>

<!-- coin table -->
<div class="content">
<h1 class=" px-3 mt-5">Coin Table</h1>
</div>
<div >
    <table class="table is-striped  is-fullwidth">
        <thead>
            <tr>
                <th>Coin</th>
                <th>Price</th>
                <th>Admin Options</th>      
            </tr>
        </thead>

    <?php
        // function to update the coin table 
        function updateTable1($pdo){
            $q = $pdo->query("SELECT * FROM  coin"); // query to select all coins 
            while($row = $q->fetch()){
                ?>
                <tr>
                    <th><?php echo $row['coinName']; ?></th>
                    <td>$<?php echo $row['coinValue']; ?></td>
                    <!-- buttons for editing and deleting linking to their respective php scripts -->
                    <td><a class="button is-warning is-light mr-3" href="edit.php?id=<?php echo $row['coinID']; ?>">Edit Price</a> 
                        <a class="button is-danger is-light" href="delete.php?id=<?php echo $row['coinID']; ?>">Delete</a></td>
                </tr>
                <?php
            }
        }
        if($user == 1){
            updateTable1($pdo); 
        }
        
    ?>
    </table>
</div>

<!--Admin login popup -->
<div class="modal" id="loginm">
    <div class="modal-background" id="loginbg"></div>
    <div class="modal-content has-background-white py-5 px-5">
        <h3 class="title mb-5">Admin Login</h3>
        <form action="login.php" method="POST">
            <div class="field">
                <label  class="label">Name</label>
                <div class="control">
                     <input type="text" class="input" placeholder="Name" name="name" value="Admin" required>
                </div>
                <label class="label">Password</label>
                <div class="control">
                    <input type="password" class="input" placeholder="Password" name="password" required>
                </div>
                <div class="control pt-5">
                    <button type="submit" class="button is-dark" id="submit">login</button>
                </div>                   
            </div>
        </form>
    </div>
</div>

<!-- java script link-->
<script src="index.js"></script>

</body>
</html>