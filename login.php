<?php
session_start();

$usuarios = array(
    "1" => "1",
    "usuario2" => "senha2"
);

$limite_tentativas = 3;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];
    $tentativas_login = json_decode(file_get_contents('tentativas_login.json'), true);

    if (isset($tentativas_login[$usuario])) {
        if ($tentativas_login[$usuario] >= $limite_tentativas) {
            header("Location: index.html?erro=limite");
            exit;
        }
    }

    if (isset($usuarios[$usuario]) && $usuarios[$usuario] == $senha) {
        $_SESSION["usuario"] = $usuario;
        header("Location: login_correto.php");
    } else {
        if (!isset($tentativas_login[$usuario])) {
            $tentativas_login[$usuario] = 0;
        }
        $tentativas_login[$usuario]++;
        file_put_contents('tentativas_login.json', json_encode($tentativas_login));
        header("Location: index.html?erro=login");
    }
}
?>