<!-- database connection php -->
<?php
$db_host   = '192.168.2.12';
$db_name   = 'coinHolder';
$db_user   = 'admin';
$db_passwd = '3c15b90868025dae79a5671ca3718085';

$pdo_dsn = "mysql:host=$db_host;dbname=$db_name";

$pdo = new PDO($pdo_dsn, $db_user, $db_passwd);
?>