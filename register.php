<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h1 id="title">Welcome</h1>
	<p id="desciption">Please register first if you don't have account, and login if you already have.</p>
	<form action="daftar.php" method="post">
		<label for="username">
			Username <br>
			<input type="text" placeholder="Enter your username" name="username" required/>
		</label>
		<label for="pwd">
			Password <br>
			<input type="password" placeholder="Enter your password" name="pwd" required />
		</label>
		<label for="nama">
			Name <br>
			<input type="text" placeholder="Enter your name" name="nama" required />
		</label>
		<label for="email">
			Email <br>
			<input type="email" placeholder="Enter your e-mail" name="email" required />
		</label>
		<label for="city">
			City <br>
			<input type="text" placeholder="Enter your City" name="city" required />
		</label>
		<label for="kirim">
			<input name="kirim" type="submit" value="DAFTAR">
		</label>
	</form>
</body>
</html>