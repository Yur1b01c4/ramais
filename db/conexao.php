<?php


$host = "localhost";
$user = "root";
$pass = "";
$dbname = "ramais";

try{
    //Conexão com a porta
    $conn = new PDO("mysql:host=$host;dbname=" . $dbname, $user, $pass);

    //Conexão sem a porta
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
    $senha = "";
	

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
        $cmd = $this->pdo->query("SELECT id, nome, ramal, email, area, unidade FROM contatos  ORDER BY nome LIMIT $inicio, $quantidade_de_pagina");
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
            $cmd = $this->pdo->prepare("SELECT id, nome, ramal, email, area, unidade FROM contatos WHERE nome LIKE '%$n%' OR ramal LIKE '%$n%' OR area LIKE '%$n%' OR unidade LIKE '%$n%' ORDER BY nome");
            $cmd->execute();
            $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
            return $res;
        }
    
        public function buscarAdm($n)
        {
    
            $res = array();
            $cmd = $this->pdo->prepare("SELECT id, nome, login, email FROM usuarios WHERE nome LIKE '%$n%' OR login LIKE '%$n%' ORDER BY nome");
            $cmd->execute();
            $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
            return $res;
        }
    
        public function buscarRamaisIndex($n)
        {
    
            $res = array();
            $cmd = $this->pdo->prepare("SELECT nome, ramal, email, area, unidade FROM contatos WHERE ativo = 'SIM' AND nome LIKE '%$n%' OR ramal LIKE '%$n%' OR area LIKE '%$n%' OR unidade LIKE '%$n%' ORDER BY nome");
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
        $cmd = $this->pdo->prepare("SELECT id, nome, login, senha FROM usuarios WHERE UPPER(login) = UPPER(:login) AND ATIVO = 'SIM' LIMIT 1");
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
            $cmd = $this->pdo->prepare("INSERT INTO contatos (nome, ramal, email, area, unidade) VALUES (:n, :r, :e, :a, :u)");
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
            $cmd = $this->pdo->prepare("INSERT INTO usuarios (nome, login, senha, email, data_criacao) VALUES (:n, :l, :s, :e, :d)");
            $cmd->bindValue(":n",$nome);
            $cmd->bindValue(":l",$login);
            $cmd->bindValue(":s",$senha);
            $cmd->bindValue(":e",$email);
            $cmd->bindValue(":d",date("Y-m-d H:i:s"));
            $cmd->execute();
            return true;
        }
    }
    
        public function excluircontatos($id)
        {
            // $cmd = $this->pdo->prepare("DELETE FROM contatos WHERE id = :id");
            $cmd = $this->pdo->prepare("DELETE FROM contatos WHERE id = :id");
            $cmd->bindValue(":id",$id);
            $cmd->execute();
        }
    
        public function excluirAdm($id)
        {
            // $cmd = $this->pdo->prepare("DELETE FROM contatos WHERE id = :id");
            $cmd = $this->pdo->prepare("DELETE FROM usuarios WHERE id = :id");
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

    public function verificarEmailExistente($email) {
        $cmd = $this->pdo->prepare("SELECT id FROM usuarios WHERE email = :email");
        $cmd->bindValue(":email", $email);
        $cmd->execute();
        return $cmd->rowCount() > 0;
    }

    public function buscarDadosusuarios($id)
    {
        $res = array();
        $cmd = $this->pdo->prepare("SELECT * FROM usuarios WHERE id = :id");
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

    public function atualizarAdm($id, $nome, $login, $email)
    {
        $cmd = $this->pdo->prepare("UPDATE usuarios SET nome = :n, login = :l, email = :e, data_modificacao =:d WHERE
         id = :id");
        $cmd->bindValue(":n",$nome);
        $cmd->bindValue(":l",$login);
        $cmd->bindValue(":e",$email);
        $cmd->bindValue(":id",$id);
        $cmd->bindValue(":d",date("Y-m-d H:i:s"));
        $cmd->execute();
    }

    public function cadastrarAdm($nome, $login, $email)
    {
        $cmd = $this->pdo->prepare("SELECT id FROM usuarios WHERE email = :e");
        $cmd->bindvalue(":e",$email);
        $cmd->execute();
        if($cmd->rowCount() > 0)
        {
            return false;
        }else
        {
            $cmd = $this->pdo->prepare("INSERT INTO usuarios (nome, login, email) VALUES (:n, :l, :e)");
            $cmd->bindValue(":n",$nome);
            $cmd->bindValue(":l",$login);
            $cmd->bindValue(":e",$email);
            $cmd->execute();
            return true;
        }
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

    public function verificarAdmsExcluidos($id)
    {
        $res = array();
        $cmd = $this->pdo->prepare("SELECT * FROM usuarios WHERE ativo = 'NAO' AND id = :id");
        $cmd->bindValue(":id",$id);
        $cmd->execute();
        $res = $cmd->fetch(PDO::FETCH_ASSOC);
        return $res;
    }
}
?>