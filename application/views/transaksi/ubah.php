<div class="container">
    <div class="row mt-5">
        <div class="col-lg-10 mx-auto">

            <div class="card">
                <div class="card-header mb-3">
                    <h5 class="h5 text-center mb-0">
                        Edit Transaksi
                    </h5>
                </div>

                <div class="card-body">
                    <form method="POST" action="<?= base_url(); ?>transaksi/ubah/<?= $transaksi['idOrder']; ?>">
                        <input type="hidden" id="idOrder" name="idOrder" value="<?= $transaksi['idOrder']; ?>">
                        <input type="hidden" id="idProduk" name="idProduk" value="<?= $transaksi['idProduk']; ?>">
                        <input type="hidden" id="idMerchant" name="idMerchant" value="<?= $transaksi['idMerchant']; ?>">
                        <input type="hidden" id="hargaBeli" name="hargaBeli" value="<?= $transaksi['hargaBeli']; ?>">
                        <input type="hidden" id="dateModified" name="dateModified" value="<?= date('Y-m-d'); ?>">

                        <div class="row mx-auto">
                            <div class="col-lg-1"></div>
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label for="namaBarang">Nama Barang</label>
                                    <input type="text" class="form-control" id="namaBarang" name="namaBarang" readonly value="<?= $transaksi['namaBarang']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="stokBarang">Stok Barang</label>
                                    <input type="text" class="form-control" id="stokBarang" name="stokBarang" readonly value="<?= $produk['stokProduk']; ?>">
                                    <input type="hidden" class="form-control" id="stokAsli" name="stokAsli" value="<?= $produk['stokProduk']; ?>">
                                    <input type="hidden" class="form-control" id="terjualAsli" name="terjualAsli" value="<?= $produk['terjualProduk']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="hargaJual">Harga Satuan</label>
                                    <input type="text" class="form-control" id="hargaJual" name="hargaJual" readonly value="<?= $transaksi['hargaJual']; ?>">
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label for="dateCreated">Date Created</label>
                                    <input type="text" class="form-control" id="dateCreated" name="dateCreated" readonly value="<?= $transaksi['dateCreated']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="qtyOrder">Quantity</label>
                                    <input type="number" class="form-control" id="qtyOrder" name="qtyOrder" value="<?= $transaksi['qtyOrder']; ?>">
                                    <small class="form-text text-danger"><?= form_error('namaProduk'); ?></small>
                                </div>
                                <div class="form-group">
                                    <label for="totalHarga">Total Harga</label>
                                    <input type="text" class="form-control" id="totalHarga" name="totalHarga" readonly value="<?= $transaksi['totalHarga']; ?>">
                                </div>
                                <div class="form-group float-right mt-2">
                                    <a href="<?= base_url(); ?>transaksi/order" class="btn btn-secondary px-3">Kembali</a>
                                    <button type="submit" name="submit" class="btn btn-primary px-3 ml-2">Edit Transaksi</button>
                                </div>
                            </div>
                        </div>






                    </form>
                </div>
            </div>
        </div>
    </div>
</div>