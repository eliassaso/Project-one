

<?php

	
	//se obtiene el parametro, ruta o nombre del archivo con la configuracion
	$file_config = $argv[1];
	//variables para buscar el registro y el archivo de configuración.
	$path_file_insert = [];
	$path_file_config = [];


	foreach(findAllDirs('/home*') as $dir) { 
		$match=glob($dir.'/'.$file_config,GLOB_NOSORT);
		if(!$match) continue;
			$path_file_config=array_merge($path_file_config,$match);
	}

	//se verifica que el archivo exista y este bien escrito!!
	if (empty($str_datos = file_get_contents($path_file_config[0]))){

		echo "\n*****file not found!!! Example config.json, verify file existence *****  \n\n";
		return;
	}

	//se decodifican los datos del archivo json.
	$datos = json_decode($str_datos,true);
	//se crean las variables para cada uno de los valores del json para mas orden
	$ip_server = $datos['data_base']['ip_server'];
	$db_user = $datos['data_base']['user'];
	$db_pass = $datos['data_base']['pass'];
	 
	$senders = $datos['mail']['senders'];
	$pass = $datos['mail']['pass'];
	$server = $datos['mail']['server'];
	$receives = $datos['mail']['receives'];
	//formato para buscar registro por fecha
	$fecha = date("d-m-Y");
	$fname = $fecha.'.csv';
	//$flag = true; en caso de quitar algún encabezado
	$count = 0;
	$fila = 0;
	//echo "$path\n";
	
	foreach(findAllDirs('/home*') as $dir) { 
		$res=glob($dir.'/'.$fname,GLOB_NOSORT);
		if(!$res) continue;
			$path_file_insert=array_merge($path_file_insert,$res);
	}

	$path = $path_file_insert[0];

	//se verifica que exista el archivo para escribir en el o para crearlo
	if (($gestor = fopen("$path", "r")) !== FALSE) {
		
		while (($datos = fgetcsv($gestor, 1000, ";")) !== FALSE) {
			$numero = count($datos);

			$fila++;			
				//por si se requiere quitar algún encabezado
				//if ($flag)
				//{
				//	$flag = false;
					
				//}else{			
					
					$query = "INSERT INTO student VALUES ('$datos[0]', '$datos[1]', '$datos[2]', '$datos[3]', '$datos[4]', '$datos[5]', '$datos[6]', '$datos[7]'); ";
					//echo $query;
					
					// Conectando, seleccionando la base de datos
					$link = mysql_connect($ip_server, $db_user, $db_pass)
						or die('No se pudo conectar: ' . mysql_error());

					mysql_select_db('mysql') or die('No se pudo seleccionar la base de datos');		
					// Realizar una consulta MySQL
					//mysql_query($query) or die('Consulta fallida: ' . mysql_error());
					// Cerrar la conexión
					mysql_close($link);
				}
		
		fclose($gestor);
		print_r("\n$fila\n");
		


	}else{
		echo "\n\n ***log file by date not found!!!!**** \n\n";
		return;
	}

	//echo "successfully\n";

	function findAllDirs($start) {
		$dirStack=[$start];
		while($dir=array_shift($dirStack)) {
			$ar=glob($dir.'/*',GLOB_ONLYDIR|GLOB_NOSORT);
			if(!$ar) continue;

			$dirStack=array_merge($dirStack,$ar);
			foreach($ar as $DIR)
				yield $DIR;
		}
	}
?>


<?php


	/*function findAllDirs($start) {
		$dirStack=[$start];
		while($dir=array_shift($dirStack)) {
			$ar=glob($dir.'/*',GLOB_ONLYDIR|GLOB_NOSORT);
			if(!$ar) continue;

			$dirStack=array_merge($dirStack,$ar);
			foreach($ar as $DIR)
				yield $DIR;
		}
	}


	$fecha = date("d-m-Y");
	$fname= $fecha.'.csv';

	$fname= $fname;
	$result=[];
	foreach(findAllDirs('/home*') as $dir) { 
		$match=glob($dir.'/'.$fname,GLOB_NOSORT);
		if(!$match) continue;
		$result=array_merge($result,$match);
	}

	//$fecha = date("d-m-Y");
	//$fname= $fecha.'.csv';
	//$list = glob("$fecha.csv");
	print_r($result);


     //  /var/www/php/Project-one

	//$test = glob("prueba.txt");
	//var_dump("$test");


 	<script>
	
		$(document).ready(function() {

   			$("#send").click(function () {  
    			if(($("#nombre").val().length < 1)||($("#fName").val().length < 1)||($("#lName").val().length < 1)||($("#ide").val().length < 1)||($("#caree").val().length < 1)||($("#birth").val().length < 1)||($("#mail").val().length < 1)||($("#phon").val().length < 1)) {  
        			alert("must fill in all fields");  
        			return false;  
    			}  
    			return false;  
			}); 
		});

	</script>
 
 $name = $_REQUEST['name'];
echo " 
<script type='text/javascript' src='jquery-1.10.2.js'></script>

 
    			
        			
        <a href='formulario.html'>x<script>alert('must fill in all fields');</script></a>
        ";
*/

