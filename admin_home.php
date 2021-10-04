<html>
       <head>
       <title>Admin Pannel</title>
       <link rel="stylesheet" href="bootstrap-4.2.1-dist/bootstrap-4.2.1-dist/css/bootstrap.css">
       <style>
	   body
	   {
		   background-color:#CCC;
	   }
          #top
		  {
			  position:absolute;
			  height:80%;
			  width:80%;
			  left:10%;
			  top:10%;
			  background-color:#F00;
			  background-image:url(mini-profile-bg-01.jpg);
			  background-size:100% 100%;
		  }
		  form
		  {
			  margin:5%;
			  background-color:rgba(0,0,0,.5);
			  height:60%;
		  }
		  form label
		  {
			  font-size:24px;
			  color:#FFF;
		  }
		  form input
		  {
			  height:6%;
			  width:15%;
			  border-radius:10px;
			  color:#FFF;
			  background-color:transparent;
			  outline:none;
		  }
		  form input[type="submit"]
		  {
			  height:15%;
			  width:15%;
			  background-color:transparent;
			  color:#FFF;
			  cursor:pointer;
		  }
       </style>
       </head>
       <body>
            <h2 style="text-align:center; font-size:46px">Admin_Pannel</h2>
            <div id="top">
               <center><form action="#" method="post">
                   <label>Username:-</label>
                   <input type="text" name="t1" class="form-control" style="width:45%; background-color:transparent; color:#FFF">
                   <label>Password:-</label>
                   <input type="password" name="t2" class="form-control" style="width:45%; background-color:transparent; color:#FFF"><br>
                   <input type="submit" name="t3" value="submit" class="form-control">
               </form></center>
            </div>
       </body>
</html>


<?php
session_start();
if(isset($_POST["t3"]))
{
	 
  $con=mysqli_connect("localhost","root","","marks_system");
  $a=$_POST["t1"];
  $b=$_POST["t2"];
  $sql="select * from admin where username='$a' and password='$b'";
  $result=mysqli_query($con,$sql);
  $count=mysqli_num_rows($result);
  if($count>0)
  {
    while($row=mysqli_fetch_array($result))
    {
      $_SESSION["id"]=$row[0];
	  $_SESSION["d"]=$row[3];
    }
    header('location:admin_home2.php');
	echo "<script>windows.location('admin_home2.php');</script>";
  }
  else {
	  
    echo "<script>alert('Invalid Username or Password')</script>";
	
  }
}
 ?>