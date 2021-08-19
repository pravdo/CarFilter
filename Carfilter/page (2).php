<?php

get_header(); ?>

    <div class="add_form">
        <form action=" " method="post">
            <table>
                <tr>
                    <td>
                        Марка кола:
                    </td>
                    <td>
                        <input type="text" name="brand" required></td>
                </tr>
                </td>
                </tr>
                <tr>
                    <td>Модел:</td>
                    <td><input type="text" name="model" required></td>
                </tr>
                <tr>
                    <td>Модел на двигател:</td>
                    <td><input type="text" name="engineModel" color="black" required></td>
                </tr>
                <tr>
                    <td>Конски сили:</td>
                    <td><input type="number" id="horsePower" name="horsePower" required></td>

                </tr>
                <tr>
                    <td><input type="hidden" id="kwPower" name="kwPower"></td>
                </tr>
                <tr>
                    <td>Работен обем на двигател:</td>
                    <td><input type="number" id="displacement" name="displacement" placeholder="cm³" required></td>
                </tr>
                <tr>
                    <td>Година на производство:</td>
                    <td><input type="text" id="year" name="carYear" min="1990" max="2021" required></td>
                </tr>
                <tr>
                    <td>Цена:</td>
                    <td><input type="number" id="price" name="price" required></td>
                </tr>
                <tr>
                    <td>Дължина:</td>
                    <td><input type="text" id="length" name="carLength" required></td>
                </tr>
                <tr>
                    <td>Височина:</td>
                    <td><input type="text" id="height" name="carHeight" required></td>
                </tr>
                <tr>
                    <td>Ширина:</td>
                    <td><input type="text" id="width" name="width" required></td>
                </tr>
                <tr>
                    <td>Околосие:</td>
                    <td><input type="text" id="wheelBase" name="wheelBase" placeholder="mm" required></td>
                </tr>
                <tr>
                    <td>Въртящ момент:</td>
                    <td><input type="text" id="torque" name="torque" placeholder="Nm" required></td>
                </tr>
                <tr>
                    <td>
                        <label for="gearBox">Тип скоростна кутия:</label></td>
                    <td><select id="gearBox" name="gearBox" required>
                            <option value="Автоматична">Автоматична</option>
                            <option value="Полуавтоматична">Полуавтоматична</option>
                            <option value="Ръчна">Ръчна</option>
                            </option>
                        </select></td>
                </tr>

                <tr>
                    <td>Брой предавки:</td>
                    <td><input type="number" id="shiftsNum" name="shiftsNum" required></td>
                </tr>
                <tr>
                    <td>Обем на резервоара:</td>
                    <td><input type="number" id="tankVolume" name="tankVolume" placeholder="л." required></td>
                </tr>
                <tr>
                    <td>Разход на гориво:</td>
                    <td><input type="text" id="consumption" name="consumption" placeholder="л/км" required></td>
                </tr>
                <tr>
                    <td>Максимална скорост:</td>
                    <td><input type="number" id="maxSpeed" name="maxSpeed" required></td>
                </tr>
                <tr>
                    <td><label for="fuelType">Тип гориво:</label></td>
                    <td><select id="fuelType" name="fuelType" required>
                            <option value="Бензин">Бензин</option>
                            <option value="Дизел">Дизел(нафта)</option>
                        </select></td>
                </tr>
                <tr>
                    <td>Пътен просвет:</td>
                    <td><input type="text" id="clearance" name="clearance" required></td>
                </tr>
                <tr>
                    <td>Тип кола:</td>
                    <td><input type="text" name="bodyType" required></td>
                </tr>
                <tr>
                    <td>Категория:</td>
                    <td><input type="text" name="carUseType" required></td>
                </tr>
                <tr>
                    <td>Емисии:</td>
                    <td><input type="text" name="emissions" placeholder="г/км" required></td>
                </tr>
                <tr>
                    <td>Екологичност:</td>
                    <td><input type="text" name="euro" placeholder="Евро 6" required></td>
                </tr>
            </table>
            <input type="password" name="form_pass" placeholder="password" required>
            <button name="add_btn" id="add_button" type="submit" value="_add">Добави</button>

        </form>
    </div>

<?php

require('db_connection.php');

$password = $_POST['form_pass'];

$brand = $_POST['brand'];
$model = $_POST['model'];
$engineModel = $_POST['engineModel'];
$horsePower = $_POST['horsePower'];
$kwPower = $horsePower / 1.34102;
$displacement = $_POST['displacement'];
$carYear = $_POST['carYear'];
$price = $_POST['price'];
$carLength = $_POST['carLength'];
$carHeight = $_POST['carHeight'];
$width = $_POST['width'];
$wheelBase = $_POST['wheelBase'];
$torque = $_POST['torque'];
$gearBox = $_POST['gearBox'];
$shiftsNum = $_POST['shiftsNum'];
$tankVolume = $_POST['tankVolume'];
$consumption = $_POST['consumption'];
$maxSpeed = $_POST['maxSpeed'];
$fuelType = $_POST['fuelType'];
$clearance = $_POST['clearance'];
$bodyType = $_POST['bodyType'];
$carUseType = $_POST['carUseType'];
$emissions = $_POST['emissions'];
$euro = $_POST['euro'];

if ($password == 123)

    $sql =
        'INSERT INTO cars
(
car_brand, car_model ,car_engine_model , car_horsepower , car_power_kw , 
car_engine_displacement , car_year , car_length_mm , car_width_mm , car_wheelbase_mm , 
car_engine_torque , car_gearbox_type , car_gear_shifts , car_tank_volume ,car_consumption_combined , 
car_max_speed , car_fuel_type , car_clearance , car_body_type , car_use_type , 
car_emissions , car_standard_type, car_price, car_height_mm
) 
VALUES
(
:brand , :model , :engineModel , :horsePower , :kwPower , 
:displacement , :carYear , :carLength , :width , :wheelBase, 
:torque , :gearBox , :shiftsNum , :tankVolume , :consumption , 
:maxSpeed , :fuelType , :clearance , :bodyType , :carUseType , 
:emissions , :euro , :price , :carHeight
)';

$query = $pdo->prepare($sql);

$query->execute
(
    [
        'brand' => $brand, 'model' => $model, 'engineModel' => $engineModel, 'horsePower' => $horsePower, 'kwPower' => $kwPower,
        'displacement' => $displacement, 'carYear' => $carYear, 'carLength' => $carLength, 'width' => $width, 'wheelBase' => $wheelBase,
        'torque' => $torque, 'gearBox' => $gearBox, 'shiftsNum' => $shiftsNum, 'tankVolume' => $tankVolume, 'consumption' => $consumption,
        'maxSpeed' => $maxSpeed, 'fuelType' => $fuelType, 'clearance' => $clearance, 'bodyType' => $bodyType, 'carUseType' => $carUseType,
        'emissions' => $emissions, 'euro' => $euro, 'price' => $price, 'carHeight' => $carHeight
    ]
);
?>

<?php

get_footer();