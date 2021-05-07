<?php
    #---------------------------------Conexão com banco de dados---------------------------------------
    $dsn         = 'mysql';     //Para alterar o banco de cados basta trocar o valor da variável.
    $host        = 'mysql';     //localhost.
    $database    = 'Sistema_Cadastro';  //Nome do banco
    $user        = 'root';
    $password    = 'root';
    $port        = 3306;        //Opcional

    $pdo = new PDO("{$dsn}:host={$host};port={$port};dbname={$database}", $user,$password);
    #--------------------------------------------------------------------------------------------------