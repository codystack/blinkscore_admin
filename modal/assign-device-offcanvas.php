<?php
// Ensure DB connection
require_once __DIR__ . '/../config/db.php';

// Fetch admin list safely
$admins = [];
try {
    $stmt = $pdo->query("SELECT id, first_name, last_name FROM admin ORDER BY first_name ASC");
    $admins = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    $admins = [];
}
?>

<div class="offcanvas offcanvas-end w-full w-lg-1/3" data-bs-scroll="true" data-bs-backdrop="true" tabindex="-1" id="offcanvasAddNotice" aria-labelledby="offcanvasAddNoticeLabel">
    <div class="offcanvas-header border-bottom py-4 bg-surface-secondary">
        <h5 class="offcanvas-title" id="offcanvasAddNoticeLabel">Create New Notice</h5>
        <button type="button" class="btn-close text-reset text-xs" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>

    <div class="offcanvas-body vstack gap-5">
        <form id="createNoticeForm">
            <div class="row g-5">

                <!-- Admin Selector -->
                <div class="col-md-12">
                    <label class="form-label">Select Admin</label>
                    <select class="form-select" name="admin_id" required>
                        <option value="">-- Select Admin --</option>
                        <?php if (!empty($admins)): ?>
                            <?php foreach ($admins as $admin): ?>
                                <option value="<?= htmlspecialchars($admin['id']) ?>">
                                    <?= htmlspecialchars($admin['first_name'] . ' ' . $admin['last_name']) ?>
                                </option>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <option disabled>No admins available</option>
                        <?php endif; ?>
                    </select>
                </div>

                <!-- Title -->
                <div class="col-md-12">
                    <label class="form-label">Notice Title</label>
                    <input type="text" class="form-control" name="title" placeholder="Enter notice title" required>
                </div>

                <!-- Message -->
                <div class="col-md-12">
                    <label class="form-label">Message</label>
                    <textarea class="form-control" name="message" rows="4" placeholder="Write your message..." required></textarea>
                </div>

                <!-- Start Date -->
                <div class="col-md-6">
                    <label class="form-label">Start Date</label>
                    <input type="date" class="form-control" name="start_date" required>
                </div>

                <!-- End Date -->
                <div class="col-md-6">
                    <label class="form-label">End Date</label>
                    <input type="date" class="form-control" name="end_date" required>
                </div>

                <div class="col-md-12 mt-5">
                    <button type="submit" class="btn btn-primary w-full">
                        <i class="bi bi-megaphone"></i> Publish Notice
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
