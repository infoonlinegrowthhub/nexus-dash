<?php
/**
 * NexusDash - Records CRUD (100% WACRM Design System & Consistency)
 * 
 * Engineered by: Online Growth Hub
 * Website: https://onlinegrowthhub.in
 * Contact / WhatsApp: +91 9032666855
 */

$page_title = 'Projects & Records';
require_once __DIR__ . '/config/db.php';

// Handle Form Submission
$form_message = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'create_record') {
    $title = trim($_POST['title'] ?? '');
    $client_name = trim($_POST['client_name'] ?? '');
    $client_phone = trim($_POST['client_phone'] ?? '');
    $category = trim($_POST['category'] ?? 'Web Application');
    $budget = (float)($_POST['budget'] ?? 0);
    $status = trim($_POST['status'] ?? 'active');

    if (!empty($title) && !empty($client_name)) {
        if ($db_connected && $pdo) {
            try {
                $stmt = $pdo->prepare("INSERT INTO records (title, client_name, client_phone, category, budget, status) VALUES (?, ?, ?, ?, ?, ?)");
                $stmt->execute([$title, $client_name, $client_phone, $category, $budget, $status]);
                $form_message = ['type' => 'success', 'text' => "Record '$title' successfully created!"];
            } catch (Exception $e) {
                $form_message = ['type' => 'error', 'text' => "Database error: " . $e->getMessage()];
            }
        } else {
            $form_message = ['type' => 'success', 'text' => "Demo Mode: Record '$title' added successfully!"];
        }
    } else {
        $form_message = ['type' => 'error', 'text' => 'Please fill in required fields (Title & Client Name).'];
    }
}

require_once __DIR__ . '/includes/header.php';

// Fetch Records
$records = [];
if ($db_connected && $pdo) {
    try {
        $stmt = $pdo->query("SELECT * FROM records ORDER BY id DESC");
        $records = $stmt->fetchAll();
    } catch (Exception $e) {
        $records = [];
    }
}

if (empty($records)) {
    $records = [
        ['id' => 1, 'title' => 'E-commerce Multi-Vendor Portal', 'client_name' => 'Rahul Sharma', 'client_phone' => '+91 9876543210', 'category' => 'Web Application', 'budget' => 45000, 'status' => 'active', 'created_at' => date('Y-m-d H:i:s')],
        ['id' => 2, 'title' => 'Doctor Appointment & Telehealth App', 'client_name' => 'Dr. Priya Mehta', 'client_phone' => '+91 9123456789', 'category' => 'Custom Software', 'budget' => 60000, 'status' => 'completed', 'created_at' => date('Y-m-d H:i:s')],
        ['id' => 3, 'title' => 'School Management & Fee ERP', 'client_name' => 'DPS Academy', 'client_phone' => '+91 9988776655', 'category' => 'Enterprise ERP', 'budget' => 85000, 'status' => 'active', 'created_at' => date('Y-m-d H:i:s')],
        ['id' => 4, 'title' => 'Real Estate Lead CRM & WhatsApp Bot', 'client_name' => 'Apex Realty', 'client_phone' => '+91 9871122334', 'category' => 'CRM Automation', 'budget' => 35000, 'status' => 'pending', 'created_at' => date('Y-m-d H:i:s')],
    ];
}
?>

<!-- Toast Trigger if server message -->
<?php if ($form_message): ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            showNexusToast(<?php echo json_encode($form_message['text']); ?>, <?php echo json_encode($form_message['type']); ?>);
        });
    </script>
<?php endif; ?>

