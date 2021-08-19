<?php ob_start();
session_start(); ?>
<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Acme Themes
 * @subpackage Online Shop
 */
/**
 * Template Name:Archive Page Listing-All
 *
 */
if (!defined('ABSPATH')) exit;
get_header();
require('db_connection.php'); ?>

    <form action="all-listings" method="post">
        <div class="search-main">
            <table style="width:100%">
                <tr>
                    <td>
                        <div class="min-max-slider" data-legendnum="2">
                            <label for="MinCarPrice">Minimum price</label>
                            <input id="min" class="min" name="MinCarPrice" type="range" step="1" min="0" max="30000"/>
                            <label for="MaxCarPrice">Maximum price</label>
                            <input id="max" class="max" name="MaxCarPrice" type="range" step="1" min="30000"
                                   max="60000"/> Цена(лв)
                        </div>
                    </td>
                    <td>
                        <div class="min-max-slider" data-legendnum="2">
                            <label for="min">Minimum length</label>
                            <input id="min" class="min" name="MinCarLength" type="range" step="1" min="1000"
                                   max="3000"/>
                            <label for="max">Maximum length</label>
                            <input id="max" class="max" name="MaxCarLength" type="range" step="1" min="4000"
                                   max="10000"/> Дължина(мм)
                        </div>
                    </td>

                    <td>
                        <div class="min-max-slider" data-legendnum="2">
                            <label for="min">Minimum width</label>
                            <input id="min" class="min" name="MinCarWidth" type="range" step="1" min="1000" max="3000"/>
                            <label for="max">Maximum width</label>
                            <input id="max" class="max" name="MaxCarWidth" type="range" step="1" min="4000"
                                   max="10000"/> Ширина(мм)
                        </div>
                    </td>

                    <td>
                          <div class="min-max-slider" data-legendnum="2">
                            <label for="min">Minimum height</label>
                            <input id="min" class="min" name="MinCarHeight" type="range" step="1" min="0" max="1500"/>
                            <label for="max">Maximum consumption</label>
                            <input id="max" class="max" name="MaxCarHeight" type="range" step="1" min="1600"
                                   max="3000"/> Височина(мм)
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>
                        <div class="min-max-slider" data-legendnum="2">
                            <label for="min">Minimum clearance</label>
                            <input id="min" class="min" name="MinCarClearance" type="range" step="1" min="50"
                                   max="150"/>
                            <label for="max">Maximum clearance</label>
                            <input id="max" class="max" name="MaxCarClearance" type="range" step="1" min="160"
                                   max="300"/> Пътен просвет(мм)
                        </div>
                    </td>

                    <td>
                        <div class="min-max-slider" data-legendnum="2">
                            <label for="min">Minimum wheelbase</label>
                            <input id="min" class="min" name="MinCarWheelbase" type="range" step="1" min="0"
                                   max="1500"/>
                            <label for="max">Maximum wheelbase</label>
                            <input id="max" class="max" name="MaxCarWheelbase" type="range" step="1" min="1600"
                                   max="3000"/> Междуосие(мм)
                        </div>
                    </td>

                    <td>
                        <div class="min-max-slider" data-legendnum="2">
                            <label for="min">Minimum power</label>
                            <input id="min" class="min" name="MinCarHorsePower" type="range" step="1" min="40"
                                   max="180"/>
                            <label for="max">Maximum power</label>
                            <input id="max" class="max" name="MaxCarHorsePower" type="range" step="1" min="190"
                                   max="400"/> Конски сили
                        </div>
                    </td>

                    <td>
                        <div class="min-max-slider" data-legendnum="2">
                            <label for="min">Minimum displace</label>
                            <input id="min" class="min" name="MinCarEngineDis" type="range" step="1" min="500"
                                   max="2750"/>
                            <label for="max">Maximum displace</label>
                            <input id="max" class="max" name="MaxCarEngineDis" type="range" step="1" min="2800"
                                   max="5000"/>Работен обем на двигател
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>
                        <div class="min-max-slider" data-legendnum="2">
                            <label for="min">Minimum speed</label>
                            <input id="min" class="min" name="MinCarSpeed" type="range" step="1" min="100" max="150"/>
                            <label for="max">Maximum speed</label>
                            <input id="max" class="max" name="MaxCarSpeed" type="range" step="1" min="160" max="300"/>
                            Скорост(км/ч)
                        </div>
                    </td>

                    <td>
                        <div class="min-max-slider" data-legendnum="2">
                            <label for="min">Minimum consumption</label>
                            <input id="min" class="min" name="MinCarConsumption" type="range" step="1" min="0"
                                   max="10"/>
                            <label for="max">Maximum consumption</label>
                            <input id="max" class="max" name="MaxCarConsumption" type="range" step="1" min="11"
                                   max="20"/> Разход на гориво(л/100км)
                        </div>
                    </td>

                    <td>
                        <div class="min-max-slider" data-legendnum="2">
                            <label for="min">Minimum emissions</label>
                            <input id="min" class="min" name="MinCarEmissions" type="range" step="1" min="0" max="200"/>
                            <label for="max">Maximum emissions</label>
                            <input id="max" class="max" name="MaxCarEmissions" type="range" step="1" min="250"
                                   max="400"/> Емисии(г/км)
                        </div>
                    </td>

                    <td>
                        <div class="min-max-slider" data-legendnum="2">
                            <label for="min">Minimum fuel tank capacity</label>
                            <input id="min" class="min" name="MinCarFuel" type="range" step="1" min="40" max="60"/>
                            <label for="max">Maximum fuel tank capacity</label>
                            <input id="max" class="max" name="MaxCarFuel" type="range" step="1" min="70" max="100"/>
                            Обем на резервоара(л.)
                        </div>
                    </td>
                </tr>

            </table>
        </div>

        <div>
            <select name="carBrand" id="car_brand">

                <option selected disabled><?php echo $_POST['carBrand'] ?></option>
                <?php
                $sql = '
    SELECT DISTINCT car_brand
    FROM cars
    ORDER BY car_brand';
                $query = $pdo->prepare($sql);
                $query->execute();
                while ($row = $query->fetch(PDO::FETCH_OBJ)) {
                    echo '<option value="' . $row->car_brand . '">' . $row->car_brand . '</option>';
                }

                ?>"

            </select>
        
        
            <input type="text" id="car_model" name="carModel" value="<?php echo $_POST['carModel'] ?>"
                   placeholder="Модел">
            
            <select name="carYear" required>
                <option selected disabled><?php echo $_POST['carYear'] ?></option>
                <?php

                $sql = '
    SELECT DISTINCT car_year
    FROM cars
    ORDER BY car_year';
                $query = $pdo->prepare($sql);
                $query->execute();
                while ($row = $query->fetch(PDO::FETCH_OBJ)) {
                    echo '<option value="' . $row->car_year . '">' . $row->car_year . '</option>';
                }

                ?>"
            </select>
        </div>

        <div>

            <select name="carGearboxT" id="car_gearbox_type">
                <option selected disabled><?php echo $_POST['carGearboxT'] ?></option>
                <?php
                $sql = '
    SELECT DISTINCT car_gearbox_type
    FROM cars';
                $query = $pdo->prepare($sql);
                $query->execute();
                while ($row = $query->fetch(PDO::FETCH_OBJ)) {
                    echo '<option value="' . $row->car_gearbox_type . '">' . $row->car_gearbox_type . '</option>';
                }

                ?>"
            </select>

            <select name="carStandard" id="car_standart_type">
                <option selected disabled><?php echo $_POST['carStandard'] ?></option>
                <?php
                $sql = '
    SELECT DISTINCT car_standard_type
    FROM cars';
                $query = $pdo->prepare($sql);
                $query->execute();
                while ($row = $query->fetch(PDO::FETCH_OBJ)) {
                    echo '<option value="' . $row->car_standard_type . '">' . $row->car_standard_type . '</option>';
                }

                ?>"
            </select>
        

        
            <select name="carFuelT">
                <option selected disabled><?php echo $_POST['carFuelT'] ?></option>
                <?php
                $sql = '
    SELECT DISTINCT car_fuel_type
    FROM cars';
                $query = $pdo->prepare($sql);
                $query->execute();
                while ($row = $query->fetch(PDO::FETCH_OBJ)) {
                    echo '<option value="' . $row->car_fuel_type . '">' . $row->car_fuel_type . '</option>';
                }

                ?>"
            </select>
            
            </div>
            
            <div>
            <select name="carGearS">
                <option selected disabled><?php echo $_POST['carGearS'] ?></option>
                <?php
                $sql = '
    SELECT DISTINCT car_gear_shifts
    FROM cars
    ORDER BY car_gear_shifts ';
                $query = $pdo->prepare($sql);
                $query->execute();
                while ($row = $query->fetch(PDO::FETCH_OBJ)) {
                    echo '<option value="' . $row->car_gear_shifts . '">' . $row->car_gear_shifts . '</option>';
                }

                ?>"
            </select>
            <select name="carBody">
                <option selected disabled><?php echo $_POST['carBody'] ?></option>
                <?php
                $sql = '
    SELECT DISTINCT car_body_type
    FROM cars';
                $query = $pdo->prepare($sql);
                $query->execute();
                while ($row = $query->fetch(PDO::FETCH_OBJ)) {
                    echo '<option value="' . $row->car_body_type . '">' . $row->car_body_type . '</option>';
                }

                ?>"
            </select>
      
            <select name="carUseT">
                <?php
                $sql = '
    SELECT DISTINCT car_use_type
    FROM cars';
                $query = $pdo->prepare($sql);
                $query->execute();
                while ($row = $query->fetch(PDO::FETCH_OBJ)) {
                    echo '<option value="' . $row->car_use_type . '">' . $row->car_use_type . '</option>';
                }

                ?>"
            </select>
           
        </div>
        <div>
            <input type="submit" name="Submit1" class="mainButton" id="outPut">
        </div>
        </div>
    </form>
