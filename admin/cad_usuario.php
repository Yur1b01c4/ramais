<?php
if (!isset($_SESSION)) { session_start(); };

// Armazenar os valores dos campos em variáveis de sessão
$_SESSION['nome_digitado'] = isset($_POST['nome']) ? $_POST['nome'] : '';
$_SESSION['login_digitado'] = isset($_POST['login']) ? $_POST['login'] : '';
$_SESSION['senha_digitada'] = isset($_POST['senha']) ? $_POST['senha'] : '';
$_SESSION['email_digitado'] = isset($_POST['email']) ? $_POST['email'] : '';

include_once("../db/conexao.php");
$p = new conexao();
  //sim

$nome = addslashes($_POST['nome']);
$login = addslashes($_POST['login']);
$senha = addslashes($_POST['senha']);
$email = addslashes($_POST['email']);

$_SESSION['nome'] = $nome;
$_SESSION['login'] = $login;
$_SESSION['senha'] = $senha;
$_SESSION['email'] = $email;

$password = password_hash($senha, PASSWORD_DEFAULT);

if (!empty($nome) && !empty($login) && !empty($senha) && !empty($email))
{
    if(!$p->cadastrarUsuarios($nome, $login, $password, $email))
    {
        $_SESSION['msg-error'] = "Administrador já cadastrado!";
        header("Location: ./cadastro_usuario.php");
        die();
    }else{
        $_SESSION['msg-success'] = "Administrador cadastrados com sucesso!";
        unset($_SESSION['nome_digitado']);
        unset($_SESSION['login_digitado']);
        unset($_SESSION['senha_digitada']);
        unset($_SESSION['email_digitado']);

        header("Location: ./buscar_adm.php");
        die();
    }
}else
{
    $_SESSION['msg-error'] = 'preencha todos os campos';
    header("Location: ./cadastro_usuario.php");
}

?>