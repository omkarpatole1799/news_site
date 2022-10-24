<?php
  session_start();
  error_reporting(0);
  // echo $_SESSION["loggedin_id"];
  include_once 'dbconnection.php';
  // $_SESSION["loggedin_id"]=0;
  // $userprofile = $_SESSION["loggedin_id"];

  // if($userprofile == true){
  //   header("Location: user_news_page.php");
  // }
  // else {
  //   header("Location: index.php");
  // }
  // include_once 'dbconnection.php';

?>


<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home News Site PHP</title>
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
        <?php
        if ($_SESSION["loggedin_id"]>0) {
          echo "<li class='nav-item'>
          <a class='nav-link' href='user_news_page.php'>Profile</a>
        </li>";
        }
        else {
          echo '<li class="nav-item">
          <a class="nav-link" href="login.php">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="signup_page.php">Sign up</a>
        </li>';
        } 
        ?>
        
        <!-- <li class="nav-item">
          <a class="nav-link" href="add_news.php">Add news</a>
        </li> -->
      </ul>
    </div>
  </nav>

  <?php
  $sql = "SELECT * FROM news_table";
  $result = mysqli_query($conn, $sql);
  while ($row = mysqli_fetch_assoc($result)) {

    echo
        "<div class='container news-container'>
      <div class='row'>

        <div class='col'>
          <img src= '" . $row['image_path'] . "'>
        </div>

        <div class='col'>
          <div class='row news-heading'>" . $row['heading'] . "</div>
          <div class='row time-stamp'>" . $row['news_time'] . "</div>
          <div class='row news-description'>" . $row['content'] . "</div>
        </div>

      </div>
    </div>";
}

?>

  <!-- bootstrap js include -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

  <!-- custom js include -->
  <script src="./js/script.js"></script>
</body>

</html>