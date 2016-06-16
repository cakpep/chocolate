<?php
	session_start();
	unset($_SESSION['loginsaya']);
	session_destroy(); 

	$alamat = "http://localhost/chocolate/gamis.php";
	header("Location: $alamat");
 
?>
