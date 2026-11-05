/**
 * Nexus Dash - Mock Data Repository
 * Purpose: Centralizes all placeholder datasets, metrics, and tabular records for every template view.
 * Note: Pure JavaScript objects without external network dependencies.
 */

const KpiMetricsData = [
    { id: "kpi-total-users", label: "Total Users", value: "24,582", trend: "+12.4%", trendUp: true, icon: "users", caption: "vs previous 30 days" },
    { id: "kpi-active-sessions", label: "Active Sessions", value: "1,842", trend: "+5.8%", trendUp: true, icon: "activity", caption: "Current live users" },
    { id: "kpi-revenue", label: "Revenue", value: "$48,250", trend: "+18.2%", trendUp: true, icon: "credit-card", caption: "Monthly recurring" },
    { id: "kpi-new-orders", label: "New Orders", value: "624", trend: "-2.1%", trendUp: false, icon: "shopping-bag", caption: "Processed this week" },
    { id: "kpi-open-tasks", label: "Open Tasks", value: "38", trend: "+4", trendUp: true, icon: "check-square", caption: "12 high priority" },
    { id: "kpi-pending-items", label: "Pending Items", value: "17", trend: "-8%", trendUp: false, icon: "clock", caption: "Requires manual review" }
];

const ChartDataSets = {
    activity: {
        "7d": {
            labels: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
            primarySeries: [420, 610, 580, 720, 890, 940, 1020],
            secondarySeries: [650, 890, 820, 1050, 1280, 1340, 1480]
        },
        "30d": {
            labels: ["Week 1", "Week 2", "Week 3", "Week 4"],
            primarySeries: [3200, 4800, 5600, 6900],
            secondarySeries: [4500, 6800, 7900, 9800]
        },
        "90d": {
            labels: ["Month 1", "Month 2", "Month 3"],
            primarySeries: [14200, 18500, 24582],
            secondarySeries: [19800, 26400, 35200]
        }
    },
    statusBreakdown: {
        labels: ["Completed", "In progress", "Failed"],
        values: [65, 25, 10],
        colors: ["#10b981", "#3b82f6", "#ef4444"]
    },
    analytics: {
        trafficTrend: {
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            organic: [12000, 15000, 18000, 22000, 26000, 31000, 35000, 39000, 42000, 47000, 52000, 58000],
            referral: [5000, 6200, 7800, 9100, 10400, 12200, 13500, 14800, 16200, 17500, 19000, 21500]
        },
        revenueByChannel: {
            labels: ["Direct Search", "Email Outreach", "Affiliate Referrals", "Social Channels", "Paid Search"],
            values: [24500, 18200, 12900, 9400, 15600]
        },
        deviceBreakdown: {
            labels: ["Desktop", "Mobile Browser", "Tablet Device"],
            values: [58, 36, 6],
            colors: ["#10b981", "#3b82f6", "#f59e0b"]
        },
        regionalDistribution: {
            labels: ["North America", "Europe", "Asia Pacific", "Latin America", "Middle East"],
            values: [42, 28, 18, 8, 4]
        }
    }
};

const QuickActionsData = [
    { id: "action-add-user", title: "Add User", description: "Create a new user account and assign roles", icon: "user-plus", modalId: "modal-add-user" },
    { id: "action-create-product", title: "Create Product", description: "Add an item to the catalog and inventory", icon: "package-plus", url: "products.html" },
    { id: "action-new-post", title: "New Post", description: "Publish a fresh article, notice, or update", icon: "file-plus", url: "content.html" },
    { id: "action-export-report", title: "Export Report", description: "Download analytical metrics as CSV", icon: "download", url: "reports.html" },
    { id: "action-send-notification", title: "Send Notification", description: "Broadcast instant alert to registered accounts", icon: "bell", url: "notifications.html" },
    { id: "action-invite-team", title: "Invite Team", description: "Send workspace invitations to collaborators", icon: "user-check", url: "team.html" }
];

