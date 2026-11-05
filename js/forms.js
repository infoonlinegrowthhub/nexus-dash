/**
 * Nexus Dash - Form Validation & Management
 * Purpose: Provides client-side validation, error messaging, and form field state handling.
 */

function setupFormValidation(formSelector, onSuccessCallback) {
    const form = typeof formSelector === "string" ? document.querySelector(formSelector) : formSelector;
    if (!form) return;

    form.setAttribute("novalidate", "true");

    form.addEventListener("submit", (e) => {
        e.preventDefault();
        let isValid = true;

        const inputs = form.querySelectorAll("input, select, textarea");
        inputs.forEach(input => {
            if (!validateField(input)) {
                isValid = false;
            }
        });

        if (isValid) {
            if (typeof onSuccessCallback === "function") {
                onSuccessCallback(form);
            } else if (typeof showToast === "function") {
                showToast("Form submitted successfully", "success");
                form.reset();
            }
        }
    });

    // Real-time clearance of errors on user input
    form.addEventListener("input", (e) => {
        const input = e.target;
        clearFieldError(input);
    });
}

function validateField(input) {
    const value = input.value.trim();
    const isRequired = input.hasAttribute("required");
    const type = input.getAttribute("type");
    const minLength = input.getAttribute("minlength");

    clearFieldError(input);

    if (isRequired && value === "") {
        setFieldError(input, "This field is required.");
        return false;
    }

    if (type === "email" && value !== "") {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(value)) {
            setFieldError(input, "Please enter a valid email address.");
            return false;
        }
    }

    if (minLength && value.length < parseInt(minLength, 10)) {
        setFieldError(input, `Must be at least ${minLength} characters.`);
        return false;
    }

    return true;
}

function setFieldError(input, message) {
    input.classList.add("input-error");
    input.setAttribute("aria-invalid", "true");

    let errorEl = input.parentElement.querySelector(".field-error-message");
    if (!errorEl) {
        errorEl = document.createElement("span");
        errorEl.className = "field-error-message";
        errorEl.setAttribute("role", "alert");
        input.parentElement.appendChild(errorEl);
    }
    errorEl.textContent = message;
}

function clearFieldError(input) {
    input.classList.remove("input-error");
    input.removeAttribute("aria-invalid");

    const errorEl = input.parentElement.querySelector(".field-error-message");
    if (errorEl) {
        errorEl.remove();
    }
}
