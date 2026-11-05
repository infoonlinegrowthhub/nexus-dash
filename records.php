<?php
/**
 * NexusDash - Reusable Records & Data Management (CRUD Example)
 * 
 * Engineered by: Online Growth Hub
 * Website: https://onlinegrowthhub.in
 * Contact / WhatsApp: +91 9032666855
 */

$page_title = 'Projects & Records Management';
require_once __DIR__ . '/config/db.php';

// Handle Form Submission (Add Record)
$form_message = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'create_record') {
    $title = trim($_POST['title'] ?? '');
    $client_name = trim($_POST['client_name'] ?? '');
    $client_phone = trim($_POST['client_phone'] ?? '');
    $category = trim($_POST['category'] ?? 'Web Development');
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
            // Mock success in offline/demo mode
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

// Fallback sample data
if (empty($records)) {
    $records = [
        ['id' => 1, 'title' => 'E-commerce Multi-Vendor Portal', 'client_name' => 'Rahul Sharma', 'client_phone' => '+91 9876543210', 'category' => 'Web Application', 'budget' => 45000, 'status' => 'active', 'created_at' => date('Y-m-d H:i:s')],
        ['id' => 2, 'title' => 'Doctor Appointment & Telehealth App', 'client_name' => 'Dr. Priya Mehta', 'client_phone' => '+91 9123456789', 'category' => 'Custom Software', 'budget' => 60000, 'status' => 'completed', 'created_at' => date('Y-m-d H:i:s')],
        ['id' => 3, 'title' => 'School Management & Fee ERP', 'client_name' => 'DPS Academy', 'client_phone' => '+91 9988776655', 'category' => 'Enterprise ERP', 'budget' => 85000, 'status' => 'active', 'created_at' => date('Y-m-d H:i:s')],
        ['id' => 4, 'title' => 'Real Estate Lead CRM & WhatsApp Bot', 'client_name' => 'Apex Realty', 'client_phone' => '+91 9871122334', 'category' => 'CRM Automation', 'budget' => 35000, 'status' => 'pending', 'created_at' => date('Y-m-d H:i:s')],
    ];
}
?>

<!-- Trigger Toast if Server Message Exists -->
<?php if ($form_message): ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            showNexusToast(<?php echo json_encode($form_message['text']); ?>, <?php echo json_encode($form_message['type']); ?>);
        });
    </script>
<?php endif; ?>

<!-- Page Header with Action Button -->
<div class="mb-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
    <div>
        <div class="flex items-center gap-2">
            <h1 class="text-2xl font-bold tracking-tight text-slate-900">Projects & Records</h1>
            <span class="px-2.5 py-0.5 rounded-full text-xs font-bold bg-blue-100 text-blue-700">
                <?php echo count($records); ?> Total
            </span>
        </div>
        <p class="text-xs text-slate-500 mt-1">
            Modular CRUD DataTable example for your custom PHP applications.
        </p>
    </div>
    
    <div class="flex items-center gap-3">
        <button onclick="openNexusModal('modal-add-record')" 
                class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold shadow-sm transition">
            <i data-lucide="plus" class="w-4 h-4"></i>
            <span>Add New Record</span>
        </button>
    </div>
</div>

<!-- Records Data Table Container -->
<div class="nexus-card overflow-hidden">
    
    <!-- Table Filter Header -->
    <div class="p-4 border-b border-slate-200 flex flex-col sm:flex-row sm:items-center justify-between gap-3 bg-white">
        <div class="relative w-full sm:w-72">
            <i data-lucide="search" class="w-4 h-4 absolute left-3 top-3 text-slate-400"></i>
            <input type="text" id="record-search-input" placeholder="Search by title or client..." 
                   class="w-full pl-9 pr-3 py-2 text-xs bg-slate-50 border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500">
        </div>

        <div class="flex items-center gap-2 overflow-x-auto pb-1 sm:pb-0">
            <button class="px-3 py-1.5 rounded-lg text-xs font-bold bg-slate-900 text-white shadow-2xs">All</button>
            <button class="px-3 py-1.5 rounded-lg text-xs font-medium text-slate-600 hover:bg-slate-100 transition">Active</button>
            <button class="px-3 py-1.5 rounded-lg text-xs font-medium text-slate-600 hover:bg-slate-100 transition">Completed</button>
            <button class="px-3 py-1.5 rounded-lg text-xs font-medium text-slate-600 hover:bg-slate-100 transition">Pending</button>
        </div>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="w-full text-left nexus-table">
            <thead>
                <tr>
                    <th class="py-3 px-5">ID</th>
                    <th class="py-3 px-5">Project Details</th>
                    <th class="py-3 px-5">Client & Contact</th>
                    <th class="py-3 px-5">Category</th>
                    <th class="py-3 px-5">Budget</th>
                    <th class="py-3 px-5">Status</th>
                    <th class="py-3 px-5 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100" id="records-table-body">
                <?php foreach ($records as $item): 
                    $status_classes = [
                        'active'    => 'bg-blue-50 text-blue-700 border-blue-200',
                        'completed' => 'bg-emerald-50 text-emerald-700 border-emerald-200',
                        'pending'   => 'bg-amber-50 text-amber-700 border-amber-200',
                        'cancelled' => 'bg-rose-50 text-rose-700 border-rose-200',
                    ];
                    $badge_class = $status_classes[$item['status']] ?? 'bg-slate-50 text-slate-700 border-slate-200';
                ?>
                    <tr class="record-row">
                        <td class="py-3.5 px-5 font-mono text-xs text-slate-400">#<?php echo $item['id']; ?></td>
                        <td class="py-3.5 px-5">
                            <span class="block font-bold text-slate-900 text-sm"><?php echo htmlspecialchars($item['title']); ?></span>
                            <span class="block text-[11px] text-slate-400">Created: <?php echo date('d M, Y', strtotime($item['created_at'] ?? 'now')); ?></span>
                        </td>
                        <td class="py-3.5 px-5">
                            <span class="block font-medium text-slate-800 text-xs"><?php echo htmlspecialchars($item['client_name']); ?></span>
                            <span class="block text-[11px] text-slate-500 font-mono"><?php echo htmlspecialchars($item['client_phone'] ?? 'N/A'); ?></span>
                        </td>
                        <td class="py-3.5 px-5 text-xs text-slate-600">
                            <?php echo htmlspecialchars($item['category']); ?>
                        </td>
                        <td class="py-3.5 px-5 font-bold text-slate-900 text-xs">
                            ₹<?php echo number_format($item['budget']); ?>
                        </td>
                        <td class="py-3.5 px-5">
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-bold border <?php echo $badge_class; ?>">
                                <?php echo ucfirst($item['status']); ?>
                            </span>
                        </td>
                        <td class="py-3.5 px-5 text-right">
                            <div class="flex items-center justify-end gap-1.5">
                                <button onclick="showNexusToast('Editing record #<?php echo $item['id']; ?>', 'success')" 
                                        class="p-1.5 rounded-lg text-slate-400 hover:text-blue-600 hover:bg-blue-50 transition" title="Edit">
                                    <i data-lucide="edit-3" class="w-4 h-4"></i>
                                </button>
                                <button onclick="showNexusToast('Demo: Record deleted!', 'error')" 
                                        class="p-1.5 rounded-lg text-slate-400 hover:text-rose-600 hover:bg-rose-50 transition" title="Delete">
                                    <i data-lucide="trash-2" class="w-4 h-4"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>

