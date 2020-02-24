
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

<?php foreach($posts as $post) : ?>
 <h3><?php echo $post['title']; ?></h3>
 <small>Posted on: <?php echo $post['create_at'];?></small>
 <br>
 <?php echo word_limiter($post['body'],30); ?>
 <br>
 <br>
 <p><a href="<?php echo site_url('posts/'. $post['slug']); ?>">Read More</a></p>
<?php endforeach; ?>
</div>

</body>
</html>
