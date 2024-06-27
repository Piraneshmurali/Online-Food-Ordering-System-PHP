<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "food order");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Add Menu
if (isset($_POST['addMenu'])) {
    $menuName = $_POST['menuName'];
    $menuDescription = $_POST['menuDescription'];
    $menuImage = $_FILES['menuImage']['name'];
    $menuImageTemp = $_FILES['menuImage']['tmp_name'];
    $menuPrice = $_POST['menuPrice'];
    $menuId = $_POST['menuid'];
    // Prepare and execute SQL query to insert menu details
    $sql = "INSERT INTO menu ( menuid,name, description, image, price) VALUES ('$menuId','$menuName', '$menuDescription', '$menuImage', '$menuPrice')";

    if ($conn->query($sql) === TRUE) {
        // Move the uploaded image to a desired location
        $uploadPath = "../images/" . $menuImage;
        move_uploaded_file($menuImageTemp, $uploadPath);

        echo "Menu added successfully";
    } else {
        echo "Error adding menu: " . $conn->error;
    }
}

// Remove Menu
if (isset($_POST['removeMenu'])) {
    $menuId = $_POST['menuid'];

    // Prepare and execute SQL query to remove menu
    $sql = "DELETE FROM menu WHERE menuid = '$menuId'";

    if ($conn->query($sql) === TRUE) {
        echo "Menu removed successfully";
    } else {
        echo "Error removing menu: " . $conn->error;
    }
}

// Update Menu
if (isset($_POST['updateMenu'])) {
    $menuId = $_POST['menuid'];
    $menuName = $_POST['menuName'];
    $menuDescription = $_POST['menuDescription'];
    $menuPrice = $_POST['menuPrice'];

    // Prepare and execute SQL query to update menu details
    $sql = "UPDATE menu SET name = '$menuName', description = '$menuDescription', price = '$menuPrice' WHERE menuid = '$menuId'";

    if ($conn->query($sql) === TRUE) {
        echo "Menu updated successfully";
    } else {
        echo "Error updating menu: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Page</title>
    <link rel="stylesheet" href="admin2.css">
</head>

<body>
    <div class="sidebar">
        <div class="sidebar-brand">
            <h2>Foodie</h2>
        </div>
        <div class="sidebar-menu">
            <ul>
                <li><a href="dashboard.php"><span>Admin Dashboard</span></a></li>
                <li><a href="#" class="active"><span>Menus</span></a></li>
                <li><a href="order.php"><span>Orders</span></a></li>
            </ul>
        </div>
    </div>

    <main>
        <div class="form-container">
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="menuid">Menu ID:</label>
                    <input type="text" id="menuid" name="menuid" required>
                </div>
                <div class="form-group">
                    <label for="menuName">Menu Name:</label>
                    <input type="text" id="menuName" name="menuName" required>
                </div>
                <div class="form-group">
                    <label for="menuDescription">Menu Description:</label>
                    <textarea id="menuDescription" name="menuDescription" required></textarea>
                </div>
                <div class="form-group">
                    <label for="menuImage">Menu Image:</label>
                    <input type="file" id="menuImage" name="menuImage" required>
                </div>
                <div class="form-group">
                    <label for="menuPrice">Menu Price:</label>
                    <input type="number" id="menuPrice" name="menuPrice" required>
                </div>
                <button type="submit" name="addMenu">Add</button>
            </form>
        </div>

        <div class="menu-list">
            <h2>Menu List</h2>
            <?php
            // Retrieve menus from the database
            $conn1 = new mysqli("localhost", "root", "", "food order");
            $sql = "SELECT * FROM menu";
            $result = $conn1->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {

                    $menuId = $row['menuid'];
                    $menuName = $row['name'];
                    $menuDescription = $row['description'];
                    $menuPrice = $row['price'];
                    $menuImage = $row['image'];
                    echo "<div class='menu-item'>";
                    echo "<p><img src='../images/" . $menuImage . "' width='150px' height='125px'></p>";
                    echo "<h3>$menuName</h3>";
                    echo "<p>$menuDescription</p>";
                    echo "<p>Price: $menuPrice</p>";
                    echo "<form method='post' action='" . $_SERVER['PHP_SELF'] . "' enctype='multipart/form-data'>";
                    echo "<input type='hidden' name='menuid' value='$menuId'> ";
                    echo "Menu Name: <input type='text' name='menuName' value='$menuName'> ";
                    echo "Description: <textarea id='menuDescription' name='menuDescription' value='$menuDescription'></textarea> ";
                    echo "Image: <input type='file' name='menuImage' value='$menuImage'> ";
                    echo "Price: <input type='number' name='menuPrice' value='$menuPrice'> ";
                    echo "<button type='submit' name='removeMenu'>Remove</button>";
                    echo "<button type='submit' name='updateMenu'>Update</button>";
                    echo "</form>";
                    echo "</div>";
                }
            } else {
                echo "No menus found";
            }
            $conn1->close();
            ?>
        </div>
    </main>
</body>

</html>