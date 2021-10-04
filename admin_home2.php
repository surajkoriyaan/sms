<?php
session_start();
$check=$_SESSION["id"];
$br=$_SESSION["d"];
if(!$check)
{
  header("location:movediv.html");
}

 ?>
<html>
      <head>
           <link rel="stylesheet" href="bootstrap-4.2.1-dist/bootstrap-4.2.1-dist/css/bootstrap.css" />
      </head>
      <script>
         function fun()
		 {
			 document.getElementById("top2").style.display="block";
		 }
      </script>
      <style>
	  body
	  {
		  background-color:#CCC;
	  }
	  
         #top
		 {
			 position:absolute;
			 height:60%;
			 width:80%;
			 top:10%;
			 left:10%;
			 background-color:#F00;
		 }
		 #top2
		 {
			 position:absolute;
			 height:90%;
			 width:80%;
			 top:10%;
			 left:10%;
			 background-color:#09F;
			 display:none;
		 }
		 .d2 
		    {
			 position:absolute;
			 height:35%;
			 width:90%;
			left:5%;
			 background-color:#0F0;
		   }
      </style>
      <body>
      <form action="admin_home2.php" method="post"><button type="submit" name="out" class="form-control button bg-warning" style="width:15%; float:right">Logout</button></form>
      <h2 style="text-align:center">Admin_Home</h2>
      
            <div id="top"><br><br>
              <center><form action="admin_home2.php" method="post"><button type="submit" name="t1" class="form-control bg-light" style="width:60%">Show Student Dettails</button></form></center>
              <center><form><button type="button" name="t1" class="form-control bg-light" style="width:60%" onClick="fun()">Create Teacher Id</button></form></center>
              <center><form action="admin_home2.php" method="post"><button type="submit" name="t2" class="form-control bg-light" style="width:60%">Show Teacher Table</button></form></center>
              <center><form action="admin_home2.php" method="post"><button type="submit" name="t3" class="form-control bg-light" style="width:60%">Show student Marks</button></form></center>
            </div>
            <div id="top2">
              <h2 style="text-align:center">Create Teacher Id</h2>
              <center><form action="admin_home2.php" method="post">
                  <label style="font-size:20px;">Id-Number</label>
                  <input type="text" name="f1" class="form-control" style="width:60%">
                  <label style="font-size:20px">Name</label>
                  <input type="text" name="f2" class="form-control" style="width:60%">
                  <label style="font-size:20px">Branch</label>
                  <input type="text" name="f3" class="form-control" style="width:60%">
                  <label style="font-size:20px">Username</label>
                  <input type="text" name="f4" class="form-control" style="width:60%">
                  <label style="font-size:20px">Password</label>
                  <input type="password" name="f5" class="form-control" style="width:60%"><br>
                  <input type="submit" name="f6" class="form-control" style="width:60%">
              </form></center>
            </div>
            
      </body>
</html>
<?php
 $con=mysqli_connect("localhost","root","","marks_system");
if(isset($_POST["t1"]))
   {
	 
	   $sql="select*from stud_reg";
	   $result=mysqli_query($con,$sql);
	   echo "<table border='1' align='center' style='background-color:#0F0;z-index:1' class='d2'>
	   <tr><th colspan='11' style='text-align:center'>student Details</th></tr>
	   <tr><th>id_number</th><th>name</th><th>father's name</th><th>email-id</th><th>mobile_number</th><th>course</th><th>branch</th><th>gender</th><th>address</th><th>username</th><th>password</th></tr>";
	   while($row=mysqli_fetch_array($result))
	   {
		   echo "
		   
		   <tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td>
		   <td>$row[4]</td><td>$row[5]</td><td>$row[6]</td><td>$row[7]</td><td>$row[8]</td><td>$row[9]</td><td>$row[10]</td></td>
		   </tr>";
	   }
	   echo "</table>";
   }
   
   
   if(isset($_POST["t2"]))
   {
	 
	   $sql1="select*from teacher";
	   $result1=mysqli_query($con,$sql1);
	   echo "<table border='1' align='center' style='background-color:#0F0;z-index:1' class='d2'>
	   <tr><th colspan='5' style='text-align:center'>Teachers Details</th></tr>
	   <tr><th>id_number</th><th>branch</th><th>name</th><th>username</th><th>password</th></tr>";
	   while($row1=mysqli_fetch_array($result1))
	   {
		   echo "
		   
		   <tr><td>$row1[4]</td><td>$row1[3]</td><td>$row1[0]</td><td>$row1[1]</td>
		   <td>$row1[2]</td></tr>";
	   }
	   echo "</table>";
   }
	 
	 
	 if(isset($_POST["t3"]))
   {
	 
	 
	   $sql="select*from marks";
	   $result=mysqli_query($con,$sql);
	   echo "<table border='1' align='center' style='background-color:#0F0;z-index:1' class='d2'>
	   <tr><th colspan='13' style='text-align:center'>Student Marks</th></tr>
	   <tr><th>Id_number</th><th>name</th><th>course</th><th>branch</th><th>semester</th><th>sub1</th><th>sub2</th><th>sub3</th><th>sub4</th><th>sub5</th><th>total</th><th>precentage</th></tr>";
	   while($row=mysqli_fetch_array($result))
	   {
		   echo "
		   
		   <tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td>
		   <td>$row[4]</td><td>$row[5]</td><td>$row[6]</td><td>$row[7]</td><td>$row[8]</td><td>$row[9]</td><td>$row[10]</td><td>$row[11]</td></td>
		   </tr>";
	   }
	   echo "</table>";
   }
	
	if(isset($_POST["f6"]))
 {
	 $a=$_POST["f1"];
	 $b=$_POST["f2"];
	 $c=$_POST["f3"];
	 $d=$_POST["f4"];
	 $e=$_POST["f5"];
	 	 if($a=="" || $b=="" || $c=="" || $d=="" || $e=="" )
	 {
		 echo "please enter value first";
	 }
	 else
	 {
	 $sql="insert into teacher values('$b','$d','$e','$c','$a')";
	 mysqli_query($con,$sql);
	 
	 echo"<script>alert('created successfully')</script>";
	 }
 }
 if(isset($_POST["out"]))
{
	session_unset($check);
	session_destroy();
  header('location:movediv.html');
}
?>