<?php
	//Details
	$appName = "Store Keeper";
	$desp = "Manage your store";
	$dbHost = "localhost";
	$dbUser = "root";
	$dbPass = "";
	$dbName = "storekeeper";
	$version = "V1.0.0";
	$released_date = "9-12-2019";

	//Create Connection
	$conn = new mysqli ( $dbHost, $dbUser, $dbPass, $dbName );

	if ( $conn->connect_error ) {
		die ( "Connection failed : " . $conn->connect_error );
	}

	//To execute query
	function queryMysql ( $query ) {
		global $conn;
		$result = $conn->query ( $query );
		if ( !$result ) die ( $conn->error );
		return $result;
	}

	//Inserting item to database
	function addItem ( $id, $name, $price, $instock ) {
		if ( empty($price) ) {
			$price = 0;
		}
		if ( empty($instock) ) {
			$instock = 0;
		}
		if( !empty($name) ) {
			$query = "INSERT INTO items VALUES ( '$id', '$name', '$price', '$instock' )";
			$result = queryMysql ( $query );
			if ( $result > 0 ) {
				echo "<script> alert ( 'Item added completely.' ); </script>";
			} 
			else {
				echo "<script> alert ( 'Incompleted!' ); </script>";
			}
		}
		else {
			echo "<script> alert ( 'Cannot leave NAME field empty.Try Again!' ); </script>";
		}
		
	}

	//Deleting item from database
	function deleteItem ( $id ) {
		$query = "DELETE FROM items WHERE id = '" . $id . "' ";
		$result = queryMysql ( $query );
		if ( $result > 0 ) {
			echo "<script> alert(' Item deleted'); </script>";
		} 
		else {
			echo "<script> alert('Delete Failed'); </script>";
		}
		header ( "Refresh:0; url=index.php" );
	}

	//Editing item from database
	function editItem ( $item ) {
		$id = $item[0];
		$name = $item[1];
		$price = $item[2];
		$instock = $item[3];
		$query = "UPDATE items SET id = '$id', name = '$name', price = '$price', instock = '$instock' WHERE id = '$id' ";

		$result = queryMysql ( $query );
		if ( $result > 0 ) {
			echo "<script> alert( 'Item updated' ); </script>";
		} 
		else {
			echo "<script> alert ( 'Item update failed' ); </script>";
		}
	}

	// Filtering statements
	function sanitizeString ( $var ) 
	{
	    global $conn;
	    $var = strip_tags ( $var );
	    $var = htmlentities ( $var );
	    $var = stripslashes ( $var );
	    return $conn->real_escape_string ( $var );
	}

	//DEVELOPED BY ZMO
?>