// Lee el fichero en una variable,
// y convierte su contenido a una estructura de datos

	/*$file_config = $argv[1];
	
	if (empty($str_datos = file_get_contents("$file_config"))){


		echo "\n*****file not found!!! Example config.json, verify file existence *****  \n\n";
		return;
	}

	$datos = json_decode($str_datos,true);

	$ip_server = $datos['data_base']['ip_server'];
	$db_user = $datos['data_base']['user'];
	$db_pass = $datos['data_base']['pass'];
	 
	$senders = $datos['mail']['senders'];
	$pass = $datos['mail']['pass'];
	$server = $datos['mail']['server'];
	$receives = $datos['mail']['receives'];

	echo   $ip_server."\n ".$db_user."\n ".$db_pass."\n ".$senders."\n ".$pass."\n ".$server."\n ".$receives."\n\n";

	/*require("class.phpmailer.php");
	$mail = new PHPMailer();
	$mail->IsSMTP();
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = "tls";
	$mail->Host = "$server"; // SMTP a utilizar. Por ej. smtp.elserver.com
	$mail->Username = "$senders"; // Correo completo a utilizar
	$mail->Password = "$pass"; // Contraseña
	$mail->Port = 25; // Puerto a utilizar
	$mail->From = "eliassaso@gmail.com"; // Desde donde enviamos (Para mostrar)
	$mail->FromName = "Elias";//"ELSERVER.COM";
	$mail->AddAddress("$receives");//("eliassaso@gmail.com"); // Esta es la dirección a donde enviamos
	$mail->AddCC("");//("cuenta@dominio.com"); // Copia
	$mail->AddBCC("");//("cuenta@dominio.com"); // Copia oculta
	$mail->IsHTML(true); // El correo se envía como HTML
	$mail->Subject = "Closing journal"; // Este es el titulo del email.
	$body = "<h1 style='color:red'>Hola mundo. Esta es la primer línea</h1>";
	//$body .= "Acá continuo ";
	$mail->Body = $body; // Mensaje a enviar
	$mail->AltBody = "Hola mundo. Esta es la primer línean Acá continuo el mensaje"; // Texto sin html
	$mail->AddAttachment("");//("imagenes/imagen.jpg", "imagen.jpg");
	$exito = $mail->Send(); // Envía el correo.

	if($exito){
	echo "The mail was sent.\n";
	}else{
	echo "There was a drawback. Contact an administrator.\n";
	}
	/*require('class.phpmailer.php');
	require('class.smtp.php');

	$mail = new PHPMailer();

	$body = 'Cuerpo del mensaje';

	$mail->IsSMTP(); 

	// la dirección del servidor, p. ej.: smtp.servidor.com
	$mail->Host = 'smtp.gmail.com';

	// dirección remitente, p. ej.: no-responder@miempresa.com
	$mail->From = 'eliassaso@gmail.com';

	// nombre remitente, p. ej.: "Servicio de envío automático"
	$mail->FromName = 'elias';

	// asunto y cuerpo alternativo del mensaje
	$mail->Subject = 'Test';
	$mail->AltBody = 'Cuerpo alternativo 
	    para cuando el visor no puede leer HTML en el cuerpo'; 

	// si el cuerpo del mensaje es HTML
	$mail->MsgHTML($body);

	// podemos hacer varios AddAdress
	$mail->AddAddress('eliassaso@gmail.com', 'merlyn1502@hotmail.com');

	// si el SMTP necesita autenticación
	$mail->SMTPAuth = true;

	// credenciales usuario
	$mail->Username = 'eliassaso@gmail.com';
	$mail->Password = '203900636'; 

	if(!$mail->Send()) {
	echo 'Error enviando: ' . $mail->ErrorInfo;
	} else {
	echo '¡¡Enviado!!';
	}

 
// Modifica el valor, y escribe el fichero json de salida
//
//$datos["responsable"]["Aficiones"][0] = "Natación";
 
//$fh = fopen("datos_out.json", 'w')
  //    or die("Error al abrir fichero de salida");
//fwrite($fh, json_encode($datos,JSON_UNESCAPED_UNICODE));
//fclose($fh);
*/
	//$prueba = exec('chmod -R 777 *');
/*$prueba = exec('chmod -R 777 *'.'\n');
echo "$prueba";*/
//chmod("Downloads/prueba.txt", 777);  // octal; valor correcto de modo
//echo "$res";
//echo `php -v`;
//readfile('/etc/passwd'); 
//safe_mode_exec_dir('chmod -R 777 *');
//$ruta = dirname;
//echo($ruta);
//ftp_site($conn, 'CHMOD 0777 var/www/php/[project]/'); 
//echo substr(sprintf('%o', fileperms('pruba.txt')), -4);//permisos de un archivo
//exec('sudo chmod -R 777 /var/www/php/[project]');
  /*$File = "prueba.txt";
 
  if (!chmod($File, 0777))
 
      echo "Could not change permissions";
 
  else
 
      echo "Changed!";*/

      //***************************valida campos*****************************
     /* if($("#phone").val().length < 1) {
    alert("El nombre es obligatorio");
    return false;
	}*/
?>