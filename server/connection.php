<?php

try {
        $strConnection = 'mysql:host=127.0.0.1;dbname=OpenBooks';
        $conn = new PDO($strConnection, 'root', '');
} catch (PDOException $e) {
        $msg = 'ERROR PDO ON ' . $e->getMessage();
        die($msg);
}
?>
