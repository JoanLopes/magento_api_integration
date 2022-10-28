# Teste Full Stack 

#### Symfony 6.1 + PHP 8.1 com Docker

## Execute Localmente

Clone o projeto:

```bash
  https://github.com/JoanLopes/teste_dizy.git
```

## Instalação via Composer

Execute o comando:

```bash
  composer install
  symfony serve -d
```
após isso acesse:

```http request
  http://localhost:8000
```
e insira as credenciais disponibilizadas para o teste.

### Requisitos

- PHP 8.1
- Composer 2

## Instalação via docker

Execute o docker-compose:

```bash
  docker-compose build
  docker-compose up -d
```

Execute os comandos:

```bash
  docker exec -it php8-sf6 composer install
  docker exec -it php8-sf6  symfony serve -d
```

após isso acesse:

```http request
  http://localhost:9000
```

e insira as credenciais disponibilizadas para o teste.

### Docker-compose

- PHP-8.1-cli (Debian)
    - Composer
    - Symfony CLI
    - and some other php extentions
    - nodejs, npm, yarn



### Requisitos

- Docker
- Docker-compose

