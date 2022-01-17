<?php 
error_reporting(E_ALL);
include('./dbconfig.php');
if(!isset($_SESSION['sess_user']))
 { 
header('Location:login.php');
 }
session_start();

if(isset($_GET['SID']))
  	{
		$SID=$_GET['SID'];
		$getselect=mysqli_query($conn,"SELECT * FROM Supplier WHERE SID ='$SID'");
		$profile=mysqli_fetch_assoc($getselect);
		$SID=$profile['SID'];
		$Name=$profile['Name'];
		$Cost=$profile['Cost'];  
  	}


if(isset($_POST['submit']))
	{    
		$id2=$_POST['SID'];  
		$Name=$_POST['Name'];
		$Cost=$_POST['Cost'];
	
		if(true)
		{
	    $sql="UPDATE Supplier SET 
	        Name='$Name', 
			Cost='$Cost'
				WHERE SID='$id2'";
			$result=mysqli_query($conn,$sql);
			if($result)
			{
				?>
				<script>
				alert('successfully uploaded');
		        window.location.href='supplierhome.php?success';
		        </script>
				<?php
			}
			else
			{
				?>
				<script>
				alert('error while uploading file');
		        window.location.href='supplierhome.php?fail';
		        </script>
				<?php
			}
		
		}
		else
		{
			?>
				<script>
				alert('error  uploading file');
		        window.location.href='supplierhome.php?fail';
		        </script>
				<?php
		}
	}



?>






<?php 
// session_start(); 
// if(!isset($_SESSION['sess_user']))
//  { 
// header('Location:../login.php');
//  } 
?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Supplier</title>
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
	<table width="800">
		<form action="edit_supplier.php" method="post"  id="importFrm" enctype="multipart/form-data">
			<div class="table-sec">
 			<table cellspacing=0  width="648" height="260" >
				<tr>
					<th width="116">Name: </th>
					<th>
						<input type="text" name="Name" value="<?php echo $Name;?>" style="width:460px;"/>
						<input type="hidden" name="SID" value="<?php echo $SID;?>"  required >
					</th>
				</tr>

				<tr>  
					<td width="116">Cost</td>
					<td><input type="number" name="Cost" class="hiii" id="t0" value="<?php echo $Cost;?>"  required >
					</td>   
				</tr>
   
                
	
<tr><th>	
                
</th>	<th>

                     &nbsp;<input type="submit"  name="submit" class="btn btn-primary btn-lg" >
</a></td>			  
 
 
  </tr>
  </table>
</center>
	</form>
 		

</body>
</html>
