<?php
  if (!isset($_SESSION)) { session_start(); };
    require_once './db/conexao.php';  
    $p = new conexao();

?>

<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LISTA DE RAMAIS</title>
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="shortcut icon" href="./img/logo-nardini.png" type="image/x-icon">

  </head>
  <body>

  <?php
    include_once('./admin/pag.html');
  ?>

  <div class="container-fluid">
      
      <h1 class="text mb-2 mt-2">Lista Ramais</h1>
      <form class=" form row row-cols-lg-auto g-col-6 align-items-center" method="POST" action="busca.php">
        <div class="row col-lg-6 mb-3 mt-3">
            <div class="busca col">
                <div class="input-group">
                    <input type="text" name="nome" class="form-control" placeholder="Buscar Contato" required aria-label="First name">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-corPrincipal">Buscar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

<a class="link_voltar" href="./index.php">
  <button class="botao">
    < Voltar
    <svg class="svg" viewBox="0 0 448 512">
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
          </tr>
        </thead>
        <tbody>
          <?php
         
            @$nomes = addslashes($_POST['nome']);
            $dados = $p->buscarRamaisIndex($nomes);
            //var_dump($dados);
           
            if(count($dados) > 0){
              if(count($dados) > 0){
                foreach ($dados as $contato) {
                  echo "<tr>";
                    foreach ($contato as $k => $v) {
                      if ($k === "email") {
                        echo "<td><a class='link' target='_blank' href=\"https://teams.microsoft.com/l/chat/0/0?users=$v\">$v</a></td>";
                      } else {
                        echo "<td>$v</td>";
                      }   
                    } 
                  }
                }
                echo "</tr>";
            } else {
              $_SESSION['msg-error'] = "A pesquisa <strong>$nomes</strong> não foi encontrado!!!";
            }
            

          if (isset($_SESSION['msg-error'])) { ?>
            <div class="alert alert-danger mt-3" role="alert">
                <?php echo $_SESSION['msg-error']; ?>
            </div>
          <?php } ?>
        </tbody>
      </table>
    
    <?php unset($_SESSION['msg-error']); ?>

    <script src="./adm/script.js"></script>
  </body>
</html>

<style>

  /* Busca */
  /* Busca */
  /* Busca */

.text{
  color:#00b553;
}

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

/* Botao dicas */
/* Botao dicas */
/* Botao dicas */

.form{
  position: sticky;
  top: 0px;
}

/* Botao Voltar */
/* Botao Voltar */
/* Botao Voltar */

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

.link_voltar{
  top: -59px;
  left: 650px;
  position: relative;
}

.InputContainer {
  height: 40px;
  display: flex;
  align-items: center;
  justify-content: center;
  background-color: rgb(255, 255, 255);
  border-radius: 10px;
  overflow: hidden;
  cursor: pointer;
  padding-left: 15px;
  box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.075);
}

.input {
  width: 170px;
  height: 100%;
  border: none;
  outline: none;
  font-size: 0.9em;
  caret-color: rgb(255, 81, 0);
}

.labelforsearch {
  cursor: text;
  padding: 0px 12px;
}

.searchIcon {
  width: 13px;
}

.border {
  height: 40%;
  width: 1.3px;
  background-color: rgb(223, 223, 223);
}

.searchIcon path {
  fill: rgb(114, 114, 114);
}

</style>