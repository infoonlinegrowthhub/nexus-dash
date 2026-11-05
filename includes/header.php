<?php
/**
 * NexusDash - Header Layout (100% WACRM Design System & Layout)
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
<html lang="en" class="h-full bg-[#f5f8fc]">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title><?php echo htmlspecialchars($page_title . ' - ' . APP_NAME . ' | ' . AGENCY_NAME); ?></title>
    
    <!-- Tailwind CSS (Direct Modern Utility CDN) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            50: '#ecfdf5',
                            100: '#d1fae5',
                            500: '#25D366',
                            600: '#20ba59',
                            700: '#008069',
                            800: '#065f46'
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
<body class="h-full flex flex-col font-sans text-slate-900 bg-[#f5f8fc] antialiased">
    <!-- WACRM Root Viewport Container -->
    <div class="flex h-screen h-[100dvh] max-h-[100dvh] w-full max-w-full overflow-hidden bg-[#f5f8fc]">
        
        <!-- Include WACRM Sidebar -->
        <?php include_once __DIR__ . '/sidebar.php'; ?>

        <!-- Main Column -->
        <div class="flex-1 flex flex-col min-w-0 overflow-hidden bg-[#f5f8fc]">
            
            <!-- Include WACRM Topbar -->
            <?php include_once __DIR__ . '/topbar.php'; ?>

            <!-- Main Scrollable Content Container (pb-20 on mobile to clear bottom navigation) -->
            <main class="flex-1 min-w-0 min-h-0 overflow-x-hidden overflow-y-auto pb-20 lg:pb-0 flex flex-col bg-[#f5f8fc] scroll-smooth overscroll-y-contain">
                <div class="flex-1 min-w-0 max-w-full p-4 sm:p-6 lg:p-7 lg:max-w-[1440px] w-full mx-auto">
