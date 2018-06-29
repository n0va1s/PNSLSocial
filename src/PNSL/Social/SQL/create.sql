CREATE TABLE usuario (
   seq_usuario SERIAL PRIMARY KEY, 
   nom_usuario INT NOT NULL,
   pwd_usuario VARCHAR(50) NOT NULL
);

CREATE TABLE tipo_deficiencia (
   seq_tipo_deficiencia SERIAL PRIMARY KEY, 
   des_tipo_deficiencia VARCHAR(255) NOT NULL,
);

CREATE TABLE tipo_acao (
   seq_tipo_acao SERIAL PRIMARY KEY,
   des_tipo_acao VARCHAR(255) NOT NULL
);

CREATE TABLE pessoa (
   seq_pessoa SERIAL PRIMARY KEY,
   nom_pessoa VARCHAR(255) NOT NULL, 
   tip_sexo CHAR(1) NOT NULL, 
   dat_nascimento DATE NOT NULL,
   num_rg VARCHAR(15),
   num_cpf VARCHAR(15),
   des_naturalidade VARCHAR(50),
   seq_tipo_deficiencia INT,
   nom_usuario INT NOT NULL,
   dat_log DATE NOT NULL,
   FOREIGN KEY (seq_tipo_deficiencia) REFERENCES tipo_deficiencia (seq_tipo_deficiencia)
);

CREATE TABLE contato (
   seq_contato SERIAL PRIMARY KEY,
   seq_pessoa INT NOT NULL,
   tip_contato CHAR(1) NOT NULL, 
   des_contato VARCHAR(100) NOT NULL, 
   FOREIGN KEY (seq_pessoa) REFERENCES pessoa (seq_pessoa) ON DELETE CASCADE
);

CREATE TABLE endereco (
   seq_pessoa SERIAL PRIMARY KEY,
   des_logradouro VARCHAR(255) NOT NULL,
   des_bairro VARCHAR(100) NOT NULL, 
   des_cidade VARCHAR(100) NOT NULL, 
   FOREIGN KEY (seq_pessoa) REFERENCES pessoa (seq_pessoa) ON DELETE CASCADE
);

CREATE TABLE voluntario (
   seq_voluntario SERIAL PRIMARY KEY,
   nom_profissao VARCHAR(255) NOT NULL,
   tip_estado_civil CHAR(1) NOT NULL,
   ind_termo CHAR(1) NOT NULL,
   FOREIGN KEY (seq_voluntario) REFERENCES pessoa (seq_pessoa) ON DELETE CASCADE
);


CREATE TABLE responsavel (
   seq_responsavel SERIAL PRIMARY KEY,
   tip_parentesco CHAR(1) NOT NULL,
   ind_trabalha CHAR(1) NOT NULL,
   ind_termo_imagem CHAR(1) NOT NULL,
   ind_termo_sair_sozinho CHAR(1) NOT NULL,
   FOREIGN KEY (seq_responsavel) REFERENCES pessoa (seq_pessoa) ON DELETE CASCADE
);

CREATE TABLE menor (
   seq_menor SERIAL PRIMARY KEY,
   ind_estudante CHAR(1) NOT NULL,
   nom_escola VARCHAR(100),
   num_ano SMALLINT,
   tip_turno CHAR(1),
   tip_grau CHAR(1),                     
   ind_sair_sozinho CHAR(1) NOT NULL,
   FOREIGN KEY (seq_menor) REFERENCES pessoa (seq_pessoa) ON DELETE CASCADE
);

CREATE TABLE acao (
   seq_acao SERIAL PRIMARY KEY,
   seq_voluntario INT NOT NULL,
   nom_acao VARCHAR(255) NOT NULL,
   seq_tipo_acao INT NOT NULL,
   dat_inicio DATE NOT NULL,
   dat_termino DATE,
   des_acao TEXT NOT NULL, 
   nom_usuario INT NOT NULL,
   dat_log DATE NOT NULL,
   FOREIGN KEY (seq_voluntario) REFERENCES pessoa (seq_pessoa),
   FOREIGN KEY (seq_tipo_acao) REFERENCES tipo_acao (seq_tipo_acao)
);

CREATE TABLE atendimento (
   seq_acao INT NOT NULL,
   seq_voluntario INT NOT NULL,
   seq_responsavel INT,
   seq_menor INT,
   dat_atendimento DATE NOT NULL,
   des_atendimento TEXT NOT NULL,
   nom_usuario INT NOT NULL,
   dat_log DATE NOT NULL,
   PRIMARY KEY(seq_acao, seq_voluntario, dat_atendimento),
   FOREIGN KEY (seq_voluntario) REFERENCES voluntario (seq_voluntario),
   FOREIGN KEY (seq_responsavel) REFERENCES responsavel (seq_responsavel),
   FOREIGN KEY (seq_menor) REFERENCES menor (seq_menor)
);
