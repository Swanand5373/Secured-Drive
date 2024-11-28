<!DOCTYPE html>
<html>
<head>
	<title>Pricing</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<style type="text/css">
		* {
  box-sizing: border-box;
}

/* Create three columns of equal width */
.columns {
  float: left;
  width: 33.3%;
  padding: 8px;
}

/* Style the list */
.price {
  list-style-type: none;
  border: 1px solid #eee;
  margin: 0;
  padding: 0;
  -webkit-transition: 0.3s;
  transition: 0.3s;
}

/* Add shadows on hover */
.price:hover {
  box-shadow: 0 8px 12px 0 rgba(0,0,0,0.2)
}

/* Pricing header */
.price .header {
  background-color: #111;
  color: white;
  font-size: 25px;
}

/* List items */
.price li {
  border-bottom: 1px solid #eee;
  padding: 20px;
  text-align: center;
}

/* Grey list item */
.price .grey {
  background-color: #eee;
  font-size: 20px;
}

/* The "Sign Up" button */
.button {
  background-color: #04AA6D;
  border: none;
  color: white;
  padding: 10px 25px;
  text-align: center;
  text-decoration: none;
  font-size: 18px;
}

/* Change the width of the three columns to 100%
(to stack horizontally on small screens) */
@media only screen and (max-width: 600px) {
  .columns {
    width: 100%;
  }
}

.col{
     position: static;
     margin-left: 25%;
     margin-top: -4%;

	}

	#nav{

		margin: 5% 2%;
		padding: 1%;
	}

	h1{
		position: absolute;
        font-family: inherit;
        margin:-4% 33%;
        font-weight: bold;

	}
	</style>

</head>
<body><center><h1>Welcome to secured Drive</h1></center>
	<nav class="navbar navbar-light" style="background-color: #272056;" id="nav">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">sDrive</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="index.php">Home</a></li>
      <li><a href="#">About us</a></li>
      <li><a href="price.php">Pricing</a></li>
      
    </ul>
    <ul class="nav navbar-nav navbar-right">
    <li><a href="Login.php"><span class="glyphicon glyphicon-user"></span> Explore Prime</a></li>
      <li><a href="register,php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="Login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav>
<br>
	<div class="col">
    
		<div class="columns">
  <ul class="price">
    <li class="header">Basic</li>
    <li class="grey">Free</li>
    <li>1GB Storage</li>
    <li>Only Pdf and JPEG allowed</li>
    <li>Document Size must be below 512 kb</li>
    <li>15 Documents Limit</li>
    <li class="grey"><a href="#" class="button">Free Login</a></li>
  </ul>
</div>
<div class="columns">
  <ul class="price">
    <li class="header">Prime</li>
    <li class="grey">Rs 199 / year</li>
     <li>10GB Storage</li>
     <li>Only Pdf and Images allowed</li>
     <li>Document Size must be below 5 mb</li>
    <li>Unlimited Documents</li>
    <li class="grey"><a href="#" class="button" onclick="javascript:alert('Comming Soon..!');">Purchese Prime</a></li>
  </ul>
</div>
	</div>
<br><br>



</body>
</html>