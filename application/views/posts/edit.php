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

<?php echo form_open('posts/update'); ?>

<input type="hidden" name="id"  value="<?php echo $post['id'];?>">
    

     <div>
    <label for="">Title</label>
     <input type="text" name="title" value="<?php echo $post['title']; ?>">
     </div>

     <div>
    <label for="body">Write Post</label>
     <textarea name="body" ><?php echo $post['body']; ?></textarea>
     </div>
     <br>


     <div>
     <button type="submit" >Edit</button>
     </div>
    </form>
</div>

</body>
</html>