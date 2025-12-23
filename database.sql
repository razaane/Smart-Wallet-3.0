CREATE DATABASE Smart_Wallet_V2 ;

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

    FOREIGN KEY (categorie_id) REFERENCES categories,
    FOREIGN KEY (user_id) REFERENCES users
);

CREATE TABLE expenses(
    id INT PRIMARY KEY AUTO_INCREMENT,
    montant DECIMAL(10.2) NOT NULL,
    la_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    user_id INT NOT NULL,
    categorie_id INT NOT NULL,

    FOREIGN KEY (user_id) REFERENCES users,
    FOREIGN KEY (categorie_id) REFERENCES categories
);


