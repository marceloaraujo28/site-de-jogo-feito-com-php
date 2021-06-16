-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25-Maio-2021 às 23:48
-- Versão do servidor: 10.4.18-MariaDB
-- versão do PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `wyd`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `download`
--

CREATE TABLE `download` (
  `id` int(11) NOT NULL,
  `mega` varchar(250) NOT NULL,
  `shared` varchar(250) NOT NULL,
  `media` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `download`
--

INSERT INTO `download` (`id`, `mega`, `shared`, `media`) VALUES
(1, 'https://mega.io/', 'https://www.4shared.com/?locale=pt-BR', 'https://www.mediafire.com/');

-- --------------------------------------------------------

--
-- Estrutura da tabela `noticia`
--

CREATE TABLE `noticia` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `mensagem` text NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `imgnotice` varchar(255) NOT NULL,
  `categoria` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `noticia`
--

INSERT INTO `noticia` (`id`, `titulo`, `descricao`, `mensagem`, `imagem`, `imgnotice`, `categoria`) VALUES
(8, 'Lançamento Oficial', 'Estamos na reta final da fase de testes. Nosso Closed Beta foi um sucesso. <br>Em breve traremos novidades, acompanhe nossas redes sociais...', 'Estamos no desenvolvimento do Shadow Worlds desde 11/02/2021 e finalmente estamos chegando no fim das correções e implementações de sistemas.\r\n<br>\r\n<br>\r\nNossa equipe esta empenhada em entregar um bom servidor. \r\n<br>\r\nPor isso, estamos desde o dia do inicio do projeto testando 1001 funcionalidades do Shadow Worlds.\r\n<br>\r\n<br>\r\nNossa equipe encontrou inúmeros erros que já foram corrigidos, chegamos ao processo final, estamos sem quedas, sem bugs, com todas as funcionalidades padrões do WYD funcionando em 100% de aproveitamento.\r\n<br>\r\nEm breve traremos novidades da data de lançamento.<br><br><br>\r\nHoje, podemos dar apenas um pequeno spoiler... O lançamento ficou agendado para Junho!', 'perfil4.jpg', 'slide3.jpg', 'noticia'),
(9, 'Evento de Inauguração', 'O evento de inauguração será ativo apenas uma hora após a abertura do servidor, dando tempo para uparem suas contas.', 'EM BREVE MAIS INFORMAÇÕES<br><br><br>', 'beta.jpg', 'Base.png', 'evento');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pincode`
--

CREATE TABLE `pincode` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `valor` varchar(50) NOT NULL,
  `pincode` int(11) NOT NULL,
  `shadows` varchar(50) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `servidor` varchar(20) NOT NULL,
  `evento` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `status`
--

INSERT INTO `status` (`id`, `servidor`, `evento`) VALUES
(1, 'OFFLINE', 'DESATIVADO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(55) NOT NULL,
  `email` varchar(255) NOT NULL,
  `secreta` varchar(55) NOT NULL,
  `nivel` int(11) NOT NULL DEFAULT 1,
  `dateregister` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `password`, `email`, `secreta`, `nivel`, `dateregister`) VALUES
(20, 'marcelo', '995bf053c4694e1e353cfd42b94e4447', 'marcelinho@gmail.com', 'marcelo', 1, '2021-05-16'),
(21, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com', 'admin', 2, '2021-05-16'),
(22, 'naosei123', '995bf053c4694e1e353cfd42b94e4447', 'naosei@gmail.com', '1234', 1, '2021-05-23');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `download`
--
ALTER TABLE `download`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `noticia`
--
ALTER TABLE `noticia`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `pincode`
--
ALTER TABLE `pincode`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `download`
--
ALTER TABLE `download`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `noticia`
--
ALTER TABLE `noticia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `pincode`
--
ALTER TABLE `pincode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
