
<html lang="en" >
<head>
<title>Crypto Holder </title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
</head>

<body>
<nav class="navbar has-shadow is-light">
    <!-- header-->
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

<!--table -->
<div class="container ">
<table class="table is-striped  is-fullwidth">
    <thead>
        <tr>
            <th>Coin</th>
            <th>Price</th>
            <th>Holding Amount </th>
            <th>Holding Value</th>
            <th>Transaction Options</th>
        </tr>
    </thead>

<?php
 
$db_host   = '192.168.2.12';
$db_name   = 'fvision';
$db_user   = 'webuser';
$db_passwd = 'insecure_db_pw';

$pdo_dsn = "mysql:host=$db_host;dbname=$db_name";

$pdo = new PDO($pdo_dsn, $db_user, $db_passwd);

$q = $pdo->query("SELECT * FROM papers");

while($row = $q->fetch()){
  echo "<tr><th>".$row["code"]."</th><td>".$row["name"]."</td>";
  echo "<td>null</td>";
  echo "<td>null</td>";
echo"<td>";
    echo"<a class='button is-success is-light'>+</a>";
    echo"<a class='button is-danger is-light'>-</a>";
echo"</td></tr>";
}

?>

</table>
    <div class="text">
        <p> Please login to access your coin holder </p>
    </div>
    <div class="control">
    <button class="button is-success" id="addbtn1">+ Add Coin</button>
    <a class="button is-danger">- Remove Coin</a>
    </div>
</div>

<!--login popup -->
<div class="modal" id="loginm">
    <div class="modal-background" id="loginbg"></div>
    <div class="modal-content has-background-white py-5 px-5">
        <h3 class="title mb-5">Login</h3>
        <form method="GET">
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
                    <button type="submit" class="button is-dark">login</button>
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
            <form>
                <div class="field">
                    <label  class="label">Name</label>
                    <div class="control">
                        <input type="text" class="input" placeholder="Name">
                    </div>
                    <label class="label">Password</label>
                    <div class="control">
                        <input type="password" class="input" placeholder="Password">
                    </div>
                    <label class="label">Confirm Password</label>
                    <div class="control">
                        <input type="password" class="input" placeholder="Confirm Password">
                    </div>
                    <div class="control pt-5">
                        <button class="button is-dark">Register</button>
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
        <form method="GET">
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
                    <button type="submit" class="button is-success">Add</button>
                </div>                   
            </div>
        </form>
    </div>
</div>

<script src="index.js"></script>
</body>
</html>

