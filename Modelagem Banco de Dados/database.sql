CREATE DATABASE crud_users DEFAULT CHARACTER
SET
    utf8;

USE crud_users;

CREATE table
    users (
        id int not null auto_increment primary key,
        name varchar(100) not null,
        email varchar(100) not null
    );

CREATE table
    setores (
        id int not null auto_increment primary key,
        name varchar(50) not null
    );

CREATE table
    user_setores (setor_id int, user_id int);