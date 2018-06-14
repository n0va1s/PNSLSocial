INSERT INTO tipo_contato(des_tipo_contato) VALUES ('Email');
INSERT INTO tipo_contato(des_tipo_contato) VALUES ('Celular');
INSERT INTO tipo_contato(des_tipo_contato) VALUES ('Residencial');
INSERT INTO tipo_contato(des_tipo_contato) VALUES ('Recado');

INSERT INTO usuario(nom_usuario, pwd_usuario, dat_criacao, dat_atualizacao) 
VALUES ('n0va1s','linux1',now(),now());
INSERT INTO usuario(nom_usuario, pwd_usuario, dat_criacao, dat_atualizacao) 
VALUES ('admin','admin',now(),now());

INSERT INTO endereco(des_logradouro, des_bairro, des_cidade, usu_inc, dat_inc, usu_alt, dat_alt) 
VALUES ('SHIN CA 02 Bloco A Entrada B Apt 201','Lago Norte','Brasilia','n0va1s',now(),'n0va1s',now());
INSERT INTO endereco(des_logradouro, des_bairro, des_cidade, usu_inc, dat_inc, usu_alt, dat_alt) 
VALUES ('SHIN CA 02 Bloco A Entrada B Apt 201','Lago Norte','Brasilia','n0va1s',now(),'n0va1s',now());
INSERT INTO endereco(des_logradouro, des_bairro, des_cidade, usu_inc, dat_inc, usu_alt, dat_alt) 
VALUES ('Condominio Mansoes Entre Lagos Etapa 2 Conjunto P Casa 22','Regiao dos Lagos','Sobradinho','n0va1s',now(),'n0va1s',now());
INSERT INTO endereco(des_logradouro, des_bairro, des_cidade, usu_inc, dat_inc, usu_alt, dat_alt) 
VALUES ('Endereco do dentista','Bairro','Cidade','n0va1s',now(),'n0va1s',now());
INSERT INTO endereco(des_logradouro, des_bairro, des_cidade, usu_inc, dat_inc, usu_alt, dat_alt) 
VALUES ('Endereco da advogada','Bairro','Cidade','n0va1s',now(),'n0va1s',now());

INSERT INTO pessoa(seq_endereco, nom_pessoa, tip_genero, dat_nascimento, num_rg, num_cpf, des_naturalidade, tip_pessoa, usu_inc, dat_inc, usu_alt, dat_alt) 
VALUES (1,'Joao Paulo Cirino Silva de Novais','M','1980-07-01','1860116','85236250110','Brasilia','V','n0va1s',now(),'n0va1s',now());
INSERT INTO pessoa(seq_endereco, nom_pessoa, tip_genero, dat_nascimento, num_rg, num_cpf, des_naturalidade, tip_pessoa, usu_inc, dat_inc, usu_alt, dat_alt) 
VALUES (2,'Isabela Vieira Patrocinio de Araujo','F','1980-09-14','171153','87182670178','Brasilia','V','n0va1s',now(),'n0va1s',now());
INSERT INTO pessoa(seq_endereco, nom_pessoa, tip_genero, dat_nascimento, num_rg, num_cpf, des_naturalidade, tip_pessoa, usu_inc, dat_inc, usu_alt, dat_alt) 
VALUES (3,'Joao Pedro Pires de Novais','M','2009-03-15','111222','12312312312','Brasilia','M','n0va1s',now(),'n0va1s',now());
INSERT INTO pessoa(seq_endereco, nom_pessoa, tip_genero, dat_nascimento, num_rg, num_cpf, des_naturalidade, tip_pessoa, usu_inc, dat_inc, usu_alt, dat_alt) 
VALUES (4,'Beltrano da Silva','M','1971-03-15','111222','12312312312','Brasilia','M','n0va1s',now(),'n0va1s',now());
INSERT INTO pessoa(seq_endereco, nom_pessoa, tip_genero, dat_nascimento, num_rg, num_cpf, des_naturalidade, tip_pessoa, usu_inc, dat_inc, usu_alt, dat_alt) 
VALUES (5,'Fulana de tal','F','1985-03-15','111222','12312312312','Brasilia','M','n0va1s',now(),'n0va1s',now());

INSERT INTO voluntario(seq_pessoa,nom_profissao, tip_estado_civil, ind_assinou_termo) 
VALUES (1,'Analista de Sistemas','D','S');
INSERT INTO voluntario(seq_pessoa, nom_profissao, tip_estado_civil, ind_assinou_termo) 
VALUES (2,'Gestora de Projetos','D','N');
INSERT INTO voluntario(seq_pessoa, nom_profissao, tip_estado_civil, ind_assinou_termo) 
VALUES (5,'Dentista','C','S');
INSERT INTO voluntario(seq_pessoa, nom_profissao, tip_estado_civil, ind_assinou_termo) 
VALUES (6,'Advogado','S','S');

INSERT INTO responsavel(seq_pessoa, tip_parentesco, ind_empregado, ind_termo_imagem, ind_autorizou_sair_sozinho, usu_inc, dat_inc, usu_alt, dat_alt) 
VALUES (1,'P','S','S','N','n0va1s',now(),'n0va1s',now());

INSERT INTO menor(seq_pessoa, seq_responsavel, nom_escola, num_ano, tip_turno, tip_grau, ind_pode_sair_sozinho, usu_inc, dat_inc, usu_alt, dat_alt) 
VALUES (3,1,'Instituto Sao Jose',7,'V',1,'N','n0va1s',now(),'n0va1s',now());

