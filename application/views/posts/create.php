<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container">

<div class="row">
<div class="col s2"></div>
<div class="col s6">
<p class="blue-text center" style="font-size:30px;"><?= $title ?></p>

<?php echo validation_errors();?>

<form action="" method="POST">
    

     <div>
    <label for="">Title</label>
     <input type="text" name="title">
     </div>
     <br>

     <div>
    <label for="body">Write Post</label>
     <textarea name="body"></textarea>
     </div>
     <br>


     <div>
     <button type="submit" name="post_submit" class="waves-effect waves-ligh btn-small green">Post</button>
     </div>
    </form>
</div>
</div>
</div>

</body>
</html>