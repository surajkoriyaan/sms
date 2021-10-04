
<html>
     <head>
     <link rel="stylesheet" href="bootstrap-4.2.1-dist/bootstrap-4.2.1-dist/css/bootstrap.css">
     <link rel="stylesheet" href="bootstrap-4.2.1-dist/bootstrap-4.2.1-dist/css/bootstrap-grid.min.css">
     <link rel="stylesheet" href="bootstrap-4.2.1-dist/bootstrap-4.2.1-dist/css/bootstrap-grid.css">
     <style>
	 body
	 {
		 background-image:url(notebook.jpg);
		 background-size:100% 100%;
	 }
	  #d1
	  {
		  position:absolute;
		  height:180%;
		  width:80%;
		  left:10%;
		  top:5%;
		  background-color:rgba(0,0,0,.6);
	  }
	  form
	  {
		  
		  padding-top:5%;
	  }
          form label
		  {
			  font-size:24px;
			  font-weight:600;
			  color:#F0F;
		  }
		  form input
		  {
			  height:40px;
			  width:300px;
			  background-color:transparent;
			  border:none;
			  border-bottom:thin;
			  color:#FFF;
			  border-bottom-style:groove;
		  }
		  form select
		  {
			  height:40px;
			  width:300px;
			  background-color:transparent;
			  color:#FFF;
			  border:none;
			  border-bottom-style:groove;
			  border-bottom-width:thin;
		  }
		  form select option
		  {
			  background-color:#999;	
		  }
		  form input[type="submit"]
		  {
			  border-style:groove;
			  cursor:pointer;
		  }
		  form input[type="radio"]
		  {
			  height:20px;
			  width:20px;  
		  }
		  form textarea
		  {
			  height:40px;
			  width:300px;
			  background-color:transparent;
			  color:#FFF;
			  border:none;
			  border-bottom-style:groove;
			  border-bottom-width:thin;
		  }
     </style>
   
     </head>
     <body>
            <button style="float:right"><a href="movediv.html">Go To Home</a></button>
           <div id="d1">
           <h1 style="color:#CCC; text-align:center; text-shadow:4px 8px 10px #FF00FF; text-decoration:underline">Student Addmission Form</h1>
           <center><form action="stud_reg.php" method="post">
                <label>Enter name:-</label><br>
                <input type="text" name="f1"><br>
                <label>Fathers/Mothers Name:-</label><br>
                <input type="text" name="f2"><br>
                <label>Email-Id:-</label><br>
                <input type="email" name="f3"><br>
                <label>Mobile Number</label><br>
                <input type="text" name="f4"><br>
                <label>Select Courses:-</label><br>
                <select name="f5"><br>
                        <option></option>
                        <option>B.TECH</option>
                </select>
                <br><label>Select Branch:-</label><br>
                <select name="f6"><br>
                      <option></option>
                      <option>cse</option>
                      <option>me</option>
                      <option>eee</option>
                      <option>ce</option>
                </select><br><br>
                <label>seelect gender:-</label><br>
                <input type="radio" name="f7" value="male" checked><label style="padding-right:25px;">Male</label><input type="radio" name="f7" value="female"><label>Female</label><br>
                <label>Address:-</label><br>
                <textarea name="f8"></textarea><br>
                       <label>Username</label><br>
                       <input type="text" name="f9"><br>
                       <label>Password</label><br>
                       <input type="password" name="f10"><br><br>
                <input type="submit" name="sub">
           </form></center>
           </div>
     </body>
</html>
<?php
  $con=mysqli_connect("localhost","root","","marks_system");
 if(isset($_POST["sub"]))
 {
	 $a=$_POST["f1"];
	 $b=$_POST["f2"];
	 $c=$_POST["f3"];
	 $d=$_POST["f4"];
	 $e=$_POST["f5"];
	 $f=$_POST["f6"];
	 $g=$_POST["f7"];
	 $h=$_POST["f8"];
	 $i=$_POST["f9"];
	 $j=$_POST["f10"];
	 $sql="select * from stud_reg where username='$i'";
  $result=mysqli_query($con,$sql);
  $count=mysqli_num_rows($result);
  if($count>0)
  {
	echo "<script>alert('this username is already exist please select another one');</script>";
  }
   else
   {
	if($a=="" || $b=="" || $c=="" || $d=="" || $e=="" || $f=="" || $g=="" || $h=="" || $i=="" || $j=="")
	 {
		 echo "<script>alert('please fill all details in the form')</script>";
	 }
	 else
	 {
   	 
 $sql1="insert into stud_reg(name,fathers_name,email_id,mobile_number,course,branch,gender,address,username,password) values('$a','$b','$c','$d','$e','$f','$g','$h','$i','$j')";
	 mysqli_query($con,$sql1);
	 
	 echo"<script>alert('registration successfully')</script>";
	 }
	 }
 }
?>
