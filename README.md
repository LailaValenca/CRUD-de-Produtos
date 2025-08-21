CRUD de Produtos em Laravel
Bem-vindo ao projeto CRUD de Produtos! Esta é uma aplicação simples construída com o framework Laravel, ideal para demonstrar as operações básicas de um CRUD (Create, Read, Update, Delete) de forma prática e organizada.

✨ Funcionalidades
✅ Criar novos produtos (com nome, preço e descrição).

✅ Listar todos os produtos cadastrados em uma tabela.

✅ Editar as informações de um produto existente.

✅ Excluir um produto do banco de dados.

✅ Validação de campos para garantir a integridade dos dados.

✅ Interface simples e responsiva utilizando Tailwind CSS.

📋 Pré-requisitos
Antes de começar, certifique-se de que você tem as seguintes ferramentas instaladas em sua máquina:

PHP (versão >= 8.1)

Composer

🚀 Instalação e Configuração
Siga os passos abaixo para ter o projeto rodando em seu ambiente local.

1. Clone o Repositório

# Clone este repositório (substitua pela URL do seu repositório Git, se tiver uma)
git clone https://github.com/seu-usuario/crud-produtos.git

# Navegue para a pasta do projeto
cd crud-produtos

2. Instale as Dependências do PHP

O Composer irá baixar e instalar todas as bibliotecas necessárias para o projeto, incluindo o próprio Laravel.

composer install

3. Crie o Arquivo de Ambiente (.env)

Copie o arquivo de exemplo .env.example para criar seu próprio arquivo de configuração local.

# No Windows (CMD ou PowerShell)
copy .env.example .env

# No Linux ou macOS
cp .env.example .env

4. Gere a Chave da Aplicação

Esta chave é essencial para a segurança da sua aplicação (criptografia, sessões, etc.).

php artisan key:generate

5. Configure o Banco de Dados (SQLite)

Este projeto foi configurado para usar o SQLite para simplificar a instalação.

Crie o arquivo do banco de dados:
Na pasta database/, crie um arquivo vazio chamado database.sqlite.

# No PowerShell
New-Item -Path "database/database.sqlite" -ItemType File

# No Linux/macOS ou Git Bash no Windows
touch database/database.sqlite

Edite o arquivo .env:
Abra o arquivo .env e configure as variáveis de banco de dados para usar o SQLite com o caminho absoluto para o arquivo que você acabou de criar. Lembre-se de usar aspas se o caminho contiver espaços e usar barras normais (/) para compatibilidade.

DB_CONNECTION=sqlite
DB_DATABASE="C:/caminho/completo/para/seu/projeto/crud-produtos/database/database.sqlite"

Substitua C:/caminho/completo/para/seu/projeto/ pelo caminho real no seu computador.

6. Execute as Migrations

Este comando irá criar todas as tabelas necessárias no seu banco de dados, incluindo a tabela products.

php artisan migrate

🤔 Solução de Problemas Comuns
Se encontrar algum erro durante a instalação ou execução, verifique os pontos abaixo:

- Erro "could not find driver (Connection: sqlite)":
Abra seu arquivo php.ini e descomente (remova o ; do início) a linha extension=pdo_sqlite.

- Erro sobre extensão zip ou fileinfo faltando:
No mesmo arquivo php.ini, descomente as linhas extension=zip e extension=fileinfo.

- A aplicação mostra uma página de erro ou uma página antiga:
Limpe o cache do Laravel com os seguintes comandos:

php artisan view:clear
php artisan route:clear
php artisan config:clear

- Erro "no such table: products":
O banco de dados pode estar dessincronizado. Use o comando abaixo para apagar todas as tabelas e recriá-las do zero. Atenção: isso apaga todos os dados.

php artisan migrate:fresh

🔥 Rodando a Aplicação
Com tudo configurado, inicie o servidor de desenvolvimento local do Laravel.

php artisan serve

Agora, abra seu navegador e acesse a URL fornecida (geralmente http://127.0.0.1:8000). Você será redirecionado para a página de listagem de produtos.

🛠️ Tecnologias Utilizadas
- Laravel

- PHP

- SQLite

- Tailwind CSS (via CDN)