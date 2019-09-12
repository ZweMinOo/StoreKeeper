<?php require_once "functions.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php echo $appName; ?></title>
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
	</style>
</head>
<body>
	<div class="jumbotron text-center">
		<h1 class="title"> <?php echo $appName; ?> </h1>
		<p> <?php echo $desp; ?> </p>
	</div>
	<div class="container">
		<h3> Item List </h3>
		<table class="table table-hover">
    		
			<?php
			echo <<<_END
			<thead>
      			<tr>
        			<th>Id</th>
        			<th>Name</th>
        			<th>Price</th>
        			<th>In-Stock</th>
        			<th></th>
        			<td><u><a href="additem.php">Add Item</a></u></td>
      			</tr>
    		</thead>
_END;
			$query = "SELECT * FROM items";
			$result = queryMysql ( $query );
			if ( $result->num_rows > 0 ) {
				while ( $row = $result->fetch_assoc() ) {
					$item = array( $row["id"], $row["name"], $row["price"], $row["instock"] );
					echo "<tr>";
					echo "<td>" . $row["id"] . "</td>";
					echo "<td>" . $row["name"] . "</td>";
					echo "<td>" . $row["price"] . "</td>";
					echo "<td>" . $row["instock"] . "</td>";
					$id = $row['id'] ;
					echo <<<_END
					<td><u><a href='#' onclick='confirmDelete("$id")' class='text-danger'>Delete</a></u></td>
_END;
					echo "<td><u><a href='edititem.php?item=".serialize($item)."'>Edit</a></u></td>";
					echo "</tr>";
		  		}
			}
			else {
				echo "No Items";
			}	
		  	?>
			</tbody>
  		</table>
	</div>
	<div class="jumbotron text-center">
		<a href="http://www.zmozmo.tk">Developed by Zwe Min Oo</a>
	</div>
	<script>
		function confirmDelete ( id ) {
			var isDelete = confirm ( "Are you sure want to delete "+ id +" ?");
			if ( isDelete == true ) {
				window.location.href = "http://localhost:8080/tests/Training%20Room/StoreKeeper/index.php?delete=" +id;
			} else {
				alert("Rejected Deleting!");
			}
		}
	</script>
</body>
</html>
<?php
	if ( isset($_GET['delete']) ){
		$id = sanitizeString ( $_GET['delete'] );
		deleteItem ( $id );
		header ( "Refresh:0; url=index.php" );
	}

	//DEVELOPED BY ZMO
?>