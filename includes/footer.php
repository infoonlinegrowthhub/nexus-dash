<?php
/**
 * NexusDash - Footer Layout
 * 
 * Engineered by: Online Growth Hub
 * Website: https://onlinegrowthhub.in
 * Contact / WhatsApp: +91 9032666855
 */
?>
            </main>

            <!-- Bottom Agency Branding & Promotion Footer -->
            <footer class="bg-white border-t border-slate-200 py-3.5 px-4 md:px-8 flex flex-col sm:flex-row items-center justify-between gap-2 text-[11px] text-slate-500">
                <div class="flex items-center gap-2">
                    <span class="font-semibold text-slate-700"><?php echo APP_NAME; ?> v<?php echo APP_VERSION; ?></span>
                    <span>•</span>
                    <span>Engineered by <a href="<?php echo AGENCY_WEBSITE; ?>" target="_blank" class="font-semibold text-blue-600 hover:underline"><?php echo AGENCY_NAME; ?></a></span>
                </div>
                <div class="flex items-center gap-3">
                    <span class="hidden md:inline">Hire Us for Custom Development:</span>
                    <a href="<?php echo AGENCY_WHATSAPP_URL; ?>" target="_blank" class="font-bold text-emerald-700 hover:text-emerald-800 flex items-center gap-1">
                        <i data-lucide="phone-call" class="w-3 h-3 text-emerald-600"></i>
                        <span><?php echo AGENCY_PHONE; ?></span>
                    </a>
                    <span>•</span>
                    <a href="<?php echo AGENCY_WEBSITE; ?>" target="_blank" class="text-slate-600 hover:text-slate-900 font-medium">
                        onlinegrowthhub.in
                    </a>
                </div>
            </footer>

        </div>
    </div>

    <!-- Core Scripts -->
    <script src="assets/js/nexus.js?v=<?php echo time(); ?>"></script>
</body>
</html>

