<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
    <link rel="stylesheet" href="gallery.css">
</head>

<body>
    <section class="menu">
        <div class="nav">
            <div class="logo">
                <h1>Food<b>ie</b><span id="logo"><i class="fa-solid fa-utensils"></i></span></h1>
            </div>
            <ul>
                <li><a href="../home.php">Home</a></li>
                <li><a href="../Menu/index.php">Menu</a></li>
                <li><a href="../about us/about us.php">About Us</a></li>
                <li class="active"><a href="#">Gallery</a></li>
            </ul>
            <div>
                <a href="../logout.php"><input class="logout" type="submit" value="Log Out" name="logout"></a>
            </div>
        </div>
    </section>
    <hr>
    <h1 id="gallery">Our <span>Food</span> Gallery</h1>
    <?php
    $con = new mysqli("localhost", "root", "", "food order");
    $insert = "SELECT * FROM menu";
    $save = $con->query($insert);

    echo '<div class="img-gallery">';
    while ($details = $save->fetch_array()) {
        echo '<img src="../images/' . $details[1] . '" onclick="openFullImg(this.src)">';
    }
    echo '</div>';
    ?>
    <div class="full-img" id="fullImgBox">
        <img id="fullImg" src="">
        <span onclick="closeFullImg()">X</span>
    </div>

    <script>
        var fullImgBox = document.getElementById("fullImgBox");
        var fullImg = document.getElementById("fullImg");

        function openFullImg(pic) {
            fullImgBox.style.display = "flex";
            fullImg.src = pic;
            fullImg.style.maxWidth = "800px";
            fullImg.style.maxHeight = "800px";
            fullImg.style.objectFit = "contain";
        }

        fullImgBox.addEventListener("click", function() {
            fullImgBox.style.display = "none";
            fullImg.style.maxWidth = "";
            fullImg.style.maxHeight = "";
        });
    </script>
</body>

</html>