<link rel='stylesheet' type='text/css' media='screen' href='../style.css'>
<div class="form-style-8">
    <h1>Detalles del banco</h1>
    <?php
    require_once "../config.php";

    $id = $_GET["id"];
    $apiUrl = $webServer . '/banco/' . $id;

    $curl = curl_init($apiUrl);
    curl_setopt($curl, CURLOPT_ENCODING, "");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $json = curl_exec($curl);
    $post = json_decode($json);
    curl_close($curl);
    ?>

    <form>
        <label for="id">Id:</label>
        <input type="text" id="id" name="id" value="<?= $post->id ?>" disabled>
        <label for="NomBanco">Nombre del banco:</label>
        <input type="text" id="NomBanco" name="NomBanco" value="<?= $post->NomBanco ?>" disabled>
        <label for="BicSwift">BIC / SWIFT:</label>
        <input type="text" id="BicSwift" name="BicSwift" value="<?= $post->BicSwift ?>" disabled>
        <label for="TipoViaBanco">Tipo de Vía:</label>
        <input type="text" id="TipoViaBanco" name="TipoViaBanco" value="<?= $post->TipoViaBanco ?>" disabled>
        <label for="NomViaBanco">Nombre de Vía:</label>
        <input type="text" id="NomViaBanco" name="NomViaBanco" value="<?= $post->NomViaBanco ?>" disabled>
        <label for="NumBanco">Número de Vía:</label>
        <input type="text" id="NumBanco" name="NumBanco" value="<?= $post->NumBanco ?>" disabled>
        <label for="CPBanco">Código Postal:</label>
        <input type="text" id="CPBanco" name="CPBanco" value="<?= $post->CPBanco ?>" disabled>
        <label for="LocalBanco">Localidad:</label>
        <input type="text" id="LocalBanco" name="LocalBanco" value="<?= $post->LocalBanco ?>" disabled>
        <label for="ProvBanco">Provincia:</label>
        <input type="text" id="ProvBanco" name="ProvBanco" value="<?= $post->ProvBanco ?>" disabled>
        <a href="/">Volver</a>
    </form>
</div>