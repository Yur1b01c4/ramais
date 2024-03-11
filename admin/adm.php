<?php
if (!isset($_SESSION)) { session_start(); };

if (!isset($_SESSION['login'])){
  $_SESSION['msg-error'] = "Acesso permitido somente com login!";
  header("Location: ./index.php");
  die();
}else{

  include_once('../pag.html');
  require_once '../db/conexao.php';  
  $p = new conexao();

  if(isset($_GET['id_editar']))
{
    
  $id_editar = addslashes($_GET['id_editar']);
  $res = $p->buscarDadoscontatos($id_editar);
}

?>

<!-- aba da navegação -->
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar contato</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <link rel="shortcut icon" href="../img/logo-nardini.png" type="image/x-icon">
  </head>
  <body>

  <?php

    //cadastro
    if(isset($_POST['email']))
    {

        if(isset($_GET['id_editar']) && !empty($_GET['id_editar']))
        {
            $id_edit = addslashes($_GET['id_editar']);
            $nome = addslashes($_POST['nome']);
            $ramal = addslashes($_POST['ramal']);
            $email = addslashes($_POST['email']);
            $area = addslashes($_POST['area']);
            $unidade = addslashes($_POST['unidade']);
            if (!empty($nome) && !empty($ramal) && !empty($email) && !empty($area) && !empty($unidade))
            {
                $p->atualizarContatos($id_edit, $nome, $ramal, $email, $area, $unidade);
                $_SESSION['msg-success'] = "Dados atualizados com sucesso!";
                header("location: dashboard.php");
            }else{
                $_SESSION['msg-error'] = "Um ou mais campos não foram preenchidos!";
                header("Location: dashboard.php");
                die();
            }
        }
    }
    ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-auto">
            <h1 class="text mb-3 mt-3">Editar Usuario</h1>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-lg-6">
        <form method="POST">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome completo</label>
                <input type="text" name="nome" class="form-control" placeholder="Nome completo" value="<?php if(isset($res)){echo $res['nome'];}?>">
            </div>
            <div class="mb-3">
                <label for="ramal" class="form-label">Ramal</label>
                <input type="number" name="ramal" class="form-control" placeholder="Ramal" value="<?php if(isset($res)){echo $res['ramal'];}?>">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" name="email" class="form-control" placeholder="Email" value="<?php if(isset($res)){echo $res['email'];}?>">
            </div>
            <div class="mb-3">
                <label for="area" class="form-label">Área</label>
                <input type="text" name="area" class="form-control" placeholder="Área" value="<?php if(isset($res)){echo $res['area'];}?>">
            </div>  
            <div class="mb-3">Unidade
            <select name="unidade" class="form-select" aria-label="Default select example" value="<?php if(isset($res)){echo $res['unidade'];}?>">
                <option <?php echo $res['unidade'] == 'Vista Alegre' ? 'selected' : ''?> >Vista Alegre</option>
                <option <?php echo $res['unidade'] == 'Aporé' ? 'selected' : ''?>>Aporé</option>
            </select>
            <div class="mb-3 mt-3">
                <input type="submit" name="atualizar"  id="atualizar" class="btn btn-success-primary" value="<?php if(isset($res)){echo "atualizar";}else{echo "cadastrar";}?>">
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

</div>
</body>
</html>

<script src="./msg.js"></script>

<?php
}
?>

<style>
/* h1 */
/* h1 */
/* h1 */


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