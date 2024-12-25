CREATE TABLE users (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    bio TEXT,
    photo VARCHAR(255)
);

CREATE TABLE projects (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    user_id INT(11) NOT NULL,
    project_name VARCHAR(100) NOT NULL,
    description TEXT,
    photo VARCHAR(255),
    url VARCHAR(255),
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE skills (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    user_id INT(11) NOT NULL,
    category VARCHAR(100),
    name VARCHAR(100) NOT NULL,
    logo_url VARCHAR(255),
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE education (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    user_id INT(11) NOT NULL,
    school_name VARCHAR(100) NOT NULL,
    start_year YEAR(4),
    end_year YEAR(4),
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE certificates (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    certificate_name VARCHAR(255),
    issuer VARCHAR(255),
    date_issued DATE,
    certificate_url VARCHAR(255),
    FOREIGN KEY (user_id) REFERENCES users(id)
);
