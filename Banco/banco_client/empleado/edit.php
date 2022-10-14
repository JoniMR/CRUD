<link rel='stylesheet' type='text/css' media='screen' href='../../style.css'>
<div class="form-style-8">
    <h1>Editar empleado</h1>
    <?php
    require_once "../config.php";

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $id = $_GET['id'];
        $apiUrl = $webServer . '/empleado/' . $id;
        $params = array(
            "NomEmp"   => $_POST['NomEmp'],
            "Ape1Emp"     => $_POST['Ape1Emp'],
            "Ape2Emp"   =>  $_POST['Ape2Emp'],
            "TlfEmp"   =>  $_POST['TlfEmp'],
            "SuelEmp"   =>  $_POST['SuelEmp'],
            "ProvEmp"   =>  $_POST['ProvEmp'],
            "LocalEmp"   =>  $_POST['LocalEmp'],
            "TipoViaEmp"   =>  $_POST['TipoViaEmp'],
            "NomViaEmp"   =>  $_POST['NomViaEmp'],
            "NumEmp"   =>  $_POST['NumEmp'],
            "CPEmp"   =>  $_POST['CPEmp'],
            "PuestoEmp"   =>  $_POST['PuestoEmp'],
            "CodSede"   =>  $_POST['CodSede']
        );
        $apiUrl .= "?" . http_build_query($params);

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $apiUrl);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");

        // Receive server response ...
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $server_output = curl_exec($ch);

        curl_close($ch);

        $result = json_decode($server_output);

        include("detail.php");
    } else {
        $id = $_GET["id"];
        $apiUrl = $webServer . '/empleado/' . $id;
        $curl = curl_init($apiUrl);
        curl_setopt($curl, CURLOPT_ENCODING, "");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec($curl);
        $user = json_decode($json);
        curl_close($curl);
    ?>

        <form method="post">
            <label for="id">Id:</label>
            <input type="text" id="id" name="id" value="<?= $user->id ?>" disabled>
            <label for="NomEmp">Nombre:</label>
            <input type="text" id="NomEmp" name="NomEmp" value="<?= $user->NomEmp ?>">
            <label for="Ape1Emp">Apellido 1:</label>
            <input type="text" id="Ape1Emp" name="Ape1Emp" value="<?= $user->Ape1Emp ?>">
            <label for="Ape2Emp">Apellido 2:</label>
            <input type="text" id="Ape2Emp" name="Ape2Emp" value="<?= $user->Ape2Emp ?>">
            <label for="TlfEmp">Teléfono:</label>
            <input type="text" id="TlfEmp" name="TlfEmp" value="<?= $user->TlfEmp ?>">
            <label for="SuelEmp">Sueldo:</label>
            <input type="text" id="SuelEmp" name="SuelEmp" value="<?= $user->SuelEmp ?>">
            <label for="ProvEmp">Provincia:</label>
            <input type="text" id="ProvEmp" name="ProvEmp" value="<?= $user->ProvEmp ?>">
            <label for="LocalEmp">Localidad:</label>
            <input type="text" id="LocalEmp" name="LocalEmp" value="<?= $user->LocalEmp ?>">
            <label for="TipoViaEmp">Tipo de Vía:</label>
            <input type="text" id="TipoViaEmp" name="TipoViaEmp" value="<?= $user->TipoViaEmp ?>">
            <label for="NomViaEmp">Nombre de Vía:</label>
            <input type="text" id="NomViaEmp" name="NomViaEmp" value="<?= $user->NomViaEmp ?>">
            <label for="NumEmp">Número de Vía::</label>
            <input type="text" id="NumEmp" name="NumEmp" value="<?= $user->NumEmp ?>">
            <label for="CPEmp">Código Postal:</label>
            <input type="text" id="CPEmp" name="CPEmp" value="<?= $user->CPEmp ?>">
            <label for="PuestoEmp">Puesto:</label>
            <input type="text" id="PuestoEmp" name="PuestoEmp" value="<?= $user->PuestoEmp ?>">
            <label for="CodSede">Código de sede:</label>
            <input type="text" id="CodSede" name="CodSede" value="<?= $user->CodSede ?>">
            <input type="submit" value="Guardar">
        </form>

    <?php
    }
    ?>
    <a href="/">Volver</a>
</div>