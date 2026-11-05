# Nexus Dash (NexusDash)

[![License: MIT](https://img.shields.io/badge/License-MIT-emerald.svg)](LICENSE)
[![Zero Build](https://img.shields.io/badge/Build-Zero%20Build%20%2F%20Pure%20Vanilla-blue.svg)](index.html)
[![Responsive](https://img.shields.io/badge/Responsive-Mobile%20%7C%20Tablet%20%7C%20Desktop-purple.svg)](index.html)
[![Dark Mode](https://img.shields.io/badge/Theme-Light%20%26%20Dark%20Mode-slate.svg)](index.html)

A modern, lightweight, and fully responsive administrative dashboard template built with **pure HTML5, modern CSS3, and vanilla JavaScript**. 

Nexus Dash provides a robust, production-grade starting point for web applications, SaaS dashboards, e-commerce admin panels, CRM systems, schools, non-profits, and developer internal tools—**with zero build steps, zero npm dependencies, and zero framework lock-in**.

---

## 💼 Custom Development & Engineering

**Nexus Dash** is engineered and maintained by **[Online Growth Hub](https://onlinegrowthhub.in/)**.

Need custom enterprise features, bespoke ERP/CRM development, full-stack web applications, or API integrations?
- **Official Website:** [onlinegrowthhub.in](https://onlinegrowthhub.in/)
- **Hire Us on WhatsApp:** [+91 9032666855](https://wa.me/919032666855?text=Hi%20Online%20Growth%20Hub,%20I%20am%20interested%20in%20custom%20software%20and%20web%20development.)
- **Direct Phone:** +91 9032666855

---

## Key Highlights

- **Zero Build Step:** Double-click `index.html` to run immediately in any browser. No Webpack, Vite, npm, or transpilation required.
- **Pure Vanilla Stack:** Semantic HTML5, modern CSS custom properties (variables), and clean vanilla ES6 JavaScript.
- **Prebuilt Complete Screens:** 22 ready-to-use HTML pages covering every common administrative workflow.
- **Native Dark Mode:** Instant light/dark theme toggle stored in `localStorage` with zero layout flicker.
- **Rich Text Editing:** Pinned CDN integration with **Quill.js** for articles, products, campaigns, message replies, and notification templates.
- **Interactive Visualizations:** Responsive charts powered by **Chart.js** CDN (Line, Bar, Donut, Pie, Horizontal Bar).
- **Clean Vector Icons:** Scalable vector icons via **Lucide Icons** CDN.
- **Interactive Components:** Accessible modals, confirm dialogs, toast notifications, drag-and-drop Kanban pipeline, searchable/sortable/paginated data tables with multi-select checkboxes, and real CSV downloads.
- **100% Responsive Grid:** Tested across mobile (360px, 390px), tablet (768px, 1024px), laptop (1280px), and desktop (1440px, 1920px) viewports with zero horizontal overflow and touch targets $\ge$ 44px.

---

## Complete Prebuilt Pages (22 Available)

| Category | Page | File | Key Capabilities |
| :--- | :--- | :--- | :--- |
| **Overview** | **Dashboard** | [`index.html`](index.html) | 6 KPI metric tiles, activity line chart, status donut chart, quick actions, showcase grid |
| | **Analytics** | [`analytics.html`](analytics.html) | 4 Chart.js charts (traffic trend, sales bar, device pie, regional bar) and summary ledger |
| | **Reports** | [`reports.html`](reports.html) | Financial accounting ledger table with period filter and real CSV export download |
| **Management** | **Users** | [`users.html`](users.html) | Paginated data table with multi-select checkboxes, sorting, and Add User modal |
| | **Customers** | [`customers.html`](customers.html) | Client directory with lifetime spend, orders, status filters, and CSV export |
| | **Orders** | [`orders.html`](orders.html) | Order fulfillment table with payment methods, status badges, and CSV export |
| | **Products** | [`products.html`](products.html) | Grid view and Table view toggle, stock badges, and Add Product modal with Quill editor |
| | **Content** | [`content.html`](content.html) | Article list with draft/published filter, and Quill post editor with word/char counters |
| | **Messages** | [`messages.html`](messages.html) | Two-pane inbox with active contact thread list and compact Quill reply composer |
| **Operations** | **Campaigns** | [`campaigns.html`](campaigns.html) | Campaign cards with on/off switch toggles, status pills, and Quill composer modal |
| | **Tasks** | [`tasks.html`](tasks.html) | Three-column Kanban board (To do, In progress, Done) with HTML5 drag-and-drop |
| | **Automations** | [`automations.html`](automations.html) | Workflow trigger/action automation cards with toggle switches |
| | **Integrations** | [`integrations.html`](integrations.html) | Connected cloud services and payment gateways with connect/disconnect toggles |
| **Settings** | **Templates** | [`templates.html`](templates.html) | Reusable message templates with preview, duplicate action, and Quill template editor |
| | **Notifications** | [`notifications.html`](notifications.html) | Notification broadcast center with unread highlights and "Mark all as read" |
| | **Team** | [`team.html`](team.html) | Team directory with inline role selection and Invite Member modal |
| | **Settings** | [`settings.html`](settings.html) | Tabbed preferences (Profile, Security, Appearance, Billing) with form validation |
| **Account** | **Profile** | [`profile.html`](profile.html) | Administrator profile, avatar initials, and editable credentials form |
| **Auth** | **Sign In** | [`login.html`](login.html) | Authentication form with email/password validation, remember-me, and recovery link |
| | **Register** | [`register.html`](register.html) | Workspace onboarding form with terms acceptance and field validation |
| | **Forgot Password** | [`forgot-password.html`](forgot-password.html) | Password recovery request form with instant validation feedback |
| **Error** | **Not Found (404)** | [`404.html`](404.html) | Standalone error screen with return navigation link |

---

## File Structure

```text
nexus-dash/
├── assets/
│   └── images/          # Clean SVG vector assets (avatar, product, empty-state, favicon)
├── config/
│   └── site.js          # App branding, user info, and configuration values
├── css/
│   └── styles.css       # Complete layout, design values, dark mode & responsive rules
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
├── .env.example         # Optional environment configuration placeholder
├── .gitignore           # Version control exclusions
├── index.html           # Main dashboard view
├── LICENSE              # MIT License
└── README.md            # Documentation and usage guide
```

---

## Getting Started

### 1. Open Directly in Browser
Because Nexus Dash uses pure static files without compile steps:
- Double-click `index.html` or `login.html` to open it immediately in Chrome, Edge, Safari, Brave, or Firefox.

### 2. Run via Local Static Server (Optional)
```bash
# Using Python 3
python -m http.server 8000

# Using Node.js (npx)
npx serve .
```

---

## How to Customize

### 1. Brand Name & User Profile
Open `config/site.js` and modify `SiteConfig`:
```javascript
const SiteConfig = {
    appName: "Your App Name",
    appSubtitle: "Admin Console",
    statusText: "System healthy",
    currentUser: {
        name: "Admin User",
        initials: "AU",
        role: "Administrator",
        email: "admin@example.com"
    }
};
```

### 2. Sidebar Navigation Items
Open `js/menu.js` to modify links, icons, or groups. Every link automatically receives the `active` highlight based on the current URL.

### 3. Styling & Color Palette
All colors and metrics are defined at the top of `css/styles.css`:
```css
:root {
    --color-primary: #10b981;        /* Primary brand accent */
    --color-primary-hover: #059669;  /* Hover state */
    --color-surface: #ffffff;        /* Card surface */
    --color-bg: #f8fafc;             /* Page background */
    --radius-md: 10px;               /* Default border radius */
}

/* Dark mode theme variables */
[data-theme="dark"] {
    --color-bg: #090d16;
    --color-surface: #131c2e;
}
```

---

## Credits & License

- **Engineered by:** [Online Growth Hub](https://onlinegrowthhub.in/)
- **Hire Us for Custom Development:** [+91 9032666855](https://wa.me/919032666855?text=Hi%20Online%20Growth%20Hub,%20I%20am%20interested%20in%20custom%20software%20and%20web%20development.)
- **License:** Open source under the [MIT License](LICENSE).
