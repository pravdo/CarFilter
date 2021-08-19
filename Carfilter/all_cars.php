<?php ob_start();
session_start(); ?>
<?php

/**
 *
 * Template Name: All Cars Page
 *
 */
if (!defined('ABSPATH')) exit;
get_header();
/**
 * test
 */


$con = mysqli_connect('localhost', 'rivkomer_cars', ']C]b@O$61Ix=', 'rivkomer_cars', '3306');
mysqli_select_db($con, 'cars');

$sql = 'SELECT * FROM cars';
$result = mysqli_query($con, $sql);

while ($row = mysqli_fetch_array($result)) {
    echo '
 <main role="main">
            <div class="container">
                            <div class="card-body">
                                <p class="card-text">Марка: ' . $row['car_brand'] . '</p>
                                <p class="card-text">Модел: ' . $row['car_model'] . '</p>                               
                                <p class="card-text">Тип двигател: ' . $row['car_engine_model'] . '</p>
                                <p class="card-text">Цена: ' . $row['car_price'] . 'лв. </p>
                                <a href="single-page?id=' . $row['car_id'] . '">
                                <button type="button" class="btn btn-info class="btn btn-primary btn-sm" name="Submit2">Виж повече</button></a>';
                                if(!empty($_SESSION) && !empty($_SESSION['username']) && strcmp($_SESSION['username'],'admin') === 0)
                                echo '
                                <div class="delete">
                                <a href="/wp-content/themes/online-shop/delete_car.php?id=' . $row['car_id'] . '">
                                <button type="button" class="btn btn-info class="btn btn-primary btn-sm" name="Submit3">Изтрий</button></a>
                                </div>';
                                echo'
                        </div>
                        
    </main>
';
}

                  
get_footer();


?>
<?php
 if(!empty($_SESSION) && !empty($_SESSION['username']) && strcmp($_SESSION['username'],'admin') === 0)
  echo '
    <style>
                    li.menu-item-1150{
                       display: block;
                       visibility: visible;
                    }
                    
                   </style>
                   ';
                   ?>
