<!-- main page for the user site-->
<html lang="en" >
<head>
<title>Crypto Holder </title>
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
        <h1 class="navbar-item title">Crypto Holder </h1>
    </div>

    <div class="navbar-menu " id="navlink">
        <div class="navbar-end">
            <div class="navbar-item">
                <p class="control">
                    <button class="button is-dark py-2" id="login1">Login/Register</button>
                </p>
            </div>
        </div>
    </div>

</nav>

<?php
include "conn.php";
session_start();
$user = $_SESSION['user_id'];
$q = $pdo->query("SELECT * FROM  users WHERE userID='$user'");
$uname = $q->fetch();

?>
<div class="content">
<h1 class="py-2 px-3">Welcome <?php echo $uname['userName'] ?> </h1>
</div>
<!--table -->
<div >
<table class="table is-striped  is-fullwidth">
    <thead>
        <tr>
            <th>Coin Name</th>
            <th>Price Per Unit</th>
            <th>Holding Amount</th>
            <th>Total Value</th>
            <th>Coin Options</th>
            
        </tr>
    </thead>

<?php
 
    
    function updateTable($pdo, $user){
        $q = $pdo->query("SELECT c.coinName, c.coinValue, w.amount, w.walletID FROM  users u, coin c, wallets w WHERE w.coinID = c.coinID AND u.userID = w.userID AND u.userID='$user'");
        while($row = $q->fetch()){
            $val = $row["amount"] * $row["coinValue"];
            ?>
            <tr>
                <th><?php echo $row['coinName']; ?></th>
                <td>$<?php echo $row['coinValue']; ?></td>
                <td><?php echo $row['amount']; ?> Units</td>
                <td>$<?php echo $val; ?></td>
                <td><a class="button is-warning is-light mr-3" href="edit.php?id=<?php echo $row['walletID']; ?>">Edit Amount</a>
                <a class="button is-danger is-light" href="delete.php?id=<?php echo $row['walletID']; ?>">Remove Coin</a></td>
            </tr>
            <?php
        }
    }
    updateTable($pdo,$user); 
?>

</table>
</div>

<!-- add coin button -->
<div class="px-3 py-2 control">
    <?php
        if(!isset($user)){
            echo "<p class='text px-3'> Please login to use Coin Holder</p>";
        }else{
            echo "<button class='button is-success' id='addbtn1'>+ Add Coin</button>";
            echo '<button class=" ml-2 button is-dark" onClick="window.location.reload();">Update Table</button>';
        }
    ?>
</div>

<!--login popup -->
<div class="modal" id="loginm">
    <div class="modal-background" id="loginbg"></div>
    <div class="modal-content has-background-white py-5 px-5">
        <h3 class="title mb-5">Login</h3>
        <form action="login.php" method="POST">
            <div class="field">
                <label  class="label">Name</label>
                <div class="control">
                     <input type="text" class="input" placeholder="Name" name="name" required>
                </div>
                <label class="label">Password</label>
                <div class="control">
                    <input type="password" class="input" placeholder="Password" name="password" required>
                </div>
                <div class="control pt-5">
                    <button type="submit" class="button is-dark" id="submit">login</button>
                    <a class="button is-light" id="goToRegister">Make Account</a>
                </div>                   
            </div>
        </form>
    </div>
</div>

<!--register popup -->
<div class="modal" id="registerm">
    <div class="modal-background" id="registerbg"></div>
        <div class="modal-content has-background-white py-5 px-5">
            <h3 class="title mb-5">Register Account</h3>
            <form action="register.php" method="POST">
                <div class="field">
                    <label  class="label">Name</label>
                    <div class="control">
                        <input type="text" class="input" placeholder="Name" name="regName">
                    </div>
                    <label class="label">Password</label>
                    <div class="control">
                        <input type="password" class="input" placeholder="Password" name="regPass">
                    </div>
                    <label class="label">Confirm Password</label>
                    <div class="control">
                        <input type="password" class="input" placeholder="Confirm Password" name="conPass">
                    </div>
                    <div class="control pt-5">
                        <button type="submit" class="button is-dark" id="register">Register</button>
                    </div>
                    
                </div>
            </form>
        </div>
</div>

<!-- add coin pop-up -->
<div class="modal" id="addcoin1">
    <div class="modal-background" id="addcoinbg"></div>
    <div class="modal-content has-background-white py-5 px-5">
        <h3 class="title mb-5">Add Coin</h3>
        <form action="add.php" method="POST">
            <div class="field">
                <label  class="label">Coin</label>
                <div class="control">
                     <input type="text" class="input" placeholder="Coin" name="coin" required>
                </div>
                <label class="label">Price</label>
                <div class="control">
                    <input type="number" class="input" placeholder="Price" name="price" required>
                </div>
                <label class="label">Holding Amount</label>
                <div class="control">
                    <input type="number" class="input" placeholder="Amount" name="amount" required>
                </div>
                <div class="control pt-5">
                    <button type="submit" class="button is-success" id="addcoin">Submit</button>
                </div>                   
            </div>
        </form>
    </div>
</div>

<script src="index.js"></script>

</body>
</html>

