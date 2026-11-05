# Nexus Dash

A clean, modular, and lightweight static admin dashboard template built with pure HTML5, modern CSS3, and vanilla JavaScript. 

Nexus Dash provides a solid, accessible, and responsive foundation for web applications, SaaS backends, internal tools, and developer prototypes—with zero build steps, zero npm packages, and zero framework overhead.

---

## Features

- **Zero Build Step:** Runs directly in any modern browser. No webpack, vite, npm, or transpilation required.
- **Pure Vanilla Stack:** Built exclusively with semantic HTML5, CSS custom properties (variables), and vanilla ES6 JavaScript.
- **Responsive Layout System:**
  - **Desktop (>= 1100px):** Fixed navigation sidebar, 6 KPI cards in a single row, dual-column charts.
  - **Tablet (768px - 1099px):** 3-column KPI grid, stacked chart panels.
  - **Mobile (< 768px):** Slide-in off-canvas navigation drawer with backdrop, 2-column KPI grid, touch-friendly interactive targets, and horizontally scrollable data tables.
- **Dynamic Modular Configuration:**
  - Site title, subtitle, status pills, and user profile configured in a single file (`config/site.js`).
  - Navigation hierarchy and menu groups configured in `js/menu.js`.
  - Metrics, chart series, action tiles, and sample data isolated in `data/mock.js`.
- **Integrated CDN Visuals:**
  - Modern icon set via **Lucide Icons**.
  - Interactive line and donut charts via **Chart.js**.

---

## File Structure

```text
nexus-dash/
├── config/
│   └── site.js          # App branding, user info, and status settings
├── css/
│   └── styles.css       # Complete layout, design rules, variables & responsive rules
├── data/
│   └── mock.js          # KPI metrics, chart datasets, quick actions & table rows
├── js/
│   ├── app.js           # DOM controller, mobile drawer, dropdowns & event handlers
│   ├── charts.js        # Chart.js initialization and dynamic range filtering
│   └── menu.js          # Sidebar navigation data structure and dynamic renderer
├── .env.example         # Optional environment configuration template
├── .gitignore           # Git ignore rules for clean repository management
├── index.html           # Main semantic dashboard view
├── LICENSE              # MIT License
└── README.md            # Documentation and usage guide
```

---

## Getting Started

### 1. Run Locally
Because Nexus Dash uses pure static files, you can run it immediately:
- **Directly:** Double-click `index.html` to open it in your browser.
- **Via Local Server (Optional):**
  ```bash
  # Python 3
  python -m http.server 8000

  # Node.js (npx)
  npx serve .
  ```
  Then navigate to `http://127.0.0.1:8000` in your web browser.

---

## Customization Guide

### 1. Changing Brand Name and User Profile
Open `config/site.js` and modify the values in `SiteConfig`:

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
The topbar, sidebar, page titles, and user profile cards update automatically.

---

### 2. Modifying Sidebar Menu Items
Open `js/menu.js` to add, edit, or remove menu categories and links:

```javascript
const NavigationMenuConfig = [
    {
        groupTitle: "Overview",
        items: [
            { id: "nav-dashboard", label: "Dashboard", icon: "layout-grid", url: "index.html", active: true },
            { id: "nav-analytics", label: "Analytics", icon: "bar-chart-2", url: "analytics.html", badge: null }
        ]
    },
    // Add additional groups as needed
];
```

*Note: For the `icon` field, use any icon name supported by [Lucide Icons](https://lucide.dev/icons).*

---

### 3. Customizing Colors & Theme
All theme properties are defined as CSS variables at the top of `css/styles.css`:

```css
:root {
    --color-bg: #f8fafc;
    --color-surface: #ffffff;
    --color-primary: #10b981;        /* Primary brand accent */
    --color-primary-hover: #059669;
    --color-text-main: #0f172a;
    --radius-md: 10px;               /* Global border radius */
}
```
Adjusting these values updates the theme uniformly across all components.

---

### 4. Updating Dashboard Metrics and Charts
Open `data/mock.js`:
- Edit `KpiMetricsData` to customize the 6 stat cards (label, value, trend percentage, icon).
- Edit `ChartDataSets.activity` to update the 7-day, 30-day, and 90-day chart numbers.
- Edit `QuickActionsData` to define custom action tiles.

---

### 5. Adding a New Page
To create a new subpage (e.g., `customers.html`):
1. Duplicate `index.html` and save it as `customers.html`.
2. In `customers.html`, replace the `<main>` content section with your new view markup.
3. In `js/menu.js`, set `active: true` for the corresponding menu item when loading that page.

---

## Pushing to GitHub

To publish this project to your GitHub repository:

```bash
git init
git add .
git commit -m "feat: initial commit for Nexus Dash admin template"
git branch -M main
git remote add origin https://github.com/infoonlinegrowthhub/nexus-dash.git
git push -u origin main
```

---

## License

This project is open-source and released under the [MIT License](LICENSE).
