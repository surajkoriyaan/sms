<?php
session_start();
$check=$_SESSION["id"];
$br=$_SESSION["d"];
if(!$check)
{
  header("location:movediv.html");
}
echo "<h2 style='color:#FFF; text-align:center; text-shadow:4px 8px 12px  #FFFF00; text-decoration:underline'>Welcome Teacher.$check<br>";
echo "<h2 style='color:#FFF; text-align:center; text-shadow:4px 8px 12px  #FFFF00; text-decoration:underline'>HOD Of.$br Department";

 ?>

<html>
       <head>
           <link rel="stylesheet" href="bootstrap-4.2.1-dist/bootstrap-4.2.1-dist/css/bootstrap.css">
           <link rel="stylesheet" href="bootstrap-4.2.1-dist/bootstrap-4.2.1-dist/css/bootstrap-grid.min.css">
           <link rel="stylesheet" href="bootstrap-4.2.1-dist/bootstrap-4.2.1-dist/css/bootstrap-grid.css">
           <script>
               function fun()
			   {
				   document.getElementById("d3").style.display="block";
			   }
           </script>
           <style>
		   body
		   {
			   background-image:url(triangle.png);
			   
			   background-size:cover;
		   }
             #d1
			 {
				 position:absolute;
				 height:80%;
				 left:20%;
				 top:15%;
				 width:60%;
				 border-style:groove;
				 background-color:transparent;
			 }
			 #d3
			 {
				 position:absolute;
				 height:80%;
				 left:15%;
				 top:10%;
				 width:70%;
				 overflow:hidden;
				 border-style:groove;
				 background-color:#C93;
				 overflow:auto;
				 display:none;
				 
			 }
			 .button
			 {
				 height:60px;
				 width:80%;
				 text-align:center;
				 color:#FFF;
				 border-style:groove;
				 background-color:transparent;
				 border-width:1px;
				 cursor:pointer;
			 }
			 .button:hover
			 {
				 background-color:#F0F;
			 }
			 .d2 
		    {
			 position:absolute;
			 height:35%;
			 width:90%;
			left:5%;
			 background-color:#0F0;
		   }
		   #fm
		   {
			   text-align:center;
			   margin-top:10px;
		   }
		   form label
		   {
			   font-size:25px;
			   font-weight:600;
			   color:#FFF;
			 
		   }
		   form input
		   {
			   
			   border-style:none;
			   width:300px;
			   font-size:18px;
			   text-align:center;
			   background-color:transparent;
			   border-bottom-style:groove;
			   border-color:#FFF;
			   color:#FFF;
		   }
		   form select
		   {
			    padding-left:200px;
			    border-style:none;
			    color:#FFF;
				font-size:18px;
				text-align:center;
			    background-color:transparent;
			    border-bottom-style:groove;
			    border-color:#FFF;
			    border-bottom-width:2px;
		   }
		   form select option
		   {
			  
			   text-align:center;
			   background-color:#000;
			   color:#FFF;
		   }
		   form input[type="submit"]
		   {
			   border-style:groove;
			   color:#FFF;
			   padding-left:0px;
			   height:50px;
			   font-size:16px;
			   width:200px;
			   cursor:pointer;
		   }
		   form input[type="submit"]:hover
		   {
			   background-color:#F0F;
			   color:#000;
		   }
           </style>
       </head>
       <body>
            
            <form action="#" method="post"><button type="submit" name="out" class="form-control button" style="width:15%; float:right">Logout</button></form>
            <div id="d1">
              <form method="post" style="padding-top:2%"><center><button type="submit" name="sub1" class="form-control button" >Check Student Details</button></center></form>
              <center><button type="submit" onClick="fun()" class="form-control button">Update Student Marks</button></center>
              <form method="post" style="padding-top:2%"><center><button type="submit" name="sub2" class="form-control button">Check Student Marks</button></center></form>
              
              
              <center><form method="post"><button type="submit"  name="sem1" style="width:40%; margin-bottom:10px;" class="form-control button">Select Semester</button>
              <select name="sem" style="padding-top:5px" class="form-control button">
                     <option></option>
                       <option>1st</option>
                       <option>2nd</option>
                       <option>3rd</option>
                       <option>4th</option>
                       <option>5th</option>
                       <option>6th</option>
                       <option>7th</option>
                       <option>8th</option>
              </select>
              
              </form></center>
            </div>
            
            <div id="d3">
              <form  action="tech_home_marks.php"
             id="fm" style="text-align:center;"  method="post">
              <label style="text-shadow:8px 10px 12px #FF0000; text-decoration:underline; font-size:30px">Update Student Marks</label><br>
                  
                        <label>Id-Number:-</label><input type="text" name="t1"><br>
                        
                        
                        
                        <label>Select Branch:-</label>
                        <input type="text" name="t5" value="<?php echo $br; ?>" disabled>
                       <br>
                        <label>Select Semester</label>
                       <select name="t6">
                       <option></option>
                       <option>1st</option>
                       <option>2nd</option>
                       <option>3rd</option>
                       <option>4th</option>
                       <option>5th</option>
                       <option>6th</option>
                       <option>7th</option>
                       <option>8th</option>
                        </select><br>
                 

                        <label>Subject1:-</label><input type="text" name="t7"><br>
                        <label>Subject2:-</label><input type="text" name="t8"><br>
                        <label>Subject3:-</label><input type="text" name="t9"><br>
                        <label>Subject4:-</label><input type="text" name="t10"><br>
                        <label>Subject5:-</label><input type="text" name="t11"><br><br>
                        <input type="submit" name="t12" value="submit">
                 
              </form>
            </div>
       </body>
</html>
<?php

    $con=mysqli_connect("localhost","root","","marks_system");
	if(isset($_POST["sem1"]))
   {
	    $sm=$_POST["sem"];
	   $sql="select*from marks where branch='$br' and sem='$sm'";
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
  if(isset($_POST["sub1"]))
   {
	 
	   $sql="select*from stud_reg where branch='$br'";
	   $result=mysqli_query($con,$sql);
	   echo "<table border='1' align='center' style='background-color:#0F0;z-index:1' class='d2'>
	   <tr><th colspan='10' style='text-align:center'>Your Details</th></tr>
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
	 
  if(isset($_POST["sub2"]))
   {
	 
	 $bt=$_SESSION["d"];
	   $sql="select*from marks where branch='$bt'";
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
   if(isset($_POST["out"]))
{
	session_unset($check);
	session_destroy();
  header('location:movediv.html');
}
   ?>