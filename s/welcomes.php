<?php 
session_start();
$username=$_SESSION['username'];
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
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
	<p class="logo"><font color="blue"><span>ACCOUNT</span></font> SETTINGS</p>
  <a href="#" class="icon-a"><i class="fa fa-dashboard icons"></i> &nbsp;&nbsp;Messages</a>
  <a href="profile.php"class="icon-a"><i class="fa fa-users icons"></i> &nbsp;&nbsp;My Profile/Update Data</a>
  <a href="passwordupdate.php"class="icon-a"><i class="fa fa-list icons"></i> &nbsp;&nbsp;Change password</a>
  <a href="logout.php"class="icon-a"><i class="fa fa-list-alt icons"></i> &nbsp;&nbsp;Sign out</a>

</div>
<div id="main">
	<div class="head">
		<div class="col-div-6">

<span style="font-size:30px;cursor:pointer; color: white;"="nav"  > Welcome !!!!

<center><br><br><br>
<iframe src="php-chat-app-main/home.php" width="100%" height="800" style="border:none;">
</iframe></span>
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
</body>
</html>

