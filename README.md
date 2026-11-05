# Nexus Dash

A clean, modular, and lightweight static admin dashboard template built with pure HTML5, modern CSS3, and vanilla JavaScript. 

Nexus Dash provides a solid, accessible, and responsive foundation for web applications, SaaS backends, CRM portals, e-commerce stores, internal tooling, and developer prototypes—with zero build steps, zero npm packages, and zero framework overhead.

---

## Features

- **Zero Build Step:** Runs directly in any modern browser. No webpack, vite, npm, or transpilation required.
- **Pure Vanilla Stack:** Built exclusively with semantic HTML5, CSS custom properties (variables), and vanilla ES6 JavaScript.
- **Dark Mode Support:** Native light and dark theme switching via `data-theme="dark"` and CSS custom properties.
- **Rich Text Editing:** Pinned CDN integration with **Quill.js** for post creation, product descriptions, campaign drafts, message replies, and notification templates.
- **Interactive Visualizations:** High-performance responsive charts powered by **Chart.js** CDN (Line, Bar, Donut, Pie, Horizontal Bar).
- **Icon System:** Clean vector icons via **Lucide Icons** CDN.
- **Interactive Components:** Accessible modals, confirm dialogs, floating toast notifications, tab navigation, drag-and-drop Kanban pipeline, searchable/sortable/paginated data tables with multi-select checkboxes, and direct CSV export downloads.
- **Responsive Layout System:**
  - **Desktop (>= 1280px):** Fixed navigation sidebar, 6 KPI cards in a single row, dual-column charts.
  - **Tablet (768px - 1279px):** 3-column KPI grid, stacked chart panels, off-canvas navigation drawer.
  - **Mobile (< 768px):** Slide-in navigation drawer with backdrop, 2-column KPI grid, touch-friendly interactive targets (>= 44px), full-screen modal sheets, and horizontally scrollable tables and Kanban board.

---

## Complete Pages Included

| Page | File | Description |
| :--- | :--- | :--- |
| **Dashboard** | `index.html` | KPI metric stat tiles, activity line chart, status donut chart, quick actions, recent events |
| **Analytics** | `analytics.html` | 4 analytical charts (trend, channel, device pie, regional horizontal bar), summary ledger |
| **Users** | `users.html` | Paginated users table with multi-select, sort, status badges, and Add User modal |
| **Customers** | `customers.html` | Client accounts directory with total spend, order count, and search/sort filters |
| **Orders** | `orders.html` | Transaction orders with payment methods, status filters, and CSV export |
| **Products** | `products.html` | Grid view and Table view toggle, stock badges, and Add Product modal with Quill editor |
| **Content** | `content.html` | Articles and post management with draft/published filter, and Quill post editor |
| **Messages** | `messages.html` | Two-pane inbox with contact thread list and compact Quill reply box |
| **Tasks** | `tasks.html` | Three-column Kanban board (To do, In progress, Done) with drag-and-drop cards |
| **Campaigns** | `campaigns.html` | Campaign cards with on/off switch toggles, status pills, and Quill composer modal |
| **Automations** | `automations.html` | Workflow automation cards with trigger/action descriptions and switch toggles |
| **Integrations** | `integrations.html` | Connected third-party cloud tools and payment gateway cards with toggle switches |
| **Reports** | `reports.html` | Financial accounting ledger table with period filter and real CSV export download |
| **Notifications** | `notifications.html` | Notification broadcast center with unread highlights and "Mark all as read" action |
| **Team** | `team.html` | Member directory with inline role modification dropdown and Invite Member modal |
| **Settings** | `settings.html` | Tabbed configuration (Profile, Security, Appearance, Billing) with form validation |
| **Templates** | `templates.html` | Message templates with preview, duplicate action, and Quill template editor modal |
| **Profile** | `profile.html` | Personal administrator details, avatar initials, and editable credentials form |
| **Sign In** | `login.html` | Authentication form with email/password validation, remember-me, and recovery link |
| **Register** | `register.html` | Workspace onboarding form with terms acceptance and field validation |
| **Forgot Password** | `forgot-password.html` | Password recovery request form with instant validation feedback |
| **Not Found (404)** | `404.html` | Standalone error screen with return navigation link |

---

## File Structure

```text
nexus-dash/
├── assets/
│   └── images/          # Placeholder SVGs (avatar, product, empty-state, favicon)
├── config/
│   └── site.js          # App branding, user info, status & plan settings
├── css/
│   └── styles.css       # Complete layout, design rules, variables, dark mode & responsive rules
├── data/
│   └── mock.js          # KPI metrics, chart datasets, users, products, tasks & table rows
├── js/
│   ├── app.js           # Theme toggle, mobile drawer, dropdowns & navigation controller
│   ├── charts.js        # Chart.js initialization (Dashboard & Analytics)
│   ├── editor.js        # Quill.js wrapper with character/word counters & hidden input sync
│   ├── forms.js         # Client-side form validation with accessible error states
│   ├── menu.js          # Sidebar grouped menu configuration and dynamic renderer
│   ├── modals.js        # Accessible modal dialogs with focus trapping and Escape key
│   ├── tables.js        # DataTable engine (search, sort, pagination, multi-select, CSV export)
│   └── toast.js         # Lightweight floating toast notification controller
├── .env.example         # Optional environment configuration template
├── .gitignore           # Version control exclusions
├── index.html           # Main dashboard view
├── LICENSE              # MIT License
└── README.md            # Documentation and usage guide
```

---

## Getting Started

### 1. Run Directly
Because Nexus Dash uses pure static files, you can run it immediately without any tooling:
- Double-click `index.html` or `login.html` to open it directly in Chrome, Edge, Safari, or Firefox.

### 2. Run via Local Static Server (Optional)
```bash
# Python 3
python -m http.server 8000

# Node.js (npx)
npx serve .
```

---

## Customization Guide

### 1. Changing Brand Name and User Profile
Open `config/site.js` and modify `SiteConfig`:

```javascript
const SiteConfig = {
    appName: "Your App Name",
    appSubtitle: "Management Console",
    statusText: "Operational",
    planText: "Enterprise",
    currentUser: {
        name: "Jane Doe",
        initials: "JD",
        role: "System Admin",
        email: "jane.doe@example.com"
    }
};
```

### 2. Modifying the Sidebar Navigation Menu
Open `js/menu.js` to customize groups, icons, labels, or links:

```javascript
const NavigationMenuConfig = [
    {
        groupTitle: "Overview",
        items: [
            { id: "nav-dashboard", label: "Dashboard", icon: "layout-grid", url: "index.html" },
            { id: "nav-analytics", label: "Analytics", icon: "bar-chart-2", url: "analytics.html" }
        ]
    }
];
```
*(Icon names correspond to Lucide Icons).*

### 3. Customizing Colors & Theme
All color properties and spacing are configured via CSS variables at the top of `css/styles.css`:

```css
:root {
    --color-bg: #f8fafc;
    --color-surface: #ffffff;
    --color-primary: #10b981;        /* Primary brand accent */
    --color-primary-hover: #059669;
    --radius-md: 10px;               /* Default border radius */
}

/* Dark mode theme variables */
[data-theme="dark"] {
    --color-bg: #090d16;
    --color-surface: #131c2e;
}
```

### 4. Adding a New Page
1. Duplicate `index.html` (or `users.html` for a table page) and name it (e.g. `inventory.html`).
2. Replace the `<main>` container content with your specific markup.
3. Add the item to `NavigationMenuConfig` in `js/menu.js`. The sidebar will automatically highlight it when active.

---

## License

This project is open-source and released under the [MIT License](LICENSE).
