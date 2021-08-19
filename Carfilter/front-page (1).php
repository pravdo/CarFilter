<?php ob_start();
session_start(); ?>
<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Acme Themes
 * @subpackage Online Shop
 */
if (!defined('ABSPATH')) exit;
get_header();
function my_enqueue()
{
    wp_enqueue_script('ajax-script', get_template_directory_uri() . '/js/my-ajax-script.js', array('jquery'));
    wp_localize_script('ajax-script', 'my_ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));
}

add_action('wp_enqueue_scripts', 'my_enqueue');
/**
 *
 */
require('db_connection.php');

?>
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

                <option selected disable>Марка</option>
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
            
             <input type="text" id="car_model" name="carModel" placeholder="Модел">
            <select name="carYear" required>
                <option selected disabled>Година*</option>
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
                <option selected disable>Избери тип кутия*</option>
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
                <option selected disable>Избери екологичен стандарт*</option>
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
                <option selected disabled>Гориво*</option>
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
                <option selected disabled>Брой предавки*</option>
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
                <option selected disable>Купе*</option>
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
                    echo '<option value="' . $row->car_use_type . '">' . $row->car_use_type . '*</option>';
                }

                ?>"
            </select>
        </div>
       
        <div>
            <input type="submit" name="Submit1" class="mainButton" id="outPut">
        </div>
    </form>
<?php
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