const RecentRecordsData = [
    { id: "REF-1001", title: "Enterprise Application Update", category: "Software Development", account: "Alpha Corporation", budget: "$12,400", status: "Completed", statusType: "success" },
    { id: "REF-1002", title: "Cloud Infrastructure Setup", category: "DevOps & Cloud", account: "Beacon Logistics", budget: "$8,650", status: "In progress", statusType: "info" },
    { id: "REF-1003", title: "Security & Penetration Audit", category: "Cybersecurity", account: "Crest Financial", budget: "$15,200", status: "Completed", statusType: "success" },
    { id: "REF-1004", title: "Data Pipeline Integration", category: "Data Engineering", account: "Delta Retail", budget: "$4,800", status: "Pending", statusType: "warning" },
    { id: "REF-1005", title: "Real-time Dashboard Build", category: "Web Application", account: "Echo Technologies", budget: "$9,300", status: "In progress", statusType: "info" }
];

const MockUsersData = [
    { id: "USR-001", name: "Sarah Jenkins", email: "sarah.j@example.com", role: "Super Admin", status: "Active", joined: "12 Jan 2026", avatar: "SJ" },
    { id: "USR-002", name: "Michael Chang", email: "m.chang@example.com", role: "Manager", status: "Active", joined: "18 Jan 2026", avatar: "MC" },
    { id: "USR-003", name: "Elena Rostova", email: "elena.r@example.com", role: "Editor", status: "Active", joined: "24 Jan 2026", avatar: "ER" },
    { id: "USR-004", name: "David Kim", email: "d.kim@example.com", role: "Developer", status: "Pending", joined: "02 Feb 2026", avatar: "DK" },
    { id: "USR-005", name: "Amara Diallo", email: "amara.d@example.com", role: "Analyst", status: "Active", joined: "14 Feb 2026", avatar: "AD" },
    { id: "USR-006", name: "Lucas Vance", email: "l.vance@example.com", role: "Viewer", status: "Inactive", joined: "20 Feb 2026", avatar: "LV" },
    { id: "USR-007", name: "Rachel Adams", email: "r.adams@example.com", role: "Manager", status: "Active", joined: "01 Mar 2026", avatar: "RA" },
    { id: "USR-008", name: "Carlos Mendez", email: "c.mendez@example.com", role: "Developer", status: "Active", joined: "10 Mar 2026", avatar: "CM" },
    { id: "USR-009", name: "Priya Patel", email: "p.patel@example.com", role: "Editor", status: "Active", joined: "19 Mar 2026", avatar: "PP" },
    { id: "USR-010", name: "Thomas Scott", email: "t.scott@example.com", role: "Viewer", status: "Pending", joined: "28 Mar 2026", avatar: "TS" },
    { id: "USR-011", name: "Hannah Brooks", email: "h.brooks@example.com", role: "Developer", status: "Active", joined: "05 Apr 2026", avatar: "HB" },
    { id: "USR-012", name: "Liam O'Connor", email: "liam.oc@example.com", role: "Analyst", status: "Active", joined: "14 Apr 2026", avatar: "LO" }
];

