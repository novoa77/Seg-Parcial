<?php


function getConnection() {
    $dbhost='localhost';
    $dbuser='root';
    $dbpass='775922';
    $dbname='DBArvolution';
    $dbh = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $dbh;
}


function addUser($nombre, $mail, $asunto, $mensaje) {
  $sql = 'INSERT INTO clientes (nombre, mail, asunto, mensaje) VALUES (:nombre,:mail,:asunto, :mensaje)';
  try {
    $db = getConnection();
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':mail', $mail);
    $stmt->bindParam(':asunto', $asunto);
    $stmt->bindParam(':mensaje', $mensaje);
    $stmt->execute();

    echo $stmt->rowCount();

    $db = null;
  } catch(PDOException $e) {
    echo 'Error: ' . $e->getMessage();
  }
}
	
addUser($_GET['name'],$_GET['mail'],$_GET['asunto'],$_GET['comment']);

?>



