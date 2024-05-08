<div class="position-fixed p-3" id="toast-success">
    <div class="toast align-items-center" id="toast-success-content" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body d-flex align-items-center gap-2">
                <i class='bx bxs-check-circle text-success fs-2'></i>
                <span class="text-size ms-2 my-0 py-0 fw-medium">{{ session()->get('success') }}</span>
            </div>
            <button type="button" class="btn-close me-3 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>
