<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3> <?php echo $this->session->flashdata('userlogin_failed');?></h3>
    <h3> <?php echo $this->session->flashdata('user_registered');?></h3>
    <?php echo validation_errors();?>
    <form action="" method="POST">
    

     <div>
    <label for="email">Email Address</label>
     <input type="text" name="email" id="email">
     </div>

     <div>
    <label for="password">Password</label>
     <input type="password" name="password" id="password">
     </div>


     <div>
     <button type="submit" name="login_user">Login as Patient</button>
     </div>
    </form>
</body>
</html>