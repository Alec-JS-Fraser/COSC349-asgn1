
<html lang="en" >
<head>
<title>Crypto Holder </title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
</head>

<body>
<nav class="navbar has-shadow">
    <!-- header-->
    <div class="navbar-brand">
        <a class="navbar-item">
            <img src="assets/logo.png" alt="logo" style="max-height: 70px">
            
        </a>
        <h1 class="navbar-item title">Crypto Holder </h1>
    </div>

    <div class="navbar-menu">
        <div class="navbar-end">
            <a  class="navbar-item">My Account</a>
        </div>
    </div>

</nav>

<?php
 
$db_host   = '192.168.2.12';
$db_name   = 'fvision';
$db_user   = 'webuser';
$db_passwd = 'insecure_db_pw';

$pdo_dsn = "mysql:host=$db_host;dbname=$db_name";

$pdo = new PDO($pdo_dsn, $db_user, $db_passwd);

$q = $pdo->query("SELECT * FROM papers");

while($row = $q->fetch()){
  echo "<tr><td>".$row["code"]."</td><td>".$row["name"]."</td></tr>\n";
}

?>




</body>
</html>

