<?php
  //echo "<h1>" .  . "</h1>";
  include "config.php";
  $cat = array(  "entertainment", "politics", "crime","technology","sports",); 
  // $page = basename($_SERVER['PHP_SELF']);
  // switch($page){
  //   case "single.php":
  //     if(isset($_GET['id'])){
  //       $sql_title = "SELECT * FROM post WHERE post_id = {$_GET['id']}";
  //       $result_title = mysqli_query($conn,$sql_title) or die("Tile Query Failed");
  //       $row_title = mysqli_fetch_assoc($result_title);
  //       $page_title = $row_title['title'];
  //     }else{
  //       $page_title = "No Post Found";
  //     }
  //     break;
  //   case "category.php":
  //     if(isset($_GET['cid'])){
  //       $sql_title = "SELECT * FROM category WHERE category_id = {$_GET['cid']}";
  //       $result_title = mysqli_query($conn,$sql_title) or die("Tile Query Failed");
  //       $row_title = mysqli_fetch_assoc($result_title);
  //       $page_title = $row_title['category_name'] . " News";
  //     }else{
  //       $page_title = "No Post Found";
  //     }
  //     break;
  //   case "author.php":
  //     if(isset($_GET['aid'])){
  //       $sql_title = "SELECT * FROM user WHERE user_id = {$_GET['aid']}";
  //       $result_title = mysqli_query($conn,$sql_title) or die("Tile Query Failed");
  //       $row_title = mysqli_fetch_assoc($result_title);
  //       $page_title = "News By " .$row_title['first_name'] . " " . $row_title['last_name'];
  //     }else{
  //       $page_title = "No Post Found";
  //     }
  //     break;
  //   case "search.php":
  //     if(isset($_GET['search'])){

  //       $page_title = $_GET['search'];
  //     }else{
  //       $page_title = "No Search Result Found";
  //     }
  //     break;
  //   default :
  //     // $sql_title = "SELECT websitename FROM settings";
  //     // $result_title = mysqli_query($conn,$sql_title) or die("Tile Query Failed");
  //     // $row_title = mysqli_fetch_assoc($result_title);
  //     // $page_title = $row_title['websitename'];
  //     // break;
  // }

?>
<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/CodingLabYT-->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <!--<title> Drop Down Sidebar Menu | CodingLab </title>-->
    <link rel="stylesheet" href="style.css">
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet'
        href='https://fonts.googleapis.com/css2?family=Bebas+Neue&amp;family=Figtree:wght@300;600&amp;display=swap'>
    <!-- <link rel="stylesheet" href="./style.css"> -->
    <link rel="stylesheet" href="s.css">
</head>

<body>
    <div class="sidebar close">

        <div class="logo-details">
            <i class='bx bx-world'></i>
            <span class="logo_name">CodingLab</span>
        </div>

        <ul class="nav-links">
            <li>
                <a href="#">
                    <i class='bx bx-search-alt'></i>
                    <span class="link_name">
                        <form class="search-post" action="search.php" method="GET">

                            <input type="text" name="search" class="form-control" placeholder="Search .....">


                        </form>
                    </span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="#">Search</a></li>
                </ul>
            </li>
            <li>
                <a href="/news">
                    <i class='bx bx-grid-alt'></i>
                    <span class="link_name">Dashboard</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="#">Dashboard</a></li>
                </ul>
            </li>
            <li>
                <div class="iocn-link">
                    <a href="#">
                        <i class='bx bx-collection'></i>
                        <span class="link_name">Category</span>
                    </a>
                    <i class='bx bxs-chevron-down arrow'></i>
                </div>
                <ul class="sub-menu">
                    <!-- <li><a class="link_name" href="#">Category</a></li> -->
                    <?php foreach ($cat as $x) { ?>
                    <li><a href="category.php?cid=<?php echo $x; ?>"><?php echo $x; ?></a></li>
                      <br>
                    <?php } ?>
                </ul>
            </li>


        </ul>
    </div>