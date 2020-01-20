<div class="container mt-3">

    <div class="flashdata" data-sweetflash="<?= $this->session->flashdata('sweetflash'); ?>"></div>
    <div class="flashorder" data-flashorder="<?= $this->session->flashdata('flashorder'); ?>"></div>
    <div class="flashorderfail" data-flashorderfail="<?= $this->session->flashdata('flashorderfail'); ?>"></div>

    <!-- Menampilkan flash message untuk sweetflash -->

    <!-- Tombol tambah data -->
    <div class="row">
        <div class="col-lg-6">
            <?= $this->session->flashdata('message'); ?>
            <a href="<?= base_url(); ?>inventory/tambah" class="btn btn-primary">Tambah Data Produk</a>
        </div>
    </div>

    <!-- Form cari barang -->
    <div class="row mt-3">
        <div class="col-lg-6">
            <form method="POST" action="">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari barang" name="keyword" autocomplete="off" autofocus>
                    <div class="input-group-append">
                        <input class="btn btn-primary" type="submit" name="submit">
                    </div>
                </div>
            </form>
            <h6 class="form-text text-grey">Result : <?= $total_rows; ?></h6>
        </div>
    </div>

    <!-- Menampilkan list inventory -->
    <div class="row mt-3">
        <div class="col-lg-12">
            <h3>Daftar Inventory Barang</h3>


            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col" class="text-center">Opsi</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col" class="text-right">Stok</th>
                        <th scope="col" class="text-right">Terjual</th>
                        <th scope="col" class="text-right">Harga Beli</th>
                        <th scope="col" class="text-right">Harga Jual</th>
                        <th scope="col" class="text-right">Profit</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Jika data yang dicari tidak ada, tampilkan ini -->
                    <?php if (empty($inventory)) : ?>
                        <tr>
                            <td colspan="8">
                                <div class="alert alert-danger" role="alert">Data barang tidak ditemukan</div>
                            </td>
                        </tr>
                    <?php endif; ?>

                    <!-- $inventory adalah instansiasi dari $data['inventory'] -->
                    <?php foreach ($inventory as $inv) : ?>
                        <tr>
                            <th scope="row"><?= ++$start; ?></th>
                            <td class="text-center">
                                <a href="<?= base_url(); ?>inventory/order/<?= $inv['idProduk']; ?>" class="badge badge-primary p-2 tombolOrder" data-toggle="modal" data-target="#formModal" data-id="<?= $inv['idProduk']; ?>">Order</a>
                                <a href="<?= base_url(); ?>inventory/ubah/<?= $inv['idProduk']; ?>" class="badge badge-success p-2">Edit</a>
                                <a href="<?= base_url(); ?>inventory/hapus/<?= $inv['idProduk']; ?>" class="badge badge-danger p-2 tombolHapus">Hapus</a>
                            </td>
                            <td><?= $inv['namaProduk'] . ' ' . $inv['labelProduk']; ?></td>
                            <td class="text-right"><?= $inv['stokProduk']; ?></td>
                            <td class="text-right"><?= $inv['terjualProduk']; ?></td>
                            <td class="text-right"><?= $inv['hargaBeli']; ?></td>
                            <td class="text-right"><?= $inv['hargaJual']; ?></td>
                            <td class="text-right"><?= $inv['profitProduk']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <span><?= $this->pagination->create_links(); ?></span>
        </div>
    </div>
</div>


<!-- Modal Tambah -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulModal">Tambah Data Order</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url(); ?>inventory/order" class="formActive" method="POST">
                <input type="hidden" name="idProduk" id="idProduk">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="produk">Produk</label>
                        <input type="text" class="form-control" id="produk" name="produk" autocomplete="off" readonly>
                    </div>
                    <div class="form-group">
                        <label for="stoky">Stok</label>
                        <input type="number" class="form-control" id="stoky" name="stoky" autocomplete="off" readonly>
                    </div>
                    <div class="form-group">
                        <label for="qty">Quantity</label>
                        <input type="number" class="form-control" id="qty" name="qty" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="date">Date</label>
                        <input type="text" class="form-control" id="date" name="date" value="<?= date('Y-m-d'); ?>" readonly>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="submitData">Tambah Order</button>
                </div>
            </form>
        </div>
    </div>
</div>