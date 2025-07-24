
<div class="container">
    <div class="mb-3">
        <h5 class="fw-bold text-primary mb-0">Employees &gt; List Employees</h5>
        <small class="text-muted">Manage Employees</small>
    </div>

    <!-- Action Buttons -->
    <div class="card shadow-sm border-0 mb-3">
        <div class="card-body p-3">
            <div class="d-flex flex-wrap gap-2">
                <a href="#" onclick="loadContent('/newEmployee')" class="btn btn-sm btn-primary fw-semibold">
                    <i class="bi bi-plus-circle me-1"></i><small>New</small>
                </a>
                <button class="btn btn-sm btn-warning fw-semibold">
                    <i class="bi bi-pencil-square me-1"></i><small>Edit</small>
                </button>
                <button class="btn btn-sm btn-danger fw-semibold">
                    <i class="bi bi-x-circle me-1"></i><small>Terminate</small>
                </button>
                <button class="btn btn-sm btn-info text-white fw-semibold">
                    <i class="bi bi-people-fill me-1"></i><small>Allocate Groups</small>
                </button>
                <button class="btn btn-sm btn-success fw-semibold">
                    <i class="bi bi-grid-3x3-gap-fill me-1"></i><small>Grid Fields</small>
                </button>
                <button class="btn btn-sm btn-outline-info fw-semibold">
                    <i class="bi bi-link me-1"></i><small>Parent Linking</small>
                </button>
            </div>

        </div>
    </div>

    <!-- Filter Section -->
    <div class="card shadow-sm border-0 mb-2">
        <div class="card-body bg-light-subtle rounded-2">
            <div class="row g-3 align-items-end">
                <div class="col-md-2">
                    <label class="form-label small fw-semibold">Type</label>
                    <select class="form-select form-select-sm">
                        <option>Employee</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="form-label small fw-semibold">Status</label>
                    <select class="form-select form-select-sm">
                        <option>Active</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label small fw-semibold">Employee Filter</label>
                    <select class="form-select form-select-sm">
                        <option>-- No Filter --</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="form-label small fw-semibold">Group</label>
                    <select class="form-select form-select-sm">
                        <option>All Groups</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="form-label small fw-semibold">Search</label>
                    <input type="text" class="form-control form-control-sm" placeholder="Search employee">
                </div>
                <div class="col-md-1 d-grid">
                    <button class="btn btn-outline-secondary btn-sm fw-semibold">Reset</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Employee Table -->
    <div class="card shadow-sm border-0">
        <div class="card-header bg-primary-subtle border-bottom-0 py-2 px-3">
            <h6 class="mb-0 fw-bold text-primary">Employee Table</h6>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-sm table-hover table-bordered align-middle mb-0 text-nowrap">
                    <thead class="table-light small text-left">
                    <tr>
                        <th>Pin Code<i class="bi bi-arrow-down-up text-secondary ms-1"></i></th>
                        <th>Full Name<i class="bi bi-arrow-down-up text-secondary ms-1"></i></th>
                        <th>Export Code<i class="bi bi-arrow-down-up text-secondary ms-1"></i></th>
                        <th>Created<i class="bi bi-arrow-down-up text-secondary ms-1"></i></th>
                        <th>Group</th>
                        <th>Department</th>
                        <th>Cell</th>
                        <th>Employee Type</th>
                        <th>Extra Field</th>
                    </tr>
                    </thead>
                    <tbody class="small text-center">
                    <tr>
                        <td>505</td>
                        <td>John Doe</td>
                        <td>ERS505</td>
                        <td>2025-03-07 13:27:13</td>
                        <td>Interns</td>
                        <td>Ops</td>
                        <td>-</td>
                        <td>Employee</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>510</td>
                        <td>Jane Doe</td>
                        <td>ERS509</td>
                        <td>2025-03-07 13:27:13</td>
                        <td>Interns</td>
                        <td>Ops</td>
                        <td>+27123456789</td>
                        <td>Employee/System User</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>780</td>
                        <td>Dam Doe</td>
                        <td>ERS899</td>
                        <td>2025-03-07 13:27:13</td>
                        <td>Developer</td>
                        <td>Ops</td>
                        <td>+271235556789</td>
                        <td>System User</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>435</td>
                        <td>Peter Doe</td>
                        <td>ERS509</td>
                        <td>2025-03-07 13:27:13</td>
                        <td>Sales</td>
                        <td>Ops</td>
                        <td>+27123456789</td>
                        <td>Employee/System User</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>908</td>
                        <td>Joe Doe</td>
                        <td>ERS509</td>
                        <td>2025-03-07 13:27:13</td>
                        <td>Interns</td>
                        <td>Ops</td>
                        <td>+27123456789</td>
                        <td>Employee/System User</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>789</td>
                        <td>Johan Doe</td>
                        <td>ERS509</td>
                        <td>2025-03-07 13:27:13</td>
                        <td>Interns</td>
                        <td>Ops</td>
                        <td>+27123456789</td>
                        <td>Employee/System User</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>456</td>
                        <td>Leon Doe</td>
                        <td>ERS509</td>
                        <td>2025-03-07 13:27:13</td>
                        <td>Interns</td>
                        <td>Ops</td>
                        <td>+27123456789</td>
                        <td>Employee/System User</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>123</td>
                        <td>Keagan Doe</td>
                        <td>ERS509</td>
                        <td>2025-03-07 13:27:13</td>
                        <td>Interns</td>
                        <td>Ops</td>
                        <td>+27123456789</td>
                        <td>Employee/System User</td>
                        <td>-</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-between align-items-center mt-3">
        <div class="d-flex align-items-center gap-2">
            <label class="small mb-0">Rows:</label>
            <select class="form-select form-select-sm" style="width: 80px;">
                <option>30</option>
                <option>50</option>
                <option>100</option>
            </select>
            <span class="ms-2 small text-muted">Page 1 of 3</span>
        </div>
        <div class="btn-group">
            <button class="btn btn-outline-secondary btn-sm" title="First">&laquo;</button>
            <button class="btn btn-outline-secondary btn-sm" title="Previous">&lsaquo;</button>
            <button class="btn btn-outline-secondary btn-sm" title="Next">&rsaquo;</button>
            <button class="btn btn-outline-secondary btn-sm" title="Last">&raquo;</button>
        </div>
    </div>
</div>