<!-- WACRM PageHeader Component -->
<div class="w-full flex flex-col sm:flex-row sm:items-center justify-between gap-3 sm:gap-4 pb-3 sm:pb-4 border-b border-slate-200 mb-6">
    <div class="min-w-0 flex-1">
        <div class="flex items-center gap-2.5">
            <h1 class="text-lg sm:text-2xl font-bold tracking-tight text-slate-900 truncate">
                Projects & Records
            </h1>
            <span class="px-2.5 py-0.5 rounded-full text-xs font-bold bg-slate-100 text-slate-700 border border-slate-200">
                <?php echo count($records); ?> Total
            </span>
        </div>
        <p class="text-xs sm:text-sm font-normal text-slate-500 mt-0.5 sm:mt-1 truncate">
            Modular DataTable with search, filters, and full mobile responsiveness.
        </p>
    </div>

    <div class="flex items-center gap-2.5 sm:gap-3 shrink-0">
        <button onclick="openNexusModal('modal-add-record')" 
                class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-lg text-xs sm:text-sm font-semibold transition-colors bg-emerald-700 text-white hover:bg-emerald-800 shadow-xs px-3.5 sm:px-4 py-2 min-h-[38px] sm:min-h-[42px] cursor-pointer">
            <i data-lucide="plus" class="w-4 h-4"></i>
            <span>Add New Record</span>
        </button>
    </div>
</div>

<!-- Search & Filter Controls -->
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 mb-4">
    <div class="relative w-full sm:w-80">
        <i data-lucide="search" class="w-4 h-4 text-slate-400 absolute left-3.5 top-1/2 -translate-y-1/2 pointer-events-none"></i>
        <input type="text" id="record-search" placeholder="Search by title or client name..." 
               class="w-full pl-10 pr-4 py-2 bg-white border border-slate-300 rounded-xl text-xs text-slate-800 placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-[#25D366] shadow-2xs">
    </div>

    <!-- Filter Pills (WACRM Pipeline Style) -->
    <div class="flex items-center gap-1.5 overflow-x-auto pb-1 sm:pb-0">
        <button class="px-3 py-1.5 rounded-lg text-xs font-bold bg-slate-900 text-white shadow-2xs">All</button>
        <button class="px-3 py-1.5 rounded-lg text-xs font-semibold text-slate-600 bg-white border border-slate-200 hover:bg-slate-50 transition">Active</button>
        <button class="px-3 py-1.5 rounded-lg text-xs font-semibold text-slate-600 bg-white border border-slate-200 hover:bg-slate-50 transition">Completed</button>
        <button class="px-3 py-1.5 rounded-lg text-xs font-semibold text-slate-600 bg-white border border-slate-200 hover:bg-slate-50 transition">Pending</button>
    </div>
</div>

<!-- 1. DESKTOP VIEW (>= 768px): Sticky Header Table with Crisp Slate Borders -->
<div class="hidden md:block overflow-x-auto rounded-xl border border-slate-300 bg-white shadow-xs">
    <table class="w-full caption-bottom text-sm text-left border-collapse">
        <thead class="bg-slate-100 border-b border-slate-300 sticky top-0 z-10">
            <tr>
                <th class="h-11 px-4 text-xs font-semibold text-slate-700 whitespace-nowrap">ID</th>
                <th class="h-11 px-4 text-xs font-semibold text-slate-700 whitespace-nowrap">Project Details</th>
                <th class="h-11 px-4 text-xs font-semibold text-slate-700 whitespace-nowrap">Client & Contact</th>
                <th class="h-11 px-4 text-xs font-semibold text-slate-700 whitespace-nowrap">Category</th>
                <th class="h-11 px-4 text-xs font-semibold text-slate-700 whitespace-nowrap">Budget</th>
                <th class="h-11 px-4 text-xs font-semibold text-slate-700 whitespace-nowrap">Status</th>
                <th class="h-11 px-4 text-xs font-semibold text-slate-700 whitespace-nowrap text-right">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-200 bg-white" id="desktop-records-tbody">
            <?php foreach ($records as $item): 
                $status_badges = [
                    'active'    => 'bg-emerald-50 text-emerald-700 border-emerald-200',
                    'completed' => 'bg-blue-50 text-blue-700 border-blue-200',
                    'pending'   => 'bg-amber-50 text-amber-800 border-amber-200',
                    'cancelled' => 'bg-red-50 text-red-700 border-red-200',
                ];
                $badge_class = $status_badges[$item['status']] ?? 'bg-slate-50 text-slate-700 border-slate-200';
            ?>
                <tr class="hover:bg-slate-50 transition-colors">
                    <td class="p-4 align-middle font-mono text-xs text-slate-400">#<?php echo $item['id']; ?></td>
                    <td class="p-4 align-middle">
                        <span class="block font-bold text-slate-900 text-sm leading-tight"><?php echo htmlspecialchars($item['title']); ?></span>
                        <span class="block text-[11px] text-slate-400 mt-0.5">Created: <?php echo date('d M, Y', strtotime($item['created_at'] ?? 'now')); ?></span>
                    </td>
                    <td class="p-4 align-middle">
                        <span class="block font-semibold text-slate-800 text-sm"><?php echo htmlspecialchars($item['client_name']); ?></span>
                        <span class="block text-[11px] text-slate-500 font-mono"><?php echo htmlspecialchars($item['client_phone'] ?? 'N/A'); ?></span>
                    </td>
                    <td class="p-4 align-middle text-xs text-slate-600">
                        <?php echo htmlspecialchars($item['category']); ?>
                    </td>
                    <td class="p-4 align-middle font-bold text-slate-900 text-sm">
                        ₹<?php echo number_format($item['budget']); ?>
                    </td>
                    <td class="p-4 align-middle">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold border <?php echo $badge_class; ?>">
                            <?php echo ucfirst($item['status']); ?>
                        </span>
                    </td>
                    <td class="p-4 align-middle text-right">
                        <div class="flex items-center justify-end gap-1">
                            <button onclick="showNexusToast('Editing record #<?php echo $item['id']; ?>', 'success')" 
                                    class="p-1.5 text-slate-400 hover:text-slate-800 hover:bg-slate-100 rounded-lg transition-colors" title="Edit">
                                <i data-lucide="edit-3" class="w-4 h-4"></i>
                            </button>
                            <button onclick="showNexusToast('Record deleted!', 'error')" 
                                    class="p-1.5 text-slate-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition-colors" title="Delete">
                                <i data-lucide="trash-2" class="w-4 h-4"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- 2. MOBILE VIEW (< 768px): Responsive Cards (Zero Horizontal Overflow, Perfect Mobile UX) -->
