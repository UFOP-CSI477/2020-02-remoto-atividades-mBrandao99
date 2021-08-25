
# CSI606 - Sistemas para a WEB I - Prova  
Aluno: Marco Antônio Brandão Carvalho.  
Matrícula: 18.1.8025.

## Recursos utilizados  
- Navegador Firefox e Chrome
- Laravel 8.54
- PHP 7.4 (CLI)
- Composer 2.1.5
- SQLite 3.36

Não foram utilizados módulos do Node, porém as versões na máquina de desenvolvimento são:
- NPM 6.14  
- Node 14.15
  
## Configurações    
O banco de dados vem configurado dentro de ***config/database.php*** na raiz do projeto, apontando para o arquivo ***database/prova.sqlite***.

O arquivo de dados vem vazio, porém as migrations já foram executadas.

Para baixar as dependências, é preciso executar apenas:
> composer install

Em teoria, neste ponto o servidor já está pronto para ser executado.

> Testado em ambiente Windows 10 e Ubuntu 20.04





## Referências
Utilizei alguns recursos de código que foram úteis para melhorar a qualidade do sistema e dos dados gerados, seguem eles:
- Tradução do PHP Faker: https://gist.github.com/guhweb/4fb21386e32322a7d2de9b3a5faf65c7
- Tradução das validações: https://github.com/Laravel-Lang/lang
