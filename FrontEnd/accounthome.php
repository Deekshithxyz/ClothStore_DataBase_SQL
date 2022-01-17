<?php 
include('./dbconfig.php');
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Products</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
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
	    <li><a href="server.php" style="color: white;text-decoration:none">Home</a></li>
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

<div>
	<span class="sendright" style="float: right; margin-right: 100px">
		<form class="search" action="accounthome.php" method="post">
			<tr>
				<td width="116">Employee Name:</td>
				<td><input type="text" name="Name" required ></td>
			</tr> 
			<tr>
				<td width="116">ID:</td>
				<td><input type="text" name="EID" required ></td>
			</tr> 
			<button type="submit" name="btn-search" class ="btn btn-primary">GO</button>
		</form>
	</span>
</div>



<?php
	if(isset($_POST['btn-search']))
	{
 ?>

	<center>
		<table cellspacing=0 border=1 width="1000" height="260" >

			<caption>Account details</caption>
		    <!--YOUR TABLE HERE.... ONLY FROM <tr><td> with no div tag--> 
			<tr>
				<th>TID</th>
				<th>Date</th>
			    <th>Time</th>
			    <th>Net</th>
			    <th>Salary</th>
			</tr>

	<?php
		$EID = $_POST['EID'];
		$Name = $_POST['Name'];
		$result = mysqli_query($conn,"SELECT * FROM Employee WHERE EID ='$EID' and Name ='$Name'");
		if(mysqli_num_rows($result) > 0)
		{
			$query=mysqli_query($conn,"SELECT * FROM Account WHERE EID ='$EID'");
			while($row = mysqli_fetch_assoc($query))
			{
				$TID=$row['TID'];
				$Date=$row['Date'];
				$Time=$row['Time'];
				$Net=$row['Net'];
				$Salary=$row['Salary'];


				echo '<tr>' . '<td>';
			    echo $TID . '<br/>' . '<td>'.'</center>'.'<center>';
				echo $Date . '<br/>' . '<td>'.'</center>'.'<center>';
				echo $Time . '<br/>' . '<td>'.'</center>'.'<center>';
				echo $Net. '<br/>' . '<td>'.'</center>'.'<center>';
				echo $Salary . '<br/>' . '<td>'.'</center>'.'<center>';
		
		
			}
		}
		
	?>
		</table>
	</center>

<?php 
}
 ?>


</body>
</html>
