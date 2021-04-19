<?php
if( empty( $_SESSION['id_user'] ) ){

	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {
	if( isset( $_REQUEST['aksi'] )){
		$aksi = $_REQUEST['aksi'];
		switch($aksi){
			case 'baru':
				include 'prodi_baru.php';
				break;
			case 'edit':
				include 'prodi_edit.php';
				break;
			case 'hapus':
				include 'prodi_hapus.php';
				break;
		}
	} else {
		echo '
			<div class="container">
			<div class="col-md-10">
				<h3 style="margin-bottom: -20px;">Data Program Studi</h3>
					<a href="./admin.php?hlm=prodi&aksi=baru" class="btn btn-success btn-s pull-right">Tambah Data</a>
				<br/><hr/>

				<table class="table table-bordered">
				 <thead>
				   <tr class="info">
					 <th width="10%">No</th>
					 <th width="20%">Kode Prodi</th>
					 <th width="30%">Nama Prodi</th>
					 <th width="20%">Akreditasi</th>
					 <th width="35%">Tindakan</th>
				   </tr>
				 </thead>
				 <tbody>';

			//skrip untuk menampilkan data dari database
		 	$sql = mysqli_query($koneksi, "SELECT * FROM dt_prodi");
		 	if(mysqli_num_rows($sql) > 0){
		 		$no = 0;

				 while($row = mysqli_fetch_array($sql)){
	 				$no++;
	 			echo '
				   <tr>
					 <td>'.$no.'</td>
					 <td>'.$row['kdprodi'].'</td>
					 <td>'.$row['nmprodi'].'</td>
					 <td>'.$row['akreditasi'].'</td>
					 <td>
					<script type="text/javascript" language="JavaScript">
					  	function konfirmasi(){
						  	tanya = confirm("Anda yakin akan menghapus Data ini?");
						  	if (tanya == true) return true;
						  	else return false;
						}
					</script>
					 <a href="?hlm=prodi&aksi=edit&idprodi='.$row['idprodi'].'" class="btn btn-warning btn-s">Edit</a>
					 <a href="?hlm=prodi&aksi=hapus&submit=yes&idprodi='.$row['idprodi'].'" onclick="return konfirmasi()" class="btn btn-danger btn-s">Hapus</a>

					 </td>';
				}
			} else {
				 echo '<td colspan="8"><center><p class="add">Tidak ada data untuk ditampilkan. <u><a href="?hlm=prodi&aksi=baru">Tambah data baru</a></u> </p></center></td></tr>';
			}
			echo '
			 	</tbody>
			</table>
			</div>
		</div>';
	}
}
?>
