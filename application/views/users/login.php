<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<div class="container">
<br>
<br>
<br>
<br>
<br>
<div class="row">
<div class="col s3"> </div>

<div class="col s5">
    <p class="red-text"> <?php echo $this->session->flashdata('userlogin_failed');?></p>
    <p class="red-text"> <?php echo $this->session->flashdata('user_registered');?></p>
    <p class="red-text"> <?php echo $this->session->flashdata('userlogged_out');?></p>
    <p class="red-text"> <?php echo $this->session->flashdata('set_session');?></p>

   <b> <p class="blue-text center">Log In</p><b>
    <?php echo validation_errors();?>
    <form action="" method="POST">
    

     <div>
    <label for="email">Email Address or Licence Number(doctor)</label>
     <input type="text" name="email" id="email">
     </div>

     <div>
    <label for="password">Password</label>
     <input type="password" name="password" id="password">
     </div>
     <br>


     <div>
     <button type="submit" name="login_user" class="waves-effect waves-ligh btn-small green">Login as Patient</button>
     </div>

     <br>
     <div>
     <button type="submit" name="login_doctor" class="waves-effect waves-ligh btn-small blue">Login as doctor</button>
     </div>

     <div>
     <a class="right light blue-text" href="<?php echo base_url()?>register">Register Here</a>
     </div>
    </form>

    </div>

    </div>

    </div>
</body>
</html>