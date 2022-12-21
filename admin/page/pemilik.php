<?php
$update = (isset($_GET['action']) AND $_GET['action'] == 'update') ? true : false;
if ($update) {
	$sql = $connection->query("SELECT * FROM pemilik WHERE id_pemilik='$_GET[key]'");
	$row = $sql->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if ($update) {
		$sql = "UPDATE pemilik SET nama='$_POST[nama]', alamat='$_POST[alamat]', telepon='$_POST[telepon]', email='$_POST[email]', username='$_POST[username]', password='".md5($_POST["password"])."' WHERE id_pemilik='$_GET[key]'";
	} else {
		$sql = "INSERT INTO pemilik VALUES (NULL, '$_POST[nama]', '$_POST[alamat]', '$_POST[telepon]', '$_POST[email]', '$_POST[username]', '".md5($_POST["password"])."')";
	}
  if ($connection->query($sql)) {
    echo alert("Berhasil!", "?page=pemilik");
  } else {
		echo alert("Gagal!", "?page=pemilik");
  }
}

if (isset($_GET['action']) AND $_GET['action'] == 'delete') {
  $connection->query("DELETE FROM pemilik WHERE id_pemilik='$_GET[key]'");
	echo alert("Berhasil!", "?page=pemilik");
}
?>
<div class="container">
	<div class="page-header">
		<h2>Daftar <small>pemilik kost!</small></h2>
	</div>
		<div class="col-md-13">
				<div class="panel panel-info">
					<div class="panel-heading"><h3 class="text-center">DAFTAR</h3></div>
					<div class="panel-body">
							<table class="table table-condensed">
									<thead>
											<tr>
													<th>No</th>
													<th>Nama</th>
													<th>Alaamt</th>
													<th>Email</th>
													<th>Telepon</th>
													<th>Username</th>
													<th></th>
											</tr>
									</thead>
									<tbody>
											<?php $no = 1; ?>
											<?php if ($query = $connection->query("SELECT * FROM pemilik")): ?>
													<?php while($row = $query->fetch_assoc()): ?>
													<tr>
															<td><?=$no++?></td>
															<td><?=$row['nama']?></td>
															<td><?=$row['alamat']?></td>
															<td><?=$row['email']?></td>
															<td><?=$row['telepon']?></td>
															<td><?=$row['username']?></td>
															<td>
																<div class="btn-group">
																	<a href="?page=pemilik&action=update&key=<?=$row['id_pemilik']?>" class="btn btn-warning btn-xs">Ubah</a>
																	<a href="?page=pemilik&action=delete&key=<?=$row['id_pemilik']?>" class="btn btn-danger btn-xs">Hapus</a>
																</div>
															</td>
													</tr>
													<?php endwhile ?>
											<?php endif ?>
									</tbody>
							</table>
					</div>
			</div>
		</div>
	</div>
</div>
