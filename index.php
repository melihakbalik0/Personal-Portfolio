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
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,300..700;1,9..40,400..600&family=Plus+Jakarta+Sans:ital,wght@0,300..800;1,300..800&family=Syne:wght@400..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css?v=10">
    <link rel="preload" as="image" href="assets/images/hero-workspace.jpg">
</head>
<body class="<?= $darkMode ?>">

    <nav class="navbar" id="siteNav">
        <div class="nav-logo">Melih<span>.dev</span></div>
        <ul class="nav-links">
            <li><a href="#hero">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#services">Services</a></li>
            <li><a href="#projects">Projects</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>
        <div class="nav-right">
            <button type="button" id="darkModeToggle" class="theme-toggle<?= $darkMode ? ' is-dark' : '' ?>" aria-label="Açık ve koyu tema arasında geçiş yap" title="Tema · Yin-Yang">
                <svg class="yin-yang-svg" viewBox="0 0 100 100" width="28" height="28" aria-hidden="true" focusable="false">
                    <defs>
                        <clipPath id="yyClipToggle"><circle cx="50" cy="50" r="48"/></clipPath>
                    </defs>
                    <g clip-path="url(#yyClipToggle)">
                        <rect width="50" height="100" fill="#f5f5f5"/>
                        <rect x="50" width="50" height="100" fill="#141414"/>
                        <circle cx="50" cy="25" r="25" fill="#141414"/>
                        <circle cx="50" cy="75" r="25" fill="#f5f5f5"/>
                        <circle cx="50" cy="25" r="8" fill="#f5f5f5"/>
                        <circle cx="50" cy="75" r="8" fill="#141414"/>
                    </g>
                    <circle cx="50" cy="50" r="48" fill="none" stroke="#141414" stroke-width="2"/>
                </svg>
            </button>
            <div class="hamburger" id="hamburger">
                <span></span><span></span><span></span>
            </div>
        </div>
    </nav>

    <section id="hero">
        <div class="hero-bg" aria-hidden="true">
            <div class="hero-grid"></div>
            <div class="hero-orb hero-orb-1"></div>
            <div class="hero-orb hero-orb-2"></div>
            <div class="hero-orb hero-orb-3"></div>
            <div class="hero-shine"></div>
        </div>
        <div class="hero-inner">
        <div class="hero-content">
            <p class="hero-eyebrow reveal"><span class="hero-eyebrow-dot"></span> Available for projects</p>
            <h1 class="reveal reveal-delay-1">Hello, I'm <span class="gradient-name">Melih Akbalık</span></h1>
            <p class="hero-role reveal reveal-delay-2"><span id="typed-text"></span><span class="typed-cursor" aria-hidden="true"></span></p>
            <p class="hero-desc reveal reveal-delay-3">Turning ideas into clean, scalable code.</p>
            <div class="hero-actions reveal reveal-delay-4">
                <a href="#projects" class="btn-primary"><span>View My Projects</span></a>
                <a href="#contact" class="btn-ghost">Get in touch</a>
            </div>
        </div>
        <div class="hero-visual reveal reveal-delay-3">
            <div class="hero-photo-stack">
                <div class="hero-photo-accent" aria-hidden="true"></div>
                <div class="hero-photo-ring">
                    <img
                        src="assets/images/hero-workspace.jpg"
                        alt="Developer workspace with laptop showing programming code"
                        width="560"
                        height="700"
                        decoding="async"
                        fetchpriority="high"
                    >
                </div>
            </div>
            <div class="hero-float-card">
                <span class="hero-float-icon" aria-hidden="true">⌘</span>
                <div class="hero-float-text">
                    <strong>Software Engineering</strong>
                    <span>Architecture · APIs · Data</span>
                </div>
            </div>
            <p class="photo-credit">Photo: <a href="https://unsplash.com/" target="_blank" rel="noopener noreferrer">Unsplash</a></p>
        </div>
        </div>
    </section>

    <section id="about">
        <div class="section-container">
            <h2 class="section-title reveal">About Me</h2>
            <div class="about-top">
                <figure class="about-photo reveal">
                    <div class="about-photo-frame">
                        <img
                            src="assets/images/about-code.jpg"
                            alt="Hands typing on a laptop with programming code on the screen"
                            width="640"
                            height="420"
                            loading="lazy"
                            decoding="async"
                        >
                    </div>
                    <figcaption>From prototypes to production — maintainable systems matter.</figcaption>
                    <p class="photo-credit photo-credit--inline">Photo: <a href="https://unsplash.com/" target="_blank" rel="noopener noreferrer">Unsplash</a></p>
                </figure>
                <div class="about-text reveal reveal-delay-1">
                    <p>I am a Software Engineering student focused on Machine Learning and Data Engineering. I enjoy building data-driven systems and high-performance pipelines using Python and SQL.</p>
                    <p>My goal is to develop clean, scalable code that turns complex data into practical solutions. I am always eager to learn new technologies and contribute to impactful projects.</p>
                </div>
            </div>
            <div class="about-slider-row">
                <div class="slider-container reveal reveal-delay-2">
                    <div class="slider">
                        <div class="slide active">
                            <div class="slide-bg" aria-hidden="true">
                                <img src="assets/images/slide-ml.jpg" alt="" width="1200" height="675" loading="eager" decoding="async">
                            </div>
                            <div class="slide-scrim" aria-hidden="true"></div>
                            <div class="slide-inner">
                                <p class="slide-kicker">Neural systems</p>
                                <h3 class="slide-title"><span class="slide-emoji" aria-hidden="true">🧠</span> Machine Learning</h3>
                                <p class="slide-sub">Models, training loops &amp; smart inference</p>
                            </div>
                        </div>
                        <div class="slide">
                            <div class="slide-bg" aria-hidden="true">
                                <img src="assets/images/slide-data.jpg" alt="" width="1200" height="675" loading="lazy" decoding="async">
                            </div>
                            <div class="slide-scrim" aria-hidden="true"></div>
                            <div class="slide-inner">
                                <p class="slide-kicker">Pipelines &amp; scale</p>
                                <h3 class="slide-title"><span class="slide-emoji" aria-hidden="true">💾</span> Data Engineering</h3>
                                <p class="slide-sub">ETL, warehouses &amp; reliable data flows</p>
                            </div>
                        </div>
                        <div class="slide">
                            <div class="slide-bg" aria-hidden="true">
                                <img src="assets/images/slide-predict.jpg" alt="" width="1200" height="675" loading="lazy" decoding="async">
                            </div>
                            <div class="slide-scrim" aria-hidden="true"></div>
                            <div class="slide-inner">
                                <p class="slide-kicker">Forecast &amp; insight</p>
                                <h3 class="slide-title"><span class="slide-emoji" aria-hidden="true">📊</span> Predictive Modeling</h3>
                                <p class="slide-sub">Signals from data → decisions that age well</p>
                            </div>
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
                    <p class="slider-credit">Görseller: <a href="https://unsplash.com/" target="_blank" rel="noopener noreferrer">Unsplash</a></p>
                </div>
            </div>
        </div>
    </section>

    <section id="services">
        <div class="section-container">
            <h2 class="section-title reveal">Services</h2>
            <div class="services-grid">
                <div class="service-card reveal">
                    <div class="service-icon">🌐</div>
                    <h3>Web Development</h3>
                    <p>Building fast, responsive, and modern websites from scratch using HTML, CSS, and JavaScript.</p>
                </div>
                <div class="service-card reveal reveal-delay-1">
                    <div class="service-icon">⚙️</div>
                    <h3>Backend Development</h3>
                    <p>Developing secure server-side logic and REST APIs using PHP with clean architecture.</p>
                </div>
                <div class="service-card reveal reveal-delay-2">
                    <div class="service-icon">🗄️</div>
                    <h3>Database Design</h3>
                    <p>Designing and managing efficient MySQL databases with optimized queries and structure.</p>
                </div>
                <div class="service-card reveal reveal-delay-3">
                    <div class="service-icon">🎨</div>
                    <h3>UI Design</h3>
                    <p>Creating clean and user-friendly interfaces focused on great user experience.</p>
                </div>
                <div class="service-card reveal reveal-delay-4">
                    <div class="service-icon">🤖</div>
                    <h3>Machine Learning</h3>
                    <p>Building and training ML models for classification, regression, and prediction tasks using Python and scikit-learn.</p>
                </div>
                <div class="service-card reveal reveal-delay-5">
                    <div class="service-icon">📊</div>
                    <h3>Data Science</h3>
                    <p>Analyzing and visualizing data to extract meaningful insights using Python, Pandas, and Matplotlib.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="projects">
        <div class="section-container">
            <h2 class="section-title reveal">Projects</h2>
            <div class="projects-grid" id="projectsGrid">
                <p>Loading projects...</p>
            </div>
        </div>
    </section>

    <section id="contact">
        <div class="section-container">
            <h2 class="section-title reveal">Contact</h2>
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
                <button type="submit" class="btn-primary"><span>Send Message</span></button>
                <div id="formStatus"></div>
            </form>
        </div>
    </section>

    <footer>
        <p>© 2026 Melih Akbalık. All rights reserved.</p>
        <p class="footer-site"><a href="<?= htmlspecialchars($canonical, ENT_QUOTES, 'UTF-8') ?>"><?= htmlspecialchars(parse_url($siteBase, PHP_URL_HOST) ?: 'melihakbalik.free.nf', ENT_QUOTES, 'UTF-8') ?></a></p>
        <p class="footer-atelier"><span class="footer-atelier-mark">☯</span> <span lang="tr">Karanlık ve açık birlikte düşünülür — düzenli kod, sakin ritim.</span> <span lang="en" class="footer-atelier-en">Balance scales craft.</span></p>
    </footer>

    <script src="assets/js/main.js"></script>
    <script src="assets/js/validation.js"></script>
    <script src="assets/js/projects.js?v=5"></script>
</body>
</html>
