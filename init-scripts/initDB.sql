CREATE TABLE role (
    id SERIAL PRIMARY KEY,
    title VARCHAR(255)
);

INSERT INTO role (title) VALUES
 ('admin'),
 ('user');

CREATE TABLE users (
    id SERIAL PRIMARY KEY,
    username VARCHAR(255) NOT NULL UNIQUE,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    image VARCHAR(255),
    created_at TIMESTAMP DEFAULT NOW(),
    updated_at TIMESTAMP,
    deleted_at TIMESTAMP,
    role_id INT NOT NULL DEFAULT 2,
    CONSTRAINT fk_role
        FOREIGN KEY (role_id)
            REFERENCES role(id)
);

CREATE TABLE status (
    id SERIAL PRIMARY KEY,
    title VARCHAR(100) NOT NULL UNIQUE
);

INSERT INTO status (title) VALUES
('Todo'),
('En cours'),
('Validation'),
('Terminer');

CREATE TABLE task (
    id SERIAL PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT NOW(),
    branche VARCHAR(255),
    updated_at TIMESTAMP,
    deleted_at TIMESTAMP,
    user_id INT NOT NULL,
    status_id INT NOT NULL DEFAULT 1,
    CONSTRAINT fk_user
        FOREIGN KEY (user_id)
            REFERENCES users(id),
    CONSTRAINT fk_status
        FOREIGN KEY (status_id)
            REFERENCES status(id)
);

