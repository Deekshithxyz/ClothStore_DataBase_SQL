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
	<title>Warehouse</title>
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

			<caption>Warehouse</caption>
		    <!--YOUR TABLE HERE.... ONLY FROM <tr><td> with no div tag--> 
			<tr>
				<th>PID</th>
				<th>Name</th>	
				<th>Size</th>
				<th>Brand</th>
				<th>SID</th>
				<th>SCost</th>
				<th>Quantity</th>
			</tr>

	<?php
		$query=mysqli_query($conn,"SELECT * FROM supp_list WHERE SID=(SELECT MAX(SID) FROM Supplier)");
			while($row = mysqli_fetch_assoc($query))
			{
				$PID=$row['PID'];
				$Name=$row['Name'];
				$Size=$row['Size'];
				$Brand=$row['Brand'];
				$SID=$row['SID'];
				$SCost=$row['SCost'];
				$Quantity=$row['Quantity'];


				
				echo '<tr>' . '<td>';
			    echo $PID . '<br/>' . '<td>'.'</center>'.'<center>';
			    echo $Name . '<br/>' . '<td>'.'</center>'.'<center>';
				echo $Size. '<br/>' . '<td>'.'</center>'.'<center>';
				echo $Brand. '<br/>' . '<td>'.'</center>'.'<center>';
				echo $SID . '<br/>' . '<td>'.'</center>'.'<center>';
				echo $SCost . '<br/>' . '<td>'.'</center>'.'<center>';
				echo $Quantity . '<br/>' . '<td>'.'</center>'.'<center>';


	
			}
	?>
		</table>

		<form action="insert_product.php" method="post">
			
		</form>


	</center>

	<span>
		<button style="margin-left:30px;"  type="submit" onclick = "location.href = 'insert_supp_list.php'" class ="btn btn-primary btn-lg" >Insert Item</button>
		<button style="margin-right:10px"  type="submit" onclick = "location.href = 'Print_for_supplier.php'" class ="btn btn-primary btn-lg" >Next</button><br/>
	</span>

</body>
</html>