<div class="md:hidden space-y-3" id="mobile-records-container">
    <?php foreach ($records as $item): 
        $status_badges = [
            'active'    => 'bg-emerald-50 text-emerald-700 border-emerald-200',
            'completed' => 'bg-blue-50 text-blue-700 border-blue-200',
            'pending'   => 'bg-amber-50 text-amber-800 border-amber-200',
            'cancelled' => 'bg-red-50 text-red-700 border-red-200',
        ];
        $badge_class = $status_badges[$item['status']] ?? 'bg-slate-50 text-slate-700 border-slate-200';
    ?>
        <div class="rounded-xl border border-slate-300 bg-white p-4 shadow-xs space-y-3 text-sm">
            <div class="flex items-start justify-between gap-2">
                <div>
                    <span class="text-[10px] font-mono font-bold text-slate-400">#<?php echo $item['id']; ?></span>
                    <h3 class="font-bold text-slate-900 text-sm leading-snug"><?php echo htmlspecialchars($item['title']); ?></h3>
                </div>
                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[11px] font-bold border shrink-0 <?php echo $badge_class; ?>">
                    <?php echo ucfirst($item['status']); ?>
                </span>
            </div>

            <div class="space-y-1.5 bg-slate-50 p-2.5 rounded-lg border border-slate-200/60 text-xs">
                <div class="flex items-center justify-between">
                    <span class="text-slate-500">Client:</span>
                    <span class="font-bold text-slate-800"><?php echo htmlspecialchars($item['client_name']); ?></span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-slate-500">Phone:</span>
                    <span class="font-mono text-slate-700"><?php echo htmlspecialchars($item['client_phone'] ?? 'N/A'); ?></span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-slate-500">Category:</span>
                    <span class="text-slate-700"><?php echo htmlspecialchars($item['category']); ?></span>
                </div>
            </div>

            <div class="flex items-center justify-between border-t border-slate-100 pt-2.5">
                <div>
                    <span class="text-[10px] text-slate-400 block uppercase font-medium">Budget</span>
                    <span class="font-bold text-slate-900 text-base">₹<?php echo number_format($item['budget']); ?></span>
                </div>
                <div class="flex items-center gap-1">
                    <button onclick="showNexusToast('Editing record #<?php echo $item['id']; ?>', 'success')" 
                            class="px-3 py-1.5 text-xs font-semibold text-slate-700 bg-slate-100 hover:bg-slate-200 rounded-lg transition-colors flex items-center gap-1">
                        <i data-lucide="edit-3" class="w-3.5 h-3.5"></i>
                        <span>Edit</span>
                    </button>
                    <button onclick="showNexusToast('Record deleted!', 'error')" 
                            class="p-1.5 text-red-600 hover:bg-red-50 rounded-lg transition-colors">
                        <i data-lucide="trash-2" class="w-4 h-4"></i>
                    </button>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<!-- WACRM Modal Dialog: Add New Record -->
