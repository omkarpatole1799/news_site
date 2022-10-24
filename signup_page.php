
<?php 

if ($_SERVER["REQUEST_METHOD"]== "POST"){
    include 'dbconnection.php';

    $username = $_POST['username'];
    $password = $_POST['user_pass'];

    $sql = "INSERT INTO `users_login_details` (`username`, `user_pass`) VALUES ('$username', '$password')";
    $result = mysqli_query($conn,$sql);
}

?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign up to 24/7 news!</title>
    <!-- bootstrap css include -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <!-- custom css include -->
    <link rel="stylesheet" href="./css/styles.css">
</head>

<body>

    <?php
    include 'navbar.php';
    ?>

    <div class="container form-container">
        <form  method="post"> 
            <div class="form-group p-3 email-div">  
                <label for="exampleInputEmail1">Username</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="username" aria-describedby="emailHelp" placeholder="Enter email">
            </div>
            <div class="form-group p-3 pass-div">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="user_pass" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary p-3">Sign up</button>
        </form>
    </div>



    <!-- bootstrap js include -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>


    <!-- custom js include -->
    <script src="./js/script.js"></script>

</body>

</html>