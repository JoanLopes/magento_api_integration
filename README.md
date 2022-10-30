# Teste Full Stack 

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
- [Composer 2](https://getcomposer.org/download/)
- [Symfony](https://symfony.com/download)

## Instalação via docker

#### Symfony 6.1 + PHP 8.1 com Docker

Execute o docker-compose:

```bash
  docker-compose build
  docker-compose up -d
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
    - outras extençoes do PHP
    - nodejs, npm, yarn

### Requisitos

- Docker
- Docker-compose

#### Tela de login

![login](https://github.com/JoanLopes/teste_dizy/blob/main/public/assets/img/login.png)

#### Tela de consulta

![tela de consulta](https://github.com/JoanLopes/teste_dizy/blob/main/public/assets/img/tabela.png)
