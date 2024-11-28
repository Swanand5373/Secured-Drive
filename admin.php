<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>ADMIN PAGE</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <style type="text/css">
        .bs-example{
            margin: 10px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>
    <div class="bs-example">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <center><h1>Admin Login</h1></center><br>
                        <h3 class="pull-left">USER AND FILES LIST</h3>

                    </div>
                    <?php
                     include 'config.php';
                    $result = mysqli_query($link,"SELECT * FROM contact");

                    ?>
 
                    <?php
                    if (mysqli_num_rows($result) > 0) {
                    ?>
                      <table class='table table-bordered table-striped'>
                      <tr >
                        <td width="5%">SR NO</td>
                        <td width="20%">Users</td>
                        <td width="50%">Queries</td>
                        <td width="30%">Remark</td>
                        <td>Action</td>
                        <td>Action</td>
                      </tr>
                    <?php
                    $i=0;                    
                    while($row = mysqli_fetch_array($result)) {
                    ?>
                    <tr>
                        <td><?php echo $row["id"]; ?></td>
                        <td><?php echo $row["username"]; ?></td>
                        <td><?php echo $row["message"]; ?></td>
                        <td><?php echo $row["reply"]; ?></td>

                        <td><a type="button" onclick="Reply()" href="replay.php?id=<?php echo $row['id']?>?"class="btn btn-success" name="result">Remark</a></td>

                        <script>
                            function Reply() {
                                var fname=confirm("Any Remark for user","");
                                        }
                        </script>

                        <td><a onclick="DeleteConfirm()" href="admin.php?id=<?php echo $row['id']?>"class="btn btn-danger">Delete</a>
                        </td>
                     <script>
                            function DeleteConfirm() {
                            confirm("Are you sure to delete the record");
                            }
                     </script>
                    </tr>
                    <?php
                    $i++;
                    }
                    ?>
                    </table>
                     <?php
                    }
                    else{
                        echo "No result found";
                    }
                    ?>
                     <a href="logout.php" class="btn btn-danger ml-1">Log Out</a>
                </div>
                 
            </div>        
        </div>
        
    </div>

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
        header("location:admin.php");
    }
}

?>
</body>
</html>