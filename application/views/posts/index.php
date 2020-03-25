
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<div class="container">
<b><p style="font-size:30px;" ><?= $title ?></p></b>

<?php foreach($posts as $post) : ?>
 
 <p class="blue-text" style="font-size:20px;">Posted By: <?php echo $post['user_name']; ?></p>
 <b><p><?php echo $post['title']; ?></p></b>
 <small>Posted on: <?php echo $post['create_at'];?></small>
 <br>
 <?php echo word_limiter($post['body'],30); ?>
 <br>
 <br>
 <p ><a class="btn white-text" href="<?php echo site_url('posts/'. $post['slug']); ?>">Read More</a></p>
<?php endforeach; ?>

<div class="pagination-link">
<?php echo $this->pagination->create_links(); ?>
</div>

</div>


</body>
</html>
