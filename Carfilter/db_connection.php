<?php

$host = 'localhost';
$dbname = 'rivkomer_cars';
$username = 'rivkomer_cars';
$password = ']C]b@O$61Ix=';
$port = '3306';

$dsn = "mysql:host={$host};port={$port};dbname={$dbname}";
$pdo = new PDO($dsn, $username , $password);

?>
