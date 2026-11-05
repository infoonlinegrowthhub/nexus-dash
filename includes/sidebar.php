<?php
/**
 * NexusDash - Sidebar Navigation (Desktop & Mobile Drawer)
 * 
 * Engineered by: Online Growth Hub
 * Website: https://onlinegrowthhub.in
 * Contact / WhatsApp: +91 9032666855
 */

$nav_items = getNexusNavItems();
$current_page = basename($_SERVER['PHP_SELF']);
?>

<!-- 1. DESKTOP STATIC SIDEBAR (Hidden on mobile) -->
<aside class="hidden lg:flex lg:flex-col w-64 nexus-sidebar flex-shrink-0 z-30 select-none">
    
    <!-- Brand Header -->
    <div class="h-16 flex items-center justify-between px-6 border-b border-slate-800/80">
        <a href="index.php" class="flex items-center gap-3">
            <div class="w-9 h-9 rounded-xl bg-gradient-to-tr from-blue-600 to-indigo-500 flex items-center justify-center text-white shadow-lg shadow-blue-500/20 font-bold text-lg">
                N
            </div>
            <div>
                <span class="text-white font-bold tracking-tight text-base"><?php echo APP_NAME; ?></span>
                <span class="block text-[10px] text-slate-400 font-medium tracking-wide">by <?php echo AGENCY_NAME; ?></span>
            </div>
        </a>
    </div>

    <!-- Navigation Menu Items -->
    <div class="flex-1 overflow-y-auto px-4 py-5 space-y-1">
        <?php foreach ($nav_items as $item): ?>
            <?php if (isset($item['section'])): ?>
                <div class="pt-4 pb-1.5 px-3 text-[11px] font-semibold uppercase tracking-wider text-slate-400">
                    <?php echo htmlspecialchars($item['section']); ?>
                </div>
            <?php else: 
                $is_active = ($current_page === $item['url']);
            ?>
                <a href="<?php echo htmlspecialchars($item['url']); ?>" 
                   class="nexus-nav-link <?php echo $is_active ? 'active' : ''; ?>">
                    <i data-lucide="<?php echo htmlspecialchars($item['icon']); ?>" class="w-5 h-5 flex-shrink-0"></i>
                    <span class="flex-1 truncate"><?php echo htmlspecialchars($item['title']); ?></span>
                    <?php if (!empty($item['badge'])): ?>
                        <span class="px-2 py-0.5 text-[10px] font-bold rounded-full bg-blue-500/20 text-blue-400 border border-blue-500/30">
                            <?php echo htmlspecialchars($item['badge']); ?>
                        </span>
                    <?php endif; ?>
                </a>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>

    <!-- Sidebar Version Footer -->
    <div class="p-4 border-t border-slate-800/80 flex items-center justify-between text-xs text-slate-400">
        <span class="font-medium text-slate-300"><?php echo APP_NAME; ?></span>
        <span class="text-[10px] bg-slate-800/80 px-2 py-0.5 rounded text-slate-400 font-mono">v<?php echo APP_VERSION; ?></span>
    </div>
</aside>


<!-- 2. MOBILE SIDEBAR DRAWER (Slide-over) -->
<div id="mobile-sidebar-backdrop" class="fixed inset-0 bg-slate-950/70 backdrop-blur-sm z-50 hidden opacity-0 transition-opacity">
    <div id="mobile-sidebar-panel" class="fixed inset-y-0 left-0 w-72 nexus-sidebar flex flex-col z-50 -translate-x-full transition-transform">
        
        <!-- Mobile Drawer Header -->
        <div class="h-16 flex items-center justify-between px-6 border-b border-slate-800/80">
            <a href="index.php" class="flex items-center gap-3">
                <div class="w-8 h-8 rounded-xl bg-blue-600 flex items-center justify-center text-white font-bold text-sm">
                    N
                </div>
                <div>
                    <span class="text-white font-bold text-base"><?php echo APP_NAME; ?></span>
                    <span class="block text-[10px] text-slate-400"><?php echo AGENCY_NAME; ?></span>
                </div>
            </a>
            <button id="btn-close-mobile-sidebar" class="p-1.5 rounded-lg text-slate-400 hover:text-white hover:bg-slate-800 transition">
                <i data-lucide="x" class="w-5 h-5"></i>
            </button>
        </div>

        <!-- Mobile Menu Items -->
        <div class="flex-1 overflow-y-auto px-4 py-4 space-y-1">
            <?php foreach ($nav_items as $item): ?>
                <?php if (isset($item['section'])): ?>
                    <div class="pt-4 pb-1 px-3 text-[10px] font-semibold uppercase tracking-wider text-slate-400">
                        <?php echo htmlspecialchars($item['section']); ?>
                    </div>
                <?php else: 
                    $is_active = ($current_page === $item['url']);
                ?>
                    <a href="<?php echo htmlspecialchars($item['url']); ?>" 
                       class="nexus-nav-link <?php echo $is_active ? 'active' : ''; ?>">
                        <i data-lucide="<?php echo htmlspecialchars($item['icon']); ?>" class="w-5 h-5"></i>
                        <span class="flex-1 truncate"><?php echo htmlspecialchars($item['title']); ?></span>
                    </a>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>

        <!-- Mobile Drawer Footer -->
        <div class="p-4 border-t border-slate-800/80 flex items-center justify-between text-xs text-slate-400">
            <span class="font-medium text-slate-300"><?php echo APP_NAME; ?></span>
            <span class="text-[10px] bg-slate-800/80 px-2 py-0.5 rounded text-slate-400 font-mono">v<?php echo APP_VERSION; ?></span>
        </div>
    </div>
</div>

