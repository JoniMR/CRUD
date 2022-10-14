<link rel='stylesheet' type='text/css' media='screen' href='../../style.css'>
<div class="form-style-8">
    <h1>Borrar sede</h1>
    <?php
    require_once "../config.php";

    $id = $_GET["id"];
    $apiUrl = $webServer . '/sede/' . $id;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $apiUrl);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");

    // Receive server response ...
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $server_output = curl_exec($ch);

    curl_close($ch);

    $result = json_decode($server_output);

    if ($result->deleted == "true") {
        echo "<h2>Sede con Id: $id ha sido borrada</h2>";
    } else {
        echo "<h2>ERROR: No se ha podido borrar la sede con Id: $id</h2>";
    }

    ?>
    <a href="/">Volver</a>
</div>