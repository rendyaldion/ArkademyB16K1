<?php
include("connection.php");

$query = mysqli_query($conn, "SELECT product.id AS id, cashier.name AS cashier, product.name AS product, category.name AS category, product.price AS price FROM product INNER JOIN category ON product.id_category = category.id INNER JOIN cashier ON product.id_cashier = cashier.id");
$getCashier = mysqli_query($conn, "SELECT * FROM cashier");
$getCategory = mysqli_query($conn, "SELECT * FROM category");
?>

<!DOCTYPE html>
<html>
<head>
	<title>6C | Test Bootcamp Arkademy</title>
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
	<style>
		body{
			background: #ffffff;
		}

		.navbar {
			background-color: #fffefe;
		}
		img {
			height: 40px;
		}
		.navbar .form-group {
			position: relative;
			margin: 0 auto;
		}
		.navbar .form-control {
			background-color: #cecece;
			width: 800px;
		}
		.btn-add {
			background-color: #fadc9c;
		}

		thead {
			background-color: #fadc9c;
		}
	</style>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light shadow-lg">
		<a class="navbar-brand" href="#">
			<img src="assets/logo-arkademy.svg" alt="Logo Arkademy">
		</a>
  		<div class="form-group">
  			<input type="text" class="form-control" placeholder="Search ...">
  		</div>
  		<div class="form-group">
  			<a data-toggle="modal" href="#addModal" class="btn btn-add btn-lg text-light" type="button">ADD</a>
  		</div>
	</nav>

	<div class="container mt-5">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>No</th>
					<th>Cashier</th>
					<th>Product</th>
					<th>Category</th>
					<th>Price</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php $no = 1; ?>
				<?php foreach ($query as $data) : ?>
				<tr>
					<th><?= $no ++ ?></th>
					<td><?= $data['cashier'] ?></td>
					<td><?= $data['product'] ?></td>
					<td><?= $data['category'] ?></td>
					<td>Rp. <?= number_format($data['price'], 0, '', '.') ?></td>
					<td>
						<a href="#editModal-<?= $data['id'] ?>" data-toggle="modal" class="btn btn-success btn-sm">Edit</a>
						<a href="function.php?delete=<?= $data['id'] ?>" class="btn btn-danger btn-sm">Remove</a>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>

	<!-- Modal add -->
	<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">ADD</h5>
	        <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	      	<form method="post" action="function.php">
	      		<div class="form-group">
	      			<select class="form-control" name="id_cashier">
	      				<?php foreach ($getCashier as $cashier) : ?>
	      				<option value="<?= $cashier['id'] ?>"><?= $cashier['name'] ?></option>
	      				<?php endforeach; ?>
	      			</select>
	      		</div>
	      		<div class="form-group">
	      			<select class="form-control" name="id_category">
	      				<?php foreach ($getCategory as $category) : ?>
	      				<option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
	      				<?php endforeach; ?>
	      			</select>
	      		</div>
	      		<div class="form-group">
	      			<input type="text" placeholder="Ice Tea" name="name" class="form-control">
	      		</div>
	      		<div class="form-group">
	      			<input type="number" placeholder="10000" name="price" class="form-control">
	      		</div>
	      		<div class="form-group">
	      			<button type="submit" name="add" class="btn btn-add float-right text-light">ADD</button>
	      		</div>
	      	</form>
	      </div>
	    </div>
	  </div>
	</div>

	<?php foreach ($query as $data) : ?>
	<!-- Modal edit -->
	<div class="modal fade" id="editModal-<?= $data['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">EDIT</h5>
	        <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	      	<form method="post" action="function.php">
	      		<div class="form-group">
	      			<select class="form-control" name="edit_id_cashier">
	      				<?php foreach ($getCashier as $cashier) : ?>
	      				<option value="<?= $cashier['id'] ?>" <?= $data['cashier'] == $cashier['name'] ? 'selected' : '' ?>><?= $cashier['name'] ?></option>
	      				<?php endforeach; ?>
	      			</select>
	      		</div>
	      		<div class="form-group">
	      			<select class="form-control" name="edit_id_category">
	      				<?php foreach ($getCategory as $category) : ?>
	      				<option value="<?= $category['id'] ?>" <?= $data['category'] == $category['name'] ? 'selected' : '' ?>><?= $category['name'] ?></option>
	      				<?php endforeach; ?>
	      			</select>
	      		</div>
	      		<div class="form-group">
	      			<input type="text" placeholder="Ice Tea" value="<?= $data['product'] ?>" name="edit_name" class="form-control">
	      		</div>
	      		<div class="form-group">
	      			<input type="number" placeholder="10000" value="<?= $data['price'] ?>" name="edit_price" class="form-control">
	      		</div>
	      		<div class="form-group">
	      			<input type="hidden" name="edit_id" value="<?= $data['id'] ?>">
	      			<button type="submit" name="update" class="btn btn-add float-right text-light">EDIT</button>
	      		</div>
	      	</form>
	      </div>
	    </div>
	  </div>
	</div>
	<?php endforeach; ?>

	<script src="assets/js/jquery.slim.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/bootstrap/js/bootstrap.js"></script>
</body>
</html>