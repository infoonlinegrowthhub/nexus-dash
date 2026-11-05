/**
 * Nexus Dash - Rich Text Editor Wrapper (Quill.js)
 * Purpose: Centralizes Quill.js initialization, toolbar definitions, character/word counters, and form synchronization.
 */

const EditorToolbars = {
    default: [
        ["bold", "italic", "underline", "strike"],
        [{ header: 1 }, { header: 2 }, { header: 3 }],
        [{ list: "ordered" }, { list: "bullet" }],
        ["blockquote", "code-block"],
        ["link", "clean"]
    ],
    compact: [
        ["bold", "italic"],
        ["link"],
        [{ list: "bullet" }]
    ]
};

function initEditor(selector, options = {}) {
    const container = typeof selector === "string" ? document.querySelector(selector) : selector;
    if (!container || !window.Quill) return null;

    const isCompact = options.compact === true;
    const toolbarConfig = isCompact ? EditorToolbars.compact : EditorToolbars.default;
    const placeholder = options.placeholder || "Enter details here...";

    const quill = new Quill(container, {
        theme: "snow",
        placeholder: placeholder,
        modules: {
            toolbar: toolbarConfig
        }
    });

    // Accessibility attributes
    quill.root.setAttribute("aria-label", options.ariaLabel || "Rich text editor content area");
    quill.root.setAttribute("role", "textbox");

    // Add titles to toolbar buttons for screen readers & hover
    const toolbarEl = container.previousElementSibling;
    if (toolbarEl && toolbarEl.classList.contains("ql-toolbar")) {
        toolbarEl.querySelectorAll("button, .ql-picker").forEach(btn => {
            const className = Array.from(btn.classList).find(c => c.startsWith("ql-"));
            if (className) {
                const actionName = className.replace("ql-", "");
                btn.setAttribute("title", actionName.charAt(0).toUpperCase() + actionName.slice(1));
                btn.setAttribute("aria-label", actionName);
            }
        });
    }

    // Insert Character & Word Counter bar
    let counterEl = null;
    if (options.showCounter !== false) {
        counterEl = document.createElement("div");
        counterEl.className = "editor-counter-bar";
        counterEl.innerHTML = `<span class="word-count">0 words</span> &bull; <span class="char-count">0 characters</span>`;
        container.parentNode.insertBefore(counterEl, container.nextSibling);

        const updateCounter = () => {
            const text = quill.getText().trim();
            const charCount = text.length;
            const wordCount = text.length === 0 ? 0 : text.split(/\s+/).filter(Boolean).length;

            const wordSpan = counterEl.querySelector(".word-count");
            const charSpan = counterEl.querySelector(".char-count");
            if (wordSpan) wordSpan.textContent = `${wordCount} word${wordCount === 1 ? "" : "s"}`;
            if (charSpan) charSpan.textContent = `${charCount} character${charCount === 1 ? "" : "s"}`;
        };

        quill.on("text-change", updateCounter);
        updateCounter();
    }

    // Hidden input binding for form submissions
    if (options.hiddenInputId) {
        const hiddenInput = document.getElementById(options.hiddenInputId);
        if (hiddenInput) {
            quill.on("text-change", () => {
                hiddenInput.value = quill.root.innerHTML;
            });
            // Initial sync
            hiddenInput.value = quill.root.innerHTML;
        }
    }

    // Prepopulate initial HTML safely
    if (options.initialHtml) {
        quill.clipboard.dangerouslyPasteHTML(options.initialHtml);
    }

    // Attach to form submit handler to guarantee sync
    const parentForm = container.closest("form");
    if (parentForm && options.hiddenInputId) {
        parentForm.addEventListener("submit", () => {
            const hiddenInput = document.getElementById(options.hiddenInputId);
            if (hiddenInput) {
                hiddenInput.value = quill.root.innerHTML;
            }
        });
    }

    return quill;
}
