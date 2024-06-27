<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu page</title>
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <section class="menu">
        <div class="nav">
            <div class="logo">
                <h1>Food<b>ie</b></span></h1>
            </div>
            <ul>
                <li><a href="../home.php">Home</a></li>
                <li class="active"><a href="#">Menu</a></li>
                <li><a href="../about us/about us.php">About Us</a></li>
                <li><a href="../gallery/gallery.php">Gallery</a></li>
            </ul>
            <div>
                <a href="../logout.php"><input class="logout" type="submit" value="Log Out" name="logout"></a>
            </div>
        </div>
    </section>
    <hr>
    <div class="container">
        <div class="title">
            <h2>
                Our <span id="menu">Menu</span>
            </h2>
        </div>


        <div class="content">
            <?php

            $con = new mysqli("localhost", "root", "", "food order");
            $insert = "SELECT * FROM menu";
            $save = $con->query($insert);


            while ($details = $save->fetch_array()) {

                echo ' <form action="../sample.php"  method="post" class="box All Featured">
                        
                    <div class="image">
                        <img src="../images/' . $details[1] . '" alt="">
                    </div>
                    <div class="text">
                        <h3>' . $details[0] . '</h3>
                        <hr>
                        <section>Rs.' . $details[2] . '</section>
                        <artical>Category: ' . $details[3] . '</artical><br>
                        <label for="item1-qty">Quantity:</label>
                        <input type="number" id="quantity" min="0" value="0" name="quantity"><br><br>
                        Take Out <input type="radio" name="orderType" value="TakeOut">
                        Delivery <input type="radio" name="orderType" value="Delivery">
                        <input type="hidden" value="' . $details[0] . '" name="product">
                            <div class="button">
                                <a href="" ><button type="submit" name="submit" onclick="showAlert()">Order Now</button></a>
                            </div>     
                        </div>
                        </form>';
            }
            ?>

            <script>
                function showAlert() {
                    alert("Your order is placed");
                }
            </script>
        </div>

    </div>




</body>

</html>