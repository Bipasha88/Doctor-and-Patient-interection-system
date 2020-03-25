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

 <br>
 <br>
 <br>
 <b><p class="blue-text center" style="font-size:30px;">Edit Profile</p></b>



 <?php echo form_open('doctors/editprofile'); ?>
    <div>
    <label for="">Name</label>
     <input type="text" name="name" >
     <?php echo form_error('name', '<div class="error">', '</div>')?>
     </div>

     <div>
    <label for="">Educational Qualification</label>
     <input type="text" name="education" id="username">
     
     </div>

     <div>
    <label for="">Phone No</label>
     <input type="text" name="num" id="username">
     </div>

     <div>
    <label for="">Live in</label>
     <input type="text" name="home" id="username">
     </div>


  <br>

     <div>
     <button type="submit" name="register" class="waves-effect waves-ligh btn-small green center">Edit Profile</button>
     </div>
    </form>

    </div>
    </div>
    </div>

    
</body>
</html>