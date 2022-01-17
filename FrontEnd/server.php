<?php

include('./dbconfig.php');
session_start();

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
/*echo "Connected successfully";*/
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial;}

/* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: white;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 8px 16px;
  transition: 0.6s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
  background-color: white;
}

/* Style the close button */
.topright {
  float: right;
  cursor: pointer;
  font-size: 32px;
}

.topright:hover {color: red;}
.center{
  margin: -8px;
  background:light Grey; 
  color:Black;
  font-family: Courier,Sans-serif; 
  margin:-8px;
  padding: 2px 16px;
  height: 65;
}
</style>
</head>
<body style="background-image: url('dvvr5.jpg');background-size: 100%;background-repeat: no-repeat">
<div class="center"> 
<br><font size='+2.5'><b>DVVR CLOTHES STORE</b> </font></div>
<div class="tab" style= "margin: -8px">
  <button class="tablinks" onclick="openCity(event, 'Paris')"><b>Category</b></button>
  <button class="tablinks" onclick="openCity(event, 'Amsterdam')"><b>Transactions</b></button>
<?php 
  if(!isset($_SESSION['sess_user']))
  {
 ?>
    <button style="float:right;"><a href="login.php"><b>Login</b></a></button>
<?php   
  } else{
?>
    <button style="float:right;"><a href="logout.php">Logout</a></button>
<?php  
  }
 ?>
</div>


<div style="margin: -8px" id="Paris" class="tabcontent">
  <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
  <style>
  a:link {
  color: green;
  background-color: transparent;
  text-decoration: none;
 } 
  </style>

<?php
    $query=mysqli_query($conn,"SELECT DISTINCT(Category) FROM Category");
      while($row = mysqli_fetch_assoc($query))
      {
        $Category=$row['Category'];
?>
        <a href="customerhome.php?Category=<?php echo $Category?>" ><br><font color="black"><br><?php echo $Category?></font></a>
<?php        
      }
?>

</div>

<div style="margin: -8px" id="Amsterdam" class="tabcontent">
  <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
  <style>
  a:link {
  color: green;
  background-color: transparent;
  text-decoration: none;
  display: block;
 } 
  </style>
<a href="accounthome.php" ><br><font color="black"><br>Employee Transaction</font></a>
<a href="suppliertransaction.php" ><br><font color="black"><br>Supplier Transaction</font></a>
<a href="customertransaction.php" ><br><font color="black"><br>customer Transaction</font></a>
</div>

<div > </div>
<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
   
</body>
</html> 

