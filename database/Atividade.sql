#Habilitar o banco que vai ser usado
use cadastro;

#Selecionando os arquivos da tabela de pessoas
SELECT * FROM tbl_pessoa;

INSERT INTO tbl_pessoa (nome, sobrenome, email, celular)
VALUES ('Teste', 'Teste', 'teste@gmail.com', '1234567890');

describe tbl_pessoa;