 <?php require_once "functions.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Add Item</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="Keywords" content="contant,keeper,contant keeper, saver, contact saver">
	<meta name="Description" content="This app is developed to keep the users' contants in a database">
	<link rel="icon" href="https://media.glassdoor.com/sqll/363091/sk-squarelogo-1424775218188.png" type="image/x-icon">
	<!-- LOCAL BOOTSTRAP -->
	<link rel="stylesheet" type="text/CSS" href="http://localhost:8080/assets/bootstrap/4.3.1-dist/css/bootstrap.min.css"/>
	<script src="http://localhost:8080/assets/bootstrap/4.3.1-dist/js/bootstrap.min.js"></script>
	<!-- CDN BOOTSTRAP (NEED ONLINE) -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<style>
	.title {
		text-shadow: gray 2px 10px 5px;
	}
	.wall {
		width: 400px;
	}
	</style>
</head>
<body>
	<div class="jumbotron text-center">
		<h1 class="title"> <?php echo $appName; ?> </h1>
		<p> <?php echo $desp; ?> </p>
	</div>
	<div class="container">
		<div class="wall mx-auto">
			<h3> Add Item </h3>
			<form action="additem.php" method="POST">
			<table class="table">
				<?php
					echo <<<_END
					<tr>
						<td><label for="id">Id</label></td>
						<td><input type="text" class="form-control" id="itemId" name="itemId"></td>
					</tr>
					<tr>
						<td><label for="name">Name</label></td>
						<td><input type="text" class="form-control" id="name" name="name"></td>
					</tr>
					<tr>
						<td><label for="price">Price</label></td>
						<td><input type="text" class="form-control" id="price" name="price"></td>
					</tr>
					<tr>
						<td><label for="instock">In-Stock</label></td>
						<td><input type="text" class="form-control" id="instock" name="instock"></td>
					</tr>
					<tr>
						<td><button type="reset" class="btn btn-danger">Cancel</button></td>
						<td><button type="submit" class="btn btn-primary">Add</button></td>
					</tr>
					<tr>
						<td><a href="index.php"><u>Exit Adding</u></a></td>
					</tr>
_END;
			  	?>
				</tbody>
	  		</table>
	  		</form>
	  	</div>
	</div>
	<div class="jumbotron text-center">
		<a href="http://www.zmozmo.tk">Developed by Zwe Min Oo</a>
	</div>
</body>
</html>
<?php
	if ( isset( $_POST['itemId']) ){
		$id = sanitizeString ( $_POST['itemId'] );
		$name = sanitizeString ( $_POST['name'] );
		$price = sanitizeString ( $_POST['price'] );
 		$instock = sanitizeString ( $_POST['instock'] );
		addItem ( $id, $name, $price, $instock );
		header ( "Refresh:0; url=index.php" );
	}

	//DEVELOPED BY ZMO
?>