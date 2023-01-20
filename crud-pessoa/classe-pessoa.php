<?php
Class Pessoa{
    private $pdo;
    //Conexao com banco de dados
    public function __construct($dbname, $host, $user, $senha)
    {
        try
        {
            $this->pdo = new PDO("mysql:dbname=".$dbname.";host=".$host,$user,$senha);
        }
        catch(PDOException $e) {
            echo "Erro com banco de dados: ".$e->getMessage();
            exit;
        }
        catch(Exception $e){
            echo "Erro generico: ".$e->getMessage();
            exit;
        } 
    }
    // funcao para buscar dados e colocar do lado direito da tela
    public function buscarDados()
    {
        $res = array();
        $cmd = $this->pdo->query("SELECT * FROM pessoa ORDER BY id");
        $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }
}

?>