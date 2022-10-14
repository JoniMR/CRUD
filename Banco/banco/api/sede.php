<?php
$url = $_SERVER['REQUEST_URI'];
if (strpos($url, "/") !== 0) {
    $url = "/$url";
}

$dbInstance = new DB();
$dbConn = $dbInstance->connect($db);

header("Content-Type:application/json");
error_log("URL: " . $url);
error_log("METHOD: " . $_SERVER['REQUEST_METHOD']);
if ($url == '/sede' && $_SERVER['REQUEST_METHOD'] == 'GET') {
    error_log("Lista de sedes");
    $sede = getAllUsers($dbConn);
    echo json_encode($sede);
}

if (preg_match("/sede\/([0-9]+)\/banco/", $url, $matches) && $_SERVER['REQUEST_METHOD'] == 'GET') {
    error_log("Lista de sedes por banco");

    $userId = $matches[1];
    $comments = getPosts($dbConn, $userId);
    echo json_encode($comments);
    return;
}


if ($url == '/sede' && $_SERVER['REQUEST_METHOD'] == 'POST') {
    error_log("Crear sede");
    $input = $_POST;
    $userId = addUser($input, $dbConn);
    if ($userId) {
        $input['id'] = $userId;
        $input['link'] = "/sede/$userId";
    }

    echo json_encode($input);
}

if (preg_match("/sede\/([0-9]+)/", $url, $matches) && $_SERVER['REQUEST_METHOD'] == 'PUT') {
    error_log("Actualizar sede");

    $input = $_GET;
    $userId = $matches[1];
    updateUser($input, $dbConn, $userId);

    $user = getUser($dbConn, $userId);
    echo json_encode($user);
}

if (preg_match("/sede\/([0-9]+)/", $url, $matches) && $_SERVER['REQUEST_METHOD'] == 'GET') {
    error_log("Obtener sede");

    $userId = $matches[1];
    $user = getUser($dbConn, $userId);

    echo json_encode($user);
}

if (preg_match("/sede\/([0-9]+)/", $url, $matches) && $_SERVER['REQUEST_METHOD'] == 'DELETE') {

    $userId = $matches[1];
    error_log("Borrar sede: " . $userId);
    $deletedCount = deleteUser($dbConn, $userId);
    $deleted = $deletedCount > 0 ? "true" : "false";

    echo json_encode([
        'id' => $userId,
        'deleted' => $deleted
    ]);
}

/**
 * Get record based on ID
 *
 * @param $db
 * @param $id
 *
 * @return mixed Associative Array with statement fetch
 */
function getUser($db, $id)
{
    $statement = $db->prepare("SELECT * FROM sede where id=:id");
    $statement->bindValue(':id', $id);
    $statement->execute();

    return $statement->fetch(PDO::FETCH_ASSOC);
}

/**
 * Delete record based on ID
 *
 * @param $db
 * @param $id
 * 
 * @return integer number of deleted records
 */
function deleteUser($db, $id)
{
    $sql = "DELETE FROM sede where id=:id";
    $statement = $db->prepare($sql);
    $statement->bindValue(':id', $id);
    $statement->execute();
    return $statement->rowCount();
}

/**
 * Get all records
 *
 * @param $db
 * @return mixed fetchAll result
 */
function getAllUsers($db)
{
    $statement = $db->prepare("SELECT * FROM sede");
    $statement->execute();
    $statement->setFetchMode(PDO::FETCH_ASSOC);

    return $statement->fetchAll();
}

/**
 * Add record
 *
 * @param $input
 * @param $db
 * @return integer id of the inserted record
 */
function addUser($input, $db)
{

    $sql = "INSERT INTO sede 
          (TipoViaSede, NomViaSede, NumSede, CPSede, ProvSede, LocalSede, PreAnualSede, RetBrutoSede, CodBanco) 
          VALUES  (:TipoViaSede, :NomViaSede, :NumSede, :CPSede, :ProvSede, :LocalSede, :PreAnualSede, :RetBrutoSede, :CodBanco)";

    $statement = $db->prepare($sql);

    bindAllValues($statement, $input);

    $statement->execute();

    return $db->lastInsertId();
}

/**
 * @param $statement
 * @param $params
 * @return PDOStatement
 */
function bindAllValues($statement, $params)
{
    $allowedFields = ['TipoViaSede', 'NomViaSede', 'NumSede', 'CPSede', 'ProvSede', 'LocalSede', 'PreAnualSede', 'RetBrutoSede', 'CodBanco'];

    foreach ($params as $param => $value) {
        if (in_array($param, $allowedFields)) {
            error_log("bind $param $value");
            $statement->bindValue(':' . $param, $value);
        }
    }
    return $statement;
}

/**
 * Get fields as parameters to set in record
 *
 * @param $input
 * @return string
 */
function getParams($input)
{
    $allowedFields = ['TipoViaSede', 'NomViaSede', 'NumSede', 'CPSede', 'ProvSede', 'LocalSede', 'PreAnualSede', 'RetBrutoSede', 'CodBanco'];

    foreach ($input as $param => $value) {
        if (in_array($param, $allowedFields)) {
            $filterParams[] = "$param=:$param";
        }
    }

    return implode(", ", $filterParams);
}


/**
 * Update Record
 *
 * @param $input
 * @param $db
 * @param $id
 * @return integer number of updated records
 */
function updateUser($input, $db, $id)
{

    $fields = getParams($input);

    $sql = "
          UPDATE sede 
          SET $fields 
          WHERE id=$id
           ";

    $statement = $db->prepare($sql);

    bindAllValues($statement, $input);
    $statement->execute();

    return $id;
}

/**
 * Get all posts of the user
 *
 * @param $db
 * @param $userId
 * @return mixed fetchAll result
 */
function getPosts($db, $userId)
{
    $statement = $db->prepare("
        SELECT *
          FROM sede
         WHERE id = $userId");
    $statement->execute();
    $statement->setFetchMode(PDO::FETCH_ASSOC);

    return $statement->fetchAll();
}
