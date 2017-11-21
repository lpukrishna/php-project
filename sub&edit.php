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



<title>updation</title>
</head>
</body>
<div class="container">
<div class="jumbotron"><div class="form-group">
<a href='front_fee.php' class='btn btn-success'>Insert</a>
<a href='sub&edit.php' class='btn btn-success'>refresh</a>
<a href='logout.php' class='btn btn-primary'>LOGOUT</a>
</div></div></div>
<?php 
if(isset($_GET['edit_id'])){ 
$sql="SELECT * FROM money WHERE U_registration_no='$_GET[edit_id]'";
$run=mysqli_query($conn,$sql);
while($rows=mysqli_fetch_assoc($run)){
	$user=$rows['students_name'];
	$dep=$rows['department'];
	$fees=$rows['fees'];
}
?>
<form class="col-md-4" method="post">


<div class="form-group">
<div class="form-group">
<label>registration_no</label>
<input type="number" name="edit_reg_no" class="form-control">
</div>
<label>student_name</label>
<input type="text" name="edit_username" value="<?php echo $user; ?>" class="form-control" required>
</div>
<div class="form-group">
<label>department</label>
<input type="text" name="edit_dep" value="<?php echo $dep; ?>" class="form-control" required>
</div>
<div class="form-group">
<label>fees</label>
<input type="number" name="edit_fee" value="<?php echo $fees; ?>" class="form-control" required>
</div>
<div class="form-group">
<input type="hidden" value="<?php echo $_GET['edit_id'] ?>" name="edit_user_id" >
<input type="submit" value="done editing" name="edit_user" class="btn btn-primary" >
</div>
</form>
<?php
}
 else {
	 ?>
<form class="col-md-4" method="post">
<div class="form-group">
<label>registration_no</label>
<input type="number" name="reg_no" class="form-control" required>
</div>
<div class="form-group">
<label>student_name</label>
<input type="text" name="username" class="form-control" required>
</div>
<div class="form-group">
<label>department</label>
<input type="text" name="dep" class="form-control" required>
</div>
<div class="form-group">
<label>fees</label>
<input type="number" name="fees" class="form-control" required>
</div>
<div class="form-group">
<input type="submit" name="submit_user" class="btn btn-danger" >
</div>
</form>
<?php
}
$sql="SELECT * FROM money";
$run = mysqli_query($conn,$sql);
echo "
<table class='table'>
<thead>
<tr><th>registration_no</th>
<th>student_name</th>
<th>department</th>
<th>fee</th>
<th>edit</th>
<th>delete</th>
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
	<td><a href='sub&edit.php?edit_id=$rows[U_registration_no]' class='btn btn-success'>edit</a></td>
	<td><a href='sub&edit.php?del_id=$rows[U_registration_no]' class='btn btn-danger'>delete</a></td>
	";}
	echo "</tbody>
	</table>";
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
echo $money=mysqli_real_escape_string($conn,strip_tags($_POST['fees']));
$ins_sql="INSERT INTO money(U_registration_no,students_name,department,fees) VALUES ('$reg','$user','$dep','$money')";
if(mysqli_query($conn,$ins_sql))
{ ?>
<script>window.location="sub&edit.php";</script>
<?php
}
}
?>
<?php
if(isset($_GET['del_id']))
{
	$del_sql="DELETE FROM money WHERE U_registration_no = '$_GET[del_id]'";
	if(mysqli_query($conn,$del_sql))
	{
		 ?>
<script>window.location="sub&edit.php";</script>
<?php
	}
}
if(isset($_POST['edit_user']))
{
	$editreg=mysqli_real_escape_string($conn,strip_tags($_POST['edit_reg_no']));
	$edituser=mysqli_real_escape_string($conn,strip_tags($_POST['edit_username']));
	$editdep=mysqli_real_escape_string($conn,strip_tags($_POST['edit_dep']));
	$editfee=mysqli_real_escape_string($conn,strip_tags($_POST['edit_fee']));
	$edit_id=$_POST['edit_user_id'];
	$edit_sql="UPDATE money SET students_name='$edituser',department='$editdep',fees='$editfee' WHERE U_registration_no ='$edit_id' ";
	if(mysqli_query($conn,$edit_sql))
	{
		 ?>
<script>window.location="sub&edit.php";</script>
<?php
	}
}
?>