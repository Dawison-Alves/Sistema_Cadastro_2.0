<br>
<a href="?page=login" class="btn btn-success">Voltar</a>
<br>
<h1>Cadastro</h1>
<hr>
<form class="form" action="#" method="POST">
    <div class="form-group">
        <h4>Informações básicas</h4>
        <label >
            <input type ="text" name = "nome" placeholder = "Nome do usuário:" >
            <input type ="email" name = "email" placeholder = "E-Mail">
            <input type ="password" name = "senha" placeholder = "Senha (Min. 6 caracteres)">
            <label>
                Sexo:
                <input type ="radio" name = "sexo" value = "Feminino"> Feminino
                <input type ="radio" name = "sexo" value = "Masculino"> Masculino
            </label>
        </label>
    </div>
    <hr>

    <h4>Endereço:</h4>
    <div class="form-group">
        País:
        <select name="pais">
            <option value=' '> </option>
            <option value="Argentina">Argentina</option>
            <option value="Brasil">Brasil</option>
            <option value="Colombia">Colombia</option>
            <option value="Dinamarca">Dinamarca</option>
            <option value="EUA">Estados Unidos</option>
        </select>
        Estado:
        <select name="estado">
            <option value=' '> </option>
            <option value="Acre">Acre</option>
            <option value="Amapa">Amapá</option>
            <option value="Bahia">Bahia</option>
            <option value="Ceara">Ceará</option>
            <option value="DF">Distrito Federal</option>
        </select>
    
        Cidade:
        <input type ="text" name = "cidade" value = ' '>
        Rua:
        <input type ="text" name = "rua" value = ' '>
    </div>
    <hr>

    <h5>Quem eu sou:</h5>
    <textarea name="descricao" cols="35" rows="5" > </textarea>
    <br>
    <hr>
    
    <div class="form-group">
        <input type ="checkbox" name = "concordo" value = "Sim">
        Concordo em dividir meus dados.
        <button type="submit" class = "btn btn-success">Cadastrar</button>
    </div>
</form>

<?php
    if($_SERVER['REQUEST_METHOD']== 'POST'){        //Se clicar em cadastrar

        //Verifica se o email digitado já foi cadastrado
        $query = $pdo->prepare("SELECT * FROM Usuario WHERE Email = :email");
        $query ->bindValue(':email',$_POST['email']);
        $query->execute();
        if($query->rowCount()>0){   //Se ouver registros...
            echo 'Email já cadastrado!','<br>';          //Exibir mensagem de erro.
            goto emailCadastrado;                   //Pula o código para o final
        }
        
        //Se os campos concordo, sexo, e email não estiverem vazios...
        //E os campos senha e nome tem caracteres suficientes
        if( !empty($_POST['concordo']) && !empty($_POST['sexo'])
            && !empty($_POST['email']) && strlen($_POST['senha']) >= 6
            && strlen($_POST['nome']) >= 3 ){
           
            // Armazena a variável descrição removendo a quebra de linha e substituindo pelo "/"
            $descricao = preg_replace("/\r?\n/","/", $_POST['descricao']);
            
            //Escrevendo na tabela
            $query = $pdo->prepare("INSERT INTO Usuario(Nome,Email,Senha,Sexo,Pais,Estado,Cidade,Rua,Descricao)
            VALUES(:nome,:email,:senha,:sexo,:pais,:estado,:cidade,:rua,:descricao)");
            $query ->bindValue(':nome',$_POST['nome']);
            $query ->bindValue(':email',$_POST['email']);
            $query ->bindValue(':senha',$_POST['senha']);
            $query ->bindValue(':sexo',$_POST['sexo']);
            $query ->bindValue(':pais',$_POST['pais']);
            $query ->bindValue(':estado',$_POST['estado']);
            $query ->bindValue(':cidade',$_POST['cidade']);
            $query ->bindValue(':rua',$_POST['rua']);
            $query ->bindValue(':descricao',$descricao);
            $query->execute();

            //echo 'Dados cadastrados com sucesso, vá para a tela de login.','<br>';
            echo "<script>location.href='index.php';</script>"; 
        }else{
            emailCadastrado:
            
            //AVISOS DE ERRO
            if(empty($_POST['nome']))
                echo 'Cadastre um nome!','<br>';
            if (strlen($_POST['nome'])<3)
                echo 'Cadastre um nome com no minimo 3 caracteres!','<br>';
            if(empty($_POST['email']))
                echo 'Cadastre um E-Mail!','<br>';
            if(empty($_POST['senha']))
                echo 'Cadastre uma senha!','<br>';
            if (strlen($_POST['senha'])<3)
                echo 'Cadastre uma senha com no minimo 6 caracteres!','<br>';
            if ( empty($_POST['sexo']))
                echo 'Preencha o campo sexo!','<br>';
            if(empty($_POST['concordo']))
                echo 'Aceite os termos para continuar.','<br>';

        }
    } 