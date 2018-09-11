INSERT INTO pessoa(nom_pessoa, tip_genero, dat_nascimento, num_rg, num_cpf, des_naturalidade, tip_pessoa, usu_inc, dat_inc, usu_alt, dat_alt) 
VALUES ('Joao Paulo Cirino Silva de Novais','M','1980-07-01','1860116','85236250110','Brasilia','V','n0va1s',now(),'n0va1s',now());
INSERT INTO pessoa(nom_pessoa, tip_genero, dat_nascimento, num_rg, num_cpf, des_naturalidade, tip_pessoa, usu_inc, dat_inc, usu_alt, dat_alt) 
VALUES ('Isabela Vieira Patrocinio de Araujo','F','1980-09-14','171153','87182670178','Brasilia','V','n0va1s',now(),'n0va1s',now());
INSERT INTO pessoa(nom_pessoa, tip_genero, dat_nascimento, num_rg, num_cpf, des_naturalidade, tip_pessoa, usu_inc, dat_inc, usu_alt, dat_alt) 
VALUES ('Joao Pedro Pires de Novais','M','2009-03-15','111222','12312312312','Brasilia','M','n0va1s',now(),'n0va1s',now());
INSERT INTO pessoa(nom_pessoa, tip_genero, dat_nascimento, num_rg, num_cpf, des_naturalidade, tip_pessoa, usu_inc, dat_inc, usu_alt, dat_alt) 
VALUES ('Beltrano da Silva','M','1971-03-15','111222','12312312312','Brasilia','M','n0va1s',now(),'n0va1s',now());
INSERT INTO pessoa(nom_pessoa, tip_genero, dat_nascimento, num_rg, num_cpf, des_naturalidade, tip_pessoa, usu_inc, dat_inc, usu_alt, dat_alt) 
VALUES ('Fulana de tal','F','1985-03-15','111222','12312312312','Brasilia','M','n0va1s',now(),'n0va1s',now());

INSERT INTO usuario(nom_usuario, pwd_usuario, seq_pessoa, dat_criacao, dat_atualizacao) 
VALUES ('n0va1s','linux1', 1, now(),now());
INSERT INTO usuario(nom_usuario, pwd_usuario, seq_pessoa, dat_criacao, dat_atualizacao) 
VALUES ('admin','admin', 2, now(),now());

INSERT INTO endereco(seq_pessoa, des_logradouro, des_bairro, des_cidade, sig_uf, usu_inc, dat_inc, usu_alt, dat_alt) 
VALUES (1, 'SHIN CA 02 Bloco A Entrada B Apt 201','Lago Norte','Brasilia', 'DF', 'n0va1s',now(),'n0va1s',now());
INSERT INTO endereco(seq_pessoa, des_logradouro, des_bairro, des_cidade, sig_uf, usu_inc, dat_inc, usu_alt, dat_alt) 
VALUES (2, 'SHIN CA 02 Bloco A Entrada B Apt 201','Lago Norte','Brasilia','DF', 'n0va1s',now(),'n0va1s',now());
INSERT INTO endereco(seq_pessoa, des_logradouro, des_bairro, des_cidade, sig_uf, usu_inc, dat_inc, usu_alt, dat_alt) 
VALUES (3, 'Condominio Mansoes Entre Lagos Etapa 2 Conjunto P Casa 22','Regiao dos Lagos','Sobradinho','DF', 'n0va1s',now(),'n0va1s',now());
INSERT INTO endereco(seq_pessoa, des_logradouro, des_bairro, des_cidade, sig_uf, usu_inc, dat_inc, usu_alt, dat_alt) 
VALUES (4, 'Endereco do dentista','Bairro','Cidade','DF', 'n0va1s',now(),'n0va1s',now());
INSERT INTO endereco(seq_pessoa, des_logradouro, des_bairro, des_cidade, sig_uf, usu_inc, dat_inc, usu_alt, dat_alt) 
VALUES (5, 'Endereco da advogada','Bairro','Cidade','DF', 'n0va1s',now(),'n0va1s',now());

