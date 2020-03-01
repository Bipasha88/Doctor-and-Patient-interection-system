
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

<?php if($this->session->userdata('email') == $post['user_email']): ?>

<hr>
<a href="<?php echo base_url(); ?>posts/edit/<?php echo $post['slug']; ?>">Edit</a>
<br>

<?php echo form_open('posts/delete/'.$post['id']); ?>
<button type="submit" name="delete">Delete</button>
</form>

<?php endif; ?>

<hr>
<h2>Comments</h2>

<?php if($comment) : ?>

   <?php foreach($comment as $com): ?>
     <p><?php echo $com['body']; ?>[ by  <strong><?php echo $com['name'];?> </strong>] </p>

   <?php endforeach; ?>

<?php else : ?>
<p>No comment to display.</p>
<?php endif;  ?>

<hr>

<?php echo validation_errors(); ?>
<h2>Add Comment</h2>
<?php echo form_open('comment/create/'.$post['id']); ?>

<div>
<label for="">Name</label>
<input type="text" name="name" >
</div>

<div>
<label for="">Comment</label>
<textarea name="body" id="" cols="30" rows="10"></textarea>
</div>

<input type="hidden" name="slug" value="<?php echo $post['slug'];?>">
<button type="submit">Comment</button>
</form>
</body>
</html>