<!DOCTYPE html>
<html lang="en">

<head>
<link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="login_correto.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>
    <section class="caixa-texto">
        <?php
        session_start();
        if (isset($_SESSION["usuario"])) {
            $usuario = $_SESSION["usuario"];
            echo "Parabéns, $usuario, você foi conectado com sucesso!";
        } else {
            echo "<h1>Você não está logado.</h1>";
        }
        ?>
    </section>

</body>


</html>
