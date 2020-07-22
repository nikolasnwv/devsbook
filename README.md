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
## Abaixo Inclusões Realizadas no MVC, das aulas do CURSO DE PHP 7+ do Bonieky

## Inclusões por Níkolas // ANTES DE UPAR NO GIT

13/07/2020
- Detectando Login (1/2)

- Detectando Login (2/2)

- Página de Login (1/2)

- Página de Login (2/2)

15/07/2020
- Página de Cadastro (1/2)

- Página de Cadastro (2/2)

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
