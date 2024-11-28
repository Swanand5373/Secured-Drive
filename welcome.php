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
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Welcome</title>
           <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="screen">
        <link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <style>
        body{ font: 14px sans-serif; text-align: center; }
        #nav{

        margin: 2% 1%;
        padding: 1%;
    }
    </style>
</head>
<body>

<nav class="navbar navbar-light" style="background-color: #272056;" id="nav">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand">Profile : <b> <?php echo htmlspecialchars($_SESSION["username"]); ?></b>.</a>
    </div>

    <ul class="nav navbar-nav navbar-right">
    <li><a href="contact.php"><span class="glyphicon glyphicon-user"></span> contact & Support</a></li>
    <li><a href="reset-password.php"><span class="glyphicon glyphicon-user"></span> Reset Password</a></li>
    <li><a href="logout.php" class="active"><span class="glyphicon glyphicon-log-in"></span> Log Out</a></li>
    </ul>
  </div>
</nav>
</body>
</html>
<?php
$conn=new PDO('mysql:host=localhost; dbname=demo', 'root', '') or die(mysql_error());
if(isset($_POST['submit'])!=""){
  $name=$_FILES['file']['name'];
  $size=$_FILES['file']['size'];
  $type=$_FILES['file']['type'];
  $temp=$_FILES['file']['tmp_name'];
  // $caption1=$_POST['caption'];
  // $link=$_POST['link'];
  $fname = date("YmdHis").'_'.$name;
  
  $chk = $conn->query("SELECT * FROM  upload where name = '$name';")->rowCount();
  if($chk){
    $i = 1;
    $c = 0;
    while($c == 0){
        $i++;
        $reversedParts = explode('.', strrev($name), 2);
        $tname = (strrev($reversedParts[1]))."_".($i).'.'.(strrev($reversedParts[0]));
    // var_dump($tname);exit;
        $chk2 = $conn->query("SELECT * FROM  upload where name = '$tname';")->rowCount();
        if($chk2 == 0){
            $c = 1;
            $name = $tname;
        }
    }
}
 $move =  move_uploaded_file($temp,"upload/".$fname);
 $username=htmlspecialchars($_SESSION["username"]);
 if($move){
    $query=$conn->query("insert into upload(name,fname,username)values('$name','$fname','$username')");
    if($query){
    header("location:welcome.php");
    }
    else{
    die(mysql_error());
    }
 }
}
?>
<html>
<head><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/bootstrap.js" type="text/javascript"></script>   
    <script type="text/javascript" charset="utf-8" language="javascript" src="js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf-8" language="javascript" src="js/DT_bootstrap.js"></script>

<style>
    .form{
        position: static;
    }
    #file{
        margin-left: 25%;
        border: solid;
        padding-right: 5%;
        padding-top: 1%;
        padding-bottom: 3%;


    }
    #submit{
         margin-left: 25%;
         margin-top: -6%;
    }
</style>
</head>
<body>
        <div class="row-fluid">
            <div class="span12">
                <div class="container">
       
        <h4><p class="alert alert-success">Upload Files from here ..</p></h4> 
        <br/>
            <div class="form">
                <form enctype="multipart/form-data" action="" name="form" method="post">
                <input type="file" name="file" id="file" class="btn btn-success"/>
                
            <input class="btn btn-primary" type="submit" name="submit" id="submit" value="Submit" />
                    
        </form>
            </div>
        <br>
        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
            <thead>
                <tr>
                    <th width="90%" align="center">Files</th>
                    <th align="center">Action</th>
                    <th align="center">Action</th>  
                </tr>
            </thead>
            <?php
            $username=htmlspecialchars($_SESSION["username"]);
            $query=$conn->query("SELECT * FROM `upload` WHERE `username`='$username';");
            while($row=$query->fetch()){
                $name=$row['name'];
            ?>
            <tr>
                <td>
                    &nbsp;<?php echo $name ;?>
                </td>
                <td>
                    <a href="download.php?filename=<?php echo $name;?>&f=<?php echo $row['fname'] ?>" class="btn btn-primary">Download</a>
                </td>
                <td><a href="welcome.php?id=<?php echo $row['id'] ?>"class="btn btn-danger" onclick="DeleteConfirm()">Delete</a>
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
    $query="DELETE FROM `upload` WHERE `id`='$id'";
    $Delete= mysqli_query($conn,$query);
    if ($Delete) {
        header("location:welcome.php");
    }
}
?>
