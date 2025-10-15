
--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `datanascimento` varchar(50) NOT NULL,
  `estado` varchar(100) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `rua` varchar(150) NOT NULL,
  `cep` varchar(10) NOT NULL,
  `numero` varchar(6) NOT NULL,
  `telefone` varchar(25) NOT NULL,
  `senha` varchar(50) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome`, `email`, `datanascimento`, `estado`, `cidade`, `rua`, `cep`, `numero`, `telefone`, `senha`) 
VALUES (NULL, 'Emanuel Martins', 'emanuelif@gmail.com', '20/06/2008', 'RS', 'Erval-Seco', 'Av. Davi Figueiredo', '98700-000', '1055', '55999893393', '5b1e70854847c9e05f8359105e52adaa');
