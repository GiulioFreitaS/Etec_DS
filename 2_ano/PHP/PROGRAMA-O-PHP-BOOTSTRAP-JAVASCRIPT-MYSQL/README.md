# Espaço de Co-working — Reserva de Salas

Sistema web para gerenciamento de um espaço de co-working, permitindo o cadastro de **salas de reunião**, seus **horários disponíveis** e o controle de **reservas**. Desenvolvido como projeto acadêmico da disciplina de Programação.

**Aluno:** Giulio Pimentel de Freitas — Grupo A
**Stack:** PHP + Bootstrap + JavaScript + MySQL

---

## 📋 Funcionalidades

O sistema implementa CRUD completo (Create, Read, Update, Delete) para três entidades:

| Módulo | Funcionalidades |
|---|---|
| **Salas** | Cadastrar, listar, visualizar detalhes, editar e excluir salas (nome, descrição, capacidade, localização, status) |
| **Horários Disponíveis** | Cadastrar, listar, editar e excluir horários de disponibilidade por sala e dia da semana |
| **Reservas** | Cadastrar, listar, editar e excluir reservas, com **validação automática de conflito de horário** por sala/data |

### Outras características
- Dashboard inicial com estatísticas (total de salas, horários e reservas) e próximas reservas.
- Interface responsiva com **Bootstrap 5**.
- Validação de formulários no client-side com **JavaScript** (Bootstrap validation + checagem de horário final > horário inicial).
- Validação e sanitização de dados no server-side com **PHP + PDO** (prepared statements, prevenindo SQL Injection).
- Confirmação via JavaScript antes de qualquer exclusão.

---

## 🗂️ Estrutura do Projeto

```
coworking/
├── config/
│   └── database.php          # Configuração de conexão PDO com o MySQL
├── salas/
│   ├── listar.php            # Listagem de salas (Read)
│   ├── criar.php              # Cadastro de sala (Create)
│   ├── editar.php             # Edição de sala (Update)
│   ├── visualizar.php         # Detalhes de uma sala
│   └── excluir.php            # Exclusão de sala (Delete)
├── horarios/
│   ├── listar.php
│   ├── criar.php
│   ├── editar.php
│   └── excluir.php
├── reservas/
│   ├── listar.php
│   ├── criar.php
│   ├── editar.php
│   └── excluir.php
├── assets/
│   ├── css/style.css
│   └── js/validacao.js
├── includes_header.php
├── includes_footer.php
├── index.php                  # Dashboard
├── database.sql               # Script de criação do banco + dados de exemplo
└── README.md
```

---

## 🗄️ Modelo de Dados

**salas**
`id, nome, descricao, capacidade, localizacao, status (ativa/inativa), criado_em`

**horarios_disponiveis**
`id, sala_id (FK), dia_semana, hora_inicio, hora_fim, criado_em`

**reservas**
`id, sala_id (FK), nome_responsavel, email_responsavel, data_reserva, hora_inicio, hora_fim, observacoes, status (confirmada/cancelada), criado_em`

Relacionamentos: `1 sala : N horarios_disponiveis` e `1 sala : N reservas`, com `ON DELETE CASCADE`.

---

## ⚙️ Como Executar Localmente

### Pré-requisitos
- PHP 7.4+ (com extensão PDO MySQL habilitada)
- MySQL ou MariaDB
- Servidor local: XAMPP, WAMP, MAMP ou `php -S`

### Passo a passo

1. **Clone o repositório**
   ```bash
   git clone https://github.com/SEU-USUARIO/coworking-reservas.git
   cd coworking-reservas
   ```

2. **Crie o banco de dados**

   Importe o arquivo `database.sql` no seu MySQL:
   ```bash
   mysql -u root -p < database.sql
   ```
   Ou pelo phpMyAdmin: crie um banco chamado `coworking_db` e importe o arquivo `database.sql`.

3. **Configure a conexão**

   Edite `config/database.php` com suas credenciais, se necessário:
   ```php
   define('DB_HOST', 'localhost');
   define('DB_NAME', 'coworking_db');
   define('DB_USER', 'root');
   define('DB_PASS', '');
   ```

4. **Inicie o servidor**

   Usando o servidor embutido do PHP:
   ```bash
   php -S localhost:8000
   ```
   Ou coloque a pasta do projeto dentro de `htdocs` (XAMPP) / `www` (WAMP) e acesse via Apache.

5. **Acesse no navegador**
   ```
   http://localhost:8000
   ```

---

## 🎥 Tutorial em Vídeo

> Link do vídeo demonstrando a navegação do site e as operações de CRUD: 


https://github.com/user-attachments/assets/04f8a79a-5c2e-4373-82d4-7b497a76a66f



---

## 🛠️ Tecnologias Utilizadas

- **PHP 7.4+** (PDO para acesso ao banco de dados)
- **MySQL**
- **Bootstrap 5** (layout responsivo e componentes)
- **Bootstrap Icons**
- **JavaScript** (validação de formulários e confirmações)

---

## 📄 Licença

Projeto acadêmico, sem fins comerciais.
