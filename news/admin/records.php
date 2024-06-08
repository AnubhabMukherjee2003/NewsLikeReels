<?php include "header.php";?>
<div class="home-section">
        <div class="container">
        <ul class="responsive-table">
              <li class="table-header">
                <div class="col col-1">catergory</div>
                <div class="col col-2">records</div>
                <!-- <div class="col col-4">Payment Status</div> -->
              </li>
<?php
include "config.php";
foreach ($cat as $x) {
    $sql= "SELECT * FROM `post` WHERE category='{$x}';";
    $result = mysqli_query($conn, $sql);
?>
              <li class="table-row">
                <div class="col col-1" data-label="category"><?php echo $x; ?></div>
                <div class="col col-2" data-label="number of records"><?php echo mysqli_num_rows($result); ?></div>
              </li>
                     
<?php
}
?>
        </ul>


<?php
if($conn->query($sql) == true){
    $insert = true;
}
else{
    echo "ERROR: $sql <br> $conn->error";
}

$conn->close();
?>
      </div>
</div>
<?php 
include "footer.php";
 ?>
