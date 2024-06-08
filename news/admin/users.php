<?php include "header.php";
?>
  <div class="home-section">
        <div class="container">
              <div class="col-md-2">
                  <!-- <a class="add-new" href="add-user.php">add user</a> -->
              </div>
              
                <?php
                  include "config.php"; 
                  $sql = "SELECT * FROM user ORDER BY user_id";
                  $result = mysqli_query($conn, $sql) or die("Query Failed.");
                  if(mysqli_num_rows($result) > 0){
                ?>
                  <ul class="responsive-table">
              <li class="table-header">
                <div class="col col-1">Id</div>
                <div class="col col-2">Name</div>
                <div class="col col-3">Role</div>
                <!-- <div class="col col-4">Payment Status</div> -->
              </li>
                        <?php
                          while($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <li class="table-row">
                <div class="col col-1" data-label="Job Id"><?php echo $row['user_id']; ?></div>
                <div class="col col-2" data-label="Customer Name"><?php echo $row['username']; ?></div>
                <div class="col col-3" data-label="Amount"><?php echo "Admin"; ?></div>
                <!-- <div class="col col-4" data-label="Payment Status">Pending</div> -->
              </li>
                          
                        <?php
                        } ?>
                      </ul>
                  <?php
                }else {
                  echo "<h3>No Results Found.</h3>";
                }
              ?>
              
          
      </div>
  </div>
<?php include "footer.php"; ?>
