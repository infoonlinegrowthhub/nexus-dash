/**
 * Nexus Dash - Mock Data
 * Purpose: Centralizes placeholder metric numbers, chart series, action items, and tabular data.
 */

const KpiMetricsData = [
    {
        id: "kpi-total-users",
        label: "Total Users",
        value: "24,582",
        trend: "+12.4%",
        trendUp: true,
        icon: "users",
        caption: "vs previous 30 days"
    },
    {
        id: "kpi-active-sessions",
        label: "Active Sessions",
        value: "1,842",
        trend: "+5.8%",
        trendUp: true,
        icon: "activity",
        caption: "Current live users"
    },
    {
        id: "kpi-revenue",
        label: "Revenue",
        value: "$48,250",
        trend: "+18.2%",
        trendUp: true,
        icon: "credit-card",
        caption: "Monthly recurring"
    },
    {
        id: "kpi-new-orders",
        label: "New Orders",
        value: "624",
        trend: "-2.1%",
        trendUp: false,
        icon: "shopping-bag",
        caption: "Processed this week"
    },
    {
        id: "kpi-open-tasks",
        label: "Open Tasks",
        value: "38",
        trend: "+4",
        trendUp: true,
        icon: "check-square",
        caption: "12 high priority"
    },
    {
        id: "kpi-pending-items",
        label: "Pending Items",
        value: "17",
        trend: "-8%",
        trendUp: false,
        icon: "clock",
        caption: "Requires manual review"
    }
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
    }
};

const QuickActionsData = [
    {
        id: "action-add-user",
        title: "Add User",
        description: "Create a new user account and assign roles",
        icon: "user-plus"
    },
    {
        id: "action-create-product",
        title: "Create Product",
        description: "Add an item to the catalog and inventory",
        icon: "package-plus"
    },
    {
        id: "action-new-post",
        title: "New Post",
        description: "Publish a fresh article, notice, or update",
        icon: "file-plus"
    },
    {
        id: "action-export-report",
        title: "Export Report",
        description: "Download analytical metrics as PDF or CSV",
        icon: "download"
    },
    {
        id: "action-send-notification",
        title: "Send Notification",
        description: "Broadcast instant alert to registered accounts",
        icon: "bell"
    },
    {
        id: "action-invite-team",
        title: "Invite Team",
        description: "Send workspace invitations to collaborators",
        icon: "user-check"
    }
];

const RecentRecordsData = [
    {
        id: "REF-1001",
        title: "Enterprise Application Update",
        category: "Software Development",
        account: "Alpha Corporation",
        budget: "$12,400",
        status: "Completed",
        statusType: "success"
    },
    {
        id: "REF-1002",
        title: "Cloud Infrastructure Setup",
        category: "DevOps & Cloud",
        account: "Beacon Logistics",
        budget: "$8,650",
        status: "In progress",
        statusType: "info"
    },
    {
        id: "REF-1003",
        title: "Security & Penetration Audit",
        category: "Cybersecurity",
        account: "Crest Financial",
        budget: "$15,200",
        status: "Completed",
        statusType: "success"
    },
    {
        id: "REF-1004",
        title: "Data Pipeline Integration",
        category: "Data Engineering",
        account: "Delta Retail",
        budget: "$4,800",
        status: "Pending",
        statusType: "warning"
    },
    {
        id: "REF-1005",
        title: "Real-time Dashboard Build",
        category: "Web Application",
        account: "Echo Technologies",
        budget: "$9,300",
        status: "In progress",
        statusType: "info"
    }
];
