---

## 🛡️ License
This project is open-source and available under the **MIT License**.

---

### 💡 Quick Note
If you're using this as a template, remember to update the `/includes/config.php` with your own database credentials to getThis version is polished with a more professional tone, better visual hierarchy, and a focus on the engineering quality of the project. It’s ready to be copy-pasted directly into your `README.md`.

---

# Professional Portfolio & CMS 🚀

A high-performance, responsive portfolio ecosystem engineered to showcase technical expertise and manage content dynamically. This project features a custom-built **Content Management System (CMS)**, allowing for real-time project updates and lead management without touching the code.

## 🌐 Live Preview
View the live project here:  
**[melihakbalik.free.nf](https://melihakbalik.free.nf/?i=1)**

---

## ✨ Key Features

*   **Dynamic Content Engine:** Projects and services are fetched dynamically from a MySQL database using **PHP 8.x** and **AJAX** for a seamless, no-reload experience.
*   **Custom Admin Dashboard:** A secure, password-protected management interface to add, edit, or delete projects and monitor incoming contact messages.
*   **Advanced UI/UX:**
    *   **Intersection Observer API:** Used for high-performance scroll-triggered animations.
    *   **Adaptive Dark Mode:** Theme persistence achieved via browser cookies for a consistent user experience.
    *   **Modern Layouts:** Built with CSS Grid and Flexbox for full responsiveness across all device tiers.
*   **Full-Stack Security:** Implements **PDO (PHP Data Objects)** with prepared statements to prevent SQL injection, alongside comprehensive client-side and server-side form validation.

---

## 🛠️ Technology Stack

| Layer | Technologies |
| :--- | :--- |
| **Frontend** | HTML5, CSS3 (Modern ES6+), Vanilla JavaScript |
| **Backend** | PHP 8.x (Modular Architecture) |
| **Database** | MySQL (Relational Schema Design) |
| **Tools** | Git, GitHub, PDO for Security |
| **Hosting** | InfinityFree |

---

## 📁 Project Architecture
```bash
├── /admin      # Authentication logic & CMS Dashboard
├── /api        # RESTful-style endpoints for data fetching
├── /assets     # Optimized CSS, JS logic, and media assets
├── /includes   # Database config and security middleware
├── index.php   # Main entry point & dynamic landing page
└── schema.sql  # Relational database structure