const MockCustomersData = [
    { id: "CUST-501", name: "Apex Global Dynamics", contact: "Mark Foster", email: "mfoster@apexglobal.example", orders: 28, totalSpent: "$48,500", status: "Active" },
    { id: "CUST-502", name: "BlueSky Media Corp", contact: "Jessica Taylor", email: "jtaylor@bluesky.example", orders: 19, totalSpent: "$31,200", status: "Active" },
    { id: "CUST-503", name: "Cedar Ridge Health", contact: "Dr. Paul Simon", email: "psimon@cedarridge.example", orders: 42, totalSpent: "$74,900", status: "Active" },
    { id: "CUST-504", name: "Dovetail Furniture Ltd", contact: "Clara Oswald", email: "coswald@dovetail.example", orders: 8, totalSpent: "$9,400", status: "Pending" },
    { id: "CUST-505", name: "Evergreen Logistics", contact: "Robert Shaw", email: "rshaw@evergreen.example", orders: 35, totalSpent: "$56,100", status: "Active" },
    { id: "CUST-506", name: "Focal Point Optics", contact: "Nina Simone", email: "nsimone@focalpoint.example", orders: 3, totalSpent: "$2,850", status: "Inactive" },
    { id: "CUST-507", name: "Garrison Security", contact: "Alan Grant", email: "agrant@garrison.example", orders: 15, totalSpent: "$22,700", status: "Active" },
    { id: "CUST-508", name: "Harbor Freight Logistics", contact: "Owen Grady", email: "ogrady@harborfl.example", orders: 22, totalSpent: "$38,400", status: "Active" }
];

const MockOrdersData = [
    { id: "ORD-9401", customer: "Apex Global Dynamics", date: "04 Nov 2026", items: 5, total: "$3,450.00", paymentMethod: "Credit Card", status: "Completed" },
    { id: "ORD-9402", customer: "BlueSky Media Corp", date: "04 Nov 2026", items: 2, total: "$1,280.00", paymentMethod: "Bank Wire", status: "Processing" },
    { id: "ORD-9403", customer: "Cedar Ridge Health", date: "03 Nov 2026", items: 8, total: "$6,920.00", paymentMethod: "Corporate Net-30", status: "Completed" },
    { id: "ORD-9404", customer: "Dovetail Furniture Ltd", date: "03 Nov 2026", items: 1, total: "$450.00", paymentMethod: "Credit Card", status: "Pending" },
    { id: "ORD-9405", customer: "Evergreen Logistics", date: "02 Nov 2026", items: 4, total: "$2,100.00", paymentMethod: "Bank Wire", status: "Completed" },
    { id: "ORD-9406", customer: "Focal Point Optics", date: "01 Nov 2026", items: 1, total: "$320.00", paymentMethod: "Credit Card", status: "Cancelled" },
    { id: "ORD-9407", customer: "Garrison Security", date: "01 Nov 2026", items: 6, total: "$4,850.00", paymentMethod: "Corporate Net-30", status: "Completed" },
    { id: "ORD-9408", customer: "Harbor Freight Logistics", date: "31 Oct 2026", items: 3, total: "$1,750.00", paymentMethod: "Credit Card", status: "Processing" }
];

const MockProductsData = [
    { id: "PRD-101", name: "Enterprise Gateway Hub", sku: "EGH-2000", category: "Hardware", price: "$499.00", stock: 64, stockStatus: "In Stock", image: "assets/images/product-placeholder.svg", description: "Heavy-duty rackmount communication hub for high-throughput networks." },
    { id: "PRD-102", name: "Cloud Analytics Seat License", sku: "CAS-LIC", category: "Software", price: "$89.00", stock: 1200, stockStatus: "In Stock", image: "assets/images/product-placeholder.svg", description: "Monthly individual user seat for deep behavioral analysis and automated reporting." },
    { id: "PRD-103", name: "Smart IoT Sensor Node", sku: "SIS-N10", category: "Hardware", price: "$129.00", stock: 12, stockStatus: "Low Stock", image: "assets/images/product-placeholder.svg", description: "Ultra-low power wireless sensor for environmental and telemetry monitoring." },
    { id: "PRD-104", name: "Security Hardened Dongle", sku: "SHD-KEY", category: "Security", price: "$65.00", stock: 0, stockStatus: "Out of Stock", image: "assets/images/product-placeholder.svg", description: "FIPS compliant hardware security key for zero-trust authentication." },
    { id: "PRD-105", name: "Managed Backup Appliance", sku: "MBA-4TB", category: "Storage", price: "$750.00", stock: 28, stockStatus: "In Stock", image: "assets/images/product-placeholder.svg", description: "Self-healing on-premise encrypted storage node with automated cloud mirroring." },
    { id: "PRD-106", name: "Developer API Pro Tier", sku: "API-PRO", category: "Services", price: "$149.00", stock: 999, stockStatus: "In Stock", image: "assets/images/product-placeholder.svg", description: "Unlimited rate limits, priority webhooks, and sub-second SLA guarantee." }
];

