<?php ob_start();
session_start(); ?>
<?php
/**
 *
 * Template Name: Single Page
 *
 */
if (!defined('ABSPATH')) exit;
get_header();
/**
 *
 */

?>


<?php
require('db_connection.php');

$id = $_GET['id'];

$sql = 'SELECT * FROM cars WHERE car_id = ? ';
$query = $pdo->prepare($sql);
$query->execute([$id]);
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
                                <br>';
  if(!empty($_SESSION) && !empty($_SESSION['username']) && strcmp($_SESSION['username'],'admin') === 0)
  echo'
                                <div>
                                <a href="/wp-content/themes/online-shop/update_car.php?id=' . $row->car_id . '">
                                <button type="button" class="btn btn-info class="btn btn-primary btn-sm" name="Submit3">Редакция</button></a>
                                </div>
                                ';
                                echo'
                                <div class = "href_link">
                                <a href="http://www.carfilter.rivkomers.com/%d0%b2%d1%81%d0%b8%d1%87%d0%ba%d0%b8-%d0%ba%d0%be%d0%bb%d0%b8/" id ="myHref">Назад</a>
                                </div>
                            </div>
                        </div>
    </main>
      ';
}
?>

    <script>


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

        $(document).on('click', '#showData', function (e) {
            $.ajax({
                type: "GET",
                url: "backend-script.php",
                dataType: "html",
                success: function (data) {
                    $("#table-container").html(data);

                }
            });
        });
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="ajax-script.js"></script>
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
