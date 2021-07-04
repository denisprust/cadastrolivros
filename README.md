Passos para instalar o projeto localmente:

- Instalar o composer na máquina (https://getcomposer.org/download/);
- Executar o comando "composer install";
- Criar um banco de dados com o nome da sua escolha;
- Duplicar o arquivo .env.example e remover o ".example" do nome;
- Alterar o nome do database (DB_DATABASE) para o nome do banco que você criou;
- Executar os comandos:
    php artisan migrate;
    php artisan key:generate;
    php artisan serve;
- Copiar a URL exibida no terminal e abrir no navegador.

-------------------

Objetivo: 
Criar uma aplicação web em PHP com acesso restrito, que exiba uma listagem de livros com as opções de ver os detalhes, editar, deletar e criar um livro, e também exiba o clima atual da sua região.

Funcionalidades:

1) Tela de Login
A tela inicial deve ser a de login;
Não deve ser possível acessar outras telas sem realizar o login;

2) CRUD de Livros
Listagem de livros com paginação e filtragem;
Adição e Edição de Livros;
Dados do Livro
Título;
Descrição;
Autor;
Número de Páginas;
Data de Cadastro;
Exclusão de um livro.

3) Clima da região
Integração com API externa para exibir o clima de uma determinada região;
Mostrar apenas o Clima atual.
API https://hgbrasil.com/status/weather. Consultar documentação https://console.hgbrasil.com/documentation/weather.
