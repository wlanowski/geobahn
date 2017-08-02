<?php
include "../globalconfig.php";

$pdo = new PDO('mysql:host=' . $db_host . ';dbname=' . $db_name, $db_user, $db_pass);
$pdo->exec("set names utf8");

$sqlabfrage = $pdo->prepare('select username from ' . $db_pref . '_users where ID =:eingabe LIMIT 1');

$sqlabfrage->bindParam(':eingabe', $_GET['e']);
$sqlabfrage->execute();

//print_r ($sqlabfrage->fetch());
echo $sqlabfrage->fetch()['username'];
?>