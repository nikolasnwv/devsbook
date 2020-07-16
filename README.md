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

AULAS DO BONIEKY

-DETECTANDO LOGIN (1/2)
-DETECTANDO LOGIN (2/2)

-PÁGINA DE LOGIN (1/2)
-PÁGINA DE LOGIN (2/2)

-PÁGINA DE CADASTRO (1/2)
-PÁGINA DE CADASTRO(2/2)


## INCLUSÕES POR NIKOLAS // DEPOIS DE UPAR NO GIT