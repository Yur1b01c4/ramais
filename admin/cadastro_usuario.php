<?php
if (!isset($_SESSION)) { session_start(); };

if (!isset($_SESSION['login'])){
  $_SESSION['msg-error'] = "Acesso permitido somente com login!";
  header("Location: ./index.php");
  die();
}else{

  include_once('../pag.html');


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <link rel="shortcut icon" href="../img/logo-nardini.png" type="image/x-icon">
</head>
<body>
  


<div class="container">
    <div class="row justify-content-center">
        <div class="col-auto">
          <h1 class="text" >Novo Administrador</h1>
        </div>
      </div>

  <div class="row justify-content-center">
    <div class="col-lg-6">
      <form method="POST" action="./cad_usuario.php">
          <div class="mb-3">
                <label for="nome" class="form-label">Nome completo</label>
                <input type="text" name="nome" class="form-control" placeholder="Nome completo" value="<?php echo isset($_SESSION['nome_digitado']) ? $_SESSION['nome_digitado'] : ''; ?>">
            </div>
            <div class="mb-3">
                <label for="login" class="form-label">Login</label>
                <input type="text" name="login" class="form-control" placeholder="Login" value="<?php echo isset($_SESSION['login_digitado']) ? $_SESSION['login_digitado'] : ''; ?>">
              </div>
              <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo isset($_SESSION['email_digitado']) ? $_SESSION['email_digitado'] : ''; ?>">
              </div>
            <div class="mb-3">
                <label for="senha" class="form-label">Senha</label>
                <input type="string" name="senha" class="form-control" placeholder="Senha" value="<?php echo isset($_SESSION['senha_digitada']) ? $_SESSION['senha_digitada'] : ''; ?>">
            </div>
            <div class="mb-3 mt-3">
                <button type="submit" name="submit" class="btn btn-success-primary">Cadastrar</button>
            </div>
      </form>
    </div>
  </div>

  <div class="row justify-content-center">
        <div class="col-auto">
            <a class="link_voltar" href="dashboard.php">
            <button class="voltar">
            < Voltar
            <svg class="svg" viewBox="0 0 448 512">
            </svg>
            </button>
            </a>
        </div>
    </div>

<?php

if (!isset($_SESSION)) { session_start(); };

if(isset($_SESSION['msg-error'])){
    $error_id = uniqid('error_');
    echo '<div id="time" class="error">';
    echo '    <div class="error__icon">';
    echo '        <svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" height="24" fill="none"><path fill="#393a37" d="m13 13h-2v-6h2zm0 4h-2v-2h2zm-1-15c-1.3132 0-2.61358.25866-3.82683.7612-1.21326.50255-2.31565 1.23915-3.24424 2.16773-1.87536 1.87537-2.92893 4.41891-2.92893 7.07107 0 2.6522 1.05357 5.1957 2.92893 7.0711.92859.9286 2.03098 1.6651 3.24424 2.1677 1.21325.5025 2.51363.7612 3.82683.7612 2.6522 0 5.1957-1.0536 7.0711-2.9289 1.8753-1.8754 2.9289-4.4189 2.9289-7.0711 0-1.3132-.2587-2.61358-.7612-3.82683-.5026-1.21326-1.2391-2.31565-2.1677-3.24424-.9286-.92858-2.031-1.66518-3.2443-2.16773-1.2132-.50254-2.5136-.7612-3.8268-.7612z"></path></svg>';
    echo '    </div>';
    echo '    <div class="error__title">';
    echo    $_SESSION['msg-error'];
    echo '    </div>';
    unset($_SESSION["msg-error"]);
}

if(isset($_SESSION['msg-success'])){
    $success_id = uniqid('success_');
    echo '<div id="time" class="success">';
    echo '    <div class="success__icon">';
    echo '        <svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" height="24" fill="none"><path fill="#393a37" d="m13 13h-2v-6h2zm0 4h-2v-2h2zm-1-15c-1.3132 0-2.61358.25866-3.82683.7612-1.21326.50255-2.31565 1.23915-3.24424 2.16773-1.87536 1.87537-2.92893 4.41891-2.92893 7.07107 0 2.6522 1.05357 5.1957 2.92893 7.0711.92859.9286 2.03098 1.6651 3.24424 2.1677 1.21325.5025 2.51363.7612 3.82683.7612 2.6522 0 5.1957-1.0536 7.0711-2.9289 1.8753-1.8754 2.9289-4.4189 2.9289-7.0711 0-1.3132-.2587-2.61358-.7612-3.82683-.5026-1.21326-1.2391-2.31565-2.1677-3.24424-.9286-.92858-2.031-1.66518-3.2443-2.16773-1.2132-.50254-2.5136-.7612-3.8268-.7612z"></path></svg>';
    echo '    </div>';
    echo '    <div class="success__title">';
    echo    $_SESSION['msg-success'];
    echo '    </div>';
}  
?>

</div>

</body>
</html>

<?php


}
?>

<script src="./msg.js"></script>

<style>

/* Mensagens de erro ou de sucesso */
/* Mensagens de erro ou de sucesso */
/* Mensagens de erro ou de sucesso */
.fadeOut {
    opacity: 0;
    transition: opacity 1s ease-out; /* 1s = 1 segundo */
}

.error {
  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
  width: 270px;
  padding: 12px;
  display: flex;
  flex-direction: row;
  align-items: center;
  justify-content: start;
  background: #EF665B;
  border-radius: 8px;
  box-shadow: 0px 0px 5px -3px #111;
  position: relative;
  left: 420px;
}

.success {
  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
  width: 320px;
  padding: 12px;
  display: flex;
  flex-direction: row;
  align-items: center;
  justify-content: start;
  background: #00b553 ;
  border-radius: 8px;
  box-shadow: 0px 0px 5px -3px #111;
}

.error__icon,
.success__icon {
  width: 20px;
  height: 20px;
  transform: translateY(-2px);
  margin-right: 8px;
}

.error__icon path,
.success__icon path {
  fill: #fff;
}

.error__title,
.success__title {
  font-weight: 500;
  font-size: 14px;
  color: #fff;
}

.error__close,
.success__close {
  width: 20px;
  height: 20px;
  cursor: pointer;
  margin-left: auto;
}

.error__close path,
.success__close path {
  fill: #fff;
}

/* Titulo h1 */
/* Titulo h1 */
/* Titulo h1 */

.text{
  color:#00b553;
}

/* Botão voltar */
/* Botão voltar */
/* Botão voltar */

.voltar {
  width: 100px;
  height: 50px;
  background-color: rgb(255, 69, 69);
  border-radius: 10px;
  color: white;
  border: none;
  cursor: pointer;
}

.svg {
  width: 5px;
  text-decoration: none;
}

.voltar:hover {
  background-color: rgb(77, 77, 77);
  transition-duration: .2s;
}

.link_voltar{
  top: 16px;
  left: 120px;
  position: fixed;
}
</style>