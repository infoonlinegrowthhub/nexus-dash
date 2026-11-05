/**
 * Nexus Dash - Toast Notification Controller
 * Purpose: Provides a lightweight, accessible floating toast notification system.
 */

function showToast(message, type = "info", duration = 3500) {
    let container = document.getElementById("toast-container");
    if (!container) {
        container = document.createElement("div");
        container.id = "toast-container";
        container.className = "toast-container";
        container.setAttribute("aria-live", "polite");
        document.body.appendChild(container);
    }

    const toast = document.createElement("div");
    toast.className = `toast-item toast-${type}`;
    toast.setAttribute("role", "status");

    let iconName = "info";
    if (type === "success") iconName = "check-circle";
    if (type === "warning") iconName = "alert-triangle";
    if (type === "danger") iconName = "alert-circle";

    toast.innerHTML = `
        <div class="toast-content">
            <i data-lucide="${iconName}" class="toast-icon"></i>
            <span class="toast-message">${message}</span>
        </div>
        <button type="button" class="toast-close" aria-label="Close notification">&times;</button>
    `;

    container.appendChild(toast);

    if (window.lucide && typeof window.lucide.createIcons === "function") {
        window.lucide.createIcons();
    }

    const closeBtn = toast.querySelector(".toast-close");
    const removeToast = () => {
        toast.classList.add("toast-fade-out");
        setTimeout(() => {
            if (toast.parentElement) toast.remove();
        }, 200);
    };

    closeBtn.addEventListener("click", removeToast);
    if (duration > 0) {
        setTimeout(removeToast, duration);
    }
}

