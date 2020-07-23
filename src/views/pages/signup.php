<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Devsbook - Cadastro</title>
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
    <form method="POST" action="<?=$base;?>/register">
            <input placeholder="Digite seu Nome Completo" class="input" type="text" name="name" />

            <input placeholder="Digite seu melhor E-mail" class="input" type="email" name="email" />

            <input placeholder="Digite sua Senha" class="input" type="password" name="password" />

            <div class="input input-date">Sua data de nascimento:</div>

            <input id="birthdate" inputmode="numeric" placeholder="Ex.: 01/03/1993" class="input" type="text" name="birthdate" minlength="10" maxlength="10"/>

            <input class="button" type="submit" value="Finalizar" />

            <?php if(!empty($flash)): ?>
                <div class="flash">
                    <?php echo $flash; ?>
                </div>    
            <?php endif; ?>

            Já tem cadastro? <a href="<?=$base;?>/login">Faça o log-in.</a>
        </form>
    </section>
<script>
    document.getElementById("birthdate").addEventListener("input", function() {
    
        var i = document.getElementById("birthdate").value.length;
        var str = document.getElementById("birthdate").value;
    
        if (isNaN(Number(str.charAt(i-1)))) {
            document.getElementById("birthdate").value = str.substr(0, i-1)
        }
    
    });
    
    document.addEventListener('keydown', function(event) { //pega o evento de precionar uma tecla 
    
        if(event.keyCode != 46 && event.keyCode != 8){ //verifica se a tecla precionada nao e um backspace e delete
            var i = document.getElementById("birthdate").value.length; //aqui pega o tamanho do input
            if (i === 2 || i === 5) document.getElementById("birthdate").value = document.getElementById("birthdate").value + "/";
                //aqui faz a divisoes colocando um ponto no terceiro e sexto indice 
        }
        
    });
</script>
</body>
</html>