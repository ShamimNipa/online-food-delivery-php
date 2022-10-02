<?php
include('header.php');
$host = "localhost";
$user = "root";
$password = "";
$db = "register";
$conn = mysqli_connect($host, $user, $password, $db);
if (!$conn) {
    echo '<script type ="text/JavaScript">';
    echo 'alert("Please Check Your Database Connection")';
    echo '</script>';
}
if (isset($_POST['btn-save'])) {
    $UserName = mysqli_real_escape_string($conn, $_POST['UserName']);
    $Email = mysqli_real_escape_string($conn, $_POST['Email']);
    $Password = mysqli_real_escape_string($conn, $_POST['Password']);
    $CPassword = mysqli_real_escape_string($conn, $_POST['Cpass']);

    if (empty($UserName) || empty($Email) || empty($Password) || empty($CPassword)) {
        echo '<script type ="text/JavaScript">';
        echo 'alert("Please Fill in the Blanks")';
        echo '</script>';
    }


    if ($Password != $CPassword) {
        echo '<script type ="text/JavaScript">';
        echo 'alert("Password Not Matched")';
        echo '</script>';
    } else {
        $Pass = md5($Password);
        $sql = "insert into users(UName,Email,Password) values('$UserName','$Email','$Password')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo '<script type ="text/JavaScript">';
            echo 'alert("Your Record Has Been Saved in The Database")';
            echo '</script>';
        } else {
            echo '<script type ="text/JavaScript">';
            echo 'alert("Please Check Your Query")';
            echo '</script>';
        }
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


    <div class="box3">
        <form action="register.php" method="post">
            <input type="text" placeholder="User Name" class="txt" name="UserName"><br><br>
            <input type="email" placeholder="Email" class="txt" name="Email"><br><br>
            <input type="password" placeholder="Password" class="txt" name="Password"><br><br>
            <input type="password" placeholder="Confirm Password" class="txt" name="Cpass"><br><br>
            <input type="submit" value="Create a Account" class="btn" name="btn-save"><br><br>
            <a href="login.php" style="color:white ;text-decoration:none;">Already Have an Account?Login</a>
        </form>

    </div>


</body>

</html>
<br><br>
<?php

include('footer.php');