<?php

?>
<?php
require('db_connection.php');

$keyword = $_POST['MinCarLength'];//
$keyword1 = $_POST['carYear'];//
$keyword2 = $_POST['MinCarWidth'];//
$keyword3 = $_POST['MinCarPrice'];//
$keyword6 = $_POST['MinCarWheelbase'];
$keyword7 = $_POST['MinCarHorsePower'];
$min_kw = $keyword7 / 1.34102;
$keyword8 = $_POST['MinCarFuel'];
$keyword9 = $_POST['carFuelT'];
$keyword10 = $_POST['MinCarSpeed'];
$keyword11 = $_POST['carGearS'];
$keyword12 = $_POST['MinCarClearance'];
$keyword13 = $_POST['carBody'];
$keyword14 = $_POST['MinCarConsumption'];
$keyword15 = $_POST['carStandard'];
$keyword16 = $_POST['MinCarEmissions'];
$keyword17 = $_POST['carUseT'];
$keyword18 = $_POST['MinCarEngineDis'];
$keyword19 = $_POST['carGearboxT'];
$keyword20 = $_POST['carBrand'];
$keyword21 = $_POST['carModel'];
$keyword22 = $_POST['MaxCarPrice'];
$keyword23 = $_POST['MaxCarLength'];
$keyword24 = $_POST['MaxCarWidth'];
$keyword25 = $_POST['MaxCarClearance'];
$keyword26 = $_POST['MaxCarWheelbase'];
$keyword27 = $_POST['MaxCarHorsePower'];
$max_kw = $keyword27 / 1.34102;
$keyword28 = $_POST['MaxCarSpeed'];
$keyword29 = $_POST['MaxCarConsumption'];
$keyword30 = $_POST['MaxCarEmissions'];
$keyword31 = $_POST['MinCarHeight'];
$keyword32 = $_POST['MaxCarHeight'];
$keyword33 = $_POST['MaxCarFuel'];
$keyword34 = $_POST['MaxCarEngineDis'];


