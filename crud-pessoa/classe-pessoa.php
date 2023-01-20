<?php
Class Pessoa{
    private $pdo;
    //Conexao com banco de dados
    public function__construct($dbname, $host, $usr, $senha)
    {
        try{
            $this->pdo = new PDO("mysql:dbname=".$dbname.";host=".$host,$user,$senha);
        }
        catch(PDOException $e){
            echo "Erro com banco de dados: ".$e->;
            getMessage();
            exit;
        }
        catch(Exception $e){
            echo "Erro generico: ".$e->;
            getMessage();
            exit;
        } 
    }
    public function buscarDados()
    {
        $cmd = $this->pdo->prepare("SELECT * FROM pessoa ORDER BY id");
    }
}

?>