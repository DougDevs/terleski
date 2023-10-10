<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];

    // Valide o email aqui, se necessário
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Email inválido, você pode exibir uma mensagem de erro ou redirecionar de volta ao formulário
        echo "Endereço de email inválido.";
        exit;
    }

    // Envie o email
    $to = "terleskddouglas@gmail.com";
    $subject = "Nova inscrição";
    $message = "Você recebeu uma nova inscrição com o seguinte email: " . $email;
    $headers = "From: terleskddouglas@gmail.com\r\n";
    $headers .= "Reply-To: terleskddouglas@gmail.com\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    if (mail($to, $subject, $message, $headers)) {
        // Email enviado com sucesso, você pode redirecionar de volta à página de origem
        header("Location: index.html");
    } else {
        // Tratamento de erro caso o email não seja enviado
        echo "O email não pôde ser enviado.";
    }
}
?>
