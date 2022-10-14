<link rel='stylesheet' type='text/css' media='screen' href='../../style.css'>
<div class="form-style-8">
    <h1>Borrar empleado</h1>
    <?php
    require_once "../config.php";

    $id = $_GET["id"];
    $apiUrl = $webServer . '/empleado/' . $id;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $apiUrl);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");

    // Receive server response ...
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $server_output = curl_exec($ch);

    curl_close($ch);

    $result = json_decode($server_output);

    if ($result->deleted == "true") {
        echo "<h2>Empleado con Id: $id ha sido borrado</h2>";
    } else {
        echo "<h2>ERROR: No se ha podido borrar el empleado con Id: $id</h2>";
    }

    ?>
    <a href="/">Volver</a>
</div>