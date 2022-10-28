# Teste Full Stack 

#### Symfony 6.1 + PHP 8.1 com Docker

## Execute Localmente

Clone o projeto:

```bash
  https://github.com/JoanLopes/teste_dizy.git
```

Execute o docker-compose:

```bash
  docker-compose build
  docker-compose up -d
```

Entre no container PHP:

```bash
  docker exec -it php8-sf6 bash
```

Execute o comando:

```bash
  composer install
  symfony serve -d
```

após isso acesse:

```http request
  http://localhost:9000
```

e insira as credenciais disponibilizadas para o teste.

## Docker-compose

- PHP-8.1-cli (Debian)
    - Composer
    - Symfony CLI
    - and some other php extentions
    - nodejs, npm, yarn



## Requisitos

- Docker
- Docker-compose

