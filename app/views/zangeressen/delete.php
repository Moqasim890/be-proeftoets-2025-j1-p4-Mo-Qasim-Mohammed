<?php require_once APPROOT . '/views/includes/header.php'; ?>

<div class="container mt-3">

    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <h3 class="text-danger text-center">
                <div class="alert alert-success" role="alert">
                    <?= $data['message']; ?>
                </div>
            </h3>

        </div>
        <div class="col-1"></div>
    </div>
</div>

<?php require_once APPROOT . '/views/includes/footer.php'; ?>