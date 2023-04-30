

CREATE TABLE roles(
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(50)
);

INSERT INTO roles VALUES (1, 'unauthorized'),  (2, 'user'), (3, 'admin');


CREATE TABLE users(
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role INT default 1,
    FOREIGN KEY (role) REFERENCES roles (id)
);


