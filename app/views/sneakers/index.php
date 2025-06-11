<?php require_once APPROOT . '/views/includes/header.php'; ?>

<div class="container mt-3">

    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <h3><?= $data['title']; ?></h3>
        </div>
        <div class="col-1"></div>
    </div>

    <div class="row mt-3">
        <div class="col-1"></div>
        <div class="col-10">

            <a href="<?= URLROOT; ?>/sneakers/create" class="btn btn-warning mb-3">
                Nieuwe Sneaker
            </a>

            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Merk</th>
                        <th scope="col">Model</th>
                        <th scope="col">Type</th>
                        <th scope="col">Prijs (€)</th>
                        <th scope="col">Actie</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['sneakers'] as $sneaker) : ?>
                        <tr>
                            <td><?= htmlspecialchars($sneaker->Merk); ?></td>
                            <td><?= htmlspecialchars($sneaker->Model); ?></td>
                            <td><?= htmlspecialchars($sneaker->Type); ?></td>
                            <td>€<?= number_format($sneaker->Prijs, 2, ',', '.'); ?></td>
                            <td>
                                <a href="<?= URLROOT; ?>/sneakers/delete/<?= $sneaker->Id; ?>"
                                   class="btn btn-sm btn-danger"
                                   title="Verwijderen"
                                   onclick="return confirm('Weet je zeker dat je deze sneaker wilt verwijderen?')">
                                   <i class="bi bi-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <a href="<?= URLROOT; ?>/homepages/index" >
                <i class="bi bi-arrow-left"></i>
            </a>
        </div>
        <div class="col-1"></div>
    </div>
</div>

<?php require_once APPROOT . '/views/includes/footer.php'; ?>
