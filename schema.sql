CREATE TABLE isi_users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_name VArCHAR(255) NOT NULL,
    first_name VArCHAR(255) NOT NULL,
    last_name VArCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    type VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);