INSERT INTO contato(seq_tipo_contato, seq_pessoa, des_contato) VALUES (1, 1, 'jp.pessoal@gmail.com');
INSERT INTO contato(seq_tipo_contato, seq_pessoa, des_contato) VALUES (2, 1, '61981546988');
--INSERT INTO contato(seq_tipo_contato, seq_pessoa, des_contato) VALUES (1, 2, 'isapatrocinio@gmail.com');
--INSERT INTO contato(seq_tipo_contato, seq_pessoa, des_contato) VALUES (2, 2, '61991910977');
--INSERT INTO contato(seq_tipo_contato, seq_pessoa, des_contato) VALUES (1, 3, 'joaopedronovais@gmail.com');
--INSERT INTO contato(seq_tipo_contato, seq_pessoa, des_contato) VALUES (2, 3, '61999998888');

INSERT INTO acao(seq_voluntario, nom_acao, tip_frequencia, dia_semana, tip_turno, ano_mes_inicio, ano_mes_termino, txt_acao, usu_inc, dat_inc, usu_alt, dat_alt) 
VALUES (1,'LabHacker do Bem','S', 'Sab','M','2017-12-01',null,'Nosso proposito é mudar o mundo','n0va1s',now(),'n0va1s',now());
INSERT INTO acao(seq_voluntario, nom_acao, tip_frequencia, dia_semana, tip_turno, ano_mes_inicio, ano_mes_termino, txt_acao, usu_inc, dat_inc, usu_alt, dat_alt) 
VALUES (2,'Transformanca','S', 'Sab','M','2016-11-01',null,'Nosso proposito é empoderar as meninas pela danca','n0va1s',now(),'n0va1s',now());
INSERT INTO acao(seq_voluntario, nom_acao, tip_frequencia, dia_semana, tip_turno, ano_mes_inicio, ano_mes_termino, txt_acao, usu_inc, dat_inc, usu_alt, dat_alt) 
VALUES (5,'Boca limpa','Q', 'Sex','N','2015-01-01',null,'Saude bucal do Varjao','n0va1s',now(),'n0va1s',now());
INSERT INTO acao(seq_voluntario, nom_acao, tip_frequencia, dia_semana, tip_turno, ano_mes_inicio, ano_mes_termino, txt_acao, usu_inc, dat_inc, usu_alt, dat_alt) 
VALUES (6,'Justica social','M', 'Seg','N','2016-09-01',null,'Resolver conflitos e gerar paz','n0va1s',now(),'n0va1s',now());

INSERT INTO atendimento(seq_acao, seq_atendido, dat_atendimento, txt_atendimento) 
VALUES (6,1,now(),'Neste atendimento o paciente...');
INSERT INTO atendimento(seq_acao, seq_atendido, dat_atendimento, txt_atendimento) 
VALUES (7,1,now(),'Neste atendimento o reclamante...');
INSERT INTO atendimento(seq_acao, seq_atendido, dat_atendimento, txt_atendimento) 
VALUES (6,2,now(),'Neste atendimento a paciente...');
INSERT INTO atendimento(seq_acao, seq_atendido, dat_atendimento, txt_atendimento) 
VALUES (7,2,now(),'Neste atendimento a reclamante...');

INSERT INTO turma(seq_acao, des_turma, dat_inicio, dat_termino, usu_inc, dat_inc, usu_alt, dat_alt) 
VALUES (1,'Turma 01','2017-01-01',null,'n0va1s',now(),'n0va1s',now());
INSERT INTO turma(seq_acao, des_turma, dat_inicio, dat_termino, usu_inc, dat_inc, usu_alt, dat_alt) 
VALUES (2,'Turma 08-12','2016-11-01',null,'n0va1s',now(),'n0va1s',now());
INSERT INTO turma(seq_acao, des_turma, dat_inicio, dat_termino, usu_inc, dat_inc, usu_alt, dat_alt) 
VALUES (2,'Turma 13-18','2016-11-01',null,'n0va1s',now(),'n0va1s',now());

INSERT INTO frequencia(seq_turma, seq_atendido, dat_frequencia, ind_presenca, ind_inativo, usu_inc, dat_inc, usu_alt, dat_alt) 
VALUES (1,3,'2018-01-20','P','N','n0va1s',now(),'n0va1s',now());
INSERT INTO frequencia(seq_turma, seq_atendido, dat_frequencia, ind_presenca, ind_inativo, usu_inc, dat_inc, usu_alt, dat_alt) 
VALUES (1,3,'2018-01-27','P','N','n0va1s',now(),'n0va1s',now());
INSERT INTO frequencia(seq_turma, seq_atendido, dat_frequencia, ind_presenca, ind_inativo, usu_inc, dat_inc, usu_alt, dat_alt) 
VALUES (1,3,'2018-02-05','F','N','n0va1s',now(),'n0va1s',now());
INSERT INTO frequencia(seq_turma, seq_atendido, dat_frequencia, ind_presenca, ind_inativo, usu_inc, dat_inc, usu_alt, dat_alt) 
VALUES (1,3,'2018-02-12','P','N','n0va1s',now(),'n0va1s',now());
INSERT INTO frequencia(seq_turma, seq_atendido, dat_frequencia, ind_presenca, ind_inativo, usu_inc, dat_inc, usu_alt, dat_alt) 
VALUES (1,3,'2018-02-19','P','N','n0va1s',now(),'n0va1s',now());
INSERT INTO frequencia(seq_turma, seq_atendido, dat_frequencia, ind_presenca, ind_inativo, usu_inc, dat_inc, usu_alt, dat_alt) 
VALUES (1,3,'2018-02-26','F','N','n0va1s',now(),'n0va1s',now());