
<?php
session_start();
if(isset($_POST["t3"]))
{
	 
  $con=mysqli_connect("localhost","root","","marks_system");
  $a=$_POST["t1"];
  $b=$_POST["t2"];
  $sql="select * from teacher where username='$a' and password='$b'";
  $result=mysqli_query($con,$sql);
  $count=mysqli_num_rows($result);
  if($count>0)
  {
    while($row=mysqli_fetch_array($result))
    {
      $_SESSION["id"]=$row[0];
	  $_SESSION["d"]=$row[3];
    }
    header('location:tech_home.php');
	echo "<script>windows.location('tech_home.php');</script>";
  }
  else {
	  
    echo "<script>alert('Invalid Username or Password')</script>";
	 /*echo "<script>windows.location('movediv.html');</script>";
	 header('location:movediv.html');*/
	   
	
  }
}
 ?>