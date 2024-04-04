<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

<center>
        <form action="admin.php" method="$_POST" autocomplete="off">

            <div class="form">

                <input type="text" name="username" class="textfiled" placeholder="Username">
                <input type="password" name="password" class="textfiled" placeholder="Password">

                <div class="forgetpass"><a href="#" class="link" onclick="message()">Forgat Password ?</a></div>

                <input type="submit" name="login" value="Login" class="btn">

                <div class="signup">New Member ? <a href="#" class="link">SignUp Here</a></div>

            </div>

            </div>

        </form>
</center>
</body>
</html>


<?php
include('connect.php');
if(isset($_POST['login'])) {
    $username =$_POST['username'];
    $pwd =$_POST['password'];

    $query = "SELECT * FROM users WHERE email = '$username' && password = '$pwd' ";

    $data = mysqli_query($conn, $query);

    $total = mysqli_num_rows($data);
    echo $total;
}
?>