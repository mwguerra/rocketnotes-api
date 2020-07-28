# rocketnotes-api
 API do aplicativo de notas RocketNotes

## Instalação

Crie um banco de dados rocketnotes e atualize os dados de acesso no arquivo .env.

Em seguida instale as dependências e rode as migrations.

```bash
composer install
php artisan migrate
```

Instale novas chaves para o Laravel Passport

```bash
php artisan passport:install
```
