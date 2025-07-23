<style>
    .section-box {
        background-color: white;
        box-shadow: 5px 4px 15px 8px rgba(0, 0, 0, 0.1);
        border-radius: 7px;
        margin-bottom: 1rem;
    }
    .section-header {
        background: linear-gradient(45deg, #007bff, #0056b3);
        color: white;
        padding: 5px;
        font-weight: 600;
        border-radius: 7px 7px 0 0;
        border-bottom: 1px solid #0056b3;
        font-size: 0.9rem;
    }
    .section-body {
        padding: 1rem;
    }
    .form-label {
        font-weight: 500;
        font-size: 0.85rem;
    }
    .form-control, .form-select {
        font-size: 0.85rem;
        padding: 0.3rem 0.5rem;
    }
    .btn {
        font-size: 0.85rem;
    }
</style>

<div class="container-fluid mt-3">
    <div class="d-flex justify-content-between mb-3">
        <h6 class="fw-bold text-primary mb-0">Employees &gt; List Employees &gt; New Employee</h6>
    </div>
    <!-- Horizontal Icon Navigation -->
    <div class="d-flex flex-wrap gap-2 my-3">
        <button class="btn btn-outline-primary d-flex flex-column align-items-center py-2 px-3" style="width: 80px;">
            <i class="bi bi-arrow-left fs-5"></i>
            <small class="text-truncate d-inline-block w-100 text-center" title="Cancel">Can</small>
        </button>

        <button class="btn btn-primary d-flex flex-column align-items-center py-2 px-3" style="width: 80px;">
            <i class="bi bi-person-fill fs-5"></i>
            <small class="text-truncate d-inline-block w-100 text-center" title="Employee">Emp</small>
        </button>

        <button class="btn btn-outline-primary d-flex flex-column align-items-center py-2 px-3" style="width: 80px;">
            <i class="bi bi-briefcase-fill fs-5"></i>
            <small class="text-truncate d-inline-block w-100 text-center" title="Device Access">Dev</small>
        </button>

        <button class="btn btn-outline-primary d-flex flex-column align-items-center py-2 px-3" style="width: 80px;">
            <i class="bi bi-list-ul fs-5"></i>
            <small class="text-truncate d-inline-block w-100 text-center" title="Allocations">All</small>
        </button>

        <button class="btn btn-outline-primary d-flex flex-column align-items-center py-2 px-3" style="width: 80px;">
            <i class="bi bi-clock-history fs-5"></i>
            <small class="text-truncate d-inline-block w-100 text-center" title="T&A Data">T&A</small>
        </button>

        <button class="btn btn-outline-primary d-flex flex-column align-items-center py-2 px-3" style="width: 80px;">
            <i class="bi bi-airplane-engines-fill fs-5"></i>
            <small class="text-truncate d-inline-block w-100 text-center" title="Leave">Lea</small>
        </button>

        <button class="btn btn-outline-primary d-flex flex-column align-items-center py-2 px-3" style="width: 80px;">
            <i class="bi bi-ui-checks fs-5"></i>
            <small class="text-truncate d-inline-block w-100 text-center" title="System Access">Sys</small>
        </button>

        <button class="btn btn-outline-primary d-flex flex-column align-items-center py-2 px-3" style="width: 80px;">
            <i class="bi bi-file-earmark fs-5"></i>
            <small class="text-truncate d-inline-block w-100 text-center" title="Job Costing">Job</small>
        </button>

        <button class="btn btn-outline-primary d-flex flex-column align-items-center py-2 px-3" style="width: 80px;">
            <i class="bi bi-bar-chart-line-fill fs-5"></i>
            <small class="text-truncate d-inline-block w-100 text-center" title="Stats">Sta</small>
        </button>

        <button class="btn btn-outline-primary d-flex flex-column align-items-center py-2 px-3" style="width: 80px;">
            <i class="bi bi-chat-dots-fill fs-5"></i>
            <small class="text-truncate d-inline-block w-100 text-center" title="Communications">Com</small>
        </button>

        <button class="btn btn-outline-primary d-flex flex-column align-items-center py-2 px-3" style="width: 80px;">
            <i class="bi bi-person-check-fill fs-5"></i>
            <small class="text-truncate d-inline-block w-100 text-center" title="Enrolment">Enr</small>
        </button>
    </div>

    <br>
    <div class="d-flex justify-content-between mb-3">
        <a href="#" class="btn btn-success fw-semibold"><i class="bi bi-check-circle me-1"></i>Save</a>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="section-box">
                <div class="section-header">User Type</div>
                <div class="section-body">
                    <label class="form-label">User Type</label>
                    <select class="form-select" name="user_type" multiple>
                        <option>Employee</option>
                        <option>System User</option>
                        <option>Business Contact</option>
                    </select>
                </div>
            </div>

            <!-- Contact Details -->
            <div class="section-box">
                <div class="section-header">Add New Contact Details</div>
                <div class="section-body">
                    <div class="row g-2 align-items-end">
                        <div class="col-4">
                            <label class="form-label">Type</label>
                            <select class="form-select">
                                <option>Cell</option>
                                <option>Phone</option>
                                <option>Email</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label class="form-label">Detail</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="col-2">
                            <button class="btn btn-outline-primary w-100"><i class="bi bi-plus-lg"></i></button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Clock Password / Card -->
            <div class="section-box">
                <div class="section-header">Clock Password / Card</div>
                <div class="section-body">
                    <div class="mb-3">
                        <label class="form-label">PIN</label>
                        <input type="password" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Card</label>
                        <input type="text" class="form-control">
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column -->
        <div class="col-md-6">
            <!-- Basic Employee Info -->
            <div class="section-box">
                <div class="section-header">Basic Employee Information</div>
                <div class="section-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Full Name</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Status</label>
                            <select class="form-select">
                                <option>Active</option>
                                <option>Terminated</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">PIN Code</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Export Code</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Employment Date</label>
                            <input type="date" class="form-control">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Employee Extra Fields -->
            <div class="section-box">
                <div class="section-header">Employee Extra Fields</div>
                <div class="section-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Position</label>
                            <select class="form-select"><option>Please Select</option></select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Shift</label>
                            <select class="form-select"><option>Please Select</option></select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Gender</label>
                            <select class="form-select"><option>Gender</option></select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">DOB</label>
                            <input type="date" class="form-control">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Job Code(s)</label>
                            <input type="text" class="form-control" value="10">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Group & Department -->
            <div class="section-box">
                <div class="section-header">Group And Department Details</div>
                <div class="section-body">
                    <div class="mb-3">
                        <label class="form-label">Allocated Groups</label>
                        <select class="form-select" multiple>
                            <option>Back of House</option>
                            <option>Cleaning</option>
                            <option>Delivery Drivers</option>
                            <option>Front of House</option>
                            <option>Interns</option>
                            <option>Manager</option>
                            <option>Shift Manager</option>
                            <option>Marketing</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Company Department</label>
                        <select class="form-select">
                            <option>-NONE-</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Link to Parent Employee</label>
                        <select class="form-select">
                            <option>-NONE-</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
