
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h2><?php echo $post['title']; ?></h2>
<small>Posted on: <?php echo $post['create_at'];?></small>
<div><?php echo $post['body'];?></div>

<hr>
<a href="<?php echo base_url(); ?>posts/edit/<?php echo $post['slug']; ?>">Edit</a>
<br>

<?php echo form_open('posts/delete/'.$post['id']); ?>
<button type="submit" name="delete">Delete</button>
</form>
</body>
</html>