<?php
/**
 * NexusDash - Top Bar Navigation (100% WACRM Design System)
 * 
 * Engineered by: Online Growth Hub
 * Website: https://onlinegrowthhub.in
 * Contact / WhatsApp: +91 9032666855
 */

$user = currentUser();
?>
<header class="h-16 bg-white border-b border-slate-200/90 px-2.5 sm:px-6 flex items-center justify-between shrink-0 z-20 shadow-xs">
    
    <!-- Left: Mobile Drawer Trigger & Search Bar -->
    <div class="flex items-center gap-2 sm:gap-3 flex-1 min-w-0">
        <button id="btn-mobile-menu" type="button" 
                class="lg:hidden w-9 h-9 sm:w-10 sm:h-10 shrink-0 -ml-1 sm:-ml-2 flex items-center justify-center text-slate-700 hover:bg-slate-100 rounded-xl transition-colors cursor-pointer"
                aria-label="Open navigation menu">
            <i data-lucide="menu" class="w-5 h-5"></i>
        </button>

        <div class="relative w-full max-w-xs sm:max-w-sm md:max-w-md hidden md:block">
            <i data-lucide="search" class="w-4 h-4 text-slate-400 absolute left-3.5 top-1/2 -translate-y-1/2 pointer-events-none"></i>
            <input type="text" placeholder="Search records, clients, projects..." 
                   class="w-full pl-10 pr-4 py-2 bg-slate-50/80 border border-slate-200 rounded-xl text-xs text-slate-800 placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-[#25D366] transition-all">
        </div>

        <h2 class="lg:hidden text-xs sm:text-base font-bold text-slate-900 truncate min-w-0">
            <?php echo htmlspecialchars($page_title ?? APP_NAME); ?>
        </h2>
    </div>

    <!-- Right: WACRM Badges, Notifications & User Dropdown -->
    <div class="flex items-center gap-1 sm:gap-2.5 shrink-0 ml-1 sm:ml-2 min-h-[38px]">
        
        <!-- Starter Plan Badge (WACRM Style) -->
        <span class="hidden sm:inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[11px] font-bold bg-emerald-50 text-emerald-800 border border-emerald-200">
            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
            <span>Starter Plan</span>
        </span>

        <!-- Live Connected Status Pill (WACRM Style) -->
        <span class="hidden sm:inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200">
            <span class="w-2 h-2 rounded-full bg-[#25D366]"></span>
            <span>System Active</span>
            <i data-lucide="chevron-down" class="w-3 h-3 text-emerald-600"></i>
        </span>

        <!-- Notifications Bell -->
        <div class="relative">
            <button id="btn-notification" type="button" 
                    class="relative p-2 text-slate-500 hover:text-slate-800 hover:bg-slate-100 rounded-xl transition-colors cursor-pointer"
                    title="Notifications">
                <i data-lucide="bell" class="w-4 h-4"></i>
                <span class="absolute top-1 right-1 w-4 h-4 bg-red-500 text-white text-[9px] font-bold rounded-full flex items-center justify-center">
                    2
                </span>
            </button>
        </div>

        <!-- Help Icon -->
        <a href="<?php echo AGENCY_WEBSITE; ?>" target="_blank" 
           class="hidden sm:flex p-2 text-slate-500 hover:text-slate-800 hover:bg-slate-100 rounded-xl transition-colors cursor-pointer"
           title="Help & Support">
            <i data-lucide="help-circle" class="w-4 h-4"></i>
        </a>

        <!-- User Profile Pill Menu (WACRM Style) -->
        <div class="relative">
            <button id="btn-user-menu" type="button" 
                    class="flex items-center gap-2 p-1.5 hover:bg-slate-100 rounded-xl transition-colors cursor-pointer focus:outline-none">
                <div class="w-8 h-8 rounded-full bg-slate-800 text-white flex items-center justify-center text-xs font-bold overflow-hidden">
                    <?php echo strtoupper(substr($user['name'] ?? 'AD', 0, 2)); ?>
                </div>
                <span class="hidden sm:inline text-xs font-bold text-slate-800 truncate max-w-[120px]">
                    <?php echo htmlspecialchars($user['name'] ?? 'Admin User'); ?>
                </span>
                <i data-lucide="chevron-down" class="hidden sm:inline w-3.5 h-3.5 text-slate-400"></i>
            </button>

            <!-- User Dropdown Menu -->
            <div id="user-dropdown" class="absolute right-0 top-12 w-56 bg-white rounded-xl border border-slate-200 shadow-lg p-1.5 z-50 text-sm hidden">
                <div class="px-3 py-2 border-b border-slate-100 mb-1">
                    <p class="font-bold text-slate-900 text-xs truncate"><?php echo htmlspecialchars($user['name'] ?? 'Admin User'); ?></p>
                    <p class="text-[11px] text-slate-500 truncate"><?php echo htmlspecialchars($user['email'] ?? 'admin@onlinegrowthhub.in'); ?></p>
                </div>
                <a href="#" class="flex items-center gap-2.5 px-3 py-2 rounded-lg text-xs font-semibold text-slate-700 hover:bg-slate-100 transition-colors">
                    <i data-lucide="user" class="w-4 h-4 text-slate-500"></i>
                    <span>Profile settings</span>
                </a>
                <a href="<?php echo AGENCY_WEBSITE; ?>" target="_blank" class="flex items-center gap-2.5 px-3 py-2 rounded-lg text-xs font-semibold text-slate-700 hover:bg-slate-100 transition-colors">
                    <i data-lucide="external-link" class="w-4 h-4 text-slate-500"></i>
                    <span>Visit <?php echo AGENCY_NAME; ?></span>
                </a>
                <div class="border-t border-slate-100 my-1"></div>
                <a href="logout.php" class="w-full flex items-center gap-2.5 px-3 py-2 rounded-lg text-xs font-semibold text-red-600 hover:bg-red-50 transition-colors">
                    <i data-lucide="log-out" class="w-4 h-4"></i>
                    <span>Log out</span>
                </a>
            </div>
        </div>

    </div>
</header>
