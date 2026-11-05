<?php
/**
 * NexusDash - Production-Grade PHP Application Foundation
 * 
 * Engineered by: Online Growth Hub
 * Website: https://onlinegrowthhub.in
 * Contact / WhatsApp: +91 9032666855
 */

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Brand & Agency Configuration
define('APP_NAME', 'NexusDash');
define('APP_VERSION', '1.0.0');
define('APP_DESCRIPTION', 'Modular PHP Dashboard & Application Framework');

define('AGENCY_NAME', 'Online Growth Hub');
define('AGENCY_WEBSITE', 'https://onlinegrowthhub.in');
define('AGENCY_PHONE', '+91 9032666855');
define('AGENCY_PHONE_RAW', '9032666855');
define('AGENCY_WHATSAPP_URL', 'https://wa.me/919032666855?text=Hi%20Online%20Growth%20Hub,%20I%20am%20interested%20in%20custom%20software%20and%20web%20development.');

// Dynamic Base URL Detection
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || (isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
$host = $_SERVER['HTTP_HOST'] ?? 'localhost';
$script_name = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME']));
$base_url = rtrim($protocol . $host . $script_name, '/');
define('BASE_URL', $base_url);

// Navigation Items Helper (Single point of control for the entire sidebar)
function getNexusNavItems() {
    return [
        [
            'section' => 'Main Menu'
        ],
        [
            'title' => 'Dashboard',
            'url'   => 'index.php',
            'icon'  => 'layout-grid',
            'badge' => null
        ],
        [
            'title' => 'Projects & Records',
            'url'   => 'records.php',
            'icon'  => 'folder-kanban',
            'badge' => 'Live'
        ],
        [
            'section' => 'Management'
        ],
        [
            'title' => 'Customers / Clients',
            'url'   => '#',
            'icon'  => 'users',
            'badge' => null
        ],
        [
            'title' => 'Analytics & Revenue',
            'url'   => '#',
            'icon'  => 'bar-chart-3',
            'badge' => null
        ],
        [
            'section' => 'Preferences'
        ],
        [
            'title' => 'System Settings',
            'url'   => '#',
            'icon'  => 'settings',
            'badge' => null
        ],
    ];
}