INSERT INTO voluntario(seq_pessoa,nom_profissao, tip_estado_civil, ind_assinou_termo, usu_inc, dat_inc, usu_alt, dat_alt) 
VALUES (1,'Analista de Sistemas','D','S','n0va1s',now(),'n0va1s',now());
INSERT INTO voluntario(seq_pessoa, nom_profissao, tip_estado_civil, ind_assinou_termo, usu_inc, dat_inc, usu_alt, dat_alt) 
VALUES (2,'Gestora de Projetos','D','N','n0va1s',now(),'n0va1s',now());
INSERT INTO voluntario(seq_pessoa, nom_profissao, tip_estado_civil, ind_assinou_termo, usu_inc, dat_inc, usu_alt, dat_alt) 
VALUES (4,'Dentista','C','S','n0va1s',now(),'n0va1s',now());
INSERT INTO voluntario(seq_pessoa, nom_profissao, tip_estado_civil, ind_assinou_termo, usu_inc, dat_inc, usu_alt, dat_alt) 
VALUES (5,'Advogado','S','S','n0va1s',now(),'n0va1s',now());

INSERT INTO responsavel(seq_pessoa, tip_parentesco, ind_empregado, ind_termo_imagem, ind_autorizou_sair_sozinho, usu_inc, dat_inc, usu_alt, dat_alt) 
VALUES (1,'P','S','S','N','n0va1s',now(),'n0va1s',now());

INSERT INTO menor(seq_pessoa, seq_responsavel, nom_escola, num_ano, tip_turno, tip_grau, ind_pode_sair_sozinho, usu_inc, dat_inc, usu_alt, dat_alt) 
VALUES (3,1,'Instituto Sao Jose',7,'V',1,'N','n0va1s',now(),'n0va1s',now());

INSERT INTO contato(seq_pessoa, tip_contato, des_contato, usu_inc, dat_inc, usu_alt, dat_alt) 
VALUES (1, 'm', 'jp.pessoal@gmail.com','n0va1s',now(),'n0va1s',now());
INSERT INTO contato(seq_pessoa, tip_contato, des_contato, usu_inc, dat_inc, usu_alt, dat_alt) 
VALUES (1, 'c', '61981546988','n0va1s',now(),'n0va1s',now());
INSERT INTO contato(seq_pessoa, tip_contato, des_contato, usu_inc, dat_inc, usu_alt, dat_alt) 
VALUES (2, 'm', 'isapatrocinio@gmail.com','n0va1s',now(),'n0va1s',now());
INSERT INTO contato(seq_pessoa, tip_contato, des_contato, usu_inc, dat_inc, usu_alt, dat_alt) 
VALUES (2, 'c', '61991910977','n0va1s',now(),'n0va1s',now());
INSERT INTO contato(seq_pessoa, tip_contato, des_contato, usu_inc, dat_inc, usu_alt, dat_alt) 
VALUES (3, 'm', 'joaopedronovais@gmail.com','n0va1s',now(),'n0va1s',now());
INSERT INTO contato(seq_pessoa, tip_contato, des_contato, usu_inc,, dat_inc, usu_alt, dat_alt) 
VALUES (3, 'c', '61999998888','n0va1s',now(),'n0va1s',now());

INSERT INTO acao(seq_voluntario, nom_acao, tip_frequencia, dia_semana, tip_turno, ano_mes_inicio, ano_mes_termino, txt_acao, usu_inc, dat_inc, usu_alt, dat_alt) 
VALUES (1,'LabHacker do Bem','S', 'Sab','M','2017-12-01',null,'Nosso proposito é mudar o mundo','n0va1s',now(),'n0va1s',now());
INSERT INTO acao(seq_voluntario, nom_acao, tip_frequencia, dia_semana, tip_turno, ano_mes_inicio, ano_mes_termino, txt_acao, usu_inc, dat_inc, usu_alt, dat_alt) 
VALUES (2,'Transformanca','S', 'Sab','M','2016-11-01',null,'Nosso proposito é empoderar as meninas pela danca','n0va1s',now(),'n0va1s',now());
INSERT INTO acao(seq_voluntario, nom_acao, tip_frequencia, dia_semana, tip_turno, ano_mes_inicio, ano_mes_termino, txt_acao, usu_inc, dat_inc, usu_alt, dat_alt) 
VALUES (4,'Boca limpa','Q', 'Sex','N','2015-01-01',null,'Saude bucal do Varjao','n0va1s',now(),'n0va1s',now());
INSERT INTO acao(seq_voluntario, nom_acao, tip_frequencia, dia_semana, tip_turno, ano_mes_inicio, ano_mes_termino, txt_acao, usu_inc, dat_inc, usu_alt, dat_alt) 
VALUES (5,'Justica social','M', 'Seg','N','2016-09-01',null,'Resolver conflitos e gerar paz','n0va1s',now(),'n0va1s',now());

