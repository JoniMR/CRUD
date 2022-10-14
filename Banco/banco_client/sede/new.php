<link rel='stylesheet' type='text/css' media='screen' href='../../style.css'>
<div class="form-style-8">
	<h1>Nueva sede</h1>
	<?php
	require_once "../config.php";

	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		$apiUrl = $webServer . '/sede';

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
			<label for="TipoViaSede">Tipo de Vía:</label>
			<input type="text" id="TipoViaSede" name="TipoViaSede">
			<label for="NomViaSede">Nombre de Vía::</label>
			<input type="text" id="NomViaSede" name="NomViaSede">
			<label for="NumSede">Número de Vía:</label>
			<input type="text" id="NumSede" name="NumSede">
			<label for="CPSede">Código Postal:</label>
			<input type="text" id="CPSede" name="CPSede">
			<label for="LocalSede">Localidad:</label>
			<input type="text" id="LocalSede" name="LocalSede">
			<label for="ProvSede">Provincia:</label>
			<input type="text" id="ProvSede" name="ProvSede">
			<label for="PreAnualSede">Presupuesto Anual de Sede:</label>
			<input type="text" id="PreAnualSede" name="PreAnualSede">
			<label for="RetBrutoSede">Retorno Bruto de Sede:</label>
			<input type="text" id="RetBrutoSede" name="RetBrutoSede">
			<label for="CodBanco">Código de banco:</label>
			<input type="text" id="CodBanco" name="CodBanco">
			<input type="submit" value="Guardar">
		</form>
		<a href="/">Volver</a>
</div>
<?php
	}
?>