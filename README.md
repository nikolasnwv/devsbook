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

## Aulas do Bonieky

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