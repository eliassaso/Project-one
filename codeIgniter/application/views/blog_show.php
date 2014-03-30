<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
	<link rel="stylesheet" type="text/css" href="application/views/index.css">
</head>
<body>

<div id="container">
	<h1>logging of administrator blog</h1>
		<FORM name="frmLogin" method="post" action="<?php echo 'index.php/blog/consultPassword'; ?>" > 
			<label>User:</label><INPUT TYPE="text" PLACEHOLDER="User Name" name="user" value="admin">
			<label>Password:</label><INPUT TYPE="PASSWORD" PLACEHOLDER="Password" name="pass" value="123">
			<input type="submit" name="consultar" value="Enviar">
			<br>
			<label><h1><?php echo $post ?></h1></label>
			
		</FORM>
</div>
<div id="container">

</div>
</body>
</html>
