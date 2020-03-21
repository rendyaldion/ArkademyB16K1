<?php
include "connection.php";

if (isset($_POST['add'])) {
	$name = $_POST['name'];
	$price = $_POST['price'];
	$id_cashier = $_POST['id_cashier'];
	$id_category = $_POST['id_category'];

	$add = mysqli_query($conn, "INSERT INTO product(name, price, id_category, id_cashier) VALUES ('$name', '$price', '$id_category', '$id_cashier')");

	if ($add) {
		header("Location: index.php?add=success");
	} else {
		header("Location: index.php?add=fail");
	}
} elseif (isset($_POST['update'])) {
	$id = $_POST['edit_id'];
	$name = $_POST['edit_name'];
	$price = $_POST['edit_price'];
	$id_cashier = $_POST['edit_id_cashier'];
	$id_category = $_POST['edit_id_category'];

	$update = mysqli_query($conn, "UPDATE product SET name = '$name', price = '$price', id_category = '$id_category' , id_cashier = '$id_cashier' WHERE id = '$id'");

	if ($update) {
		header("Location: index.php?update=success");
	} else {
		header("Location: index.php?update=fail");
	}
} elseif (isset($_GET['delete'])) {
	$id = $_GET['delete'];

	$delete = mysqli_query($conn, "DELETE FROM product WHERE id = '$id'");

	if ($delete) {
		header("Location: index.php?delete=success");
	} else {
		header("Location: index.php?delete=fail");
	}
}
?>