<?php

require_once 'classe-pessoa.php';
$p = new Pessoa("crudpdo","localhost","root","gabibi89");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
<?php
    if(isset($_POST['nome']))
    {
        $nome = addslashes($_POST['nome']);
        $telefone = addslashes($_POST['telefone']);
        $email = addslashes($_POST['email']);
    if (!empty($nome) && !empty($telefone) && !empty($email))
        {
            IF(!$P->cadastrarPessoa($nome, $telefone, $email))
            {
                echo "Email ja esta cadastrado";
            }
        }
        else
        {    
             echo "Preencha todos campos";
        }

    }
?>

    <section id="esquerda">
        <form method="POST">
            <h2>Cadastrar Pessoa v0</h2>
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome">
            <label for="telefone">Telefone</label>
            <input type="text" name="telefone" id="telefone">
            <label for="email">Email</label>
            <input type="email" name="email" id="email">
            <input type="submit" value="Cadastrar">
        </form>
    </section>
    <section id="direita">
    <table>
            <tr id="titulo">
                <td>Nome</td>
                <td>Telefone</td>
                <td colspan="2">Email></td>
            </tr>
        <?php
            $dados = $p->buscarDados();
            if(count($dados) > 0)//tem pessoas no banco
            {
                for($i=0;$i < count($dados); $i++)
                {
                    echo "<tr>";
                    foreach($dados[$i] as $k => $v)
                    {
                        if($k != "id")
                        {
                            echo "<td>".$v."</td>";
                        }
                    }
                    ?>
                    <td><a href="">Editar</a><a href="">Exluir</a></td>
                    <?php
                    echo "</tr>";      
                }

            }
            else // o banco esta vazio
            {
                echo "Banco Vazio";
            } 
            
            // echo "<pre>";
            // var_dump($dados);
            // echo "</pre>";
        ?>
        
            <tr>
                
            </tr>
        </table>
    </section>
    
</body>
</html>