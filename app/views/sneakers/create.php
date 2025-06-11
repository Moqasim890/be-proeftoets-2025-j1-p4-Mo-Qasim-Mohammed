<?php require_once APPROOT . '/views/includes/header.php'; ?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">

            <h4 class="text-warning mb-4">Nieuwe sneaker toevoegen</h4>

            <!-- Success- of foutmelding -->
            <?php if (isset($data['message'])) : ?>
                <div class="alert alert-<?= $data['message_type'] ?? 'info'; ?> alert-dismissible fade show" role="alert">
                    <?= $data['message']; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <form action="<?= URLROOT; ?>/sneakers/create" method="post">
                <div class="mb-3">
                    <label for="merk" class="form-label">Merk</label>
                    <input type="text" name="merk" id="merk" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="model" class="form-label">Model</label>
                    <input type="text" name="model" id="model" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="type" class="form-label">Type</label>
                    <select name="type" id="type" class="form-select" required>
                        <option value="">Kies een type</option>
                        <option value="Casual">Casual</option>
                        <option value="Basketbal">Basketbal</option>
                        <option value="Hardloop">Hardloop</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="prijs" class="form-label">Prijs (€)</label>
                    <input type="number" max="9999.99" name="prijs" id="prijs" class="form-control" step="0.01" required>
                </div>

                <button type="submit" class="btn btn-primary w-100">Verstuur</button>

                <a href="<?= URLROOT; ?>/sneakers/index" >
                    <i class="bi bi-arrow-left"></i>
                </a>
            </form>
        </div>
    </div>
</div>

<?php require_once APPROOT . '/views/includes/footer.php'; ?>
