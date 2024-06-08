<?php 
if(isset($_POST)){
    $data = file_get_contents("php://input");
    $user = json_decode($data, true);
    // echo $user["username"];

    $server = "localhost";
    $username = "root";
    $password = "";


    $con = mysqli_connect($server, $username, $password, 'news');
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    else{
    // echo "Success connecting to the db";
    }

    $sqlll= "SELECT number FROM `offset` WHERE sno =1;";
    $res = mysqli_fetch_assoc(mysqli_query($con, $sqlll));
    // echo $res['number'];

    $k=$res["number"];
    // echo $k;
    // echo $user["ind"];
    if ($user["ind"]==0) {
        # code...
        $k++;
        $sql1= "UPDATE `offset` SET number ={$k} WHERE sno =1;";
        mysqli_query($con, $sql1);
    }
    // echo $k;
    // echo $user["username"];
    // include script.php;
    // $sqlll= "SELECT number FROM `offset` WHERE sno =1;";
    // $res1 = mysqli_fetch_assoc(mysqli_query($con, $sqlll));
    // echo $k+$user["username"];
    $off =$k+$user["username"];
    // echo $off;
    $sql= "SELECT * FROM `post` ORDER BY post_id DESC LIMIT {$off},1;";
    $result1 = mysqli_query($con, $sql);
    // if($con->query($sql2)==true){}
    while($row= mysqli_fetch_assoc($result1)){
        $a =($row['img']) ;
        $b =strval($row['author']) ;
        $c =strval($row['title']) ;
        $d =strval($row['post_date']) ;
        $e =strval($row['description']) ;   
        $f =strval($row['url']) ;
        

        echo  '<div class="article-wrapper"><figure><img src="'.$a.'" alt="" /></figure><div class="article-body"><h2>'.$c.'</h2><p>'.$e.'</p><a href="#" class="read-more">Read more <span class="sr-only"></span><svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd"d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" /></svg></a></div></div>';

        
}
}
?>