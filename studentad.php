<?php
$conn = mysqli_connect('localhost','root','','organizational');
if ($conn)
{
    $stid=$_POST['stid'];
    $stdname=$_POST['stdname'];
    $dob=$_POST['dob'];
    $depname=$_POST['depname'] ;
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    

    $sql1="select depid from departmentdetails where depname='$depname'";
    $res=mysqli_query($conn,$sql1);
    while($row=mysqli_fetch_array($res)){
   $depid=$row['depid'];
}


$sql2 = "INSERT INTO student (stid, stname,dob,dep,contactno,email)
VALUES ('$stid', '$stdname','$dob','$depid','$phone','$email')";
if(mysqli_query($conn,$sql2))
{
   echo '<script type="text/javascript">' .'console.log(' . "Inserted successfully" . ');</script>';
}
$pass = md5($_POST['email']);

$insert = "INSERT INTO user_form(name, email, password, user_type) VALUES('$stdname','$email','$pass','student')";
if(mysqli_query($conn,$insert))
{
   echo '<script type="text/javascript">' .'console.log(' . "Inserted successfully" . ');</script>';
}
      
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Student</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="container">

   <div class="content">
     
      <h1><span><?php echo $stdname ?></span> is added successfully to <?php echo $depname;?></h1>
      
      
      
      <a href="studentinfo.php" class="btn">Home</a>
      <a href="logout.php" class="btn">logout</a>
   </div>

</div>

</body>
</html>