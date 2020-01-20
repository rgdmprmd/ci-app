$(function () {

    // Tombol tambah data
    $('.tombolTambahData').on('click', function () {
        $('#judulModal').html('Tambah Data Product');
        $('#submitData').html('Tambah Data');

        $('#jenisTransaksi').val('');
        $('#tanggalTransaksi').val('');
        $('#pengeluaran').val('');
        $('#pemasukan').val('');
    });

    // Tombol ubah
    $('.tombolUbah').on('click', function () {
        $('#judulModal').html('Ubah Data Product');
        $('#submitData').html('Ubah Data');

        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost:8080/ci-app/keuangan/getUbah',
            data: { idJson: id },
            method: 'POST',
            dataType: 'json',
            success: function (data) {

                $('#jenisTransaksi').val(data.jenisTransaksi);
                $('#tanggalTransaksi').val(data.tanggalTransaksi);
                $('#pengeluaran').val(data.pengeluaran);
                $('#pemasukan').val(data.pemasukan);

            }

        });

    });

    // Tombol order
    $('.tombolOrder').on('click', function () {
        $('#judulModal').html('Detail Order');
        $('#submitData').html('Order');

        // Get idProduk
        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost:8080/ci-app/inventory/getOrder',
            data: { idJson: id },
            method: 'POST',
            dataType: 'json',
            success: function (data) {
                // Setelah id produk dikirimkan dengan method post melalui idJson
                // id produk akan ditangkap oleh controller getOrder, dan akan mengembalikan data produk berdasarkan id
                $('#idProduk').val(data.idProduk);
                $('#produk').val(data.namaProduk + ' ' + data.labelProduk);
                $('#stoky').val(data.stokProduk);
                $('#qty').attr('max', data.stokProduk);

                $('#qty').keyup(function () {
                    let qty = parseInt($('#qty').val());

                    if (qty > data.stokProduk) {
                        $('#qty').val(data.stokProduk);
                    } else {
                        qty;
                    }
                })

            }
        });

    });

    $('#uang-diterima').autoNumeric('init', { aPad: false, vMin: '0.00' });
    $('#total-belanja').autoNumeric('init', { aPad: false, vMin: '0.00' });
    $('#kembalian').autoNumeric('init', { aPad: false, vMin: '-999999999999999.99' });

    $('#uang-diterima').keyup(function () {
        let bayar = parseInt($('#uang-diterima').autoNumeric('get'));
        let total = parseInt($('#total-belanja').autoNumeric('get'));
        let kembalian = bayar - total;

        $('#kembalian').autoNumeric('set', kembalian);
    });

    $('#qtyOrder').on('change', function () {

        let qty = parseInt($('#qtyOrder').val());
        let stokAsli = parseInt($('#stokAsli').val());

        if (isNaN(qty)) {
            $('#stokBarang').val(stokAsli);
        } else {
            if (qty > stokAsli) {
                $('#qtyOrder').val(stokAsli)
                qty = stokAsli;
            } else {
                qty;
            }

            let hargaJual = parseInt($('#hargaJual').val());
            let total = qty * hargaJual;
            let stokBarang = stokAsli - qty;

            $('#totalHarga').val(total);
            $('#stokBarang').val(stokBarang);
        }
    });

    let cekOrder = $('#tombolOrder').data('order');
    let transaksi = $('.transaksi').data('transaksi');

    if (transaksi < 1) {
        Swal.fire({
            title: 'Transaksi kamu kosong!',
            html: 'Kamu bisa buat transaksi baru melalui halaman inventory atau klik tombol <span class="text-primary">Transaksi Baru</span>.',
            width: '600px',
            padding: '2em',
            icon: 'info'
        });
    }

    if (cekOrder < 1) {

        Swal.fire({
            title: 'Order kamu kosong!',
            html: 'Kamu bisa buat order baru melalui halaman inventory atau klik tombol <span class="text-primary">Tambah Order Baru</span>.',
            width: '600px',
            padding: '2em',
            icon: 'info'
        });

        $('#tombolOrder').html('<a href="http://localhost:8080/ci-app/inventory" title="Tambah order baru" class="btn btn-primary">Tambah Order Baru</a><a href="http://localhost:8080/ci-app/transaksi" title="Cek transaksi" class="btn btn-secondary ml-2">Cek Transaksi</a>');
    } else {
        $('#tombolOrder').html('<a href="" class="btn btn-primary tombolTambahData" title="Proses seluruh order" data-toggle="modal" data-target="#formModal">Proses Order</a><a href="http://localhost:8080/ci-app/transaksi/deleteAll" title="Tombol ini akan menghapus seluruh order" class="btn btn-secondary ml-2 tombolHapus">Batalkan Order</a>');
    }

    // let today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
    // $('#datepicker').datepicker({
    //     minDate: today
    // });

    let $startdate = $('#datepicker').datepicker({
        format: 'yyyy-mm-dd',
        uiLibrary: 'bootstrap4',
        iconsLibrary: 'fontawesome'
    });

    $('#datepicker').on('change', function () {
        $('.end-date').html(`<label for="datepicker">Sampai tanggal</label><input type="text" width="276" autocomplete="off" class="form-control" id="datepickers" name="endDate">`);
        $('#datepickers').datepicker({
            format: 'yyyy-mm-dd',
            minDate: $startdate.value(),
            uiLibrary: 'bootstrap4',
            iconsLibrary: 'fontawesome'
        });
    });

});