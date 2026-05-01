<h1 align="center">
  📞 Sistema de Lista de Ramais Corporativos
</h1>

<p align="center">
  <img alt="License" src="https://img.shields.io/github/license/Yur1B01c4/ramais">
  <img alt="Top language" src="https://img.shields.io/github/languages/top/Yur1B01c4/ramais">
</p>

## 💻 Sobre o Projeto

Este projeto foi desenvolvido por mim na época em que eu era **Jovem Aprendiz** na área de T.I. O objetivo principal do sistema foi centralizar todos os contatos da empresa em um único local, facilitando a comunicação interna entre os colaboradores.

A aplicação conta com uma lista paginada e um sistema de busca rápida. Além de exibir informações essenciais (Nome, Email, Área, Setor e Ramal), possui uma funcionalidade muito útil: um **link direto que abre uma conversa com o colaborador no Microsoft Teams**, trazendo mais agilidade para o dia a dia corporativo.

Este projeto é uma grande recordação do meu início na programação e mostra a minha evolução na criação de soluções para problemas reais.

## ✨ Funcionalidades

- 🔍 **Busca Dinâmica:** Pesquisa rápida por nome, ramal, área ou unidade.
- 🏢 **Lista Paginada:** Exibição organizada dos contatos corporativos.
- 💬 **Integração Teams:** Link direto na tabela que abre o chat do Microsoft Teams com o respectivo colaborador.
- ⚙️ **Painel Administrativo:** (Para usuários autenticados) Cadastro, edição e exclusão de ramais e administradores.

## 🛠 Tecnologias Utilizadas

- **Frontend:** HTML5, CSS3, JavaScript, Bootstrap 5.
- **Backend:** PHP (Orientação a Objetos e PDO).
- **Banco de Dados:** MySQL.

## 🚀 Como Executar o Projeto Localmente

Para rodar este projeto na sua máquina, você vai precisar de um servidor web local, como o [XAMPP](https://www.apachefriends.org/pt_br/index.html) ou [WAMP](https://www.wampserver.com/en/).

### 1. Clone o repositório
```bash
git clone https://github.com/Yur1B01c4/ramais.git
```

### 2. Configure o Banco de Dados
1. Inicie o Apache e o MySQL no XAMPP/WAMP.
2. Acesse o `phpMyAdmin` (geralmente em `http://localhost/phpmyadmin`).
3. Crie um banco de dados chamado `ramais` com collation `utf8mb4_general_ci`.
4. Importe o arquivo `database.sql` (que encontra-se na raiz do projeto) para criar a estrutura e adicionar dados fictícios.

### 3. Configure as Credenciais do Banco
1. Acesse a pasta `db/` no projeto.
2. Renomeie o arquivo `config.example.php` para `config.php`.
3. Caso você utilize senha no MySQL, edite o `config.php` informando-a. O padrão do XAMPP é usuário `root` e senha vazia.

### 4. Rode a Aplicação
Coloque a pasta do projeto dentro do diretório do seu servidor local (ex: `C:/xampp/htdocs/ramais`).  
Acesse no seu navegador:
```
http://localhost/ramais
```

> **Nota:** Para testar a área administrativa, você pode logar com o usuário `admin` e a senha definida no arquivo SQL (padrão: senha fictícia explicada no arquivo ou script).

## 📝 Licença

Este projeto está sob a licença MIT. Veja o arquivo [LICENSE](LICENSE) para mais detalhes.

---
Feito com ☕ por Yuri Santana
