-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 28-Maio-2019 às 02:50
-- Versão do servidor: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mywaifu`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `amizade`
--

CREATE TABLE `amizade` (
  `id` int(11) NOT NULL,
  `id_friend` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status` int(20) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `amizade`
--

INSERT INTO `amizade` (`id`, `id_friend`, `id_user`, `status`) VALUES
(27, 3, 2, 2),
(29, 6, 2, 1),
(30, 7, 2, 1),
(32, 7, 1, 1),
(36, 1, 2, 2),
(37, 1, 3, 2),
(38, 5, 6, 2),
(39, 8, 6, 2),
(40, 8, 5, 2),
(41, 5, 7, 2),
(42, 8, 2, 2),
(43, 5, 9, 1),
(44, 6, 9, 1),
(45, 8, 9, 1),
(46, 5, 10, 1),
(47, 3, 11, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `comentario` varchar(1000) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_post` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `comment`
--

INSERT INTO `comment` (`id`, `comentario`, `id_user`, `id_post`) VALUES
(4, 'Hello', 2, 43),
(6, 'Jk, youre such a lame.', 7, 3),
(7, 'hehe', 2, 43),
(9, 'Haha, you\'re so funny...', 5, 3),
(10, 'KAWAI NEEEEE KIRIYU-CHAN S2', 11, 43),
(11, 'Haha', 12, 47);

-- --------------------------------------------------------

--
-- Estrutura da tabela `like_post`
--

CREATE TABLE `like_post` (
  `id` int(11) NOT NULL,
  `cod_post` int(11) NOT NULL,
  `cod_user` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `like_post`
--

INSERT INTO `like_post` (`id`, `cod_post`, `cod_user`, `status`) VALUES
(10, 44, 2, 1),
(13, 43, 2, 1),
(14, 3, 2, 1),
(15, 2, 2, 1),
(16, 3, 5, 1),
(17, 44, 5, 1),
(18, 44, 1, 1),
(19, 44, 3, 1),
(20, 44, 7, 1),
(21, 44, 6, 1),
(22, 44, 8, 1),
(23, 44, 10, 1),
(24, 44, 9, 1),
(26, 44, 11, 1),
(27, 43, 11, 1),
(28, 47, 12, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `user` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `foto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `log`
--

INSERT INTO `log` (`id`, `nome`, `user`, `senha`, `email`, `foto`) VALUES
(1, 'Lucas', 'kol', 'e10adc3949ba59abbe56e057f20f883e', 'eusoulindo@eusei', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQjbwpm9TOEnW07B0FJchctGcq1BJpBWaxD3ExXHMmBffWJv9By'),
(2, 'Joao', 'oregano', 'e10adc3949ba59abbe56e057f20f883e', 'oregano@ebom', 'https://cdn11.bigcommerce.com/s-sq9zkarfah/images/stencil/original/products/73775/152881/Batman-Beyond-Decal-Sticker__03818.1510987714.jpg?c=2&imbypass=on'),
(3, 'kiriyu', 'dragon', 'c1f75cc0f7fe269dd0fd9bd5e24f9586', 'thedragonofdojima@kamuchiro.com', 'https://i.pinimg.com/originals/9d/93/fb/9d93fb66ee15d9f7a9e458f6f26f6898.png'),
(5, 'Bruce Wayne', 'brucew', 'e10adc3949ba59abbe56e057f20f883e', 'bruce@wayne.com', 'https://img.fireden.net/co/image/1448/53/1448531072079.png'),
(6, 'Dick Grayson', 'dickg', 'e10adc3949ba59abbe56e057f20f883e', 'dick@wayne.com', 'http://pm1.narvii.com/6966/95e807ab227e65d12e7f7b6e66bc1635f6c1af23r1-439-512v2_00.jpg'),
(7, 'Selina Kyle', 'selinak', 'e10adc3949ba59abbe56e057f20f883e', 'selina@wayne.com', 'https://66.media.tumblr.com/93a196a3d6911e966f00053106886a55/tumblr_pbco3w43281w2bo0jo3_250.png'),
(8, 'Alfred Pennyworth', 'alfredp', 'e10adc3949ba59abbe56e057f20f883e', 'alfred@wayne.com', 'https://static.comicvine.com/uploads/scale_small/10/100647/6012147-alfred4.jpg'),
(9, 'Jason Todd', 'jasont', 'e10adc3949ba59abbe56e057f20f883e', 'jasont@wayne.com', 'https://upload.wikimedia.org/wikipedia/en/thumb/b/b7/JasonTodd.png/170px-JasonTodd.png'),
(10, 'Talia Al Ghul', 'taliaag', 'e10adc3949ba59abbe56e057f20f883e', 'taliaag@wayne.com', 'https://pbs.twimg.com/profile_images/1103487258697580545/Y6lRZk5k_200x200.jpg'),
(11, 'Majima Goro', 'kyuchan', 'c1f75cc0f7fe269dd0fd9bd5e24f9586', 'themadog@ofshimano.com', 'https://pbs.twimg.com/profile_images/941220826887499782/gyGkdkKC_400x400.jpg'),
(12, 'Tim Drake', 'timd', 'e10adc3949ba59abbe56e057f20f883e', 'tim@wayne.com', 'https://pbs.twimg.com/profile_images/776557964840710144/_7ZBFw8f_400x400.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `postar` varchar(5000) NOT NULL,
  `img` varchar(200) NOT NULL,
  `cod_user` int(11) NOT NULL,
  `data_post` date NOT NULL,
  `likes` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `post`
--

INSERT INTO `post` (`id`, `postar`, `img`, `cod_user`, `data_post`, `likes`) VALUES
(2, 'Love you Selina.', 'https://i.pinimg.com/originals/bc/be/f9/bcbef9d0c8845ff041f8b84cdddd01dc.jpg', 5, '2019-05-18', 0),
(3, 'Sorry Bruce, i had to refuse.', 'https://i.pinimg.com/originals/bc/be/f9/bcbef9d0c8845ff041f8b84cdddd01dc.jpg', 7, '2019-05-18', 0),
(4, 'Larga do meu pÃ© jacarÃ©', 'https://comicnewbies.files.wordpress.com/2015/05/batman-vs-killer-croc-earth-one-1.jpg', 2, '2019-05-18', 0),
(5, 'Master @Bruce: Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incid', 'https://images.pexels.com/photos/556416/pexels-photo-556416.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940', 8, '2019-05-19', 0),
(6, 'Estou me sentindo confiante.', 'https://media1.tenor.com/images/2a0d391675b0bc03400d79b5a6a21137/tenor.gif?itemid=5928205', 2, '2019-05-22', 0),
(7, 'Carai, ontem foi meu aniversario.', 'https://thumbs.gfycat.com/SlowDistantHorseshoecrab-max-1mb.gif', 2, '2019-05-22', 0),
(43, 'Passando a tarde com o neto.', 'https://cdn.vox-cdn.com/thumbor/tE0CPW3LWJDBH0JoKoNekQp2Xp8=/0x0:1280x720/1200x800/filters:focal(538x258:742x462)/cdn.vox-cdn.com/uploads/chorus_image/image/59731143/yakuza_6_baby_5.0.jpg', 3, '2019-05-23', 0),
(44, 'Trabalho feito', 'https://media1.tenor.com/images/5cc7b78430a5037e17ca99d08d5a96b4/tenor.gif?itemid=8536612', 2, '2019-05-27', 0),
(45, 'doko ino yo kiriyu chan???????', 'http://www.gamersheroes.com/wp-content/uploads/2017/08/Yakuza-Kiwami-Majima-Everywhere-Guide-900x506.jpg', 11, '2019-05-27', 0),
(46, '', 'https://i.ytimg.com/vi/81abHmmpk3A/maxresdefault.jpg', 11, '2019-05-27', 0),
(47, 'hey kimi', 'https://66.media.tumblr.com/904420b050837071e480a9bac988cb26/tumblr_inline_pa6kzieut31r8z83a_540.gif', 11, '2019-05-28', 0),
(48, 'teste1', 'https://66.media.tumblr.com/904420b050837071e480a9bac988cb26/tumblr_inline_pa6kzieut31r8z83a_540.gif', 12, '2019-05-28', 0),
(50, 'Realizado', 'https://media1.tenor.com/images/85880c6227d1ab81a2d4971cc50b5cee/tenor.gif', 1, '2019-05-28', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `amizade`
--
ALTER TABLE `amizade`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_friend` (`id_friend`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_post` (`id_post`);

--
-- Indexes for table `like_post`
--
ALTER TABLE `like_post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cod_post` (`cod_post`),
  ADD KEY `cod_user` (`cod_user`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user` (`user`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cod_user` (`cod_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `amizade`
--
ALTER TABLE `amizade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `like_post`
--
ALTER TABLE `like_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `amizade`
--
ALTER TABLE `amizade`
  ADD CONSTRAINT `amizade_id_friend` FOREIGN KEY (`id_friend`) REFERENCES `log` (`id`),
  ADD CONSTRAINT `amizade_id_user` FOREIGN KEY (`id_user`) REFERENCES `log` (`id`);

--
-- Limitadores para a tabela `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `post_comment` FOREIGN KEY (`id_post`) REFERENCES `post` (`id`),
  ADD CONSTRAINT `user_comment` FOREIGN KEY (`id_user`) REFERENCES `log` (`id`);

--
-- Limitadores para a tabela `like_post`
--
ALTER TABLE `like_post`
  ADD CONSTRAINT `like_postagem` FOREIGN KEY (`cod_post`) REFERENCES `post` (`id`),
  ADD CONSTRAINT `like_user` FOREIGN KEY (`cod_user`) REFERENCES `log` (`id`);

--
-- Limitadores para a tabela `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_user` FOREIGN KEY (`cod_user`) REFERENCES `log` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
