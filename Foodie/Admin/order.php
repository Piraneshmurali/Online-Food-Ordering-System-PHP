<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="order.css">
</head>

<body>
    <div class="sidebar">
        <div class="sidebar-brand">
            <h2>Foodie</h2>
        </div>

        <div class="sidebar-menu">
            <ul>
                <li><a href="dashboard.php"><span>Admin Dashboard</span></a></li>
                <li><a href="menu.php"><span>Menus</span></a></li>
                <li><a href="#" class="active"><span>Orders</span></a></li>
            </ul>
        </div>
    </div>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Customer Name</th>
                    <th>Type</th>
                    <th>Delivery Person</th>
                    <th>Assign</th>
                    <th>Order Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $con = new mysqli("localhost", "root", "", "food order");

                $get1 = "SELECT * FROM orderlist";
                $sql1 = $con->query($get1);

                $get = "SELECT username FROM delivery";
                $sql = $con->query($get);

                $deliveryPersons = [];
                while ($deliveryPerson = $sql->fetch_assoc()) {
                    $deliveryPersons[] = $deliveryPerson;
                }

                while ($order = $sql1->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $order['orderid'] . '</td>';
                    echo '<td>' . $order['product'] . '</td>';
                    echo '<td>' . $order['quantity'] . '</td>';
                    echo '<td>' . $order['name'] . '</td>';
                    echo '<td>' . $order['ordertype'] . '</td>';
                    echo '<td>';
                    echo '<form action="../assignOrder.php"  method="post">
                        <input type="hidden" name="id" value="' . $order['orderid'] . '">
                        <select name="delivery_person_id">';
                    echo '
                         <option value="">Select Delivery Person</option>';
                    foreach ($deliveryPersons as $deliveryPerson) {
                        echo '<option value="' . $deliveryPerson['username'] . '" name="deliveryPerson">' . $deliveryPerson['username'] . '</option>';
                    }
                    echo '</select>';
                    echo '</td>';
                    echo '<td>';
                    echo '<button class="assign-button"  name="submit" type="submit">Assign</button> </form>';
                    echo '</td>';

                    $get2 = "SELECT * FROM orderstatus";
                    $sql2 = $con->query($get2);
                    $save = $sql2->fetch_assoc();
                    if (isset(($save['foodid']))) {
                        if ($order['orderid'] == $save['foodid']) {
                            echo '<td>' . $save['order_status'] . '</td>';
                        }
                    }
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>