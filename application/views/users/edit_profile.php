<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<div class="container">

<div class="row">
<div class="col s2"></div>
<div class="col s6">
<?php echo $this->session->flashdata('em_exist');?>

 <?php echo validation_errors();?>
 <br>
 <br>
 <br>
 <b><p class="blue-text center" style="font-size:30px;">Sign Up</p></b>



 <?php echo form_open('users/editprofile'); ?>
    <div>
    <label for="">Name</label>
     <input type="text" name="name" id="username">
     <?php echo form_error('oldpass', '<div class="error">', '</div>')?>
     </div>

     <div>
    <label for="">Age</label>
     <input type="text" name="age" id="username">
     <?php echo form_error('oldpass', '<div class="error">', '</div>')?>
     </div>

     <div>
    <label for="">Phone No</label>
     <input type="text" name="num" id="username">
     </div>

     <div>
    <label for="">Live in</label>
     <input type="text" name="home" id="username">
     </div>


     
     

     <div>
     <label>Gender</label>
     <br>
    <select name="gender">
     
      <option value="Male">Male</option>
      <option value="Female">Female</option>
      <option value="Other">Other</option>
    </select>
    
  </div>
  <br>

     <div>
     <button type="submit" name="register" class="waves-effect waves-ligh btn-small green center">Edit Profile</button>
     </div>
    </form>

    </div>
    </div>
    </div>

    
</body>
</html>