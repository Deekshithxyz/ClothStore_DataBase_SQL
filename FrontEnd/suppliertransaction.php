<?php 
include('./dbconfig.php');
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Supplier Transaction</title>
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
	    <li>Transaction</li>
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
		<form class="search" action="suppliertransaction.php" method="post">
			<tr>
				<td width="116">Supplier Name:</td>
				<td><input type="text" name="Name" required ></td>
			</tr> 
			<tr>
				<td width="116">ID:</td>
				<td><input type="text" name="SID" required ></td>
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

			<caption>Product details</caption>
		    <!--YOUR TABLE HERE.... ONLY FROM <tr><td> with no div tag--> 
			<tr>
				<th>PID</th>
				<th>Name</th>	
				<th>Size</th>
				<th>Brand</th>
			    <th>SCost</th>
			    <th>Quantity</th>
			</tr>

	<?php
		$SID = $_POST['SID'];
		$Name = $_POST['Name'];
		$result = mysqli_query($conn,"SELECT * FROM Supplier WHERE SID ='$SID' and Name ='$Name'");
		if(mysqli_num_rows($result) > 0)
		{
			$query=mysqli_query($conn,"SELECT * FROM supp_list WHERE SID ='$SID'");
			while($row = mysqli_fetch_assoc($query))
			{
				$PID=$row['PID'];
				$Name=$row['Name'];
				$Size=$row['Size'];
				$Brand=$row['Brand'];
				$SCost=$row['SCost'];
				$Quantity=$row['Quantity'];

				echo '<tr>' . '<td>';
				echo $PID . '<br/>' . '<td>'.'</center>'.'<center>';
			    echo $Name . '<br/>' . '<td>'.'</center>'.'<center>';
				echo $Size. '<br/>' . '<td>'.'</center>'.'<center>';
				echo $Brand. '<br/>' . '<td>'.'</center>'.'<center>';
				echo $SCost . '<br/>' . '<td>'.'</center>'.'<center>';
				echo $Quantity. '<br/>' . '<td>'.'</center>'.'<center>';
		
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
