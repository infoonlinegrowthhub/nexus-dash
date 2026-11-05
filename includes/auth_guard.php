<?php
/**
 * NexusDash - Authentication Guard
 * 
 * Engineered by: Online Growth Hub
 * Website: https://onlinegrowthhub.in
 * Contact / WhatsApp: +91 9032666855
 */

require_once dirname(__DIR__) . '/config/app.php';

// Check if user is logged in
if (empty($_SESSION['nexus_user'])) {
    // If running demo for the first time without DB, auto-seed a demo session
    // Or redirect to login
    $current_page = basename($_SERVER['PHP_SELF']);
    if ($current_page !== 'login.php') {
        header('Location: login.php');
        exit;
    }
}

/**
 * Get current logged in user
 */
function currentUser() {
    return $_SESSION['nexus_user'] ?? [
        'name'  => 'Admin User',
        'email' => 'admin@onlinegrowthhub.in',
        'role'  => 'Super Admin',
    ];
}