const MockContentPostsData = [
    { id: "POST-01", title: "Q4 Product Strategy and Feature Roadmap", author: "Sarah Jenkins", category: "Announcements", status: "Published", views: "3,420", date: "02 Nov 2026", body: "<p>We are thrilled to announce our Q4 product releases focusing on performance, modular design, and seamless third-party integrations.</p><p>Key highlights include upgraded query speeds, fine-grained access permissions, and expanded webhooks.</p>" },
    { id: "POST-02", title: "Security Best Practices for Multi-Tenant Deployments", author: "David Kim", category: "Engineering", status: "Published", views: "2,150", date: "28 Oct 2026", body: "<p>Securing multi-tenant architectures requires rigorous isolation, encrypted database schemas, and zero-trust authorization checks on every boundary.</p>" },
    { id: "POST-03", title: "Migrating Legacy Monoliths to Event-Driven Pipelines", author: "Michael Chang", category: "Architecture", status: "Draft", views: "0", date: "25 Oct 2026", body: "<p>A practical guide detailing the decomposition of large monolithic data stores into decoupled pub/sub streaming queues without downtime.</p>" },
    { id: "POST-04", title: "Automating Continuous Performance Audits", author: "Elena Rostova", category: "DevOps", status: "Published", views: "1,890", date: "15 Oct 2026", body: "<p>Learn how our operations team integrates automated lighthouse and regression audits into pull request reviews.</p>" }
];

const MockMessagesData = {
    conversations: [
        { id: "MSG-1", name: "Sarah Jenkins", email: "sarah.j@example.com", avatar: "SJ", lastMessage: "Let's review the quarterly metrics before noon.", time: "10:32 AM", unread: 2 },
        { id: "MSG-2", name: "Apex Global Dynamics", email: "mfoster@apexglobal.example", avatar: "AG", lastMessage: "Invoice for PO-9801 has been settled.", time: "Yesterday", unread: 0 },
        { id: "MSG-3", name: "Michael Chang", email: "m.chang@example.com", avatar: "MC", lastMessage: "The database index update is completed.", time: "Nov 03", unread: 0 },
        { id: "MSG-4", name: "Elena Rostova", email: "elena.r@example.com", avatar: "ER", lastMessage: "Can you review the draft post when free?", time: "Nov 01", unread: 0 }
    ],
    thread: [
        { id: "th-1", sender: "Sarah Jenkins", avatar: "SJ", isMe: false, time: "10:15 AM", text: "Good morning! Did you get a chance to inspect the new analytics pipeline?" },
        { id: "th-2", sender: "Admin User", avatar: "AU", isMe: true, time: "10:20 AM", text: "Yes, I verified the throughput rates. Everything is running within the sub-50ms latency window." },
        { id: "th-3", sender: "Sarah Jenkins", avatar: "SJ", isMe: false, time: "10:32 AM", text: "Great news. Let's review the quarterly metrics before noon." }
    ]
};

