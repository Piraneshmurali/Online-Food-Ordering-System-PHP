<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foodie</title>
    <link rel="stylesheet" href="style/style.css">
</head>

<body>
    <section class="menu">
        <div class="nav">
            <div class="logo">
                <h1>Food<b>ie</b></h1>
            </div>
            <ul>
                <?php
                session_start();
                if (!isset($_SESSION['user'])) {

                    echo '<li class="active1"><a href="#">Home</a></li>';
                }
                if (isset($_SESSION['user'])) {
                    echo '<li class="active"><a href="#">Home</a></li>
                                     <li><a href="Menu/index.php">Menu</a></li>
                                     <li><a href="about us/about us.php">About Us</a></li>
                                     <li><a href="gallery/gallery.php">Gallery</a></li>';
                }
                ?>
            </ul>
            <div>

                <?php
                if (!isset($_SESSION['user'])) {
                    echo '<a href="deliveryperson/deliveryperson/front1.php"><input class="signin1" type="submit" value="Staff" name="Staff"></a>';
                    echo '<a href="login sign/login.php"><input class="signin" type="submit" value="Sign in" name="signin"></a>';
                }
                if (isset($_SESSION['user'])) {
                    echo '<a href="logout.php"><input class="logout" type="submit" value="Log Out" name="logout"></a>';
                }
                ?>
            </div>
        </div>
    </section>
    <hr>
    <section class="grid">
        <div class="content">
            <div class="content-left">
                <div class="info">
                    <?php
                    if (isset($_SESSION['user'])) {
                        $con = new mysqli("localhost", "root", "", "food order");
                        $get = "select * from userdata where email='" . $_SESSION['user'] . "'";
                        $save = $con->query($get);
                        $details = $save->fetch_assoc();
                        echo "<h3>Hi  <span id='intro' >" . $details['firstname'] . " </span> &#128525; ,</h3><br>";
                    }
                    ?>
                    <h2>Taste That Best, Its On Time</h2><br>
                    <p>Hey, Want a delicious meal,<br>
                        But no time we will deliver it hot and yummy.</p>
                </div>

                <?php
                if (!isset($_SESSION['user'])) {
                    echo '<a href="login sign/login.php"><button>Explore Foods</button></a>';
                }
                if (isset($_SESSION['user'])) {
                    echo '<a href="Menu/index.php"><button>Explore Foods</button></a>';
                }
                ?>
            </div>
            <div class="content-right">
                <img src="images/food.jpg" alt="">
            </div>
        </div>
    </section>
    <hr id="line">
    <section class="category">
        <div class="list-items">
            <h3>Popular Foods</h3>
            <div class="card-list">
                <div class="card">
                    <img src="images/burger.jpg" alt="">
                    <div class="food-title">
                        <h1>Burger</h1>
                    </div>
                    <div class="desc-food">
                        <p>A huge single or triple burger with all the fixings, cheese, lettuce, tomato, onions and special sauce or mayonnaise
                            burgers that are hand crafted with 100% Angus beef.
                        </p>
                    </div>
                    <div class="price">
                        <span>Rs.1500</span>

                    </div>
                </div>
                <div class="card">
                    <img src="images/pizza.jpg" alt="">
                    <div class="food-title">
                        <h1>Pizza</h1>
                    </div>
                    <div class="desc-food">
                        <p>Tomato base,Onions,Cheese,Garlic bread dough topped with some combination of olive oil,
                            oregano, tomato, olives, mozzarella or other cheese</p>
                    </div>
                    <div class="price">
                        <span>Rs.1700</span>

                    </div>
                </div>
                <div class="card">
                    <img src="images/salad.jpg" alt="">
                    <div class="food-title">
                        <h1>Salad</h1>
                    </div>
                    <div class="desc-food">
                        <p>Make our healthy chicken and hummus salad bowl for a delicious budget lunch option. Condiments and salad dressings,
                            which exist in a variety of flavors</p>
                    </div>
                    <div class="price">
                        <span>Rs.1300</span>

                    </div>
                </div>
                <div class="card">
                    <img src="images/fried-rice.jpg" alt="">
                    <div class="food-title">
                        <h1>Fried Rice</h1>
                    </div>
                    <div class="desc-food">
                        <p>Fried rice is the ultimate family-friendly dish that yields maximum flavor without fuss.
                            Loaded with tender sauteed veggies and delicious bits of scrambled egg</p>
                    </div>
                    <div class="price">
                        <span>Rs.1500</span>

                    </div>
                </div>
                <div class="card">
                    <img src="images/Chicken-Lollipop.jpg" alt="">
                    <div class="food-title">
                        <h1>Chicken Lolipop</h1>
                    </div>
                    <div class="desc-food">
                        <p>Chicken lollipop is essentially a frenched chicken winglet,
                            wherein the meat is cut loose from the bone end and pushed down creating a lollipop appearance</p>
                    </div>
                    <div class="price">
                        <span>Rs.1600</span>

                    </div>
                </div>
                <div class="card">
                    <img src="images/biriyani.jpg" alt="">
                    <div class="food-title">
                        <h1>Briyani</h1>
                    </div>
                    <div class="desc-food">
                        <p>Long-grained rice (like basmati) flavored with fragrant spices such as saffron and layered with lamb, chicken, fish, or vegetables and a thick gravy.</p>
                    </div>
                    <div class="price">
                        <span>Rs.1800</span>

                    </div>
                </div>
                <div class="card">
                    <img src="images/chicken65.jpg" alt="">
                    <div class="food-title">
                        <h1>Fried Chicken</h1>
                    </div>
                    <div class="desc-food">
                        <p>A dish consisting of chicken pieces that have been coated with seasoned flour or batter and
                            pan-fried, deep fried, pressure fried, or air fried The breading</p>
                    </div>
                    <div class="price">
                        <span>Rs.1500</span>

                    </div>
                </div>
                <div class="card">
                    <img src="images/icecream.jpg" alt="">
                    <div class="food-title">
                        <h1>Ice-Cream</h1>
                    </div>
                    <div class="desc-food">
                        <p>milk or cream and flavoured with a sweetener, either sugar or an alternative, and a spice,
                            such as cocoa or vanilla, or with fruit such as strawberries or peaches.</p>
                    </div>
                    <div class="price">
                        <span>Rs.500</span>

                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>