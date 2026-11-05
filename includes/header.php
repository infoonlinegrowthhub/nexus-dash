<?php
/**
 * NexusDash - Header Layout
 * 
 * Engineered by: Online Growth Hub
 * Website: https://onlinegrowthhub.in
 * Contact / WhatsApp: +91 9032666855
 */

require_once dirname(__DIR__) . '/config/app.php';
require_once __DIR__ . '/auth_guard.php';

$page_title = $page_title ?? 'Dashboard';
$current_user = currentUser();
?>
<!DOCTYPE html>
<html lang="en" class="h-full bg-slate-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($page_title . ' - ' . APP_NAME . ' | ' . AGENCY_NAME); ?></title>
    
    <!-- Tailwind CSS (Direct Modern Utility CDN) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        nexus: {
                            50: '#f8fafc',
                            100: '#f1f5f9',
                            200: '#e2e8f0',
                            800: '#1e293b',
                            900: '#0f172a',
                            950: '#0b1120'
                        }
                    }
                }
            }
        }
    </script>
    
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>
    
    <!-- NexusDash Core Stylesheet -->
    <link rel="stylesheet" href="assets/css/nexus.css?v=<?php echo time(); ?>">
</head>
<body class="h-full flex flex-col font-sans text-slate-800 bg-slate-50 antialiased">
    <div class="flex h-screen overflow-hidden">
        
        <!-- Include Modular Sidebar -->
        <?php include_once __DIR__ . '/sidebar.php'; ?>

        <!-- Main Workspace Column -->
        <div class="flex-1 flex flex-col min-w-0 overflow-hidden bg-slate-50">
            
            <!-- Include Modular Topbar -->
            <?php include_once __DIR__ . '/topbar.php'; ?>

            <!-- Main Scrollable Content -->
            <main class="flex-1 overflow-y-auto p-4 md:p-6 lg:p-8">

