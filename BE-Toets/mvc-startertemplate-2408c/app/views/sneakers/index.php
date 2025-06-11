<?php require   APPROOT . '/views/includes/header.php'; ?>

<div class="container mt-3">

    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">        
            <h3><?= $data['title']; ?></h3>
        </div>
        <div class="col-1"></div>
    </div>

    <div class="row" style="display:<?= $data['message']; ?>">
        <div class="col-1"></div>
        <div class="col-10 text-begin text-primary">        
            <div class="alert alert-success" role="alert">
                Record is verwijderd
            </div>
        </div>
        <div class="col-1"></div>
    </div>

    <div class="row mt-3 mb-3">

        <div class="col-1"></div>
        <div class="col-10 text-begin text-danger">        
            <a href="<?= URLROOT; ?>/sneakers/create" class="btn btn-warning" role="button">Nieuwe sneakers</a>
        </div>
        <div class="col-1"></div>
    </div>
    <!-- begin tabel -->
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Merk</th>
                        <th>Model</th>
                        <th>Type</th>
                        <th>Prijs</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data['sneakers'] as $sneaker) : ?>
                        <tr>
                            <td><?= $sneaker->Merk; ?></td>
                            <td><?= $sneaker->Model; ?></td>
                            <td><?= $sneaker->Type; ?></td>
                            <td><?= $sneaker->Prijs; ?></td>
                            <td>
                                <a href="<?= URLROOT; ?>/sneakers/delete/<?= $sneaker->Id; ?>">
                                    <i class="bi bi-trash3-fill text-danger"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <a href="<?= URLROOT; ?>/homepages/index"><i class="bi bi-arrow-left"></i></a>
        </div>
        <div class="col-1"></div>
    </div>
    <!-- eind tabel -->

<?php require   APPROOT . '/views/includes/footer.php'; ?>