<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container">
<h2><?= $title ?></h2>
<div class="row">
<div class="col s6">


<?php echo form_open('users/changepassword'); ?>
    

     <div>
    <label for="">Old Password</label>
     <input type="password" name="oldpass" >
     <?php echo form_error('oldpass', '<div class="error">', '</div>')?>
     </div>

     <div>
    <label >New Password</label>
    <input type="password" name="newpass">
    <?php echo form_error('newpass', '<div class="error">', '</div>')?>
     </div>

     <div>
    <label >Confirm Password</label>
    <input type="password" name="confpass">
    <?php echo form_error('confpass', '<div class="error">', '</div>')?>
     </div>


     <br>


     <div>
     <button type="submit" class="waves-effect waves-ligh btn-small blue">Change Password</button>
     </div>
    </form>
    </div>

    </div>
</div>

</body>
</html>