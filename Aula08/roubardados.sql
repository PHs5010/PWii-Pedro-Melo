-- Remove a tabela antiga se existir
DROP TABLE IF EXISTS usuarios;

-- Cria a tabela atualizada
CREATE TABLE usuarios (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    
    nome VARCHAR(100) NOT NULL,

    cpf CHAR(11) NOT NULL UNIQUE CHECK (cpf REGEXP '^[0-9]{11}$'),

    email VARCHAR(150) NOT NULL UNIQUE,
    
    senha VARCHAR(255) NOT NULL, -- será armazenada com password_hash()

    telefone VARCHAR(20),
    data_nascimento DATE NOT NULL,

    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
