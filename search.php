<?php include 'header.php'; ?>


                  <?php
                  include "config.php";
                  if(isset($_GET['search'])){
                    $search_term = mysqli_real_escape_string($conn, $_GET['search']);
                  ?>
                  <!-- <h2 class="page-heading">Search : <?php 
                  // echo $search_term; ?></h2> -->
                  <div class="home-section">
                    <div class="reelsection">
                  <?php

                    /* Calculate Offset Code */
                    $limit = 3;
                    if(isset($_GET['page'])){
                      $page = $_GET['page'];
                    }else{
                      $page = 1;
                    }
                    $offset = ($page - 1) * $limit;

                    // $sql = "SELECT post.post_id, post.title, post.description,post.post_date,post.author,
                    // category.category_name,user.username,post.category,post.post_img FROM post
                    // LEFT JOIN category ON post.category = category.category_id
                    // LEFT JOIN user ON post.author = user.user_id
                    // WHERE post.title LIKE '%{$search_term}%' OR post.description LIKE '%{$search_term}%'
                    // ORDER BY post.post_id DESC LIMIT {$offset},{$limit}";
                    $sql= "SELECT * FROM `post` WHERE `description` LIKE '%{$search_term}%' OR `content` LIKE '%{$search_term}%' ;";

                    $result = mysqli_query($conn, $sql) or die("Query Failed.");
                    if(mysqli_num_rows($result) > 0){
                      while($row= mysqli_fetch_assoc($result)){
                        // echo  $row['author']  ;
                        // echo "<br>";
                        $a =($row['img']) ;
                        $b =strval($row['author']) ;
                        $c =strval($row['title']) ;
                        $d =strval($row['post_date']) ;
                        $e =strval($row['description']) ;
                        $f =strval($row['url']) ;
                       ?>
                       <article class="reel">
                <div class="article-wrapper">
                    <figure>
                        <img src="<?php echo $a;?>"
                            alt="" />
                    </figure>
                    <div class="article-body">
                        <h2><?php echo $c ;?></h2>
                        <p> <?php echo $e;?></p>
                        <a href="#" class="read-more">
                            Read more <span class="sr-only"></span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                </div>
            </article>
                       <?php
                    }
                    }else{
                      echo `<h2 style="color:white;" >No Record Found.</h2>`;
                    }

                   
                    }
                  
                    ?>
                  </div>
                </div><!-- /post-container -->
            </div>
            
        </div>
      </div>
    </div>
<?php include 'footer.php'; ?>
