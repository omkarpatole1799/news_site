<?php 
session_start();

include_once 'dbconnection.php';

if ($_SERVER["REQUEST_METHOD"]== "POST"){
    include 'dbconnection.php';

    $username = $_POST['username'];
    $password = $_POST['user_pass'];

    $sql = "SELECT * FROM users_login_details WHERE username= '$username' AND user_pass = '$password'";
    // echo $sql . "<br>";
    $result = mysqli_query($conn,$sql);
    $count = mysqli_num_rows($result);

    if($count == 1){
        $row = mysqli_fetch_assoc($result);
        
        $_SESSION["loggedin_id"] = $row["id"];
        $_SESSION["username"] = $row["username"];

        header("Location: user_news_page.php");
    }
    else {
        echo '<div class="alert alert-danger" role="alert">
                 Login Error!
              </div>';
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login to 24/7 news!</title>
    <!-- bootstrap css include -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <!-- custom css include -->
    <link rel="stylesheet" href="./css/styles.css">
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand m-3" href="index.php">24/7 News</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Home</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="signup_page.php">Sign up</a>
        </li>
      </ul>
    </div>
  </nav>

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
            <button type="submit" class="btn btn-primary p-3">Login</button>
        </form>
    </div>



    <!-- bootstrap js include -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>


    <!-- custom js include -->
    <script src="./js/script.js"></script>

</body>

</html>