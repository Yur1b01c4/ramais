<?php
    session_start();
    ob_start();

require_once '../db/conexao.php';  
  //sim


?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="shortcut icon" href="../img/logo-nardini.png" type="image/x-icon">
    <title>Recuperação de Senha</title>
</head>
<body class="container">
   <h1>Recuperação de Senha</h1>

<?php
    $chave = filter_input(INPUT_GET, 'chave', FILTER_DEFAULT);

    if (!empty($chave)) {
        //var_dump($chave);

        
        $query_usuario = "SELECT * FROM usuarios WHERE recuperar_senha = :recuperar_senha LIMIT 1";
        $result_usuario = $conn->prepare($query_usuario);  
        $result_usuario->bindParam(':recuperar_senha', $chave, PDO::PARAM_STR);
        $result_usuario->execute();

        if(($result_usuario) AND ($result_usuario->rowCount() != 0)){
            $row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC);
            $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            //var_dump($dados);
            //die();

            if (!empty($dados['SendNovaSenha'])) {
                $senha_usuario = password_hash($dados['senha'], PASSWORD_DEFAULT);
                $recuperar_senha = 'NULL';

                $query_up_usuario = "UPDATE usuarios SET senha = :senha, recuperar_senha = :recuperar_senha 
                WHERE id = :id LIMIT 1";
                $result_up_usuario = $conn->prepare($query_up_usuario);
                $result_up_usuario->bindParam(':senha', $senha_usuario, PDO::PARAM_STR);
                $result_up_usuario->bindParam(':recuperar_senha',$recuperar_senha);
                $result_up_usuario->bindParam(':id', $row_usuario['id'], PDO::PARAM_INT);

                if($result_up_usuario->execute()){
                    echo "Senha atualizada com sucesso!";
                    header("Location: index.php");
                } else {
                    echo "Tente novamente!";
                }
            }
        } else {
            echo "Link inválido, solicite novo link para atualizar a senha!";
            header("Location: resetsenha.php");
        }
    } else {
        echo "Link inválido, solicite novo link para atualizar a senha!";
        header("Location: resetsenha.php");
    }

?> 



<form class="row row-cols-lg-auto g-3 align-items-center" method="POST" action="">
    <div class="row col-lg-6 mb-3 mt-1">
        <div class="mb-3 mt-3">
            <label class="form-label">Digite uma nova senha</label>
            <input type="password" name="senha" class="form-control" placeholder="Digite uma nova senha" required value="<?php echo $usuario; ?>">
            <div class="mb-3 mt-3">
                <input  class="btn btn-success-primary" type="submit" value="Atualizar" name="SendNovaSenha">
            </div> 
        </div>
    </div>
</form>

</body>
</html>