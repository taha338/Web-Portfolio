$(window).load(function () {

  // preloader
  $('#status').fadeOut(); // will first fade out the loading animation
  $('#preloader').delay(550).fadeOut('slow'); // will fade out the white DIV that covers the website.
  $('body').delay(550).css({
      'overflow': 'visible'
  });
});
// hereeeeeeeeeeeeeeeeeeeeeeee

const NAV_BAR = document.getElementById('navBar');
const NAV_LIST = document.getElementById('navList');
const HERO_HEADER = document.getElementById('heroHeader');
const HAMBURGER_BTN = document.getElementById('hamburgerBtn');
const NAV_LINKS = Array.from( document.querySelectorAll('.nav__list-link'));
const SERVICE_BOXES = document.querySelectorAll('.service-card__box');
const ACTIVE_LINK_CLASS = 'active';
const BREAKPOINT = 576;

let currentServiceBG = null;
let currentActiveLink = document.querySelector('.nav__list-link.active');

// Remove the active state once the breakpoint is reached
const resetActiveState = ()=>{
  NAV_LIST.classList.remove('nav--active');
  Object.assign(NAV_LIST.style, {
    height: null
  });
  Object.assign(document.body.style, {
    overflowY: null
  });
}
// toggle
document.addEventListener("DOMContentLoaded", function () {
  const themeToggle = document.getElementById("themeToggle");
  const body = document.body;

  // Check for saved theme in localStorage
  if (localStorage.getItem("dark-mode") === "enabled") {
      body.classList.add("dark-mode");
      themeToggle.classList.add("dark-mode");
  }

  themeToggle.addEventListener("click", function () {
      body.classList.toggle("dark-mode");
      themeToggle.classList.toggle("dark-mode");

      // Save preference in localStorage
      if (body.classList.contains("dark-mode")) {
          localStorage.setItem("dark-mode", "enabled");
      } else {
          localStorage.removeItem("dark-mode");
      }
  });
});

// headline changicng glitch words

document.addEventListener("DOMContentLoaded", function () {
  const target = document.querySelector('[data-role]');
  const roles = ["Web", "Mobile", "Designer&"];
  let index = 0;
  ndex = (index + 1) % roles.length;
  target.setAttribute("data-role", roles[index]);
  setInterval(() => {
      index = (index + 1) % roles.length;
      target.setAttribute("data-role", roles[index]);
  }, 5200);
});
//Add padding to the header to make it visible because navbar has a fixed position.
const addPaddingToHeroHeaderFn = () => {
  const NAV_BAR_HEIGHT = NAV_BAR.getBoundingClientRect().height;
  const HEIGHT_IN_REM = NAV_BAR_HEIGHT / 10;

  // If hamburger button is active, do not add padding
  if (NAV_LIST.classList.contains('nav--active')) {
    return;
  }
  Object.assign(HERO_HEADER.style, {
    paddingTop: HEIGHT_IN_REM + 'rem'
  });
}
addPaddingToHeroHeaderFn();
window.addEventListener('resize', ()=>{
  addPaddingToHeroHeaderFn();

  // When the navbar is active and the window is being resized, remove the active state once the breakpoint is reached
  if(window.innerWidth >= BREAKPOINT){
    addPaddingToHeroHeaderFn();
    resetActiveState();
  }
});

// As the user scrolls, the active link should change based on the section currently displayed on the screen.
window.addEventListener('scroll', ()=>{
  const sections = document.querySelectorAll('#heroHeader, #services, #works, #contact');

  // Loop through sections and check if they are visible
  sections.forEach((section) => {
    const sectionTop = section.offsetTop;
    const NAV_BAR_HEIGHT = NAV_BAR.getBoundingClientRect().height;
    if (window.scrollY >= sectionTop - NAV_BAR_HEIGHT) {
      const ID = section.getAttribute('id');
      const LINK = NAV_LINKS.filter(link => {
        return link.href.includes('#'+ID);
      })[0];
      currentActiveLink.classList.remove(ACTIVE_LINK_CLASS);
      LINK.classList.add(ACTIVE_LINK_CLASS);
      currentActiveLink = LINK;
    }
  });
});

// Shows & hide navbar on smaller screen
HAMBURGER_BTN.addEventListener('click', ()=>{
  NAV_LIST.classList.toggle('nav--active');
  if (NAV_LIST.classList.contains('nav--active')) {
    Object.assign(document.body.style, {
      overflowY: 'hidden'
    });
    Object.assign(NAV_LIST.style, {
      height: '100vh'
    });
    return;
  }
  Object.assign(NAV_LIST.style, {
    height: 0
  });
  Object.assign(document.body.style, {
    overflowY: null
  });
});

// When navbar link is clicked, reset the active state
NAV_LINKS.forEach(link => {
  link.addEventListener('click', ()=>{
    resetActiveState();
    link.blur();
  })
})

// Handles the hover animation on services section
SERVICE_BOXES.forEach(service => {
  const moveBG = (x, y) => {
    Object.assign(currentServiceBG.style, {
      left: x + 'px',
      top: y + 'px',
    })
  }
  service.addEventListener('mouseenter', (e) => {
    if (currentServiceBG === null) {
      currentServiceBG = service.querySelector('.service-card__bg');
    }
    moveBG(e.clientX, e.clientY);
  });
  service.addEventListener('mousemove', (e) => {
    const LEFT = e.clientX - service.getBoundingClientRect().left;
    const TOP = e.clientY - service.getBoundingClientRect().top;
    moveBG(LEFT, TOP);
  });
  service.addEventListener('mouseleave', () => {
    const IMG_POS = service.querySelector('.service-card__illustration')
    const LEFT = IMG_POS.offsetLeft + currentServiceBG.getBoundingClientRect().width;
    const TOP = IMG_POS.offsetTop + currentServiceBG.getBoundingClientRect().height;

    moveBG(LEFT, TOP);
    currentServiceBG = null;
  });
});

// Handles smooth scrolling
document.querySelectorAll('.nav__list-link').forEach(link => {
  link.addEventListener('click', function(e) {
    e.preventDefault();
    const targetId = this.getAttribute('href').replace('#', '');
    const target = document.getElementById(targetId);
    const navHeight = document.getElementById('navBar').getBoundingClientRect().height;

    const topOffset = target.getBoundingClientRect().top + window.scrollY - navHeight;

    window.scrollTo({
      top: topOffset,
      behavior: 'smooth'
    });
  });
});

// service cards links
function goToLink(url) {
  window.location.href = url;  // Redirect to the provided URL
}

// work cards link handeling
    const workBoxes = document.querySelectorAll('.work__box');

    workBoxes.forEach(box => {
        // Add a click event listener to each work box
        box.addEventListener('click', () => {
            // Get the URL from the data-link attribute
            const link = box.getAttribute('data-link');
            // Redirect the user to the link
            window.location.href = link;
        });
    });

// Select all service cards
     const serviceCards = document.querySelectorAll('.service-card__box');
        
     serviceCards.forEach(card => {
         // Add a click event listener to each card
         card.addEventListener('click', () => {
             // Get the URL from the data-link attribute
             const link = card.getAttribute('data-link');
             // Redirect the user to the link
             window.location.href = link;
         });
     });
