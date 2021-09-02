
<html lang="en" >
<head>
<title>Crypto Holder Admin</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
</head>

<body>

<nav class="navbar has-shadow is-light">
    <!-- header-->
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
                    <button class="button is-dark py-2" id="login1"> Admin Login</button>
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
<h1 class="py-2 px-3">Transaction Table</h1>
</div>
<!--table -->
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
    
        
        function updateTable($pdo){
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
        updateTable($pdo); 
    ?>
    </table>
</div>
<!-- update table button -->

<div class="px-3 py-2 control">
<button class="button is-dark" onClick="window.location.reload();">Update Table</button>
</div>

<!-- coin table -->






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

