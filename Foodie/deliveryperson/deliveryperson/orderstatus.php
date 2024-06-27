<?php

session_start();
if (isset($_POST['submit'])) {
    $con = new mysqli("localhost", "root", "", "food order");
    $get1 = "SELECT * FROM deliveryperson WHERE deliveryname='" . $_SESSION['userid'] . "'";
    $sql1 = $con->query($get1);
    $deliver = $sql1->fetch_assoc();

    $insert = "INSERT INTO orderstatus(foodid,order_status) values('" . $deliver['foodId'] . "','" . $_POST['order_status'] . "')";
    $con->query($insert);
}
header("location:deliveryperson.php");
?>