<?php
if( empty( $_SESSION['id_user'] ) ){

	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {

	if( isset( $_REQUEST['submit'] )){

		$username = $_REQUEST['username'];
		$password = MD5($_REQUEST['password']);
		$nama = $_REQUEST['nama'];
		$level = $_REQUEST['level'];

		$sql = mysqli_query($koneksi, "INSERT INTO dt_user(username, password, nama, level) VALUES('$username', '$password', '$nama', '$level')");

		if($sql == true){
			header('Location: ./admin.php?hlm=user');
			die();
		} else {
			echo 'ERROR! Periksa penulisan querynya.';
		}
	} else {
?>
<h2>Tambah User Baru</h2>
<hr>
<form method="post" action="" class="form-horizontal" role="form">
	<div class="form-group">
		<label for="username" class="col-sm-2 control-label">Username</label>
		<div class="col-sm-3">
			<input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
		</div>
	</div>
	<div class="form-group">
		<label for="password" class="col-sm-2 control-label">Password</label>
		<div class="col-sm-3">
			<input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
		</div>
	</div>
	<div class="form-group">
		<label for="nama" class="col-sm-2 control-label">Nama User</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama User" required>
		</div>
	</div>
	<div class="form-group">
		<label for="level" class="col-sm-2 control-label">Level User</label>
		<div class="col-sm-3">
			<select name="level" class="form-control" required>
				<option value="">--- Pilih Jenis User ---</option>
				<option value="admin">Admin</option>
				<option value="mahasiswa">Mahasiswa</option>
			</select>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" name="submit" class="btn btn-success">Simpan</button>
			<a href="./admin.php?hlm=user" class="btn btn-danger">Batal</a>
		</div>
	</div>
</form>
<?php
	}
}
?>
