<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>LOGIN</title>

<link href="../css/bootstrap.min.css" rel="stylesheet">
<link rel="shortcut icon" href="../img/logo-nardini.png" type="image/x-icon">   
<meta name="theme-color" content="#712cf9">


    <style>

      .Nardini{
        height: 250px;
        width: 250px;
        position: relative;
        top: 80px;
      }

      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>

    
    <!-- Custom styles for this template -->



    <link href="../css/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    
<main class="form-signin w-100 m-auto">
  <form method="POST" action="ver_login.php">
    <img class="Nardini" src="../img/Logo_Nardini.png" alt="" width="120" height="120">
    <h1 class="h3 mb-3 fw-normal">Realize o Login</h1>

    <div class="form-floating">
      <input name="login" type="text" class="form-control" id="floatingInput" placeholder="digite seu login...">
      <label for="floatingInput">Usuário</label>
    </div>
    <div class="form-floating">
      <input name="senha" type="password" class="form-control" id="floatingPassword" placeholder="digite sua senha...">
      <label for="floatingPassword">Senha</label>
    </div>

    <!-- <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div> -->

    <div class="checkbox mb-3">
      <p><a href="resetsenha.php">Esqueci minha senha!</a></p>
    </div>


    <button class="w-100 btn btn-lg btn-primary mb-2" type="submit">Entrar
      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z"/>
        <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
      </svg>
    </button>
  
    <!-- <p class="mt-5 mb-3 text-muted">&copy; 2017–2022</p> -->
  </form>

  <?php
  if (!isset($_SESSION)) { session_start(); };

  if (!isset($_SESSION)) { session_start(); };
          if(isset($_SESSION['msg-error'])){
              echo '<div class="alert alert-danger" role="alert">';
              echo    $_SESSION['msg-error'];
              echo '</div>';
              unset($_SESSION["msg-error"]);
        }
        

  if(isset($_SESSION['msg-success'])){
    echo '<div class="alert alert-success" role="alert">';
    echo    $_SESSION['msg-success'];
    echo '</div>';
    unset($_SESSION["msg-success"]);
  }
   
  ?>

</main>


    
  </body>
</html>
