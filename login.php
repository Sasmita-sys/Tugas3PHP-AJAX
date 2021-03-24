<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h1 id="title">Welcome</h1>
	<p id="desciption">Please register first if you don't have account, and login if you already have.</p>
	<form id="login" action="proses.php" method="post">
		<label for="username">
			Username <br>
			<input type="text" placeholder="Enter your username" name="username" required />
		</label>
		<label for="pwd">
			Password <br>
			<input type="password" placeholder="Enter your password" name="pwd" required />
		</label>
		<label for="verif">
			<input type="submit" name="verif" value="LOGIN">
		</label>
		
	</form>
</body>
</html>