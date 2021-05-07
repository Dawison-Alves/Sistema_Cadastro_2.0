<?php
    include_once 'usuario.php';
    $usuario = new Usuario;
    static $aux;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Sistema Cadastro</title>
</head>
    <body>
        <div class="container">
            <?php
                if (isset($_GET['page'])) {
                    if (file_exists("{$_GET['page']}.php")) {
                        include_once "{$_GET['page']}.php";
                    }else
                        include_once 'error404.php';    
                }else 
                    include_once 'login.php';
            ?>
        </div>
    </body>
</html>