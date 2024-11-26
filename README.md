# Projeto Laravel

Este é um sistema desenvolvido com Laravel, contendo funcionalidades de autenticação, incluindo criptografia de senha, login de usuários, e uma dashboard acessível apenas para usuários autenticados. O sistema também possui templates como `welcome`, `sobre`, `usuarios`, `login`, e `area-restrita`.

## Funcionalidades
1. **Cadastro de Usuário com Criptografia de Senha**.
2. **Autenticação via Login**.
3. **Dashboard com Nome ou Email do Usuário Autenticado**.
4. **Acesso Restrito a Áreas Protegidas**.

## Requisitos
- **PHP 8.x** ou superior.
- **Composer**.
- **Banco de Dados MySQL** (ou equivalente).
- **Node.js** e **npm** (para compilação de assets, opcional).

## Configuração e Execução Local
Siga os passos abaixo para configurar e rodar o projeto localmente:

### 1. Clone o repositório
```bash
git clone https://github.com/Almile/projetoLaravel
cd projetoLaravel
```

### 2. Instale as dependências PHP
Certifique-se de que o Composer esteja instalado em sua máquina.
```bash
composer install
```

### 3. Configure o ambiente
Crie um arquivo `.env` na raiz do projeto com base no `.env.example`:
```bash
cp .env.example .env
```

Edite o arquivo `.env` para configurar o banco de dados:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nome_do_banco
DB_USERNAME=usuario
DB_PASSWORD=senha
```

### 4. Gere a chave da aplicação
```bash
php artisan key:generate
```

### 5. Configure o banco de dados
Certifique-se de que o banco de dados está rodando e então execute as migrações:
```bash
php artisan migrate
```

### 6. (Opcional) Compile os assets
Se o projeto incluir estilos ou scripts personalizados, execute:
```bash
npm install
npm run dev
```

### 7. Inicie o servidor de desenvolvimento
Rode o servidor Laravel localmente:
```bash
php artisan serve
```

Acesse o sistema no navegador em [http://localhost:8000](http://localhost:8000).

## Estrutura de Templates
- **welcome.blade.php**: Página inicial.
- **sobre.blade.php**: Página com informações sobre o sistema.
- **usuarios.blade.php**: Lista de usuários cadastrados.
- **login.blade.php**: Tela de login.
- **area-restrita.blade.php**: Conteúdo restrito para usuários autenticados.

- 
