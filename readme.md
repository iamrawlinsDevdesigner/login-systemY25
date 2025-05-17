/login-system
├── config
│   └── db.php
├── includes
│   └── functions.php
├── public
│   ├── index.php           (Login Form)
│   ├── register.php        (Registration Form)
│   ├── dashboard.php       (Protected Page)
│   ├── logout.php
├── handlers
│   ├── login_handler.php
│   └── register_handler.php



CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL,
    email VARCHAR(150) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