const MockTasksData = {
    todo: [
        { id: "TSK-101", title: "Finalize SSL certificate renewal", category: "Security", priority: "High", dueDate: "08 Nov 2026" },
        { id: "TSK-102", title: "Audit third-party webhook endpoints", category: "Integrations", priority: "Medium", dueDate: "12 Nov 2026" },
        { id: "TSK-103", title: "Draft onboarding documentation for junior developers", category: "Docs", priority: "Low", dueDate: "15 Nov 2026" }
    ],
    in_progress: [
        { id: "TSK-201", title: "Optimize data table sorting latency", category: "Frontend", priority: "High", dueDate: "06 Nov 2026" },
        { id: "TSK-202", title: "Refactor user authentication state store", category: "Core", priority: "Medium", dueDate: "09 Nov 2026" }
    ],
    done: [
        { id: "TSK-301", title: "Deploy responsive layout bug fixes", category: "Release", priority: "Medium", dueDate: "03 Nov 2026" },
        { id: "TSK-302", title: "Configure CDN pinned asset cache headers", category: "DevOps", priority: "High", dueDate: "02 Nov 2026" }
    ]
};

const MockCampaignsData = [
    { id: "CMP-01", name: "Autumn Product Launch Email", channel: "Email Newsletter", audience: "18,400 recipients", conversion: "4.8%", budget: "$1,200", active: true, body: "<p>Check out our autumn product line with exclusive early-bird discounts.</p>" },
    { id: "CMP-02", name: "Enterprise Lead Retargeting", channel: "Paid Search", audience: "5,200 visits", conversion: "2.3%", budget: "$3,400", active: true, body: "<p>Re-engage high-intent visitors with custom enterprise demo scheduling.</p>" },
    { id: "CMP-03", name: "Developer Community Survey", channel: "In-App Prompt", audience: "12,100 users", conversion: "11.2%", budget: "$450", active: false, body: "<p>Help shape our next releases by taking a 3-minute developer survey.</p>" },
    { id: "CMP-04", name: "Year-End Maintenance Advisory", channel: "Email Broadcast", audience: "24,000 users", conversion: "0.0%", budget: "$200", active: true, body: "<p>Scheduled downtime notice for global infrastructure upgrades.</p>" }
];

const MockAutomationsData = [
    { id: "AUT-01", name: "Welcome Email Sequence", trigger: "User Registration", action: "Send 3-part onboarding email", active: true, lastRun: "12 mins ago" },
    { id: "AUT-02", name: "Invoice Payment Overdue Notice", trigger: "PO Grace Period > 30 Days", action: "Trigger billing notification & email", active: true, lastRun: "2 hours ago" },
    { id: "AUT-03", name: "High Value Lead Notification", trigger: "Deal Size > $10,000", action: "Ping Manager Channel on Slack", active: true, lastRun: "Yesterday" },
    { id: "AUT-04", name: "Inactive Account Archive", trigger: "No Login for 180 Days", action: "Send reminder & queue soft deactivation", active: false, lastRun: "5 days ago" }
];

const MockIntegrationsData = [
    { id: "INT-01", name: "Payment Processing Gateway", category: "Billing", icon: "credit-card", connected: true, description: "Process debit/credit cards and automated recurring subscription charges." },
    { id: "INT-02", name: "Cloud Object Storage", category: "Storage", icon: "cloud", connected: true, description: "Secure, durable bucket storage for user uploads, receipts, and exports." },
    { id: "INT-03", name: "Transactional Email Relay", category: "Communications", icon: "mail", connected: true, description: "Deliver password resets, order confirmations, and notifications with high inbox deliverability." },
    { id: "INT-04", name: "Team Chat Collaboration", category: "Productivity", icon: "message-square", connected: false, description: "Broadcast live operational alerts and system reports into team communication channels." },
    { id: "INT-05", name: "Customer CRM Sync", category: "CRM", icon: "users", connected: true, description: "Keep contact profiles and customer interaction history synchronized automatically." },
    { id: "INT-06", name: "Application Performance Monitoring", category: "Monitoring", icon: "activity", connected: false, description: "Track uptime, exception rates, and frontend Core Web Vitals in real-time." }
];

