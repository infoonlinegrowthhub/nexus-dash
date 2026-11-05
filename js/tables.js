/**
 * Nexus Dash - Table Engine
 * Purpose: Provides client-side searching, column sorting, pagination, multi-select, and CSV export.
 */

class DataTableController {
    constructor(options) {
        this.tableId = options.tableId;
        this.tbodyId = options.tbodyId;
        this.paginationId = options.paginationId;
        this.searchInputId = options.searchInputId;
        this.statusFilterId = options.statusFilterId;
        this.pageSize = options.pageSize || 5;
        this.currentPage = 1;
        this.sortColumn = options.defaultSortColumn || null;
        this.sortDirection = "asc";
        this.rawData = [...(options.data || [])];
        this.filteredData = [...this.rawData];
        this.rowRenderer = options.rowRenderer;

        this.init();
    }

    init() {
        this.bindEvents();
        this.applyFilterAndSort();
    }

    bindEvents() {
        // Search Input
        if (this.searchInputId) {
            const searchInput = document.getElementById(this.searchInputId);
            if (searchInput) {
                searchInput.addEventListener("input", (e) => {
                    this.currentPage = 1;
                    this.applyFilterAndSort(e.target.value);
                });
            }
        }

        // Status Filter Dropdown
        if (this.statusFilterId) {
            const filterEl = document.getElementById(this.statusFilterId);
            if (filterEl) {
                filterEl.addEventListener("change", () => {
                    this.currentPage = 1;
                    this.applyFilterAndSort();
                });
            }
        }

        // Column Header Sorting
        const table = document.getElementById(this.tableId);
        if (table) {
            const headers = table.querySelectorAll("th[data-sort]");
            headers.forEach(header => {
                header.style.cursor = "pointer";
                header.addEventListener("click", () => {
                    const col = header.getAttribute("data-sort");
                    if (this.sortColumn === col) {
                        this.sortDirection = this.sortDirection === "asc" ? "desc" : "asc";
                    } else {
                        this.sortColumn = col;
                        this.sortDirection = "asc";
                    }
                    this.updateSortHeaders();
                    this.applyFilterAndSort();
                });
            });

            // Select All Checkbox
            const selectAll = table.querySelector("#select-all-checkbox");
            if (selectAll) {
                selectAll.addEventListener("change", (e) => {
                    const checkboxes = table.querySelectorAll(".row-select-checkbox");
                    checkboxes.forEach(cb => cb.checked = e.target.checked);
                });
            }
        }
    }

    updateSortHeaders() {
        const table = document.getElementById(this.tableId);
        if (!table) return;
        const headers = table.querySelectorAll("th[data-sort]");
        headers.forEach(header => {
            const col = header.getAttribute("data-sort");
            let indicator = header.querySelector(".sort-indicator");
            if (!indicator) {
                indicator = document.createElement("span");
                indicator.className = "sort-indicator";
                header.appendChild(indicator);
            }
            if (this.sortColumn === col) {
                indicator.textContent = this.sortDirection === "asc" ? " ↑" : " ↓";
            } else {
                indicator.textContent = "";
            }
        });
    }

    applyFilterAndSort(searchQuery = null) {
        let query = searchQuery;
        if (query === null && this.searchInputId) {
            const input = document.getElementById(this.searchInputId);
            if (input) query = input.value;
        }
        query = (query || "").toLowerCase().trim();

        let statusValue = "";
        if (this.statusFilterId) {
            const filterEl = document.getElementById(this.statusFilterId);
            if (filterEl) statusValue = filterEl.value;
        }

        // Filter
        this.filteredData = this.rawData.filter(item => {
            const matchesStatus = !statusValue || statusValue === "all" || (item.status && item.status.toLowerCase() === statusValue.toLowerCase());
            if (!matchesStatus) return false;

            if (!query) return true;
            return Object.values(item).some(val => 
                val !== null && val !== undefined && String(val).toLowerCase().includes(query)
            );
        });

        // Sort
        if (this.sortColumn) {
            this.filteredData.sort((a, b) => {
                let valA = a[this.sortColumn];
                let valB = b[this.sortColumn];

                if (typeof valA === "string") valA = valA.toLowerCase();
                if (typeof valB === "string") valB = valB.toLowerCase();

                if (valA < valB) return this.sortDirection === "asc" ? -1 : 1;
                if (valA > valB) return this.sortDirection === "asc" ? 1 : -1;
                return 0;
            });
        }

        this.renderTable();
        this.renderPagination();
    }

