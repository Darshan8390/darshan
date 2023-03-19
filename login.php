<?php

session_start();

include('database_conn.php');
$msg = false ;
if (isset($_POST['user_name'])) {
    $user_name = $_POST['user_name'];
    $user_password = $_POST['user_password'];

    $query  =  "select * from users where name = '".$user_name."' AND password = '".$user_password."' limit 1";

    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result)==1) {
        header("Location: welcome.php");
    } else {
        $msg = "Inccorect Password";
    }
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
    <title>Music App || Login</title>
</head>

<body>
    <header>
        <div class="left_bx1">
            <div class="content">
                <form action="#" method="post">
                    <h3>Login</h3>
                    <div class="card">
                        <label for="name">Name</label>
                        <input type="text" name="user_name" placeholder="Enter Your Name..." required>
                    </div>
                    <div class="card">
                        <label for="password">Password</label>
                        <input type="password" name="user_password" placeholder="Enter Your Password..." required>
                    </div>
                    <input type="submit" value="Sign Up" class="submit">
                    <div class="check">
                        <input type="checkbox"> <span>Remember Me.</span>
                    </div>
                    <p>Dont't have a account yet? <a href="signup.php">Sign Up</a></p>
                </form>
            </div>
        </div>
        <div class="right_bx1">
            <img src="img/login_png.jpg" alt="">
            <?php
            if ($msg) {
                echo ('<h3>'.$msg.'</h3>');
            }
            ?>
        </div>
    </header>
</body>

</html>