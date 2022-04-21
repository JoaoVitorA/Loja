<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS_JS/registro.css">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
    <title>Encantos & Balões - Login</title>
    <link rel="stylesheet" href="css/registro.css">
</head>
<body>
    <div class="main-login">
        <div class="left-login">
            <img src="img/fundo1.png" class="img" alt="fundo">
        </div>
        <div class="rigth-login">
            <div class="card-login">
                <form action="" method="post">
                    <div class="textfield">
                        <label for="usuario"> E-mail</label>
                        <input type="email" name="email" placeholder="E-mail" required>
                    </div>

                    <div class="textfield">
                        <label for="senha"> Senha</label>
                        <input type="password" name="senha" placeholder="Senha" required>
                    </div>   
                    
                    <br>
              
                    <button type="submit" class="btn-login"> Login </button> <br> <br>
                
                    <div>
                        <p id="txt">
                            Não tem uma conta? 
                            <a href="cadastrar.php" id="link">Cadastre-se  ,</a> <a  href="index.php" id="link">Voltar</a>
                        </p>
                    </div>
            
                </form>
                
                <br>
            </div>
        </div>
    </div>
</body>
</html>