<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style type="text/css">

</style>
<body> 

<ul id="dropdown1" class="dropdown-content">
  <li><a href="<?php echo base_url()?>heartdoctor">Heart Specialist</a></li>
  <li><a href="<?php echo base_url()?>eyedoctor">Eye Specialist</a></li>
  <li><a href="<?php echo base_url()?>medicindoctor">Medicine Specialist</a></li>
</ul>
<div class="navbar-fixed">
  <nav>
   <div class="nav-wrapper blue lighten-2 navbar-fixed">
   <div class="container">
     <a class="brand-logo">Logo</a>
     <ul id="nav-mobile" class="right hide-on-med-and-down">

      <li><a href="<?php echo base_url()?>dashboard1">Home</a></li>

      <?php if(!$this->session->userdata('doctor_logged_in')): ?>
      <li><a class="dropdown-trigger"  data-target="dropdown1">Doctors
      <i class="material-icons right">arrow_drop_down</i></a></li>
      <?php endif; ?>


      <li><a href="<?php echo base_url()?>posts">Blogs</a></li>
      
      <li><a href="<?php echo base_url()?>createposts">Create Post</a></li>

      <?php if($this->session->userdata('logged_in')): ?>
      <li><a href="<?php echo base_url()?>dashboard">My Account</a></li>
      <?php endif; ?>

      <?php if(!$this->session->userdata('logged_in')): ?>
      <li><a href="<?php echo base_url()?>dashboard2">My Account</a></li>
      <?php endif; ?>
      
      <li><a href="<?php echo base_url()?>google_login/login">Chat</a></li>
     
      <li><a href="<?php echo base_url()?>google_login/logout">Logout</a></li>
     

      

     </ul>
     </div>
   </div>
  
  </nav>
      </div>
  

 
  
  
</body>
</html>