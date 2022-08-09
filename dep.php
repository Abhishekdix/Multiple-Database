<?php
$conn = mysqli_connect('localhost','root','','organizational');
if ($conn)
{
    $depid=$_POST['depid'];
    $depname=$_POST['department'];
    $depname=str_replace(" ","",$depname);
    $dephod=$_POST['empname'] ;
    $depstaf=$_POST['totalstaff'];
    echo $dephod." dep hod";

    $sql1="select empid from employee where empname='$dephod'";
    $res=mysqli_query($conn,$sql1);
    while($row=mysqli_fetch_array($res)){
   $hodid=$row['empid'];
}



$sql2 = "INSERT INTO departmentdetails (depid, depname,dephod,totalstaf)
VALUES ('$depid', '$depname', '$hodid','$depstaf')";
if(mysqli_query($conn,$sql2))
{
   echo '<script type="text/javascript">' .'console.log(' . "Inserted successfully" . ');</script>';
}

$con = mysqli_connect('localhost','root','','');
if ($con){
   $sq1database="create database $depname";
   if (mysqli_query($con,$sq1database))
   {
      
      $con = mysqli_connect('localhost','root','',$depname);
      if ($con){
         
         $sqltab1="create table courses(
            courseid int primary key,
            coursename varchar(50),
            coursedes varchar(500)   
            )";
         if (mysqli_query($con,$sqltab1))
         {
            
         }
         $sqltab2="create table employe(
            coursename varchar(50) ,
            empname varchar(50) ,
            primary key(coursename,empname)  
            )";
         if (mysqli_query($con,$sqltab2))
         {
            
         }
         $sqltab3="create table project(
            projid int primary key,
            projname varchar(50),
            projdes varchar(500)   
            )";
         if (mysqli_query($con,$sqltab3))
         {
            
         }


         
      }

   }
}
}
$file=fopen("save.txt", "w");
fwrite($file, $depname);
fclose($file);

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
<form action="depcourse.php" method="post">   
<div class="container">

   <div class="content">
      
     
      <h1><span><?php echo $depname ?></span> is added successfully</h1>
      <input readonly type="text" name="depname"  value=<?php echo "$depname";?> hidden>
      <!-- <a href="department.php" class="btn">Back</a> -->
      <a href="admin_page.php" class="btn">Home</a>
      <input type="submit" value="Department Details" class="btn">
      <a href="deletedep.php" class="btn">Delete Department</a>
      <a href="depproject.php" class="btn">Add Project</a>
      <a href="depemp.php" class="btn">Add Faculty</a>
      <!-- <a href="logout.php" class="btn">logout</a> -->
   </div>

</div>
</form>

</body>
</html>