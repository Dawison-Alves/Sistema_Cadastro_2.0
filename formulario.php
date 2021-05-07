<br>

<h1>
    <a href="?page=login" class="btn btn-success">Voltar</a>
    <?=$pdo->query("SELECT * FROM Usuario WHERE id= {$aux}")->fetchAll()[0]['nome'],'<br>'?>
</h1>
<hr>
<br>

<h3>
    
    Sexo: <?=$pdo->query("SELECT * FROM Usuario WHERE id= {$aux}")->fetchAll()[0]['sexo'],'<br>';?>
    <br>
    País: <?=$pdo->query("SELECT * FROM Usuario WHERE id= {$aux}")->fetchAll()[0]['pais'],'<br>';?>
    <br>
    Estado: <?=$pdo->query("SELECT * FROM Usuario WHERE id= {$aux}")->fetchAll()[0]['estado'],'<br>';?>
    <br>
    Cidade: <?=$pdo->query("SELECT * FROM Usuario WHERE id= {$aux}")->fetchAll()[0]['cidade'],'<br>';?>
    <br>
    Rua: <?=$pdo->query("SELECT * FROM Usuario WHERE id= {$aux}")->fetchAll()[0]['rua'],'<br>';?>
    <hr>
    Descrição:
    <!--Exibe a descrição substistituindo o "/" pelo <br> -->
    <?= '<br>', $a = preg_replace("/\//","<br>",
    $pdo->query("SELECT * FROM Usuario WHERE id= {$aux}")->fetchAll()[0]['descricao']); ?>
</h3>
