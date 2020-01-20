<div class="container">

    <!-- Tombol tambah data transaksi -->
    <div class="row mt-3 mb-3">
        <div class="col-lg-5">
            <a href="<?= base_url(); ?>inventory" class="btn btn-primary">Transaksi Baru</a>
            <button class="btn btn-secondary ml-2" type="button" id="sortby" data-toggle="modal" data-target="#exampleModal">Lihat Transaksi</button>
            <!-- Button trigger modal Tambah -->
        </div>
    </div>

    <!-- Sweetalert -->
    <div class="sweettrans" data-sweettrans="<?= $this->session->flashdata('sweettrans'); ?>"></div>
    <div class="transaksi" data-transaksi="<?= $count; ?>"></div>

    <!-- Tabel informasi keuangan -->
    <div class="row">
        <div class="col-lg-12">
            <h3>Daftar Transaksi</h3>


            <div class="d-flex justify-content-between mt-3">
                <div class="">
                    <h6 class="h6">Tanggal&nbsp;&nbsp;:&nbsp; <?= $date; ?></h6>
                </div>
                <div class="">
                    <h6 class="h6">Transaksi&nbsp;&nbsp;:&nbsp; <?= $count; ?></h6>
                </div>
                <div class="">
                    <h6 class="h6">Total Proft&nbsp;&nbsp;:&nbsp; Rp. <?= number_format($profit, 0, ',', '.'); ?></h6>
                </div>
                <div class="">
                    <h6 class="h6">Total Omset&nbsp;&nbsp;:&nbsp; Rp. <?= number_format($omset, 0, ',', '.'); ?></h6>
                </div>
            </div>

            <table class="table table-hover mt-2">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Opsi</th>
                        <th scope="col">Transaksi</th>
                        <th scope="col">Date Created</th>
                        <th scope="col" class="text-right">Qty</th>
                        <th scope="col" class="text-right">Harga Satuan</th>
                        <th scope="col" class="text-right">Pemasukan</th>
                        <th scope="col" class="text-right">Profit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($transaksi as $tr) : ?>
                        <tr>
                            <th scope="col"><?= ++$start; ?></th>
                            <td>
                                <a href="<?= base_url(); ?>transaksi/detail/<?= $tr['idOrder']; ?>" class="badge badge-primary p-2">detail</a>
                                <a href="<?= base_url(); ?>transaksi/deletetransaksi/<?= $tr['idOrder']; ?>" class="badge badge-danger p-2 tombolHapus">hapus</a>
                            </td>
                            <td><?= $tr['namaBarang']; ?></td>
                            <td><?= $tr['dateCreated']; ?></td>
                            <td class="text-right"><?= $tr['qtyOrder']; ?></td>
                            <td class="text-right"><?= $tr['hargaJual']; ?></td>
                            <td class="text-right"><?= number_format($tr['totalHarga'], 0, ',', '.'); ?></td>
                            <th class="text-right text-success"><?= number_format($tr['profitPertransaksi'], 0, ',', '.'); ?></th>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <span><?= $this->pagination->create_links(); ?></span>
        </div>
    </div>

</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Lihat Transaksi Berdasarkan Tanggal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="<?= base_url(); ?>transaksi/lihatTransaksi">
                <div class="modal-body">
                    <div class="row mx-auto">
                        <div class="col-lg-1"></div>
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label for="datepicker">Dari tanggal</label>
                                <input type="text" width="276" class="form-control" id="datepicker" name="startDate" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="form-group end-date">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Lihat Transaksi</button>
                </div>
            </form>
        </div>
    </div>
</div>