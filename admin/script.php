<?php
    $data = file_get_contents("php://input");
    $user = json_decode($data, true);
    
    $server = "localhost";
    $username = "root";
    $password = "";

    // Create a database connection
    $con = mysqli_connect($server, $username, $password);

    // Check for connection success
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    echo "Success connecting to the db";
    // // echo "Success connecting to the db";
    // $sql = "INSERT INTO `pr`.`crime` ( `author`) VALUES ( "$user['author']");";

    // 
    $id= mysqli_real_escape_string($con,$_GET['id']);
    $a= $user['author'];
    $b= $user['title'];
    $c= mysqli_real_escape_string($con,$user['description']);
    $d=mysqli_real_escape_string($con,$user['content']);
    $e= $user['publishedAt'];
    $f= $user['url'];
    $g= $user['urlToImage'];

    // echo $a;
    // echo $g;
    $sql = 'INSERT INTO `news`.`post` (`category`, `author`,`title`, `description`, `post_date`, `url`, `img`  ) VALUES ("'.$id.'","'.$a.'", "'.$b.'", "'.$c.'", "'.$e.'", "'.$f.'", "'.$g.'" );';
    echo $sql;

    // echo $sql;
    if($con->query($sql) == true){
        echo "Successfully inserted";

        // Flag for successful insertion
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    $con->close();
?>
