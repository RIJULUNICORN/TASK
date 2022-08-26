<?php
	$username=$_POST['username'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$company=$_POST['compny'];
	$password=$_POST['password'];
	$hash=md5($password);
 	//Database connection
	$conn = new mysqli('localhost','root','','userdata');
if(!$conn){
 die('Could not Connect My Sql:' .mysql_error());
}
?>
