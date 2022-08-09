<?php
$file=fopen("save.txt", "r");
$depname=file_get_contents("save.txt");

$con = mysqli_connect('localhost','root','',$depname);
if ($con)
{
  
   $sql1="select max(projid)as pid from project";
   $res=mysqli_query($con,$sql1);
while($row=mysqli_fetch_array($res)){
   $pid=$row['pid'];
}
if ($pid==null){
   $pid=1;
}else
{
$pid=$pid+1;
echo"$pid";
}
}
if(isset($_POST['submit'])){

$pname=$_POST['pname'];
$pdes=$_POST['pdes'];


$sql2 = "INSERT INTO project (projid, projname,	projdes)VALUES ('$pid', '$pname', '$pdes')";
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

<form action="depproject.php" method="post">
   <h3>Department</h3>
   <?php
   if(isset($error)){
      foreach($error as $error){
         echo '<span class="error-msg">'.$error.'</span>';
      };
   };
   ?>
   <input readonly type="text" name="depname"  value=<?php echo "$depname";?>>
   <input readonly type="text" name="pid"  value=<?php echo "$pid";?> hidden>
   Course Name<input type="text" name="pname" required placeholder="Project Name">
   <textarea name='pdes' required placeholder="Project Description"></textarea>
   <input type="submit" name="submit" value="Add Project" class="form-btn">
   
</form>

</div>
</body>
</html>