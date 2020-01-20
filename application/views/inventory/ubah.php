<div class="container">
    <div class="row">
        <div class="col-lg-10 mx-auto">

            <div class="card mt-5">
                <div class="card-header mb-3">
                    <h5 class="h5 text-center mb-0">
                        Form Ubah Data Produk
                    </h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="">
                        <input type="hidden" name="idProduk" value="<?= $inventory['idProduk']; ?>">
                        <input type="hidden" name="profitProduk" value="<?= $inventory['profitProduk']; ?>">
                        <div class="row mx-auto">
                            <div class="col-lg-1"></div>
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label for="namaProduk">Merk barang</label>
                                    <input type="text" class="form-control" id="namaProduk" name="namaProduk" value="<?= $inventory['namaProduk']; ?>" autocomplete="off">
                                    <small class="form-text text-danger"><?= form_error('namaProduk'); ?></small>
                                </div>
                                <div class="form-group">
                                    <label for="stokProduk">Stok barang</label>
                                    <input type="number" class="form-control" id="stokProduk" name="stokProduk" value="<?= $inventory['stokProduk']; ?>">
                                    <small class="form-text text-danger"><?= form_error('stokProduk'); ?></small>
                                </div>
                                <div class="form-group">
                                    <label for="hargaBeli">Harga beli</label>
                                    <input type="number" class="form-control" id="hargaBeli" name="hargaBeli" value="<?= $inventory['hargaBeli']; ?>">
                                    <small class="form-text text-danger"><?= form_error('hargaBeli'); ?></small>
                                </div>

                            </div>
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label for="labelProduk">Varian barang</label>
                                    <input type="text" class="form-control" id="labelProduk" name="labelProduk" value="<?= $inventory['labelProduk']; ?>" autocomplete="off">
                                    <small class="form-text text-danger"><?= form_error('labelProduk'); ?></small>
                                </div>
                                <div class="form-group">
                                    <label for="terjualProduk">Barang terjual</label>
                                    <input type="number" class="form-control" id="terjualProduk" name="terjualProduk" value="<?= $inventory['terjualProduk']; ?>">
                                    <small class="form-text text-danger"><?= form_error('terjualProduk'); ?></small>
                                </div>
                                <div class="form-group">
                                    <label for="hargaJual">Harga jual</label>
                                    <input type="number" class="form-control" id="hargaJual" name="hargaJual" value="<?= $inventory['hargaJual']; ?>">
                                    <small class="form-text text-danger"><?= form_error('hargaJual'); ?></small>
                                </div>
                                <button type="submit" class="btn btn-primary float-right mt-2 px-3">Update</button>
                                <a href="<?= base_url(); ?>inventory" class="btn btn-secondary float-right mt-2 px-3 mr-2">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>