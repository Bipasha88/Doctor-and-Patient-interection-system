<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container">
<b><p class="blue-text center" style="font-size:20px;"><?= $title ?></p></b>
<div class="row">
<div class="col s3"></div>
<div class="col s6">


<?php echo form_open('doctors/changepassword'); ?>
    

     <div>
    <label for="">Old Password</label>
     <input type="password" name="oldpass" >
     <?php echo form_error('oldpass', '<div class="error red-text">', '</div>')?>
     </div>

     <div>
    <label >New Password</label>
    <input type="password" name="newpass">
    <?php echo form_error('newpass', '<div class="error red-text">', '</div>')?>
     </div>

     <div>
    <label >Confirm Password</label>
    <input type="password" name="confpass">
    <?php echo form_error('confpass', '<div class="error red-text">', '</div>')?>
     </div>


     <br>


     <div>
     <button type="submit" class="waves-effect waves-ligh btn-small green">Change Password</button>
     </div>
    </form>
    </div>

    </div>
</div>

</body>
</html>