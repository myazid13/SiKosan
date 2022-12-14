<?php require_once("config.php");
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST["login"])) {
    $sql = "SELECT * FROM pemilik WHERE username='$_POST[username]' AND password='".md5($_POST["password"])."'";
    if ($query = $connection->query($sql)) {
        if ($query->num_rows) {
            while ($data = $query->fetch_array()) {
              $_SESSION["is_logged"] = true;
              $_SESSION["id"] = $data["id_pemilik"];
              $_SESSION["nama"] = $data["nama"];
              $_SESSION["username"] = $data["username"];
            }
            header('location: ?page=kost');
        } else {
            echo alert("Username / Password tidak sesuai!", "index.php");
        }
    } else {
        echo "Query error!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Anggota Kelompok</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <link rel="stylesheet" href="style.css">
<body>
  <div class="container">
    <div class="row text-center">
      <h2>ANGGOTA KELOMPOK</h2>
    </div>
  </div>

  
	<div class="container mt-5">
		<div class="row">
			<div class="col-md-3 col-sm-6">
				<div class="our-team">
					<div class="rounded-circle">
						<img src="/img/kucing.jpg" alt="foto1">
					</div>
					<div class="team-content">
						<h3 class="title">Shafa Alinka</h3>
						<span class="post">Design Graphic</span>
					</div>
					<ul class="social">
 
						<li><a href="" class="fab fa-facebook-f"></a></li>
						<li><a href="" class="fab fa-instagram"></a></li>
						<li><a href="" class="fab fa-linkedin-in"></a></li>
						<li><a href="" class="fab fa-twitter"></a></li>
 
					</ul>
				</div>
			</div>
			<div class="col-md-3 col-sm-6">
				<div class="our-team">
					<div class="pic">
						<img src="/img/kucing.jpg" alt="">
					</div>
					<div class="team-content">
						<h3 class="title">Shafa Alinka</h3>
						<span class="post">Design Graphic</span>
					</div>
					<ul class="social">
 
						<li><a href="" class="fab fa-facebook-f"></a></li>
						<li><a href="" class="fab fa-instagram"></a></li>
						<li><a href="" class="fab fa-linkedin-in"></a></li>
						<li><a href="" class="fab fa-twitter"></a></li>
 
					</ul>
				</div>
			</div>
			<div class="col-md-3 col-sm-6">
				<div class="our-team">
					<div class="pic">
						<img src="/img/kucing.jpg" alt="">
					</div>
					<div class="team-content">
						<h3 class="title">Shafa Alinka</h3>
						<span class="post">Design Graphic</span>
					</div>
					<ul class="social">
 
						<li><a href="" class="fab fa-facebook-f"></a></li>
						<li><a href="" class="fab fa-instagram"></a></li>
						<li><a href="" class="fab fa-linkedin-in"></a></li>
						<li><a href="" class="fab fa-twitter"></a></li>
 
					</ul>
				</div>
			</div>
			<div class="col-md-3 col-sm-6">
				<div class="our-team">
					<div class="pic">
						<img src="/img/kucing.jpg" alt="">
					</div>
					<div class="team-content">
						<h3 class="title">Shafa Alinka</h3>
						<span class="post">Design Graphic</span>
					</div>
					<ul class="social">
 
						<li><a href="" class="fab fa-facebook-f"></a></li>
						<li><a href="" class="fab fa-instagram"></a></li>
						<li><a href="" class="fab fa-linkedin-in"></a></li>
						<li><a href="" class="fab fa-twitter"></a></li>
 
					</ul>
				</div>
			</div>
		</div>
	</div>
</body>
</html>