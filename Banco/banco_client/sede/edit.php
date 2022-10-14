<link rel='stylesheet' type='text/css' media='screen' href='../../style.css'>
<div class="form-style-8">
    <h1>Editar sede</h1>
    <?php
    require_once "../config.php";

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $id = $_GET['id'];
        $apiUrl = $webServer . '/sede/' . $id;
        $params = array(
            "TipoViaSede"   => $_POST['TipoViaSede'],
            "NomViaSede"     => $_POST['NomViaSede'],
            "NumSede"   =>  $_POST['NumSede'],
            "CPSede"   =>  $_POST['CPSede'],
            "LocalSede"   =>  $_POST['LocalSede'],
            "ProvSede"   =>  $_POST['ProvSede'],
            "PreAnualSede"   =>  $_POST['PreAnualSede'],
            "RetBrutoSede"   =>  $_POST['RetBrutoSede'],
            "CodBanco"   =>  $_POST['CodBanco']
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
        $apiUrl = $webServer . '/sede/' . $id;
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
            <label for="TipoViaSede">Tipo de Vía:</label>
            <input type="text" id="TipoViaSede" name="TipoViaSede" value="<?= $user->TipoViaSede ?>">
            <label for="NomViaSede">Nombre de Vía::</label>
            <input type="text" id="NomViaSede" name="NomViaSede" value="<?= $user->NomViaSede ?>">
            <label for="NumSede">Número de Vía:</label>
            <input type="text" id="NumSede" name="NumSede" value="<?= $user->NumSede ?>">
            <label for="CPSede">Código Postal:</label>
            <input type="text" id="CPSede" name="CPSede" value="<?= $user->CPSede ?>">
            <label for="LocalSede">Localidad:</label>
            <input type="text" id="LocalSede" name="LocalSede" value="<?= $user->LocalSede ?>">
            <label for="ProvSede">Provincia:</label>
            <input type="text" id="ProvSede" name="ProvSede" value="<?= $user->ProvSede ?>">
            <label for="PreAnualSede">Presupuesto Anual de Sede:</label>
            <input type="text" id="PreAnualSede" name="PreAnualSede" value="<?= $user->PreAnualSede ?>">
            <label for="RetBrutoSede">Retorno Bruto de Sede:</label>
            <input type="text" id="RetBrutoSede" name="RetBrutoSede" value="<?= $user->RetBrutoSede ?>">
            <label for="CodBanco">Código del banco:</label>
            <input type="text" id="CodBanco" name="CodBanco" value="<?= $user->CodBanco ?>">
            <input type="submit" value="Guardar">
        </form>

    <?php
    }
    ?>

    <a href="/">Volver</a>
</div>