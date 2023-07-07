

CREATE TABLE roles(
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(50)
);

INSERT INTO roles VALUES (1, 'user'),  (2, 'admin');


CREATE TABLE users(
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role INT default 1,
    image VARCHAR(255) default '/public/images/userDefault.png',
    FOREIGN KEY (role) REFERENCES roles (id)
);


