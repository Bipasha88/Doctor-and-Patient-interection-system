<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    
     <div class= "container">

     <p> <?php echo $this->session->flashdata('user_loggedin');?></p>
    <p> <?php echo $this->session->flashdata('upload_message');?></p>
    <br>
    <b><p>  User Profile</p></b>

    <div class="row">

    <div class="col s8">
    <div>
    <table class="responsive-table">

    <tr>
    <td><b>Name</b></td>
    <td><?php echo $user->name ?></td>
    </tr>

    <td><b>Email</b></td>
    <td><?php echo $user->email ?></td>
    </tr>

    <td><b>Gender</b></td>
    <td><?php echo $user->gender ?></td>
    </tr>
    
    </table>
    
    </div>

    <div class="userlinks">
    <br>

    <?php echo anchor('', 'Edit Profile') ?> <br>
    <?php echo anchor('users/changepassword', 'Change Password') ?>
    
    </div>

    
    </div>
    <div class = "col s3">
    <div>
      <?php if($user->photo){ ?>
      
        <img class="responsive-img" src="<?php echo base_url('uploads/'.$user->photo)?>" alt="user image" style="padding:0px 0 20px 0; height:250px; width: 150px;">
      <?php } else { ?>

      <img class="responsive-img" src="<?php echo base_url('assets/img/no_img.jpg')?>" alt="user image">

      <?php }?>
    </div>
    <a href="<?php echo site_url('users/upload')?>" class="waves-effect waves-ligh btn-small green">Upload Image</a>
    
    </div>
    
    </div>
    </div>
</body>
</html>