//$my_arr = array(
//        $keyword = $_POST['MinCarLength'],//
//$keyword1 = $_POST['carYear'],//
//$keyword2 = $_POST['MinCarWidth'],//
//$keyword3 = $_POST['MinCarPrice'],//
//$keyword5 = $_POST['carHPower'],
//$keyword6 = $_POST['MinCarWheelbase'],
//$keyword7 = $_POST['MinCarEnginePower'],
//$keyword8 = $_POST['MinCarFuel'],
//$keyword9 = $_POST['carFuelT'],
//$keyword10 = $_POST['MinCarSpeed'],
//$keyword11 = $_POST['carGearS'],
//$keyword12 = $_POST['MinCarClearance'],
//$keyword13 = $_POST['carBody'],
//$keyword14 = $_POST['MinCarConsumption'],
//$keyword15 = $_POST['carStandard'],
//$keyword16 = $_POST['MinCarEmissions'],
//$keyword17 = $_POST['carUseT'],
//$keyword18 = $_POST['carEngDis'],
//$keyword19 = $_POST['carGearboxT'],
//$keyword20 = $_POST['carBrand'],
//$keyword21 = $_POST['carModel'],
//$keyword22 = $_POST['MaxCarPrice'],
//$keyword23 = $_POST['MaxCarLength'],
//$keyword24 = $_POST['MaxCarWidth'],
//$keyword25 = $_POST['MaxCarClearance'],
//$keyword26 = $_POST['MaxCarWheelbase'],
//$keyword27 = $_POST['MaxCarEnginePower'],
//$keyword28 = $_POST['MaxCarSpeed'],
//$keyword29 = $_POST['MaxCarConsumption'],
//$keyword30 = $_POST['MaxCarEmissions'],
//$keyword31 = $_POST['MinCarHeight'],
//$keyword32 = $_POST['MaxCarHeight'],
//$keyword33 = $_POST['MaxCarFuel'],
//);

