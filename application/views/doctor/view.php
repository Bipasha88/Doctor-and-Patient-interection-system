<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
    <b><p>  Doctor's Profile</p></b>
    <div class="row">

<div class="col s8">
<div>
<table class="responsive-table">

<tr>
<td><b>Name</b></td>
<td><?php echo $doctors['name']; ?></td>
</tr>

<td><b>Email</b></td>
<td><?php echo $doctors['email']; ?></td>
</tr>

<td><b>Educational Qualification</b></td>
<td><?php echo$doctors['education']; ?></td>
</tr>

<td><b>Designation</b></td>
<td><?php echo $doctors['designation']; ?></td>
</tr>

<td><b>Live in</b></td>
<td><?php echo $doctors['home']; ?></td>
</tr>

<td><b>Gender</b></td>
<td><?php echo $doctors['gender']; ?></td>
</tr>

<td><b>Contact No</b></td>
<td><?php echo $doctors['num']; ?></td>
</tr>



</table>
</div>
</div>

<div class="col s3">
    <br>
    <br>
    <div>
<?php if($doctors['photo']){ ?>
      
      <img class="responsive-img" src="<?php echo base_url('uploads/'.$doctors['photo'])?>" alt="user image" style="padding:0px 0 20px 0; height:250px; width: 150px;">
    <?php } else { ?>

    <img class="responsive-img" src="<?php echo base_url('assets/img/no_img.jpg')?>" alt="user image">

    <?php }?>

    <p ><a class="btn blue white-text" href="">Send Request</a></p>
    </div>
</div>

</div>
    </div>

</body>
</html>