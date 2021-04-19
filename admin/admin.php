<?php
session_start();
if( empty( $_SESSION['id_user'] ) ){
	//session_destroy();
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {
	include "../koneksi/koneksi.php";
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
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
	<link href="../assets/css/jquery-ui.min.css" rel="stylesheet">
	<link rel="icon" href="assets/img/login-icon.gif">

    <script src="../assets/js/jquery.min.js"></script>


	<style type="text/css">
	body {
	  min-height: 200px;
	  padding-top: 70px;
	}
   @media print {
	   .container {
		   margin-top: -30px;
	   }
	   #tombol,
      .noprint {
         display: none;
      }
   }
	</style>

  </head>

  <body>

    <?php include "menu.php"; ?>

    <div class="container">

	<?php
	if( isset($_REQUEST['hlm'] )){

		$hlm = $_REQUEST['hlm'];
		switch( $hlm ){
			case 'user':
				include "user.php";
				break;
			case 'prodi':
				include "prodi.php";
				break;
			case 'dt_prodi':
				include "dt_prodi.php";
				break;
		}
	} else {
	?>
      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
        <h2>Selamat Datang di Sistem Informasi Data Program Studi</h2>

        <p>Halo <strong><?php echo $_SESSION['nama']; ?></strong>, Anda login sebagai
			<strong>
			<?php
				if($_SESSION['level'] == "admin"){
					echo 'Admin.';
				} else if($_SESSION['level'] == "mahasiswa") {
						echo 'Mahasiswa.';
				}
			?>
			</strong>
		</p>
      </div>
	<?php
	}
	?>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript, Placed at the end of the document so the pages load faster -->
    <script src="../assets/js/bootstrap.min.js"></script>
	<script src="../assets/js/jquery-ui.min.js"></script>

  </body>

</html>
<?php
}
?>