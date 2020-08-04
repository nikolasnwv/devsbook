## Instalação
Você pode clonar este repositório OU baixar o .zip

Ao descompactar, é necessário rodar o **composer** pra instalar as dependências e gerar o *autoload*.

Vá até a pasta do projeto, pelo *prompt/terminal* e execute:
> composer install

Depois é só aguardar.

## Configuração
Todos os arquivos de **configuração** e aplicação estão dentro da pasta *src*.

As configurações de Banco de Dados e URL estão no arquivo *src/Config.php*

É importante configurar corretamente a constante *BASE_DIR*:
> const BASE_DIR = '/**PastaDoProjeto**/public';

## Uso
Você deve acessar a pasta *public* do projeto.

O ideal é criar um ***alias*** específico no servidor que direcione diretamente para a pasta *public*.

## Modelo de MODEL
```php
<?php
namespace src\models;
use \core\Model;

class Usuario extends Model {

}
```
## Abaixo Inclusões Realizadas na estrutura MVC, àpartir das aulas do CURSO DE PHP 7+ do Bonieky

## Inclusões por Níkolas // ANTES DE UPAR NO GIT

13/07/2020
- Detectando Login (1/2)

- Detectando Login (2/2)

- Página de Login (1/2)

- Página de Login (2/2)

15/07/2020
- Página de Cadastro (1/2)

- Página de Cadastro (2/2)
    - Ao invés de criar um iMask, eu fiz no JAVASCRIPT puro a máscara da data...
    ```javascript
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
    ```

    Eu também fiz um teste na hospedagem e vi que o cadastro de nomes Brasileiros com acentos e pontuações, correm riscos de ir para o banco de dados em formatos bugados com essas letras e acentuações

    ```PHP

        //alterei deste
    
        $name = filter_input(INPUT_POST, 'name');

        // para este

        $name = trim(strip_tags(filter_input(INPUT_POST, 'name')));
        

    ```
    
## Inclusões por Níkolas // DEPOIS DE UPAR NO GIT

16/07/2020
- Página Home (1/2)

18/07/2020
- Página Home (2/2)

- Corrigindo dois Bugs: 
    - ir até o final do vanilla.js e remover linha // var modal = new VanillaModal();

    - é a última linha do arquivo... (o outro BUG era no MVC), como eu baixei a estrutura atualizada, não precisei mexer.

- Separar FEED Item e FEED Editor.

- Feed Editor (1/2)
    - Teve um comentario de OUTRO ALUNO que arrumou o erro de sessão em outro navegador e/ou janela anonima (count 0 foi pra 1)

- Feed Editor (2/2)
    - Eu alterei algumas variaveis e nome de arquivo pra uma forma mais didática(pelo menos pra mim).
    
    - Isso não foi nada demais, uma rápida lida no código você ve que não foi quase nada...

20/07/2020
- Feed (parte 1)

- Feed (parte 2)

- Feed (parte 3)

- Feed (parte 4)

22/07/2020
- Perfil (parte 1) - Rota

- Perfil (parte 2) - Menu

- Perfil (parte 3) - Conteúdo Base

- Perfil (parte 4) - Contéudo Específico

- Perfil (parte 5) - Contéudo Específico

- Perfil (parte 6) - Feed

- Perfil (parte 7) - Feed

- Sair

- Perfil (parte 8) - Follow

- Perfil (parte 9) - Follow

25/07/2020
- Amigos (1/2)

- Amigos (2/2)

- Fotos

    - Resolvido erro no ajax, com comentario de um aluno, era só adicionar alguns ifs no script.js e no feed-editor-text-send.js

- Partial do perfil

- Busca

- Configurações

    - Criada as configurações para edições de dados do usuário  
        - Adicionada routes
        - Alterado link na SideBar
        - Criado o SettingsController
        - Criada a página settings
        - Modificado o user handler, na parte do checklogin, para pegar mais dados do user, e adicionado o update user nas varias partes da pagina settings para as infos irem corretas
