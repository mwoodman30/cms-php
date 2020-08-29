<?php

try {
    $pdo = new PDO('mysql:host=localhost;dbname=cms_practice', 'root', 'root');

}catch (PDOException $e) {
    exit('Database error.');
}
?>