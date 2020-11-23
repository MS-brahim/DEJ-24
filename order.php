<?php
include "config.php";
if (isset($_POST['SUB_ORDER'])) {
    $id = $_GET['O_ID'];
    $fName = htmlspecialchars($_POST['fname']);
    $lName = htmlspecialchars($_POST['lname']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $city = htmlspecialchars($_POST['city']);
    $address = htmlspecialchars($_POST['address']);

    // $msg = "/n"."Name : "." ".$fName. "/n" ." Email : " ." ".$email. "/n"." City : " ." ".$city. "/n"." Address : " ." ".$address;

    if (empty($fName) or empty($lName) or empty($email) or empty($phone) or empty($city) or empty($address)) {
        header('location: index.php');
        return false;
    }else {
        $sql = "INSERT INTO orders (firstname, lastname, email, phone, city, address, food_id)
        VALUES ('$fName', '$lName', '$email', '$phone', '$city', '$address', '$id')";
        $dataOrder = mysqli_query($conn,$sql);
        if ($dataOrder) {
            header('location: index.php');
            // mail("b.mouissi94@gmail.com","Subject","Email message","From: brahim7khalil@gmail.com");
        }
    }
}