$sql = '
    SELECT * 
    FROM cars 
    WHERE 
         (car_price BETWEEN :keyword3 AND :keyword22) 
         AND (car_height_mm BETWEEN :keyword31 AND :keyword32) 
         AND (car_length_mm BETWEEN :keyword AND :keyword23)
         AND (car_width_mm BETWEEN :keyword2 AND :keyword24)
         AND (car_wheelbase_mm BETWEEN :keyword6 AND :keyword26)
         AND (car_clearance BETWEEN :keyword12 AND :keyword25)
         AND (car_horsepower BETWEEN :keyword7 AND :keyword27) 
         AND (car_tank_volume BETWEEN :keyword8 AND :keyword33)
         AND (car_max_speed BETWEEN :keyword10 AND :keyword28)
         AND (car_consumption_combined BETWEEN :keyword14 AND :keyword29)
         AND (car_emissions BETWEEN :keyword16 AND :keyword30)
         AND (car_engine_displacement BETWEEN :keyword18 AND :keyword34)
         AND (car_power_kw BETWEEN :min_kw AND :max_kw)
         AND car_year = :keyword1
         AND car_gear_shifts = :keyword11
         AND car_fuel_type = :keyword9
         AND car_standard_type = :keyword15
         AND car_gearbox_type = :keyword19
         AND car_body_type = :keyword13
         AND car_use_type = :keyword17';


