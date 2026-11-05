/**
 * Nexus Dash - Navigation Menu
 * Purpose: Declares the grouped sidebar navigation hierarchy and injects items into navigation containers.
 */

const NavigationMenuConfig = [
    {
        groupTitle: "Overview",
        items: [
            { id: "nav-dashboard", label: "Dashboard", icon: "layout-grid", url: "index.html", active: true },
            { id: "nav-analytics", label: "Analytics", icon: "bar-chart-2", url: "#", badge: null },
            { id: "nav-reports", label: "Reports", icon: "file-text", url: "#", badge: null }
        ]
    },
    {
        groupTitle: "Management",
        items: [
            { id: "nav-users", label: "Users", icon: "users", url: "#", badge: null },
            { id: "nav-customers", label: "Customers", icon: "contact", url: "#", badge: null },
            { id: "nav-orders", label: "Orders", icon: "shopping-cart", url: "#", badge: null },
            { id: "nav-products", label: "Products", icon: "package", url: "#", badge: null },
            { id: "nav-content", label: "Content", icon: "file-edit", url: "#", badge: null },
            { id: "nav-messages", label: "Messages", icon: "mail", url: "#", badge: "5" }
        ]
    },
    {
        groupTitle: "Operations",
        items: [
            { id: "nav-campaigns", label: "Campaigns", icon: "megaphone", url: "#", badge: null },
            { id: "nav-tasks", label: "Tasks", icon: "check-circle", url: "#", badge: null },
            { id: "nav-automations", label: "Automations", icon: "zap", url: "#", badge: null },
            { id: "nav-integrations", label: "Integrations", icon: "plug", url: "#", badge: null }
        ]
    },
    {
        groupTitle: "Settings",
        items: [
            { id: "nav-templates", label: "Templates", icon: "layout", url: "#", badge: null },
            { id: "nav-notifications", label: "Notifications", icon: "bell", url: "#", badge: null },
            { id: "nav-team", label: "Team", icon: "shield", url: "#", badge: null },
            { id: "nav-settings", label: "Settings", icon: "settings", url: "#", badge: null }
        ]
    }
];

function renderSidebarNavigation(targetContainerId) {
    const container = document.getElementById(targetContainerId);
    if (!container) return;

    let markup = "";

    NavigationMenuConfig.forEach((group) => {
        markup += `<div class="sidebar-group">`;
        if (group.groupTitle) {
            markup += `<h3 class="sidebar-group-title">${group.groupTitle}</h3>`;
        }
        markup += `<ul class="sidebar-menu-list">`;

        group.items.forEach((item) => {
            const activeClass = item.active ? " active" : "";
            const ariaCurrent = item.active ? ` aria-current="page"` : "";
            
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
}
