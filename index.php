<?php
/**
 * NexusDash - Main Analytics Dashboard
 * 
 * Engineered by: Online Growth Hub
 * Website: https://onlinegrowthhub.in
 * Contact / WhatsApp: +91 9032666855
 */

$page_title = 'Analytics & Overview';
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

// Fallback dummy records if DB not connected yet
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

<!-- Welcome Banner with Action Buttons -->
<div class="mb-8 flex flex-col md:flex-row md:items-center justify-between gap-4">
    <div>
        <h1 class="text-2xl font-bold tracking-tight text-slate-900 flex items-center gap-2">
            <span>Welcome back, <?php echo htmlspecialchars($current_user['name']); ?></span>
            <span class="text-xl">👋</span>
        </h1>
        <p class="text-sm text-slate-500 mt-1">
            Engineered by <a href="<?php echo AGENCY_WEBSITE; ?>" target="_blank" class="font-semibold text-blue-600 hover:underline"><?php echo AGENCY_NAME; ?></a>. Production system active.
        </p>
    </div>
    <div class="flex items-center gap-3">
        <a href="<?php echo AGENCY_WHATSAPP_URL; ?>" target="_blank" 
           class="inline-flex items-center gap-2 px-3.5 py-2 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-semibold shadow-sm transition">
            <i data-lucide="phone-call" class="w-4 h-4"></i>
            <span>Hire Dev: <?php echo AGENCY_PHONE_RAW; ?></span>
        </a>
        <a href="records.php" 
           class="inline-flex items-center gap-2 px-3.5 py-2 rounded-xl bg-blue-600 hover:bg-blue-700 text-white text-xs font-semibold shadow-sm transition">
            <i data-lucide="plus-circle" class="w-4 h-4"></i>
            <span>New Record</span>
        </a>
    </div>
</div>

<!-- 4 Modern Stat Cards (WACRM Style) -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-8">
    
    <!-- Stat 1: Revenue -->
    <div class="nexus-card p-5">
        <div class="flex items-center justify-between mb-3">
            <span class="text-xs font-semibold uppercase tracking-wider text-slate-500">Total Revenue</span>
            <div class="w-9 h-9 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center">
                <i data-lucide="indian-rupee" class="w-4 h-4"></i>
            </div>
        </div>
        <div class="flex items-baseline justify-between">
            <span class="text-2xl font-extrabold text-slate-900 tracking-tight">₹2,50,000</span>
            <span class="inline-flex items-center gap-1 text-[11px] font-bold text-emerald-600 bg-emerald-50 px-2 py-0.5 rounded-full">
                <i data-lucide="trending-up" class="w-3 h-3"></i>
                +14.2%
            </span>
        </div>
        <p class="text-xs text-slate-400 mt-2 font-medium">Compared to last month</p>
    </div>

    <!-- Stat 2: Active Projects -->
    <div class="nexus-card p-5">
        <div class="flex items-center justify-between mb-3">
            <span class="text-xs font-semibold uppercase tracking-wider text-slate-500">Active Projects</span>
            <div class="w-9 h-9 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center">
                <i data-lucide="folder-kanban" class="w-4 h-4"></i>
            </div>
        </div>
        <div class="flex items-baseline justify-between">
            <span class="text-2xl font-extrabold text-slate-900 tracking-tight">12 Active</span>
            <span class="inline-flex items-center gap-1 text-[11px] font-bold text-blue-600 bg-blue-50 px-2 py-0.5 rounded-full">
                4 Pending
            </span>
        </div>
        <p class="text-xs text-slate-400 mt-2 font-medium">Across all client pipelines</p>
    </div>

    <!-- Stat 3: Total Clients -->
    <div class="nexus-card p-5">
        <div class="flex items-center justify-between mb-3">
            <span class="text-xs font-semibold uppercase tracking-wider text-slate-500">Total Clients</span>
            <div class="w-9 h-9 rounded-xl bg-indigo-50 text-indigo-600 flex items-center justify-center">
                <i data-lucide="users" class="w-4 h-4"></i>
            </div>
        </div>
        <div class="flex items-baseline justify-between">
            <span class="text-2xl font-extrabold text-slate-900 tracking-tight">48 Accounts</span>
            <span class="inline-flex items-center gap-1 text-[11px] font-bold text-indigo-600 bg-indigo-50 px-2 py-0.5 rounded-full">
                +8 New
            </span>
        </div>
        <p class="text-xs text-slate-400 mt-2 font-medium">Active customer database</p>
    </div>

    <!-- Stat 4: System Uptime -->
    <div class="nexus-card p-5">
        <div class="flex items-center justify-between mb-3">
            <span class="text-xs font-semibold uppercase tracking-wider text-slate-500">Hostinger Cloud</span>
            <div class="w-9 h-9 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center">
                <i data-lucide="zap" class="w-4 h-4"></i>
            </div>
        </div>
        <div class="flex items-baseline justify-between">
            <span class="text-2xl font-extrabold text-slate-900 tracking-tight">99.98%</span>
            <span class="inline-flex items-center gap-1 text-[11px] font-bold text-emerald-600 bg-emerald-50 px-2 py-0.5 rounded-full">
                Operational
            </span>
        </div>
        <p class="text-xs text-slate-400 mt-2 font-medium">High performance verified</p>
    </div>

