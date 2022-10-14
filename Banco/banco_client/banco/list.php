<link rel='stylesheet' type='text/css' media='screen' href='../style.css'>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/config.php";
$userId = isset($_GET['id']) ? $_GET['id'] : null;
$title = "Lista de bancos";
if ($userId != null) {
    $title .= " con Id: " . $userId;
}
?>
<h1><?= $title ?></h1>
<div class="table-wrapper">

    <table class="fl-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre del banco</th>
                <th>BIC / SWIFT</th>
                <th>Tipo de Vía</th>
                <th>Nombre de Vía</th>
                <th>Número de Vía</th>
                <th>Código Postal</th>
                <th>Localidad</th>
                <th>Provincia</th>
                <th><a href="/banco/new.php<?= $userId != null ? '?id=' . $userId : '' ?>"><button class="button-12">Nuevo Banco</button></a></th>
            </tr>
        </thead>
        <?php

        if ($userId == null) {
            $apiUrl = $webServer . '/banco';
        } else {
            $apiUrl = $webServer . '/sede/' . $userId . "/banco";
        }

        $curl = curl_init($apiUrl);
        curl_setopt($curl, CURLOPT_ENCODING, "");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec($curl);
        $banco = json_decode($json);                                            
        curl_close($curl);

        foreach ($banco as $post) {
        ?>
            <tbody>
                <tr>
                    <td><a href="/banco/view.php?id=<?= $post->id ?>"><?= $post->id ?></a></td>
                    <td><?= $post->NomBanco ?></td>
                    <td><?= $post->BicSwift ?></td>
                    <td><?= $post->TipoViaBanco ?></td>
                    <td><?= $post->NomViaBanco ?></td>
                    <td><?= $post->NumBanco ?></td>
                    <td><?= $post->CPBanco ?></td>
                    <td><?= $post->LocalBanco ?></td>
                    <td><?= $post->ProvBanco ?></td>
                    <td>
                        <a href="/banco/edit.php?id=<?= $post->id ?>" <button class="button-10">Editar</button></a>
                        <a href="/banco/delete.php?id=<?= $post->id ?>" <button class="button-11">Borrar</button></a>
                    </td>
                </tr>
            </tbody>
        <?php
        }
        ?>
    </table>
</div>