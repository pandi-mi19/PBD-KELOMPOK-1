<?php
if( empty( $_SESSION['id_user'] ) ){
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {

if(isset($_REQUEST['submit'])){

    $id_prodi = $_REQUEST['idprodi'];

    $sql = mysqli_query($koneksi, "DELETE FROM dt_prodi WHERE idprodi='$id_prodi'");
    if($sql == true){
        header("Location: ./admin.php?hlm=prodi");
        die();
    }
    }
}
?>
