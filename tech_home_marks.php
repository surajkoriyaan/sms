 <?php
 session_start();
 $con=mysqli_connect("localhost","root","","marks_system");
     if(isset($_POST["t12"]))
	 {
		 $a=$_POST["t1"];
		  
			$e=$_SESSION["d"];
			  $f=$_POST["t6"];
			   $g=$_POST["t7"];
			   $h=$_POST["t8"];
			    $i=$_POST["t9"];
				 $j=$_POST["t10"];
				  $k=$_POST["t11"];
				  $ttl=$g+$h+$i+$j+$k;
				  $pr=$ttl/5;
				  if($a==""  ||  $e=="" || $f=="" || $g=="" || $h=="" || $i=="" || $j=="" || $k=="" )
	 {
		 echo "<script>alert('please enter all fields')</script>";
	 }
	 else
	 {
      $sql1="select * from stud_reg where id_num='$a' and branch='$e'";
     $result=mysqli_query($con,$sql1);
     $count=mysqli_num_rows($result);
     if($count>0)
  {
    while($row=mysqli_fetch_array($result))
    {
      $_SESSION["ida"]=$row[1];
	  $_SESSION["db"]=$row[5];
    }
	$sql1="select * from marks where sem='$f' and id_num='$a'";
     $result=mysqli_query($con,$sql1);
     $count=mysqli_num_rows($result);
     if($count>0)
	{
		echo "<script>
		   alert('This semester marks are already updated');
		  </script>";
	}
	else
	{
	$n=$_SESSION["ida"];
	$m=$_SESSION["db"];
	 $sql="insert into marks values('$a','$n','$m','$e','$f',$g,$h,$i,$j,$k,$ttl,'$pr')";
	 mysqli_query($con,$sql);
	 header('location:tech_home.php');
	echo "<script>windows.location('tech_home.php');</script>";
	 }}
	 else
	 {
		  echo "<script>
		   alert('Id-Number are not match');
		  </script>";
		  
	 }
	 
	 }
	 
	 }
	 
	 ?>