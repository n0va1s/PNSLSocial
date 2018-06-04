CREATE TABLE usuario (
   seq_usuario INT AUTO_INCREMENT NOT NULL, 
   nom_usuario INT NOT NULL,
   pwd_usuario VARCHAR(50) NOT NULL,
   PRIMARY KEY(seq_usuario)
)ENGINE=InnoDB AUTO_INCREMENT=2096 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE tipo_deficiencia (
   seq_tipo_deficiencia INT AUTO_INCREMENT NOT NULL, 
   des_tipo_deficiencia VARCHAR(255) NOT NULL,
   PRIMARY KEY(seq_tipo_deficiencia)
)ENGINE=InnoDB AUTO_INCREMENT=2096 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE tipo_acao (
   seq_tipo_acao INT AUTO_INCREMENT NOT NULL, 
   des_tipo_acao VARCHAR(255) NOT NULL,
   PRIMARY KEY(seq_tipo_acao)
)ENGINE=InnoDB AUTO_INCREMENT=2096 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE pessoa (
   seq_pessoa INT AUTO_INCREMENT NOT NULL, 
   nom_pessoa VARCHAR(255) NOT NULL, 
   tip_sexo CHAR(1) NOT NULL, 
   dat_nascimento DATE NOT NULL,
   num_rg VARCHAR(15),
   num_cpf VARCHAR(15),
   des_naturalidade VARCHAR(50),
   seq_tipo_deficiencia INT,
   seq_usuario INT NOT NULL,
   dat_log DATE NOT NULL,
   PRIMARY KEY(seq_pessoa),
   FOREIGN KEY (seq_tipo_deficiencia) REFERENCES tipo_deficiencia (seq_tipo_deficiencia),
   FOREIGN KEY (seq_usuario) REFERENCES usuario (seq_usuario)
)ENGINE=InnoDB AUTO_INCREMENT=2096 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE contato (
   seq_contato INT AUTO_INCREMENT NOT NULL, 
   seq_pessoa INT NOT NULL,
   tip_contato CHAR(1) NOT NULL, 
   des_contato VARCHAR(100) NOT NULL, 
   PRIMARY KEY(seq_contato),
   FOREIGN KEY (seq_pessoa) REFERENCES pessoa (seq_pessoa) ON DELETE CASCADE
)ENGINE=InnoDB AUTO_INCREMENT=2096 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE endereco (
   seq_pessoa INT NOT NULL, 
   des_logradouro VARCHAR(255) NOT NULL,
   des_bairro VARCHAR(100) NOT NULL, 
   des_cidade VARCHAR(100) NOT NULL, 
   PRIMARY KEY(seq_pessoa),
   FOREIGN KEY (seq_pessoa) REFERENCES pessoa (seq_pessoa) ON DELETE CASCADE
)ENGINE=InnoDB AUTO_INCREMENT=2096 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE voluntario (
   seq_voluntario INT NOT NULL, 
   nom_profissao VARCHAR(255) NOT NULL,
   tip_estado_civil CHAR(1) NOT NULL,
   ind_termo CHAR(1) NOT NULL,
   PRIMARY KEY(seq_voluntario),
   FOREIGN KEY (seq_voluntario) REFERENCES pessoa (seq_pessoa) ON DELETE CASCADE
)ENGINE=InnoDB AUTO_INCREMENT=2096 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE responsavel (
   seq_responsavel INT NOT NULL, 
   tip_parentesco CHAR(1) NOT NULL,
   ind_trabalha CHAR(1) NOT NULL,
   ind_termo_imagem CHAR(1) NOT NULL,
   ind_termo_sair_sozinho CHAR(1) NOT NULL,
   PRIMARY KEY(seq_responsavel),
   FOREIGN KEY (seq_responsavel) REFERENCES pessoa (seq_pessoa) ON DELETE CASCADE
)ENGINE=InnoDB AUTO_INCREMENT=2096 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE menor (
   seq_menor INT NOT NULL, 
   ind_estudante CHAR(1) NOT NULL,
   nom_escola VARCHAR(100),
   num_ano SMALLINT,
   tip_turno CHAR(1),
   tip_grau CHAR(1),                     
   ind_sair_sozinho CHAR(1) NOT NULL,
   PRIMARY KEY(seq_menor),
   FOREIGN KEY (seq_menor) REFERENCES pessoa (seq_pessoa) ON DELETE CASCADE
)ENGINE=InnoDB AUTO_INCREMENT=2096 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE acao (
   seq_acao INT AUTO_INCREMENT NOT NULL, 
   seq_voluntario INT NOT NULL,
   nom_acao VARCHAR(255) NOT NULL,
   seq_tipo_acao INT NOT NULL,
   dat_inicio DATE NOT NULL,
   dat_termino DATE,
   des_acao TEXT NOT NULL, 
   seq_usuario INT NOT NULL,
   dat_log DATE NOT NULL,
   PRIMARY KEY(seq_acao),
   FOREIGN KEY (seq_voluntario) REFERENCES pessoa (seq_pessoa),
   FOREIGN KEY (seq_tipo_acao) REFERENCES tipo_acao (seq_tipo_acao),
   FOREIGN KEY (seq_usuario) REFERENCES usuario (seq_usuario)
)ENGINE=InnoDB AUTO_INCREMENT=2096 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE atendimento (
   seq_acao INT AUTO_INCREMENT NOT NULL, 
   seq_voluntario INT NOT NULL,
   seq_responsavel INT,
   seq_menor INT,
   dat_atendimento DATE NOT NULL,
   des_atendimento TEXT NOT NULL,
   seq_usuario INT NOT NULL,
   dat_log DATE NOT NULL,
   PRIMARY KEY(seq_acao, seq_voluntario, dat_atendimento),
   FOREIGN KEY (seq_voluntario) REFERENCES voluntario (seq_voluntario),
   FOREIGN KEY (seq_responsavel) REFERENCES responsavel (seq_responsavel),
   FOREIGN KEY (seq_menor) REFERENCES menor (seq_menor),
   FOREIGN KEY (seq_usuario) REFERENCES usuario (seq_usuario)
)ENGINE=InnoDB AUTO_INCREMENT=2096 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
