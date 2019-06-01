drop database if exists web20191_reserves;
create database if not exists web20191_reserves;

use web20191_reserves;

-- Cadastro de equipamentos em espaços de uma instituição de ensino. Cada equipamento está associado a um espaço.
CREATE TABLE spaces (
    id          INT PRIMARY KEY AUTO_INCREMENT,
    name        VARCHAR(255),
    description VARCHAR(255)
);

CREATE TABLE equipments (
    id INT PRIMARY KEY AUTO_INCREMENT,
    type VARCHAR(255),
    code VARCHAR(255),

    space_id INT,
    FOREIGN KEY (space_id) REFERENCES spaces(id)
);

create user if not exists web20191 identified with mysql_native_password by 'web20191';
grant all privileges on web20191_reserves.* to web20191;