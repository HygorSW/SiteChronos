<?php
// Inclua o autoload.php gerado pelo Composer
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Obtém os dados do formulário
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $tipo_contato = $_POST['tipo_contato'];
    $message = $_POST['message'];

    // Valida se todos os campos foram preenchidos
    if (!empty($first_name) && !empty($last_name) && !empty($email) && !empty($tipo_contato) && !empty($message)) {

        // Cria uma nova instância do PHPMailer
        $mail = new PHPMailer(true);

        try {
            // Configurações do servidor SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';  // Servidor SMTP do Gmail
            $mail->SMTPAuth = true;
            $mail->Username = 'arthur11tutuca@gmail.com';  // Seu endereço de e-mail do Gmail
            $mail->Password = 'qkim zcds olla clfv';  // Sua senha do Gmail (ou senha de app)
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;  // Habilita criptografia TLS
            $mail->Port = 587;  // Porta de envio do Gmail

            // Configurações do e-mail
            $mail->setFrom($email, "$first_name $last_name");
            $mail->addAddress('turmadochronos@gmail.com');  // Adicione o destinatário

            // Conteúdo do e-mail
            $mail->isHTML(true);  // Definir o formato do e-mail como HTML
            $mail->Subject = "Novo contato: $tipo_contato";
            $mail->Body    = "Nome: $first_name $last_name<br>Email: $email<br>Tipo de Contato: $tipo_contato<br><br>Mensagem:<br>$message";

            // Envia o e-mail
            if($mail->send()) {
                header("Location: index.html"); // ou 'home.php', dependendo da sua estrutura de arquivos
                exit;
            } else {
                echo "Ocorreu um erro ao enviar a mensagem.";
            }
        } catch (Exception $e) {
            echo "Ocorreu um erro ao enviar a mensagem: {$mail->ErrorInfo}";
        }
    } else {
        echo "Por favor, preencha todos os campos.";
    }


 
}
?>
