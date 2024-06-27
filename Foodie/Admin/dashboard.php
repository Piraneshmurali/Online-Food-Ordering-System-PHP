<?php
$con = new mysqli("localhost", "root", "", "food order");

// Get the counts from the database
$menuCountQuery = "SELECT COUNT(*) AS menuCount FROM menu";
$menuCountResult = $con->query($menuCountQuery);
$menuCount = $menuCountResult->fetch_assoc()['menuCount'];

$deliveryPersonCountQuery = "SELECT COUNT(*) AS deliveryPersonCount FROM delivery";
$deliveryPersonCountResult = $con->query($deliveryPersonCountQuery);
$deliveryPersonCount = $deliveryPersonCountResult->fetch_assoc()['deliveryPersonCount'];

$orderCountQuery = "SELECT COUNT(*) AS orderCount FROM orderlist";
$orderCountResult = $con->query($orderCountQuery);
$orderCount = $orderCountResult->fetch_assoc()['orderCount'];

$customerCountQuery = "SELECT COUNT(*) AS customerCount FROM userdata";
$customerCountResult = $con->query($customerCountQuery);
$customerCount = $customerCountResult->fetch_assoc()['customerCount'];

$con->close();
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="dashboard.css">
</head>

<body>
    <div class="sidebar">
        <div class="sidebar-brand">
            <h2>Foodie</h2>
        </div>

        <div class="sidebar-menu">
            <ul>
                <li><a href="#" class="active"><span>Admin Dashboard</span></a></li>
                <li><a href="menu.php"><span>Menus</span></a></li>
                <li><a href="order.php"><span>Orders</span></a></li>
            </ul>
        </div>
    </div>



    <div class="content">
        <div class="cards">
            <div class="card-single">
                <div>
                    <h2><?php echo $orderCount; ?></h2>
                    <small>Orders</small>
                </div>
            </div>

            <div class="card-single">
                <div>
                    <h2><?php echo $menuCount; ?></h2>
                    <small>Menus</small>
                </div>
            </div>

            <div class="card-single">
                <div>
                    <h2><?php echo $customerCount; ?></h2>
                    <small>Customers</small>
                </div>
            </div>

            <div class="card-single">
                <div>
                    <h2><?php echo $deliveryPersonCount; ?></h2>
                    <small>Delivery Persons</small>
                </div>
            </div>
        </div>
    </div>
    <a href="../logout.php"><input class="logout" type="submit" value="Log Out" name="logout"></a>
</body>

</html>