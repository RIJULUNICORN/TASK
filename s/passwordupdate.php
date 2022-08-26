<?php 
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}
?>
<?php
include('config.php');
session_start();
$username=$_SESSION['username'];
if(!isset($_SESSION['username'])){
	header('location:index.php');
}
if(isset($_POST['update_profile'])){
   $old_pass = $_POST['old_pass'];
   $update_pass = mysqli_real_escape_string($conn, md5($_POST['update_pass']));
   $new_pass = mysqli_real_escape_string($conn, md5($_POST['new_pass']));
   $confirm_pass = mysqli_real_escape_string($conn, md5($_POST['confirm_pass']));

   if(!empty($update_pass) || !empty($new_pass) || !empty($confirm_pass)){
      if($update_pass != $old_pass){
         $message[] = 'old password not matched!';
      }elseif($new_pass != $confirm_pass){
         $message[] = 'confirm password not matched!';
      }else{
         mysqli_query($conn, "UPDATE users SET password = '$confirm_pass' WHERE username = '$username'") or die('query failed');
         $message[] = 'password updated successfully!';
		header("Location:welcomes.php");
      }
   }
}

?>

  <?php
      $select = mysqli_query($conn, "SELECT * FROM users WHERE username ='$username'") or die('query failed');
      if(mysqli_num_rows($select) > 0){
         $fetch = mysqli_fetch_assoc($select);
      }
   ?>
      <div class="flex">
         <div class="inputBox">
	<?php
         if(isset($message)){
            foreach($message as $message){
               echo '<div class="message">'.$message.'</div>';
            }
         }
      ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
    <?php echo "<h1>Welcome " . $_SESSION['username'] . "</h1>"; 
    ?>
<!Doctype HTML>
<html>
<head>
<title></title>
	<link rel="stylesheet" href="css/style.css" type="text/css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>	
	<div id="mySidenav" class="sidenav">
	<p class="logo"><span>User</span> Account</p>
  <a href="welcomes.php" class="icon-a"><i class="fa fa-dashboard icons"></i> &nbsp;&nbsp;Dashboard</a>
  <a href="profile.php" class="icon-a"><i class="fa fa-users icons"></i> &nbsp;&nbsp;My Profile/Update Data</a>
  <a href="passwordupdate.php"class="icon-a"><i class="fa fa-list icons"></i> &nbsp;&nbsp;Change password</a>
  <a href="logout.php"class="icon-a"><i class="fa fa-list-alt icons"></i> &nbsp;&nbsp;Sign out</a>

</div>
<div id="main">
	<div class="head">
		<div class="col-div-6">

<span style="font-size:30px; cursor:pointer; color: white;"="nav"  > <font color="white">
<br><br>
<center>
<form action="" method="post">
      <h3>You can Change your Password Here</h3>
            <input type="hidden" name="old_pass" value="<?php echo $fetch['password']; ?>">
            <label><input type="password" name="update_pass" placeholder="enter previous password" class="box"></label><br><br>
            <label><input type="password" name="new_pass" placeholder="enter new password" class="box"></label><br><br>
            <label><input type="password" name="confirm_pass" placeholder="confirm new password" class="box"></label><br><br>
        
      <input type="submit" value="update password" name="update_profile" class="btn">
   </form></span>
<span style="font-size:30px;cursor:pointer; color: white;" class="nav2"  >&#9776; More options</span>
</div>
</body>
</html>
