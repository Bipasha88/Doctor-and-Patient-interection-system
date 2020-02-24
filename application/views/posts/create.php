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

<?php echo validation_errors();?>

<form action="" method="POST">
    

     <div>
    <label for="">Title</label>
     <input type="text" name="title">
     </div>

     <div>
    <label for="body">Write Post</label>
     <textarea name="body"></textarea>
     </div>
     <br>


     <div>
     <button type="submit" name="post_submit">Post</button>
     </div>
    </form>
</div>

</body>
</html>