</div>

<!-- Recent Records / Table Showcase -->
<div class="nexus-card overflow-hidden mb-8">
    <div class="p-5 border-b border-slate-200 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
        <div>
            <h3 class="text-base font-bold text-slate-900">Recent Projects & Deployments</h3>
            <p class="text-xs text-slate-500 mt-0.5">Real-time status of your projects and client deliverables.</p>
        </div>
        <a href="records.php" class="inline-flex items-center gap-1.5 text-xs font-semibold text-blue-600 hover:text-blue-700">
            <span>View All Records</span>
            <i data-lucide="chevron-right" class="w-4 h-4"></i>
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left nexus-table">
            <thead>
                <tr>
                    <th class="py-3 px-5">Project Title</th>
                    <th class="py-3 px-5">Client Name</th>
                    <th class="py-3 px-5">Category</th>
                    <th class="py-3 px-5">Budget</th>
                    <th class="py-3 px-5">Status</th>
                    <th class="py-3 px-5 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                <?php foreach ($recent_records as $rec): 
                    $status_classes = [
                        'active'    => 'bg-blue-50 text-blue-700 border-blue-200',
                        'completed' => 'bg-emerald-50 text-emerald-700 border-emerald-200',
                        'pending'   => 'bg-amber-50 text-amber-700 border-amber-200',
                        'cancelled' => 'bg-rose-50 text-rose-700 border-rose-200',
                    ];
                    $badge_class = $status_classes[$rec['status']] ?? 'bg-slate-50 text-slate-700 border-slate-200';
                ?>
                    <tr>
                        <td class="py-3.5 px-5 font-bold text-slate-800">
                            <?php echo htmlspecialchars($rec['title']); ?>
                        </td>
                        <td class="py-3.5 px-5 font-medium text-slate-600">
                            <?php echo htmlspecialchars($rec['client_name']); ?>
                        </td>
                        <td class="py-3.5 px-5 text-xs text-slate-500">
                            <?php echo htmlspecialchars($rec['category']); ?>
                        </td>
                        <td class="py-3.5 px-5 font-bold text-slate-800">
                            ₹<?php echo number_format($rec['budget']); ?>
                        </td>
                        <td class="py-3.5 px-5">
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-bold border <?php echo $badge_class; ?>">
                                <?php echo ucfirst($rec['status']); ?>
                            </span>
                        </td>
                        <td class="py-3.5 px-5 text-right">
                            <button onclick="showNexusToast('Viewing record: <?php echo htmlspecialchars($rec['title']); ?>', 'success')" 
                                    class="p-1.5 rounded-lg text-slate-400 hover:text-slate-700 hover:bg-slate-100 transition">
                                <i data-lucide="eye" class="w-4 h-4"></i>
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Agency Promotion / Project Pitch Banner -->
<div class="rounded-2xl p-6 bg-gradient-to-r from-slate-900 via-slate-800 to-blue-950 text-white relative overflow-hidden border border-slate-800 shadow-lg">
    <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-6">
        <div class="max-w-xl">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-500/20 border border-blue-400/30 text-blue-300 text-xs font-semibold mb-3">
                <i data-lucide="sparkles" class="w-3.5 h-3.5"></i>
                <span>Official Partner & Development Agency</span>
            </div>
            <h3 class="text-xl md:text-2xl font-bold tracking-tight mb-2">
                Have a Complex Web Application or Client Project in Mind?
            </h3>
            <p class="text-sm text-slate-300 leading-relaxed">
                Connect with <strong>Online Growth Hub</strong> for end-to-end custom development: Razorpay payments, WhatsApp Cloud CRM, Hostinger Git CI/CD, MySQL architectures, and custom portals.
            </p>
        </div>
        <div class="flex flex-col sm:flex-row items-center gap-3 flex-shrink-0">
            <a href="<?php echo AGENCY_WHATSAPP_URL; ?>" target="_blank" 
               class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-5 py-3 rounded-xl bg-emerald-500 hover:bg-emerald-600 text-white font-bold text-sm transition shadow-lg shadow-emerald-500/20">
                <i data-lucide="message-square" class="w-4 h-4"></i>
                <span>Call/WhatsApp: <?php echo AGENCY_PHONE_RAW; ?></span>
            </a>
            <a href="<?php echo AGENCY_WEBSITE; ?>" target="_blank" 
               class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-5 py-3 rounded-xl bg-white/10 hover:bg-white/20 border border-white/20 text-white font-semibold text-sm transition">
                <i data-lucide="globe" class="w-4 h-4"></i>
                <span>Visit Website</span>
            </a>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
