<?php
session_start();
$checked=$_SESSION["id"];
$ff=$_SESSION["d1"];
if(!$checked)
{
  header("location:movediv.html");
}
echo "<h2 style='font-size:34px; color:white; text-align:center; text-decoration:underline; text-shadow:2px 2px 4px red'>Hello dear .$checked</h2>";

?>

<html>
     <head><title>student home</title>
     <script>
     function fun1()
				{
					document.getElementById("hd").style.display="none";
					document.getElementById("ch").style.display="none";
					document.getElementById("cd").style.display="none";
					document.getElementById("bt").style.display="none";
					window.print("dd");  
				}
					</script>
     <style>
	 
	 body
	 {
		 background-image:url(105093.jpg);
		 background-size:100% 100%;
	 }
         #d1
		 {
			 position:absolute;
			 height:70%;
			 width:60%;
			 top:10%;
			 left:20%;
			 
			 
		 }
		 legend
		 
             {
              font-size: 25px;
              text-align: center;
			  color:#FFF;
             }

		 
		 form
		 {
			 text-align:center;
		 }
		 form label
		 {
			 font-size:18px;
			 color:#FFF;
		 }
		 form input
		 {
			 height:38px;
			 width:300px;
			 border:none;
			 text-align:center;
			 border-bottom-style:ridge;
			 background-color:transparent;
			 border-width:2px;
			 border-color:#FFF;
			 color:#FFF;
		 }
		 form input[type="submit"]
		 {
			 border-style:ridge;
			 border-width:1px;
			 border-color:#FFF;
			 cursor:pointer;
			 color:#FFF;
		 }
		 form input[type="submit"]:hover
		 {
			 background-color:#CCC;
		 }
		 form select
		 {
			 height:38px;
			 width:300px;
			 border:none;
			 color:#FFF;
			 text-align:center;
			 padding-left:130px;
			 border-bottom-style:ridge;
			 background-color:transparent;
			 border-width:2px;
			 border-color:#FFF;
			 cursor:pointer;
		 }
		 form select option
		 {
			 color:#FFF;
			 background-color:#000;
		 }
		 .d2 
		 {
			 position:absolute;
			 height:30%;
			 width:70%;
			left:5%;
			padding:15%;
			 background-color:#0F0;
		 }
		 #dd 
		 {
			 position:absolute;
			 width:70%;
			left:15%;
			 background-color:#FF0;
		 }
		 #ch
		 {
			 border-color:#FFF;
		 }
     </style>
     </head>
     <body>
         <form  action="#" method="post" id="hd"><input type="submit" value="Log-out" style="height:40px; width:120px; float:right; border-color:#F00" name="logout" ></form>
         <div id="d1">
         <form method="post" action="stud_home.php" id="ch" style="background-color:rgba(0,0,0,0.5)">
          <fieldset style="border-color:#FFF; border-width:2px; border-style:ridge">
             <legend>Check your Result</legend>
            
                 <label>Your Id-Number</label><br>
                 <input type="text" name="f1"  value="<?php echo $ff; ?>" disabled><br>
                 <label>Select Semester</label><br>
                 <select name="f2">
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
                 
                 <br><br>
                 <input type="submit" value="Sumit" name="sub" onClick="fun2()">
            
          </fieldset>
          </form>
          
          
          <form action="stud_home.php" method="post" id="cd" style="background-color:rgba(0,0,0,0.5)">
          <fieldset style="border-color:#FFF; border-width:2px; border-style:ridge">
             <legend>Check your Details</legend>
            
                 <label>Your Id-Number</label><br>
                 <input type="text" name="f21" value="<?php echo $ff; ?>" disabled><br>
                 
                 <br><br>
                 <input type="submit" value="Sumit" name="sub1" onClick="fun()">
            
          </fieldset>
          </form>
          </div>
          <input type="button" id="bt" onClick="fun1()" value="print-Result" style="height:40px; width:120px; font-size:18px;">
     </body>
     
</html>
<?php
     $con=mysqli_connect("localhost","root","","marks_system");
  if(isset($_POST["sub1"]))
   {
	   
	   $sql="select*from stud_reg where id_num='$ff'";
	   $result=mysqli_query($con,$sql);
       $count=mysqli_num_rows($result);
	   if($count>0)
	   {
		 
	   $sql="select*from stud_reg where id_num='$ff'";
	   $result=mysqli_query($con,$sql);
	   echo "<table border='1' align='center' class='d2'>
	   <tr><th colspan='11'>Your Details</th></tr>
	   <tr><th>id-number</th><th>name</th><th>father's name</th><th>email-id</th><th>mobile_number</th><th>course</th><th>branch</th><th>gender</th><th>address</th><th>username</th><th>password</th></tr>";
	   while($row=mysqli_fetch_array($result))
	   {
		   echo "
		   
		   <tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td>
		   <td>$row[4]</td><td>$row[5]</td><td>$row[6]</td><td>$row[7]</td><td>$row[8]</td><td>$row[9]</td><td>$row[10]</td>
		   </tr>";
	   }
	   echo "</table>";
   }
    
	   else
	   {
		    echo "<script>alert('please enter valid mobile number')</script>";
	   }
   }
   
   
   if(isset($_POST["sub"]))
   {
	   
	   $b=$_POST["f2"];
	   $sql="select*from marks where id_num='$ff' and sem='$b'";
	   $result=mysqli_query($con,$sql);
       $count=mysqli_num_rows($result);
	   if($count>0)
	   {
		 
	   $sql="select*from marks where id_num='$ff' and sem='$b'";
	   $result=mysqli_query($con,$sql);
	   echo "<table border='1' align='center' style='background-color:;padding:80px;z-index:1' id='dd'>
	   <tr><th colspan='2'>Your result</th></tr>
	   "
	   ;
	   while($row=mysqli_fetch_array($result))
	   {
		   echo "
		   
	   <tr><th>id-number</th><td>$row[0]</td></tr><tr><th>name</th><td>$row[1]</td></tr><tr><th>course</th><td>$row[2]</td></tr><tr><th>branch</th><td>$row[3]</td></tr><tr><th>sem</th><td>$row[4]</td></tr><tr><th>sub1</th><td>$row[5]</td></tr><tr><th>sub2</th><td>$row[6]</td></tr><tr><th>sub3</th><td>$row[7]</td></tr><tr><th>sub4</th><td>$row[8]</td></tr><tr><th>sub5</th><td>$row[9]</td></tr><tr><th>total-number</th><td>$row[10]</td></tr><tr><th>precentage</th><td>$row[11]</td></tr>
		   </table>
		   ";
	   }
	   echo "";
   }
    
	   else
	   {
		    echo "<script>alert('please enter valid id-number and sem')</script>";
	   }
   }
   if(isset($_POST["logout"]))
{
	session_unset($check);
	session_destroy();
  header('location:movediv.html');
}
   ?>