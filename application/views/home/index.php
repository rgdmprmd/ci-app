<div class="jumbotron">
    <div class="container">
        <!-- $nama adalah instansiasi dari $data['nama'] -->
        <h1 class="display-4">Hello, <?= $nama; ?>!</h1>
        <p class="lead">Halaman ini digenerate melalui method index dari controller home.</p>
        <hr class="my-4">
        <p>Ingin cek data inventory kamu? langsung aja klik tombol biru yang ada di bawah!</p>
        <a href="#" class="btn btn-secondary btn-lg" onclick="return Swal.fire('Hi!', 'Thank you for clicked me!', 'success')">Try Me Please</a>
        <a class="btn btn-primary btn-lg" href="<?= base_url(); ?>inventory" role="button">Inventory</a>
    </div>
</div>