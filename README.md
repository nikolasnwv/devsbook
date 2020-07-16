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

## INCLUSÕES POR NIKOLAS // ANTES DE UPAR NO GIT

Aulas do Bonieky

-Detectando Login (1/2)

-Detectando Login (2/2)

-Página de Login (1/2)

-Página de Login (2/2)

-Página de Cadastro (1/2)

-Página de Cadastro (2/2)


## INCLUSÕES POR NIKOLAS // DEPOIS DE UPAR NO GIT