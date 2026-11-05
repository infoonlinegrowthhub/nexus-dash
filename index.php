<?php
/**
 * NexusDash - Main Dashboard (100% WACRM Design System & Consistency)
 * 
 * Engineered by: Online Growth Hub
 * Website: https://onlinegrowthhub.in
 * Contact / WhatsApp: +91 9032666855
 */

$page_title = 'Dashboard Overview';
require_once __DIR__ . '/config/db.php';
require_once __DIR__ . '/includes/header.php';

// Safe query or mock data fallback
$recent_records = [];
if ($db_connected && $pdo) {
    try {
        $stmt = $pdo->query("SELECT * FROM records ORDER BY id DESC LIMIT 5");
        $recent_records = $stmt->fetchAll();
    } catch (Exception $e) {
        $recent_records = [];
    }
}

if (empty($recent_records)) {
    $recent_records = [
        ['id' => 1, 'title' => 'E-commerce Multi-Vendor Portal', 'client_name' => 'Rahul Sharma', 'category' => 'Web Application', 'budget' => 45000, 'status' => 'active'],
        ['id' => 2, 'title' => 'Doctor Appointment & Telehealth App', 'client_name' => 'Dr. Priya Mehta', 'category' => 'Custom Software', 'budget' => 60000, 'status' => 'completed'],
        ['id' => 3, 'title' => 'School Management & Fee ERP', 'client_name' => 'DPS Academy', 'category' => 'Enterprise ERP', 'budget' => 85000, 'status' => 'active'],
        ['id' => 4, 'title' => 'Real Estate Lead CRM & WhatsApp Bot', 'client_name' => 'Apex Realty', 'category' => 'CRM Automation', 'budget' => 35000, 'status' => 'pending'],
        ['id' => 5, 'title' => 'Hostinger Cloud CI/CD Deployment', 'client_name' => 'TechSpark Labs', 'category' => 'Cloud & DevOps', 'budget' => 25000, 'status' => 'completed'],
    ];
}
?>

<!-- WACRM Page Header Component -->
<div class="w-full flex flex-col sm:flex-row sm:items-center justify-between gap-3 sm:gap-4 pb-3 sm:pb-4 border-b border-slate-200 mb-6">
    <div class="min-w-0 flex-1">
        <h1 class="text-lg sm:text-2xl font-bold tracking-tight text-slate-900 truncate">
            Dashboard Overview
        </h1>
        <p class="text-xs sm:text-sm font-normal text-slate-500 mt-0.5 sm:mt-1 truncate">
            Real-time pipeline metrics, project records, and activity summary.
        </p>
    </div>

    <div class="flex items-center gap-2.5 sm:gap-3 shrink-0">
        <a href="records.php" 
           class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-lg text-xs sm:text-sm font-semibold transition-colors bg-emerald-700 text-white hover:bg-emerald-800 shadow-xs px-3.5 sm:px-4 py-2 min-h-[38px] sm:min-h-[42px] cursor-pointer">
            <i data-lucide="plus" class="w-4 h-4"></i>
            <span>New Record</span>
        </a>
    </div>
</div>

<!-- WACRM StatTile Grid (2 cols mobile, 4 cols desktop) -->
<div class="grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4 mb-6">
    
    <!-- Stat 1: Revenue -->
    <div class="rounded-xl border border-slate-300 bg-white p-3.5 sm:p-5 text-slate-900 shadow-xs flex flex-col justify-between space-y-2">
        <div class="flex items-center justify-between gap-1.5 sm:gap-2">
            <span class="text-xs font-medium text-slate-500 leading-tight truncate min-w-0">Total Revenue</span>
            <i data-lucide="indian-rupee" class="w-4 h-4 text-slate-400 shrink-0"></i>
        </div>
        <div class="space-y-1">
            <div class="text-xl sm:text-2xl font-semibold tracking-tight text-slate-900">₹2,50,000</div>
            <div class="text-xs font-normal text-emerald-700 truncate leading-normal flex items-center gap-1">
                <i data-lucide="trending-up" class="w-3 h-3"></i>
                <span>+14.2% this month</span>
            </div>
        </div>
    </div>

    <!-- Stat 2: Active Projects -->
    <div class="rounded-xl border border-slate-300 bg-white p-3.5 sm:p-5 text-slate-900 shadow-xs flex flex-col justify-between space-y-2">
        <div class="flex items-center justify-between gap-1.5 sm:gap-2">
            <span class="text-xs font-medium text-slate-500 leading-tight truncate min-w-0">Active Deals</span>
            <i data-lucide="folder-kanban" class="w-4 h-4 text-slate-400 shrink-0"></i>
        </div>
        <div class="space-y-1">
            <div class="text-xl sm:text-2xl font-semibold tracking-tight text-slate-900">12 Deals</div>
            <div class="text-xs font-normal text-slate-500 truncate leading-normal">4 in active funnel</div>
        </div>
    </div>

    <!-- Stat 3: Total Clients -->
    <div class="rounded-xl border border-slate-300 bg-white p-3.5 sm:p-5 text-slate-900 shadow-xs flex flex-col justify-between space-y-2">
        <div class="flex items-center justify-between gap-1.5 sm:gap-2">
            <span class="text-xs font-medium text-slate-500 leading-tight truncate min-w-0">Total Clients</span>
            <i data-lucide="users" class="w-4 h-4 text-slate-400 shrink-0"></i>
        </div>
        <div class="space-y-1">
            <div class="text-xl sm:text-2xl font-semibold tracking-tight text-slate-900">48 Accounts</div>
            <div class="text-xs font-normal text-slate-500 truncate leading-normal">+8 new acquired</div>
        </div>
    </div>

    <!-- Stat 4: System Uptime -->
    <div class="rounded-xl border border-slate-300 bg-white p-3.5 sm:p-5 text-slate-900 shadow-xs flex flex-col justify-between space-y-2">
        <div class="flex items-center justify-between gap-1.5 sm:gap-2">
            <span class="text-xs font-medium text-slate-500 leading-tight truncate min-w-0">System Status</span>
            <i data-lucide="activity" class="w-4 h-4 text-slate-400 shrink-0"></i>
        </div>
        <div class="space-y-1">
            <div class="text-xl sm:text-2xl font-semibold tracking-tight text-slate-900">99.98%</div>
            <div class="text-xs font-normal text-emerald-700 truncate leading-normal flex items-center gap-1">
                <span class="w-2 h-2 rounded-full bg-[#25D366]"></span>
                <span>Hostinger Cloud Online</span>
            </div>
        </div>
    </div>

