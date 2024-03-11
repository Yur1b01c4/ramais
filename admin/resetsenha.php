<?php
session_start();
ob_start();
include_once '../db/conexao.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../lib/vendor/autoload.php';
$mail = new PHPMailer(true);

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>RECUPERAR A SENHA</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="shortcut icon" href="../img/logo-nardini.png" type="image/x-icon">
</head>

<body>

<a class="sair" href="sair.php"><button class="Btn">
  <div class="sign"><svg viewBox="0 0 512 512"><path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"></path></svg></div> 
  <div class="text">Voltar</div>
</button></a>

    <div class="container">
            <h1>ENDEREÇO DE EMAIL</h1>

            <?php
            $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);


            if (!empty($dados['SendRecupSenha'])) {
                //var_dump($dados);
                $query_usuario = "SELECT * 
                            FROM usuarios 
                            WHERE email = :email  
                            LIMIT 1";
                $result_usuario = $conn->prepare($query_usuario);
                $result_usuario->bindParam(':email', $dados['usuario']);
                $result_usuario->execute();

                if (($result_usuario) and ($result_usuario->rowCount() != 0)) {
                    $row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC);
                    $chave_recuperar_senha = password_hash($row_usuario['id'], PASSWORD_DEFAULT);
                    //echo "Chave $chave_recuperar_senha <br>";

                    $query_up_usuario = "UPDATE usuarios 
                                SET recuperar_senha = :recuperar_senha 
                                WHERE id =:id 
                                LIMIT 1";
                    $result_up_usuario = $conn->prepare($query_up_usuario);
                    $result_up_usuario->bindParam(':recuperar_senha', $chave_recuperar_senha, PDO::PARAM_STR);
                    $result_up_usuario->bindParam(':id', $row_usuario['id'], PDO::PARAM_INT);
                    $result_up_usuario->execute();

                    

                    if ($result_up_usuario) {
                        $link = "http://acerta.nardini.ind.br/ramais/admin/atualizar_senha.php?chave=$chave_recuperar_senha";

                        try {
                            /*$mail->SMTPDebug = SMTP::DEBUG_SERVER;*/
                            $mail->CharSet = 'UTF-8';
                            $mail->isSMTP();
                            $mail->Host       = 'zcs.nardini.ind.br';  
                            $mail->SMTPAuth   = true;
                            $mail->Username   = 'knime@nardini.ind.br';
                            $mail->Password   = 'Knime987*546';
                            $mail->SMTPSecure = 'tls';// Enable TLS encryption, `ssl` also accepted;
                            $mail->Port       = 587;

                            $mail->setFrom($mail->Username, 'Recuperar senha');
                            $mail->addAddress($row_usuario['email'], $row_usuario['nome']);

                            $mail->isHTML(true);                                  //Set email format to HTML
                            $mail->Subject = 'Recuperar senha';
                            $mail->Body    = 'Prezado(a) ' . $row_usuario['nome'] .".<br><br>Você solicitou alteração de senha.<br><br>Para continuar o processo de recuperação de sua senha, clique no link abaixo ou cole o endereço no seu navegador: <br><br><a href='" . $link . "'>" . $link . "</a><br><br>Se você não solicitou essa alteração, nenhuma ação é necessária. Sua senha permanecerá a mesma até que você ative este código.<br><br>";
                            $mail->AltBody = 'Prezado(a) ' . $row_usuario['nome'] ."\n\nVocê solicitou alteração de senha.\n\nPara continuar o processo de recuperação de sua senha, clique no link abaixo ou cole o endereço no seu navegador: \n\n" . $link . "\n\nSe você não solicitou essa alteração, nenhuma ação é necessária. Sua senha permanecerá a mesma até que você ative este código.\n\n";

                            $mail->send();

                            $_SESSION['msg-success'] = "<p style='color: green'>Enviado e-mail com instruções para recuperar a senha. Acesse a sua caixa de e-mail para recuperar a senha!</p>";
                            header("Location: index.php");
                        } catch (Exception $e) {
                            echo "Erro: E-mail não enviado sucesso. Mailer Error: {$mail->ErrorInfo}";
                        }
                    } else {
                        echo  "<p style='color: #ff0000'>Erro: Tente novamente!</p>";
                    }
                } else {
                    echo "<p style='color: #ff0000'>Erro: Usuário não encontrado!</p>";
                }
            }

            

            ?>

        <?php
                $usuario = "";
                if (isset($dados['usuario'])) {
                    $usuario = $dados['usuario'];
                    } ?>
            <form class="row row-cols-lg-auto g-col-6 align-items-center" method="POST" action="">
                <div class="row col-lg-6 mb-3 mt-3">
                    <div class="mb-2 mt-3">
                        <label class="form-label">Email</label>
                        <input class="form-control" type="text" name="usuario" placeholder="Digite o email de cadastro" value="<?php echo $usuario; ?>">
                    </div>
                </div>
                <div style="position: relative; margin-top: 2.5rem;">
                    <input class="btn btn-success-primary" type="submit" value="Enviar email" name="SendRecupSenha">
                </div>
            </form>
    </div>

</body>

</html>