$query = $pdo->prepare($sql);
$query->bindValue(':keyword', $keyword, PDO::PARAM_INT); // car min length
$query->bindValue(':keyword23', $keyword23, PDO::PARAM_INT); //car max length
$query->bindValue(':keyword16', $keyword16, PDO::PARAM_INT); // emissions
$query->bindValue(':keyword30', $keyword30, PDO::PARAM_INT); //car max length
$query->bindValue(':keyword29', $keyword29, PDO::PARAM_INT); //car max consumption
$query->bindValue(':keyword14', $keyword14, PDO::PARAM_INT); // consumption combined(min)
$query->bindValue(':keyword28', $keyword28, PDO::PARAM_INT); //car max length
$query->bindValue(':keyword10', $keyword10, PDO::PARAM_INT); // max speed
$query->bindValue(':keyword33', $keyword33, PDO::PARAM_INT); //car max length
$query->bindValue(':keyword8', $keyword8, PDO::PARAM_INT); // tank volume
$query->bindValue(':keyword27', $keyword27, PDO::PARAM_INT); //car max length
$query->bindValue(':keyword7', $keyword7, PDO::PARAM_INT); // engine power
$query->bindValue(':keyword25', $keyword25, PDO::PARAM_INT); //car max length
$query->bindValue(':keyword12', $keyword12, PDO::PARAM_INT); // clearance
$query->bindValue(':keyword18', $keyword18, PDO::PARAM_INT); // engine displacement
$query->bindValue(':keyword17', $keyword17, PDO::PARAM_STR); // car use type
$query->bindValue(':keyword13', $keyword13, PDO::PARAM_STR); // body type
$query->bindValue(':keyword19', $keyword19, PDO::PARAM_STR); //car_gearbox_type
$query->bindValue(':keyword15', $keyword15, PDO::PARAM_STR); // standard type
$query->bindValue(':min_kw', $min_kw, PDO::PARAM_INT); // min kw
$query->bindValue(':max_kw', $max_kw, PDO::PARAM_INT); // max kw
$query->bindValue(':keyword9', $keyword9, PDO::PARAM_STR); // fuel type
$query->bindValue(':keyword26', $keyword26, PDO::PARAM_INT); //car max length
$query->bindValue(':keyword6', $keyword6, PDO::PARAM_INT); // wheelbase
$query->bindValue(':keyword11', $keyword11, PDO::PARAM_INT); // gear shifts
$query->bindValue(':keyword1', $keyword1, PDO::PARAM_INT); // year
$query->bindValue(':keyword2', $keyword2, PDO::PARAM_INT); // width
$query->bindValue(':keyword24', $keyword24, PDO::PARAM_INT); //car max length
$query->bindValue(':keyword31', $keyword31, PDO::PARAM_INT); //car max length
$query->bindValue(':keyword32', $keyword32, PDO::PARAM_INT); //car max length
//$query->bindValue(':keyword20', $keyword20, PDO::PARAM_STR); //car_brand
//$query->bindValue(':keyword21', $keyword21, PDO::PARAM_STR); // car_model
$query->bindValue(':keyword22', $keyword22, PDO::PARAM_INT); //car max price
$query->bindValue(':keyword3', $keyword3, PDO::PARAM_INT); // car min price
$query->bindValue(':keyword34', $keyword34, PDO::PARAM_INT); // car min price
$query->execute();

