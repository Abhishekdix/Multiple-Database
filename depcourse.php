<?php
$depname=$_POST['depname'];
$con = mysqli_connect('localhost','root','',$depname);
if ($con)
{
  
   $sql1="select max(courseid)as cid from courses";
   $res=mysqli_query($con,$sql1);
while($row=mysqli_fetch_array($res)){
   $cid=$row['cid'];
}
if ($cid==null){
   $cid=1;
}else
{
$cid=$cid+1;

}
}
if(isset($_POST['submit'])){
$cname=$_POST['cname'];
$cdes=$_POST['cdes'];


$sql2 = "INSERT INTO courses (courseid, coursename,	coursedes)
VALUES ('$cid', '$cname', '$cdes')";
if(mysqli_query($con,$sql2))
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
   <title>Department</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="form-container">

<form action="depcourse.php" method="post">
<div class="card-header">
   <a href="admin_page.php"><i class="bi bi-arrow-left"></i></a>
      <h3>Department</h3>
   </div>
   <?php
   if(isset($error)){
      foreach($error as $error){
         echo '<span class="error-msg">'.$error.'</span>';
      };
   };
   ?>
   <input readonly type="text" name="depname"  value=<?php echo "$depname";?>>
   <input readonly type="text" name="cid"  value=<?php echo "$cid";?> hidden>
   Course Name<input type="text" name="cname" required placeholder="Course Name">
   <textarea name='cdes' required placeholder="Course Description"></textarea>
   <input type="submit" name="submit" value="Add Department" class="form-btn">
   
</form>
<a href="dep.php" class="btn">Back</a>

</div>
</body>
</html>