# ⚡ NexusDash — Modular Production PHP Dashboard & Application Framework

[![Engineered by Online Growth Hub](https://img.shields.io/badge/Engineered%20By-Online%20Growth%20Hub-blue?style=for-the-badge)](https://onlinegrowthhub.in)
[![Direct Contact](https://img.shields.io/badge/WhatsApp%20%2F%20Call-%2B91%209032666855-25D366?style=for-the-badge&logo=whatsapp)](https://wa.me/919032666855?text=Hi%20Online%20Growth%20Hub,%20I%20am%20interested%20in%20custom%20software%20and%20web%20development.)
[![License](https://img.shields.io/badge/License-MIT-emerald?style=for-the-badge)](#)

> **NexusDash** is a high-performance, modular PHP admin dashboard and full-stack starter kit designed for rapid project development, client portals, SaaS applications, ERPs, and agency client deliveries. Zero-build steps, zero Node.js headaches, 100% pure PHP + Tailwind utility styling + Lucide icons.

---

## 💼 Need Custom Software, Web Apps, or Client Portals?
If you are looking to build a high-performance web application, custom CRM, Razorpay payment flow, ERP system, or automated Hostinger cloud deployment:

* **Official Website:** [onlinegrowthhub.in](https://onlinegrowthhub.in)
* **Direct Call / WhatsApp:** **[+91 9032666855](https://wa.me/919032666855?text=Hello%20Online%20Growth%20Hub,%20I%20want%20to%20hire%20you%20for%20a%20project)**
* **Location:** India (Serving Global & Domestic Clients)

---

## 🚀 Key Highlights & Architectural Strengths

* **⚡ Zero Build Step (Instant Run):** Runs immediately on XAMPP, WAMP, LAMP, or any shared/cloud cPanel/Hostinger hosting without `npm run build` or heavy Node.js dependencies.
* **🎨 Modern High-Trust UI (WACRM Inspired):** Deep slate `#0b1120` sidebar, crisp 1px borders, smooth glassmorphic stats cards, and WCAG AA contrast.
* **📱 100% Responsive Mobile Drawer:** Collapsible sidebar on desktop with a sleek offcanvas slide-over drawer on mobile devices.
* **🧩 1-Line Navigation Configuration:** Add, rename, or reorder menu items across your entire dashboard in seconds via a single PHP array in `config/app.php`.
* **🛡️ Secure Session Authentication:** Session guards, clean login/logout architecture, and password hashing support.
* **📊 Pre-Built CRUD Architecture:** Ready-to-replicate Data Table with search, category filtering, status pills, and slide-over creation modal.
* **🔔 Native Toast Alerts:** Lightweight, animated toast notifications for instant user feedback.

---

## 📂 Architecture & Directory Structure

```text
nexus-dash/
├── config/
│   ├── app.php             # Core brand configuration, menu arrays, base URL helper
│   └── db.php              # Secure PDO MySQL connection with fallback demo mode
├── includes/
│   ├── auth_guard.php      # Protects admin routes & manages authenticated session
│   ├── header.php          # Meta, Tailwind CDN, Lucide icons, responsive wrapper
│   ├── sidebar.php         # Modular sidebar & mobile drawer (Dynamic $nav_items loop)
│   ├── topbar.php          # Search input, agency contact pill, user profile menu
│   └── footer.php          # Bottom agency branding watermark & script initializers
├── assets/
│   ├── css/nexus.css       # Core custom styling, card glassmorphism, scrollbars
│   └── js/nexus.js         # Mobile drawer triggers, modal controllers, toast system
├── database/
│   └── schema.sql          # Ready-to-import MySQL database & sample records table
├── index.php               # Main analytics dashboard & KPI metric tiles
├── records.php             # Reusable CRUD data table with modal & search
├── login.php               # Production-grade login page with demo credentials
├── logout.php              # Secure session destruction
├── .gitignore              # Git ignore rules for clean deployment
└── README.md               # Documentation & client acquisition pitch
```

---

## ⚡ Quick 2-Minute Setup

### 1. Clone or Download
```bash
git clone https://github.com/your-username/nexus-dash.git
```
Or place the folder directly inside your local web server: `c:\xampp\htdocs\nexus-dash`.

### 2. Import Database (Optional for First Run)
* Open **phpMyAdmin** (`http://localhost/phpmyadmin`).
* Import `database/schema.sql`.
* *Note: NexusDash includes a smart fallback demo mode, so you can test and explore immediately even before importing MySQL!*

### 3. Open in Browser
Visit:  
`http://localhost/nexus-dash/`

**Default Demo Credentials:**
* **Email:** `admin@onlinegrowthhub.in`
* **Password:** `admin123`

---

## 🛠️ How to Add a New Page / Menu Item

Open `config/app.php` and simply add your new item to the `getNexusNavItems()` array:

```php
[
    'title' => 'Invoices & Billing',
    'url'   => 'invoices.php',
    'icon'  => 'receipt',
    'badge' => 'New'
],
```
That's it! Your new page is automatically rendered in both desktop and mobile sidebars with active state detection.

---

## 📞 Hire Online Growth Hub

Need a dedicated development team for your next big idea?
* **Website:** [https://onlinegrowthhub.in](https://onlinegrowthhub.in)
* **Phone / WhatsApp:** [+91 9032666855](https://wa.me/919032666855)
* **Email:** info@onlinegrowthhub.in

