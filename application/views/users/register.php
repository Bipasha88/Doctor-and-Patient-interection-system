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
<?php echo $this->session->flashdata('ln_exist');?>
<?php echo $this->session->flashdata('em_exist');?>


 <?php echo validation_errors();?>
 
 <b><p class="blue-text center" style="font-size:30px;">Sign Up</p></b>



    <form action="" method="POST">
    <div>
    <label for="username">Name</label>
     <input type="text" name="name" id="username" placeholder="Gmail User Name" class="dark-blue-text">
     </div>

     <div>
    <label for="email">Email Address</label>
     <input type="text" name="email" id="email" placeholder="Gmail Address">
     </div>

     <div>
    <label for="">Doctor's Licence No.</label>
     <input type="text" name="licence" id="">
     </div>

     <div>
     <label>Designation of Doctor</label>
     <br>
    <select name="designation">
     
      <option value="Heart Specialist">Heart Specialist</option>
      <option value="Eye Specialist">Eye Specialist</option>
      <option value="Medicine Specialist">Medicine Specialist</option>
    </select>
    
  </div>

     <div>
    <label for="password">Password</label>
     <input type="password" name="password" id="password">
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
     <button type="submit" name="register" class="waves-effect waves-ligh btn-small green center">register as patient</button>
     </div>
     <br>

     <div>
     <button type="submit" name="doctor_register" class="waves-effect waves-ligh btn-small blue center">register as doctor</button>
     </div>
    </form>

    </div>
    </div>
    </div>

    
</body>
</html>