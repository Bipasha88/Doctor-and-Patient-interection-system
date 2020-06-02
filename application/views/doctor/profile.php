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
    <?php foreach($doctors as $doctor) : ?>
         <div class="row">
         <div class="col s3">
         <?php if($doctor['photo']){ ?>
      
      <img class="responsive-img" src="<?php echo base_url('uploads/'.$doctor['photo'])?>" alt="user image" style=" height:200px; width: 100px;">
    <?php } else { ?>

    <img class="responsive-img" src="<?php echo base_url('assets/img/no_img.jpg')?>" alt="user image"  style=" height:200px; width: 120px";>

    <?php }?>
         </div>
           <br>
         <div class=><a href="<?php echo base_url('doctor2/'.$doctor['licence']); ?>"  class="blue-text" style="font-size:20px;"> <?php echo $doctor['name']; ?></a> 
        <p><?php echo $doctor['designation']; ?> </p>
        </div>
        </div>

        
        
    <?php endforeach; ?>
   

    </div>
</body>
</html>