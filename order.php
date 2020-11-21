<?php
include "config.php";
if (isset($_POST['SUB_ORDER'])) {
    $id = $_GET['O_ID'];
    $fName = htmlspecialchars($_POST['fname']);
    $lName = htmlspecialchars($_POST['lname']);
    $phone = htmlspecialchars($_POST['phone']);
    $city = htmlspecialchars($_POST['city']);
    $address = htmlspecialchars($_POST['address']);

    

    if (empty($fName) or empty($lName) or empty($phone) or empty($city) or empty($address)) {
        return false;
    }else {
        $sql = "INSERT INTO orders (firstname, lastname, phone, city, address, food_id)
        VALUES ('$fName', '$lName', '$phone', '$city', '$address', '$id')";
        $dataOrder = mysqli_query($conn,$sql);
        if ($dataOrder) {
            header('location:index.php');
        }
    }
}