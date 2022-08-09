<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['user_name'])){
   header('location:login_form.php');
}
$con = mysqli_connect('localhost','root','','organizational');
if ($con){
   $sql1="select email from user_form";
   $res=mysqli_query($con,$sql1);
while($row=mysqli_fetch_array($res)){
   $email=$row['email'];
}

$sql2="(select depname from departmentdetails where depid in (select dep from student where email='$email'))";
$res=mysqli_query($con,$sql2);
while($row=mysqli_fetch_array($res)){
   $depname=$row['depname'];
}

}





?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Student page</title>

   
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="container">

   <div class="content">
   <h1>welcome <span><?php echo $_SESSION['user_name'] ?></span></h1>
      <p>this is your student dashboard</p>
      <h3>Course Details</h3><br>
    <table align="center" border="2" >
<tr><th>Course Name &nbsp;&nbsp;&nbsp;</th><th>Course Description</th></tr>
<?php $con = mysqli_connect('localhost','root','',$depname);
$sql1="select email from user_form";
if ($con){
   $sql1="select coursename,coursedes from courses";
   $res=mysqli_query($con,$sql1);
while($row=mysqli_fetch_array($res)){
   $cn=$row['coursename'];
   $cd=$row['coursedes'];

?>
<tr><td><?php echo $cn;?></td><td><?php echo $cd?><td></tr>
<?php }};?>

</table>
<h3>Project Details</h3><br>
<table >
<tr><th>Projects Name &nbsp;&nbsp;&nbsp;</th><th>Project Description</th></tr>
<?php $con = mysqli_connect('localhost','root','',$depname);
$sql1="select email from user_form";
if ($con){
   $sql1="select projname,projdes from project";
   $res=mysqli_query($con,$sql1);
while($row=mysqli_fetch_array($res)){
   $cn=$row['projname'];
   $cd=$row['projdes'];

?>
<tr><td><?php echo $cn;?></td><td><?php echo $cd?><td></tr>
<?php }};?>

</table>
      
      
      <a href="logout.php" class="btn">logout</a>
   </div>

</div>

</body>
</html>