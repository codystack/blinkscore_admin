<?php
include "./components/header.php";

require_once('./config/db.php');

// Fetch all transactions
$stmt = $pdo->query("
    SELECT 
        t.*, 
        u.first_name, 
        u.last_name, 
        u.email, 
        u.phone 
    FROM transactions t
    LEFT JOIN users u ON t.user_id = u.id
    ORDER BY t.id DESC
");
$transactions = $stmt->fetchAll(PDO::FETCH_ASSOC);

function getStatusBadge(string $status = ''): array {
    $s = strtolower(trim($status));
    switch ($s) {
        case 'Disbursed':
            return ['bg-soft-success text-success', 'Disbursed'];
        case 'Approved':
            return ['bg-soft-warning text-warning', 'Approved'];
        case 'Closed':
            return ['bg-soft-danger text-danger', 'Closed'];
        default:
            return ['bg-soft-secondary text-secondary', ucfirst($status ?: 'Unknown')];
    }
}
?>
    <div class="d-flex flex-column flex-lg-row h-lg-full bg-surface-secondary">
        <?php include "./components/side-nav.php"; ?>

        <div class="flex-lg-1 h-screen overflow-y-lg-auto">
            <?php include "./components/top-nav.php"; ?>

            <header>
                <div class="container-fluid">
                    <div class="pt-6">
                        <div class="row align-items-center">
                            <div class="col-sm col-12">
                                <h1 class="h2 ls-tight">Transactions</h1>
                            </div>
                            <div class="col-sm-auto col-12 mt-4 mt-sm-0">
                                <div class="hstack gap-2 justify-content-sm-end">
                                    <a href="#offcanvasAddNewOffer" class="btn btn-sm btn-primary" data-bs-toggle="offcanvas">
                                        <span class="pe-2"><i class="bi bi-plus-square-dotted"></i> </span>
                                        <span>Add New Offer</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <main class="py-6 bg-surface-secondary">
                <div class="container-fluid">
                    <div class="vstack gap-4">
                        <div class="card">
                            <div class="table-responsive px-10 py-10">
                                <?php if (count($transactions) > 0): ?>
                                <table class="table table-hover table-nowrap" id="transactions">
                                    <thead class="table-light">
                                        <tr>
                                            <th scope="col">Reference</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Amount</th>
                                            <th scope="col">Fee</th>
                                            <th scope="col">Percentage</th>
                                            <th scope="col">Status</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($transactions as $transaction): 
                                            [$badge, $statusText] = getStatusBadge($transaction['status'] ?? '');
                                        ?>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="icon icon-shape rounded-circle text-sm icon-sm bg-tertiary bg-opacity-20 text-tertiary">
                                                        <i class="bi bi-arrow-down-up"></i>
                                                    </div>
                                                    <div class="ms-3">
                                                        <span class="d-inline-block h6 font-semibold mb-1" href="#"><?= htmlspecialchars($transaction['reference_number'] ?? '—') ?></td></span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><?= htmlspecialchars(($transaction['first_name'] ?? '') . ' ' . ($transaction['last_name'] ?? '')) ?></td>
                                            <td>₦<?= number_format($transaction['amount'], 2) ?></td>
                                            <td>₦<?= number_format($transaction['fee'], 2) ?></td>
                                            <td><?= htmlspecialchars($transaction['percentage'] ?? '—') ?>%</td>
                                            <td>
                                                <span class="badge <?= $badge ?> text-uppercase rounded-pill"><?= $statusText ?></span>
                                            </td>
                                            <td class="text-end">
                                                <a href="#"
                                                    class="btn btn-sm btn-square btn-primary edit-admin"
                                                    data-id="<?= $admin['id'] ?>"
                                                    data-first="<?= htmlspecialchars($admin['first_name']) ?>"
                                                    data-last="<?= htmlspecialchars($admin['last_name']) ?>"
                                                    data-email="<?= htmlspecialchars($admin['email']) ?>"
                                                    data-phone="<?= htmlspecialchars($admin['phone']) ?>"
                                                    data-gender="<?= htmlspecialchars($admin['gender']) ?>"
                                                    data-designation="<?= htmlspecialchars($admin['designation']) ?>"
                                                    data-status="<?= htmlspecialchars($admin['status']) ?>"
                                                    data-bs-toggle="offcanvas"
                                                    data-bs-target="#offcanvasEditStaff">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                                <button 
                                                    type="button" 
                                                    class="btn btn-sm btn-square btn-danger delete-admin" 
                                                    data-id="<?= $admin['id'] ?>" 
                                                    data-name="<?= htmlspecialchars($admin['first_name'] . ' ' . $admin['last_name']) ?>" 
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#confirmActionModal">
                                                    <i class="bi bi-trash"></i>
                                                </button>

                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                                <?php else: ?>
                                    <div style="position: relative; height: 250px;">
                                        <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);" class="text-center">
                                            <img src="./assets/img/no-data.png" width="150" alt="No Devices">
                                            <p class="mt-3 lead">No Transaction offers yet</p>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <?php 
    include "./modal/new-offer-offcanvas.php";
    include "./modal/modal.php";
    ?>
    <script src="./assets/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.3.4/js/dataTables.js"></script>

    <script>
        $(document).ready(function() {
            $('#transactions').DataTable();
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const notyf = new Notyf({
                duration: 3000,
                position: { x: 'right', y: 'top' },
                dismissible: true
            });

            const createOfferForm = document.getElementById('createOfferForm');
            if (!createOfferForm) return;

            createOfferForm.addEventListener('submit', async function(e) {
                e.preventDefault();

                const submitBtn = this.querySelector('button[type="submit"]');
                submitBtn.disabled = true;
                submitBtn.innerHTML = `<span class="spinner-border spinner-border-sm me-2"></span>Processing...`;

                try {
                    const formData = new FormData(this);
                    const response = await fetch('./auth/create_offer_auth.php', {
                        method: 'POST',
                        body: new URLSearchParams([...formData])
                    });

                    const data = await response.json();

                    if (data.success) {
                        notyf.success(data.message);
                        setTimeout(() => window.location.reload(), 1200);
                    } else {
                        notyf.error(data.message || 'Failed to create offer.');
                    }
                } catch (error) {
                    console.error(error);
                    notyf.error('Network or server error.');
                } finally {
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = `
                        <span class="pe-2"><i class="bi bi-plus-square-dotted"></i></span>
                        Create Offer
                    `;
                }
            });
        });
    </script>


</body>

</html>