<?php
    $link = 'mysql:host=localhost;dbname=movieclub';
    $usuario = 'root';
    $pass = '';

    try {
        $pdo = new PDO($link, $usuario, $pass);
        // echo 'Conectado';

        // foreach($pdo->query('SELECT * FROM `movieclub`') as $fila) {
        //     print_r($fila);
        // }
    } catch (PDOException $e) {
        print "¡Error!: " . $e->getMessage() . "<br/>";
        die();
    }
?>