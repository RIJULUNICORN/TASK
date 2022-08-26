<?php

include 'config.php';
session_start();
$user_id = $_SESSION['username'];

if(isset($_POST['update_profile'])){

   $update_name = mysqli_real_escape_string($conn, $_POST['update_name']);
   $update_phone = mysqli_real_escape_string($conn, $_POST['update_phone']);
   $update_email = mysqli_real_escape_string($conn, $_POST['update_email']);
   $update_company = mysqli_real_escape_string($conn, $_POST['update_company']);

   mysqli_query($conn, "UPDATE `users` SET phone='$update_phone', email = '$update_email', company='$update_company' WHERE username = '$username'") or die('query failed');

   
      }

   $update_image = $_FILES['update_image']['name'];
   $update_image_size = $_FILES['update_image']['size'];
   $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
   $update_image_folder = 'uploaded_img/'.$update_image;

   if(!empty($update_image)){
      if($update_image_size > 2000000){
         $message[] = 'image is too large';
      }else{
         $image_update_query = mysqli_query($conn, "UPDATE `users` SET image = '$update_image' WHERE username = '$username'") or die('query failed');
         if($image_update_query){
            move_uploaded_file($update_image_tmp_name, $update_image_folder);
         }
         $message[] = 'image updated succssfully!';
      
   }
}   

?>


<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>
<style>
#navbar{top:5px; left:5px; width:100%;}
nav ul{margin:5px; padding:5px; 0px; 5px; 30px;}
        nav li{display:inline; margine-right:20px;}
body{background-size:cover}
h1{font-size:35px;}
p{margin-top:300px;}
.sidenav {
  height: 100%; /* Full-height: remove this if you want "auto" height */
  width: 160px; /* Set the width of the sidebar */
  position: fixed; /* Fixed Sidebar (stay in place on scroll) */
  z-index: 1; /* Stay on top */
  top: 0; /* Stay at the top */
  left: 0;
  background-color:#000;/* Black */
  overflow-x: hidden; /* Disable horizontal scroll */
  padding-top: 20px;
}

/* The navigation menu links */
.sidenav a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
}

/* When you mouse over the navigation links, change their color */
.sidenav a:hover {
  color: #ff0000;
}

/* Style page content */
.main {
  margin-left: 160px; /* Same as the width of the sidebar */
  padding: 0px 10px;
}

/* On smaller screens, where height is less than 450px, change the style of the sidebar (less padding and a smaller font size) */
@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
 

* {
  box-sizing: border-box;
}

   /* Style the search field */
   form.example input[type=text] { 
   padding: 10px; 
   ont-size: 17px; 
   border: 1px solid grey; 
   float: right; 
   width: 200px; 
   background: transparent; /* #f1f1f1 */
   border-radius:20px; 
}

/* Style the submit button */
form.example button { 
  float: right; 
  width: 100px; 
  padding: 10px;
  background: #2196F3; /* #2196F3 */
  color: white; 
  font-size: 17px; 
  border: 1px solid grey;
  border-left: none; /* Prevent double borders */
  cursor: pointer; 
  border-radius:20px; 
}

form.example button:hover {
  background: #0b7dda;
}

/* Clear floats */
form.example::after {
  content: "";
  clear: both;
  display: table;
}
/* Style buttons */
.btn {
  border-radius:25px;
  background-color: grey; /* Blue background */
  border: none; /* Remove borders */
  color: white; /* White text */
  padding: 12px 20px; /* Some padding */
  font-size: 12px; /* Set a font size */
  cursor: pointer; /* Mouse pointer on hover */
}

/* Darker background on mouse-over */
.btn:hover {
  background-color: black;
}
input[type=text]{width:200px; padding:12px 20px; margin: 8px 0; box-sizing:border-box; border:none; border-bottom:2px solid black; background-color:transparent;} 
input[type=password]{width:200px; padding:12px 20px; margin: 8px 0; box-sizing:border-box; border:none; border-bottom:2px solid black; background-color:transparent;} 
input[type=email]{width:200px; padding:12px 20px; margin: 8px 0; box-sizing:border-box; border:none; border-bottom:2px solid black; background-color:transparent;} 
.main img{
   height: 150px;
   width: 150px;
   border-radius: 50%;
   object-fit: cover;
   margin-bottom: 5px;
}
.btnm{
  border-radius:25px;
  background-color: black; /* Blue background */
  border: none; /* Remove borders */
  color: white; /* White text */
  padding: 12px 20px; /* Some padding */
  font-size: 12px; /* Set a font size */
  cursor: pointer; /* Mouse pointer on hover */
}
</style>
<script>
document.getElementById('myButton').onclick = function() {
    document.getElementById('myInput').removeAttribute('readonly');
};
</script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body background="imgnw.jpg";>
<div class="sidenav">
<nav class="navbar">
<ul>
<li><a href="dashh.php" style="text-decoration:none;"><i class="fa-solid fa-user"></i><b>Profile</a></li><br>
<!-- <li><a href="new_pwd.html" style="text-decoration:none;"><i class="fa-solid fa-pen-to-square"></i><b>Update</a></li><br> -->
<!-- <li><a href="newpswd.html" style="text-decoration:none;"><i class="fa-solid fa-key"></i><b>Change Password</a></li><br> -->
<li><a href="home.php" style="text-decoration:none;"><i class="fa-solid fa-right-from-bracket"></i><b>Signout</a></li><br>
</ul></div>
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
         if($fetch['image'] == ''){
            echo '<img src="images/default-avatar.png">';
         }else{
            echo '<img src="uploaded_img/'.$fetch['image'].'">';
         }
         if(isset($message)){
            foreach($message as $message){
               echo '<div class="message">'.$message.'</div>';
            }
         }
      ?>
      <div class="flex">
         <div class="inputBox">
            <span>username :</span>
            <input id="myInput" type="text" name="update_name" value="<?php echo $fetch['name'];?>" class="box" readonly><br>
            <span>your phone :</span>
            <input id="myInput1" type="text" name="update_phone" value="<?php echo $fetch['phone']; ?>" class="box" readonly><br>
            <span>your email :</span>
            <input id="myInput2" type="email" name="update_email" value="<?php echo $fetch['email']; ?>" class="box" readonly><br>
            <span>your company :</span>
            <input id="myInput3" type="text" name="update_company" value="<?php echo $fetch['company']; ?>" class="box" readonly><br>
            <input id="remove" class="btn" type="button" value="Edit above details"><br>
            <span>update your pic :</span>
            <input type="file" name="update_image" accept="image/jpg, image/jpeg, image/png" class="box">
         </div>
         <div class="inputBox">
            <input type="hidden" name="old_pass" value="<?php echo $fetch['password']; ?>">
            <span>old password :</span>
            <input type="password" name="update_pass" placeholder="enter previous password" class="box">
            <span>new password :</span>
            <input type="password" name="new_pass" placeholder="enter new password" class="box">
            <span>confirm password :</span>
            <input type="password" name="confirm_pass" placeholder="confirm new password" class="box">
         </div>
      </div>
      <input type="submit" value="update profile" name="update_profile" class="btn">
      <a href="home.php" class="delete-btn">Logout</a>
   </form>

</div>

<script>
let btnRemove=document.querySelector('#remove');
let input=document.querySelector('input');

btnRemove.addEventListener('click',()=>{
     input.removeAttribute('readonly');
});
</script>
</body>
</html>
