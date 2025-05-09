<?php
// CSRF
    session_start();
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,100&display=swap"
          rel="stylesheet">

    <!-- JavaScript Libraries -->
    <script src="https://unpkg.com/sweet-scroll/sweet-scroll.min.js"></script>

    <!-- CSS3 & JS -->
    <link rel="stylesheet" href="./style.css"/>
    <script src="index.js" defer></script>

     <!-- Bootstrap -->
     <link id="roadtrip" href="" rel="stylesheet">

      <!-- modernizr -->
    <script src="js/modernizr.js"></script>

    <!-- Meta Tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="portfolio freelancer"/>
    <meta name="keywords" content="portfolio, freelancer, web development"/>
    <meta charset="UTF-8">
    <title> Taha | A poritfolio to demonstrate my profession</title>

    <!-- Icons -->
    <link rel="icon" href="./favicon.ico">
    <link rel="icon" type="image/png" sizes="32x32" href="./assets/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./assets/icons/favicon-16x16.png">
    <link rel="apple-touch-icon" sizes="180x180" href="./assets/icons/apple-touch-icon-180x180.png">
    <link rel="apple-touch-icon" sizes="152x152" href="./assets/icons/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="144x144" href="./assets/icons/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="120x120" href="./assets/icons/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="114x114" href="./assets/icons/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/icons/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/icons/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="60x60" href="./assets/icons/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="57x57" href="./assets/icons/apple-touch-icon-57x57.png">
    <style>::-webkit-scrollbar {width: 8px;}::-webkit-scrollbar-track {background:rgb(32, 32, 32);}
    ::-webkit-scrollbar-thumb {background: #00FF94;border-radius: 10px;}
    ::-webkit-scrollbar-thumb:hover {background:#5e00ab;}
    .form-feedback {
        display: none;
        margin-top: 1rem;
        padding: 1.25rem 1.5rem;
        border-radius: 12px;
        font-weight: 600;
        font-size: 1.2rem;
        border: 1px solid transparent;
        transition: all 0.4s ease;
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 9999;
        max-width: 300px;
        box-shadow: 0 0 15px rgba(0,255,255,0.4);
        background-color: #0f172a;
        color: #a0f0ff;
        text-shadow: 0 0 8px #00f0ff;
    }

    .form-feedback.success {
        border-color: #00ffae;
        box-shadow: 0 0 20px rgba(0, 255, 174, 0.6);
        color: #b7ffe3;
    }

    .form-feedback.error {
        border-color: #ff4d4f;
        background-color: #1e0d0d;
        box-shadow: 0 0 20px rgba(255, 77, 79, 0.6);
        color: #ff9a9c;
        text-shadow: 0 0 6px #ff4d4f;
    }

    </style>
</head>
<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="pre-container">
            <div class="spinner">
                <div class="double-bounce1"></div>
                <div class="double-bounce2"></div>
            </div>
        </div>
    </div>
<main>
    <!-- Hero Header -->
    <header id="heroHeader" class="hero-header">
        <nav id="navBar" class="nav">
            <div class="container">
                <button type="button" id="hamburgerBtn" class="nav__hamburger-btn">
                    <span class="nav__hamburger-top"></span>
                    <span class="nav__hamburger-center"></span>
                    <span class="nav__hamburger-bottom"></span>
                </button>
                <ul id="navList" class="nav__list">
                    <li class="nav__list-item">
                        <a class="nav__list-link active" href="#heroHeader">&lt;&sol;Home &gt;</a>
                    </li>
                    <li class="nav__list-item">
                        <a class="nav__list-link" href="#services">&lt;Services &sol;&gt;</a>
                    </li>
                    <li class="nav__list-item">
                        <a class="nav__list-link" href="#works">&lt;Works &sol;&gt;</a>
                    </li>
                    <li class="nav__list-item">
                        <a class="nav__list-link" href="#contact">&lt;Contact &sol;&gt;</a>
                    </li>
                </ul>
            </div>
        </nav>
        
        
         <!-- toggle button -->
         <button id="themeToggle" class="theme-toggle" aria-label="Toggle Theme" onclick="clickimg()">
            <span class="icon sun">☀️</span>
            <span class="icon moon">🌙</span>
        </button>
        <!-- toggle button -->
       
        <!-- Sample Works -->
        <section class="header__container container box-intro">
            <div class="header__left table-cell">
                <span class="header__sup-text">Hello There! I am&#160;<strong>       Taha</strong>, a Full-Stack</span>
                <h1 class="header__title box-headline letters rotate-2">
                    <span class="header__title-1" data-role="">
                        <span class="box-words-wrapper">
                            <b class="is-visible">Web.</b>
                            <b>Mobile.</b>
                            <b>Designer & .</b>
                        </span>
                    </span>
                    <span class="header__title-2" data-role="DEVELOPER">DEVELOPER</span>
                </h1>
                <p class="header__msg">As a full-stack web developer and designer,<br> my passion lies in creating, inventing and loving<br> every possible outcome!</p>
                <a href="assets/TAHA Resume.pdf" class="header__resume" download>Resume</a>
            </div>
            <div class="mouse" style="margin-bottom: 50px;">
                <div class="scroll"></div>
            </div>
            <div class="header__right">
                <img src="./assets/illustrations/header.svg" alt="Header section illustration"/>
            </div>
        </section>
        <span class="header__bg"></span>
       
        <!-- Services -->
        <section id="services" class="section container">
            <h2 class="section__title">Services</h2>
        
            <div class="service-cards">
               
<!-- design to design (development.html) -->
                <article class="service-card__box" data-link="development.html">
                    <span class="service-card__illustration">
                        <img src="./assets/services/design.svg" alt="Design Illustration"/>
                    </span>
                    <h3 class="service-card__title">Design</h3>
                    <p class="service-card__text">Specialized in creating stunning websites that are both visually appealing and user-friendly.</p>
                    <p class="service-card__msg">Creating designs that captivate and engage your audience through clean, beautiful interfaces.</p>
                    <hr class="service-card__hr">
                    <p class="service-card__hr-text">User-Centered, Intuitive, Visual Aesthetics</p>  <!-- Text for the HR -->
                    <span class="service-card__bg"></span>
                </article>
                <article class="service-card__box" data-link="management.html">
                    <span class="service-card__illustration">
                        <img src="./assets/services/support.svg" alt="Support Illustration"/>
                    </span>
                    <h3 class="service-card__title">Deployment</h3>
                    <p class="service-card__text">I offer expert support for all your deployment needs, ensuring smooth and efficient launches.</p>
                    <p class="service-card__msg">I am always available to address any issues or concerns you may have. Ensure your website or application is smoothly deployed to production. From configuring servers to managing domains.</p>
                    <span class="service-card__bg"></span>
                    
                </article>
                <article class="service-card__box" data-link="design.html">
                    <span class="service-card__illustration">
                        <img src="./assets/services/developing.svg" alt="Develop Illustration"/>
                    </span>
                    <h3 class="service-card__title">Developing</h3>
                    <p class="service-card__text">I offer custom web development services tailored to your specific needs as a solo professional.</p>
                    <p class="service-card__msg">Building From front-end to back-end development, I create web solutions that work seamlessly.</p>
                    <hr class="service-card__hr">
                    <p class="service-card__hr-text">Responsive, Scalable, Efficient, Backend & Frontend Expertise, Cloud Development</p>  <!-- Text for the HR -->
                    <span class="service-card__bg"></span>
                </article>
            </div>
        </section>
        
          

        
           
<!-- Works Section -->
<section id="works" class="section container">
    <h2 class="section__title">My Works</h2>
    <div class="works">
        <article class="work">
            <div class="work__box" data-link="./assets/works/shirt-3d.html">
                <span class="work__img-box">
                    <img src="./assets/works/Shirt 3d img.png"/>
                </span>
                <h3 class="work__title">My Landing Page</h3>
                <span class="work__badges">
                    <span class="work__badge">HTML5</span>
                    <span class="work__badge">CSS3</span>
                    <span class="work__badge">JavaScript</span>
                </span>
            </div>
        </article>
        <article class="work">
            <div class="work__box" data-link="./assets/works/PR2.html">
                <span class="work__img-box">
                    <img src="./assets/works/sample.png" alt="My Work 2"/>
                </span>
                <h3 class="work__title">My Portfolio Page</h3>
                <span class="work__badges">
                    <span class="work__badge">HTML5</span>
                    <span class="work__badge">CSS3</span>
                    <span class="work__badge">JavaScript</span>
                    <span class="work__badge">MODERNIZR.JS</span>
                    <span class="work__badge">Bootstrap</span>
                    <span class="work__badge">jQuery</span>
                    <span class="work__badge">PHP</span>
                    <span class="work__badge">SQL</span>
                </span>
            </div>
        </article>
        <article class="work">
            <div class="work__box" data-link="./assets/works/PR3.html">
                <span class="work__img-box">
                    <img src="./assets/works/sample.png" alt="My Work 3"/>
                </span>
                <h3 class="work__title">My Landing Page</h3>
                <span class="work__badges">
                    <span class="work__badge">HTML5</span>
                    <span class="work__badge">CSS3</span>
                    <span class="work__badge">JavaScript</span>
                </span>
            </div>
        </article>
        <article class="work">
            <div class="work__box" data-link="./assets/works/PR4.html">
                <span class="work__img-box">
                    <img src="./assets/works/sample.png" alt="My Work 4"/>
                </span>
                <h3 class="work__title">My Landing Page</h3>
                <span class="work__badges">
                    <span class="work__badge">HTML5</span>
                    <span class="work__badge">CSS3</span>
                    <span class="work__badge">JavaScript</span>
                </span>
            </div>
        </article>
        <article class="work">
            <div class="work__box" data-link="./assets/works/PR5.html">
                <span class="work__img-box">
                    <img src="./assets/works/sample.png" alt="My Work 5"/>
                </span>
                <h3 class="work__title">My Landing Page</h3>
                <span class="work__badges">
                    <span class="work__badge">HTML5</span>
                    <span class="work__badge">CSS3</span>
                    <span class="work__badge">JavaScript</span>
                </span>
            </div>
        </article>
        <article class="work">
            <div class="work__box" data-link="./assets/works/PR6.html">
                <span class="work__img-box">
                    <img src="./assets/works/sample.png" alt="My Work 6"/>
                </span>
                <h3 class="work__title">My Landing Page</h3>
                <span class="work__badges">
                    <span class="work__badge">HTML5</span>
                    <span class="work__badge">CSS3</span>
                    <span class="work__badge">JavaScript</span>
                </span>
            </div>
        </article>
    </div>
</section>
<section class="spotify-container">
    <iframe style="border-radius:12px" src="https://open.spotify.com/embed/playlist/17VrBaeI43klLJL6MeUTGe?utm_source=generator&theme=0" width="400px" height="250" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
</section>
<!-- contactt -->
<section id="contact" class="section container">
    <h2 class="section__title">Let's Connect!</h2>
    <div class="contact">
        <form id="contactForm" class="contact__form" method="POST" action="submit-message.php">
            <div class="contact__field-wrapper">
                <label for="contactNameTxt">Name:</label>
                <input id="contactNameTxt" name="name" type="text" required placeholder="What's your name?" />
                <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
            </div>
            <div class="contact__field-wrapper">
                <label for="contactDescriptionTxt">Message:</label>
                <textarea id="contactDescriptionTxt" name="message" required placeholder="Let's connect!"></textarea>
            </div>
            <button type="submit" class="contact__submit-btn">Submit</button>
        </form>
        <!-- Success & Error Message -->
        <div id="responseMessage" class="form-feedback"></div>

        <span class="contact__illustration">
            <img src="./assets/illustrations/connect.svg" alt="Group of people connecting with each other" />
        </span>
    </div>
    
</section>



    <!-- Footer -->
    <footer class="footer">
        portfolio made with l❤️ve by <a href="https://www.linkedin.com/in/taha-rahimi-abb0b3356/" target="_blank" class="footer__link">Taha Rahimi</a>
        check me out!
    </footer>
</main>
<!-- jQuery -->
<script src="js/jquery-2.1.1.js"></script>
<!-- contact form.js AFTER JQUERY for ajax response -->
<script src="contact-form.js"></script>
<!--  plugins -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="js/menu.js"></script>
<script src="js/animated-headline.js"></script>
<script src="js/isotope.pkgd.min.js"></script>

<script>
    function clickimg() {
        const body = document.body;
        const cards = document.querySelectorAll('.service-card__box');
        body.classList.toggle("light");
    
        const stylesheet = document.getElementById("roadtrip");
        const isDark = stylesheet.getAttribute('href') === '';
    
        stylesheet.href = isDark ? 'css/bootstrap.min.css' : '';
    
        cards.forEach(card => {
            const text = card.querySelector('.service-card__text');
    
            card.addEventListener('mouseenter', () => {
                if (text) {
                    text.style.color = isDark ? 'black' : 'white';
                }
            });
    
            card.addEventListener('mouseleave', () => {
                if (text) {
                    text.style.color = '';
                }
            });
        });
    }
    </script>
    
<!--  custom script -->
<script src="js/custom.js"></script>
<script>
    document.querySelectorAll('.nav__list-link').forEach(link => {
  link.addEventListener('click', function (e) {
    e.preventDefault();
    const targetId = this.getAttribute('href').substring(1);
    const targetEl = document.getElementById(targetId);

    if (targetEl) {
      const navHeight = document.getElementById('navBar').offsetHeight;
      const topOffset = targetEl.getBoundingClientRect().top + window.scrollY - navHeight - 20;

      window.scrollTo({
        top: topOffset,
        behavior: 'smooth'
      });
    }
  });
});
// spotfiy load after everything:
window.onload = function () {
    const container = document.getElementById('spotify-container');
    const iframe = document.createElement('iframe');
    iframe.src = "https://open.spotify.com/embed/playlist/37i9dQZF1DXcBWIGoYBM5M"; // example playlist
    iframe.loading = "lazy"; // optional, browsers may delay loading
    container.appendChild(iframe);
  };
</script> 
</body>
</html>
