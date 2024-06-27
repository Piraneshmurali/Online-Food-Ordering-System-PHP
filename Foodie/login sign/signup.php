<?php
if (isset($_POST['emailId'])) {
    $con = new mysqli("localhost", "root", "", "food order");
    $insert = "insert into userData(userName,email,password) values('" . $_POST['userId'] . "','" . $_POST['emailID'] . "','" . $_POST['password'] . "')";

    $get = "select * from userData";
    $save = $con->query($get);

    while ($details = $save->fetch_assoc()) {
        if ($details["email"] == $_POST['emailID']) {
            echo '<script>alert("Email Already exist !!!")</script>';
            return;
        }
    }
    $con->query($insert);
    $con->close();
}
?>


<html>

<head>
    <title> Sign up</title>
    <link rel="stylesheet" href="signup.css">
</head>

<body>
    <div class="aaaa">
        <div class="form-box">

            <p>Sign up</p>


            <form id="signup" class="input-group" method="post" action="<?php echo $_SERVER["PHP_SELF"] ?>">
                <input type="text" class="input-field" placeholder="User Id" required name="userId">
                <input type="email" class="input-field" placeholder="Email Id" required name="emailID">
                <input type="password" class="input-field" placeholder="Enter Password" required name="password">
                <input type="checkbox" class="check-box"><span>I agree to the terms & conditions</span>
                <button type="submit" class="submit">Sign Up</button>
            </form>
        </div>
    </div>


</body>

</html>