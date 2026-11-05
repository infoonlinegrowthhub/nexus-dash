<?php
/**
 * NexusDash - Top Bar Navigation
 * 
 * Engineered by: Online Growth Hub
 * Website: https://onlinegrowthhub.in
 * Contact / WhatsApp: +91 9032666855
 */

$user = currentUser();
?>
<header class="h-16 bg-white border-b border-slate-200 px-4 md:px-6 flex items-center justify-between z-20 flex-shrink-0">
    
    <!-- Left: Mobile Toggle & Search Bar -->
    <div class="flex items-center gap-3 md:gap-4 flex-1 max-w-xl">
        <button id="btn-mobile-menu" class="lg:hidden p-2 rounded-lg text-slate-600 hover:text-slate-900 hover:bg-slate-100 transition">
            <i data-lucide="menu" class="w-5 h-5"></i>
        </button>

        <div class="relative w-full max-w-md hidden sm:block">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400">
                <i data-lucide="search" class="w-4 h-4"></i>
            </div>
            <input type="text" placeholder="Search records, users, orders..." 
                   class="w-full pl-9 pr-12 py-1.5 text-xs bg-slate-50 border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition">
            <div class="absolute inset-y-0 right-0 pr-2.5 flex items-center pointer-events-none">
                <kbd class="px-1.5 py-0.5 text-[10px] font-semibold text-slate-600 bg-white border border-slate-200 rounded shadow-2xs">Ctrl K</kbd>
            </div>
        </div>
    </div>

    <!-- Right: Notification & User Dropdown -->
    <div class="flex items-center gap-3 md:gap-4">
        <!-- Notifications -->
        <button class="relative p-2 rounded-lg text-slate-500 hover:text-slate-800 hover:bg-slate-100 transition" title="Notifications">
            <i data-lucide="bell" class="w-4 h-4"></i>
            <span class="absolute top-1.5 right-1.5 w-2 h-2 rounded-full bg-blue-600"></span>
        </button>

        <div class="h-6 w-px bg-slate-200"></div>

        <!-- User Profile Dropdown -->
        <div class="relative">
            <button id="btn-user-menu" class="flex items-center gap-2.5 p-1 rounded-lg hover:bg-slate-100 transition focus:outline-none">
                <div class="w-8 h-8 rounded-full bg-gradient-to-tr from-slate-800 to-slate-900 text-white font-bold text-xs flex items-center justify-center shadow-xs">
                    <?php echo strtoupper(substr($user['name'] ?? 'AD', 0, 2)); ?>
                </div>
                <div class="hidden md:block text-left">
                    <span class="block text-xs font-bold text-slate-800 leading-tight"><?php echo htmlspecialchars($user['name'] ?? 'Admin User'); ?></span>
                    <span class="block text-[10px] text-slate-400 font-medium leading-none"><?php echo htmlspecialchars($user['role'] ?? 'Super Admin'); ?></span>
                </div>
                <i data-lucide="chevron-down" class="w-3.5 h-3.5 text-slate-400 hidden md:block"></i>
            </button>

            <!-- Dropdown Menu -->
            <div id="user-dropdown" class="absolute right-0 mt-2 w-56 bg-white border border-slate-200 rounded-xl shadow-lg py-1.5 hidden z-50">
                <div class="px-4 py-2 border-b border-slate-100">
                    <p class="text-xs font-bold text-slate-800"><?php echo htmlspecialchars($user['name']); ?></p>
                    <p class="text-[11px] text-slate-500 truncate"><?php echo htmlspecialchars($user['email']); ?></p>
                </div>
                
                <div class="py-1">
                    <a href="#" class="flex items-center gap-2.5 px-4 py-2 text-xs text-slate-700 hover:bg-slate-50 transition">
                        <i data-lucide="user" class="w-4 h-4 text-slate-400"></i>
                        <span>Account Profile</span>
                    </a>
                    <a href="<?php echo AGENCY_WEBSITE; ?>" target="_blank" class="flex items-center gap-2.5 px-4 py-2 text-xs text-blue-600 hover:bg-blue-50 transition">
                        <i data-lucide="external-link" class="w-4 h-4 text-blue-500"></i>
                        <span>Visit <?php echo AGENCY_NAME; ?></span>
                    </a>
                </div>

                <div class="border-t border-slate-100 pt-1">
                    <a href="logout.php" class="flex items-center gap-2.5 px-4 py-2 text-xs text-rose-600 hover:bg-rose-50 transition font-medium">
                        <i data-lucide="log-out" class="w-4 h-4 text-rose-500"></i>
                        <span>Sign Out</span>
                    </a>
                </div>
            </div>
        </div>

    </div>
</header>