<div id="modal-add-record" class="fixed inset-0 z-50 hidden items-center justify-center bg-slate-950/60 backdrop-blur-xs p-4">
    <div class="bg-white rounded-2xl shadow-2xl border border-slate-300 w-full max-w-lg overflow-hidden animate-in fade-in zoom-in-95 duration-150">
        
        <!-- Modal Header -->
        <div class="px-6 py-4 border-b border-slate-200 flex items-center justify-between bg-slate-50">
            <div>
                <h3 class="text-base font-bold text-slate-900">Add New Project Record</h3>
                <p class="text-xs text-slate-500 mt-0.5">Fill in the fields below to create a new project record.</p>
            </div>
            <button onclick="closeNexusModal('modal-add-record')" class="p-1.5 rounded-lg text-slate-400 hover:text-slate-700 hover:bg-slate-200 transition">
                <i data-lucide="x" class="w-5 h-5"></i>
            </button>
        </div>

        <!-- Form -->
        <form method="POST" action="records.php" class="p-6 space-y-4">
            <input type="hidden" name="action" value="create_record">

            <div>
                <label class="block text-xs font-bold text-slate-700 mb-1.5">Project Title *</label>
                <input type="text" name="title" required placeholder="e.g. Real Estate CRM Portal" 
                       class="w-full px-3.5 py-2.5 text-xs bg-slate-50/80 border border-slate-300 rounded-xl focus:bg-white transition-all">
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1.5">Client Name *</label>
                    <input type="text" name="client_name" required placeholder="e.g. Ramesh Verma" 
                           class="w-full px-3.5 py-2.5 text-xs bg-slate-50/80 border border-slate-300 rounded-xl focus:bg-white transition-all">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1.5">Client Phone</label>
                    <input type="text" name="client_phone" placeholder="e.g. +91 9876543210" 
                           class="w-full px-3.5 py-2.5 text-xs bg-slate-50/80 border border-slate-300 rounded-xl focus:bg-white transition-all">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1.5">Category</label>
                    <select name="category" class="w-full px-3.5 py-2.5 text-xs bg-slate-50/80 border border-slate-300 rounded-xl focus:bg-white transition-all">
                        <option value="Web Application">Web Application</option>
                        <option value="Custom Software">Custom Software</option>
                        <option value="Enterprise ERP">Enterprise ERP</option>
                        <option value="CRM Automation">CRM Automation</option>
                        <option value="Cloud & DevOps">Cloud & DevOps</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1.5">Budget (₹)</label>
                    <input type="number" name="budget" placeholder="e.g. 50000" 
                           class="w-full px-3.5 py-2.5 text-xs bg-slate-50/80 border border-slate-300 rounded-xl focus:bg-white transition-all">
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 mb-1.5">Initial Status</label>
                <select name="status" class="w-full px-3.5 py-2.5 text-xs bg-slate-50/80 border border-slate-300 rounded-xl focus:bg-white transition-all">
                    <option value="active">Active</option>
                    <option value="pending">Pending</option>
                    <option value="completed">Completed</option>
                </select>
            </div>

            <!-- Actions -->
            <div class="pt-4 border-t border-slate-200 flex items-center justify-end gap-3">
                <button type="button" onclick="closeNexusModal('modal-add-record')" 
                        class="px-4 py-2 text-xs font-semibold text-slate-600 hover:bg-slate-100 rounded-xl transition">
                    Cancel
                </button>
                <button type="submit" 
                        class="px-5 py-2.5 text-xs font-bold text-white bg-emerald-700 hover:bg-emerald-800 rounded-xl shadow-xs transition cursor-pointer">
                    Save Record
                </button>
            </div>
        </form>
    </div>
</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
