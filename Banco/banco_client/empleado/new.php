<link rel='stylesheet' type='text/css' media='screen' href='../../style.css'>
<div class="form-style-8">
	<h1>Nuevo empleado</h1>
	<?php
	require_once "../config.php";

	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		$apiUrl = $webServer . '/empleado';

		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, $apiUrl);
		curl_setopt($ch, CURLOPT_POST, 1);

		curl_setopt(
			$ch,
			CURLOPT_POSTFIELDS,
			http_build_query($_POST)
		);

		// Receive server response ...
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$server_output = curl_exec($ch);

		curl_close($ch);

		$user = json_decode($server_output);
		$_GET["id"] = $user->id;

		include("detail.php");
		echo '<a href = "/">Back</a>';
	} else {
	?>

		<form method="post">
			<label for="NomEmp">Nombre:</label>
			<input type="text" id="NomEmp" name="NomEmp">
			<label for="Ape1Emp">Apellido 1:</label>
			<input type="text" id="Ape1Emp" name="Ape1Emp">
			<label for="Ape2Emp">Apellido 2:</label>
			<input type="text" id="Ape2Emp" name="Ape2Emp">
			<label for="TlfEmp">Teléfono:</label>
			<input type="text" id="TlfEmp" name="TlfEmp">
			<label for="SuelEmp">Sueldo:</label>
			<input type="text" id="SuelEmp" name="SuelEmp">
			<label for="ProvEmp">Provincia:</label>
			<input type="text" id="ProvEmp" name="ProvEmp">
			<label for="LocalEmp">Localidad:</label>
			<input type="text" id="LocalEmp" name="LocalEmp">
			<label for="TipoViaEmp">Tipo de Vía:</label>
			<input type="text" id="TipoViaEmp" name="TipoViaEmp">
			<label for="NomViaEmp">Nombre de Vía:</label>
			<input type="text" id="NomViaEmp" name="NomViaEmp">
			<label for="NumEmp">Número de Vía::</label>
			<input type="text" id="NumEmp" name="NumEmp">
			<label for="CPEmp">Código Postal:</label>
			<input type="text" id="CPEmp" name="CPEmp">
			<label for="PuestoEmp">Puesto:</label>
			<input type="text" id="PuestoEmp" name="PuestoEmp">
			<label for="CodSede">Código de sede:</label>
			<input type="text" id="CodSede" name="CodSede">
			<input type="submit" value="Guardar">
		</form>
		<a href="/">Volver</a>

	<?php
	}
	?>
</div>