<!-- Modal: Add New Record (Clean WACRM-style Dialog) -->
<div id="modal-add-record" class="fixed inset-0 z-50 hidden items-center justify-center bg-slate-950/60 backdrop-blur-xs p-4">
    <div class="bg-white rounded-2xl shadow-2xl border border-slate-200 w-full max-w-lg overflow-hidden animate-in fade-in zoom-in-95 duration-200">
        
        <!-- Modal Header -->
        <div class="px-6 py-4 border-b border-slate-100 flex items-center justify-between bg-slate-50">
            <div>
                <h3 class="text-base font-bold text-slate-900">Create New Project Record</h3>
                <p class="text-xs text-slate-500">All fields marked * are required.</p>
            </div>
            <button onclick="closeNexusModal('modal-add-record')" class="p-1.5 rounded-lg text-slate-400 hover:text-slate-700 hover:bg-slate-200 transition">
                <i data-lucide="x" class="w-5 h-5"></i>
            </button>
        </div>

        <!-- Modal Form -->
        <form method="POST" action="records.php" class="p-6 space-y-4">
            <input type="hidden" name="action" value="create_record">

            <div>
                <label class="block text-xs font-semibold text-slate-700 mb-1.5">Project Title *</label>
                <input type="text" name="title" required placeholder="e.g. Real Estate CRM Portal" 
                       class="w-full px-3 py-2 text-xs bg-slate-50 border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500">
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1.5">Client Name *</label>
                    <input type="text" name="client_name" required placeholder="e.g. Ramesh Verma" 
                           class="w-full px-3 py-2 text-xs bg-slate-50 border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1.5">Client Phone</label>
                    <input type="text" name="client_phone" placeholder="e.g. +91 9876543210" 
                           class="w-full px-3 py-2 text-xs bg-slate-50 border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1.5">Category</label>
                    <select name="category" class="w-full px-3 py-2 text-xs bg-slate-50 border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500">
                        <option value="Web Application">Web Application</option>
                        <option value="Custom Software">Custom Software</option>
                        <option value="Enterprise ERP">Enterprise ERP</option>
                        <option value="CRM Automation">CRM Automation</option>
                        <option value="Cloud & DevOps">Cloud & DevOps</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1.5">Budget (₹)</label>
                    <input type="number" name="budget" placeholder="e.g. 50000" 
                           class="w-full px-3 py-2 text-xs bg-slate-50 border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500">
                </div>
            </div>

            <div>
                <label class="block text-xs font-semibold text-slate-700 mb-1.5">Initial Status</label>
                <select name="status" class="w-full px-3 py-2 text-xs bg-slate-50 border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500">
                    <option value="active">Active</option>
                    <option value="pending">Pending</option>
                    <option value="completed">Completed</option>
                </select>
            </div>

            <!-- Modal Actions -->
            <div class="pt-4 border-t border-slate-100 flex items-center justify-end gap-3">
                <button type="button" onclick="closeNexusModal('modal-add-record')" 
                        class="px-4 py-2 text-xs font-semibold text-slate-600 hover:bg-slate-100 rounded-xl transition">
                    Cancel
                </button>
                <button type="submit" 
                        class="px-5 py-2 text-xs font-bold text-white bg-blue-600 hover:bg-blue-700 rounded-xl shadow-sm transition">
                    Save Record
                </button>
            </div>
        </form>
    </div>
</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>

