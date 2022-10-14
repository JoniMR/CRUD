<link rel='stylesheet' type='text/css' media='screen' href='../style.css'>
<div class="form-style-8">
    <h1>Borrar banco</h1>
    <?php
    require_once "../config.php";

    $id = $_GET["id"];
    $apiUrl = $webServer . '/banco/' . $id;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $apiUrl);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");

    // Receive server response ...
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $server_output = curl_exec($ch);

    curl_close($ch);

    $result = json_decode($server_output);

    if ($result->deleted == "true") {
        echo "<h2>Banco con id: $id ha sido borrado</h2>";
    } else {
        echo "<h2>ERROR: No se puede borrar el banco con id: $id</h2>";
    }

    ?>

    <a href="/">Volver</a>
</div>