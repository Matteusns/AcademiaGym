<?php
    $dbHost = "Localhost";
    $dbUser = 'root';
    $dbPassword = '';
    $dbName = "academia_gym";

    $conexao = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);

    
// Verifica a conexão
if (!$conexao) {
    die("Conexão falhou: " . mysqli_connect_error());
}