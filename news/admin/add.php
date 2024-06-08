<?php include "header.php";
if(isset($_POST['save'])){
  include "config.php";

  $user = mysqli_real_escape_string($conn,$_POST['user']);
  $password = mysqli_real_escape_string($conn,md5($_POST['password']));
  $role = 1;

  $sql = "SELECT username FROM user WHERE username = '{$user}'";

  $result = mysqli_query($conn, $sql) or die("Query Failed.");

  if(mysqli_num_rows($result) > 0){
    echo "<p style='color:red;text-align:center;margin: 10px 0;'>UserName already Exists.</p>";
  }else{
    $sql1 = "INSERT INTO user (username, password, role) VALUES ('{$user}','{$password}','{$role}')";
    if(mysqli_query($conn,$sql1)){
      header("Location: {$hostname}/admin/users.php");
    }else{
      echo "<p style='color:red;text-align:center;margin: 10px 0;'>Can't Insert User.</p>";
    }
  }
}
?>
<div class="login-box">
  <h2>Login</h2>
  <form action="<?php $_SERVER['PHP_SELF']; ?>" method ="POST" autocomplete="off">
    <div class="user-box">
      <input type="text" name="user" placeholder="username" required="">
      <label>Username</label>
    </div>
    <div class="user-box">
      <input type="password" name="password" placeholder="password"  required="">
      <label>Password</label>
    </div>
    <a href="#">
      <span></span>
      <span></span>
      <span></span>
      <span></span>A
      <input type="submit"  name="save"  required />
    </a>
  </form>
</div>
<?php include "footer.php"; ?>
