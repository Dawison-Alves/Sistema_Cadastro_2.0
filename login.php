
<?php
    if($_SERVER['REQUEST_METHOD']== 'POST'){        //Se clicar em Logar
        $usuario->logar();
    }else{
?>
<br>
<hr>
<h1>Login</h1>
<br>
<form class="form" action="#" method="POST">
    <div class="form-group">
        <input type ="email" name = "email" placeholder = "E-Mail">
    </div>
    <br>
    <div class="form-group">
        <input type ="password" name = "senha" placeholder = "Senha:">
    </div>
    <br>

    <label>
        <button type="submit" href="?page=cadastro" class = "btn btn-success">Logar</button>
        <a href="?page=cadastro" class="btn btn-success">Me cadastrar</a>
    </label>
</form>

<hr>
<?php
}
?>



