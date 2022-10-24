<?php
include_once 'dbconnection.php';
session_start();
$id = $_GET['news_id'];
$sql = "DELETE FROM news_table WHERE id = $id";
mysqli_query($conn,$sql);
header("Location: user_news_page.php");
?>