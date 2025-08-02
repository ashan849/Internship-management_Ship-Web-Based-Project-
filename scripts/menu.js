// Function to toggle the navigation menu
function toggleNavMenu() {
    const navMenu = document.getElementById("navMenu");
    if (navMenu) {
        navMenu.classList.toggle("active");
    }
}

// Event listeners
document.addEventListener("DOMContentLoaded", function() {
    const menuToggle = document.getElementById("menuToggle");
    if (menuToggle) {
        menuToggle.addEventListener("click", toggleNavMenu);
    }
});

// You can add more functions and event listeners as needed
