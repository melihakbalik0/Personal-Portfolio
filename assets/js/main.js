// --- TYPED TEXT ANIMATION ---
const words = ['Junior Software Engineer', 'Full-Stack Developer', 'Problem Solver'];
let wordIndex = 0;
let charIndex = 0;
let isDeleting = false;
const typedEl = document.getElementById('typed-text');

if (typedEl) {
    function type() {
        const current = words[wordIndex];
        if (isDeleting) {
            typedEl.textContent = current.substring(0, charIndex - 1);
            charIndex--;
        } else {
            typedEl.textContent = current.substring(0, charIndex + 1);
            charIndex++;
        }
        
        if (!isDeleting && charIndex === current.length) {
            setTimeout(() => isDeleting = true, 1500);
        } else if (isDeleting && charIndex === 0) {
            isDeleting = false;
            wordIndex = (wordIndex + 1) % words.length;
        }
        setTimeout(type, isDeleting ? 80 : 120);
    }
    type();
}

// --- IMAGE SLIDER LOGIC ---
let currentSlide = 0;
const slides = document.querySelectorAll('.slide');
const dots = document.querySelectorAll('.dot');
let autoSlide;

function changeSlide(dir) {
    if (slides.length === 0) return;

    // Remove active state from current slide and dot
    slides[currentSlide].classList.remove('active');
    if (dots.length > 0) dots[currentSlide].classList.remove('active');

    // Calculate next index
    currentSlide = (currentSlide + dir + slides.length) % slides.length;

    // Set active state to new slide and dot
    slides[currentSlide].classList.add('active');
    if (dots.length > 0) dots[currentSlide].classList.add('active');
}

// Initialize automatic sliding
function startAutoSlide() {
    autoSlide = setInterval(() => changeSlide(1), 4000);
}

// Manual navigation controls
const prevBtn = document.getElementById('prevBtn');
const nextBtn = document.getElementById('nextBtn');

if (prevBtn) {
    prevBtn.addEventListener('click', () => {
        clearInterval(autoSlide);
        changeSlide(-1);
        startAutoSlide();
    });
}

if (nextBtn) {
    nextBtn.addEventListener('click', () => {
        clearInterval(autoSlide);
        changeSlide(1);
        startAutoSlide();
    });
}

// Pause slider on mouse hover
const sliderWrap = document.querySelector('.slider-container');
if (sliderWrap) {
    sliderWrap.addEventListener('mouseenter', () => clearInterval(autoSlide));
    sliderWrap.addEventListener('mouseleave', startAutoSlide);
}

startAutoSlide();

// --- SKILLS PROGRESS BARS ANIMATION ---
const skillsSection = document.getElementById('skills');
if (skillsSection) {
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                document.querySelectorAll('.progress').forEach(bar => {
                    bar.style.width = bar.dataset.width + '%';
                });
            }
        });
    });
    observer.observe(skillsSection);
}

// --- MOBILE HAMBURGER MENU ---
const hamburger = document.getElementById('hamburger');
if (hamburger) {
    hamburger.addEventListener('click', () => {
        document.querySelector('.nav-links').classList.toggle('open');
    });
}

// --- DARK MODE TOGGLE ---
const toggle = document.getElementById('darkModeToggle');
if (toggle) {
    toggle.addEventListener('click', () => {
        document.body.classList.toggle('dark-mode');
        const isDark = document.body.classList.contains('dark-mode');
        document.cookie = `darkMode=${isDark};path=/;max-age=604800`;
        toggle.textContent = isDark ? '☀️' : '🌙';
    });
}

// --- ACTIVE NAVIGATION LINK ON SCROLL ---
const sections = document.querySelectorAll('section');
const navLinks = document.querySelectorAll('.nav-links a');
if (sections.length > 0) {
    const sectionObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                navLinks.forEach(link => {
                    link.classList.remove('active');
                    if (link.getAttribute('href') === '#' + entry.target.id) {
                        link.classList.add('active');
                    }
                });
            }
        });
    }, { threshold: 0.5 });
    sections.forEach(s => sectionObserver.observe(s));
}