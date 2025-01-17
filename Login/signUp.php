<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SignUp | page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Mulish&family=Poppins:wght@400;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>

<?php
    include '../koneksi.php';
    global $koneksi;
    if (isset($_POST['submit'])) {
        $getName = $_POST['nama'];
        $getPass = $_POST['password'];
        $getEmail = $_POST['email'];

        $sql = mysqli_query($koneksi, "SELECT * FROM user");
        $empty = true;
        while($data = mysqli_fetch_assoc($sql)){
            if ($data['nama'] == $getName || $data['email'] == $getEmail) {
                $empty = false;
            }
        }
        if ($empty == true) {
         	 mysqli_query($koneksi, "INSERT INTO user VALUES ('', '$getName', '$getPass', '$getEmail', false)");
            header('location:../Login/signIn.php');
        }else{?>
        	<script>
                alert("Email / username sudah ada")
        	</script>
        <?php }} ?>


<div class="container">
	<form class="form" method="post" autocomplete="off">
		<header>
			<div class="logo">
				<div class="bulat"><i class="bi bi-film"></i></div>
				<h5>Netclip</h5>
			</div>
		</header>
		<div class="inputan">
			<input type="text" name="nama" id="nama" required>
			<label for="nama">Username :</label>
			<input type="password" name="password" id="password" required>
			<label for="password">Password :</label>
			<input type="email" name="email" id="email" required>
			<label for="email">Email :</label>
		</div>
		<div class="link">
			<button type="submit" name="submit" class="button">Buat</button>
			<a href="signIn.php" class="button">Sign In</a>
		</div>
	</form>
</div>
</body>
</html>