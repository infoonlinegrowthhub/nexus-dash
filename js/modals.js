/**
 * Nexus Dash - Modal & Dialog Controller
 * Purpose: Manages accessible dialogs, focus trapping, backdrop transitions, and confirmation prompts.
 */

let activeModal = null;
let lastFocusedElement = null;

function openModal(modalId) {
    const modal = document.getElementById(modalId);
    if (!modal) return;

    lastFocusedElement = document.activeElement;
    activeModal = modal;

    modal.classList.add("modal-open");
    modal.setAttribute("aria-hidden", "false");
    document.body.style.overflow = "hidden";

    // Focus the first actionable input or close button
    const focusable = modal.querySelectorAll('button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])');
    if (focusable.length > 0) {
        setTimeout(() => focusable[0].focus(), 50);
    }
}

function closeModal(modalId) {
    const modal = modalId ? document.getElementById(modalId) : activeModal;
    if (!modal) return;

    modal.classList.remove("modal-open");
    modal.setAttribute("aria-hidden", "true");
    document.body.style.overflow = "";

    if (lastFocusedElement && typeof lastFocusedElement.focus === "function") {
        lastFocusedElement.focus();
    }
    activeModal = null;
}

function confirmAction(title, message, onConfirmCallback) {
    let confirmModal = document.getElementById("confirm-action-modal");
    if (!confirmModal) {
        confirmModal = document.createElement("div");
        confirmModal.id = "confirm-action-modal";
        confirmModal.className = "modal-overlay";
        confirmModal.setAttribute("role", "dialog");
        confirmModal.setAttribute("aria-modal", "true");
        confirmModal.setAttribute("aria-hidden", "true");

        confirmModal.innerHTML = `
            <div class="modal-dialog">
                <div class="modal-header">
                    <h3 class="modal-title" id="confirm-modal-title">Confirm Action</h3>
                    <button type="button" class="modal-close-btn" data-close-modal aria-label="Close dialog">&times;</button>
                </div>
                <div class="modal-body">
                    <p id="confirm-modal-message" class="text-muted"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-secondary" data-close-modal>Cancel</button>
                    <button type="button" class="btn-danger" id="confirm-modal-proceed-btn">Confirm</button>
                </div>
            </div>
        `;
        document.body.appendChild(confirmModal);
    }

    document.getElementById("confirm-modal-title").textContent = title;
    document.getElementById("confirm-modal-message").textContent = message;

    const proceedBtn = document.getElementById("confirm-modal-proceed-btn");
    const newProceedBtn = proceedBtn.cloneNode(true);
    proceedBtn.parentNode.replaceChild(newProceedBtn, proceedBtn);

    newProceedBtn.addEventListener("click", () => {
        closeModal("confirm-action-modal");
        if (typeof onConfirmCallback === "function") {
            onConfirmCallback();
        }
    });

    openModal("confirm-action-modal");
}

// Global modal event listeners
document.addEventListener("DOMContentLoaded", () => {
    // Buttons with data-open-modal="id"
    document.addEventListener("click", (e) => {
        const trigger = e.target.closest("[data-open-modal]");
        if (trigger) {
            e.preventDefault();
            const modalId = trigger.getAttribute("data-open-modal");
            openModal(modalId);
        }

        const closeTrigger = e.target.closest("[data-close-modal]");
        if (closeTrigger) {
            e.preventDefault();
            const modal = closeTrigger.closest(".modal-overlay");
            if (modal) closeModal(modal.id);
        }

        // Click outside modal dialog
        if (e.target.classList.contains("modal-overlay")) {
            closeModal(e.target.id);
        }
    });

    // Keyboard navigation (Escape key)
    document.addEventListener("keydown", (e) => {
        if (e.key === "Escape" && activeModal) {
            closeModal(activeModal.id);
        }
    });
});

