CREATE DATABASE student_portal;
USE student_portal;

CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    password VARCHAR(255),
    is_admin TINYINT(1) DEFAULT 0
);

CREATE TABLE courses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100),
    description TEXT,
    price DECIMAL(10,2),
    image VARCHAR(255)
);

CREATE TABLE enrollments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_id INT,
    course_id INT,
    enrolled_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (student_id) REFERENCES students(id) ON DELETE CASCADE,
    FOREIGN KEY (course_id) REFERENCES courses(id) ON DELETE CASCADE
);

-- Insert sample data
INSERT INTO students (name, email, password) VALUES ('Test User', 'Test@gmail.com', '$2y$10$.LYbjxkHXr89InjSW/vAcuWvpzf6Nkn3ulfk6pEv/L27N/VNPqrpe');
INSERT INTO students (name, email, password, is_admin) VALUES ('Admin', 'Admin@gmail.com', '$2y$10$.LYbjxkHXr89InjSW/vAcuWvpzf6Nkn3ulfk6pEv/L27N/VNPqrpe', 1);


INSERT INTO courses (title, description, price, image)
VALUES ('WEB', 'Learn the fundamentals of web development...', 135.00, 'assets/img/gallery/web.jpg'),
       ('EXCEL', 'Master Microsoft Excel for effective data management, analysis...', 30.00, 'assets/img/gallery/excel.jpg'),
       ('IAI', 'Unlock the power of Artificial Intelligence...', 100.00, 'assets/img/gallery/IAI.jpg'),
       ('ENGLISH', 'Enhance your English skills...', 60.00, 'assets/img/gallery/english.jpg'),
       ('IT', 'Step into the world of IT with a comprehensive course...', 40.00, 'assets/img/gallery/it.jpg'),
       ('PYTHON', 'Master Python easily and professionally...', 80.00, 'assets/img/gallery/python.png');

