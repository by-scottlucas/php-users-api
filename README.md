# PHP - Users API

## 📌 Introdução

Este é um projeto de **API RESTful** desenvolvida em **PHP** com o **Slim Framework**, voltada para operações **CRUD de usuários**. A API permite criar, listar, buscar, atualizar e excluir usuários com integração ao banco de dados MySQL.

---

## 🚀 Como Executar o Projeto

Siga os passos abaixo para rodar o projeto localmente:

1. **Clone o repositório**

```bash
git clone https://github.com/by-scottlucas/php-users-api.git
```

2. **Acesse o diretório do projeto**

```bash
cd php-users-api
```

3. **Crie o arquivo `.env` com base no `.env.example`**

```env
DB_HOST=localhost
DB_NAME=seu_banco
DB_USER=seu_usuario
DB_PASSWORD=sua_senha
```

4. **Instale as dependências**

```bash
composer install
```

5. **Inicie o servidor de desenvolvimento**

Você pode utilizar o servidor embutido do PHP:

```bash
php -S localhost:8080 -t public
```

A API estará disponível em `http://localhost:8080`.

---

## 📂 Estrutura do Projeto

```bash
├── config/             # Arquivos de configuração
├── public/             # Ponto de entrada da aplicação
├── src/                # Código-fonte principal
│   ├── controllers/    # Controladores da API
│   ├── models/         # Modelos de dados
│   └── routes/         # Definições de rotas
```

---

## 🛠️ Tecnologias Utilizadas

* **PHP** – Linguagem de programação do lado do servidor, utilizada para criar a lógica da aplicação.

* **Slim Framework** – Microframework rápido e minimalista para PHP, ideal para construção de APIs RESTful e aplicações leves.

* **Slim PSR-7** – Implementação compatível com o padrão PSR-7 (HTTP Message Interface), utilizada pelo Slim para lidar com requisições e respostas HTTP de forma padronizada.

* **phpdotenv** – Biblioteca que permite carregar variáveis de ambiente a partir de um arquivo `.env`, separando configurações sensíveis do código-fonte.

* **MySQL** – Sistema de banco de dados relacional utilizado para armazenar as informações dos usuários da API.

---

## 📦 Endpoints da API

* `GET /api/hello` – Testa a conexão com a API
* `GET /api/users` – Lista todos os usuários
* `POST /api/users` – Cadastra um novo usuário
* `GET /api/users/{id}` – Obtém um usuário específico
* `PUT /api/users/{id}` – Atualiza os dados de um usuário
* `DELETE /api/users/{id}` – Remove um usuário do sistema

---

## 📜 Licença

Este projeto está licenciado sob a [**Licença MIT**](./LICENSE).

---

## 👨‍💻 Autor

Este projeto foi desenvolvido por **Lucas Santos Silva**, Desenvolvedor Full Stack, graduado pela **Escola Técnica do Estado de São Paulo (ETEC)** nos cursos de **Informática (Suporte)** e **Informática para Internet**.

[![LinkedIn](https://img.shields.io/badge/LinkedIn-0077B5?style=for-the-badge\&logo=linkedin\&logoColor=white)](https://www.linkedin.com/in/bylucasss/)
