<?php
session_start();
$check=$_SESSION["id"];
$br=$_SESSION["d"];
if(!$check)
{
  header("location:home.html");
}
echo "hello dear ".$check;
echo "you are ".$br;
 ?>
<html>
      <head>
        <link rel="stylesheet" href="bootstrap-4.2.1-dist/bootstrap-4.2.1-dist/css/bootstrap.css">
      </head>
      <body>
           <form action="trytechhome.php" method="post">
            enter id-number
            <input type="number" name="f1" /><br />
            enter roll number
            <input type="number" name="f2" /><br />
            enter name
            <input type="text" name="f3" /><br />
            <input type="text" name="f4" placeholder="b.tech"/>
            <br />
            <input type="text" name="f5" value="<?php echo $br; ?>"  disabled/><br />
            select semester
            <select name="f6">
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
                        <input type="text" name="f7" placeholder="sub1" /><br />
                        <input type="text" name="f8" placeholder="sub2" /><br />
                        <input type="text" name="f9" placeholder="sub3" /><br />
                        <input type="text" name="f10" placeholder="sub4" /><br />
                        <input type="text" name="f11" placeholder="sub5" /><br />
                        <input type="submit" name="f12" value="submit">
           </form>
           <form action="trytechhome.php" method="post"><input type="submit" name="ff2"></form>
      </body>
</html>
<?php

if(isset($_POST["f12"]))
	 {
		 $con=mysqli_connect("localhost","root","","marks_system");
		 $a=$_POST["f1"];
		  $b=$_POST["f2"];
		   $c=$_POST["f3"];
		    $d=$_POST["f4"];
			 $e=$_SESSION["d"];
			  $f=$_POST["f6"];
			   $g=$_POST["f7"];
			   $h=$_POST["f8"];
			    $i=$_POST["f9"];
				 $j=$_POST["f10"];
				  $k=$_POST["f11"];
				  $ttl=$g+$h+$i+$j+$k;
				  $pr=$ttl/5;
				  
	 $sql="insert into marks values($a,$b,'$c','$d','$e','$f',$g,$h,$i,$j,$k,$ttl,'$pr')";
	 mysqli_query($con,$sql);
	 }
	 
	 if(isset($_POST["ff2"]))
   {
	 $con=mysqli_connect("localhost","root","","marks_system");
	 $bt=$_SESSION["d"];
	   $sql="select*from marks where branch='$bt'";
	   $result=mysqli_query($con,$sql);
	   echo "<table border='1' align='center' style='background-color:#0F0;z-index:1' class='d2'>
	   <tr><th colspan='11' style='text-align:center'>Student Marks</th></tr>
	   <tr><th>Id_number</th><th>roll</th><th>name</th><th>course</th><th>branch</th><th>semester</th><th>sub1</th><th>sub2</th><th>sub3</th><th>sub4</th><th>sub5</th><th>total</th><th>precentage</th></tr>";
	   while($row=mysqli_fetch_array($result))
	   {
		   echo "
		   
		   <tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td>
		   <td>$row[4]</td><td>$row[5]</td><td>$row[6]</td><td>$row[7]</td><td>$row[8]</td><td>$row[9]</td><td>$row[10]</td><td>$row[11]</td></td><td>$row[12]</td>
		   </tr>";
	   }
	   echo "</table>";
   }
?>