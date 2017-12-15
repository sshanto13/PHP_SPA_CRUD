<?php
//display notificatuon messege
session_start();

//initialize variable

$name ="";
$address ="";
$id =0;
$edit_state= false;

//connect to database
$db = mysqli_connect('localhost', 'root', '', 'php_crud');

//if save button is clicked
if (isset($_POST['save'])) {
	# code...
	$name = $_POST['name'];
	$address = $_POST['address'];

	$query = "INSERT INTO infor (name, address) VALUES ('$name', '$address')";
	$_SESSION['msg']="address saved successfully!";
	mysqli_query($db,$query);
	header('location: index.php');//redirect to index page after inserting data
}

// update data

if (isset($_POST['update'])) {
	$name = $_POST['name'];
	$address = $_POST['address'];
    $id = $_POST['id'];

    mysqli_query($db, "UPDATE infor SET name='$name', address='$address' WHERE id='$id'");
	$_SESSION['msg']= "address updated successfully!";
	header('location:index.php');
}

// delete data
if (isset($_GET['del'])) {
	$id=$_GET['del'];
	mysqli_query($db, "DELETE FROM infor WHERE id=$id");
    $_SESSION['msg']= "address deleted successfully!";
	header('location:index.php');

}

// retrive data

$results = mysqli_query($db, "SELECT * FROM infor");
?>