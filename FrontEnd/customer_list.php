<?php 
include('./dbconfig.php');
session_start();
if(!isset($_SESSION['sess_user']))
 { 
header('Location:login.php');
 }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Purchase Items</title>
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
		<li><a href="Cashier.php" style="color: white;text-decoration:none">Home</a></li>
	    <li>Cashier</li>
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

			<caption>Purchase details</caption>
		    <!--YOUR TABLE HERE.... ONLY FROM <tr><td> with no div tag--> 
			<tr>
				<th>PID</th>
				<th>Cost</th>
				<th>Quantity</th>
			</tr>

	<?php
		$query=mysqli_query($conn,"SELECT * FROM cust_list WHERE CID=(SELECT MAX(CID) FROM Customer)");
			while($row = mysqli_fetch_assoc($query))
			{
				$PID=$row['PID'];
				$Cost=$row['Cost'];
				$Quantity=$row['Quantity'];


				
				echo '<tr>' . '<td>';
			    echo $PID . '<br/>' . '<td>'.'</center>'.'<center>';
				echo $Cost. '<br/>' . '<td>'.'</center>'.'<center>';
				echo $Quantity. '<br/>' . '<td>'.'</center>'.'<center>';


	
			}
	?>
		</table>



	</center>

	<span>
		<button style="margin-left:30px;"  type="submit" onclick = "location.href = 'insert_cust_list.php'" class ="btn btn-primary btn-lg" >Insert Item</button>
		<button style="margin-right:10px"  type="submit" onclick = "location.href = ' Print_for_customer.php'" class ="btn btn-primary btn-lg" >Next</button><br/>
	</span>

</body>
</html>
