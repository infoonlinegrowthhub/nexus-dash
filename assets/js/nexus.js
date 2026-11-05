/**
 * NexusDash Core JavaScript
 * Engineered by: Online Growth Hub (https://onlinegrowthhub.in | +91 9032666855)
 */

document.addEventListener('DOMContentLoaded', function () {
    // 1. Initialize Lucide Icons
    if (typeof lucide !== 'undefined') {
        lucide.createIcons();
    }

    // 2. Mobile Sidebar Drawer Logic
    const mobileMenuBtn = document.getElementById('btn-mobile-menu');
    const mobileSidebarBackdrop = document.getElementById('mobile-sidebar-backdrop');
    const mobileSidebarPanel = document.getElementById('mobile-sidebar-panel');
    const mobileCloseBtn = document.getElementById('btn-close-mobile-sidebar');

    function openMobileSidebar() {
        if (mobileSidebarBackdrop && mobileSidebarPanel) {
            mobileSidebarBackdrop.classList.remove('hidden');
            setTimeout(() => {
                mobileSidebarBackdrop.classList.remove('opacity-0');
                mobileSidebarPanel.classList.remove('-translate-x-full');
            }, 10);
        }
    }

    function closeMobileSidebar() {
        if (mobileSidebarBackdrop && mobileSidebarPanel) {
            mobileSidebarBackdrop.classList.add('opacity-0');
            mobileSidebarPanel.classList.add('-translate-x-full');
            setTimeout(() => {
                mobileSidebarBackdrop.classList.add('hidden');
            }, 250);
        }
    }

    if (mobileMenuBtn) mobileMenuBtn.addEventListener('click', openMobileSidebar);
    if (mobileCloseBtn) mobileCloseBtn.addEventListener('click', closeMobileSidebar);
    if (mobileSidebarBackdrop) mobileSidebarBackdrop.addEventListener('click', function(e) {
        if (e.target === mobileSidebarBackdrop) closeMobileSidebar();
    });

    // 3. User Avatar Dropdown
    const userMenuBtn = document.getElementById('btn-user-menu');
    const userDropdown = document.getElementById('user-dropdown');

    if (userMenuBtn && userDropdown) {
        userMenuBtn.addEventListener('click', function (e) {
            e.stopPropagation();
            userDropdown.classList.toggle('hidden');
        });

        document.addEventListener('click', function (e) {
            if (!userDropdown.contains(e.target) && !userMenuBtn.contains(e.target)) {
                userDropdown.classList.add('hidden');
            }
        });
    }

    // 4. Quick Modal Helpers (Add/Edit Records)
    window.openNexusModal = function (modalId) {
        const modal = document.getElementById(modalId);
        if (modal) {
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            if (typeof lucide !== 'undefined') lucide.createIcons();
        }
    };

    window.closeNexusModal = function (modalId) {
        const modal = document.getElementById(modalId);
        if (modal) {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }
    };

    // 5. Toast Notification System
    window.showNexusToast = function (message, type = 'success') {
        let container = document.getElementById('nexus-toast-container');
        if (!container) {
            container = document.createElement('div');
            container.id = 'nexus-toast-container';
            container.className = 'fixed bottom-5 right-5 z-50 flex flex-col gap-2 pointer-events-none';
            document.body.appendChild(container);
        }

        const toast = document.createElement('div');
        toast.className = `pointer-events-auto flex items-center gap-3 px-4 py-3 rounded-xl shadow-lg border text-sm font-medium transition-all duration-300 transform translate-y-2 opacity-0 ${
            type === 'success' 
                ? 'bg-slate-900 border-emerald-500/30 text-white' 
                : 'bg-slate-900 border-rose-500/30 text-white'
        }`;

        const iconName = type === 'success' ? 'check-circle' : 'alert-circle';
        const iconColor = type === 'success' ? 'text-emerald-400' : 'text-rose-400';

        toast.innerHTML = `
            <i data-lucide="${iconName}" class="w-5 h-5 ${iconColor}"></i>
            <span>${message}</span>
        `;

        container.appendChild(toast);
        if (typeof lucide !== 'undefined') lucide.createIcons();

        // Animate In
        setTimeout(() => {
            toast.classList.remove('translate-y-2', 'opacity-0');
        }, 10);

        // Auto Remove
        setTimeout(() => {
            toast.classList.add('opacity-0', 'translate-y-2');
            setTimeout(() => toast.remove(), 300);
        }, 3500);
    };
});

