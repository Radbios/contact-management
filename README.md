## 📖 Como usar
Siga estas etapas para começar a usar o projeto:
#### 1. Clone o Projeto
Para obter uma cópia do projeto em seu computador, execute o comando abaixo para clonar o repositório usando o Git:
```
git clone https://github.com/Radbios/contact-management.git
```
> **Observação:** Caso não tenha o **[Git](https://git-scm.com/)**, instale-o.

#### 2. **Configure o arquivo `.env`**
Vá para a pasta do projeto, faça uma cópia do arquivo `.env.example`, renomeie o arquivo para `.env` e faça as devidas modificações para configurar o servidor.

Você pode usar o seguinte comando para fazer uma cópia do arquivo `.env.example`:
```
cd contact-management
cp .env.example .env
```
Em seguida, abra o arquivo `.env` com um editor de texto e faça as configurações necessárias, como definir variáveis de ambiente, configurar credenciais de banco de dados, etc.

#### 4. Instale as Dependências
Instale as dependências do projeto com o composer
```
composer install
```
> **Observação:** Caso não tenha o **[Composer](https://getcomposer.org/)**, instale-o.

#### 4. Crie a chave
Crie a chave no `.env` com o seguinte comando:
```
php artisan key:generate
```
> **Observação:** Caso não tenha o **[Composer](https://getcomposer.org/)**, instale-o.


#### 5. Rode as Migrations
Rode as migrations do projeto com as seeders (não é obrigado executar a seeder, caso não queira)
```
php artisan migrate --seed
```
#### 6. Inicie o Servidor
Inicio o servidor laravel

#### Desenvolvimento

```
php artisan serve
```
> **Observação:** Por padrão, o servidor é executado na URL **[localhost](http://127.0.0.1:8000)**.

#### Produção
Seguir as instruções do servidor usado para o sistema.
> **Observação:** É recomendado o uso do **[apache](https://httpd.apache.org/)** ou **[nginx](https://nginx.org/en/)**.

## 💻 Usuário do Sistema  
O sistema possui apenas um tipo de usuário (Padrão)

## 🚀 Funcionalidades do Sistema  

### 1. Sistema de Autenticação  

#### 1.1 Login  
**Alvo:** Padrão  
Descrição: Permite que o usuário acesse sua conta no sistema.  

#### 1.2 Cadastro  
**Alvo:** Padrão  
Descrição: Permite que novos usuários se registrem no sistema.  

#### 1.3 Recuperação de Senha  
**Alvo:** Padrão  
Descrição: Permite a redefinição de senha em caso de esquecimento.  

### 2. Gerenciamento de Contatos  

#### 2.1 Listar Contatos  
**Alvo:** Padrão  
Descrição: Exibe a lista de contatos cadastrados pelo usuário.  

#### 2.2 Criar Contato  
**Alvo:** Padrão  
Descrição: Permite o cadastro de novos contatos.  

#### 2.3 Editar Contato  
**Alvo:** Padrão  
Descrição: Permite a edição dos dados de um contato existente.  

#### 2.4 Deletar Contato  
**Alvo:** Padrão  
Descrição: Permite a exclusão lógica de um contato.  

#### 2.5 Restaurar Contato  
**Alvo:** Padrão  
Descrição: Permite a recuperação de um contato previamente excluído.  

#### 2.6 Exportar Contatos em CSV  
**Alvo:** Padrão  
Descrição: Permite a exportação da lista de contatos em um arquivo CSV para backup ou uso externo.  


## :computer: Tecnologias Utilizadas

### Back-end
- **[Laravel](https://laravel.com/)**
- **[PHP](https://www.php.net/)**
- **[MySQL](https://www.mysql.com/)**
  
### Front-end
- **[HTML](https://developer.mozilla.org/pt-BR/docs/Web/HTML)**
- **[CSS](https://developer.mozilla.org/pt-BR/docs/Web/CSS)**
- **[JS](https://developer.mozilla.org/pt-BR/docs/Web/JavaScript)**
- **[Blade](https://laravel.com/docs/9.x/blade)**
- **[MDBootstrap](https://mdbootstrap.com/)**
