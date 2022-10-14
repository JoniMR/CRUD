<h1>Lista de sedes</h1>
<div class="table-wrapper">

    <table class="fl-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Tipo de Vía</th>
                <th>Nombre de Vía</th>
                <th>Número de Vía</th>
                <th>Código Postal</th>
                <th>Localidad</th>
                <th>Provincia</th>
                <th>Presupuesto anual</th>
                <th>Retorno anual</th>
                <th>Código del banco</th>
                <th><a href="/sede/new.php"><button class="button-12">Nueva Sede</button></a></th>
            </tr>
        </thead>
        <?php

        $apiUrl = $webServer . '/sede';
        $curl = curl_init($apiUrl);
        curl_setopt($curl, CURLOPT_ENCODING, "");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec($curl);
        $sede = json_decode($json);
        curl_close($curl);

        foreach ($sede as $user) {
        ?>
            <tbody>
                <tr>
                    <td><a href="/sede/view.php?id=<?= $user->id ?>"><?= $user->id ?></a></td>
                    <td><?= $user->TipoViaSede ?></td>
                    <td><?= $user->NomViaSede ?></td>
                    <td><?= $user->NumSede ?></td>
                    <td><?= $user->CPSede ?></td>
                    <td><?= $user->LocalSede ?></td>
                    <td><?= $user->ProvSede ?></td>
                    <td><?= $user->PreAnualSede ?></td>
                    <td><?= $user->RetBrutoSede ?></td>
                    <td><a href="../banco/view.php?id=<?= $user->CodBanco ?>"><?= $user->CodBanco ?></a></td>
                    <td>
                        <a href="/sede/edit.php?id=<?= $user->id ?>" <button class="button-10">Editar</button></a>
                        <a href="/sede/delete.php?id=<?= $user->id ?>" <button class="button-11">Borrar</button></a>
                    </td>
                </tr>
            </tbody>
        <?php
        }
        ?>
    </table>
</div>