<?php
// ------------------------CONEXAO-----------------------------------
    $dbHost = 'Localhost';
    $dbUsername = 'root';
    $dbPassword = 'gabibi89'; 
    $dbname = 'CRUDPDO';

    $pdo = new mysqli($dbHost,$dbUsername,$dbPassword,$dbname);
    if($pdo->connect_errno){
        echo "Erro na Conexao";
    }
    else
    {
        echo "Conexao realizada com sucesso";
    }
    
    $result = mysqli_query($conexao, "INSERT INTO pessoa(nome, telefone, email) 
    VALUES ('ggggg,,', '319995533374', 'g@gmail')"); 



 // ------------------------insert-----------------------------------
 // ----PHP PDO 2/10 (INSERT)
 // ------------------------delete e update-----------------------------------
 // --PHP PDO 3/10 (DELETE E UPDATE)
// -----------------------------------------------------------

     
?> 