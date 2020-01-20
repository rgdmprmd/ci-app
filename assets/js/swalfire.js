const sweetflash = $('.flashdata').data('sweetflash');
const flashorder = $('.flashorder').data('flashorder');
const flashorderfail = $('.flashorderfail').data('flashorderfail');
const sweettrans = $('.sweettrans').data('sweettrans');

// Sweet alert untuk inventory
if (sweetflash) {
    Swal.fire({
        title: 'Data barang yang kamu mau',
        text: 'Berhasil ' + sweetflash,
        icon: 'success'
    });
}

// sweet alert untuk order
if (flashorder) {
    Swal.fire({
        title: 'Order Berhasil',
        html: 'Barang <i class="text-primary">' + flashorder + '</i> berhasil di order, silahkan cek halaman order.',
        icon: 'success'
    }).then((result) => {
        Swal.fire({
            title: 'Mau tambah order lagi?',
            text: "Jika tidak, kamu akan diarahkan ke halaman order.",
            width: '600px',
            padding: '2em',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, mau',
            cancelButtonText: 'Tidak, terima kasih'
        }).then((result) => {
            if (result.value) {

            } else {
                document.location.href = 'http://localhost:8080/ci-app/transaksi/order';
            }
        })
    })

}

if (flashorderfail) {
    // Sweet alert, untuk confirm yakin ingin dihapus
    Swal.fire({
        title: 'Oops, kamu sudah order barang ini!',
        html: "Barang <span class='text-primary'>" + flashorderfail + "</span> sudah pernah kamu order, mau cek?",
        width: 650,
        padding: '2em',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, cek order!',
        cancelButtonText: 'Tidak, terima kasih'
    }).then((result) => {
        // Jika tombol ya ditekan, maka redirect bedasarkan href tombol yang diklik
        if (result.value) {
            document.location.href = 'http://localhost:8080/ci-app/transaksi/order';
        }
    });
}

// sweet alert untuk transaksi
if (sweettrans) {
    Swal.fire({
        title: 'Data transaksi yang kamu mau',
        text: 'Berhasil ' + sweettrans,
        icon: 'success'
    });
}

// Sweet alert delete produk
$('.tombolHapus').on('click', function (e) {

    // Mematikan fungsi defaultnya, yaitu href
    e.preventDefault();

    // get href dari tombol hapus yang di klik
    const href = $(this).attr('href');

    // Sweet alert, untuk confirm yakin ingin dihapus
    Swal.fire({
        title: 'Apakah kamu yakin?',
        text: "Kamu tidak bisa mengembalikan data yang telah dihapus.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Hapus Data!'
    }).then((result) => {
        // Jika tombol ya ditekan, maka redirect bedasarkan href tombol yang diklik
        if (result.value) {
            document.location.href = href;
        }
    })
});
