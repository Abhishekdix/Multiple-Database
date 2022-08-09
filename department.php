<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:login_form.php');
}
$conn = mysqli_connect('localhost','root','','organizational');
$sql1="select max(depid)as depid from departmentdetails";
$res=mysqli_query($conn,$sql1);
while($row=mysqli_fetch_array($res)){
   $depid=$row['depid'];
}
if ($depid==null){
   $depid=1;
}else{
$depid=$depid+1;
}
$sql2="select empname from employee";
$res=mysqli_query($conn,$sql2);
?>
<html>
<head>
<meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Add Department</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
      
<div class="form-container">

<form action="dep.php" method="post">
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
   <input readonly type="text" name="depid"  value=<?php echo "$depid";?> hidden>
   Department Name<input type="text" name="department" required placeholder="Department Name">
   Department HOD<select name="empname">
      <?php 
         while($row=mysqli_fetch_array($res))
         {
         ?>
<option value=<?php echo $row['empname'];?> ><?php echo $row['empname'];?></option>
<?php }?>
</select>
   Faculty Count<input type="text" name="totalstaff" required placeholder="Total Staff">
   <button type="submit" name="submit" class="form-btn"><i class="bi bi-check-lg"></i> Add Department</button>
   
</form>

</div>

</body>
</html>