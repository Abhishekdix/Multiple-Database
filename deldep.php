<?php
$conn = mysqli_connect('localhost','root','','organizational');
if ($conn)
{
    $depname=$_POST['depname'];
}

$sql1 = "select depid from departmentdetails where depname='$depname'";
$res=mysqli_query($conn,$sql1);
while($row=mysqli_fetch_array($res)){
   $depid=$row['depid'];
}

$sqlup="update student SET dep=0 WHERE dep='$depid'";
if(mysqli_query($conn,$sqlup))
{
   echo '<script type="text/javascript">' .'console.log(' . "Inserted successfully" . ');</script>';
   
}
$sql2 = "delete from departmentdetails where depname='$depname'";
if(mysqli_query($conn,$sql2))
{
   echo '<script type="text/javascript">' .'console.log(' . "Inserted successfully" . ');</script>';
   
}
$conn = mysqli_connect('localhost','root','',$depname);
if ($conn)
{
   $sql3 = "delete from courses";
   if(mysqli_query($conn,$sql3))
{
   echo '<script type="text/javascript">' .'console.log(' . "Inserted successfully" . ');</script>';
   $sql4 = "delete from employe";
   if(mysqli_query($conn,$sql4))
   {
      $sql5 = "delete from project";
      if(mysqli_query($conn,$sql5))
      {$conn = mysqli_connect('localhost','root','');
         if ($conn){
         $sql6 = "drop database $depname";
         if(mysqli_query($conn,$sql6)){
            
         }
         
      }
   }
   }
}

}
   


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Department</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="container">

   <div class="content">
     
      <h1>Department <span><?php echo $depname ?></span> deleted successfully</h1>
      
      
      
      <a href="admin_page.php" class="btn">Home</a>
      <a href="logout.php" class="btn">logout</a>
   </div>

</div>

</body>
</html>