<?=$render('header', ['loggedUser'=>$loggedUser]);?>
    
    <section class="container main">
        
        <?=$render('sidebar', ['activeMenu'=>'settings']);?>

        <section class="feed mt-10">

            <h1>Configurações</h1>

            <form action="<?=$base;?>/settings" method="POST" class="form-config">

                <?php if(!empty($flash)):?>
                    <div class='flash'> <?php echo $flash;?></div>
                <?php endif;?> 
                
                <div class="form-config-file">
                    <label>Nova foto do perfil:</label><br/>
                    <input type="file" placeholder="Escolher arquivo" name="avatarFile"/><br/><br/>

                    <label>Nova foto da capa:</label><br>
                    <input type="file" placeholder="Escolher arquivo" name="coverFile"/>
                </div>
                <hr/>
                <div class="form-config-data">
                    <label>Nome Completo</label>
                    <br/>
                    <input type="text" name="name" id="name" placeholder="<?=$loggedUser->name;?>" />
                    <br/>
                    <label>Data de nascimento:</label>
                    <br/>
                    <input id="birthdate" type="text" name="birthdate" placeholder="<?=date('d/m/Y', strtotime($loggedUser->birthdate));?>" class="input" inputmode="numeric" minlength="10" maxlength="10"/>
                    <br/>
                    <label>E-mail</label>
                    <br/>
                    <input type="email" name="email" id="email" placeholder="<?=$loggedUser->email;?>"/>
                    <br/>
                    <label>Cidade:</label>
                    <br/>
                    <input type="text" name="city" id="city" placeholder="<?=$loggedUser->city;?>"/>
                    <br/>
                    <label>Trabalho:</label>
                    <br/>
                    <input type="text" name="work" id="work" placeholder="<?=$loggedUser->work;?>"/>
                    <br/>
                    <hr/>
                    <br/>
                    <label>Nova Senha:</label>
                    <br/>                    
                    <input type="password" name="password" id="password"/>
                    <br/>
                    <label>Confirmar Nova Senha:</label>
                    <br/>
                    <input type="password" name="password1" id="password1"/>
                    <br/>
                    <input type="submit" class="button form-confir-input-submit" value="Salvar"/>
                </div>

            </form>

        </section>

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

 <?=$render('footer');?>