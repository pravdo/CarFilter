<?php
get_header();
/**
 * Template Name: Statistics
 *
 */
require('db_connection.php');

$sql = "SELECT 
ROUND(AVG(car_price)) as avg_price , 
MIN(car_price) as low_price , 
MAX(car_price) as max_price , 
COUNT(car_brand) as car_count
FROM cars";
$query = $pdo->prepare($sql);
$query->execute();
while ($row = $query->fetch(PDO::FETCH_OBJ)) {
echo '

<h1>Средната цена е: '.$row->avg_price.'</h1>
<h1>Най ниската цена е : '.$row->low_price.'</h1>
<h1>Най високата цена е : '.$row->max_price.'</h1>
<h1>Брой марките : '.$row->car_count.'</h1>
';

}
get_footer();