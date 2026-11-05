<?php
/**
 * NexusDash - Authentication / Sign In (100% WACRM Design System)
 * 
 * Engineered by: Online Growth Hub
 * Website: https://onlinegrowthhub.in
 * Contact / WhatsApp: +91 9032666855
 */

require_once __DIR__ . '/config/app.php';
require_once __DIR__ . '/config/db.php';

$error = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if (!empty($email) && !empty($password)) {
        $authenticated = false;
        $user_data = null;

        if ($db_connected && $pdo) {
            try {
                $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ? LIMIT 1");
                $stmt->execute([$email]);
                $user = $stmt->fetch();
                if ($user && password_verify($password, $user['password'])) {
                    $authenticated = true;
                    $user_data = [
                        'id'    => $user['id'],
                        'name'  => $user['name'],
                        'email' => $user['email'],
                        'role'  => $user['role'] ?? 'Admin',
                    ];
                }
            } catch (Exception $e) {
                // fall through
            }
        }

        if (!$authenticated && $email === 'admin@onlinegrowthhub.in' && $password === 'admin123') {
            $authenticated = true;
            $user_data = [
                'id'    => 1,
                'name'  => 'Online Growth Hub Admin',
                'email' => 'admin@onlinegrowthhub.in',
                'role'  => 'Super Admin',
            ];
        }

        if ($authenticated && $user_data) {
            $_SESSION['nexus_user'] = $user_data;
            header('Location: index.php');
            exit;
        } else {
            $error = 'Invalid credentials. Use demo: admin@onlinegrowthhub.in / admin123';
        }
    } else {
        $error = 'Please enter both email and password.';
    }
}
?>
<!DOCTYPE html>
<html lang="en" class="h-full bg-[#f5f8fc]">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Sign In - <?php echo APP_NAME; ?> | <?php echo AGENCY_NAME; ?></title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link rel="stylesheet" href="assets/css/nexus.css">
</head>
<body class="h-full flex items-center justify-center p-4 bg-[#f5f8fc] text-slate-900 font-sans antialiased">

    <div class="w-full max-w-md">
        
        <!-- Brand Header (WACRM Style) -->
        <div class="text-center mb-6">
            <div class="inline-flex w-12 h-12 rounded-xl bg-[#25D366] items-center justify-center text-white font-extrabold text-2xl shadow-xs mb-3">
                N
            </div>
            <h1 class="text-2xl font-bold tracking-tight text-slate-900"><?php echo APP_NAME; ?></h1>
            <p class="text-xs text-slate-500 mt-1">Application Foundation by <a href="<?php echo AGENCY_WEBSITE; ?>" target="_blank" class="font-semibold text-slate-800 hover:underline"><?php echo AGENCY_NAME; ?></a></p>
        </div>

        <!-- Login Card -->
        <div class="bg-white border border-slate-300 rounded-2xl p-6 sm:p-8 shadow-sm">
            
            <?php if ($error): ?>
                <div class="mb-5 p-3 rounded-xl bg-red-50 border border-red-200 text-red-700 text-xs flex items-center gap-2">
                    <i data-lucide="alert-circle" class="w-4 h-4 flex-shrink-0"></i>
                    <span><?php echo htmlspecialchars($error); ?></span>
                </div>
            <?php endif; ?>

            <form method="POST" action="login.php" class="space-y-4">
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1.5">Email Address</label>
                    <div class="relative">
                        <i data-lucide="mail" class="w-4 h-4 absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400"></i>
                        <input type="email" name="email" required value="admin@onlinegrowthhub.in" 
                               class="w-full pl-10 pr-4 py-2.5 text-xs bg-slate-50 border border-slate-300 rounded-xl text-slate-900 focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#25D366] transition">
                    </div>
                </div>

                <div>
                    <div class="flex items-center justify-between mb-1.5">
                        <label class="text-xs font-bold text-slate-700">Password</label>
                        <a href="#" class="text-[11px] text-[#008069] font-medium hover:underline">Forgot?</a>
                    </div>
                    <div class="relative">
                        <i data-lucide="lock" class="w-4 h-4 absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400"></i>
                        <input type="password" name="password" required value="admin123" 
                               class="w-full pl-10 pr-4 py-2.5 text-xs bg-slate-50 border border-slate-300 rounded-xl text-slate-900 focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#25D366] transition">
                    </div>
                </div>

                <div class="pt-2">
                    <button type="submit" 
                            class="w-full py-2.5 px-4 rounded-xl bg-emerald-700 hover:bg-emerald-800 text-white font-bold text-xs shadow-xs transition flex items-center justify-center gap-2 cursor-pointer">
                        <span>Sign In to Dashboard</span>
                        <i data-lucide="arrow-right" class="w-4 h-4"></i>
                    </button>
                </div>
            </form>

            <!-- Demo Helper Box -->
            <div class="mt-6 pt-5 border-t border-slate-200 text-center">
                <p class="text-[11px] text-slate-500">
                    Default Demo Access: <code class="px-1.5 py-0.5 rounded bg-slate-100 text-slate-800 font-mono text-[10px]">admin@onlinegrowthhub.in</code> / <code class="px-1.5 py-0.5 rounded bg-slate-100 text-slate-800 font-mono text-[10px]">admin123</code>
                </p>
            </div>
        </div>

        <!-- Agency Footer -->
        <div class="mt-6 text-center text-xs text-slate-500">
            <p><?php echo APP_NAME; ?> v<?php echo APP_VERSION; ?> • Engineered by <a href="<?php echo AGENCY_WEBSITE; ?>" target="_blank" class="font-semibold text-slate-700 hover:underline"><?php echo AGENCY_NAME; ?></a></p>
            <div class="mt-2 flex items-center justify-center gap-2">
                <span>Hire Us for Custom Development:</span>
                <a href="<?php echo AGENCY_WHATSAPP_URL; ?>" target="_blank" class="font-bold text-emerald-700 hover:text-emerald-800 transition">
                    <?php echo AGENCY_PHONE; ?>
                </a>
                <span>•</span>
                <a href="<?php echo AGENCY_WEBSITE; ?>" target="_blank" class="text-slate-600 hover:underline">
                    onlinegrowthhub.in
                </a>
            </div>
        </div>

    </div>

    <script>
        lucide.createIcons();
    </script>
</body>
</html>
