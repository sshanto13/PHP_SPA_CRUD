<?php include('server.php');
//fetch the record to be update
if (isset($_GET['edit'])) {
	$id = $_GET['edit'];
    $edit_state= true;
	$rec = mysqli_query($db, "SELECT * FROM infor WHERE id=$id");
	$record = mysqli_fetch_array($rec);
	$name = $record['name'];
	$address = $record['address'];
    $id = $record['id'];

}
?>
<!DOCTYPE html>
<html>
<head>
	<title>PHP Crud</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div style="overflow-x:auto;"">
	<?php if(isset($_SESSION['msg'])): ?>
		<div class="msg">
			<?php 
                echo $_SESSION['msg'];
				unset ($_SESSION['msg']);
              
			 ?>
			
		</div>

    <?php endif ?>
<table>
	<thead>
		<tr><th>Name</th>
			<th>Address</th>
			<th>Update</th>
			<th>Delete</th>
			<tr></tr>
	</thead>
	<tbody>
		<?php while ($row = mysqli_fetch_array($results)) {?>
			
		
		<tr>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['address']; ?></td>
			<td>
				<a class="edit_btn" href="index.php?edit=<?php echo $row['id']; ?>">Edit</a>
			</td>
			<td><a class="delete_btn" href="server.php?del=<?php echo $row['id']; ?>">Delete</a></td>
		</tr>
		
		<?php } ?>
	</tbody>
</table>

<form method="post" action="server.php">
	<input type="hidden" name="id" value="<?php echo $id; ?>">
	<div class="input-group">
		<label>Name</label>
		<input type="text" name="name" value="<?php echo $name; ?>">
	
    </div>
    <div class="input-group">
		<label>Address</label>
		<input type="text" name="address" value="<?php echo $address; ?>">
	
    </div>
    <div class="input-group">
        <?php if ($edit_state == true): ?> 
<button type="submit" name="update" class="btn" style="background: #777">Update</button>
         <?php else: ?>
<button type="submit" name="save" class="btn">save</button>
	     <?php endif ?>
    </div>
</form>
<footer>
	<p style="text-align: center;">by Shantonu Suman<p>
</footer>

</div>
</body>
</html>