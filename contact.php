<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact & Support</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <h2 class="my-5">User : <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>.</h2>
    <h1 class="h1" style="font-style: italic;">... Contact & Support ...</h1>
    
</body>
</html>
<?php
$conn=new PDO('mysql:host=localhost; dbname=demo', 'root', '') or die(mysql_error());
if(isset($_POST['submit'])!=""){

  $msg=$_POST['msg'];
  $username=htmlspecialchars($_SESSION["username"]);

  $chk = $conn->query("SELECT * FROM  contact where username = '$username';")->rowCount();

 /* if($chk){
    $i = 1;
    $c = 0;
    while($c == 0){
        $i++;
        
        $chk2 = $conn->query("SELECT * FROM  contact where username = '$username';")->rowCount();
        if($chk2 == 0){
            $c = 1;
        }
    }
}*/
 
 $username=htmlspecialchars($_SESSION["username"]);
 if(true){
$query=$conn->query("insert into contact(username,message)values('$username','$msg')");
    if($query){
    header("location:contact.php");
    }
    else{
    die(mysql_error());
    }
 }
}
?>
<html>
<head>

        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="screen">
        <link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
</head>
    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/bootstrap.js" type="text/javascript"></script>
    
    <script type="text/javascript" charset="utf-8" language="javascript" src="js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf-8" language="javascript" src="js/DT_bootstrap.js"></script>

<style>
</style>
<body>
        <div class="row-fluid">
            <div class="span12">
                <div class="container">
       
        <h4><p class="alert alert-success">Send any query from here ..</p></h4> 

            <form enctype="multipart/form-data" action="" name="form" method="post">
                <input type="textarea" name="msg" id="msg" class="form-control" style="padding: 30px" /></td><br>
            <input class="btn btn-primary" type="submit" name="submit" id="submit" value="Send Report" />
                    
            </form>
        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
            <thead>
                <tr>
                    <th width="60%" align="center">Sent Queries</th>
                    <th align="center">Reply from Admin</th>
                    <th align="center">Action</th>  
                </tr>
            </thead>
            <?php
            $username=htmlspecialchars($_SESSION["username"]);
            $query=$conn->query("SELECT * FROM `contact` WHERE `username`='$username';");
            while($row=$query->fetch()){
                $msg=$row['message'];
                $reply=$row['reply'];
            ?>
            <tr>
                <td>
                    &nbsp;<?php echo $msg ;?>
                </td>
                <td>
                    &nbsp;<?php echo $reply ;?>
                </td>
                <td><a href="contact.php?id=<?php echo $row['id'] ?>"class="btn btn-danger" onclick="DeleteConfirm()">Delete</a>
                </td>
                <script>
                   function DeleteConfirm() {
                   confirm("Are you sure to delete the record");
                    }
                </script>
            </tr>
            <?php }?>
        </table>
        <br>
        <p>
        <a href="welcome.php" class="btn btn-danger ml-3">Home Page</a>
        <a href="logout.php" class="btn btn-danger ml-1">Log Out</a>
    </p>
    </div>
    </div>
    </div>
</body>
</html>
<?php 
$hostName = "localhost";
$userName = "root";
$password = "";
$databaseName = "demo";
$conn = new mysqli($hostName, $userName, $password, $databaseName);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
if (isset($_GET['id'])){
    $id=$_GET['id'];
    $query="DELETE FROM `contact` WHERE `id`='$id'";
    $Delete= mysqli_query($conn,$query);
    if ($Delete) {
        header("location:contact.php");
    }
}
?>
