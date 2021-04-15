<?php
require("../sistem/koneksi.php");

$hub = open_connection();
$a = @$_GET["a"];
$id = @$_GET["id"];
$sql = @$_POST["sql"];
switch ($sql) {
	case "create":
		create_prodi();
		break;
	case "update":
		update_prodi();
		break;
	case "delete":
		delete_prodi();
		break;
}
switch ($a) {
	case "list":
		read_data();
		break;
	case "input":
		input_data();
		break;
	case "edit":
		edit_data($id);
		break;
	case "hapus":
		hapus_data($id);
		break;
	default:
		read_data();
		break;
}
mysqli_close($hub);
?>

<?php
function read_data() {
	global $hub;
	$query = "select * from dt_prodi";
	$result = mysqli_query($hub, $query); ?>

	<h2>Read Data Program Studi</h2>
	<table border=1 cellpadding=2>
		<tr>
			<td colspan="5"><a href="19753051_curd_4.php?a=input">INPUT</a></td>
		</tr>
		<tr>
			<td>ID</td>
			<td>KODE</td>
			<td>NAMA PRODI</td>
			<td>AKREDITAS</td>
			<td>AKSI</td>
		</tr>
		<?php while($row = mysqli_fetch_array($result)) { ?>
		<tr>
			<td><?php echo $row['idprodi']; ?></td>
			<td><?php echo $row['kdprodi']; ?></td>
			<td><?php echo $row['nmprodi']; ?></td>
			<td><?php echo $row['akreditasi']; ?></td>
			<td>
				<a href="19753051_curd_4.php?a=edit&id=<?php echo $row ['idprodi']; ?>">EDIT</a>
				<a href="19753051_curd_4.php?a=hapus&id=<?php echo $row ['idprodi']; ?>">HAPUS</a>
			</td>
		</tr>
		<?php } ?>
	</table>
<?php } ?>

<?php
function input_data() {
	$row = array(
			"kdprodi" => "",
			"nmprodi" => "",
			"akreditasi" => "-"
		); ?>

	<h2>Input Data Program Studi</h2>
	<form action="19753051_curd_4.php?a=list" method="post"> 
		<input type="hidden" name="sql" value="create"> 
		Kode Prodi
		<input type="text" name="kdprodi" maxlength="6" size="6" value="<?php echo trim($row["kdprodi"]) ?>" />
		<br>
		Nama Prodi
		<input type="text" name="nmprodi" maxlength="70" size="70" value="<?php echo trim($row["nmprodi"]) ?>" />
		<br>
		Akreditasi Prodi
		<input type="radio" name="akreditasi" value="-" <?php if($row["akreditasi"]=='-' || $row["akreditasi"]=='') { echo "checked=\"checked\""; } else {echo "";} ?>> -
		<input type="radio" name="akreditasi" value="A" <?php if($row["akreditasi"]=='A') { echo "checked=\"checked\""; } else {echo "";} ?>> A
		<input type="radio" name="akreditasi" value="B" <?php if($row["akreditasi"]=='B') { echo "checked=\"checked\""; } else {echo "";} ?>> B
		<input type="radio" name="akreditasi" value="C" <?php if($row["akreditasi"]=='C') { echo "checked=\"checked\""; } else {echo "";} ?>> C
		<br>
		<input type="submit" name="action" value="Simpan">
		<br>
		<a href="19753051_curd_4.php?a=list">Batal</a>
	</form>
<?php } ?>

<?php
function edit_data($id) {
	global $hub;
	$query = "select * from dt_prodi where idprodi = $id";
	$result = mysqli_query($hub, $query);
	$row = mysqli_fetch_array($result); ?>

	<h2>Edit Data Program Studi</h2>
	<form action="19753051_curd_4.php?a=list" method="post">
		<input type="hidden" name="sql" value="update">
		<input type="hidden" name="idprodi" value="<?php echo trim($id) ?>">
		Kode Prodi
		<input type="text" name="kdprodi" maxlength ="6" size="6" value="<?php echo trim($row["kdprodi"]) ?>" />
		<br>
		Nama Prodi
		<input type="text" name="nmprodi" maxlength ="70" size="70" value="<?php echo trim($row["nmprodi"]) ?>" />
		<br>
		Akreditasi Prodi
		<input type="radio" name="akreditasi" value="-" <?php if ($row["akreditasi"]=="-" || $row["akreditasi"]=='') { echo "checked=\"checked\""; } else {echo ""; } ?>> -
		<input type="radio" name="akreditasi" value="A" <?php if ($row["akreditasi"]=='A') {echo "checked=\"checked\""; } else {echo "";} ?> > A
		<input type="radio" name="akreditasi" value="B" <?php if ($row["akreditasi"]=='B') {echo "checked=\"checked\""; } else {echo "";} ?> > B
		<input type="radio" name="akreditasi" value="C" <?php if ($row["akreditasi"]=='C') {echo "checked=\"checked\""; } else {echo "";} ?> > C
		<br>
		<input type="submit" name="action" value="Simpan">
		<br>
		<a href="19753051_curd_4.php?a=list">Batal</a>
	</form>
<?php } ?>

<?php
function hapus_data($id) {
	global $hub;
	$query = "select * from dt_prodi where idprodi = $id";
	$result = mysqli_query($hub, $query);
	$row = mysqli_fetch_array($result); ?>

	<h2> Hapus Data Program Studi </h2>
	<form action="19753051_curd_4.php?a=list" method="post">
		<input type="hidden" name="sql" value="delete">
		<input type="hidden" name="idprodi" value="<?php echo trim($id) ?>">
		<table>
			<tr>
				<td width=100>Kode</td>
				<td><?php echo trim($row["kdprodi"]) ?></td>
			</tr>
			<tr>
				<td>Nama Prodi<td>
				<td><?php echo trim($row["nmprodi"]) ?></td>
			</tr>
			<tr>
				<td>Akreditasi<td>
				<td><?php echo trim($row["akreditasi"]) ?></td>
			</tr>
		</table>
		<br>
		<input type="submit" name="action" value="Hapus">
		<br>
		<a href="19753051_curd_4.php?a=list">Batal</a>
	</form>
<?php } ?>

<?php
function create_prodi() {
	global $hub;
	global $_POST;
	$query = "INSERT INTO dt_prodi (kdprodi, nmprodi, akreditasi) VALUES ";
	$query .= " (' " .$_POST["kdprodi"]."', '".$_POST["nmprodi"]."','".$_POST["akreditasi"]."')";
	mysqli_query ($hub, $query) or die (mysqli_error($hub, $query));
}

function update_prodi() {
	global $hub;
	global $_POST;
	$query = "UPDATE dt_prodi";
	$query .= " SET kdprodi='".$_POST["kdprodi"]."', nmprodi='". $_POST["nmprodi"]."', akreditasi='".$_POST["akreditasi"]."'";
	$query .= " WHERE idprodi = ".$_POST["idprodi"];
	mysqli_query($hub, $query) or die(mysqli_error($hub, $query));
}

function delete_prodi() {
	global $hub;
	global $_POST;
	$query = "DELETE FROM dt_prodi";
	$query .= " WHERE idprodi = ".$_POST["idprodi"];
	mysqli_query($hub, $query) or die(mysqli_error($hub, $query));
}
?>