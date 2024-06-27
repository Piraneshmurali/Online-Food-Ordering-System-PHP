<?php
session_start();

if (isset($_POST['sub'])) {
    $id = $_POST['userid'];
    $psw = $_POST['pass'];
    $con = new mysqli("localhost", "root", "", "food order");
    $sel = "SELECT * FROM delivery WHERE username = '" . $id . "'";
    $result = $con->query($sel);
    if ($result->num_rows == 0) {
        echo "<script> alert('User Name Does Not Exist'); </script>";
    } else {
        $x = $result->fetch_assoc();
        if ($psw == $x['userpass']) {
            $_SESSION['userid'] = $id;
            header("Location: deliveryperson.php");
        } else {
            echo "<script> alert('Password is wrong'); </script>";
        }
    }
}
?>


<html>

<head>
    <link rel="stylesheet" href="deli.css">
</head>

<body>
    <section class="container">
        <h3>login</h3>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <h2>User Name:</h2><br>
            <input type="text" name="userid" placeholder="Enter Your id" class="box" required><br>
            <h2>Password:</h2><br>
            <input type="password" name="pass" placeholder="Enter Your Password" class="box" required><br>

            <center><input type="submit" name="sub" value="Login" class="btn"></center>

        </form>
    </section>
</body>

</html>