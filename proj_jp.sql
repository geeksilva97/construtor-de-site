-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 05, 2016 at 04:20 
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proj_jp`
--

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id_img` int(11) NOT NULL,
  `src` varchar(120) NOT NULL,
  `title` varchar(50) NOT NULL,
  `flg_ativo` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id_img`, `src`, `title`, `flg_ativo`) VALUES
(1, 'comida.jpg', 'Imagem 1', 1),
(2, 'imagem1.jpg', 'Imagem 2', 1),
(3, 'zoio.png', 'Erlania lokinha', 0);

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

CREATE TABLE `links` (
  `id_link` int(11) NOT NULL,
  `descricao` varchar(50) NOT NULL,
  `src` varchar(120) NOT NULL,
  `flg_ativo` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `links`
--

INSERT INTO `links` (`id_link`, `descricao`, `src`, `flg_ativo`) VALUES
(1, 'Home', 'inicio', 1),
(2, 'Sobre', 'sobre', 1),
(3, 'Posts', 'posts', 0),
(4, 'Contato', 'contato', 1);

-- --------------------------------------------------------

--
-- Table structure for table `noticias`
--

CREATE TABLE `noticias` (
  `id_noticia` int(11) NOT NULL,
  `titulo` varchar(60) NOT NULL,
  `conteudo` text NOT NULL,
  `flg_ativo` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `noticias`
--

INSERT INTO `noticias` (`id_noticia`, `titulo`, `conteudo`, `flg_ativo`) VALUES
(1, 'Desenho Animado', 'Goku enfreta Vegeta em uma longa e complicada batalha, mas apos trapaca Vegeda consegue deixar Kakaroto (como ele assim o chama) inconsciente, mas mal sabe ele que Goku pode se transformar no super saiajyn nivel3', 0),
(6, 'LanÃ§amento do livro de PHP OO', 'Nesta sexta-feira as 15:00 serÃ¡ lanÃ§ado o livro como titulo desvendando os mistÃ©rios do PHP.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id_post` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `sub_titulo` varchar(50) NOT NULL,
  `conteudo` text NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `chave` varchar(100) NOT NULL,
  `flg_ativo` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id_post`, `titulo`, `sub_titulo`, `conteudo`, `descricao`, `chave`, `flg_ativo`) VALUES
(1, 'Primeito post', 'post de teste', 'bem estou quase concluindo aqui e isso eh apenas um post de teste pra ver se aparece na pagina de forma dinamica.', 'post de teste', 'testando-post', 1),
(2, 'TESTANDO', 'testando de novo', 'ola mundo, eu sou o segundo post de teste', 'so teste mesmo', 'testando-2', 0),
(3, 'Receita de Bolo Trufado', 'Bolo Trufado com chocolate branco', 'olÃ¡ pessoal hoje vou estar ensinando a como fazer um bolo de chocolate trufado... meus amigos essa receita Ã© uma delÃ­cia... sem mais delongas vamos a elas', 'Como fazer bolo trufado', 'bolo-trufado', 0),
(4, 'oib', 'boib', 'oib', 'bj', 'kb', 0),
(5, 'testando', 'biub', 'uibuib', 'uibiu', 'buib', 1),
(6, 'testando', 'biub', 'uibuib', 'uibiu', 'novinha', 0),
(7, 'bub', 'ubyubuy', 'byu', 'byub', 'yub', 0);

-- --------------------------------------------------------

--
-- Table structure for table `textos`
--

CREATE TABLE `textos` (
  `id_texto` int(11) NOT NULL,
  `texto_topo` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `textos`
--

INSERT INTO `textos` (`id_texto`, `texto_topo`) VALUES
(1, 'Casa Grande');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id_img`);

--
-- Indexes for table `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`id_link`);

--
-- Indexes for table `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id_noticia`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id_post`);

--
-- Indexes for table `textos`
--
ALTER TABLE `textos`
  ADD PRIMARY KEY (`id_texto`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id_img` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `links`
--
ALTER TABLE `links`
  MODIFY `id_link` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id_noticia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `textos`
--
ALTER TABLE `textos`
  MODIFY `id_texto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
