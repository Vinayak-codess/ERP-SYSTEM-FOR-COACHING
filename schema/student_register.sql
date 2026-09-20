CREATE DATABASE IF NOT EXISTS erp_system;
USE erp_system;

CREATE TABLE IF NOT EXISTS student (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    Phone_number VARCHAR(15) NOT NULL,
    Email VARCHAR(100) NOT NULL,
    Password VARCHAR(255) NOT NULL,
    course_id INT NOT NULL,
    batch_id INT NOT NULL,
    admission_date DATE NOT NULL,
    FOREIGN KEY (course_id) REFERENCES course(id) ON DELETE CASCADE,
    FOREIGN KEY (batch_id) REFERENCES batch(id) ON DELETE CASCADE
);