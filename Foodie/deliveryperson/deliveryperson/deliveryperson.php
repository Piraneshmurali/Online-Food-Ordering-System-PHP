<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="deliveryperson.css">
</head>

<body>
    <div class="logout">
        <a href="../../logout.php">Logout</a>
    </div>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Address</th>
                    <th>Phone No</th>
                    <th>Order Status</th>
                    <th>Send</th>
                </tr>
            </thead>
            <tbody>
                <?php
                session_start();
                $con = new mysqli("localhost", "root", "", "food order");

                $get1 = "SELECT * FROM deliveryperson WHERE deliveryname='" . $_SESSION['userid'] . "'";
                $sql1 = $con->query($get1);

                while ($deliver = $sql1->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $deliver['foodId'] . '</td>';
                    echo '<td>' . $deliver['date'] . '</td>';
                    echo '<td>' . $deliver['time'] . '</td>';
                    echo '<td>' . $deliver['address'] . '</td>';
                    echo '<td>' . $deliver['phoneNo'] . '</td>';
                    echo '<td>';
                    echo '<form action="orderstatus.php"  method="post">
                        <select name="order_status">';
                    echo '<option value="">Status</option>';
                    echo '<option value="On The Way">On The Way</option>';
                    echo '<option value="Delivered">Delivered</option>';
                    echo '</select>';
                    echo '</td>';
                    echo '<td>';
                    echo '<button class="status-button"  name="submit" type="submit">Send</button> </form>';
                    echo '</td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
        </form>
    </div>
</body>

</html>