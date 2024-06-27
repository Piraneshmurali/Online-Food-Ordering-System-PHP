<?php

session_start();
if (isset($_POST['submit'])) {
    $date1 = date('Y/m/d - l - h: i a');
    $t = date("h:i:sa");
    $con = new mysqli("localhost", "root", "", "food order");
    $get1 = "SELECT * FROM orderlist WHERE orderid = '" . $_POST['id'] . "'";
    $save1 = $con->query($get1);
    $details1 = $save1->fetch_array();

    $insert = "INSERT INTO deliveryperson(date,address,phoneNo,time,name,deliveryname,foodId) values('" . $date1 . "','" . $details1[4] . "','" . $details1[5] . "','" . $t . "','" . $details1[8] . "','" . $_POST['delivery_person_id'] . "','" . $_POST['id'] . "')";
    $con->query($insert);
}
header("location:Admin/order.php");
?>
