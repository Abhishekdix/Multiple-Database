<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:login_form.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin page</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="container">

   <div class="content">
      <h3>hi, <span>admin</span></h3>
      <h1>welcome <span><?php echo $_SESSION['admin_name'] ?></span></h1>
      <p>this is your admin dashboard</p>
      <a href="department.php" class="btn"><i class="bi bi-folder-plus"></i> Add Department</a>
      <a href="deletedep.php" class="btn"><i class="bi bi-folder-minus"></i> Delete Department</a>
      <a href="studentinfo.php" class="btn"><i class="bi bi-person-plus"></i> Add student</a>
  
      <a href="logout.php" class="btn logout-btn"><i class="bi bi-box-arrow-right"></i> logout</a>
   </div>

</div>

</body>
</html>