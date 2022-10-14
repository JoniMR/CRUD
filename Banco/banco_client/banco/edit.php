<link rel='stylesheet' type='text/css' media='screen' href='../style.css'>
<div class="form-style-8">
    <h1>Editar banco</h1>
    <?php
    require_once "../config.php";

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $id = $_GET['id'];
        $apiUrl = $webServer . '/banco/' . $id;

        $params = array(
            "NomBanco"   => $_POST['NomBanco'],
            "TipoViaBanco"     => $_POST['TipoViaBanco'],
            "NumBanco"    => $_POST['NumBanco'],
            "CPBanco"   =>  $_POST['CPBanco'],
            "NomViaBanco"    => $_POST['NomViaBanco'],
            "ProvBanco"   =>  $_POST['ProvBanco'],
            "LocalBanco"    => $_POST['LocalBanco'],
            "BicSwift"   =>  $_POST['BicSwift']
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
        $apiUrl = $webServer . '/banco/' . $id;
        $curl = curl_init($apiUrl);
        curl_setopt($curl, CURLOPT_ENCODING, "");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec($curl);
        $post = json_decode($json);
        curl_close($curl);
    ?>

        <form method="post">
            <label for="id">Id:</label>
            <input type="text" id="id" name="id" value="<?= $post->id ?>" disabled>
            <label for="NomBanco">Nombre del banco:</label>
            <input type="text" id="NomBanco" name="NomBanco" value="<?= $post->NomBanco ?>">
            <label for="BicSwift">BIC / SWIFT:</label>
            <input type="text" id="BicSwift" name="BicSwift" value="<?= $post->BicSwift ?>">
            <label for="TipoViaBanco">Tipo de Vía:</label>
            <input type="text" id="TipoViaBanco" name="TipoViaBanco" value="<?= $post->TipoViaBanco ?>">
            <label for="NomViaBanco">Nombre de Vía:</label>
            <input type="text" id="NomViaBanco" name="NomViaBanco" value="<?= $post->NomViaBanco ?>">
            <label for="NumBanco">Número de Vía:</label>
            <input type="text" id="NumBanco" name="NumBanco" value="<?= $post->NumBanco ?>">
            <label for="CPBanco">Código Postal:</label>
            <input type="text" id="CPBanco" name="CPBanco" value="<?= $post->CPBanco ?>">
            <label for="LocalBanco">Localidad:</label>
            <input type="text" id="LocalBanco" name="LocalBanco" value="<?= $post->LocalBanco ?>">
            <label for="ProvBanco">Provincia:</label>
            <input type="text" id="ProvBanco" name="ProvBanco" value="<?= $post->ProvBanco ?>">
            <input type="submit" value="Guardar">
        </form>

    <?php
    }
    ?>

    <a href="/">Volver</a>
</div>