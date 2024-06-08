<?php
  include "config.php";
  session_start();

  if(!isset($_SESSION["username"])){
    header("Location: {$hostname}/admin/");
  }

  $cat = array("sports", "politics", "crime","technology", "entertainment", ); 
?>
<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/CodingLabYT-->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <!--<title> Drop Down Sidebar Menu | CodingLab </title>-->
    <!-- <link rel="stylesheet" href="style.css"> -->
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet'
        href='https://fonts.googleapis.com/css2?family=Bebas+Neue&amp;family=Figtree:wght@300;600&amp;display=swap'>
    <!-- <link rel="stylesheet" href="./style.css"> -->
    <link rel="stylesheet" href="ss.css">
</head>

<body>
    <div class="sidebar ">

        <div class="logo-details">
            <i class='bx bx-world'></i>
            <span class="logo_name">NewsLikeReels</span>
        </div>
        <div class="logo-details">
        <i class='bx bx-code-alt'></i>
            <span class="logo_name">hi!, <?php 
            // session_start();
            echo $_SESSION["username"];
            ?></span>
        </div>

        <ul class="nav-links">
        
        <li>
                <a href="http://localhost/news/admin/records.php">
                <i class='bx bxs-right-arrow'></i>
                    <span class="link_name">
                        records
                    </span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="http://localhost/news/admin/records/php">records</a></li>
                </ul>
            </li>
            <li>
                <a href="http://localhost/news/admin/upload.php">
                <i class='bx bxs-joystick-button'></i>
                    <span class="link_name">update</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="http://localhost/news/admin/upload.php">update</a></li>
                </ul>
            </li>
            <li>
                    <a href="http://localhost/news/admin/users.php">
                    <i class='bx bx-user'></i>
                        <span class="link_name">users</span>
                    </a>


                <ul class="sub-menu">
                <li><a class="link_name" href="http://localhost/news/admin/users.php">users</a></li>
                </ul>
            </li>

            <li>
                    <a href="http://localhost/news/admin/add-user.php">
                    <i class='bx bxs-user-plus' style='color:#ffffff' ></i>
                        <span class="link_name">add user</span>
                    </a>


                <ul class="sub-menu">
                <li><a class="link_name" href="http://localhost/news/admin/add-user.php">add user</a></li>
                </ul>
            </li>
            <li>
                    <a href="http://localhost/news/admin/logout.php">
                    <i class='bx bxs-log-out' style='color:#ffffff' ></i>
                        <span class="link_name">logout</span>
                    </a>


                <ul class="sub-menu">
                <li><a class="link_name" href="http://localhost/news/admin/logout.php">add user</a></li>
                </ul>
            </li>
        </ul>
    </div>

