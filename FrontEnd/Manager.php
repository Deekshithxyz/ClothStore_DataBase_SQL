<?php 
include('./dbconfig.php');
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Cashier</title>
	<style type="text/css">
		ul {
            list-style-type: none;
            border: 1px blue;
            margin: 0;
            padding: 0;
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
            background-color: Darkblue;
        }
        caption {
        	font-size: 200%;
        }
	</style>
</head>
<body style="margin: -8px">


	<ul>
		<li><a href="Manager.php" style="color: white;text-decoration:none">Home</a></li>
	    <li>Manager</li>
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
				<th>SID</th>
				<th>Name</th>	
				<th>PhoneNo</th>
				<th>Date</th>
			    <th>Time</th>
			</tr>

	<?php
		$query=mysqli_query($conn,"SELECT * FROM Supplier");
			while($row = mysqli_fetch_assoc($query))
			{
				$SID=$row['SID'];
				$Name=$row['Name'];
				$PhoneNo=$row['PhoneNo'];
				$Date=$row['Date'];
				$Time=$row['Time'];

				echo '<tr>' . '<td>';
			    echo $SID . '<br/>' . '<td>'.'</center>'.'<center>';
			    echo $Name . '<br/>' . '<td>'.'</center>'.'<center>';
				echo $PhoneNo. '<br/>' . '<td>'.'</center>'.'<center>';
				echo $Date. '<br/>' . '<td>'.'</center>'.'<center>';
				echo $Time . '<br/>' . '<td>'.'</center>'.'<center>';
		
			}
	?>
		</table>
	</center>

	<span>
		<button style="margin-left:30px;"  type="submit" onclick = "location.href = 'insert_supplier.php'" class ="btn btn-primary btn-lg" >ADD Supplier</button><br/>
	</span>

</body>
</html>
