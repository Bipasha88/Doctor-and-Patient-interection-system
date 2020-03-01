<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body> 

<ul id="dropdown1" class="dropdown-content">
  <li><a href="#!">Heart Specialist</a></li>
  <li><a href="#!">Eye Specialist</a></li>
  <li><a href="#!">Medicine Specialist</a></li>
</ul>

  <nav>
   <div class="nav-wrapper blue lighten-2">
   <div class="container">
     <a class="brand-logo">Logo</a>
     <ul id="nav-mobile" class="right hide-on-med-and-down">
      <li><a href="<?php echo base_url()?>menu">Home</a></li>
      <li><a class="dropdown-trigger"  data-target="dropdown1">Doctors
      <i class="material-icons right">arrow_drop_down</i></a></li>
      <li><a href="<?php echo base_url()?>posts">Blogs</a></li>
      <li><a href="<?php echo base_url()?>createposts">Create Post</a></li>
      <li><a href="<?php echo base_url()?>user_logout">Logout</a></li>
     </ul>
     </div>
   </div>
  
  </nav>

  
  
</body>
</html>