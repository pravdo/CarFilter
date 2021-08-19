<?php
require('db_connection.php');
$id = $_GET['id'];
$sql = 'SELECT * FROM cars WHERE car_id = ? ';
$query = $pdo->prepare($sql);
$query->execute([$id]);
while ($row = $query->fetch(PDO::FETCH_OBJ)) {
    echo '
<style>
.update_form{
border:2px solid black;
justify-content: center;
align-items: center;
display: flex;
width:100%;

}
form{
border:2px solid black;
margin:15px;
padding:15px;
font-weight: bolder;
}
td{
font-weight: bolder;
}
</style>
    <div class="update_form">
        <form action="log_update.php" method="post">
            <table>
                <tr>
                    <td>
                        Марка кола:
                    </td>
                    <td>
                        <input type="text" name="brand" value="' . $row->car_brand . '" required></td>
                        <input style="display: none" name="id" value="' . $row->car_id . '">
                </tr>
                </td>
                </tr>
                <tr>
                    <td>Модел:</td>
                    <td><input type="text" name="model" value="' . $row->car_model . '" required></td>
                </tr>
                <tr>
                    <td>Модел на двигател:</td>
                    <td><input type="text" name="engineModel" value="' . $row->car_engine_model . '" required></td>
                </tr>
                <tr>
                    <td>Конски сили:</td>
                    <td><input type="number" id="horsePower" name="horsePower" value="' . $row->car_horsepower . '" required></td>

                </tr>
                <tr>
                    <td><input type="hidden" id="kwPower" name="kwPower" value="' . $row->car_power_kw . '"></td>
                </tr>
                <tr>
                    <td>Работен обем на двигател:</td>
                    <td><input type="number" id="displacement" name="displacement" value="' . $row->car_engine_displacement . '" placeholder="cm³" required></td>
                </tr>
                <tr>
                    <td>Година на производство:</td>
                    <td><input type="text" id="year" name="carYear" min="1990" max="2021" value="' . $row->car_year . '" required></td>
                </tr>
                <tr>
                    <td>Цена:</td>
                    <td><input type="number" id="price" name="price" value="' . $row->car_price . '" required></td>
                </tr>
                <tr>
                    <td>Дължина:</td>
                    <td><input type="text" id="length" name="carLength" value="' . $row->car_length_mm . '" required></td>
                </tr>
                <tr>
                    <td>Височина:</td>
                    <td><input type="text" id="height" name="carHeight" value="' . $row->car_height_mm . '" required></td>
                </tr>
                <tr>
                    <td>Ширина:</td>
                    <td><input type="text" id="width" name="width" value="' . $row->car_width_mm . '" required></td>
                </tr>
                <tr>
                    <td>Околосие:</td>
                    <td><input type="text" id="wheelBase" name="wheelBase" value="' . $row->car_wheelbase_mm . '" placeholder="mm" required></td>
                </tr>
                <tr>
                    <td>Въртящ момент:</td>
                    <td><input type="text" id="torque" name="torque" value="' . $row->car_engine_torque . '" placeholder="Nm" required></td>
                </tr>
                <tr>
                    <td>
                        <label for="gearBox">Тип скоростна кутия:</label></td>
                    <td><select id="gearBox" name="gearBox"  required>
                            <option value="' . $row->car_gearbox_type . '">' . $row->car_gearbox_type . '</option>
                            <option value="Автоматична">Автоматична</option>
                            <option value="Полуавтоматична">Полуавтоматична</option>
                            <option value="Ръчна">Ръчна</option>
                        </select></td>
                </tr>

                <tr>
                    <td>Брой предавки:</td>
                    <td><input type="number" id="shiftsNum" name="shiftsNum" value="' . $row->car_gear_shifts . '" required></td>
                </tr>
                <tr>
                    <td>Обем на резервоара:</td>
                    <td><input type="number" id="tankVolume" name="tankVolume" value="' . $row->car_tank_volume . '" placeholder="л." required></td>
                </tr>
                <tr>
                    <td>Разход на гориво:</td>
                    <td><input type="number" id="consumption" name="consumption" value="' . $row->car_consumption_combined . '" placeholder="л/км" required></td>
                </tr>
                <tr>
                    <td>Максимална скорост:</td>
                    <td><input type="number" id="maxSpeed" name="maxSpeed" value="' . $row->car_max_speed . '" required></td>
                </tr>
                <tr>
                    <td><label for="fuelType">Тип гориво:</label></td>
                    <td><select id="fuelType" name="fuelType" required>
                     <option value="' . $row->car_fuel_type . '">' . $row->car_fuel_type . '</option>
                            <option value="Бензин">Бензин</option>
                            <option value="Дизел">Дизел(нафта)</option>
                        </select></td>
                </tr>
                <tr>
                    <td>Пътен просвет:</td>
                    <td><input type="text" id="clearance" name="clearance" value="' . $row->car_clearance . '" required></td>
                </tr>
                <tr>
                    <td>Тип кола:</td>
                    <td><input type="text" name="bodyType" value="' . $row->car_body_type . '" required></td>
                </tr>
                <tr>
                    <td>Категория:</td>
                    <td><input type="text" name="carUseType" value="' . $row->car_use_type . '" required></td>
                </tr>
                <tr>
                    <td>Емисии:</td>
                    <td><input type="text" name="emissions" value="' . $row->car_emissions . '" placeholder="г/км" required></td>
                </tr>
                <tr>
                    <td>Екологичност:</td>
                    <td><input type="text" name="euro" value="' . $row->car_standard_type . '" placeholder="Евро 6" required></td>
                </tr>
            </table>
            <input type="password" name="form_pass" placeholder="password" required>
            <button name="update_btn" id="updt" type="submit" value="_update">Обнови</button>
            <div class = "href_link">
                                <a href="http://www.carfilter.rivkomers.com/%d0%b2%d1%81%d0%b8%d1%87%d0%ba%d0%b8-%d0%ba%d0%be%d0%bb%d0%b8/" id ="myHref">Назад</a>
</div>
        </form>
    </div>';
}