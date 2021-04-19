<?php
if( empty( $_SESSION['id_user'] ) ){
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {
	if( isset( $_REQUEST['submit'] )){
		$id_prodi = $_REQUEST['idprodi'];
		$kdprodi = $_REQUEST['kdprodi'];
		$nmprodi = $_REQUEST['nmprodi'];
		$akreditasi = $_REQUEST['akreditasi'];
		$sql = mysqli_query($koneksi, "UPDATE dt_prodi SET kdprodi='$kdprodi', nmprodi='$nmprodi', akreditasi='$akreditasi' WHERE idprodi='$id_prodi'");
		if($sql == true){
			header('Location: ./admin.php?hlm=prodi');
			die();
		} else {
			echo 'ERROR! Periksa penulisan querynya.';
		}
	} else {
		$id_prodi = $_REQUEST['idprodi'];
		$sql = mysqli_query($koneksi, "SELECT * FROM dt_prodi WHERE idprodi='$id_prodi'");
		while($row = mysqli_fetch_array($sql)){
?>
<h2>Edit Data Prodi</h2>
<hr>
<form method="post" action="" class="form-horizontal" role="form">
	<div class="form-group">
		<label for="kdprodi" class="col-sm-2 control-label">Kode Prodi</label>
		<div class="col-sm-4">
			<input type="hidden" name="id_prodi" value="<?php echo $row['idprodi']; ?>">
			<input type="text" class="form-control" id="kdprodi" value="<?php echo $row['kdprodi']; ?>" name="kdprodi" placeholder="Kode Prodi" required>
		</div>
	</div>
	<div class="form-group">
		<label for="nmprodi" class="col-sm-2 control-label">Nama Prodi</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="nmprodi" value="<?php echo $row['nmprodi']; ?>" name="nmprodi" placeholder="Nama Prodi" required>
		</div>
	</div>
	<div class="form-group">
		<label for="akreditasi" class="col-sm-2 control-label">Akreditasi</label>
		<div class="col-sm-3">
			<select name="akreditasi" class="form-control" required>
				<option value="<?php echo $row['akreditasi']?>">
				<?php
					$akreditasi = $row['akreditasi'];
					if($akreditasi == "A"){
						echo 'A';
					}else if($akreditasi == "B"){
						echo 'B';
					}else if($akreditasi == "C"){
						echo 'C';
					}else {
						echo '-';
					}
				?>
				</option>
				<option value="A">A</option>
				<option value="B">B</option>
				<option value="C">C</option>
				<option value="-">-</option>
			</select>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" name="submit" class="btn btn-success">Simpan</button>
			<a href="./admin.php?hlm=prodi" class="btn btn-danger">Batal</a>
		</div>
	</div>
</form>
<?php
	}
	}
}
?>