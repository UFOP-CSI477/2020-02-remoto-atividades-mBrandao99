# **CSI606-2020-02 - Remoto - Trabalho Final - Resultados**
## *Aluna(o): Marco Antônio Brandão Carvalho*

--------------

<!-- Este documento tem como objetivo apresentar o projeto desenvolvido, considerando o que foi definido na proposta e o produto final. -->

### Resumo

    Meu trabalho se encaixa no contexto de sistemas de passagens áreas, a principal funcionalidade seria a compra/reserva de passagens. Foi dado ao projeto o nome de Aero.
    Na tela principal, o usuário pode buscar por passagens para localidades de seu interesse, cada passagem leva o usuário à página de detalhes para que possa ser possível analisar os preços e fazer a compra. Os usuários com permissão mais elevada podem acessar os CRUDS das tabelas base, alterando os dados do sistema. O usuário pode cancelar suas passagens dentro do perfil.

### 1. Funcionalidades implementadas
    Busca de voos
    Registro e autenticação de usuário
    CRUD das tabelas de empresa, aeroporto e voo
    Compra e cancelamento de passagem
  
### 2. Funcionalidades previstas e não implementadas
    Remarcação de voos.
    Filtros de intervalos, foi considerado datas fixas para filtragem da página principal. Durante o desenvolvimento notei que não fazia muito sentido a filtragem por horas, deixei o campo com a lógica similar a data.

### 3. Outras funcionalidades implementadas
    Relatório de passagens por voos.
    Eu queria ter conseguido tempo para fazer um sistema de comentários e avaliações para voos das empresas, a migration está presente no projeto porém não foi implementado.

### 4. Principais desafios e dificuldades
    O CRUD da tabela principal de voos foi complexo de ser feito. Necessitou de recursos novos como o datetime picker, além da validação de todos os campos.
    A interface acabou sendo uma dificuldade, não tenho muita prática com front-end e não tive muito tempo para me dedicar ao trabalho, acabei deixando ela bem simples, a organização dos elementos na tela provavelmente pode ser otimizada.
    Alguns pontos não foram ajustados devido ao tempo, como um campo de pesquisa para estados e cidades ao invés de dropdowns, 
    formatação correta dos campos de dinheiro dentro dos CRUDs, 

### 5. Instruções para instalação e execução
<!-- Descrever o que deve ser feito para instalar (ou baixar) a aplicação, o que precisa ser configurando (parâmetros, banco de dados e afins) e como executá-la. -->
    Feito com Laravel Framework 8.54.0 e PHP 7.4.19. Banco de dados SQLite.
    Node 14.15.5 e Composer 2.1.5.

    Para puxar as bibliotecas e dependências necessárias, execute os comandos no terminal na raiz do projeto:
        npm install
        composer install        
        php artisan sweetalert:publish
    Pode ser necessário habilitar extensões do PHP, como pdo_sqlite e intl. Verifique as dependências indicadas.
    Após instalar todas as biliotecas, execute "npm run dev" para compilar os arquivos para seu sistema.
    
    Como não fiz a criação de métodos fábrica para popular as tabelas, vou estar linkando aqui o download da .env e do banco de dados para acesso imediato caso seja de interesse:
    https://mega.nz/file/70UhCA5R#M-RVxH5bebtsrFaqLLZuewBd4PmGhPMqw0jgj_D0BHc
    Adicione os arquivos na raiz do projeto, abra o arquivo .env e ajuste o caminho até o banco
    Administrador: marco@email.com 123

    Em caso de configuração do zero, crie um banco .sqlite vazio e configure/adicione os parametros do banco no .env:
        DB_CONNECTION=sqlite
        DB_DATABASE= "caminho para o banco .sqlite"
        DB_FOREIGN_KEYS=true
    Os demais parametros de DB_ podem ser excluídos ou comentados.
    Ao fim do arquivo, também adicione este:
        SWEET_ALERT_ALWAYS_LOAD_JS=true

    Execute:
        php artisan key:generate
        php artisan migrate

    Para dar acesso às funcionalidades administrativas a outros usuários, não existe uma solução direta nas páginas.
    Faço o registro de um usuário e execute a seguinte SQL no banco:
        update users
        set isAdmin = True
        where email = "EMAIL";
    Onde EMAIL corresponde ao email de um usuário registrado anteriormente.

    Por fim, execute "php artisan serve" na raiz do projeto para inicializar o servidor.
### 6. Referências
Os dados de estados e cidades foram retirados da API do IBGE, fiz a formatação e ajuste para se encaixar na minha aplicação.

*Utilizei uma imagem genérica do google para fazer a logo do sistema, encontrei ela atrás de licenças em alguns sites mas livre em outros, então preferi não referenciar.*


