<h4 class="fw-bold mb-3" style="color:#0480fc">Employee Timesheet</h4>
<div>
    <button class="btn btn-primary fw-bold">Selections</button>
    <button class="btn btn-primary fw-bold">Report</button>
    <button class="btn btn-primary fw-bold">Auto Report</button>
</div>
<hr>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-12">
            <div class="card p-4">
                <div>
                    <h5 class="mb-3" style="color:#0480fc">Select Employees</h5>
                    <div class="input-group input-group-sm mb-3">
                        <input type="text" class="form-control" placeholder="Search employees..." aria-label="Search employees">
                        <button class="btn btn-outline-secondary" type="button">Search</button>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-sm align-middle">
                            <thead class="table-light">
                            <tr>
                                <th style="width:35px;"><input type="checkbox" id="selectAllEmployees"></th>
                                <th>Employee Number <i class="bi bi-sort-numeric-down"></i></th>
                                <th>Name <i class="bi bi-sort-alpha-down"></i></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="employee-row">
                                <td><input type="checkbox" class="employee-checkbox"></td>
                                <td>519</td>
                                <td>Donovan van Rooyen</td>
                            </tr>
                            <tr class="employee-row">
                                <td><input type="checkbox"></td>
                                <td>323</td>
                                <td>Keagan Potgieter</td>
                            </tr>
                            <tr class="employee-row">
                                <td><input type="checkbox"></td>
                                <td>678</td>
                                <td>John Doe</td>
                            </tr>
                            <tr class="employee-row">
                                <td><input type="checkbox"></td>
                                <td>567</td>
                                <td>Jane Doe</td>
                            </tr>
                            <tr class="employee-row">
                                <td><input type="checkbox"></td>
                                <td>123</td>
                                <td>Peter Potgieter</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <nav aria-label="Employee Pagination">
                        <ul class="pagination pagination-sm justify-content-end mb-0">
                            <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </nav>
                </div>

                <div class="mb-4">
                    <h5 class="mb-3" style="color:#0480fc">Report Parameters</h5>
                    <div class="row g-2">
                        <div class="col-md-4"> <label for="reportFormat" class="form-label small mb-0">Format</label>
                            <select class="form-select form-select-sm" id="reportFormat">
                                <option>HTML</option>
                                <option>CSV</option>
                                <option>XLS</option>
                                <option>PDF</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="reportType" class="form-label small mb-1">Report Type</label>
                            <select class="form-select form-select-sm" id="reportType">
                                <option>Daily</option>
                                <option>Weekly</option>
                                <option>Monthly</option>
                                <option>Custom Range</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="subtotals" class="form-label small mb-1">Subtotals</label>
                            <select class="form-select form-select-sm" id="subtotals">
                                <option>Yes</option>
                                <option>No</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="details" class="form-label small mb-1">Details</label>
                            <select class="form-select form-select-sm" id="details">
                                <option>Full</option>
                                <option>Summary</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="dateFrom" class="form-label small mb-1">From</label>
                            <input type="date" class="form-control form-control-sm" id="dateFrom" placeholder="YYYY/MM/DD">
                        </div>
                        <div class="col-md-4">
                            <label for="dateTo" class="form-label small mb-1">To</label>
                            <input type="date" class="form-control form-control-sm" id="dateTo" placeholder="YYYY/MM/DD">
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="signOff">
                            <label class="form-check-label fw-semibold" for="signOff">Sign Off</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-12 mb-4 mb-md-0">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title mb-3 text-primary fw-bold" style="letter-spacing:0.5px">ADDITIONAL OPTIONS</h5>
                    <div class="mb-3">
                        <label class="form-label fw-semibold small">Fill-up Rule</label>
                        <select class="form-select form-select-sm">
                            <option>Daily Operations</option>
                            <option>Alternate Rule</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold small">Ignore Days</label>
                        <select class="form-select form-select-sm" multiple style="height:80px;">
                            <option>Mon</option>
                            <option>Tue</option>
                            <option>Wed</option>
                            <option>Thu</option>
                            <option>Fri</option>
                            <option>Sat</option>
                            <option>Sun</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold small">Time Types</label>
                        <select class="form-select form-select-sm" multiple style="height:80px;">
                            <option>Hours Worked</option>
                            <option>Leave Overtime</option>
                            <option>Leave Unpaid</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold small">Report Fields</label>
                        <select class="form-select form-select-sm" multiple style="height:80px;">
                            <option>Shift Starts</option>
                            <option>T&A In</option>
                            <option>Act In</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold small">Extra Fields</label>
                        <select class="form-select form-select-sm" multiple style="height:80px;">
                            <option>Gender</option>
                            <option>Badge number</option>
                            <option>Job Code</option>
                        </select>
                    </div>
                    <button class="btn btn-primary w-100 fw-bold">Generate Report</button>
                </div>
            </div>
        </div>
    </div>
</div>