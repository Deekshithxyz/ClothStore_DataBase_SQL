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
	$Name=$_POST['Name'];
	$Brand=$_POST['Brand'];
  $Size=$_POST['Size'];
	$SID=$_POST['SID'];
	$SCost=$_POST['SCost'];
	$Quantity=$_POST['Quantity'];

	$sql = "INSERT INTO supp_list(PID,Name,Size,Brand,SID,SCost,Quantity)
	VALUES ('$PID','$Name','$Size','$Brand','$SID','$SCost','$Quantity')";


	if($conn->query($sql) === TRUE) 
	{
	 ?>
			<script>
			alert('successfully uploaded');
	        window.location.href='supplier_list.php?success';
	        </script>
			<?php
	} 
	else 
	{
	    ?>
			<script>
			alert('error while uploading file');
	        window.location.href='supplier_list.php?fail';
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
	<title>Supplier list</title>
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
	    <li>manager</li>
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
		<form action="insert_supp_list.php" method="post" enctype="multipart/form-data">
		  <div class="table-sec">
			<table cellspacing=0  width="648" height="260" >
						 
			<tr>
				<td>Supplier ID:</td>
				<td><input type="text" name="SID" class="hiii" id="t0" required ></td>
			</tr>

			<tr>
				<td>Product ID:</td>
				<td><input type="text" name="PID" class="hiii" id="t0" onkeyup="captitalize(this)" required>
			    </td>
			</tr>
			<tr>   
			 	<td>Name</td>
				<td><input type="text" name="Name" class="hiii" id="t0" required >
				</td>   
			</tr>
			<tr>   
			 	<td>Size</td>
				<td><input type="text" name="Size" class="hiii" id="t0" required >
				</td>   
			</tr>
			<tr>   
			 	<td>Brand</td>
				<td><input type="text" name="Brand" class="hiii" id="t0" required >
				</td>   
			</tr>
			<tr>   
			 	<td>SCost</td>
				<td><input type="number" name="SCost" class="hiii" id="t0" required >
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