if (!$query->rowCount() == 0) {
    echo '<h2 style="color:white;text-align: center;">Намерени резултати: ' . $query->rowCount() . '</h2>';
    while ($row = $query->fetch(PDO::FETCH_OBJ)) {
        echo '
 <main role="main">
        <div class="view_car">
            <div class="view_container">
                <div class="view_row">
                <h2>Марка: ' . $row->car_brand . '</h2>
                <h2>Модел: ' . $row->car_model . '</h2>
                              <button class="accordion"><b>Двигател</b></button>
                              <div class="panel">
                                <p class="card-text">Въртящ момент: ' . $row->car_engine_torque . ' Nm</p>
                                <p class="card-text">Тип скоростна кутия: ' . $row->car_gearbox_type . '</p>
                                <p class="card-text">Мощност на двигател: ' . $row->car_power_kw . ' kW.</p>
                                <p class="card-text">Модел на двигател: ' . $row->car_engine_model . '</p>
                                <p class="card-text">Брой предавки: ' . $row->car_gear_shifts . '</p>
                                <p class="card-text">Работен обем на двигател: ' . $row->car_engine_displacement . ' см³</p>
                                <p class="card-text">Екологичност: ' . $row->car_standard_type . '</p>
                                <p class="card-text">Тип гориво: ' . $row->car_fuel_type . '</p>
                                <p class="card-text">Конски сили: ' . $row->car_horsepower . '</p>
                                <p class="card-text">Максимална скорост: ' . $row->car_max_speed . ' км/ч</p>
                              </div>
                                
                               <button class="accordion"><b>Разход и CO2</b></button>
                               <div class="panel">
                                 <p class="card-text">Разход на гориво(смесен): ' . $row->car_consumption_combined . 'л/100км</p>
                                 <p class="card-text">Емисии: ' . $row->car_emissions . 'г/км.</p>
                               </div>
                               
                              <button class="accordion"><b>Размери</b></button>
                              <div class="panel">
                                <p class="card-text">Дължина: ' . $row->car_length_mm . ' мм.</p>
                                <p class="card-text">Ширина: ' . $row->car_width_mm . ' мм.</p>
                                <p class="card-text">Междуосие: ' . $row->car_wheelbase_mm . ' мм.</p>
                                <p class="card-text">Пътен просвет: ' . $row->car_clearance . ' мм.</p>
                                <p class="card-text">Височина: ' . $row->car_height_mm . ' мм.</p>
                                <p class="card-text">Обем на резервоара: ' . $row->car_tank_volume . ' л.</p>
                                </div>
                                
                                <button class="accordion"><b>Други</b></button>
                                <div class="panel">
                                <p class="card-text">Тип кола: ' . $row->car_body_type . '</p>
                                <p class="card-text">Категория: ' . $row->car_use_type . '</p>
                                <p class="card-text">Година: ' . $row->car_year . '</p>
                                <p class="card-text">Цена: ' . $row->car_price . ' лв</p>
                                </div>
                                </div>
                            </div>
                        </div>
    </main>
      ';
    }
    echo '<div class = "href_link">
                                <a href="http://www.carfilter.rivkomers.com/">Начало</a>
                                </div>';

} else {

    $sql = '
    SELECT * 
    FROM cars';
    $query = $pdo->prepare($sql);
    $query->execute();

    while ($row = $query->fetch(PDO::FETCH_OBJ)) {
        echo '
 <main role="main">
        <div class="view_car">
            <div class="view_container">
                <div class="view_row">
                <h2>Марка: ' . $row->car_brand . '</h2>
                <h2>Модел: ' . $row->car_model . '</h2>
                              <button class="accordion"><b>Двигател</b></button>
                              <div class="panel">
                                <p class="card-text">Въртящ момент: ' . $row->car_engine_torque . ' Nm</p>
                                <p class="card-text">Тип скоростна кутия: ' . $row->car_gearbox_type . '</p>
                                <p class="card-text">Мощност на двигател: ' . $row->car_power_kw . ' kW.</p>
                                <p class="card-text">Модел на двигател: ' . $row->car_engine_model . '</p>
                                <p class="card-text">Брой предавки: ' . $row->car_gear_shifts . '</p>
                                <p class="card-text">Работен обем на двигател: ' . $row->car_engine_displacement . ' см³</p>
                                <p class="card-text">Екологичност: ' . $row->car_standard_type . '</p>
                                <p class="card-text">Тип гориво: ' . $row->car_fuel_type . '</p>
                                <p class="card-text">Конски сили: ' . $row->car_horsepower . '</p>
                                <p class="card-text">Максимална скорост: ' . $row->car_max_speed . ' км/ч</p>
                              </div>
                                
                               <button class="accordion"><b>Разход и CO2</b></button>
                               <div class="panel">
                                 <p class="card-text">Разход на гориво(смесен): ' . $row->car_consumption_combined . 'л/100км</p>
                                 <p class="card-text">Емисии: ' . $row->car_emissions . 'г/км.</p>
                               </div>
                               
                              <button class="accordion"><b>Размери</b></button>
                              <div class="panel">
                                <p class="card-text">Дължина: ' . $row->car_length_mm . ' мм.</p>
                                <p class="card-text">Ширина: ' . $row->car_width_mm . ' мм.</p>
                                <p class="card-text">Междуосие: ' . $row->car_wheelbase_mm . ' мм.</p>
                                <p class="card-text">Пътен просвет: ' . $row->car_clearance . ' мм.</p>
                                <p class="card-text">Височина: ' . $row->car_height_mm . ' мм.</p>
                                <p class="card-text">Обем на резервоара: ' . $row->car_tank_volume . ' л.</p>
                                </div>
                                
                                <button class="accordion"><b>Други</b></button>
                                <div class="panel">
                                <p class="card-text">Тип кола: ' . $row->car_body_type . '</p>
                                <p class="card-text">Категория: ' . $row->car_use_type . '</p>
                                <p class="card-text">Година: ' . $row->car_year . '</p>
                                <p class="card-text">Цена: ' . $row->car_price . ' лв</p>
                                </div>
                                </div>
                            </div>
                        </div>
    </main>
      ';
    }
    echo '<div class = "href_link">
                                <a href="http://www.carfilter.rivkomers.com/">Начало</a>
                                </div>';

}

