<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
	<style type="text/css">

		::selection{ background-color: #E13300; color: white; }
		::moz-selection{ background-color: #E13300; color: white; }
		::webkit-selection{ background-color: #E13300; color: white; }

		body {
			background-color: #fff;
			margin: 40px;
			font: 13px/20px normal Helvetica, Arial, sans-serif;
			color: #4F5155;
		}

		a {
			color: #003399;
			background-color: transparent;
			font-weight: normal;
		}

		h1 {
			color: #444;
			background-color: transparent;
			border-bottom: 1px solid #D0D0D0;
			font-size: 19px;
			font-weight: normal;
			margin: 0 0 14px 0;
			padding: 14px 15px 10px 15px;
			float: left;
		}
		h4 {
			
			border-bottom: 1px solid #EBEAFD;;
		}

		code {
			font-family: Consolas, Monaco, Courier New, Courier, monospace;
			font-size: 12px;
			background-color: #f9f9f9;
			border: 1px solid #D0D0D0;
			color: #002166;
			display: block;
			margin: 14px 0 14px 0;
			padding: 12px 10px 12px 10px;
		}
		h3 {
			float: left;
		}
		textarea{
			/*margin-top: 2%;*/
			float: right;
		}

		#body{
			margin: 0 15px 0 15px;
		}
		
		p.footer{
			text-align: right;
			font-size: 11px;
			border-top: 1px solid #D0D0D0;
			line-height: 32px;
			padding: 0 10px 0 10px;
			margin: 20px 0 0 0;
		}
		
		#containerBlog{
			background-color: #DDF5FF;
			width: 95%;
			height: 260px;
			padding-left: 2%; 
			margin: 10px;
			border: 1px solid #D0D0D0;
			-webkit-box-shadow: 0 0 8px #D0D0D0;
		}
		#containerPost{
			width: 95%;
			height: 200px;
			padding-left: 2%; 
			margin: 10px;
			/*border: 1px solid #D0D0D0;
			-webkit-box-shadow: 0 0 8px #D0D0D0;*/
		}
		#container{
			background-color: #D6D6D6;
			width: 90%;
			height: 70px;
			padding-left: 2%; 
			margin: 10px;
			border: 1px solid #D0D0D0;
			-webkit-box-shadow: 0 0 8px #D0D0D0;
		}
		#containerComent{
			width: 90%;
			height: 60px;
			padding-left: 2%; 
			margin: 10px;
			/*border: 1px solid #D0D0D0;
			-webkit-box-shadow: 0 0 8px #D0D0D0;*/
		}

	</style>
</head>
<body>



<div id="containerBlog">
	<div id="container">
		<FORM name="frmLogin" method="post" action="<?php echo base_url().'/index.php/blog/consultPassword'; ?>" > 
			<h3>logging of administrator blog: </h3><BR>
			<h3><label>User:</label><INPUT TYPE="text" PLACEHOLDER="User Name" name="user" value="admin"></h3>
			<h3><label>Password:</label><INPUT TYPE="PASSWORD" PLACEHOLDER="Password" name="pass" value="123"></h3>
			<h3><input type="submit" name="consultar" value="Sign in"></h3>
			<label><h1><?php echo $post ?></h1></label>
		</FORM>
	</div>	
	<div id="container">
			<h1><strong>BLOGGER DATA:</strong></h1>
			<h1><strong>Name:  </strong><?php echo $blogger->nombre;?></h1>
			<h1><strong>Bibliography:  </strong><?php echo $blogger->bibliografia; ?></h1>
			<h1><a href=<?php echo $blogger->redes_sociales; ?> target="_blank">facebook Blogger</a></h1>
	</div>
	<div id="container">
			<h1><strong>BLOG DATA:</strong></h1>
			<h1><strong>Name: </strong> <?php echo $blog->nombre_blog;?></h1>
			<h1><strong>detail: </strong> <?php echo $blog->detalle; ?></h1>
	</div>
</div>


	<?php /*
		foreach ( $post_blogger as $post_print){
		echo "<div id='containerPost'>
			  <form>".print_r($post_print)."</form>
			  </div>";
		} */
	?>

	 <?php foreach($post_blogger as $entry) : ?>
	 <form id='containerPost' name="frmPostEntry" method="post" action="<?php echo 'index.php/blog/insert_coment'; ?>">
	 					<input type="hidden" name="id_post" value=<?php echo $entry->id_post;?>>
                        <h2><?=$entry->titulo?></h2>
                        <h4>Date: <?=$entry->fecha?></h4>
                        Post: <?=$entry->contenido?><br />		
					<div id="containerComent">
						<h3><label>who says:</label><INPUT TYPE="text" PLACEHOLDER="Name" name="nombre_usuario"></h3>
                        <h3><textarea name="coment_post" type="textarea" rows="1" cols="80"> </textarea></h3>
                        <h3><input type="submit" name="comentario" value="Comment"> </h3>
					</div>
					<hr />
						                 
     </form>
                <?php endforeach; ?>
	
</body>
</html>
