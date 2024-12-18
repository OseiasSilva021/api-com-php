# 🌐 API PHP com XAMPP e MySQL

Esta API permite realizar operações CRUD (📝 "Create", 👀 "Read", ✏️ "Update", 🗑️ "Delete") em uma base de dados MySQL. Ela é implementada em PHP utilizando XAMPP como servidor local.

## 🛠️ Instalação

### ⚙️ Requisitos:
* 🐘 PHP (versão 7.4 ou superior)
* 🌐 Servidor Apache e MySQL (via XAMPP ou similar)
* 🧪 Postman ou outro cliente HTTP para testar os endpoints

### 📂 Configuração do Banco de Dados:
Crie um banco de dados chamado `api_database`. Execute o seguinte comando SQL para criar a tabela:

```sql
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL
);
```

### 📋 Configuração do Projeto:
* Clone este repositório ou copie os arquivos para o diretório `htdocs` do XAMPP
* Altere o arquivo `config/db.php` para configurar os detalhes da conexão com o banco de dados:

```php
<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'api_database');
define('DB_USER', 'root');
define('DB_PASS', '');
?>
```

### 🚀 Inicie o servidor:
* Inicie o Apache e MySQL no painel de controle do XAMPP
* Acesse o projeto pelo navegador ou pelo Postman via `http://localhost/api/public/index.php`

## 🔗 Endpoints da API

### 1. 📋 Obter todos os usuários
* **URL:** `/api/users`
* **Método:** `GET`
* **Resposta:**
```json
[
  {
    "id": 1,
    "name": "John Doe",
    "email": "john.doe@example.com"
  },
  {
    "id": 2,
    "name": "Jane Doe",
    "email": "jane.doe@example.com"
  }
]
```

### 2. 🔍 Obter usuário por ID
* **URL:** `/api/users/{id}`
* **Método:** `GET`
* **Resposta de sucesso:**
```json
{
  "id": 1,
  "name": "John Doe",
  "email": "john.doe@example.com"
}
```
* **Resposta de erro:**
```json
{
  "message": "User not found"
}
```

### 3. ➕ Criar um novo usuário
* **URL:** `/api/users`
* **Método:** `POST`
* **Corpo da requisição:**
```json
{
  "name": "Alice",
  "email": "alice@example.com"
}
```
* **Resposta:**
```json
{
  "message": "User created successfully"
}
```

### 4. ✏️ Atualizar usuário por ID
* **URL:** `/api/users/{id}`
* **Método:** `PUT`
* **Corpo da requisição:**
```json
{
  "name": "Alice Updated",
  "email": "alice.updated@example.com"
}
```
* **Resposta de sucesso:**
```json
{
  "message": "User updated successfully"
}
```
* **Resposta de erro:**
```json
{
  "message": "User not found"
}
```

### 5. 🗑️ Excluir usuário por ID
* **URL:** `/api/users/{id}`
* **Método:** `DELETE`
* **Resposta de sucesso:**
```json
{
  "message": "User deleted successfully"
}
```
* **Resposta de erro:**
```json
{
  "message": "User not found"
}
```

## 🗂️ Estrutura do Projeto

```
api/
├── config/
│   └── db.php        # ⚙️ Configurações do banco de dados
├── controllers/
│   └── UserController.php  # 🧠 Controlador de lógica da API
├── models/
│   └── User.php      # 🗄️ Modelo para interação com o banco de dados
├── public/
│   └── index.php     # 🚪 Arquivo principal da API
```

## 💡 Notas
* Certifique-se de que as extensões do PHP para MySQL estão habilitadas no arquivo `php.ini`
* Utilize um cliente HTTP como Postman para testar os endpoints facilmente

## 🤝 Contribuições
Contribuições são bem-vindas! Sinta-se à vontade para abrir issues ou enviar pull requests.