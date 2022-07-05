<?php
/* sürücü isteğiyle bir odbc veritabanına bağlanalım */
$dsn = 'mysql:dbname=;host=';
$user = '';
$password = '';

try {
    $baglan = new PDO($dsn, $user, $password);
//    echo "veritabanı bağlantısı başarılı";
} catch (PDOException $e) {
    echo 'Bağlantı kurulamadı :  ' . $e->getMessage();
}



?>