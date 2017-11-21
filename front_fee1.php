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
<title>show</title>
</head>
</body>
<div class="container">
<div class="jumbotron"><div class="form-group">
<a href='front_fee.php' class='btn btn-success'>Insert</a>
<a href='front_fee1.php' class='btn btn-success'>refresh</a>
</div>
</div>
<form class="col-md-6" method="post">
<div class="form-group">
<label>registration_no</label>
<input type="number" name="reg_id" class="form-control" required>
</div>
<div class="form-group">
<input type="submit" name="submit_user" class="btn btn-danger" >
</div>
</form>
<?php
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 if(isset($_POST['submit_user']))
 {
	$reg = mysqli_real_escape_string($conn,strip_tags($_POST['reg_id'])); 
 }
	 $sql = "SELECT * FROM money WHERE U_registration_no ='$reg'";
if($result = mysqli_query($conn,$sql))
{
    if(mysqli_num_rows($result) > 0){
        echo "<table class='table'>";
            echo "<tr>";
                echo "<th>id</th>";
                echo "<th>student</th>";
                echo "<th>department</th>";
                echo "<th>fees</th>";
				
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['U_registration_no'] . "</td>";
                echo "<td>" . $row['students_name'] . "</td>";
                echo "<td>" . $row['department'] . "</td>";
                echo "<td>" . $row['fees'] . "</td>";
				
            echo "</tr>";
        }
        echo "</table>";
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}



 
// Close connection
mysqli_close($conn);
?>

</body>
</html>


