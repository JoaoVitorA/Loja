<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS_JS/registro.css">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
    <title>Encanto $ Balões - Cadastro</title>
    <link rel="stylesheet" href="css/registro.css">
</head>
<body>
    <div class="main-login">
        <div class="left-login">
            <h1><br> Crie uma conta !!</h1>
            <img src="img/tela_cadastro.png" class="img" alt="fundo">
        </div>
        <div class="rigth-login">
            <div class="card-login">
                <form action="receber.php" method="post">
                <div class="textfield">
                        <label for="usuario"> Crie seu Nickname</label>
                        <input type="text" name="name" placeholder="Nome" required>
                    </div>
                    <div class="textfield">
                        <label for="usuario"> Insira seu Email</label>
                        <input type="email" name="email" placeholder="Usuário" required>
                    </div>
                    <div class="textfield">
                        <label for="senha"> Insira sua Senha</label>
                        <input type="password" name="senha" placeholder="Senha" required>
                    </div>   
                    <br>
                    <button type="submit" class="btn-login"> CRIAR </button> 
                    <br> <br>  
                    <div>
                    <p id="txt">
                       Ja tem uma conta? 
                        <a href="login.php" id="link">Voltar a tela de login</a>
                    </p>
                </div>
                </form> 
                <br>
            </div>
        </div>
    </div>
</body>
</html>