-- phpMyAdmin: Önce hosting panelinden "portfolio_db" veritabanını oluştur, seçili iken bu dosyayı İçe aktar.
-- Kurulumdan sonra includes/database.php içinde host / kullanıcı / şifre / veritabanı adını kontrol et.

SET NAMES utf8mb4;

CREATE TABLE IF NOT EXISTS admin_users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(64) NOT NULL UNIQUE,
  password_hash VARCHAR(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS messages (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  subject VARCHAR(255) NOT NULL,
  message TEXT NOT NULL,
  is_read TINYINT UNSIGNED NOT NULL DEFAULT 0,
  submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS projects (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  description TEXT,
  tech_stack VARCHAR(512),
  category VARCHAR(128),
  github_url VARCHAR(512),
  image_url VARCHAR(512),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO admin_users (username, password_hash)
VALUES (
  'admin',
  '$2y$12$R0CZwefBmrAn935i.YvQluhWIVyTwjkc0iPAUwNj6Lx1pe6FiQEii'
)
ON DUPLICATE KEY UPDATE password_hash = VALUES(password_hash);

INSERT INTO projects (title, description, tech_stack, category, github_url, image_url) VALUES
(
  'Heart Disease Prediction ML',
  'End-to-end Machine Learning project to predict heart disease using the CDC dataset with Logistic Regression and Random Forest algorithms.',
  'Python, Jupyter Notebook, scikit-learn, ML',
  'Machine Learning',
  'https://github.com/melihakbalik0/Heart-Disease-Prediction-ML',
  'assets/img/project1.jpg'
),
(
  'Olist E-commerce Data Analysis',
  'Complete SQL-based data engineering and analytics workflow using the Olist Brazilian E-commerce dataset.',
  'MySQL, SQL, Data Engineering, BI',
  'Data Science',
  'https://github.com/melihakbalik0/Olist-Ecom-Data-Analysis',
  'assets/img/project2.jpg'
);
