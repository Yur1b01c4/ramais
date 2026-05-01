<?php
  if (!isset($_SESSION)) { session_start(); };
    require_once '../db/conexao.php';  
    $p = new conexao();

    if (!isset($_SESSION['login'])){
      $_SESSION['msg-error'] = "Acesso permitido somente com login!";
      header("Location: ./index.php");
      die();
    }else{
  //sim

    $pagina_atual = filter_input(INPUT_GET,'pagina',FILTER_SANITIZE_NUMBER_INT);
    $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
    $quantidade_de_pagina = 10;      
    $inicio = ($quantidade_de_pagina * $pagina) - $quantidade_de_pagina;


if(isset($_GET['id']))
{
  if ((isset($_GET['func'])) AND ($_GET['func'] == 'del')) {
      $id_contatos = addslashes($_GET['id']);
      $p->excluircontatos($id_contatos);
      header("location: buscar.php");
  }
}

  include_once('../pag.html');
?>

<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gerenciamento de Contatos</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <link rel="shortcut icon" href="../img/logo-nardini.png" type="image/x-icon">
</head>

<body>


    <div class="container-fluid">

        <h1 class="text mb-2 mt-2">Gerenciamento de Contatos</h1>

        <form class="form row row-cols-lg-auto g-col-6 align-items-center" method="POST" action="buscar.php">
            <div class="row col-lg-6 mb-3 mt-3">
                <div class="busca col">
                    <div class="input-group">
                        <input type="text" name="nome" class="form-control" placeholder="Buscar Contato" required
                            aria-label="First name">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-corPrincipal">Buscar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <a class="link_voltar" href="dashboard.php">
            <button class="botao">
                < Voltar <svg class="svg" viewBox="0 0 448 512">
                    </svg>
            </button>
        </a>

        <table class="table table-bordered border-dark">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Ramal</th>
                    <th scope="col">Email</th>
                    <th scope="col">Área</th>
                    <th scope="col">Unidade</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Excluir</th>
                </tr>
            </thead>
            <tbody>
                <?php
         
            @$nomes = addslashes($_POST['nome']);
            $dados = $p->buscarRamais($nomes);
           
            if(count($dados) > 0){
              foreach ($dados as $contato) {
                echo "<tr>";
                foreach ($contato as $k => $v){
                    if($k != "id"){
                        if ($k === "email") {
                            echo "<td><a class='link' target='_blank' href=\"https://teams.microsoft.com/l/chat/0/0?users=$v\">$v</a></td>";
                        } else {
                            echo "<td>".$v."</td>";
                        }
                    }
                }

      // Adicionando os botões de edição e exclusão no final de cada linha
      ?>
                <td>
                    <a class="editButton" href="adm.php?id_editar=<?php echo $contato['id'];?>">
                        <button class="editBtn">
                            <svg height="1em" viewBox="0 0 512 512">
                                <path
                                    d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z">
                                </path>
                            </svg>
                        </button>
                    </a>
                </td>

                <td>
                    <?php
          $dados2 = $p->verificarExcluidos($contato['id']);
          if (!$dados2) { ?>
                    <a class="editButton" id="deletar" onclick="return confirm('Deseja mesmo excluir este contato??');"
                        href="dashboard.php?id=<?php echo $contato['id'].'&func=del' ?>"><button class="button">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 69 14"
                                class="svgIcon bin-top">
                                <g clip-path="url(#clip0_35_24)">
                                    <path fill="black"
                                        d="M20.8232 2.62734L19.9948 4.21304C19.8224 4.54309 19.4808 4.75 19.1085 4.75H4.92857C2.20246 4.75 0 6.87266 0 9.5C0 12.1273 2.20246 14.25 4.92857 14.25H64.0714C66.7975 14.25 69 12.1273 69 9.5C69 6.87266 66.7975 4.75 64.0714 4.75H49.8915C49.5192 4.75 49.1776 4.54309 49.0052 4.21305L48.1768 2.62734C47.3451 1.00938 45.6355 0 43.7719 0H25.2281C23.3645 0 21.6549 1.00938 20.8232 2.62734ZM64.0023 20.0648C64.0397 19.4882 63.5822 19 63.0044 19H5.99556C5.4178 19 4.96025 19.4882 4.99766 20.0648L8.19375 69.3203C8.44018 73.0758 11.6746 76 15.5712 76H53.4288C57.3254 76 60.5598 73.0758 60.8062 69.3203L64.0023 20.0648Z">
                                    </path>
                                </g>
                                <defs>
                                    <clipPath id="clip0_35_24">
                                        <rect fill="white" height="14" width="69"></rect>
                                    </clipPath>
                                </defs>
                            </svg>

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 69 57"
                                class="svgIcon bin-bottom">
                                <g clip-path="url(#clip0_35_22)">
                                    <path fill="black"
                                        d="M20.8232 -16.3727L19.9948 -14.787C19.8224 -14.4569 19.4808 -14.25 19.1085 -14.25H4.92857C2.20246 -14.25 0 -12.1273 0 -9.5C0 -6.8727 2.20246 -4.75 4.92857 -4.75H64.0714C66.7975 -4.75 69 -6.8727 69 -9.5C69 -12.1273 66.7975 -14.25 64.0714 -14.25H49.8915C49.5192 -14.25 49.1776 -14.4569 49.0052 -14.787L48.1768 -16.3727C47.3451 -17.9906 45.6355 -19 43.7719 -19H25.2281C23.3645 -19 21.6549 -17.9906 20.8232 -16.3727ZM64.0023 1.0648C64.0397 0.4882 63.5822 0 63.0044 0H5.99556C5.4178 0 4.96025 0.4882 4.99766 1.0648L8.19375 50.3203C8.44018 54.0758 11.6746 57 15.5712 57H53.4288C57.3254 57 60.5598 54.0758 60.8062 50.3203L64.0023 1.0648Z">
                                    </path>
                                </g>
                                <defs>
                                    <clipPath id="clip0_35_22">
                                        <rect fill="white" height="57" width="69"></rect>
                                    </clipPath>
                                </defs>
                            </svg>
                        </button>
                    </a>
                    <?php }  ?>
                </td>
                <?php

      echo "</tr>";
  } 
} else {
    $_SESSION['msg-error'] = "A pesquisa <strong>$nomes</strong> não foi encontrado!";
    $largura = strlen($nomes) * 10; // Ajuste o multiplicador conforme necessário
  }
?>
            </tbody>
        </table>

<?php
// Verifica se há uma mensagem de sucesso na sessão

if (!isset($_SESSION)) { session_start(); };

if(isset($_SESSION['msg-error'])){
    $error_id = uniqid('error_');
    echo '<div id="" class="error">';
    echo '    <div class="error__icon">';
    echo '        <svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" height="24" fill="none"><path fill="#393a37" d="m13 13h-2v-6h2zm0 4h-2v-2h2zm-1-15c-1.3132 0-2.61358.25866-3.82683.7612-1.21326.50255-2.31565 1.23915-3.24424 2.16773-1.87536 1.87537-2.92893 4.41891-2.92893 7.07107 0 2.6522 1.05357 5.1957 2.92893 7.0711.92859.9286 2.03098 1.6651 3.24424 2.1677 1.21325.5025 2.51363.7612 3.82683.7612 2.6522 0 5.1957-1.0536 7.0711-2.9289 1.8753-1.8754 2.9289-4.4189 2.9289-7.0711 0-1.3132-.2587-2.61358-.7612-3.82683-.5026-1.21326-1.2391-2.31565-2.1677-3.24424-.9286-.92858-2.031-1.66518-3.2443-2.16773-1.2132-.50254-2.5136-.7612-3.8268-.7612z"></path></svg>';
    echo '    </div>';
    echo '    <div class="error__title">';
    echo    $_SESSION['msg-error'];
    echo '    </div>';
    unset($_SESSION["msg-error"]);
}

if(isset($_SESSION['msg-success'])){
// Estilo inline para definir a largura do contêiner
    $success_id = uniqid('success_');
    echo '<div id="time" class="success">';
    echo '    <div class="success__icon">';
    echo '        <svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" height="24" fill="none"><path fill="#393a37" d="m13 13h-2v-6h2zm0 4h-2v-2h2zm-1-15c-1.3132 0-2.61358.25866-3.82683.7612-1.21326.50255-2.31565 1.23915-3.24424 2.16773-1.87536 1.87537-2.92893 4.41891-2.92893 7.07107 0 2.6522 1.05357 5.1957 2.92893 7.0711.92859.9286 2.03098 1.6651 3.24424 2.1677 1.21325.5025 2.51363.7612 3.82683.7612 2.6522 0 5.1957-1.0536 7.0711-2.9289 1.8753-1.8754 2.9289-4.4189 2.9289-7.0711 0-1.3132-.2587-2.61358-.7612-3.82683-.5026-1.21326-1.2391-2.31565-2.1677-3.24424-.9286-.92858-2.031-1.66518-3.2443-2.16773-1.2132-.50254-2.5136-.7612-3.8268-.7612z"></path></svg>';
    echo '    </div>';
    echo '    <div class="success__title">';
    echo    $_SESSION['msg-success'];
    echo '    </div>';
} 

    // Remove a mensagem de sucesso da sessão para que não seja exibida novamente após recarregar a página
    unset($_SESSION['msg-success']);
    unset($_SESSION['msg-error']);
?>

      </div>
</body>

</html>

<script src="./msg.js"></script>

<?php
    }
