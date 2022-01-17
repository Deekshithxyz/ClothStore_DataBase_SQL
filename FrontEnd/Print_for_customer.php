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
	<title>Purchased Items</title>
	<style type="text/css">
		.main ul {
            list-style-type: none;
            border: 1px blue;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: blue;
        }
        .main ul li {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 16px;

        }
        .main ul li:hover {
            background-color: Darkblue;
        }
        caption {
        	font-size: 200%;
        }
	</style>
</head>
<body style="margin: -8px">


	<div class="main">
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
	</div>
	<br>



	<center>
		<table cellspacing=0 border=1 width="1000" height="260" >

			<caption>Purchased details</caption>
		    <!--YOUR TABLE HERE.... ONLY FROM <tr><td> with no div tag--> 
			<tr>
				<th>Name</th>
				<th>Brand</th>
				<th>Size</th>
				<th>Cost</th>
				<th>Quantity</th>
			</tr>

	<?php
		$query=mysqli_query($conn,"select Product.Name,Product.Brand,Product.Size,cust_list.Cost,cust_list.Quantity from Product inner join cust_list on Product.PID = cust_list.PID where cust_list.CID=(select max(CID) from cust_list)");
			while($row = mysqli_fetch_assoc($query))
			{
				$Name=$row['Name'];
				$Brand=$row['Brand'];
				$Size=$row['Size'];
				$Cost=$row['Cost'];
				$Quantity=$row['Quantity'];

				
				echo '<tr>' . '<td>';
			    echo $Name . '<br/>' . '<td>'.'</center>'.'<center>';
			    echo $Brand . '<br/>' . '<td>'.'</center>'.'<center>';
			    echo $Size . '<br/>' . '<td>'.'</center>'.'<center>';
				echo $Cost. '<br/>' . '<td>'.'</center>'.'<center>';
				echo $Quantity. '<br/>' . '<td>'.'</center>'.'<center>';
			}

					$query1=mysqli_query($conn,"select * from Account where TID = (select MAX(CID) from Customer)");
			while($row = mysqli_fetch_assoc($query1))
			{
				$Tax=$row['Tax'];
				$Discount=$row['Discount'];
				$TotalCost=$row['TotalCost'];
				$Net=$row['Net'];
			}

	
	?>
		</table>



	</center>

	<div style="float: right; margin-right: 100px">
		<ul style="list-style-type: none;">
  			<li><font size="4"><b>Tax = </b><?php echo $Tax ?></font></li>
  			<li><font size="4"><b>Discount = </b><?php echo $Discount ?></font></li>
  			<li><font size="4"><b>Total Cost = </b><?php echo $TotalCost ?></font></li>
  			<li><font size="4"><b>NET = </b><?php echo $Net ?></font></li>
		</ul>
	</div>

	<span>
		<button style="margin-left:30px;"  type="submit" onclick = "location.href = 'Cashier.php'" class ="btn btn-primary btn-lg" >Finish</button><br/>
	</span>

</body>
</html>
