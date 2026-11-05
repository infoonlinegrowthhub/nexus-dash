<?php
/**
 * NexusDash - Authentication / Sign In
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

        // 1. Try DB validation if connected
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

        // 2. Demo Fallback authentication
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
<html lang="en" class="h-full bg-slate-950">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In - <?php echo APP_NAME; ?> | <?php echo AGENCY_NAME; ?></title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link rel="stylesheet" href="assets/css/nexus.css">
</head>
<body class="h-full flex items-center justify-center p-4 bg-gradient-to-tr from-slate-950 via-slate-900 to-blue-950 text-slate-100 font-sans antialiased">

    <div class="w-full max-w-md">
        
        <!-- Brand Header -->
        <div class="text-center mb-8">
            <div class="inline-flex w-12 h-12 rounded-2xl bg-gradient-to-tr from-blue-600 to-indigo-500 items-center justify-center text-white font-extrabold text-2xl shadow-xl shadow-blue-500/25 mb-3">
                N
            </div>
            <h1 class="text-2xl font-bold tracking-tight text-white"><?php echo APP_NAME; ?></h1>
            <p class="text-xs text-slate-400 mt-1">Enterprise Application Core by <a href="<?php echo AGENCY_WEBSITE; ?>" target="_blank" class="text-blue-400 hover:underline"><?php echo AGENCY_NAME; ?></a></p>
        </div>

        <!-- Login Card -->
        <div class="bg-slate-900/80 backdrop-blur-md border border-slate-800 rounded-2xl p-7 shadow-2xl">
            
            <?php if ($error): ?>
                <div class="mb-5 p-3 rounded-xl bg-rose-500/10 border border-rose-500/25 text-rose-300 text-xs flex items-center gap-2">
                    <i data-lucide="alert-circle" class="w-4 h-4 flex-shrink-0"></i>
                    <span><?php echo htmlspecialchars($error); ?></span>
                </div>
            <?php endif; ?>

            <form method="POST" action="login.php" class="space-y-4">
                <div>
                    <label class="block text-xs font-semibold text-slate-300 mb-1.5">Email Address</label>
                    <div class="relative">
                        <i data-lucide="mail" class="w-4 h-4 absolute left-3 top-3 text-slate-500"></i>
                        <input type="email" name="email" required value="admin@onlinegrowthhub.in" 
                               class="w-full pl-9 pr-3 py-2 text-xs bg-slate-950/80 border border-slate-800 rounded-xl text-white focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition">
                    </div>
                </div>

                <div>
                    <div class="flex items-center justify-between mb-1.5">
                        <label class="text-xs font-semibold text-slate-300">Password</label>
                        <a href="#" class="text-[11px] text-blue-400 hover:underline">Forgot?</a>
                    </div>
                    <div class="relative">
                        <i data-lucide="lock" class="w-4 h-4 absolute left-3 top-3 text-slate-500"></i>
                        <input type="password" name="password" required value="admin123" 
                               class="w-full pl-9 pr-3 py-2 text-xs bg-slate-950/80 border border-slate-800 rounded-xl text-white focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition">
                    </div>
                </div>

                <div class="pt-2">
                    <button type="submit" 
                            class="w-full py-2.5 px-4 rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-500 hover:to-indigo-500 text-white font-bold text-xs shadow-lg shadow-blue-600/30 transition flex items-center justify-center gap-2">
                        <span>Sign In to Dashboard</span>
                        <i data-lucide="arrow-right" class="w-4 h-4"></i>
                    </button>
                </div>
            </form>

            <!-- Demo Helper Box -->
            <div class="mt-6 pt-5 border-t border-slate-800/80 text-center">
                <p class="text-[11px] text-slate-400">
                    Default Demo Access: <code class="px-1.5 py-0.5 rounded bg-slate-800 text-blue-300 font-mono text-[10px]">admin@onlinegrowthhub.in</code> / <code class="px-1.5 py-0.5 rounded bg-slate-800 text-blue-300 font-mono text-[10px]">admin123</code>
                </p>
            </div>
        </div>

        <!-- Agency Promotion / Project Inquiries Footer -->
        <div class="mt-8 text-center text-xs text-slate-400">
            <p>Need Custom Software Development or Client Portals?</p>
            <div class="mt-2 flex items-center justify-center gap-3">
                <a href="<?php echo AGENCY_WHATSAPP_URL; ?>" target="_blank" 
                   class="inline-flex items-center gap-1.5 font-bold text-emerald-400 hover:text-emerald-300 transition">
                    <i data-lucide="phone-call" class="w-3.5 h-3.5"></i>
                    <span>Call/WhatsApp: <?php echo AGENCY_PHONE_RAW; ?></span>
                </a>
                <span>•</span>
                <a href="<?php echo AGENCY_WEBSITE; ?>" target="_blank" 
                   class="text-slate-300 hover:text-white transition font-medium">
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
