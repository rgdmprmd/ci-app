<div class="container mt-3">


    <!-- Tombol tambah data transaksi -->
    <div class="row mt-3">
        <div class="col-lg-6" id="tombolOrder" data-order="<?= $count; ?>">
            <!-- Button trigger modal Tambah digenerate melalui JS -->
        </div>
    </div>

    <!-- Sweetalert -->
    <div class="sweettrans" data-sweettrans="<?= $this->session->flashdata('sweettrans'); ?>"></div>

    <!-- Menampilkan list inventory -->
    <div class="row mt-4">
        <div class="col-lg-12">
            <h3>Daftar Order Barang</h3>

            <!-- Jumlah order total order -->
            <div class="row mt-3">
                <div class="col-lg-6">
                    <h6 class="float-left">Jumlah order : <?= $count; ?></h6>
                    <h6 class="float-left ml-4 mb-2">Total order : <?= number_format($sum, 0, ',', '.'); ?></h6>
                </div>
            </div>

            <!-- Table order -->
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col" class="text-center">Opsi</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Date</th>
                        <th scope="col" class="text-right">Stok</th>
                        <th scope="col" class="text-right">Qty</th>
                        <th scope="col" class="text-right">Harga Satuan</th>
                        <th scope="col" class="text-right">Total Belanja</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $i = 1;
                    foreach ($order as $ord) : ?>
                        <tr>
                            <th scope="col"><?= $i++; ?></th>
                            <td class="text-center">
                                <a href="<?= base_url(); ?>transaksi/ubah/<?= $ord['idOrder']; ?>" class="badge badge-success p-2">Edit</a>
                                <a href="<?= base_url(); ?>transaksi/delete/<?= $ord['idOrder']; ?>" class="badge badge-danger p-2 tombolHapus">Delete</a>
                            </td>
                            <td><?= $ord['namaBarang']; ?></td>
                            <td><?= $ord['dateCreated']; ?></td>
                            <td class="text-right"><?= $ord['stokBarang']; ?></td>
                            <td class="text-right"><?= $ord['qtyOrder']; ?></td>
                            <td class="text-right"><?= number_format($ord['hargaJual'], 0, ',', '.'); ?></td>
                            <th class="text-right text-success"><?= number_format($ord['totalHarga'], 0, ',', '.'); ?></th>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulModal">Proses Order</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url(); ?>transaksi/proses" class="formActive" method="POST">
                <input type="hidden" name="status" id="status" value="0">
                <input type="hidden" name="idProduk" id="idProduk" value="0">
                <div class="modal-body">
                    <div class="row">
                        <div class="col lg-6">
                            <div class="form-group">
                                <label for="uang-diterima">Uang Diterima</label>
                                <input type="text" class="form-control" id="uang-diterima" name="uang-diterima" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="kembalian">Kembalian</label>
                                <input type="text" class="form-control" id="kembalian" name="kembalian" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="total-belanja">Total Belanja</label>
                                <input type="text" class="form-control" id="total-belanja" name="total-belanja" value="<?= $sum; ?>" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="submitData">Proses Order</button>
                </div>
            </form>
        </div>
    </div>
</div>