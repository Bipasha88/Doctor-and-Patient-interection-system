
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container">
<b><p><?php echo $post['title']; ?></p></b>
<small>Posted on: <?php echo $post['create_at'];?></small>
<div><?php echo $post['body'];?></div>

<?php if($this->session->userdata('email') == $post['user_email']): ?>

<br>
<a class="btn blue" href="<?php echo base_url(); ?>posts/edit/<?php echo $post['slug']; ?>">Edit</a>
<br>
<br>

<?php echo form_open('posts/delete/'.$post['id']); ?>
<button class="btn red" type="submit" name="delete">Delete</button>
</form>

<?php endif; ?>

<br>
<p class="blue-text">Comments</p>

<?php if($comment) : ?>

   <?php foreach($comment as $com): ?>
     <p><?php echo $com['body']; ?>[ by  <strong><?php echo $com['name'];?> </strong>] </p>

   <?php endforeach; ?>

<?php else : ?>
<p>No comment to display.</p>
<?php endif;  ?>

<br>

<?php echo validation_errors(); ?>

<p class="blue-text">Add Comment</p>

<div class="row">
<div class="col s6">
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
<br>
<button type="submit" class="btn">Comment</button>
</form>
</div>
</div>

</div>
</body>
</html>