# 💻 Full-Stack Web Portfolio & Management System

This project is a dynamic, full-stack web portfolio designed to showcase my projects, skills, and professional background. It features a custom-built Administrative Dashboard that allows for real-time content management and dynamic updates.

🔗 **Live Demo:** [https://melihakbalik.free.nf/?i=1](https://melihakbalik.free.nf/?i=1)

---

## 🚀 Features

### 🌐 Client Side (Portfolio)
* **Dynamic Project Showcase:** Automatically fetches and displays the latest projects and case studies from the database.
* **About & Skills Section:** Features dynamic skill bars and professional summaries that can be updated instantly.
* **Contact Form:** A fully functional and secure messaging system for visitors and potential recruiters to reach out.

### 🔐 Administrative Dashboard (Admin Panel)
* **Secure Authentication:** Session-based secure login system to restrict access to unauthorized users.
* **Content Management (CRUD):** Complete control to Add, Read, Update, and Delete projects, skills, and personal information directly from the panel.
* **Message Center:** Centralized inbox to view incoming inquiries, manage read/unread statuses, and monitor form submissions.

---

## 🛠️ Tech Stack

* **Backend:** PHP (Handles dynamic routing, form processing, secure sessions, and business logic)
* **Database:** MySQL (Relational database design for structured data storage)
* **Frontend:** HTML5, CSS3, JavaScript / Bootstrap (Responsive and modern user interface)

---

## 📦 Local Installation & Setup

To run this project locally on your machine, follow these setup steps:

### 1. Prerequisites
* XAMPP, WampServer, or MAMP (to provide the local PHP and MySQL environment)

### 2. Database Configuration
1. Navigate to `localhost/phpmyadmin` in your browser.
2. Create a new database (e.g., `portfolio_db`).
3. Import the provided `.sql` file (e.g., `database.sql`) into your newly created database.
4. Update your project's database configuration file (`config.php` or `connect.php`) with your local credentials:

```php
$host = "localhost";
$user = "root";
$pass = "";
$db_name = "portfolio_db";
