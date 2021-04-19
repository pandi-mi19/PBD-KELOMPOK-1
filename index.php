<?php
    //memulai session
    session_start();

    //jika ada session, maka akan diarahkan ke halaman dashboard admin
    if(isset($_SESSION['id_user'])){

        //mengarahkan ke halaman dashboard admin
        header("Location: admin/admin.php");
        die();
    }

    //mengincludekan koneksi database
    include "koneksi/koneksi.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Kelompok-1</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="icon" href="assets/img/login-icon.gif">
	<style>
	body {
	background: url(assets/img/bgrn.jpg);
	background-size: cover;
	background-position : center;
	background-repeat: no-repeat;
	background-attachment: fixed;
	}
	</style>
  </head>
  <body>
    <div class="container">
	<?php

    //apabila tombol login di klik akan menjalankan skript dibawah ini
	if( isset( $_REQUEST['login'] ) ){

        //mendeklarasikan data yang akan dimasukkan ke dalam database
		$username = $_REQUEST['username'];
		$password = $_REQUEST['password'];

        //skript query ke insert data ke dalam database
		$sql = mysqli_query($koneksi, "SELECT id_user, username, nama, level FROM dt_user WHERE username='$username' AND password=MD5('$password')");

        //jika skript query benar maka akan membuat session
		if( $sql){
			list($id_user, $username, $nama, $level) = mysqli_fetch_array($sql);

            //membuat session
            $_SESSION['id_user'] = $id_user;
			$_SESSION['username'] = $username;
			$_SESSION['nama'] = $nama;
			$_SESSION['level'] = $level;

			header("Location:admin/admin.php");
			die();
		} else {

			$_SESSION['err'] = '<strong>ERROR!</strong> Username dan Password tidak ditemukan.';
			header('Location: ./');
			die();
		}

	} else {
	?>
	<div class="login">
		<div class="icon"><img src="assets/img/polinela.png" alt=""></div>
		<div class="judul j-biru" style="background: #fff;">
			<h3>SISTEM INFORMASI DATA PROGRAM STUDI</h3>
		</div>
	<div class="form-login">
		<h3>LOGIN APLIKASI</h3>
		<label for=""></label>
		<form action="" method="post" role="form" class="full">
		<?php
		if(isset($_SESSION['err'])){
			$err = $_SESSION['err'];
			echo '<div class="alert alert-warning alert-message">'.$err.'</div>';
            unset($_SESSION['err']);
		}
		?>
			<table class="full">
			<label for="">Username</label>
			<input type="text" name="username" placeholder="Username" required="" class="full">
			<label for="">Password</label>
			<input type="password" name="password" placeholder="Password" required="" class="full">
			<br><br>
			<label for=""></label>
			<input type="submit" name="login" value="Login" class="full hijau">
			
		</form>
	</div>
	</div>
	<?php
	}
	?>
    </div> <!-- /container -->

	<!-- Bootstrap core JavaScript, Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

	<script type="text/javascript">
		$(".alert-message").alert().delay(3000).slideUp('slow');
	</script>
  </body>
</html>
