<div class="container">
    <div class="row mt-3">
        <div class="col-lg-6 mx-auto">

            <h3 class="card-title"><?= $inventory['namaProduk']; ?> <?= $inventory['labelProduk']; ?></h3>

            <ul class="list-group mt-3">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Stok Barang
                    <span class="p-2"><?= $inventory['stokProduk']; ?></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Barang Terjual
                    <span class="p-2"><?= $inventory['terjualProduk']; ?></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Harga Beli
                    <span class="p-2"><?= number_format($inventory['hargaBeli'], 0, ',', '.'); ?></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Harga Jual
                    <span class="p-2"><?= number_format($inventory['hargaJual'], 0, ',', '.'); ?></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Profit
                    <span class="p-2"><?= number_format($inventory['profitProduk'], 0, ',', '.'); ?></span>
                </li>
            </ul>
            <a href="<?= base_url(); ?>inventory" class="btn btn-secondary mt-3 float-right">Kembali</a>
            <a href="<?= base_url(); ?>inventory/ubah/<?= $inventory['idProduk']; ?>" class="btn btn-success mt-3 mr-2 float-right">Edit Barang</a>

        </div>
    </div>
</div>