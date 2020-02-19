<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php echo $this->session->flashdata('em_exist');?>

 <?php echo validation_errors();?>
    <form action="" method="POST">
    <div>
    <label for="username">Name</label>
     <input type="text" name="name" id="username">
     </div>

     <div>
    <label for="email">Email Address</label>
     <input type="text" name="email" id="email">
     </div>

     <div>
    <label for="password">Password</label>
     <input type="password" name="password" id="password">
     </div>

     
     <div>
    <label for="gender">Gender</label>
     <select name="gender" id="gender">
     <option value="Male">Male</option>
     <option value="Female">Female</option>
     <option value="Other">Other</option>
     </select>
     </div>

     <div>
     <button type="submit" name="register">register</button>
     </div>
    </form>
</body>
</html>