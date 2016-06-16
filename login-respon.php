<?php
	session_start();
	$username = $_POST['username'];
	$password = $_POST['password'];

	if ( ($username=="admin") && ($password=="1234"))
	{
		$_SESSION['username'] = $username; //HARUS KAPITAL


		/*echo "<p>Selamat datang <b>".$username."</b></p>";
		echo "<p>Berikut ini menu navigasi Anda</p>";
		echo "<p>	<a href='muslim1/index.php'>HOME</a>
				<a href='hal2.php'>Menu 2</a>
				<a href='hal3.php'>Menu 3</a></p>";*/

		/*session_start();
		session_register("user");
		session_register("password");*/
		
			header('Location: ./admin/gamis.php');
	}else{
		
	session_start();
	//unset($_SESSION['loginsaya']);
	session_destroy(); 

	$logingagal = "http://localhost/chocolate/login.html";
	header("Location: $logingagal");

	}

	/*}
	else
	{	echo "maaf login anda salah <br>";
		echo "kembali ke <a href='login.php'>login</a>";
 	}*/
?>