<?php 
include('./dbconfig.php');
session_start();
if(!isset($_SESSION['sess_user']))
 { 
header('Location:login.php');
 }

if(isset($_POST['btn-upload']))
{
	$PID=$_POST['PID'];
	$CID=$_POST['CID'];
	$Cost=$_POST['Cost'];
	$Quantity=$_POST['Quantity'];

	$sql = "INSERT INTO cust_list(CID,PID,Quantity,Cost)
	VALUES ('$CID','$PID','$Quantity','$Cost')";


	if($conn->query($sql) === TRUE) 
	{
	 ?>
			<script>
			alert('successfully uploaded');
	        window.location.href='customer_list.php?success';
	        </script>
			<?php
	} 
	else 
	{
	    ?>
			<script>
			alert('error while uploading file');
	        window.location.href='customer_list.php?fail';
	        </script>
			<?php
	}
	$conn->close();
}



?>

<?php 
// session_start(); 
// if(!isset($_SESSION['sess_user']))
//  { 
// header('Location:../login/testlogin.php');
//  } 
?>

<!DOCTYPE html>
<html>
<head>
	<title>Customer list</title>
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
		<form action="insert_cust_list.php" method="post" enctype="multipart/form-data">
		  <div class="table-sec">
			<table cellspacing=0  width="648" height="260" >
						 
			<tr>
				<td>Customer ID:</td>
				<td><input type="text" name="CID" class="hiii" id="t0" required ></td>
			</tr>

			<tr>
				<td>Product ID:</td>
				<td><input type="text" name="PID" class="hiii" id="t0" onkeyup="captitalize(this)" required>
			    </td>
			</tr>

			<tr>   
			 	<td>Cost</td>
				<td><input type="number" name="Cost" class="hiii" id="t0" required >
				</td>   
			</tr>

			<tr>
				<td>Quantity</td>
			    <td><input type="number" name="Quantity" class="hiii" id="t0" onkeyup="captitalize(this)" required>
			    </td>
			</tr>

			<!-- here you displaying the dropdown list -->



			<tr><th></th><th>
			
			<button type="upload" name="btn-upload" class ="btn btn-primary btn-lg">Submit</button>&nbsp;&nbsp;&nbsp;

			</th></tr>
				
				
			</table>
		  </div>
		</form>
	</center>
	  <br/>


</body>
</html>