const MockReportsData = [
    { id: "RPT-01", category: "Subscription Sales", transactions: 420, grossRevenue: 42500, netProfit: 38200, date: "2026-10-31" },
    { id: "RPT-02", category: "Hardware Appliances", transactions: 64, grossRevenue: 31936, netProfit: 12400, date: "2026-10-31" },
    { id: "RPT-03", category: "Professional Services", transactions: 12, grossRevenue: 18400, netProfit: 15200, date: "2026-10-31" },
    { id: "RPT-04", category: "API Overage Usage", transactions: 185, grossRevenue: 9250, netProfit: 8600, date: "2026-10-31" },
    { id: "RPT-05", category: "Subscription Sales", transactions: 395, grossRevenue: 39900, netProfit: 35800, date: "2026-09-30" },
    { id: "RPT-06", category: "Hardware Appliances", transactions: 58, grossRevenue: 28942, netProfit: 10800, date: "2026-09-30" },
    { id: "RPT-07", category: "Professional Services", transactions: 9, grossRevenue: 14200, netProfit: 11900, date: "2026-09-30" },
    { id: "RPT-08", category: "API Overage Usage", transactions: 162, grossRevenue: 8100, netProfit: 7450, date: "2026-09-30" }
];

const MockNotificationsData = [
    { id: "NTF-01", title: "Database backup completed successfully", desc: "Automated snapshot taken at 04:00 UTC (1.2 GB stored).", time: "15m ago", unread: true, type: "success" },
    { id: "NTF-02", title: "New user registered with Administrator privileges", desc: "User 'David Kim' accepted workspace invitation.", time: "1h ago", unread: true, type: "info" },
    { id: "NTF-03", title: "Storage threshold alert (82% reached)", desc: "Production storage volume is nearing warning watermark.", time: "3h ago", unread: false, type: "warning" },
    { id: "NTF-04", title: "Monthly recurring revenue milestone passed", desc: "Total recurring revenue crossed $48,000.", time: "Yesterday", unread: false, type: "success" }
];

const MockTeamData = [
    { id: "TM-01", name: "Sarah Jenkins", email: "sarah.j@example.com", role: "Super Admin", avatar: "SJ", lastActive: "Just now", status: "Active" },
    { id: "TM-02", name: "Michael Chang", email: "m.chang@example.com", role: "Manager", avatar: "MC", lastActive: "12m ago", status: "Active" },
    { id: "TM-03", name: "Elena Rostova", email: "elena.r@example.com", role: "Editor", avatar: "ER", lastActive: "1h ago", status: "Active" },
    { id: "TM-04", name: "David Kim", email: "d.kim@example.com", role: "Developer", avatar: "DK", lastActive: "Yesterday", status: "Active" },
    { id: "TM-05", name: "Amara Diallo", email: "amara.d@example.com", role: "Analyst", avatar: "AD", lastActive: "3 days ago", status: "Active" }
];

const MockTemplatesData = [
    { id: "TPL-01", title: "Customer Onboarding Welcome", category: "Email", preview: "Warm welcome message introducing key workspace features and documentation links.", content: "<h2>Welcome to our platform!</h2><p>We are delighted to have you on board. Here are 3 quick steps to get started:</p><ol><li>Verify your business profile.</li><li>Invite your team members.</li><li>Set up your first automated task.</li></ol>" },
    { id: "TPL-02", title: "Order Shipping Confirmation", category: "Orders", preview: "Notification providing package tracking details and estimated delivery time.", content: "<h2>Your order has shipped!</h2><p>Great news! Your package is on its way. Use your tracking number to monitor progress.</p>" },
    { id: "TPL-03", title: "Password Reset Security Code", category: "Security", preview: "Time-limited authentication code and instructions to securely reset login credentials.", content: "<h2>Password Reset Request</h2><p>We received a request to reset your password. If this was you, please follow the link below:</p>" },
    { id: "TPL-04", title: "Monthly Activity Digest", category: "Reports", preview: "Executive summary highlighting monthly metrics, throughput, and active members.", content: "<h2>Your Monthly Summary</h2><p>Here is an overview of what happened across your workspace over the past 30 days.</p>" }
];
