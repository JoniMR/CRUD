<link rel='stylesheet' type='text/css' media='screen' href='../../style.css'>
<div class="form-style-8">
    <h1>Detalles del empleado</h1>
    <?php
    require_once "../config.php";

    $id = $_GET["id"];
    $apiUrl = $webServer . '/empleado/' . $id;

    $curl = curl_init($apiUrl);
    curl_setopt($curl, CURLOPT_ENCODING, "");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $json = curl_exec($curl);
    $user = json_decode($json);
    curl_close($curl);
    ?>

    <form>
        <label for="id">Id:</label>
        <input type="text" id="id" name="id" value="<?= $user->id ?>" disabled>
        <label for="NomEmp">Nombre:</label>
        <input type="text" id="NomEmp" name="NomEmp" value="<?= $user->NomEmp ?>" disabled>
        <label for="Ape1Emp">Apellido 1:</label>
        <input type="text" id="Ape1Emp" name="Ape1Emp" value="<?= $user->Ape1Emp ?>" disabled>
        <label for="Ape2Emp">Apellido 2:</label>
        <input type="text" id="Ape2Emp" name="Ape2Emp" value="<?= $user->Ape2Emp ?>" disabled>
        <label for="TlfEmp">Teléfono:</label>
        <input type="text" id="TlfEmp" name="TlfEmp" value="<?= $user->TlfEmp ?>" disabled>
        <label for="SuelEmp">Sueldo:</label>
        <input type="text" id="SuelEmp" name="SuelEmp" value="<?= $user->SuelEmp ?>" disabled>
        <label for="ProvEmp">Provincia:</label>
        <input type="text" id="ProvEmp" name="ProvEmp" value="<?= $user->ProvEmp ?>" disabled>
        <label for="LocalEmp">Localidad:</label>
        <input type="text" id="LocalEmp" name="LocalEmp" value="<?= $user->LocalEmp ?>" disabled>
        <label for="TipoViaEmp">Tipo de Vía:</label>
        <input type="text" id="TipoViaEmp" name="TipoViaEmp" value="<?= $user->TipoViaEmp ?>" disabled>
        <label for="NomViaEmp">Nombre de Vía:</label>
        <input type="text" id="NomViaEmp" name="NomViaEmp" value="<?= $user->NomViaEmp ?>" disabled>
        <label for="NumEmp">Número de Vía::</label>
        <input type="text" id="NumEmp" name="NumEmp" value="<?= $user->NumEmp ?>" disabled>
        <label for="CPEmp">Código Postal:</label>
        <input type="text" id="CPEmp" name="CPEmp" value="<?= $user->CPEmp ?>" disabled>
        <label for="PuestoEmp">Puesto:</label>
        <input type="text" id="PuestoEmp" name="PuestoEmp" value="<?= $user->PuestoEmp ?>" disabled>
        <label for="CodSede">Código de sede:</label>
        <input type="text" id="CodSede" name="CodSede" value="<?= $user->CodSede ?>" disabled>
    </form>
    <a href="/">Volver</a>
</div>