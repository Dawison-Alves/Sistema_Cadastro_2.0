<?php
   include_once 'banco.php';
   
    class Usuario{
       
        #Informações de login
        public string $email;
        public string $senha;

        public function logar(){
            global $pdo;

            $this->email = $_POST['email'];
            $this->senha = $_POST['senha'];
                             
            if( empty($this->email) || empty($this->senha)){
                echo 'Prencha os campos corretamente.<br>';
            }else{
                try {
                    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);   //Caso acontece ele gera os erros.
                                            
                    #Verifica se os dados digitados existem.
                    $query = $pdo->prepare("SELECT * FROM Usuario WHERE Email = :email AND Senha = :senha");
                    $query ->bindValue(':email',$this->email);
                    $query ->bindValue(':senha',$this->senha);
                    $query->execute();
                    if($query->rowCount()>0){   //Se ouver registros...
                 
                        //Recupera ID
                        $aux = $query->fetchAll()[0]['ID'];
                        include_once 'formulario.php';
                                   
                    }else{
                        echo 'Email ou senha inválidos';
                    }
                    
                } catch (\Throwable | PDOException $e) {
                    echo 'Erro de código: '.$e->getCode().'<br>';      //Retorna o código do erro
                    echo $e->getMessage();          //Retorna a mensagem de erro.
                }
            }           
        }
        public function cadastrar(){
        }
    }

     
    
    
    