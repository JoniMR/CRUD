<link rel='stylesheet' type='text/css' media='screen' href='../style.css'>
<div class="form-style-8">
    <?php
    require_once "../config.php";

    $userId = isset($_GET['id']) ? $_GET['id'] : null;
    $title = "Nuevo banco";
    if ($userId != null) {
        $title .= " con Id: " . $userId;
    }
    ?>
    <h1><?= $title ?></h1>
    <?php

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $apiUrl = $webServer . '/banco';

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

        $post = json_decode($server_output);
        $_GET["id"] = $post->id;
    }
    ?>

    <form method="post">
        <label for="NomBanco">Nombre del banco:</label>
        <input type="text" id="NomBanco" name="NomBanco">
        <label for="BicSwift">BIC / SWIFT:</label>
        <input type="text" id="BicSwift" name="BicSwift">
        <label for="TipoViaBanco">Tipo de Vía:</label>
        <input type="text" id="TipoViaBanco" name="TipoViaBanco">
        <label for="NomViaBanco">Nombre de Vía:</label>
        <input type="text" id="NomViaBanco" name="NomViaBanco">
        <label for="NumBanco">Número de Vía:</label>
        <input type="text" id="NumBanco" name="NumBanco">
        <label for="CPBanco">Código Postal:</label>
        <input type="text" id="CPBanco" name="CPBanco">
        <label for="LocalBanco">Localidad:</label>
        <input type="text" id="LocalBanco" name="LocalBanco">
        <label for="ProvBanco">Provincia:</label>
        <input type="text" id="ProvBanco" name="ProvBanco">
        <input type="submit" value="Guardar">
    </form>

    <a href="/">Volver</a>
</div>