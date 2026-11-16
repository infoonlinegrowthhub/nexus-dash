/**
 * Nexus Dash - Global Application Controller
 * Purpose: Manages layout initialization, dark mode theme switching, mobile drawer, dropdowns, and icon rendering.
 */

document.addEventListener("DOMContentLoaded", () => {
    initTheme();
    populateSiteConfig();
    renderNavigation();
    setupGlobalEventListeners();

    // Initialize Lucide Icons
    if (window.lucide && typeof window.lucide.createIcons === "function") {
        window.lucide.createIcons();
    }
});

/**
 * Initializes and switches Light / Dark Mode theme
 */
function initTheme() {
    const savedTheme = localStorage.getItem("nexus_theme") || "light";
    setTheme(savedTheme);

    const themeToggleBtns = document.querySelectorAll(".theme-toggle-btn");
    themeToggleBtns.forEach(btn => {
        btn.addEventListener("click", () => {
            const currentTheme = document.documentElement.getAttribute("data-theme") || "light";
            const nextTheme = currentTheme === "dark" ? "light" : "dark";
            setTheme(nextTheme);
        });
    });
}

function setTheme(theme) {
    document.documentElement.setAttribute("data-theme", theme);
    localStorage.setItem("nexus_theme", theme);

    if (window.Chart) {
        Chart.defaults.color = theme === "dark" ? "#cbd5e1" : "#334155";
        Chart.defaults.borderColor = theme === "dark" ? "#334155" : "#e2e8f0";
    }

    // Update icon states if toggle button exists
    const themeIcons = document.querySelectorAll(".theme-icon");
    themeIcons.forEach(icon => {
        if (theme === "dark") {
            icon.setAttribute("data-lucide", "sun");
        } else {
            icon.setAttribute("data-lucide", "moon");
        }
    });

    if (window.lucide && typeof window.lucide.createIcons === "function") {
        window.lucide.createIcons();
    }
}

/**
 * Injects brand & user configuration from config/site.js
 */
function populateSiteConfig() {
    if (typeof SiteConfig === "undefined") return;

    // Brand headers
    document.querySelectorAll(".site-brand-title").forEach(el => el.textContent = SiteConfig.appName);
    document.querySelectorAll(".site-brand-subtitle").forEach(el => el.textContent = SiteConfig.appSubtitle);

    // Status Pill
    const statusTextEl = document.getElementById("topbar-status-text");
    if (statusTextEl) statusTextEl.textContent = SiteConfig.statusText;

    // User details
    const userNameEl = document.getElementById("topbar-user-name");
    if (userNameEl) userNameEl.textContent = SiteConfig.currentUser.name;

    const userRoleEl = document.getElementById("topbar-user-role");
    if (userRoleEl) userRoleEl.textContent = SiteConfig.currentUser.role;

    const greetingUserEl = document.getElementById("greeting-user-name");
    if (greetingUserEl) greetingUserEl.textContent = SiteConfig.currentUser.name;

    // User Initials
    document.querySelectorAll(".user-initials").forEach(el => {
        el.textContent = SiteConfig.currentUser.initials;
    });

    // Dropdown Details
    const dropdownNameEl = document.getElementById("dropdown-user-name");
    if (dropdownNameEl) dropdownNameEl.textContent = SiteConfig.currentUser.name;

    const dropdownEmailEl = document.getElementById("dropdown-user-email");
    if (dropdownEmailEl) dropdownEmailEl.textContent = SiteConfig.currentUser.email;
}

/**
 * Builds the sidebar navigation from js/menu.js
 */
function renderNavigation() {
    if (typeof renderSidebarNavigation === "function") {
        renderSidebarNavigation("sidebar-nav-container");
    }
}

/**
 * Global UI Event Listeners for mobile drawer, dropdowns, and escape key
 */
function setupGlobalEventListeners() {
    const sidebar = document.getElementById("app-sidebar");
    const backdrop = document.getElementById("sidebar-backdrop");
    const openBtn = document.getElementById("mobile-menu-open-btn");
    const closeBtn = document.getElementById("mobile-menu-close-btn");

    function openMobileSidebar() {
        if (sidebar && backdrop) {
            sidebar.classList.add("sidebar-open");
            backdrop.classList.add("show");
            document.body.style.overflow = "hidden";
        }
    }

    function closeMobileSidebar() {
        if (sidebar && backdrop) {
            sidebar.classList.remove("sidebar-open");
            backdrop.classList.remove("show");
            document.body.style.overflow = "";
        }
    }

    if (openBtn) openBtn.addEventListener("click", openMobileSidebar);
    if (closeBtn) closeBtn.addEventListener("click", closeMobileSidebar);
    if (backdrop) backdrop.addEventListener("click", closeMobileSidebar);

    // User Dropdown
    const userMenuBtn = document.getElementById("user-menu-btn");
    const userDropdown = document.getElementById("user-dropdown-menu");

    if (userMenuBtn && userDropdown) {
        userMenuBtn.addEventListener("click", (e) => {
            e.stopPropagation();
            userDropdown.classList.toggle("show");
        });

        document.addEventListener("click", (e) => {
            if (!userMenuBtn.contains(e.target) && !userDropdown.contains(e.target)) {
                userDropdown.classList.remove("show");
            }
        });
    }

    // Escape Key Handler for accessibility
    document.addEventListener("keydown", (e) => {
        if (e.key === "Escape") {
            closeMobileSidebar();
            if (userDropdown) userDropdown.classList.remove("show");
            if (typeof closeModal === "function") {
                const openModals = document.querySelectorAll(".modal-overlay.modal-open");
                openModals.forEach(m => closeModal(m.id));
            }
        }
    });

    // Tab Navigation Components
    const tabGroups = document.querySelectorAll(".tab-navigation");
    tabGroups.forEach(group => {
        const tabs = group.querySelectorAll(".tab-btn");
        tabs.forEach(tab => {
            tab.addEventListener("click", () => {
                const targetId = tab.getAttribute("data-tab-target");
                tabs.forEach(t => t.classList.remove("active"));
                tab.classList.add("active");

                const parentCard = group.closest(".tab-container") || document;
                const panes = parentCard.querySelectorAll(".tab-pane");
                panes.forEach(pane => {
                    pane.classList.remove("active");
                    if (pane.id === targetId) {
                        pane.classList.add("active");
                    }
                });
            });
        });
    });
}
