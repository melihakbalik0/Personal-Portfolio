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
            setTimeout(() => {
                isDeleting = true;
            }, 1500);
        } else if (isDeleting && charIndex === 0) {
            isDeleting = false;
            wordIndex = (wordIndex + 1) % words.length;
        }
        setTimeout(type, isDeleting ? 70 : 105);
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

    slides[currentSlide].classList.remove('active');
    if (dots.length > 0) dots[currentSlide].classList.remove('active');

    currentSlide = (currentSlide + dir + slides.length) % slides.length;

    slides[currentSlide].classList.add('active');
    if (dots.length > 0) dots[currentSlide].classList.add('active');
}

function startAutoSlide() {
    autoSlide = setInterval(() => changeSlide(1), 4000);
}

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

dots.forEach((dot, i) => {
    dot.addEventListener('click', () => {
        if (slides.length === 0) return;
        clearInterval(autoSlide);
        slides[currentSlide].classList.remove('active');
        dots[currentSlide].classList.remove('active');
        currentSlide = i;
        slides[currentSlide].classList.add('active');
        dots[currentSlide].classList.add('active');
        startAutoSlide();
    });
});

const sliderWrap = document.querySelector('.slider-container');
if (sliderWrap && slides.length > 0) {
    sliderWrap.addEventListener('mouseenter', () => clearInterval(autoSlide));
    sliderWrap.addEventListener('mouseleave', startAutoSlide);
    startAutoSlide();
}

// --- SKILLS PROGRESS BARS ANIMATION ---
const skillsSection = document.getElementById('skills');
if (skillsSection) {
    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                document.querySelectorAll('.progress').forEach((bar) => {
                    bar.style.width = bar.dataset.width + '%';
                });
            }
        });
    });
    observer.observe(skillsSection);
}

// --- MOBILE HAMBURGER MENU ---
const hamburger = document.getElementById('hamburger');
const navLinksEl = document.querySelector('.nav-links');
if (hamburger && navLinksEl) {
    hamburger.addEventListener('click', () => {
        navLinksEl.classList.toggle('open');
    });
    navLinksEl.querySelectorAll('a').forEach((link) => {
        link.addEventListener('click', () => navLinksEl.classList.remove('open'));
    });
}

// --- DARK MODE TOGGLE (yin-yang: döner; koyu = is-dark) ---
const toggle = document.getElementById('darkModeToggle');
if (toggle) {
    const syncToggleIcon = () => {
        toggle.classList.toggle('is-dark', document.body.classList.contains('dark-mode'));
    };
    syncToggleIcon();

    toggle.addEventListener('click', () => {
        document.body.classList.toggle('dark-mode');
        const isDark = document.body.classList.contains('dark-mode');
        document.cookie = `darkMode=${isDark};path=/;max-age=604800`;
        syncToggleIcon();
        toggle.classList.add('theme-toggle-pulse');
        window.setTimeout(() => toggle.classList.remove('theme-toggle-pulse'), 420);
    });
}

// --- NAVBAR SCROLL ---
const siteNav = document.getElementById('siteNav');
if (siteNav) {
    const onScroll = () => {
        siteNav.classList.toggle('scrolled', window.scrollY > 40);
    };
    onScroll();
    window.addEventListener('scroll', onScroll, { passive: true });
}

// --- SCROLL REVEAL ---
const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
if (!prefersReducedMotion) {
    const revealEls = document.querySelectorAll('.reveal');
    if (revealEls.length > 0) {
        const revealObserver = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                    }
                });
            },
            { threshold: 0.12, rootMargin: '0px 0px -8% 0px' }
        );
        revealEls.forEach((el) => {
            const r = el.getBoundingClientRect();
            const inView = r.top < window.innerHeight * 0.92 && r.bottom > 0;
            if (inView) {
                el.classList.add('visible');
            } else {
                revealObserver.observe(el);
            }
        });
    }
} else {
    document.querySelectorAll('.reveal').forEach((el) => el.classList.add('visible'));
}

// --- ACTIVE NAVIGATION LINK ON SCROLL ---
const sections = document.querySelectorAll('section[id]');
const navLinks = document.querySelectorAll('.nav-links a');
if (sections.length > 0 && navLinks.length > 0) {
    const sectionObserver = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    const id = entry.target.id;
                    navLinks.forEach((link) => {
                        link.classList.toggle('active', link.getAttribute('href') === '#' + id);
                    });
                }
            });
        },
        { threshold: 0.35 }
    );
    sections.forEach((s) => sectionObserver.observe(s));
}

// --- SERVICE CARDS: spotlight follow cursor ---
document.querySelectorAll('.service-card').forEach((card) => {
    card.addEventListener('pointermove', (e) => {
        const r = card.getBoundingClientRect();
        const x = ((e.clientX - r.left) / r.width) * 100;
        const y = ((e.clientY - r.top) / r.height) * 100;
        card.style.setProperty('--sx', `${x}%`);
        card.style.setProperty('--sy', `${y}%`);
    });
});