INSERT INTO atendimento(seq_acao, seq_atendido, dat_atendimento, txt_atendimento, usu_inc, dat_inc, usu_alt, dat_alt) 
VALUES (3,1,now(),'Neste atendimento o paciente...','n0va1s',now(),'n0va1s',now());
INSERT INTO atendimento(seq_acao, seq_atendido, dat_atendimento, txt_atendimento, usu_inc, dat_inc, usu_alt, dat_alt) 
VALUES (3,2,now(),'Neste atendimento o reclamante...','n0va1s',now(),'n0va1s',now());
INSERT INTO atendimento(seq_acao, seq_atendido, dat_atendimento, txt_atendimento, usu_inc, dat_inc, usu_alt, dat_alt) 
VALUES (4,2,now(),'Neste atendimento a paciente...','n0va1s',now(),'n0va1s',now());
INSERT INTO atendimento(seq_acao, seq_atendido, dat_atendimento, txt_atendimento, usu_inc, dat_inc, usu_alt, dat_alt) 
VALUES (4,3,now(),'Neste atendimento a reclamante...','n0va1s',now(),'n0va1s',now());

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
#Estado Civil
INSERT INTO tipo(des_tipo,grp_tipo) VALUES ('Solteiro(a)','CIV');
INSERT INTO tipo(des_tipo,grp_tipo) VALUES ('Casado(a)','CIV');
INSERT INTO tipo(des_tipo,grp_tipo) VALUES ('Divorciado(a)','CIV');
INSERT INTO tipo(des_tipo,grp_tipo) VALUES ('União Estável','CIV');
INSERT INTO tipo(des_tipo,grp_tipo) VALUES ('Viúvo(a)','CIV');
#Sexo
INSERT INTO tipo(des_tipo,grp_tipo) VALUES ('M','SEX');
INSERT INTO tipo(des_tipo,grp_tipo) VALUES ('F','SEX');
#Tipos de telefone
INSERT INTO tipo(des_tipo,grp_tipo) VALUES ('Celular','FON');
INSERT INTO tipo(des_tipo,grp_tipo) VALUES ('Fixo','FON');
INSERT INTO tipo(des_tipo,grp_tipo) VALUES ('Recado','FON');
#Tipos de pessoa
INSERT INTO tipo(des_tipo,grp_tipo) VALUES ('Voluntário','PES');
INSERT INTO tipo(des_tipo,grp_tipo) VALUES ('Usuário','PES');
#Parentesco
INSERT INTO tipo(des_tipo,grp_tipo) VALUES ('Pai','PRT');
INSERT INTO tipo(des_tipo,grp_tipo) VALUES ('Mãe','PRT');
INSERT INTO tipo(des_tipo,grp_tipo) VALUES ('Avó','PRT');
INSERT INTO tipo(des_tipo,grp_tipo) VALUES ('Avô','PRT');
INSERT INTO tipo(des_tipo,grp_tipo) VALUES ('Tio','PRT');
INSERT INTO tipo(des_tipo,grp_tipo) VALUES ('Tia','PRT');
INSERT INTO tipo(des_tipo,grp_tipo) VALUES ('Tutor','PRT');
INSERT INTO tipo(des_tipo,grp_tipo) VALUES ('Tutora','PRT');
INSERT INTO tipo(des_tipo,grp_tipo) VALUES ('Padrinho','PRT');
INSERT INTO tipo(des_tipo,grp_tipo) VALUES ('Madrinha','PRT');
#Turno
INSERT INTO tipo(des_tipo,grp_tipo) VALUES ('Matutino','TRN');
INSERT INTO tipo(des_tipo,grp_tipo) VALUES ('Vespertino','TRN');
INSERT INTO tipo(des_tipo,grp_tipo) VALUES ('Noturno','TRN');
INSERT INTO tipo(des_tipo,grp_tipo) VALUES ('Integral','TRN');
#Grau
INSERT INTO tipo(des_tipo,grp_tipo) VALUES ('1º','GRA');
INSERT INTO tipo(des_tipo,grp_tipo) VALUES ('2º','GRA');
INSERT INTO tipo(des_tipo,grp_tipo) VALUES ('3º','GRA');
#UF
INSERT INTO tipo(des_tipo,grp_tipo) VALUES ('AC','UF');
INSERT INTO tipo(des_tipo,grp_tipo) VALUES ('AL','UF');
INSERT INTO tipo(des_tipo,grp_tipo) VALUES ('AM','UF');
INSERT INTO tipo(des_tipo,grp_tipo) VALUES ('AP','UF');
INSERT INTO tipo(des_tipo,grp_tipo) VALUES ('BA','UF');
INSERT INTO tipo(des_tipo,grp_tipo) VALUES ('CE','UF');
INSERT INTO tipo(des_tipo,grp_tipo) VALUES ('DF','UF');
INSERT INTO tipo(des_tipo,grp_tipo) VALUES ('ES','UF');
INSERT INTO tipo(des_tipo,grp_tipo) VALUES ('GO','UF');
INSERT INTO tipo(des_tipo,grp_tipo) VALUES ('MA','UF');
INSERT INTO tipo(des_tipo,grp_tipo) VALUES ('MG','UF');
INSERT INTO tipo(des_tipo,grp_tipo) VALUES ('MS','UF');
INSERT INTO tipo(des_tipo,grp_tipo) VALUES ('MT','UF');
INSERT INTO tipo(des_tipo,grp_tipo) VALUES ('PA','UF');
INSERT INTO tipo(des_tipo,grp_tipo) VALUES ('PB','UF');
INSERT INTO tipo(des_tipo,grp_tipo) VALUES ('PE','UF');
INSERT INTO tipo(des_tipo,grp_tipo) VALUES ('PI','UF');
INSERT INTO tipo(des_tipo,grp_tipo) VALUES ('PR','UF');
INSERT INTO tipo(des_tipo,grp_tipo) VALUES ('RJ','UF');
INSERT INTO tipo(des_tipo,grp_tipo) VALUES ('RN','UF');
INSERT INTO tipo(des_tipo,grp_tipo) VALUES ('RO','UF');
INSERT INTO tipo(des_tipo,grp_tipo) VALUES ('RR','UF');
INSERT INTO tipo(des_tipo,grp_tipo) VALUES ('RS','UF');
INSERT INTO tipo(des_tipo,grp_tipo) VALUES ('SC','UF');
INSERT INTO tipo(des_tipo,grp_tipo) VALUES ('SE','UF');
INSERT INTO tipo(des_tipo,grp_tipo) VALUES ('SP','UF');
INSERT INTO tipo(des_tipo,grp_tipo) VALUES ('TO','UF');
#Tipo de acao
INSERT INTO tipo(des_tipo,grp_tipo) VALUES ('Individual','TPA');
INSERT INTO tipo(des_tipo,grp_tipo) VALUES ('Grupo','TPA');
#Publico-alvo
INSERT INTO tipo(des_tipo,grp_tipo) VALUES ('Masculino','PUB');
INSERT INTO tipo(des_tipo,grp_tipo) VALUES ('Feminino','PUB');
INSERT INTO tipo(des_tipo,grp_tipo) VALUES ('Ambos','PUB');
#Faixa-etaria
INSERT INTO tipo(des_tipo,grp_tipo) VALUES ('Infantil (6 a 11 anos) ','ETA');
INSERT INTO tipo(des_tipo,grp_tipo) VALUES ('Adolescente (12 a 17 anos)','ETA');
INSERT INTO tipo(des_tipo,grp_tipo) VALUES ('Jovem (18 a 23 anos)','ETA');
INSERT INTO tipo(des_tipo,grp_tipo) VALUES ('Adulto (> 24 anos)','ETA');
INSERT INTO tipo(des_tipo,grp_tipo) VALUES ('Todas as idades','ETA');
#Semana
INSERT INTO tipo(des_tipo,grp_tipo) VALUES ('Segunda','SEM');
INSERT INTO tipo(des_tipo,grp_tipo) VALUES ('Terça','SEM');
INSERT INTO tipo(des_tipo,grp_tipo) VALUES ('Quarta ','SEM');
INSERT INTO tipo(des_tipo,grp_tipo) VALUES ('Quinta','SEM');
INSERT INTO tipo(des_tipo,grp_tipo) VALUES ('Sexta','SEM');
INSERT INTO tipo(des_tipo,grp_tipo) VALUES ('Sábado','SEM');
INSERT INTO tipo(des_tipo,grp_tipo) VALUES ('Domingo','SEM');
