<?php
$server="localhost";
$user="krishna";
$password="krishna";
$db="students";
$conn=mysqli_connect($server,$user,$password,$db);
?>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
<title>insert</title>
</head>
</body>
<div class="container">
<div class="jumbotron"><div class="form-group">
<a href='sub&edit.php' class='btn btn-success'>edit</a>
<a href='logout.php' class='btn btn-primary'>LOGOUT</a>
<a href='front_fee1.php' class='btn btn-danger'>Search</a>
</div></div>
<form class="col-md-6" method="post">
<div class="form-group">
<label>registration_no</label>
<input type="number" name="reg_no" class="form-control" required>
</div>
<div class="form-group">
<label>username</label>
<input type="text" name="username" class="form-control" required>
</div>
<div class="form-group">
<label>department</label>
<input type="text" name="dep" class="form-control" required>
</div>
<div class="form-group">
<label>fees</label>
<input type="number" name="fee" class="form-control" required>
</div>
<div class="form-group">
<input type="submit" name="submit_user" class="btn btn-danger" >
</div>
</form>
<?php
/* after this code is insertion code,In this block code for showing details
$sql="SELECT * FROM money";
$run = mysqli_query($conn,$sql);
echo "
<table class='table'>
<thead>
<tr><th>registration_no</th>
<th>username</th>
<th>department</th>
<th>fees</th>
</tr>
</thead>
<tbody>
";
while($rows=mysqli_fetch_assoc($run))
{ 
echo "
	<tr>
	<td>$rows[U_registration_no]</td>
	<td>$rows[students_name]</td>
	<td>$rows[department]</td>
	<td>$rows[fees]</td>
	
	</tr>
	";}
	echo "</tbody>
	</table>";
	*/
?>
</div> 
</body>
</html>
<?php
if(isset($_POST['submit_user']))
{
echo $reg=mysqli_real_escape_string($conn,strip_tags($_POST['reg_no']));
echo $user=mysqli_real_escape_string($conn,strip_tags($_POST['username']));
echo $dep=mysqli_real_escape_string($conn,strip_tags($_POST['dep']));
echo $fee=mysqli_real_escape_string($conn,strip_tags($_POST['fee']));
$ins_sql="INSERT INTO money(U_registration_no,students_name,department,fees) VALUES ('$reg','$user','$dep','$fee')";
if(mysqli_query($conn,$ins_sql))
{ ?>
<script>window.location="front_fee.php";</script>
<?php
}
}
?>
