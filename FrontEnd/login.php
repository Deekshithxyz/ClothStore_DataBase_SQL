<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Login</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group ">
                <label>Username</label>
                 <input type="char" name="user" placeholder="user">
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="char" name="password" placeholder="password">

            </div>
            
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
        </form>
    </div>    
</body>
</html>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $user = $_POST["user"];
    $password = $_POST["password"];

    if (empty($user) || empty($password)) {
        echo "user and password entry can't be empty";
    }
    else{
        include('./dbconfig.php');
        echo $user;
        $sql = "SELECT * from userlogin WHERE user LIKE '{$user}' AND password LIKE '{$password}' LIMIT 1";
        $result = mysqli_query($conn, $sql);
        if (!$result)
        {
            die("query failed.");
        }

echo $user;
session_start();
$_SESSION["sess_user"] = $user;

        if (mysqli_num_rows($result) === 0)
        {
            $errors = "User Doesn't Exist ";
            echo $errors;
        }
        switch ($user) {
            case "admin":
                header('location: Admin.php');
                break;
            case "manager":
                header('location: Manager.php');
                break;
            case "cashier":
                header('location: Cashier.php');
                break;
            default:
                header('location: server.php');
        }
    }
}
?>
