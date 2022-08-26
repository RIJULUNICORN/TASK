<?php

include 'config.php';
session_start();
$username = $_SESSION['username'];

if(isset($_POST['update_profile'])){

   $update_name = mysqli_real_escape_string($conn, $_POST['update_name']);
   $update_phone = mysqli_real_escape_string($conn, $_POST['update_phone']);
   $update_email = mysqli_real_escape_string($conn, $_POST['update_email']);
   $update_company = mysqli_real_escape_string($conn, $_POST['update_company']);

   mysqli_query($conn, "UPDATE `users` SET username = '$update_name',email = '$update_email', phone='$update_phone',company='$update_company' WHERE username = '$username'") or die('query failed');
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

<span style="font-size:30px; cursor:pointer; color: white;"="nav"  > Update Your Data Here 
   <font color="white">
<br><br>
<center>

<div class="main">

<div class="update-profile">

   <?php
      $select = mysqli_query($conn, "SELECT * FROM `users` WHERE username = '$username'") or die('query failed');
      if(mysqli_num_rows($select) > 0){
         $fetch = mysqli_fetch_assoc($select);
      }
   ?>

   <form action="" method="post" enctype="multipart/form-data">
      <?php
         if(isset($message)){
            foreach($message as $message){
               echo '<div class="message">'.$message.'</div>';
            }
         }
      ?>
      <div class="flex">
         <div class="inputBox">
            <span>Username :</span>
            <input id="myInput" type="text" name="update_name" value="<?php echo $fetch['username'];?>" class="box" readonly><br>
            <span>Your Phone :</span>
            <input id="myInput1" type="text" name="update_phone" value="<?php echo $fetch['phone']; ?>" class="box" readonly><br>
            <span>Your Email :</span>
            <input id="myInput2" type="email" name="update_email" value="<?php echo $fetch['email']; ?>" class="box" readonly><br>
            <span>Your Company :</span>
            <input id="myInput3" type="text" name="update_company" value="<?php echo $fetch['company']; ?>" class="box" readonly><br>
           
            <input id="remove" class="btn" type="button" value="Edit details"><br>
         </div>
         
      </div>
      <input type="submit" value="update profile" name="update_profile" class="btn">
      
   </form>

</div>

<script>
document.getElementById('remove').onclick = function() {
    document.getElementById('myInput').removeAttribute('readonly');
    document.getElementById('myInput1').removeAttribute('readonly');
    document.getElementById('myInput2').removeAttribute('readonly');
    document.getElementById('myInput3').removeAttribute('readonly');
}
document.getElementById('remove').addEventListener('click', function(){
    document.getElementById('myInput').style.background='#E5E4E2';
    document.getElementById('myInput1').style.background='#E5E4E2';
    document.getElementById('myInput2').style.background='#E5E4E2';
    document.getElementById('myInput3').style.background='#E5E4E2';
})
</script>
</body>
</html></span>
<span style="font-size:30px;cursor:pointer; color: white;" class="nav2"  >&#9776; More options</span>
</div>
	
	<div class="col-div-6">
	<div class="profile">

		
	</div>
</div>
	<div class="clearfix"></div>
</div>

	<div class="clearfix"></div>
	<br/>
	
	<div class="col-div-3">
		
 


			
		
	<div class="clearfix"></div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>

  $(".nav").click(function(){
    $("#mySidenav").css('width','70px');
    $("#main").css('margin-left','70px');
    $(".logo").css('visibility', 'hidden');
    $(".logo span").css('visibility', 'visible');
     $(".logo span").css('margin-left', '-10px');
     $(".icon-a").css('visibility', 'hidden');
     $(".icons").css('visibility', 'visible');
     $(".icons").css('margin-left', '-8px');
      $(".nav").css('display','none');
      $(".nav2").css('display','block');
  });

$(".nav2").click(function(){
    $("#mySidenav").css('width','300px');
    $("#main").css('margin-left','300px');
    $(".logo").css('visibility', 'visible');
     $(".icon-a").css('visibility', 'visible');
     $(".icons").css('visibility', 'visible');
     $(".nav").css('display','block');
      $(".nav2").css('display','none');
 });

</script>

</body>


</html>


