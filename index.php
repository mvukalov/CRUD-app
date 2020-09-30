<!DOCTYPE html>
<head>
<meta charset="utf8">
<title>crud</title>
<link rel ="stylesheet" type="text/css"
href="boot.css" />
</head>
<body>
    <?php require_once 'baza.php'; ?>
    <?php
    if (isset($_SESSION['message'])): ?>
<div class="alert alert-<?=$_SESSION['msg_type']?>">
<?php
echo ($_SESSION['message']);
unset($_SESSION['message']);
?>
</div>
<?php endif ?>
    <div class="container">
    <?php
     $mysqli= new mysqli('localhost','root','','crud')or  die (mysqli_error($mysqli));
     $result= $mysqli->query("SELECT* FROM data")or die($mysqli->error);
     //pre_r($result);
     ?>
     <div class="row justify-content-center">
         <table class="table">
             <thead>
                 <tr>
<th>Name</th>
<th>Location</th>
<th colspan="2">Action</th>

</tr>
</thead>

<?php
while ($row=$result->fetch_assoc()):?>
<tr>
    <td><?php echo$row ['ime']; ?> </td>
    <td><?php echo$row ['lokacija']; ?> </td>
    <td>
    <a href="index.php?edit=<?php echo $row['id'];?>"
        class="btn btn-info">Edit</a> 
        
        <a href="baza.php?delete=<?php echo $row['id'];?>"
        class="btn btn-danger">Delete</a>
</td>
</tr>

<?php endwhile; ?>




</table>
</div>


<div class="row justify-content-center">
<form method="POST" action="baza.php">
<input type ="hidden" name="id" value="<?php echo $id;?>">
<div class="form-group">
<label>ime:</label>
<input type="text"  class="form-control" name="ime" value="<?php echo $ime;?>">
</div>
<div class="form-group">

<label>lokacija:</label>
<input type="text" class="form-control" name="lokacija"  value="<?php echo $lokacija;?>" ><br>
</div>
<div class="form-group">
<?php
if($update==true):
    ?>
    <input type="submit" class="btn btn-info" value="edit" name="update">
<?php else: ?>
<input type="submit" class="btn btn-info"   value="unesi" name="unesi">
<?php endif; ?>
</div>




</form>
</div>
    </div>

</body>

</html>