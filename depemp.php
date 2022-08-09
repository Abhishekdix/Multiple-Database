<?php
$file=fopen("save.txt", "r");
$depname=file_get_contents("save.txt");
if(isset($_POST['submit'])){
    
    $con = mysqli_connect('localhost','root','',$depname);
    $empname=$_POST['empname'];
    $cname=$_POST['coursename'];
    echo "$cid"." "." $cname"." "." $cdes";
    
    $sql2 = "INSERT INTO employe (coursename,empname)
    VALUES ('$cname', '$empname')";
    if(mysqli_query($con,$sql2))
    {
       echo '<script type="text/javascript">' .'console.log(' . "Inserted successfully" . ');</script>';
       echo"inserted";
    }
    
    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Department Faculty</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="form-container">

<form action="depproject.php" method="post">
   <h3>Department Faculty</h3>
   <?php
   if(isset($error)){
      foreach($error as $error){
         echo '<span class="error-msg">'.$error.'</span>';
      };
   };
   ?>
   <?php
   $con = mysqli_connect('localhost','root','','organizational');
   if ($con)
   {
       $sql2="select empname from employee";
       $res=mysqli_query($con,$sql2);
   } 
   ?>
   <select name="empname">
      <?php 
         while($row=mysqli_fetch_array($res))
         {
         ?>
    <option value=<?php echo $row['empname'];?> ><?php echo $row['empname'];?></option>
<?php }?>
</select>
<?php
   $con = mysqli_connect('localhost','root','',$depname);
   if ($con)
   {
       $sql2="select coursename from courses";
       $res=mysqli_query($con,$sql2);
   } 
   ?>
   <select name="coursename">
      <?php 
         while($row=mysqli_fetch_array($res))
         {
         ?>
    <option value=<?php echo $row['coursename'];?> ><?php echo $row['coursename'];?></option>
<?php }?>
</select>
   <input readonly type="text" name="depname"  value=<?php echo "$depname";?>>
   
   <input type="submit" name="submit" value="Add Faculty" class="form-btn">
   
</form>

</div>
</body>
</html>