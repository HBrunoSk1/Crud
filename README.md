# Projeto CRUD Bootstrap PHP

Este é um projeto simples de CRUD (Create, Read, Update, Delete) desenvolvido em PHP com interface Bootstrap e banco de dados MySQL.

## Funcionalidades

- **Login de usuário**
- **Listagem de contatos**
- **Adicionar novo contato**
- **Editar contato existente**
- **Excluir contato**
- Interface responsiva com Bootstrap

## Estrutura dos Arquivos

- `login.php` — Tela de login do sistema
- `home.php` — Página inicial e listagem dos contatos
- `add.php` — Formulário para adicionar novo contato
- `edit.php` — Formulário para editar contato existente
- `delete.php` — Exclusão de contato
- `db.php` — Conexão com o banco de dados MySQL

## Como usar

1. **Clone o repositório:**
   ```bash
   git clone https://github.com/seu-usuario/seu-repositorio.git
   ```

2. **Configure o banco de dados:**
   - Crie um banco de dados MySQL.
   - Importe o arquivo SQL (caso exista) ou crie a tabela manualmente:
     ```sql
     CREATE TABLE contatos (
       id INT AUTO_INCREMENT PRIMARY KEY,
       nome VARCHAR(100) NOT NULL,
       email VARCHAR(100),
       telefone VARCHAR(20)
     );
     ```

3. **Configure a conexão em `db.php`:**
   ```php
   $conn = new mysqli("localhost", "usuario", "senha", "nome_do_banco");
   ```

4. **Execute o projeto:**
   - Coloque os arquivos em seu servidor local (ex: XAMPP, WAMP, Laragon).
   - Acesse `http://localhost/projeto_crud_bootstrap/login.php` no navegador.

## Tecnologias utilizadas

- PHP
- MySQL
- Bootstrap 5

## Observações

- Este projeto é para fins didáticos.
- Não utilize em produção sem implementar validações e segurança adequadas.

---
