<?php
require('db_connection.php');
$sql = 'DELETE FROM cars WHERE car_id = ?';
$query = $pdo->prepare($sql);
$query->execute([$_GET['id']]);
header("location:http://www.carfilter.rivkomers.com/%d0%b2%d1%81%d0%b8%d1%87%d0%ba%d0%b8-%d0%ba%d0%be%d0%bb%d0%b8/");
