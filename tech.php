<html>
     <head></head>
     <body>
         <form action="tech.php" method="post">
             <input type="text" name="t1" placeholder="username" /><br />
             <input type="password" name="t2" placeholder="password" />
             <input type="submit" name="t3" value="submit" />
         </form>
     </body>
</html>

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
	  $_SESSION["d"]=$row[2];
    }
    header('location:trytechhome.php');
	echo "<script>windows.location('trytechhome.php');</script>";
  }
  else {
	  
    echo "<script>alert('Invalid Username or Password')</script>";
	
  }
}
 ?>