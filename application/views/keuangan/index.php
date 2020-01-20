<div class="container">

    <!-- Tombol tambah data transaksi -->
    <div class="row mt-3">
        <div class="col-lg-6">
            <!-- Button trigger modal Tambah -->
            <button type="button" class="btn btn-primary mb-3 tombolTambahData" data-toggle="modal" data-target="#formModal">
                Transaksi Baru
            </button>
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>

    <!-- Tabel informasi keuangan -->
    <div class="row mt-3">
        <div class="col-lg-12 mb-3">
            <h3>Daftar Transaksi</h3>
            <p class="float-left">Merchant : <?= $profil['namaMerchant']; ?></p>
            <p class="float-right">Balance : Rp. <?= number_format($saldo['saldoMerchant'], 0, ',', '.'); ?></p>

            <table class="table table-striped mt-3">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Opsi</th>
                        <th scope="col">Transaksi</th>
                        <th scope="col" class="text-right">Date Created</th>
                        <th scope="col" class="text-right">Date Modified</th>
                        <th scope="col" class="text-right">Pemasukan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($transaksi as $tr) : ?>
                        <tr>
                            <th scope="col"><?= $i++; ?></th>
                            <td>
                                <a href="<?= base_url(); ?>transaksi/ubah/<?= $tr['idOrder']; ?>" class="badge badge-success tombolUbah" data-toggle="modal" data-target="#formModal" data-id="<?= $tr['idOrder']; ?>">ubah</a>
                                <a href="<?= base_url(); ?>transaksi/hapus/<?= $tr['idOrder']; ?>" class="badge badge-danger">hapus</a>
                            </td>
                            <td><?= $tr['namaBarang']; ?></td>
                            <td class="text-right"><?= $tr['dateCreated']; ?></td>
                            <td class="text-right"><?= $tr['dateModified']; ?></td>
                            <td class="text-right"><?= number_format($tr['totalHarga'], 0, ',', '.'); ?></td>
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
                <h5 class="modal-title" id="judulModal">Tambah Data Transaksi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url(); ?>keuangan/tambah" class="formActive" method="POST">
                <input type="hidden" name="idTransaksi" id="idTransaksi">
                <input type="hidden" name="idMerchant" id="idMerchant" value="1">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="jenisTransaksi">Transaksi</label>
                        <input type="text" class="form-control" id="jenisTransaksi" name="jenisTransaksi" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="tanggalTransaksi">Tanggal</label>
                        <input type="date" class="form-control" id="tanggalTransaksi" name="tanggalTransaksi" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="pengeluaran">Pengeluaran</label>
                        <input type="number" class="form-control" id="pengeluaran" name="pengeluaran" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="pemasukan">Pemasukan</label>
                        <input type="number" class="form-control" id="pemasukan" name="pemasukan" autocomplete="off">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="submitData">Tambah Transaksi</button>
                </div>
            </form>
        </div>
    </div>
</div>