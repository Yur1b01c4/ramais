-- Estrutura do Banco de Dados para Lista de Ramais
-- Banco de dados fictício para fins de demonstração

CREATE DATABASE IF NOT EXISTS `ramais` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `ramais`;

-- --------------------------------------------------------

-- Estrutura da tabela `contatos`
CREATE TABLE `contatos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) NOT NULL,
  `ramal` varchar(10) NOT NULL,
  `email` varchar(200) DEFAULT 'https://teams.microsoft.com/l/chat/0/0?users=',
  `area` varchar(200) NOT NULL,
  `ativo` varchar(3) NOT NULL DEFAULT 'SIM',
  `unidade` text NOT NULL,
  `favorito` varchar(3) NOT NULL DEFAULT 'NAO',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Inserindo dados fictícios na tabela `contatos`
INSERT INTO `contatos` (`nome`, `ramal`, `email`, `area`, `ativo`, `unidade`, `favorito`) VALUES
('João da Silva', '101', 'joao.silva@exemplo.com.br', 'T.I', 'SIM', 'Matriz', 'NAO'),
('Maria Oliveira', '102', 'maria.oliveira@exemplo.com.br', 'RH', 'SIM', 'Matriz', 'NAO'),
('Carlos Pereira', '201', 'carlos.pereira@exemplo.com.br', 'Financeiro', 'SIM', 'Filial 1', 'NAO'),
('Ana Souza', '202', 'ana.souza@exemplo.com.br', 'Diretoria', 'SIM', 'Filial 1', 'SIM'),
('Lucas Fernandes', '301', 'lucas.fernandes@exemplo.com.br', 'Segurança', 'SIM', 'Matriz', 'NAO');

-- --------------------------------------------------------

-- Estrutura da tabela `usuarios` (Administradores)
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(250) NOT NULL,
  `login` varchar(250) NOT NULL,
  `ramal` int(11) DEFAULT NULL,
  `senha` varchar(250) NOT NULL,
  `recuperar_senha` varchar(220) DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  `ativo` varchar(3) NOT NULL DEFAULT 'SIM',
  `data_criacao` datetime NOT NULL,
  `data_modificacao` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Inserindo um usuário administrador fictício (senha é 'admin123' encodada em BCRYPT)
INSERT INTO `usuarios` (`nome`, `login`, `ramal`, `senha`, `email`, `ativo`, `data_criacao`, `data_modificacao`) VALUES
('Administrador', 'admin', 999, '$2y$10$eO1dIt3.B/5GIn.26V7eIedG0o/gWw69O9qO4HlTfLw71QG7d0TmW', 'admin@exemplo.com.br', 'SIM', NOW(), NOW());
