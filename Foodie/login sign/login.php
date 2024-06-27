<?php
session_start();
if (isset($_SESSION['user'])) {
    header("Location:../home.php");
}
if (isset($_POST['login'])) {
    $con = new mysqli("localhost", "root", "", "food order");
    $get = "select * from admin where name ='" . $_POST['email'] . "'";
    $sql = $con->query($get);

    $save = $sql->fetch_assoc();
    if ($save['password'] == $_POST['userpass']) {
        if ($_POST['userpass'] == "12345" && $_POST['email'] == "foodie@gmail.com") {
            $_SESSION['user'] = $save['email'];
            header("location:../Admin/dashboard.php");
        } else {
            header("location:login.php");
        }
    }
    $con->close();
    $id = $_POST['email'];
    $psw = $_POST['userpass'];
    $con = new mysqli("localhost", "root", "", "food order");
    $sel = "select * from userdata where email='" . $id . "'";
    $result = $con->query($sel);
    if ($result->num_rows == 0) {
        echo "<script> alert('This Email Is Does Not Exist'); </script> ";
    } else {
        $x = $result->fetch_assoc();
        if ($psw == $x['password']) {
            session_start();
            $_SESSION['user'] = $id;
            header("Location:../home.php");
        } else {
            echo "<script> alert('Password wrong!!'); </script>";
        }
    }
}

if (isset($_POST['Address'])) {
    $con = new mysqli("localhost", "root", "", "food order");
    $Email = "select email from userdata where email ='" . $_POST['Email'] . "'";
    $sql = $con->query($Email);
    if ($sql->num_rows > 0) {
        echo "<script> alert('This Email Already Registerd'); </script> ";
    } else {
        $inputDetails = "insert into userdata(firstname,lastname,email,phoneno,userName,password,address) values('" . $_POST['FirstName'] . "','" . $_POST['LastName'] . "','" . $_POST['Email'] . "','" . $_POST['PhoneNo'] . "','" . $_POST['UserName'] . "','" . $_POST['Password'] . "','" . $_POST['Address'] . "')";
        $con->query($inputDetails);
        echo "<script> alert('Your Account Is Sucessfully Created Login To Continue!'); </script> ";
    }
}

?>
<html>

<head>
    <title> Login And Sign up</title>
    <link rel="stylesheet" href="login.css">
</head>

<body>
    <div class="aaaa">
        <div class="form-box">
            <div class="button-box">
                <div id="button"></div>
                <button type="button" class="LSbutten" onclick="login()" name="login">Log In</button>
                <button type="button" class="LSbutten" onclick="signup()" name="signup">Sign Up</button>

            </div>
            <form id="login" class="input-group1" method="post" action="<?php echo $_SERVER["PHP_SELF"] ?>">
                <input type="email" class="input-field" placeholder="User Name" required name="email">
                <input type="password" class="input-field" placeholder="Password" required name="userpass">
                <button type="submit" class="submit" name="login">Log in</button>
            </form>
            <form id="signup" class="input-group" method="post">
                <input type="text" class="input-field" placeholder="User Name" name="UserName" required>
                <input type="email" class="input-field" placeholder="Email" name="Email" required>
                <input type="text" class="input-field" placeholder="First Name" name="FirstName" required>
                <input type="text" class="input-field" placeholder="Last Name" name="LastName" required>
                <input type="text" class="input-field" placeholder="Address" name="Address" required>
                <input type="password" class="input-field" placeholder="Password" name="Password" required>
                <input type="text" class="input-field" placeholder="Phone No" name="PhoneNo" required>
                <button type="submit" class="submit">Sign Up</button>
            </form>
        </div>
    </div>
    <script>
        var x = document.getElementById("login");
        var y = document.getElementById("signup");
        var z = document.getElementById("button");

        function signup() {
            x.style.left = "-400px";
            y.style.left = "50px";
            z.style.left = "110px";
        }

        function login() {
            x.style.left = "50px";
            y.style.left = "450px";
            z.style.left = "0";
        }
    </script>

</body>

</html>