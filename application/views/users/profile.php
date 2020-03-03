<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <div class="container">

  
<?php foreach($profiles as $profile) : ?>
   

 <p><b><?php echo $profile['name']; ?></b></p>
 
 <p>Email: <?php echo $profile['email'];?></p>
 <p>Gender: <?php echo $profile['gender'];?></p>
 
 
<?php endforeach; ?>


    </div>
</body>
</html>