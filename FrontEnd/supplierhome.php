<?php 
include('./dbconfig.php');
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Suppliers</title>
	<style type="text/css">
		ul {
            list-style-type: none;
            border: 1px blue;
            margin: 0px;
            padding: 0px;
            overflow: hidden;
            background-color: blue;
        }
        ul li {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 16px;
 
        }
        ul li:hover {
            background-color: darkblue;
        }
        caption {
        	font-size: 200%;
        }
	</style>
</head>


<?php 
// session_start(); 
// if(!isset($_SESSION['sess_user']))
//  { 
// header('Location:../login.php');
//  } 
?>

<body style="margin: -8px">


	<ul>
		<li><a href="server.php" style="color: white;text-decoration:none">Home</a></li>
	    <li>Suppliers</li>
<?php 
  if(!isset($_SESSION['sess_user']))
  {
?>
 		<li style="float: right;"><a href="login.php" style="color: white;text-decoration:none">Login</a></li>
<?php   
  } else{
?>
		<li style="float: right;"><a href="logout.php" style="color:white;text-decoration:none">Logout</a></li>
<?php  
  }
?>
	</ul>
	<br>



	<center>
		<table cellspacing=0 border=1 width="1000" height="260" >

			<caption>Supplier details</caption>
		    <!--YOUR TABLE HERE.... ONLY FROM <tr><td> with no div tag--> 
			<tr>
				<th>Name</th>
			    <th>Date</th>
			    <th>Time</th>
			    <th>PhoneNo</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>

	<?php
		$query=mysqli_query($conn,"SELECT * FROM Supplier");
			while($row = mysqli_fetch_assoc($query))
			{
				$SID=$row['SID'];
				$Name=$row['Name'];
				$Date=$row['Date'];
				$Time=$row['Time'];
				$PhoneNo=$row['PhoneNo'];


				echo '<tr>' . '<td>';
			    echo $Name . '<br/>' . '<td>'.'</center>'.'<center>';
			    echo $Date . '<br/>' . '<td>'.'</center>'.'<center>';
			    echo $Time . '<br/>' . '<td>'.'</center>'.'<center>';
				echo $PhoneNo . '<br/>' . '<td>'.'</center>'.'<center>';
		
				echo"<a href=\"edit_supplier.php?SID=$row[SID]\"><img src=\"ee.png\" height=\"25\"></a>
				<td><a href=\"delete_supplier.php?SID=$row[SID]\"><img src=\"dd.png\" height=\"25\" onClick=\"return confirm('Are you sure you want to delete?')\"></a></td>"; 
			}
	?>
		</table>
	</center>

	<button style="margin-left:30px;"  type="submit" onclick = "location.href = 'insert_supplier.php'" class ="btn btn-primary btn-lg" >Add Supplier</button><br/>

</body>
</html>
