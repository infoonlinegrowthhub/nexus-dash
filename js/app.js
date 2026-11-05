/**
 * Nexus Dash - Main Application Controller
 * Purpose: Handles DOM population, mobile drawer interactions, user dropdowns, and icon initialization.
 */

document.addEventListener("DOMContentLoaded", () => {
    populateSiteConfig();
    renderNavigation();
    renderKpiCards();
    renderQuickActions();
    renderRecentRecords();
    setupEventListeners();

    // Initialize Lucide Icons
    if (window.lucide) {
        window.lucide.createIcons();
    }

    // Initialize Charts
    if (typeof initCharts === "function") {
        initCharts();
    }
});

/**
 * Injects brand & user configuration from config/site.js
 */
function populateSiteConfig() {
    if (typeof SiteConfig === "undefined") return;

    // Brand headers
    document.querySelectorAll(".site-brand-title").forEach(el => el.textContent = SiteConfig.appName);
    document.querySelectorAll(".site-brand-subtitle").forEach(el => el.textContent = SiteConfig.appSubtitle);

    // Status & Plan Pills
    const statusTextEl = document.getElementById("topbar-status-text");
    if (statusTextEl) statusTextEl.textContent = SiteConfig.statusText;

    const planTextEl = document.getElementById("topbar-plan-text");
    if (planTextEl) planTextEl.textContent = SiteConfig.planText;

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

    // Document Title
    document.title = `${SiteConfig.appName} - ${SiteConfig.appSubtitle}`;
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
 * Injects 6 KPI Metric Cards from data/mock.js
 */
function renderKpiCards() {
    const container = document.getElementById("kpi-cards-grid");
    if (!container || typeof KpiMetricsData === "undefined") return;

    let html = "";
    KpiMetricsData.forEach(card => {
        const trendClass = card.trendUp ? "up" : "down";
        const trendIcon = card.trendUp ? "trending-up" : "trending-down";

        html += `
            <div class="kpi-card" id="${card.id}">
                <div class="kpi-card-header">
                    <div class="kpi-icon-box">
                        <i data-lucide="${card.icon}" style="width: 17px; height: 17px;"></i>
                    </div>
                    <span class="kpi-trend-pill ${trendClass}">
                        <i data-lucide="${trendIcon}" style="width: 12px; height: 12px;"></i>
                        ${card.trend}
                    </span>
                </div>
                <div class="kpi-card-body">
                    <div class="kpi-value">${card.value}</div>
                    <div class="kpi-label">${card.label}</div>
                    <div class="kpi-caption">${card.caption}</div>
                </div>
            </div>
        `;
    });

    container.innerHTML = html;
}

/**
 * Injects Quick Action tiles from data/mock.js
 */
function renderQuickActions() {
    const container = document.getElementById("quick-actions-grid");
    if (!container || typeof QuickActionsData === "undefined") return;

    let html = "";
    QuickActionsData.forEach(action => {
        html += `
            <button type="button" class="action-tile" id="${action.id}" aria-label="${action.title}">
                <div class="action-tile-icon">
                    <i data-lucide="${action.icon}" style="width: 16px; height: 16px;"></i>
                </div>
                <span class="action-tile-title">${action.title}</span>
                <span class="action-tile-desc">${action.description}</span>
            </button>
        `;
    });

    container.innerHTML = html;
}

/**
 * Injects Recent Records table rows from data/mock.js
 */
function renderRecentRecords() {
    const tbody = document.getElementById("recent-records-tbody");
    if (!tbody || typeof RecentRecordsData === "undefined") return;

    let html = "";
    RecentRecordsData.forEach(item => {
        let badgeClass = "badge-info";
        if (item.statusType === "success") badgeClass = "badge-success";
        if (item.statusType === "warning") badgeClass = "badge-warning";

        html += `
            <tr>
                <td style="font-weight: 600; color: #64748b;">${item.id}</td>
                <td style="font-weight: 600;">${item.title}</td>
                <td>${item.category}</td>
                <td>${item.account}</td>
                <td style="font-weight: 600;">${item.budget}</td>
                <td><span class="badge ${badgeClass}">${item.status}</span></td>
            </tr>
        `;
    });

    tbody.innerHTML = html;
}

/**
 * UI Event Listeners for mobile drawer, dropdowns, and chart controls
 */
function setupEventListeners() {
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

    // Chart Time Range Select
    const timeRangeSelect = document.getElementById("chart-time-range");
    if (timeRangeSelect && typeof updateActivityChart === "function") {
        timeRangeSelect.addEventListener("change", (e) => {
            updateActivityChart(e.target.value);
        });
    }

    // Escape Key Handler
    document.addEventListener("keydown", (e) => {
        if (e.key === "Escape") {
            closeMobileSidebar();
            if (userDropdown) userDropdown.classList.remove("show");
        }
    });
}
