<?php
/**
 * NexusDash - Sidebar Navigation (100% WACRM Design System)
 * 
 * Engineered by: Online Growth Hub
 * Website: https://onlinegrowthhub.in
 * Contact / WhatsApp: +91 9032666855
 */

$nav_items = getNexusNavItems();
$current_page = basename($_SERVER['PHP_SELF']);
$user = currentUser();
?>

<!-- 1. DESKTOP SIDEBAR (>= 1024px, hidden on mobile/tablet) -->
<aside class="hidden lg:flex w-64 bg-white border-r border-slate-200/90 flex-col shrink-0 h-full overflow-hidden z-30 select-none shadow-xs">
    
    <!-- Brand Header -->
    <div class="h-16 flex items-center justify-between px-4 border-b border-slate-200/90 shrink-0">
        <a href="index.php" class="flex items-center gap-2.5 min-w-0">
            <div class="w-8 h-8 rounded-lg bg-[#25D366] text-white flex items-center justify-center font-bold text-xs shrink-0 shadow-xs">
                N
            </div>
            <div class="min-w-0">
                <span class="font-extrabold text-sm tracking-tight text-slate-900 block leading-tight truncate"><?php echo APP_NAME; ?></span>
                <span class="text-[10px] font-medium text-slate-400 block leading-tight truncate">By <?php echo AGENCY_NAME; ?></span>
            </div>
        </a>
    </div>

    <!-- Navigation Menu Items - Compact Density -->
    <nav class="flex-1 px-2.5 py-2 space-y-0.5 overflow-y-auto sidebar-scroll scroll-smooth">
        <?php foreach ($nav_items as $item): ?>
            <?php if (isset($item['section'])): ?>
                <div class="px-2 pt-3 pb-1 text-[10px] font-bold text-slate-400 uppercase tracking-wider">
                    <?php echo htmlspecialchars($item['section']); ?>
                </div>
            <?php else: 
                $is_active = ($current_page === $item['url']);
            ?>
                <a href="<?php echo htmlspecialchars($item['url']); ?>" 
                   class="flex items-center justify-between px-2.5 py-1.5 rounded-lg text-xs transition-all min-h-[32px] <?php echo $is_active ? 'bg-[#25D366] text-white font-semibold shadow-xs' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-100/70 font-medium'; ?>">
                    <div class="flex items-center gap-2.5 min-w-0">
                        <i data-lucide="<?php echo htmlspecialchars($item['icon']); ?>" class="w-3.5 h-3.5 shrink-0 <?php echo $is_active ? 'text-white' : 'text-slate-400'; ?>"></i>
                        <span class="truncate"><?php echo htmlspecialchars($item['title']); ?></span>
                    </div>
                    <?php if (!empty($item['badge'])): ?>
                        <span class="px-1.5 py-0.2 rounded-full text-[10px] font-bold <?php echo $is_active ? 'bg-white text-[#25D366]' : 'bg-red-500 text-white'; ?>">
                            <?php echo htmlspecialchars($item['badge']); ?>
                        </span>
                    <?php endif; ?>
                </a>
            <?php endif; ?>
        <?php endforeach; ?>
    </nav>

    <!-- Bottom User Account Tile -->
    <div class="p-2.5 border-t border-slate-100 shrink-0 bg-white">
        <div class="flex items-center justify-between p-1.5 rounded-xl bg-slate-50 border border-slate-200/70 gap-2">
            <div class="flex items-center gap-2 min-w-0">
                <div class="w-7 h-7 rounded-lg bg-teal-700 text-white font-bold text-xs flex items-center justify-center shrink-0">
                    <?php echo strtoupper(substr($user['name'] ?? 'AD', 0, 2)); ?>
                </div>
                <div class="min-w-0 flex-1">
                    <p class="text-xs font-bold text-slate-900 truncate leading-tight"><?php echo htmlspecialchars($user['name'] ?? 'Admin User'); ?></p>
                    <p class="text-[10px] font-semibold truncate leading-tight text-emerald-700">Online Growth Hub</p>
                </div>
            </div>
            <div class="flex items-center gap-0.5 shrink-0">
                <a href="#" class="p-1 text-slate-400 hover:text-slate-800 hover:bg-slate-200/60 rounded-md transition-colors" title="Settings">
                    <i data-lucide="settings" class="w-3.5 h-3.5"></i>
                </a>
                <a href="logout.php" class="p-1 text-slate-400 hover:text-red-600 hover:bg-red-50 rounded-md transition-colors cursor-pointer" title="Log out">
                    <i data-lucide="log-out" class="w-3.5 h-3.5"></i>
                </a>
            </div>
        </div>
    </div>
</aside>
