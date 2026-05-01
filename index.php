<?php

header('Content-Type: text/html; charset=UTF-8');

    require_once './db/conexao.php';  
    $p = new conexao();

    $pagina_atual = filter_input(INPUT_GET,'pagina',FILTER_SANITIZE_NUMBER_INT);
    $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
    $quantidade_de_pagina = 20;      
    $inicio = ($quantidade_de_pagina * $pagina) - $quantidade_de_pagina;
  //sim

?>

<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lista de Ramais</title>
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
    <link href="./css/styles.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
     <link rel="shortcut icon" href="./img/logo-nardini.png" type="image/x-icon">
  </head>
  <body>

  <?php

    include_once('./pag.html');

  ?>
      
  <div class="container-fluid">
    <h1 class="text mb-2 mt-2">Lista de Ramais</h1>
    <form class="row row-cols-lg-auto g-col-6 align-items-center" method="POST" action="busca.php">
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

    <a class="link_dicas" href="./dicas.php">
        <button class="button">
            <svg class="bell" viewBox="0 0 448 512">
                <path d="M224 0c-17.7 0-32 14.3-32 32V49.9C119.5 61.4 64 124.2 64 200v33.4c0 45.4-15.5 89.5-43.8 124.9L5.3 377c-5.8 7.2-6.9 17.1-2.9 25.4S14.8 416 24 416H424c9.2 0 17.6-5.3 21.6-13.6s2.9-18.2-2.9-25.4l-14.9-18.6C399.5 322.9 384 278.8 384 233.4V200c0-75.8-55.5-138.6-128-150.1V32c0-17.7-14.3-32-32-32zm0 96h8c57.4 0 104 46.6 104 104v33.4c0 47.9 13.9 94.6 39.7 134.6H72.3C98.1 328 112 281.3 112 233.4V200c0-57.4 46.6-104 104-104h8zm64 352H224 160c0 17 6.7 33.3 18.7 45.3s28.3 18.7 45.3 18.7s33.3-6.7 45.3-18.7s18.7-28.3 18.7-45.3z"></path>
            </svg>
            <div class="arrow"></div>
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
                $dados = $p->exibirRamaisIndex();
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
                  ?>
            </tbody>
          </table>
      <?php
        $pg = $p->paginacao();
        $row_pg = ($pg);

        //quantidade de paginas
        $quantidade_pg = ceil($row_pg[0]['num_result'] / $quantidade_de_pagina);

        //limitar resultados antes e depois
        $max_links = 1;
      ?>               

          <nav aria-label="...">
            <ul class="pagination justify-content-center">
              <li class="page-item">
                <a class="btn btn-success-primary" href="<?php echo 'index.php?pagina=1' ?>">Primeira</a>
              </li>

              <?php     
                  for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
                      if($pag_ant >= 1){
                        ?>
                        <li class="page-item">
                          <a class="btn btn-outline-success" href='<?php echo "index.php?pagina=$pag_ant" ?>'><?php echo $pag_ant ?></a>
                        </li>
                        <?php
                      }
                  }
                      ?>

                        <li class="page-item" aria-current="page">
                          <a class="btn btn-success-primary" href='<?php echo "index.php?pagina=$pagina" ?>'><?php echo $pagina ?></a>
                        </li>
                      <?php
                      
                      for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
                        if($pag_dep <= $quantidade_pg){ ?>
                      <li class="page-item">
                        <a class="btn btn-outline-success" href='<?php echo "index.php?pagina=$pag_dep"?>'><?php echo $pag_dep ?></a>
                      </li>

                    <?php

                          }
                      }
              ?>
                
              <li class="page-item">
                <a class="btn btn-success-primary" href='<?php echo "index.php?pagina=$quantidade_pg" ?>'>Ultima</a>
              </li>
            </ul>
          </nav>

     </div> 
                   
             
    <script src="./adm/script.js"></script>
  </body>
</html>

<style>

.text{
  color:#00b553;
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

  /* Botao dicas */
  /* Botao dicas */
  /* Botao dicas */


.button {
  width: 45px;
  height: 40px;
  align-items: center;
  padding: 0px 16px;
  background-color: rgb(66, 66, 66);
  border-radius: 10px;
  border: none;
}

.link_dicas{
  top: -54px;
  left: 650px;
  position: relative;
}

.bell {
  width: 13px;
  text-decoration: none;
}

.bell path {
  fill: rgb(0, 206, 62);
}

.arrow {
  position: absolute;
  right: 0;
  width: 30px;
  height: 100%;
  font-size: 18px;
  align-items: center;
  justify-content: center;
}

.button:hover {
  background-color: rgb(77, 77, 77);
  transition-duration: .2s;
}
</style>