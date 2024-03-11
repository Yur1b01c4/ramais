-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08/03/2024 às 20:50
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `ramais`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `contatos`
--

CREATE TABLE `contatos` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `ramal` varchar(10) NOT NULL,
  `email` varchar(200) DEFAULT 'https://teams.microsoft.com/l/chat/0/0?users=',
  `area` varchar(200) NOT NULL,
  `ativo` varchar(3) NOT NULL DEFAULT 'SIM',
  `unidade` text NOT NULL,
  `favorito` varchar(3) NOT NULL DEFAULT 'NAO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `contatos`
--

INSERT INTO `contatos` (`id`, `nome`, `ramal`, `email`, `area`, `ativo`, `unidade`, `favorito`) VALUES
(533, 'Teegan Grant', '211', 'teegangrant5223@nardini.indbr', 'Fiscal', 'SIM', 'Aporé', 'NAO'),
(534, 'Vladimir Lyons', '377', 'vladimirlyons@nardini.indbr', 'Fiscal', 'SIM', 'Vista alegre', 'NAO'),
(535, 'Declan Sexton', '164', 'declansexton@nardini.indbr', 'Rh', 'SIM', 'Vista alegre', 'NAO'),
(536, 'Hilda Boyle', '225', 'hildaboyle2173@nardini.indbr', 'Cedoc', 'SIM', 'Vista alegre', 'NAO'),
(537, 'Rajah Fitzgerald', '172', 'rajahfitzgerald@nardini.indbr', 'Rh', 'SIM', 'Aporé', 'NAO'),
(538, 'Ifeoma Robbins', '115', 'ifeomarobbins@nardini.indbr', 'Cedoc', 'SIM', 'Aporé', 'NAO'),
(539, 'Emerald Cervantes', '397', 'emeraldcervantes@nardini.indbr', 'Segurança', 'SIM', 'Vista alegre', 'NAO'),
(540, 'Paki Workman', '262', 'pakiworkman6201@nardini.indbr', 'T.i', 'SIM', 'Vista alegre', 'NAO'),
(541, 'Serena Abbott', '311', 'serenaabbott4064@nardini.indbr', 'Cedoc', 'SIM', 'Vista alegre', 'NAO'),
(542, 'James Dennis', '261', 'jamesdennis5686@nardini.indbr', 'Compra', 'SIM', 'Vista alegre', 'NAO'),
(544, 'Astra Todd', '173', 'astratodd@nardini.indbr', 'Cedoc', 'SIM', 'Vista alegre', 'NAO'),
(545, 'Liberty Tanner', '225', 'libertytanner@nardini.indbr', 'Comunicação', 'SIM', 'Vista alegre', 'NAO'),
(546, 'Idona Kline', '352', 'idonakline4360@nardini.indbr', 'Rh', 'SIM', 'Vista alegre', 'NAO'),
(547, 'Hunter Frank', '235', 'hunterfrank103@nardini.indbr', 'Juridico', 'SIM', 'Vista alegre', 'NAO'),
(548, 'Kasimir Melendez', '330', 'kasimirmelendez1975@nardini.indbr', 'Comunicação', 'SIM', 'Vista alegre', 'NAO'),
(549, 'Elliott Washington', '387', 'elliottwashington@nardini.indbr', 'Segurança', 'SIM', 'Vista alegre', 'NAO'),
(550, 'Kamal Bullock', '165', 'kamalbullock3134@nardini.indbr', 'Diretoria', 'SIM', 'Aporé', 'NAO'),
(551, 'Kelly Lindsay', '294', 'kellylindsay@nardini.indbr', 'Comunicação', 'SIM', 'Vista alegre', 'NAO'),
(552, 'Lester Hopper', '200', 'lesterhopper@nardini.indbr', 'Compra', 'SIM', 'Vista alegre', 'NAO'),
(553, 'Odessa Grant', '363', 'odessagrant5362@nardini.indbr', 'Rh', 'SIM', 'Aporé', 'NAO'),
(554, 'Zelenia Arnold', '251', 'zeleniaarnold7753@nardini.indbr', 'Diretoria', 'SIM', 'Vista alegre', 'NAO'),
(555, 'Vielka Allen', '267', 'vielkaallen4380@nardini.indbr', 'Compra', 'SIM', 'Aporé', 'NAO'),
(556, 'Oleg Conner', '269', 'olegconner@nardini.indbr', 'Comunicação', 'SIM', 'Vista alegre', 'NAO'),
(557, 'Hedda Michael', '258', 'heddamichael5691@nardini.indbr', 'Comunicação', 'SIM', 'Vista alegre', 'NAO'),
(558, 'Paul O\'brien', '383', 'paulobrien@nardini.indbr', 'Rh', 'SIM', 'Vista alegre', 'NAO'),
(560, 'Plato Sheppard', '288', 'platosheppard@nardini.indbr', 'Juridico', 'SIM', 'Aporé', 'NAO'),
(561, 'Rhona Higgins', '228', 'rhonahiggins1044@nardini.indbr', 'Rh', 'SIM', 'Vista alegre', 'NAO'),
(562, 'Merritt Aguilar', '116', 'merrittaguilar@nardini.indbr', 'Compra', 'SIM', 'Aporé', 'NAO'),
(563, 'Macaulay Bell', '173', 'macaulaybell@nardini.indbr', 'Juridico', 'SIM', 'Vista alegre', 'NAO'),
(564, 'MacKenzie Flores', '166', 'mackenzieflores@nardini.indbr', 'Segurança', 'SIM', 'Vista alegre', 'NAO'),
(565, 'Nash Compton', '389', 'nashcompton@nardini.indbr', 'Juridico', 'SIM', 'Vista alegre', 'NAO'),
(566, 'Iris Mcgowan', '207', 'irismcgowan@nardini.indbr', 'Segurança', 'SIM', 'Vista alegre', 'NAO'),
(567, 'Beau Frederick', '226', 'beaufrederick@nardini.indbr', 'Cedoc', 'SIM', 'Vista alegre', 'NAO'),
(569, 'Josiah Rivera', '321', 'josiahrivera490@nardini.indbr', 'Rh', 'SIM', 'Aporé', 'NAO'),
(570, 'Maisie Pitts', '282', 'maisiepitts7786@nardini.indbr', 'Cedoc', 'SIM', 'Vista alegre', 'NAO'),
(571, 'Duncan Ramsey', '135', 'duncanramsey@nardini.indbr', 'T.i', 'SIM', 'Vista alegre', 'NAO'),
(572, 'Brennan Holder', '283', 'brennanholder889@nardini.indbr', 'Juridico', 'SIM', 'Vista alegre', 'NAO'),
(573, 'Kirby Garrett', '330', 'kirbygarrett8415@nardini.indbr', 'Rh', 'SIM', 'Aporé', 'NAO'),
(574, 'Leilani George', '328', 'leilanigeorge@nardini.indbr', 'Juridico', 'SIM', 'Aporé', 'NAO'),
(575, 'Quinn Carter', '223', 'quinncarter3553@nardini.indbr', 'Segurança', 'SIM', 'Vista alegre', 'NAO'),
(576, 'Brenden Black', '378', 'brendenblack@nardini.indbr', 'Fiscal', 'SIM', 'Aporé', 'NAO'),
(577, 'Matthew Scott', '111', 'matthewscott1858@nardini.indbr', 'Compra', 'SIM', 'Aporé', 'NAO'),
(578, 'Chaim Goodwin', '398', 'chaimgoodwin54@nardini.indbr', 'Rh', 'SIM', 'Aporé', 'NAO'),
(579, 'Elvis Berger', '280', 'elvisberger@nardini.indbr', 'T.i', 'SIM', 'Aporé', 'NAO'),
(580, 'Rama Wilson', '365', 'ramawilson@nardini.indbr', 'Juridico', 'SIM', 'Aporé', 'NAO'),
(581, 'Elaine Francis', '157', 'elainefrancis@nardini.indbr', 'Rh', 'SIM', 'Vista alegre', 'NAO'),
(583, 'Yoshi Shepherd', '382', 'yoshishepherd9403@nardini.indbr', 'Cedoc', 'SIM', 'Vista alegre', 'NAO'),
(584, 'Julie Everett', '188', 'julieeverett@nardini.indbr', 'Compra', 'SIM', 'Vista alegre', 'NAO'),
(585, 'Jakeem Byrd', '213', 'jakeembyrd@nardini.indbr', 'T.i', 'SIM', 'Vista alegre', 'NAO'),
(586, 'Madison Wynn', '377', 'madisonwynn7077@nardini.indbr', 'Cedoc', 'SIM', 'Aporé', 'NAO'),
(589, 'Trevor Booker', '298', 'trevorbooker@nardini.indbr', 'Cedoc', 'SIM', 'Aporé', 'NAO'),
(590, 'Lael Downs', '282', 'laeldowns1177@nardini.indbr', 'Comunicação', 'SIM', 'Vista alegre', 'NAO'),
(591, 'Kevin Powers', '138', 'kevinpowers6835@nardini.indbr', 'Comunicação', 'SIM', 'Vista alegre', 'NAO'),
(592, 'Mollie Mitchell', '225', 'molliemitchell4835@nardini.indbr', 'Compra', 'SIM', 'Vista alegre', 'NAO'),
(593, 'Herman Moon', '263', 'hermanmoon@nardini.indbr', 'Segurança', 'SIM', 'Aporé', 'NAO'),
(594, 'Sage Morales', '115', 'sagemorales@nardini.indbr', 'Juridico', 'SIM', 'Vista alegre', 'NAO'),
(595, 'Karleigh Sweet', '138', 'karleighsweet@nardini.indbr', 'Juridico', 'SIM', 'Aporé', 'NAO'),
(596, 'Illiana Mcclure', '151', 'illianamcclure@nardini.indbr', 'Comunicação', 'SIM', 'Aporé', 'NAO'),
(597, 'Lysandra Clark', '298', 'lysandraclark4232@nardini.indbr', 'Comunicação', 'SIM', 'Aporé', 'NAO'),
(598, 'Colt Ratliff', '160', 'coltratliff@nardini.indbr', 'Rh', 'SIM', 'Vista alegre', 'NAO'),
(599, 'Briar Barton', '362', 'briarbarton@nardini.indbr', 'Cedoc', 'SIM', 'Vista alegre', 'NAO'),
(600, 'Kadeem Cooley', '323', 'kadeemcooley2740@nardini.indbr', 'Comunicação', 'SIM', 'Aporé', 'NAO'),
(601, 'Odysseus Walter', '113', 'odysseuswalter@nardini.indbr', 'Cedoc', 'SIM', 'Vista alegre', 'NAO'),
(602, 'Griffin Bradford', '117', 'griffinbradford@nardini.indbr', 'Comunicação', 'SIM', 'Vista alegre', 'NAO'),
(603, 'Martin Decker', '101', 'martindecker1368@nardini.indbr', 'Rh', 'SIM', 'Vista alegre', 'NAO'),
(604, 'Erich Shaffer', '327', 'erichshaffer3602@nardini.indbr', 'Comunicação', 'SIM', 'Vista alegre', 'NAO'),
(605, 'Winifred Greer', '321', 'winifredgreer8297@nardini.indbr', 'Juridico', 'SIM', 'Aporé', 'NAO'),
(606, 'Colleen Randolph', '264', 'colleenrandolph3087@nardini.indbr', 'Diretoria', 'SIM', 'Aporé', 'NAO'),
(607, 'Vaughan Cross', '282', 'vaughancross8705@nardini.indbr', 'Compra', 'SIM', 'Vista alegre', 'NAO'),
(608, 'Genevieve Cabrera', '192', 'genevievecabrera@nardini.indbr', 'Comunicação', 'SIM', 'Aporé', 'NAO'),
(609, 'Justine Valencia', '262', 'justinevalencia9254@nardini.indbr', 'Compra', 'SIM', 'Vista alegre', 'NAO'),
(610, 'Dale Navarro', '132', 'dalenavarro@nardini.indbr', 'Segurança', 'SIM', 'Aporé', 'NAO'),
(611, 'Damon Noble', '111', 'damonnoble5930@nardini.indbr', 'Compra', 'SIM', 'Vista alegre', 'NAO'),
(612, 'Kathleen Warren', '115', 'kathleenwarren2689@nardini.indbr', 'Cedoc', 'SIM', 'Aporé', 'NAO'),
(613, 'Selma Edwards', '119', 'selmaedwards@nardini.indbr', 'T.i', 'SIM', 'Vista alegre', 'NAO'),
(615, 'Rogan Mays', '369', 'roganmays5615@nardini.indbr', 'Rh', 'SIM', 'Vista alegre', 'NAO'),
(616, 'Jelani Odom', '358', 'jelaniodom@nardini.indbr', 'Segurança', 'SIM', 'Vista alegre', 'NAO'),
(617, 'Heather Giles', '307', 'heathergiles@nardini.indbr', 'Comunicação', 'SIM', 'Vista alegre', 'NAO'),
(618, 'Jane Macias', '274', 'janemacias@nardini.indbr', 'Segurança', 'SIM', 'Vista alegre', 'NAO'),
(619, 'Lacy Davis', '279', 'lacydavis4192@nardini.indbr', 'Cedoc', 'SIM', 'Aporé', 'NAO'),
(620, 'Ira Gentry', '331', 'iragentry6394@nardini.indbr', 'Cedoc', 'SIM', 'Vista alegre', 'NAO'),
(621, 'Russell Waters', '377', 'russellwaters4825@nardini.indbr', 'Cedoc', 'SIM', 'Aporé', 'NAO'),
(622, 'Arden Dunlap', '266', 'ardendunlap@nardini.indbr', 'Comunicação', 'SIM', 'Aporé', 'NAO'),
(623, 'Mona Woodard', '304', 'monawoodard2214@nardini.indbr', 'Rh', 'SIM', 'Vista alegre', 'NAO'),
(624, 'Inez Barton', '104', 'inezbarton553@nardini.indbr', 'Compra', 'SIM', 'Aporé', 'NAO'),
(625, 'Tallulah Gates', '208', 'tallulahgates@nardini.indbr', 'T.i', 'SIM', 'Vista alegre', 'NAO'),
(626, 'Rinah Armstrong', '111', 'rinaharmstrong@nardini.indbr', 'Comunicação', 'SIM', 'Aporé', 'NAO'),
(627, 'Shay Avila', '105', 'shayavila@nardini.indbr', 'Cedoc', 'SIM', 'Vista alegre', 'NAO'),
(628, 'Justin Matthews', '320', 'justinmatthews@nardini.indbr', 'Rh', 'SIM', 'Aporé', 'NAO'),
(629, 'Jada Herring', '250', 'jadaherring5816@nardini.indbr', 'Segurança', 'SIM', 'Vista alegre', 'NAO'),
(630, 'Marsden Baxter', '164', 'marsdenbaxter@nardini.indbr', 'Fiscal', 'SIM', 'Aporé', 'NAO'),
(631, 'Mason Nunez', '306', 'masonnunez9228@nardini.indbr', 'Fiscal', 'SIM', 'Aporé', 'NAO'),
(632, 'Mannix Stephenson', '278', 'mannixstephenson@nardini.indbr', 'Fiscal', 'SIM', 'Aporé', 'NAO'),
(633, 'aa', '145', 'yurideoliveirasantana165@gmail.com', 't.i', 'SIM', 'Vista Alegre', 'NAO');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(250) NOT NULL,
  `login` varchar(250) NOT NULL,
  `ramal` int(11) DEFAULT NULL,
  `senha` varchar(250) NOT NULL,
  `recuperar_senha` varchar(220) DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  `ativo` varchar(3) NOT NULL DEFAULT 'SIM',
  `data_criacao` datetime NOT NULL,
  `data_modificacao` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `login`, `ramal`, `senha`, `recuperar_senha`, `email`, `ativo`, `data_criacao`, `data_modificacao`) VALUES
(27, 'Yuri de Oliveira Santana', 'yuri.santana', NULL, '$2y$10$NlKUmgBsQbJTph8zlHsu3.RBl4mTvWNwcOuvEqVgeTyXljtCVIL/i', '$2y$10$MpK5B6poDqaPjKbnb50PIepKtJs.rYwJxErQRoCzRimIeKmxBWHRC', 'yuri.santana@nardini.ind.br', 'SIM', '0000-00-00 00:00:00', '2024-03-08 18:15:01'),
(28, 'thelma rozani', 'thelma.rozani', NULL, '$2y$10$Dwb72oTPg7K/O42YjlyIseUNyf9NP7dBg/ZGfTXPPdcWz5AO1lHOO', NULL, 'thelma.rozani@nardini.ind.br', 'SIM', '0000-00-00 00:00:00', '2024-03-08 20:49:49');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `contatos`
--
ALTER TABLE `contatos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `contatos`
--
ALTER TABLE `contatos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=634;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
