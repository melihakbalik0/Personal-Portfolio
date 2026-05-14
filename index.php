<?php
session_start();
$darkMode = isset($_COOKIE['darkMode']) && $_COOKIE['darkMode'] === 'true' ? 'dark-mode' : '';
$site = require __DIR__ . '/includes/site_config.php';
$siteBase = rtrim($site['base_url'], '/');
$canonical = $siteBase . '/';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Melih Akbalık | Portfolio</title>
    <link rel="canonical" href="<?= htmlspecialchars($canonical, ENT_QUOTES, 'UTF-8') ?>">
    <meta name="description" content="Melih Akbalık — Software Engineering portfolio: machine learning, data engineering, and web projects.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?= htmlspecialchars($canonical, ENT_QUOTES, 'UTF-8') ?>">
    <meta property="og:title" content="Melih Akbalık | Portfolio">
    <meta property="og:description" content="Junior Software Engineer — ML, data engineering, and full-stack projects.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&family=Inter:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css?v=3">
</head>
<body class="<?= $darkMode ?>">

    <nav class="navbar">
        <div class="nav-logo">Melih<span>.dev</span></div>
        <ul class="nav-links">
            <li><a href="#hero">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#services">Services</a></li>
            <li><a href="#projects">Projects</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>
        <div class="nav-right">
            <button type="button" id="darkModeToggle" aria-label="Toggle dark mode">🌙</button>
            <div class="hamburger" id="hamburger">
                <span></span><span></span><span></span>
            </div>
        </div>
    </nav>

    <section id="hero">
        <div class="hero-content">
            <h1>Hello, I'm <span>Melih Akbalık</span></h1>
            <p>Junior Software Engineer — turning ideas into clean, scalable code.</p>
            <a href="#projects" class="btn-primary">View My Projects</a>
        </div>
    </section>

    <section id="about">
        <div class="section-container">
            <h2 class="section-title">About Me</h2>
            <div class="about-grid">
                <div class="about-text">
                    <p>I am a Software Engineering student focused on Machine Learning and Data Engineering. I enjoy building data-driven systems and high-performance pipelines using Python and SQL.</p>
                    <p>My goal is to develop clean, scalable code that turns complex data into practical solutions. I am always eager to learn new technologies and contribute to impactful projects.</p>
                </div>
                <div class="slider-container">
                    <div class="slider">
                        <div class="slide active" style="background:#052e16">
                            <span>🧠</span> Machine Learning
                        </div>
                        <div class="slide" style="background:#064e3b">
                            <span>💾</span> Data Engineering
                        </div>
                        <div class="slide" style="background:#065f46">
                            <span>📊</span> Predictive Modeling
                        </div>
                    </div>
                    <div class="slider-controls">
                        <button type="button" id="prevBtn">&#8592;</button>
                        <div class="dots">
                            <span class="dot active"></span>
                            <span class="dot"></span>
                            <span class="dot"></span>
                        </div>
                        <button type="button" id="nextBtn">&#8594;</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="services">
        <div class="section-container">
            <h2 class="section-title">Services</h2>
            <div class="services-grid">
                <div class="service-card">
                    <div class="service-icon">🌐</div>
                    <h3>Web Development</h3>
                    <p>Building fast, responsive, and modern websites from scratch using HTML, CSS, and JavaScript.</p>
                </div>
                <div class="service-card">
                    <div class="service-icon">⚙️</div>
                    <h3>Backend Development</h3>
                    <p>Developing secure server-side logic and REST APIs using PHP with clean architecture.</p>
                </div>
                <div class="service-card">
                    <div class="service-icon">🗄️</div>
                    <h3>Database Design</h3>
                    <p>Designing and managing efficient MySQL databases with optimized queries and structure.</p>
                </div>
                <div class="service-card">
                    <div class="service-icon">🎨</div>
                    <h3>UI Design</h3>
                    <p>Creating clean and user-friendly interfaces focused on great user experience.</p>
                </div>
                <div class="service-card">
                    <div class="service-icon">🤖</div>
                    <h3>Machine Learning</h3>
                    <p>Building and training ML models for classification, regression, and prediction tasks using Python and scikit-learn.</p>
                </div>
                <div class="service-card">
                    <div class="service-icon">📊</div>
                    <h3>Data Science</h3>
                    <p>Analyzing and visualizing data to extract meaningful insights using Python, Pandas, and Matplotlib.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="projects">
        <div class="section-container">
            <h2 class="section-title">Projects</h2>
            <div class="projects-grid" id="projectsGrid">
                <p>Loading projects...</p>
            </div>
        </div>
    </section>

    <section id="contact">
        <div class="section-container">
            <h2 class="section-title">Contact</h2>
            <form id="contactForm" novalidate>
                <div class="form-group">
                    <input type="text" id="name" placeholder="Your Name" />
                    <span class="error" id="nameError"></span>
                </div>
                <div class="form-group">
                    <input type="email" id="email" placeholder="Email Address" />
                    <span class="error" id="emailError"></span>
                </div>
                <div class="form-group">
                    <input type="text" id="subject" placeholder="Subject" />
                    <span class="error" id="subjectError"></span>
                </div>
                <div class="form-group">
                    <textarea id="message" placeholder="Your Message" rows="5"></textarea>
                    <span class="error" id="messageError"></span>
                </div>
                <button type="submit" class="btn-primary">Send Message</button>
                <div id="formStatus"></div>
            </form>
        </div>
    </section>

    <footer>
        <p>© 2026 Melih Akbalık. All rights reserved.</p>
        <p class="footer-site"><a href="<?= htmlspecialchars($canonical, ENT_QUOTES, 'UTF-8') ?>"><?= htmlspecialchars(parse_url($siteBase, PHP_URL_HOST) ?: 'melihakbalik.free.nf', ENT_QUOTES, 'UTF-8') ?></a></p>
    </footer>

    <script src="assets/js/main.js"></script>
    <script src="assets/js/validation.js"></script>
    <script src="assets/js/projects.js?v=5"></script>
</body>
</html>