?>

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
  width: $largura;
  padding: 12px;
  display: flex;
  flex-direction: row;
  align-items: center;
  justify-content: start;
  background: #EF665B;
  border-radius: 8px;
  box-shadow: 0px 0px 5px -3px #111;
}

.success {
  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
  width: auto;
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


.text {
    color: #00b553;
}

/* Busca */
/* Busca */
/* Busca */

.container-fluid {
    padding: 20px;
}

.busca {
    position: relative;
    display: flex;
    align-items: center;
}

.form-control {
    border-radius: 5px 0 0 5px;
    border: 1px solid #ced4da;
    flex-grow: 1;
    padding-right: 40px;
}

.btn-corPrincipal {
    border-radius: 0 5px 5px 0;
    background-color: #28a745;
    color: #fff;
    border: 1px solid #28a745;
    position: absolute;
    right: 0;
    top: 0;
    bottom: 0;
    z-index: 1;
}

.btn-corPrincipal:hover {
    background-color: #218838;
    color: #fff;
}


.listaAdmin {
    position: relative;
    top: -123px;
    left: 482px;
}

/* Botao voltar */
/* Botao voltar */
/* Botao voltar */

.form {
    position: sticky;
    top: -10px;
}

.botao {
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

.svg path {
    fill: rgb(0, 206, 62);
}

.botao:hover {
    background-color: rgb(77, 77, 77);
    transition-duration: .2s;
}

.link_voltar {
    top: -59px;
    left: 650px;
    position: relative;
}

/* Botão Editar */
/* Botão Editar */
/* Botão Editar */

.editButton {
    position: relative;
    left: 15px;
}

.editBtn {
    width: 55px;
    height: 55px;
    border-radius: 20px;
    border: none;
    background-color: rgb(93, 93, 116);
    align-items: center;
    justify-content: center;
    box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.123);
    cursor: pointer;
    position: relative;
    overflow: hidden;
    transition: all 0.3s;
}

.editBtn::before {
    content: "";
    width: 200%;
    height: 200%;
    background-color: rgb(102, 102, 141);
    position: absolute;
    z-index: 1;
    transform: scale(0);
    transition: all 0.3s;
    border-radius: 50%;
    filter: blur(10px);
}

.editBtn:hover::before {
    transform: scale(1);
}

.editBtn:hover {
    box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.336);
}

