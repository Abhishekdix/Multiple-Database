<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:login_form.php');
}
$conn = mysqli_connect('localhost','root','','organizational');
$sql1="select max(stid)as stid from student";
$res=mysqli_query($conn,$sql1);
while($row=mysqli_fetch_array($res)){
   $stid=$row['stid'];
}
if ($stid==null){
    $stid=1001;
}
else{
$stid=$stid+1;}
$sql2="select depname from departmentdetails";
$res=mysqli_query($conn,$sql2);
?>
<html>
<head>
<meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Add Student</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
      
<div class="form-container">

<form action="studentad.php" method="post">
<div class="card-header">
   <a href="admin_page.php"><i class="bi bi-arrow-left"></i></a>
      <h3>Student Details</h3>
   </div>
   <?php
   if(isset($error)){
      foreach($error as $error){
         echo '<span class="error-msg">'.$error.'</span>';
      };
   };
   ?>
   <input readonly type="text" name="stid"  value=<?php echo "$stid";?> hidden>
   <label>Student Name</label><input type="text" name="stdname" required placeholder="Student Name">
   DOB<input type="date" name="dob" required placeholder="Date of Birth">
   <label>Student Email</label><input type="text" name="email" required placeholder="Email">
   Department<select name="depname">
      <?php 
         while($row=mysqli_fetch_array($res))
         {
         ?>
<option value=<?php echo $row['depname'];?> ><?php echo $row['depname'];?></option>
<?php }?>
</select>
Contact Number<input type="tel" id="phone" name="phone" required placeholder="Phone number">
   <button type="submit" name="submit" value="Add Student" class="form-btn"><i class="bi bi-check-lg"></i> Add Student</button>
   
</form>

</div>

</body>
</html>