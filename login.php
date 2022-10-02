<?php
include('header.php');
$host = "localhost";
$user = "root";
$password = "";
$db = "login";
$conn = mysqli_connect($host, $user, $password, $db);
mysqli_select_db($conn, $db);
if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "select * from loginform where email='" . $email . "'AND Pass='" . $password . "'limit 1";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 1) {
        echo '<script type ="text/JavaScript">';
        echo 'alert("You have Successfully Logged In")';
        echo '</script>';
    } else {
        echo "You Have Entered Incorrect Password";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Food Delivery</title>
</head>
<link rel="stylesheet" href="style.css">

<body class="img">
    <br>
    <div class="box3">

        <form method="$_POST" action="login.php">
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">
                    <p>We'll never share your email with anyone
                        else.</p>
                </small>
            </div>
            <br>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <br>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <p>New Here?</p>
            <a href="register.php" style="text-decoration:none;color:white;">Register Now</a>
        </form>
    </div>
</body>

</html>
<br>
<?php

include('footer.php');
?>