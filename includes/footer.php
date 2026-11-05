<?php
/**
 * NexusDash - Footer & Mobile Navigation (100% WACRM Design System)
 * 
 * Engineered by: Online Growth Hub
 * Website: https://onlinegrowthhub.in
 * Contact / WhatsApp: +91 9032666855
 */

$nav_items = getNexusNavItems();
$current_page = basename($_SERVER['PHP_SELF']);
?>
                </div>

                <!-- WACRM Footer -->
                <footer class="w-full border-t border-slate-200/80 bg-white px-4 sm:px-6 py-3 shrink-0 flex flex-col sm:flex-row items-center justify-center sm:justify-between text-center sm:text-left gap-1.5 sm:gap-2 text-xs text-slate-500">
                    <span class="inline-flex items-center justify-center gap-1.5 font-medium">
                        <span class="w-2 h-2 rounded-full bg-[#25D366]"></span>
                        <span><?php echo APP_NAME; ?> v<?php echo APP_VERSION; ?> • Engineered by <a href="<?php echo AGENCY_WEBSITE; ?>" target="_blank" class="font-bold text-slate-800 hover:text-[#25D366] transition-colors underline decoration-slate-300"><?php echo AGENCY_NAME; ?></a></span>
                    </span>
                    <span class="text-center">
                        Hire Us for Custom Development: <a href="<?php echo AGENCY_WHATSAPP_URL; ?>" target="_blank" class="font-bold text-emerald-700 hover:text-emerald-800"><?php echo AGENCY_PHONE; ?></a> • <a href="<?php echo AGENCY_WEBSITE; ?>" target="_blank" class="font-medium text-slate-700 hover:underline">onlinegrowthhub.in</a>
                    </span>
                </footer>
            </main>

            <!-- 2. WACRM MOBILE BOTTOM BAR (< 1024px) -->
            <nav class="lg:hidden fixed bottom-0 left-0 right-0 h-14 bg-white border-t border-slate-200 flex items-center justify-around px-1 z-40 shadow-xs">
                <a href="index.php" class="flex flex-col items-center justify-center flex-1 h-full min-h-[44px] transition-colors <?php echo $current_page === 'index.php' ? 'text-[#008069] font-bold' : 'text-slate-500 hover:text-slate-900'; ?>">
                    <i data-lucide="layout-grid" class="w-5 h-5 <?php echo $current_page === 'index.php' ? 'stroke-[2.5]' : 'stroke-[1.75]'; ?>"></i>
                    <span class="text-[11px] font-semibold tracking-tight mt-0.5">Dashboard</span>
                </a>
                <a href="records.php" class="flex flex-col items-center justify-center flex-1 h-full min-h-[44px] transition-colors <?php echo $current_page === 'records.php' ? 'text-[#008069] font-bold' : 'text-slate-500 hover:text-slate-900'; ?>">
                    <i data-lucide="folder-kanban" class="w-5 h-5 <?php echo $current_page === 'records.php' ? 'stroke-[2.5]' : 'stroke-[1.75]'; ?>"></i>
                    <span class="text-[11px] font-semibold tracking-tight mt-0.5">Records</span>
                </a>
                <button type="button" id="btn-bottom-more" class="flex flex-col items-center justify-center flex-1 h-full min-h-[44px] transition-colors text-slate-500 hover:text-slate-900">
                    <i data-lucide="menu" class="w-5 h-5 stroke-[1.75]"></i>
                    <span class="text-[11px] font-semibold tracking-tight mt-0.5">More</span>
                </button>
            </nav>

        </div>
    </div>

    <!-- 3. WACRM MOBILE NAVIGATION DRAWER (Slides in from Left) -->
    <div id="mobile-sidebar-backdrop" class="fixed inset-0 bg-slate-950/60 backdrop-blur-xs z-50 hidden opacity-0 transition-opacity duration-200">
        <div id="mobile-sidebar-panel" class="fixed inset-y-0 left-0 w-72 bg-white border-r border-slate-200 flex flex-col z-50 -translate-x-full transition-transform duration-250 shadow-2xl">
            
            <!-- Drawer Header -->
            <div class="h-16 flex items-center justify-between px-4 border-b border-slate-100">
                <div class="flex items-center gap-2.5">
                    <div class="w-8 h-8 rounded-lg bg-[#25D366] text-white flex items-center justify-center font-bold text-xs shrink-0 shadow-xs">
                        N
                    </div>
                    <div>
                        <span class="font-extrabold text-sm text-slate-900 block leading-tight"><?php echo APP_NAME; ?></span>
                        <span class="text-[10px] text-slate-400 block font-medium">By <?php echo AGENCY_NAME; ?></span>
                    </div>
                </div>
                <button id="btn-close-mobile-sidebar" class="p-2 text-slate-400 hover:text-slate-700 hover:bg-slate-100 rounded-xl transition-colors">
                    <i data-lucide="x" class="w-5 h-5"></i>
                </button>
            </div>

            <!-- Drawer Navigation Items -->
            <div class="flex-1 overflow-y-auto p-3 space-y-1">
                <?php foreach ($nav_items as $item): ?>
                    <?php if (isset($item['section'])): ?>
                        <div class="px-2 pt-3 pb-1 text-[10px] font-bold text-slate-400 uppercase tracking-wider">
                            <?php echo htmlspecialchars($item['section']); ?>
                        </div>
                    <?php else: 
                        $is_active = ($current_page === $item['url']);
                    ?>
                        <a href="<?php echo htmlspecialchars($item['url']); ?>" 
                           class="flex items-center justify-between px-3.5 py-2.5 rounded-xl text-sm font-semibold transition-colors min-h-[44px] <?php echo $is_active ? 'bg-[#25D366] text-white shadow-xs' : 'text-slate-700 hover:bg-slate-100 hover:text-slate-900'; ?>">
                            <div class="flex items-center gap-3 min-w-0">
                                <i data-lucide="<?php echo htmlspecialchars($item['icon']); ?>" class="w-4 h-4 shrink-0 <?php echo $is_active ? 'text-white' : 'text-slate-500'; ?>"></i>
                                <span class="truncate"><?php echo htmlspecialchars($item['title']); ?></span>
                            </div>
                            <?php if (!empty($item['badge'])): ?>
                                <span class="px-2 py-0.5 rounded-full text-xs font-bold <?php echo $is_active ? 'bg-white text-[#25D366]' : 'bg-red-500 text-white'; ?>">
                                    <?php echo htmlspecialchars($item['badge']); ?>
                                </span>
                            <?php endif; ?>
                        </a>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>

            <!-- Drawer Footer -->
            <div class="p-3 border-t border-slate-100 bg-slate-50">
                <a href="logout.php" class="flex items-center gap-2.5 px-3 py-2 text-xs font-bold text-red-600 hover:bg-red-50 rounded-lg transition-colors">
                    <i data-lucide="log-out" class="w-4 h-4"></i>
                    <span>Log Out</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Core Scripts -->
    <script src="assets/js/nexus.js?v=<?php echo time(); ?>"></script>
</body>
</html>
