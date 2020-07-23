<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Devsbook - Entrar</title>
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1"/>
    <link rel="stylesheet" href="<?=$base;?>/assets/css/login.css" />
</head>
<body>
    <header>
        <div class="container">
            <a href=""><img src="<?=$base;?>/assets/images/devsbook_logo.png" /></a>
        </div>
    </header>
    <section class="container main">
        <form method="POST" action="<?=$base;?>/login">
            <input placeholder="Digite seu e-mail" class="input" type="email" name="email" />

            <input placeholder="Digite sua senha" class="input" type="password" name="password" />

            <?php if(!empty($flash)): ?>
                <div class="flash">
                    <?php echo $flash; ?>
                </div>    
            <?php endif; ?>

            <input class="button" type="submit" value="Acessar" />

            Ainda não tem uma conta?<a href="<?=$base;?>/register"> Cadastre-se.</a>
        </form>
    </section>
</body>
</html>