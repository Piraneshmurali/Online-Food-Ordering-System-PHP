<?php

    session_start();
    if(isset($_POST['submit']))
    {
        $date1 = date('Y/m/d - l - h: i a');
        $t=date("h:i:sa");
        $con = new mysqli("localhost","root","","food order");
        $get1 = "SELECT * FROM userdata WHERE email = '".$_SESSION['user']."'";
        $save1=$con->query($get1);
        $details1=$save1->fetch_array();
        
        $insert = "INSERT INTO orderlist(product,quantity,date,email,address,phoneNo,time,name,ordertype) values('".$_POST['product']."','".$_POST['quantity']."','".$date1."','".$details1[1]."','".$details1[5]."','".$details1[6]."','".$t."','".$details1[0]."','".$_POST['orderType']."')";
        $con->query($insert);
    }
    header("location:Menu/index.php");
?>