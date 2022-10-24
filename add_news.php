<?php
session_start();

    include_once 'dbconnection.php';

    $userprofile = $_SESSION["loggedin_id"];

    if($userprofile == true){

    }
    else {
        header("Location: login.php");
    }

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add to 24/7 news!</title>
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
          <a class="nav-link" href="user_news_page.php">Profile</a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link" href="signup_page.php">Sign up</a>
        </li> -->
        <!-- <li class="nav-item">
          <a class="nav-link" href="add_news.php">Add news</a>
        </li> -->
      </ul>
    </div>
  </nav>

    <div class="container form-container">
        <form  method="post" enctype="multipart/form-data">
            <div class="form-group p-3 email-div">
                <label for="exampleInputEmail1">News Heading</label>
                <input type="text" class="form-control" name="heading" placeholder="Heading" required>
            </div>
            <div class="form-group p-3 pass-div">
                <label for="exampleInputPassword1">Description</label>
                <input type="text" class="form-control" name="content" placeholder="content" required>
                <!-- <textarea class="form-control" name="content" rows="3"> </textarea> -->
            </div>
            <div class="form-group p-3 image-div">
                <label for="image_input">Select thumbnail </label>
                <input type="file" name="image">
            </div>
            <input class="btn btn-primary" type="submit" value="submit" name="sub">
            <!-- <button type="submit" class="btn btn-primary p-3">Add!</button> -->
        </form>
    </div>

    <?php

if (isset($_POST["sub"])) {

    include 'dbconnection.php';
    // echo $_SESSION["loggedin_id"]; die;
    $heading = $_POST['heading'];
    $content = $_POST['content'];

    $file_name = $_FILES['image']['name'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $image_path = "./images/" . $file_name;
    $image_file = move_uploaded_file($file_tmp, $image_path);

    $sql = "INSERT INTO `news_table`(`user_id`,`heading`,`content`,`image_path`) VALUES (" .$_SESSION["loggedin_id"] . ",'$heading', '$content','$image_path')";
    // echo $sql;
    mysqli_query($conn, $sql);

}

?>


    <!-- bootstrap js include -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>


    <!-- custom js include -->
    <script src="./js/script.js"></script>

</body>

</html>