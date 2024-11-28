
<?php 
include 'config.php';
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
    $msg="Admitted,your complaint has been considered & you will be notified by Mail.";
    $query="UPDATE `contact` SET `reply`='$msg' WHERE id='$id'";
    $Delete= mysqli_query($conn,$query);
    if ($Delete) {
        header("location:admin.php");
      
 }
}

?>

	