    renderTable() {
        const tbody = document.getElementById(this.tbodyId);
        if (!tbody) return;

        const startIndex = (this.currentPage - 1) * this.pageSize;
        const pageItems = this.filteredData.slice(startIndex, startIndex + this.pageSize);

        if (pageItems.length === 0) {
            tbody.innerHTML = `
                <tr>
                    <td colspan="100" style="text-align: center; padding: 32px 16px; color: var(--color-text-muted);">
                        <p style="font-size: 14px; font-weight: 500;">No matching records found</p>
                    </td>
                </tr>
            `;
            return;
        }

        let rowsHtml = "";
        pageItems.forEach((item, index) => {
            rowsHtml += this.rowRenderer(item, startIndex + index);
        });

        tbody.innerHTML = rowsHtml;

        if (window.lucide && typeof window.lucide.createIcons === "function") {
            window.lucide.createIcons();
        }
    }

    renderPagination() {
        if (!this.paginationId) return;
        const container = document.getElementById(this.paginationId);
        if (!container) return;

        const totalItems = this.filteredData.length;
        const totalPages = Math.ceil(totalItems / this.pageSize) || 1;

        if (this.currentPage > totalPages) {
            this.currentPage = totalPages;
        }

        const startItem = totalItems === 0 ? 0 : (this.currentPage - 1) * this.pageSize + 1;
        const endItem = Math.min(this.currentPage * this.pageSize, totalItems);

        let paginationHtml = `
            <div class="pagination-info">
                Showing <strong>${startItem}</strong> to <strong>${endItem}</strong> of <strong>${totalItems}</strong> entries
            </div>
            <div class="pagination-controls">
                <button type="button" class="pagination-btn" id="${this.tableId}-prev-page" ${this.currentPage === 1 ? "disabled" : ""} aria-label="Previous page">
                    Previous
                </button>
        `;

        for (let p = 1; p <= totalPages; p++) {
            const activeClass = p === this.currentPage ? " active" : "";
            paginationHtml += `
                <button type="button" class="pagination-btn page-num${activeClass}" data-page="${p}">
                    ${p}
                </button>
            `;
        }

        paginationHtml += `
                <button type="button" class="pagination-btn" id="${this.tableId}-next-page" ${this.currentPage === totalPages ? "disabled" : ""} aria-label="Next page">
                    Next
                </button>
            </div>
        `;

        container.innerHTML = paginationHtml;

        // Pagination button click listeners
        const prevBtn = document.getElementById(`${this.tableId}-prev-page`);
        if (prevBtn && this.currentPage > 1) {
            prevBtn.addEventListener("click", () => {
                this.currentPage--;
                this.renderTable();
                this.renderPagination();
            });
        }

        const nextBtn = document.getElementById(`${this.tableId}-next-page`);
        if (nextBtn && this.currentPage < totalPages) {
            nextBtn.addEventListener("click", () => {
                this.currentPage++;
                this.renderTable();
                this.renderPagination();
            });
        }

        const pageBtns = container.querySelectorAll(".page-num");
        pageBtns.forEach(btn => {
            btn.addEventListener("click", () => {
                this.currentPage = parseInt(btn.getAttribute("data-page"), 10);
                this.renderTable();
                this.renderPagination();
            });
        });
    }

    exportCSV(filename = "export.csv") {
        if (!this.filteredData || this.filteredData.length === 0) {
            if (typeof showToast === "function") showToast("No records available to export", "warning");
            return;
        }

        const keys = Object.keys(this.filteredData[0]);
        let csvContent = keys.join(",") + "\n";

        this.filteredData.forEach(row => {
            const rowValues = keys.map(k => {
                let cell = row[k] === null || row[k] === undefined ? "" : String(row[k]);
                cell = cell.replace(/"/g, '""');
                return `"${cell}"`;
            });
            csvContent += rowValues.join(",") + "\n";
        });

        const blob = new Blob([csvContent], { type: "text/csv;charset=utf-8;" });
        const link = document.createElement("a");
        const url = URL.createObjectURL(blob);
        link.setAttribute("href", url);
        link.setAttribute("download", filename);
        link.style.visibility = "hidden";
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);

        if (typeof showToast === "function") {
            showToast(`Exported ${this.filteredData.length} records to ${filename}`, "success");
        }
    }
}

