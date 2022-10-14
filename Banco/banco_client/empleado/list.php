<h1>Lista de empleados</h1>
<div class="table-wrapper">

    <table class="fl-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Apellido 1</th>
                <th>Apellido 2</th>
                <th>Teléfono</th>
                <th>Sueldo</th>
                <th>Provincia</th>
                <th>Localidad</th>
                <th>Tipo de Vía</th>
                <th>Nombre de Vía</th>
                <th>Número de Vía</th>
                <th>Código Postal</th>
                <th>Puesto</th>
                <th>Código de sede</th>
                <th><a href="/empleado/new.php"><button class="button-12">Nuevo Empleado</button></a></th>
            </tr>
        </thead>
        <?php

        $apiUrl = $webServer . '/empleado';
        $curl = curl_init($apiUrl);
        curl_setopt($curl, CURLOPT_ENCODING, "");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec($curl);
        $empleado = json_decode($json);
        curl_close($curl);

        foreach ($empleado as $user) {
        ?>
            <tbody>
                <tr>
                    <td><a href="/empleado/view.php?id=<?= $user->id ?>"><?= $user->id ?></a></td>
                    <td><?= $user->NomEmp ?></td>
                    <td><?= $user->Ape1Emp ?></td>
                    <td><?= $user->Ape2Emp ?></td>
                    <td><?= $user->TlfEmp ?></td>
                    <td><?= $user->SuelEmp ?></td>
                    <td><?= $user->ProvEmp ?></td>
                    <td><?= $user->LocalEmp ?></td>
                    <td><?= $user->TipoViaEmp ?></td>
                    <td><?= $user->NomViaEmp ?></td>
                    <td><?= $user->NumEmp ?></td>
                    <td><?= $user->CPEmp ?></td>
                    <td><?= $user->PuestoEmp ?></td>
                    <td><a href="../sede/view.php?id=<?= $user->CodSede ?>"><?= $user->CodSede ?></a></td>
                    <td>
                        <a href="/empleado/edit.php?id=<?= $user->id ?>" <button class="button-10">Editar</button></a>
                        <a href="/empleado/delete.php?id=<?= $user->id ?>" <button class="button-11">Borrar</button></a>
                    </td>
                </tr>
            </tbody>
        <?php
        }
        ?>
    </table>
</div>