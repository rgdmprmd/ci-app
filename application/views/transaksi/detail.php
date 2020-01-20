<div class="container">
    <div class="row mt-3">
        <div class="col-lg-12 mx-auto">
            <div class="card">
                <h5 class="card-header">Detail Transaksi</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="namaBarang">Nama Barang</label>
                                <input type="text" class="form-control" id="namaBarang" name="namaBarang" readonly value="<?= $transaksi['namaBarang']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="qtyOrder">Quantity</label>
                                <input type="text" class="form-control" id="qtyOrder" name="qtyOrder" readonly value="<?= $transaksi['qtyOrder']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="stokBarang">Stok Barang</label>
                                <input type="text" class="form-control" id="stokBarang" name="stokBarang" readonly value="<?= $transaksi['stokBarang']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="hargaJual">Harga Jual</label>
                                <input type="text" class="form-control" id="hargaJual" name="hargaJual" readonly value="<?= number_format($transaksi['hargaJual'], 0, ',', '.'); ?>">
                            </div>
                            <div class="form-group">
                                <label for="hargaBeli">Harga Beli</label>
                                <input type="text" class="form-control" id="hargaBeli" name="hargaBeli" readonly value="<?= number_format($transaksi['hargaBeli'], 0, ',', '.'); ?>">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="totalHarga">Total Harga</label>
                                <input type="text" class="form-control" id="totalHarga" name="totalHarga" readonly value="<?= number_format($transaksi['totalHarga'], 0, ',', '.'); ?>">
                            </div>
                            <div class="form-group">
                                <label for="profitPertransaksi">Profit</label>
                                <input type="text" class="form-control" id="profitPertransaksi" name="profitPertransaksi" readonly value="<?= number_format($transaksi['profitPertransaksi'], 0, ',', '.'); ?>">
                            </div>
                            <div class="form-group">
                                <label for="dateCreated">Date Created</label>
                                <input type="text" class="form-control" id="dateCreated" name="dateCreated" readonly value="<?= $transaksi['dateCreated']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="dateModified">Date Modified</label>
                                <input type="text" class="form-control" id="dateModified" name="dateModified" readonly value="<?= $transaksi['dateModified']; ?>">
                            </div>
                            <div class="form-group mt-5">
                                <a href="<?= base_url(); ?>transaksi" class="btn btn-secondary mr-2">Kembali</a>
                                <a href="<?= base_url(); ?>inventory/detail/<?= $transaksi['idProduk']; ?>" class=" btn btn-success">Detail Produk</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>