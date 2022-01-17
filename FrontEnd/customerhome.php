<?php 
include('./dbconfig.php');
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Products</title>
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
<body style="margin: -8px" style="background-image: url('jeans.JPG');background-size: 100%;background-repeat: no-repeat">


	<ul>
	    <li><a href="server.php" style="color: white;text-decoration:none">Home</a></li>
	    <li>Products</li>
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

			<caption>Product details</caption>
		    <!--YOUR TABLE HERE.... ONLY FROM <tr><td> with no div tag--> 
			<tr>
				<th>Name</th>	
				<th>Size</th>
				<th>Brand</th>
			    <th>Cost</th>
			</tr>

	<?php
		$Category = $_GET["Category"];
		$query=mysqli_query($conn,"SELECT * FROM Product WHERE Category='$Category'");
			while($row = mysqli_fetch_assoc($query))
			{
				$PID=$row['PID'];
				$Name=$row['Name'];
				$Size=$row['Size'];
				$Brand=$row['Brand'];
				$Cost=$row['Cost'];

				echo '<tr>' . '<td>';
			    echo $Name . '<br/>' . '<td>'.'</center>'.'<center>';
				echo $Size. '<br/>' . '<td>'.'</center>'.'<center>';
				echo $Brand. '<br/>' . '<td>'.'</center>'.'<center>';
				echo $Cost . '<br/>' . '<td>'.'</center>'.'<center>';
		 
			}
	?>
		</table>
	</center>


</body>
</html>