.editBtn svg {
    height: 17px;
    fill: white;
    z-index: 3;
    transition: all 0.2s;
    transform-origin: bottom;
}

.editBtn:hover svg {
    transform: rotate(-15deg) translateX(5px);
}

.editBtn::after {
    content: "";
    width: 25px;
    height: 1.5px;
    position: absolute;
    bottom: 19px;
    left: -5px;
    background-color: white;
    border-radius: 2px;
    z-index: 2;
    transform: scaleX(0);
    transform-origin: left;
    transition: transform 0.5s ease-out;
}

/* Botão Excluir */
/* Botão Excluir */
/* Botão Excluir */

.button {
    width: 55px;
    height: 55px;
    border-radius: 20px;
    background-color: rgb(20, 20, 20);
    border: none;
    font-weight: 600;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.164);
    cursor: pointer;
    transition-duration: 0.3s;
    overflow: hidden;
    position: relative;
    gap: 2px;
}

.svgIcon {
    width: 12px;
    transition-duration: 0.3s;
}

.svgIcon path {
    fill: white;
}

.button:hover {
    transition-duration: 0.3s;
    background-color: rgb(255, 69, 69);
    align-items: center;
}

.bin-top {
    transform-origin: bottom right;
}

.button:hover .bin-top {
    transition-duration: 0.5s;
    transform: rotate(160deg);
}
</style>