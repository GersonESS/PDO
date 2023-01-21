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
        if(!empty($nome) && !empty($telefone) && !empty($email))
        {
            if(!$p->cadastrarPessoa($nome, $telefone, $email))          
            {
                echo "email ja esta cadastrado";
            }
        }
        else
        {
            echo "preencha todos campos";
        }
    }
 ?>
    <section id="esquerda">
        <form method="POST">
            <h2>Cadastrar Pessoa </h2>
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
                <td colspan="2">Email</td>
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
                    <td>
                        <?php echo $dados[$i]['id']; ?> 
                        <a href="">Editar</a>
                        <a href="index.php?id=<?php echo $dados[$i]['id'];?>">Exluir</a>
                    </td>
                    <?php
                    echo "</tr>";      
                }
            }
            else // o banco esta vazio
            {
                echo "Banco Vazio";
            } 
        ?>
        </table>
    </section>
</body>
</html>
<?php
    if(isset($_GET['id']))
    {
        $id_pessoa = addslashes($_GET['id']);
        $p->excluirPessoa($id_pessoa);
        header("location: index.php");
    }
    
?>