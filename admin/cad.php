<?php
if (!isset($_SESSION)) { session_start(); };

$_SESSION['nome_digitado'] = isset($_POST['nome']) ? $_POST['nome'] : '';
$_SESSION['ramal_digitado'] = isset($_POST['ramal']) ? $_POST['ramal'] : '';
$_SESSION['email_digitado'] = isset($_POST['email']) ? $_POST['email'] : '';
$_SESSION['area_digitado'] = isset($_POST['area']) ? $_POST['area'] : '';
$_SESSION['unidade_digitado'] = isset($_POST['unidade']) ? $_POST['unidade'] : '';

include_once("../db/conexao.php");
$p = new conexao();

$nome_cad = addslashes($_POST['nome']);
$ramal_cad = addslashes($_POST['ramal']);
$email_cad = addslashes($_POST['email']);
$area_cad = addslashes($_POST['area']);
$unidade_cad = addslashes($_POST['unidade']);

$_SESSION['nome'] = $nome_cad;
$_SESSION['ramal'] = $ramal_cad;
$_SESSION['email'] = $email_cad;
$_SESSION['area'] = $area_cad;
$_SESSION['unidade'] = $unidade_cad;

if (!empty($nome_cad) && !empty($ramal_cad) && !empty($email_cad) && !empty($area_cad) && !empty($unidade_cad))
{
    if(!$p->cadastrarRamais($nome_cad, $ramal_cad, $email_cad, $area_cad, $unidade_cad))
    {
        $_SESSION['msg-error'] = "Email já cadastrado!";
            header("Location: ./cadastro.php");
        die();
    }else{
        $_SESSION['msg-success'] = "Dados cadastrados com sucesso!";
            unset($_SESSION['nome']);
            unset($_SESSION['ramal']);
            unset($_SESSION['email']);
            unset($_SESSION['area']);
            unset($_SESSION['unidade']);
            header("Location: ./dashboard.php");
        die();
    }
}else
{
    $_SESSION['msg-error'] = 'preencha todos os campos';
    header("Location: ./cadastro.php");
}
?>