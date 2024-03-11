<?php

ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);


if (!isset($_SESSION)) { session_start(); };

include_once("../db/conexao.php");
$p = new conexao("intranet","localhost","root","");


$login    = addslashes($_POST['login']);
$senha    = addslashes($_POST['senha']);

if((!empty($login)) OR (!empty($senha))){ 
    //Gerar a senha criptografa
    //echo password_hash($senha, PASSWORD_DEFAULT);
    //Pesquisar o usuário no BD
    //$sql = "select * from usuarios where login = 'jonas';";
    
    $dados= $p->login($login);
    if($dados){
      if(password_verify($senha, $dados['senha'])){
        $_SESSION['id']             = $dados['id'];
        $_SESSION['login']          = $dados['login'];
        // $_SESSION['senha']          = $dados['senha'];
        $_SESSION['nome']           = $dados['nome'];
        $_SESSION['ativo']          = $dados['ativo'];
        
        header("Location: ./dashboard.php");
      }else{
				$_SESSION['msg-error'] = "Login ou Senha incorreta!";
				header("Location: ./index.php");
			}
    }else{
      $_SESSION['msg-error'] = "usuario não encontrado!";
      header("Location: ./index.php");
    }
  
}else{
	$_SESSION['msg-error'] = "Digite seu login e sua senha!";
    //$_SESSION['msg-error'] = $btnLogin;
	header("Location: ./index.php");
}



?>