
<?php

	$name = $_REQUEST['name'];
	$firstName = $_REQUEST['firstName'];
	$lastName = $_REQUEST['lastName'];
	$schedule = $_REQUEST['id'];
	$birthDate = $_REQUEST['birthDate'];
	$email = $_REQUEST['email'];
	$phone = $_REQUEST['phone'];
	$career = $_REQUEST['career'];


	if((empty($name))||(empty($firstName))||(empty($lastName))||(empty($schedule))||(empty($birthDate)) 
		|| (empty($email)) ||(empty($phone))||(empty($career)))
		{echo "<a style='padding-top: 7%;text-decoration: none;' href='formulario.html'><h2 style='color:red; text-align:center;'> must fill in all fields!!! </h2></a>"; return;} 

	if (!is_numeric($phone)) {
		echo "<h2 style='color:red; text-align:center;'>Check the phone field!!! </h2>" ; return;}

	$fecha = date("d-m-Y");
	$fname= $fecha.'.csv';
	$list = glob("$fecha.csv"); 

	

		$fp = fopen($fname, "a");

		$write = "$name; $firstName; $lastName; $schedule; $birthDate; $email; $phone; $career".PHP_EOL;

		if ($fp) {
			fwrite($fp, $write);
			fclose($fp);
		}
?>

<script type="text/javascript"> 
	if(confirm('Saved Succesfully, do you want to add another one?')) {
    	window.location.href = 'formulario.html';
	}
</script>


