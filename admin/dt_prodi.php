<?php
if( empty( $_SESSION['id_user'] ) ){
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {
		echo '
			<div class="container">
			<div class="col-md-10">
				<h3 style="margin-bottom: -20px;">Data Program Studi</h3>
				<br/><hr/>

				<table class="table table-bordered">
				 <thead>
				   <tr class="info">
					 <th width="10%">No</th>
					 <th width="20%">Kode Prodi</th>
					 <th width="30%">Nama Prodi</th>
					 <th width="20%">Akreditasi</th>
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
					 <td>'.$row['akreditasi'].'</td>';
				}
			} 
			echo '
			 	</tbody>
			</table>
			</div>
		</div>';
	}
?>
