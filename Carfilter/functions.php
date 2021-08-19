<?php
/**
 * Online Shop functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Acme Themes
 * @subpackage Online Shop
 */
 

global $wpdb;
function car_filter_func ()
{

    if(!isset($_POST['Submit1'])){
     
        require('db_connection.php'); 

        $id = $_GET['id'];

        $sql = 'SELECT * FROM cars WHERE car_id = ?';

        $query = $pdo->prepare($sql);
        $query->execute([$id]);

        while($row = $query->fetch(PDO::FETCH_OBJ)) {
         echo '
        <main role="main">
        <div class="album py-5 bg-light">
            <div class="view_container">
                <div class="view_row">
                              <button class="accordion">Двигател</button>
                              <div class="panel">
                                <p class="card-text">Въртящ момент: '.$row->car_engine_torque.' </p>
                                <p class="card-text">Тип скоростна кутия: '.$row->car_gearbox_type.'</p>
                                 <p class="card-text">Мощност на двигател: '.$row->car_power_kw.'</p>
                                <p class="card-text">Модел на двигател: '.$row->car_engine_model.'</p>
                                 <p class="card-text">Брой предавки: '.$row->car_gear_shifts.'</p>
                                  <p class="card-text">Работен обем на двигател: '.$row->car_engine_displacement.'</p>
                                   <p class="card-text">Екологичност: '.$row->car_standard_type.'</p>
                                    <p class="card-text">Тип гориво: '.$row->car_fuel_type.'</p>
                                 </div>
                                
                               <button class="accordion">Разход и CO2</button>
                               <div class="panel">
                                 <p class="card-text">Разход на гориво(смесен): '.$row->car_consumption_combined.'л/км</p>
                              
                                  <p class="card-text">Емисии: '.$row->car_emissions.'г/км.</p>
                               </div>
                               
                              <button class="accordion">Размери</button>
                              <div class="panel">
                                <p class="card-text">Дължина: '.$row->car_length_mm.  ' мм </p>
                                <p class="card-text">Ширина: '.$row->car_width_mm.' мм </p>
                                <p class="card-text">Междуосие: '.$row->car_wheelbase_mm.' мм </p>
                                <p class="card-text">Пътен просвет: '.$row->car_clearance.' мм.</p>
                                  <p class="card-text">Обем на резервоара: '.$row->car_tank_volume.' л.</p>
                               
                                </div>
                                
                                <button class="accordion">Други</button>
                                <div class="panel">
                                <p class="card-text">Тип кола: '.$row->car_body_type.'</p>
                                <p class="card-text">Категория: '.$row->car_use_type.'</p>
                                </div>
                                <div class = "href_link">
                                <a href="http://www.carfilter.rivkomers.com/">Начало</a>
                                </div>
                                </div>
                            </div>
                        </div>
    </main>
      ';
    }
}
else{
        require('db_connection.php');
        require('car_filter.php');

}
 
}
wp_reset_postdata();
/**
 * require int.
 */
require_once trailingslashit( get_template_directory() ).'acmethemes/init.php';