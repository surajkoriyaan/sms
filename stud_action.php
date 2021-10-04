<?php
session_start();
if(isset($_POST["t3"]))
{
	 
  $con=mysqli_connect("localhost","root","","marks_system");
  $a=$_POST["t1"];
  $b=$_POST["t2"];
  $sql="select * from stud_reg where username='$a' and password='$b'";
  $result=mysqli_query($con,$sql);
  $count=mysqli_num_rows($result);
  if($count>0)
  {
    while($row=mysqli_fetch_array($result))
    {
		$_SESSION["id"]=$row[1];
	  $_SESSION["d1"]=$row[0];
    }
    header('location:stud_home.php');
	echo "<script>windows.location('stud_home.php');</script>";
  }
  else {
	  
    
	header('location:movediv.html');
	echo "<script>alert('Invalid Username or Password')</script>";
  }
}
 ?>