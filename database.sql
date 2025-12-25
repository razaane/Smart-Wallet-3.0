CREATE DATABASE Smart_Wallet_V2 ;
use Smart_Wallet_V2;
CREATE TABLE users(
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(100) NOT NULL,
    fullname VARCHAR(100) NOT NULL ,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(100) NOT NULL
);

CREATE TABLE categories(
    id INT PRIMARY KEY AUTO_INCREMENT,
    name_type VARCHAR(50) NOT NULL 
);

CREATE TABLE incomes(
    id INT PRIMARY KEY AUTO_INCREMENT,
    montant DECIMAL(10.2) NOT NULL,
    la_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    descreption VARCHAR(250) NOT NULL,

    user_id INT NOT NULL,
    categorie_id INT NOT NULL,

    FOREIGN KEY (categorie_id) REFERENCES categories(id),
    FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE expenses(
    id INT PRIMARY KEY AUTO_INCREMENT,
    montant DECIMAL(10.2) NOT NULL,
    la_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    user_id INT NOT NULL,
    categorie_id INT NOT NULL,

    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (categorie_id) REFERENCES categories(id)
);

INSERT INTO categories (id,name_type) VALUES
    (1,"Food"),
    (2,"Transport"),
    (3,'Utilities'),
    (4,'Entertainment'),
    (5,'Health'),
    (6,'Education'),
    (7,'Shopping')
