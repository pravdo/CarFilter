<?php
require('db_connection.php');
if (isset($_POST['update_btn']))

    $password = $_POST['form_pass'];
$id = $_POST['id'];
$model = $_POST['model'];
$brand = $_POST['brand'];
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

if ($password == 123) {
    $sql =
        'UPDATE cars SET 
car_model = :model, 
car_brand = :brand, 
car_engine_model = :engineModel, 
car_horsepower = :horsePower, 
car_power_kw = :kwPower, 
car_engine_displacement = :displacement, 
car_year = :carYear, 
car_length_mm = :carLength, 
car_width_mm = :width, 
car_wheelbase_mm = :wheelBase, 
car_engine_torque = :torque, 
car_gearbox_type = :gearBox, 
car_gear_shifts = :shiftsNum, 
car_tank_volume = :tankVolume,
car_consumption_combined = :consumption, 
car_max_speed = :maxSpeed, 
car_fuel_type = :fuelType, 
car_clearance = :clearance, 
car_body_type = :bodyType, 
car_use_type = :carUseType, 
car_emissions = :emissions, 
car_standard_type = :euro, 
car_price = :price, 
car_height_mm = :carHeight 
WHERE car_id = :id
';
    $query = $pdo->prepare($sql);
    $query->bindValue(":model", $model, PDO::PARAM_STR);
    $query->bindValue(":id", $id, PDO::PARAM_INT);
    $query->bindValue(":brand", $brand, PDO::PARAM_STR);
    $query->bindValue(":engineModel", $engineModel, PDO::PARAM_STR);
    $query->bindValue(":horsePower", $horsePower, PDO::PARAM_INT);
    $query->bindValue(":kwPower", $kwPower, PDO::PARAM_INT);
    $query->bindValue(":displacement", $displacement, PDO::PARAM_INT);
    $query->bindValue(":carYear", $carYear, PDO::PARAM_INT);
    $query->bindValue(":price", $price, PDO::PARAM_INT);
    $query->bindValue(":carLength", $carLength, PDO::PARAM_INT);
    $query->bindValue(":carHeight", $carHeight, PDO::PARAM_INT);
    $query->bindValue(":width", $width, PDO::PARAM_INT);
    $query->bindValue(":wheelBase", $wheelBase, PDO::PARAM_INT);
    $query->bindValue(":torque", $torque, PDO::PARAM_INT);
    $query->bindValue(":gearBox", $gearBox, PDO::PARAM_STR);
    $query->bindValue(":shiftsNum", $shiftsNum, PDO::PARAM_INT);
    $query->bindValue(":tankVolume", $tankVolume, PDO::PARAM_INT);
    $query->bindValue(":consumption", $consumption, PDO::PARAM_INT);
    $query->bindValue(":maxSpeed", $maxSpeed, PDO::PARAM_INT);
    $query->bindValue(":fuelType", $fuelType, PDO::PARAM_STR);
    $query->bindValue(":clearance", $clearance, PDO::PARAM_INT);
    $query->bindValue(":bodyType", $bodyType, PDO::PARAM_STR);
    $query->bindValue(":carUseType", $carUseType, PDO::PARAM_STR);
    $query->bindValue(":emissions", $emissions, PDO::PARAM_INT);
    $query->bindValue(":euro", $euro, PDO::PARAM_STR);
    $query->execute();
    header("location:https://www.carfilter.rivkomers.com/%d0%b2%d1%81%d0%b8%d1%87%d0%ba%d0%b8-%d0%ba%d0%be%d0%bb%d0%b8/");
} else {
    echo '<script>
alert("Не си познал :)");
</script>';
    exit;
}
