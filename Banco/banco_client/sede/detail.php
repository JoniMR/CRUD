<link rel='stylesheet' type='text/css' media='screen' href='../../style.css'>
<div class="form-style-8">
    <h1>Detalles de la sede</h1>

    <?php
    require_once "../config.php";

    $id = $_GET["id"];
    $apiUrl = $webServer . '/sede/' . $id;

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
        <label for="TipoViaSede">Tipo de Vía:</label>
        <input type="text" id="TipoViaSede" name="TipoViaSede" value="<?= $user->TipoViaSede ?>" disabled>
        <label for="NomViaSede">Nombre de Vía::</label>
        <input type="text" id="NomViaSede" name="NomViaSede" value="<?= $user->NomViaSede ?>" disabled>
        <label for="NumSede">Número de Vía:</label>
        <input type="text" id="NumSede" name="NumSede" value="<?= $user->NumSede ?>" disabled>
        <label for="CPSede">Código Postal:</label>
        <input type="text" id="CPSede" name="CPSede" value="<?= $user->CPSede ?>" disabled>
        <label for="LocalSede">Localidad:</label>
        <input type="text" id="LocalSede" name="LocalSede" value="<?= $user->LocalSede ?>" disabled>
        <label for="ProvSede">Provincia:</label>
        <input type="text" id="ProvSede" name="ProvSede" value="<?= $user->ProvSede ?>" disabled>
        <label for="PreAnualSede">Presupuesto Anual de Sede:</label>
        <input type="text" id="PreAnualSede" name="PreAnualSede" value="<?= $user->PreAnualSede ?>" disabled>
        <label for="RetBrutoSede">Retorno Bruto de Sede:</label>
        <input type="text" id="RetBrutoSede" name="RetBrutoSede" value="<?= $user->RetBrutoSede ?>" disabled>
        <label for="CodBanco">Codigo del banco:</label>
        <input type="text" id="CodBanco" name="CodBanco" value="<?= $user->CodBanco ?>" disabled>
        <a href="/">Volver</a>
    </form>
</div>