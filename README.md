Instalacao

1. Instale as bibliotecas PHP com 'composer install';
2. Instale as bibliotecas javascript com 'npm install';
3. Compile os arquivos js e css com 'npm run dev';
4. Copie o '.env.example' para criar o arquivo .env no diretorio do projeto;
5. Configure o .env criado com sua conexao de banco;
6. Rode as migrations do projeto para criar o banco usando o comando 'php artisan migrate';
7. Crie o usuario admin atraves do comando 'php artisan db:seed --class=Admin UserSeeder', o email e 'admin@admin.com' e a senha 'admin';
8. Rode 'php artisan serve' para abrir o servidor.