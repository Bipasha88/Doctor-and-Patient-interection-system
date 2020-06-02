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

    <div class="col s6">
    <p><?= $title ?></p>
    
    <?php echo form_open_multipart('doctor3/upload');?>

    <div>
    <br>
     <input type="file" name="userfile" ?>">
     <?php echo $error; ?>
     </div>

     <p class="purple-text">Use Gmail Profile Photo</p>

     <div>
     <button type="submit" name="submit" value="Upload" class="waves-effect waves-ligh btn-small green">upload photo</button>
     </div>


    </form>
    
    </div>
    </div>
    
    </div>
</body>
</html>