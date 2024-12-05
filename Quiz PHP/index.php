<?php
include "user.php";
session_start();

//Caso o usuário não esteja logado é direcionado para a página de login
if (!isset($_SESSION["login_status"])) {
    header("Location: login.php");
    exit;
}

/* -------- SEÇÕES -------- */
$user = $_SESSION["usuario"]; 
$todos_users = $_SESSION["users_data"];

/* -------- LOGOUT -------- */
if (isset($_POST["logout"])) {
    
    foreach ($todos_users as $key => $value) {
        if ($value == $user) {
            unset($todos_users[$key]); //destroí a variavel
            break;
        }
    }

    $sessao = date("d/m/Y H:i");
    $todos_users[] = $user;
    file_put_contents("./database/users.json", json_encode($todos_users));

    setcookie("lastSession", $sessao);

    session_unset();
    session_destroy();

    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show do Bilhão</title>
</head>
<body>
    <div>
        <h1>Tão vão então!</h1>
        <form action="game.php" method="post">
            <input type="hidden" name="id" value="0">
            <input type="submit" value="Start">
        </form>
    </div>
    <div>
        <h1>Bem-vindo, <?= $user["nome"]; ?>!</h1>
        <p>Email: <?= $user["email"]; ?></p>
        <p>Última sessão em: <?= $_COOKIE["lastSession"] ?></p>
        <p>Última acertos: <?php if(isset($_COOKIE["acertos"])){echo $_COOKIE["acertos"]; } else{echo 0;} ?></p>

    </div>
    <form method="post" action="index.php">
        <input type="submit" name="logout" value="Logout">
    </form>
</body>
</html>
</body>
</html>
