<?php
namespace kok\Api;

require 'DBconn.php';

$dbConn = new DBconn();

$dbConn->connect();
echo "Check de la conexio a la DB mostrant el resultat de PDO::errorInfo (0 vol dir que la conexio esta be)<br>";
echo "SQLSTATE error code: ";
echo($dbConn->conn->errorInfo()[0]);
echo "<br>";
?>
<a href='pr01-api.php'>Api de Ventes</a><br>
