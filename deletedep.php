<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:login_form.php');
}
$conn = mysqli_connect('localhost','root','','organizational');

$sql2="select depname from departmentdetails";
$res=mysqli_query($conn,$sql2);
?>
<html>
<head>
<meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Delete Department</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
      
<div class="form-container">

<form action="deldep.php" method="post">
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
   
   <select name="depname">
      <?php 
         while($row=mysqli_fetch_array($res))
         {
         ?>
<option value=<?php echo $row['depname'];?> ><?php echo $row['depname'];?></option>
<?php }?>
</select>

   <button type="submit" name="submit" value="Delete Department" class="form-btn"><i class="bi bi-trash3"></i> Delete Department</button>
   
</form>

</div>

</body>
</html>