?>

    <script>
        var thumbsize = 14;

        function draw(slider, splitvalue) {

            /* set function vars */
            var min = slider.querySelector('.min');
            var max = slider.querySelector('.max');
            var lower = slider.querySelector('.lower');
            var upper = slider.querySelector('.upper');
            var legend = slider.querySelector('.legend');
            var thumbsize = parseInt(slider.getAttribute('data-thumbsize'));
            var rangewidth = parseInt(slider.getAttribute('data-rangewidth'));
            var rangemin = parseInt(slider.getAttribute('data-rangemin'));
            var rangemax = parseInt(slider.getAttribute('data-rangemax'));

            /* set min and max attributes */
            min.setAttribute('max', splitvalue);
            max.setAttribute('min', splitvalue);

            /* set css */
            min.style.width = parseInt(thumbsize + ((splitvalue - rangemin) / (rangemax - rangemin)) * (rangewidth - (2 * thumbsize))) + 'px';
            max.style.width = parseInt(thumbsize + ((rangemax - splitvalue) / (rangemax - rangemin)) * (rangewidth - (2 * thumbsize))) + 'px';
            min.style.left = '0px';
            max.style.left = parseInt(min.style.width) + 'px';
            min.style.top = lower.offsetHeight + 'px';
            max.style.top = lower.offsetHeight + 'px';
            legend.style.marginTop = min.offsetHeight + 'px';
            slider.style.height = (lower.offsetHeight + min.offsetHeight + legend.offsetHeight) + 'px';

            /* correct for 1 off at the end */
            if (max.value > (rangemax - 1)) max.setAttribute('data-value', rangemax);

            /* write value and labels */
            max.value = max.getAttribute('data-value');
            min.value = min.getAttribute('data-value');
            lower.innerHTML = min.getAttribute('data-value');
            upper.innerHTML = max.getAttribute('data-value');

        }

        function init(slider) {
            /* set function vars */
            var min = slider.querySelector('.min');
            var max = slider.querySelector('.max');
            var rangemin = parseInt(min.getAttribute('min'));
            var rangemax = parseInt(max.getAttribute('max'));
            var avgvalue = (rangemin + rangemax) / 2;
            var legendnum = slider.getAttribute('data-legendnum');

            /* set data-values */
            min.setAttribute('data-value', rangemin);
            max.setAttribute('data-value', rangemax);

            /* set data vars */
            slider.setAttribute('data-rangemin', rangemin);
            slider.setAttribute('data-rangemax', rangemax);
            slider.setAttribute('data-thumbsize', thumbsize);
            slider.setAttribute('data-rangewidth', slider.offsetWidth);

            /* write labels */
            var lower = document.createElement('span');
            var upper = document.createElement('span');
            lower.classList.add('lower', 'value');
            upper.classList.add('upper', 'value');
            lower.appendChild(document.createTextNode(rangemin));
            upper.appendChild(document.createTextNode(rangemax));
            slider.insertBefore(lower, min.previousElementSibling);
            slider.insertBefore(upper, min.previousElementSibling);

            /* write legend */
            var legend = document.createElement('div');
            legend.classList.add('legend');
            var legendvalues = [];
            for (var i = 0; i < legendnum; i++) {
                legendvalues[i] = document.createElement('div');
                var val = Math.round(rangemin + (i / (legendnum - 1)) * (rangemax - rangemin));
                legendvalues[i].appendChild(document.createTextNode(val));
                legend.appendChild(legendvalues[i]);

            }
            slider.appendChild(legend);

            /* draw */
            draw(slider, avgvalue);

            /* events */
            min.addEventListener("input", function () {
                update(min);
            });
            max.addEventListener("input", function () {
                update(max);
            });
        }

        function update(el) {
            /* set function vars */
            var slider = el.parentElement;
            var min = slider.querySelector('#min');
            var max = slider.querySelector('#max');
            var minvalue = Math.floor(min.value);
            var maxvalue = Math.floor(max.value);

            /* set inactive values before draw */
            min.setAttribute('data-value', minvalue);
            max.setAttribute('data-value', maxvalue);

            var avgvalue = (minvalue + maxvalue) / 2;

            /* draw */
            draw(slider, avgvalue);
        }

        var sliders = document.querySelectorAll('.min-max-slider');
        sliders.forEach(function (slider) {
            init(slider);
        });


        var acc = document.getElementsByClassName("accordion");
        var i;

        for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function () {
                this.classList.toggle("active");
                var panel = this.nextElementSibling;
                if (panel.style.maxHeight) {
                    panel.style.maxHeight = null;
                } else {
                    panel.style.maxHeight = panel.scrollHeight + "px";
                }
            });
        }

    </script>
<?php

wp_reset_postdata();
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
