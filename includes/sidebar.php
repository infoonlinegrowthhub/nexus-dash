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

    <!-- Agency Promo Card (Client Acquisition Widget) -->
    <div class="p-4 border-t border-slate-800/80">
        <div class="agency-promo-card">
            <div class="flex items-center gap-2 mb-1.5">
                <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                <span class="text-[11px] font-bold uppercase tracking-wider text-blue-400">Custom Dev Available</span>
            </div>
            <h4 class="text-xs font-bold text-white mb-1">Need Custom Features?</h4>
            <p class="text-[11px] text-slate-300 leading-snug mb-3">
                Hire <strong><?php echo AGENCY_NAME; ?></strong> to build production ERP, CRM, or Web Apps.
            </p>
            <div class="flex flex-col gap-1.5">
                <a href="<?php echo AGENCY_WHATSAPP_URL; ?>" target="_blank" 
                   class="inline-flex items-center justify-center gap-1.5 w-full py-1.5 px-2 rounded-lg bg-emerald-600 hover:bg-emerald-500 text-white text-[11px] font-semibold transition-colors shadow-sm">
                    <i data-lucide="message-square" class="w-3.5 h-3.5"></i>
                    <span>WhatsApp: <?php echo AGENCY_PHONE_RAW; ?></span>
                </a>
                <a href="<?php echo AGENCY_WEBSITE; ?>" target="_blank" 
                   class="inline-flex items-center justify-center gap-1 w-full py-1 px-2 rounded-lg text-slate-400 hover:text-white text-[10px] font-medium transition-colors">
                    <i data-lucide="globe" class="w-3 h-3"></i>
                    <span>onlinegrowthhub.in</span>
                </a>
            </div>
        </div>
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

        <!-- Mobile Drawer Promo -->
        <div class="p-4 border-t border-slate-800/80">
            <a href="<?php echo AGENCY_WHATSAPP_URL; ?>" target="_blank" 
               class="flex items-center justify-center gap-2 w-full py-2 px-3 rounded-lg bg-emerald-600 text-white text-xs font-semibold">
                <i data-lucide="message-square" class="w-4 h-4"></i>
                <span>Call/WhatsApp: <?php echo AGENCY_PHONE_RAW; ?></span>
            </a>
        </div>
    </div>
</div>
