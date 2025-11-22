CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100),
    password VARCHAR(100),
    role ENUM('admin','district','auditor')
);
CREATE TABLE districts ( id INT AUTO_INCREMENT PRIMARY KEY, name VARCHAR(100) );
CREATE TABLE projects (
    id INT AUTO_INCREMENT PRIMARY KEY,
    district_id INT,
    name VARCHAR(200),
    budget BIGINT,
    utilized BIGINT DEFAULT 0,
    progress INT DEFAULT 0,
    status VARCHAR(50)
);
CREATE TABLE media (
    id INT AUTO_INCREMENT PRIMARY KEY,
    project_id INT,
    file_path TEXT,
    lat VARCHAR(50),
    lng VARCHAR(50),
    uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE anomalies (
    id INT AUTO_INCREMENT PRIMARY KEY,
    project_id INT,
    message TEXT,
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);