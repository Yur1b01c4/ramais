<?php


$host = "localhost";
$user = "root";
$pass = "kbum@23";
$dbname = "ramais";

try{
    //Conexão com a porta
    $conn = new PDO("mysql:host=$host;dbname=" . $dbname, $user, $pass);

    //Conexao sem a porta
    //$conn = new PDO("mysql:host=$host;dbname=" . $dbname, $user, $pass);
    //echo "Conexão com banco de dados realizado com sucesso!";
}catch(PDOException $err){
    //echo "Erro: Conexão com banco de dados não realizado com sucesso. Erro gerado " . $err->getMessage();
}


class conexao{

   private $pdo;

     
   
   public function __construct()
   {

    $host = "localhost";
    $dbname = "ramais";
    $user = "root";
    $senha = "kbum@23";
	

      try{
        // Self::$pdo = new PDO("mysql:host=".Self::host.";dbname=".Self::dbname.";charset=utf8",
        $this->pdo = new PDO("mysql:dbname=".$dbname.";host=".$host,$user,$senha,
        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
      }
       catch (exception $e) {
        echo "erro com banco de dados: ".$e-> getMessage();
      }
       catch (exception $e) {
        echo "erro generico: ".$e-> getMessage();
        }
    }

    public function exibirRamais()
    {
        $pagina_atual = filter_input(INPUT_GET,'pagina',FILTER_SANITIZE_NUMBER_INT);
        $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
        $quantidade_de_pagina = 20;
        $inicio = ($quantidade_de_pagina * $pagina) - $quantidade_de_pagina;
        // $res = array();
        $cmd = $this->pdo->query("SELECT * FROM contatos  ORDER BY nome LIMIT $inicio, $quantidade_de_pagina");
        $res = $cmd->fetchALL(PDO::FETCH_ASSOC);
        return $res;
    }

    
    public function exibirRamaisIndex()
    {
        $pagina_atual = filter_input(INPUT_GET,'pagina',FILTER_SANITIZE_NUMBER_INT);
        $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
        $quantidade_de_pagina = 20;
        $inicio = ($quantidade_de_pagina * $pagina) - $quantidade_de_pagina;
        // $res = array();
        $cmd = $this->pdo->query("SELECT nome, ramal, email, area, unidade FROM contatos  WHERE ativo = 'SIM' ORDER BY nome LIMIT $inicio, $quantidade_de_pagina");
        $res = $cmd->fetchALL(PDO::FETCH_ASSOC);
        return $res;
    }
    
        public function buscarRamais($n)
        {
    
            $res = array();
            $cmd = $this->pdo->prepare("SELECT * FROM contatos WHERE nome LIKE '%$n%' OR ramal LIKE '%$n%' OR area LIKE '%$n%' OR unidade LIKE '%$n%' ORDER BY nome");
            $cmd->execute();
            $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
            return $res;
        }
    
        public function buscarRamaisIndex($n)
        {
    
            $res = array();
            $cmd = $this->pdo->prepare("SELECT nome, ramal, email, area, unidade FROM contatos WHERE nome LIKE '%$n%' OR ramal LIKE '%$n%' OR area LIKE '%$n%' OR unidade LIKE '%$n%' ORDER BY nome");
            $cmd->execute();
            $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
            return $res;
        }
    


    public function paginacao()
    {
        $cmd = $this->pdo->query("SELECT COUNT(id) AS num_result FROM contatos");
        $pg = $cmd->fetchALL(PDO::FETCH_ASSOC);
        return $pg;
    }


    public function login($login)
    {
        $res = array();
        $cmd = $this->pdo->prepare("SELECT id, nome, login, senha FROM usuarios WHERE login = :login LIMIT 1");
        $cmd->bindValue(":login",$login);
        $cmd->execute();
        $res = $cmd->fetch(PDO::FETCH_ASSOC);
        return $res;
    }
    
    public function cadastrarRamais($nome_cad, $ramal_cad, $email_cad, $area_cad, $unidade_cad)
    {   
        $cmd = $this->pdo->prepare("SELECT id FROM contatos WHERE email = :e");
        $cmd->bindvalue(":e",$email_cad);
        $cmd->execute();
        if($cmd->rowCount() > 0)
        {
            return false;

        }else
        {
            $cmd = $this->pdo->prepare("INSERT INTO ramais (nome, ramal, email, area, unidade) VALUES (:n, :r, :e, :a, :u)");
            $cmd->bindValue(":n",$nome_cad);
            $cmd->bindValue(":r",$ramal_cad);
            $cmd->bindValue(":e",$email_cad);
            $cmd->bindValue(":a",$area_cad);
            $cmd->bindValue(":u",$unidade_cad);
            $cmd->execute();
            return true;
        }
    }
    
    public function cadastrarUsuarios($nome, $login, $senha, $email)
    {   
        $cmd = $this->pdo->prepare("SELECT id FROM usuarios WHERE login = :l");
        $cmd->bindvalue(":l",$login);
        $cmd->execute();
        if($cmd->rowCount() > 0)
        {
            return false;

        }else
        {
            $cmd = $this->pdo->prepare("INSERT INTO usuarios (nome, login, senha, email) VALUES (:n, :l, :s, :e)");
            $cmd->bindValue(":n",$nome);
            $cmd->bindValue(":l",$login);
            $cmd->bindValue(":s",$senha);
            $cmd->bindValue(":e",$email);
            $cmd->execute();
            return true;
        }
    }

    public function excluircontatos($id)
    {
        // $cmd = $this->pdo->prepare("DELETE FROM contatos WHERE id = :id");
        $cmd = $this->pdo->prepare("UPDATE contatos SET ativo = 'NAO'  WHERE id = :id");
        $cmd->bindValue(":id",$id);
        $cmd->execute();
    }

    public function buscarDadoscontatos($id)
    {
        $res = array();
        $cmd = $this->pdo->prepare("SELECT * FROM contatos WHERE id = :id");
        $cmd->bindValue(":id",$id);
        $cmd->execute();
        $res = $cmd->fetch(PDO::FETCH_ASSOC);
        return $res;
    }

    public function atualizarContatos($id, $nome, $ramal, $email, $area, $unidade)
    {
        $cmd = $this->pdo->prepare("UPDATE contatos SET nome = :n, ramal = :r, email = :e, area = :a, unidade = :u WHERE
         id = :id");
        $cmd->bindValue(":n",$nome);
        $cmd->bindValue(":r",$ramal);
        $cmd->bindValue(":e",$email);
        $cmd->bindValue(":a",$area);
        $cmd->bindValue(":u",$unidade);
        $cmd->bindValue(":id",$id);
        $cmd->execute();
    }

    public function cadastrarpessoas($nome, $ramal, $email, $area, $unidade)
    {
        $cmd = $this->pdo->prepare("SELECT id FROM contatos WHERE email = :e");
        $cmd->bindvalue(":e",$email);
        $cmd->execute();
        if($cmd->rowCount() > 0)
        {
            return false;
        }else
        {
            $cmd = $this->pdo->prepare("INSERT INTO contatos (nome, ramal, email, area, unidade) VALUES (:n, :r, :e, :a, :u)");
            $cmd->bindValue(":n",$nome);
            $cmd->bindValue(":r",$ramal);
            $cmd->bindValue(":e",$email);
            $cmd->bindValue(":a",$area);
            $cmd->bindValue(":u",$unidade);
            $cmd->execute();
            return true;
        }
    }

    public function verificarExcluidos($id)
    {
        $res = array();
        $cmd = $this->pdo->prepare("SELECT * FROM contatos WHERE ativo = 'NAO' AND id = :id");
        $cmd->bindValue(":id",$id);
        $cmd->execute();
        $res = $cmd->fetch(PDO::FETCH_ASSOC);
        return $res;
    }

    public function ativarContatos($id)
    {
        // $cmd = $this->pdo->prepare("DELETE FROM contatos WHERE id = :id");
        $cmd = $this->pdo->prepare("UPDATE contatos SET ativo = 'SIM'  WHERE id = :id");
        $cmd->bindValue(":id",$id);
        $cmd->execute();
    }
}
?>