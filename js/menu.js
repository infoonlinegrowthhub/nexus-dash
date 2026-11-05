/**
 * Nexus Dash - Navigation Menu
 * Purpose: Declares the grouped sidebar navigation hierarchy and injects items into navigation containers.
 */

const NavigationMenuConfig = [
    {
        groupTitle: "Overview",
        items: [
            { id: "nav-dashboard", label: "Dashboard", icon: "layout-grid", url: "index.html" },
            { id: "nav-analytics", label: "Analytics", icon: "bar-chart-2", url: "analytics.html" },
            { id: "nav-reports", label: "Reports", icon: "file-text", url: "reports.html" }
        ]
    },
    {
        groupTitle: "Management",
        items: [
            { id: "nav-users", label: "Users", icon: "users", url: "users.html" },
            { id: "nav-customers", label: "Customers", icon: "contact", url: "customers.html" },
            { id: "nav-orders", label: "Orders", icon: "shopping-cart", url: "orders.html" },
            { id: "nav-products", label: "Products", icon: "package", url: "products.html" },
            { id: "nav-content", label: "Content", icon: "file-edit", url: "content.html" },
            { id: "nav-messages", label: "Messages", icon: "mail", url: "messages.html", badge: "2" }
        ]
    },
    {
        groupTitle: "Operations",
        items: [
            { id: "nav-campaigns", label: "Campaigns", icon: "megaphone", url: "campaigns.html" },
            { id: "nav-tasks", label: "Tasks", icon: "check-circle", url: "tasks.html" },
            { id: "nav-automations", label: "Automations", icon: "zap", url: "automations.html" },
            { id: "nav-integrations", label: "Integrations", icon: "plug", url: "integrations.html" }
        ]
    },
    {
        groupTitle: "Settings",
        items: [
            { id: "nav-templates", label: "Templates", icon: "layout", url: "templates.html" },
            { id: "nav-notifications", label: "Notifications", icon: "bell", url: "notifications.html", badge: "4" },
            { id: "nav-team", label: "Team", icon: "shield", url: "team.html" },
            { id: "nav-settings", label: "Settings", icon: "settings", url: "settings.html" }
        ]
    }
];

function renderSidebarNavigation(targetContainerId, activePageOverride = null) {
    const container = document.getElementById(targetContainerId);
    if (!container) return;

    // Determine current active page
    let currentPage = activePageOverride;
    if (!currentPage) {
        const path = window.location.pathname;
        const page = path.split("/").pop();
        currentPage = page && page !== "" ? page : "index.html";
    }

    let markup = "";

    NavigationMenuConfig.forEach((group) => {
        markup += `<div class="sidebar-group">`;
        if (group.groupTitle) {
            markup += `<h3 class="sidebar-group-title">${group.groupTitle}</h3>`;
        }
        markup += `<ul class="sidebar-menu-list">`;

        group.items.forEach((item) => {
            const isActive = item.url === currentPage;
            const activeClass = isActive ? " active" : "";
            const ariaCurrent = isActive ? ` aria-current="page"` : "";
            
            markup += `
                <li class="sidebar-menu-item">
                    <a href="${item.url}" class="sidebar-link${activeClass}" id="${item.id}"${ariaCurrent}>
                        <div class="sidebar-link-content">
                            <i data-lucide="${item.icon}" class="sidebar-icon"></i>
                            <span class="sidebar-link-label">${item.label}</span>
                        </div>
                        ${item.badge ? `<span class="sidebar-badge">${item.badge}</span>` : ""}
                    </a>
                </li>
            `;
        });

        markup += `</ul></div>`;
    });

    container.innerHTML = markup;

    // Refresh Lucide icons inside navigation if already initialized
    if (window.lucide && typeof window.lucide.createIcons === "function") {
        window.lucide.createIcons();
    }
}
