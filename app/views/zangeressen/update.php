<?php require_once APPROOT . '/views/includes/header.php'; ?>

<div class="container mt-3">

    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <h3 class="text-success text-begin"><?= $data['title']; ?></h3>
        </div>
        <div class="col-3"></div>
    </div>

    <div class="row mt-3">
        <div class="col-3"></div>
        <div class="col-6">

            <form action="<?= URLROOT; ?>/zangeressen/update" method="post">
                <div class="mb-3">
                    <label for="naam" class="form-label">Naam zangeres</label>
                    <input type="text" name="naam" id="naam" class="form-control" value="<?= $data['zangeressen']->Naam; ?>">
                </div>
                <div class="mb-3">
                    <label for="nettowaarde" class="form-label">Nettowaarde</label>
                    <input type="number" name="nettowaarde" id="nettowaarde" class="form-control" value="<?= $data['zangeressen']->Nettowaarde; ?>">
                </div>
                <div class="mb-3">
                    <label for="Land" class="form-label">Land</label>
                    <input type="text" name="land" id="land" class="form-control" value="<?= $data['zangeressen']->Land; ?>">
                </div>
                <div class="mb-3">
                    <label for="mobiel" class="form-label">Mobiel</label>
                    <input type="tel" name="mobiel" id="mobiel" class="form-control" value="<?= $data['zangeressen']->Mobiel; ?>">
                </div>
                <div class="mb-3">
                    <label for="leeftijd" class="form-label">Leeftijd</label>
                    <input type="number" name="leeftijd" id="leeftijd" class="form-control" value="<?= $data['zangeressen']->Leeftijd; ?>">
                </div>

                <input type="hidden" name="id" value="<?= $data['zangeressen']->Id; ?>">

                <div class="d-grid mt-5 mb-5">
                    <button type="submit" class="btn btn-warning btn-lg">Verstuur</button>
                </div>
            </form>
            <a href="<?= URLROOT; ?>/homepages/index">terug</a>
        </div>
        <div class="col-3"></div>

</div>

<?php require_once APPROOT . '/views/includes/footer.php'; ?>