</div>

<!-- Recent Records Header -->
<div class="flex items-center justify-between mb-3">
    <div>
        <h2 class="text-base font-semibold text-slate-900">Recent Projects & Activity</h2>
        <p class="text-xs text-slate-500">Latest business records in your pipeline.</p>
    </div>
    <a href="records.php" class="text-xs font-semibold text-[#008069] hover:underline flex items-center gap-1">
        <span>View all records</span>
        <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
    </a>
</div>

<!-- DUAL-MODE TABLE RESPONSIVENESS (100% WACRM Table.jsx Standard) -->

<!-- 1. DESKTOP VIEW (>= 768px): Sticky Header Table with Crisp Borders -->
<div class="hidden md:block overflow-x-auto rounded-xl border border-slate-300 bg-white shadow-xs">
    <table class="w-full caption-bottom text-sm text-left border-collapse">
        <thead class="bg-slate-100 border-b border-slate-300 sticky top-0 z-10">
            <tr>
                <th class="h-11 px-4 text-xs font-semibold text-slate-700 whitespace-nowrap">Project Title</th>
                <th class="h-11 px-4 text-xs font-semibold text-slate-700 whitespace-nowrap">Client Name</th>
                <th class="h-11 px-4 text-xs font-semibold text-slate-700 whitespace-nowrap">Category</th>
                <th class="h-11 px-4 text-xs font-semibold text-slate-700 whitespace-nowrap">Budget</th>
                <th class="h-11 px-4 text-xs font-semibold text-slate-700 whitespace-nowrap">Status</th>
                <th class="h-11 px-4 text-xs font-semibold text-slate-700 whitespace-nowrap text-right">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-200 bg-white">
            <?php foreach ($recent_records as $rec): 
                $status_badges = [
                    'active'    => 'bg-emerald-50 text-emerald-700 border-emerald-200',
                    'completed' => 'bg-blue-50 text-blue-700 border-blue-200',
                    'pending'   => 'bg-amber-50 text-amber-800 border-amber-200',
                    'cancelled' => 'bg-red-50 text-red-700 border-red-200',
                ];
                $badge_class = $status_badges[$rec['status']] ?? 'bg-slate-50 text-slate-700 border-slate-200';
            ?>
                <tr class="hover:bg-slate-50 transition-colors">
                    <td class="p-4 align-middle font-bold text-slate-900 text-sm">
                        <?php echo htmlspecialchars($rec['title']); ?>
                    </td>
                    <td class="p-4 align-middle text-slate-600 text-sm">
                        <?php echo htmlspecialchars($rec['client_name']); ?>
                    </td>
                    <td class="p-4 align-middle text-slate-500 text-xs">
                        <?php echo htmlspecialchars($rec['category']); ?>
                    </td>
                    <td class="p-4 align-middle font-semibold text-slate-900 text-sm">
                        ₹<?php echo number_format($rec['budget']); ?>
                    </td>
                    <td class="p-4 align-middle">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold border <?php echo $badge_class; ?>">
                            <?php echo ucfirst($rec['status']); ?>
                        </span>
                    </td>
                    <td class="p-4 align-middle text-right">
                        <a href="records.php" class="p-1.5 text-slate-400 hover:text-slate-800 hover:bg-slate-100 rounded-lg inline-flex items-center justify-center transition-colors">
                            <i data-lucide="arrow-up-right" class="w-4 h-4"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- 2. MOBILE VIEW (< 768px): Card Per Row (Zero Cut-Off, Zero Horizontal Overflow) -->
<div class="md:hidden space-y-3">
    <?php foreach ($recent_records as $rec): 
        $status_badges = [
            'active'    => 'bg-emerald-50 text-emerald-700 border-emerald-200',
            'completed' => 'bg-blue-50 text-blue-700 border-blue-200',
            'pending'   => 'bg-amber-50 text-amber-800 border-amber-200',
            'cancelled' => 'bg-red-50 text-red-700 border-red-200',
        ];
        $badge_class = $status_badges[$rec['status']] ?? 'bg-slate-50 text-slate-700 border-slate-200';
    ?>
        <div class="rounded-xl border border-slate-300 bg-white p-4 shadow-xs space-y-2.5 text-sm">
            <div class="flex items-start justify-between gap-2">
                <span class="font-bold text-slate-900 leading-snug"><?php echo htmlspecialchars($rec['title']); ?></span>
                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[11px] font-bold border shrink-0 <?php echo $badge_class; ?>">
                    <?php echo ucfirst($rec['status']); ?>
                </span>
            </div>
            
            <div class="text-xs text-slate-500 flex items-center justify-between border-t border-slate-100 pt-2">
                <span>Client: <strong class="text-slate-800"><?php echo htmlspecialchars($rec['client_name']); ?></strong></span>
                <span class="font-bold text-slate-900 text-sm">₹<?php echo number_format($rec['budget']); ?></span>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
