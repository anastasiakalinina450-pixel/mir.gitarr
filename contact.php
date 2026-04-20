<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $message = htmlspecialchars($_POST["message"]);

    echo "<!DOCTYPE html>
    <html lang='ru'>
    <head>
        <meta charset='UTF-8'>
        <title>Сообщение отправлено</title>
        <link rel='stylesheet' href='styleee.css'>
    </head>
    <body>

        <div class='result-box'>
            <h2>Сообщение отправлено!</h2>
            <p><strong>Имя:</strong> $name</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Сообщение:</strong> $message</p>

            <a href='contact.html'>Вернуться назад</a>
        </div>

    </body>
    </html>";
}
?>