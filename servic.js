// 🔓 Open the Modal
function openModal() {
  const modal = document.getElementById('modalOverlay');
  modal.style.display = 'flex';

  // Allow closing on backdrop click
  modal.addEventListener('click', (e) => {
    if (e.target === modal) {
      closeModal();
    }
  });
}

// 🔒 Close the Modal
function closeModal() {
  const modal = document.getElementById('modalOverlay');
  modal.style.display = 'none';
}

// 🎯 Tab Switching Logic
function showTab(index) {
  const tabs = document.querySelectorAll(".this");
  tabs.forEach((tab, i) => {
    tab.style.display = i === index ? "block" : "none";
  });
}


// toggleAccordion: Toggles accordion behavior with dynamic button text.
function toggleAccordion(button) {
  const content = button.nextElementSibling;
  if (content.style.display === "block") {
    content.style.display = "none";
    button.textContent = "➕ Accordion Title"; // Reset the button text to '+' when closed.
  } else {
    content.style.display = "block";
    button.textContent = "➖ Accordion Title"; // Change button text to '-' when opened.
  }
}

// showToast: Displays a toast notification and hides it after 3 seconds.
function showToast() {
  const toast = document.getElementById("toast");
  toast.style.display = "block";
  setTimeout(() => {
    toast.style.display = "none";
  }, 3000);
}

// Tooltip functionality: Show/hide the tooltip when hovering over the trigger element.
const tooltip = document.getElementById('tooltip');
if (tooltip) {
  const trigger = tooltip.parentElement;

  trigger.addEventListener('mouseenter', () => {
    tooltip.style.visibility = 'visible';
    tooltip.style.opacity = '1';
    tooltip.style.transition = 'opacity 0.3s ease-in-out'; // Optional transition for smooth fade.
  });

  trigger.addEventListener('mouseleave', () => {
    tooltip.style.visibility = 'hidden';
    tooltip.style.opacity = '0';
    tooltip.style.transition = 'opacity 0.3s ease-in-out'; // Optional transition for smooth fade.
  });
}
 // Toggle Dropdown Visibility
 function toggleDropdown() {
  const dropdown = document.querySelector('.dropdown-content');
  dropdown.classList.toggle('active');
}

// Select Option and Replace Button Text
function selectOption(option) {
  const button = document.querySelector('.toggle-btn');
  button.textContent = option;
  toggleDropdown(); // Close the dropdown after selection
}

function toggleStyle() {
  const button = document.getElementById('toggle-style-btn');
  const icon = document.getElementById('toggle-icon');
  const toast = document.getElementById('toast');
  const stylesheet = document.getElementById('stylesheet');

  // Check if style.css is already included
  if (stylesheet.href.includes('style.css')) {
    // Switch to Normal Mode (remove the developer stylesheet)
    stylesheet.href = "";
    icon.src = 'https://img.icons8.com/ios-filled/50/ffffff/book.png'; // Normal mode icon
    showToast("Normal mode activated");
  } else {
    // Switch to Developer Mode (apply style.css)
    stylesheet.href = "style.css";
    icon.src = 'https://img.icons8.com/ios-filled/50/ffffff/source-code.png'; // Developer mode icon
    showToast("Developer mode activated");
  }
}

// link redirection with btn
function goToLink(url) {
  window.location.href = url;  // Redirect to the provided URL
}




function showToast(message) {
  const toast = document.getElementById('toast');
  toast.textContent = message;
  toast.classList.add('show');
  setTimeout(() => {
    toast.classList.remove('show');
  }, 2500);
}
 // Reveal both the SEO code and breakdown
 function toggleSEO() {
  const section = document.getElementById("seo-section");
  const seoCodeBlock = document.getElementById("seo-code-block");
  const seoBreakdown = document.getElementById("seo-breakdown");

  if (section.style.display === "none") {
    section.style.display = "block";
    // Add SEO code to the section
    seoCodeBlock.innerHTML = "";
    codeSnippets.seo.forEach((line, index) => {
      setTimeout(() => {
        const div = document.createElement('div');
        div.innerHTML = line;
        div.style.animation = "fadeInLine 0.3s ease forwards";
        div.style.opacity = 0;
        div.style.marginBottom = "4px";
        seoCodeBlock.appendChild(div);
      }, index * 100);
    });

    // Reveal SEO breakdown
    seoBreakdown.style.display = "block";
  } else {
    section.style.display = "none";
    seoCodeBlock.innerHTML = "";
    seoBreakdown.style.display = "none";
  }
}

// Reveal both the server-side code and breakdown
function toggleServerSide() {
  const section = document.getElementById("server-side-section");
  const serverCodeBlock = document.getElementById("server-code-block");
  const serverBreakdown = document.getElementById("server-breakdown");

  if (section.style.display === "none") {
    section.style.display = "block";
    // Add server-side code to the section
    serverCodeBlock.innerHTML = "";
    codeSnippets.server.forEach((line, index) => {
      setTimeout(() => {
        const div = document.createElement('div');
        div.innerHTML = line;
        div.style.animation = "fadeInLine 0.3s ease forwards";
        div.style.opacity = 0;
        div.style.marginBottom = "4px";
        serverCodeBlock.appendChild(div);
      }, index * 100);
    });

    // Reveal server-side breakdown
    serverBreakdown.style.display = "block";
  } else {
    section.style.display = "none";
    serverCodeBlock.innerHTML = "";
    serverBreakdown.style.display = "none";
  }
}
// developer mode fk shit:
let draggedElement = null;

function toggleStyle2() {
const sections = document.querySelectorAll('.tab-content');

sections.forEach(section => {
section.setAttribute('draggable', true);

// Add event listeners for drag events
section.addEventListener('dragstart', onDragStart);
section.addEventListener('dragend', onDragEnd);
section.addEventListener('dragover', onDragOver);
section.addEventListener('drop', onDrop);
});
}

// Handle the drag start event
function onDragStart(event) {
draggedElement = event.target; // Store the element being dragged
event.target.classList.add('dragging'); // Add a class for visual feedback
event.target.style.opacity = '0.5'; // Slightly fade the dragged element for visual effect
}

// Handle the drag end event
function onDragEnd(event) {
event.target.classList.remove('dragging'); // Remove the dragging class
event.target.style.opacity = '1'; // Reset opacity
draggedElement = null;
}

// Handle the drag over event (while dragging)
function onDragOver(event) {
event.preventDefault(); // Allow the drop by preventing default behavior
}

// Handle the drop event (when the drag ends over a valid target)
function onDrop(event) {
event.preventDefault();

const target = event.target;

// Validate if the drop is happening on a valid section
if (!target.classList.contains('tab-content') || target === draggedElement) {
return; // Don't do anything if it's not a valid target
}

// Check if the drop is within valid bounds (avoiding the bug of sticking to the bottom)
const rect = target.getBoundingClientRect();
const mouseY = event.clientY;

if (mouseY < rect.top || mouseY > rect.bottom) {
return; // Don't allow the drop if it's outside the valid drop area
}

// Proceed with the drop and move the dragged element
target.appendChild(draggedElement);
draggedElement.style.position = 'relative'; // Reset position if needed
draggedElement.style.top = '0px'; // Reset top position (optional)
}