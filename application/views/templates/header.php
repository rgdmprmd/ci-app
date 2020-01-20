<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/fontawesome5/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/gijgo.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/style.css">
    <title><?= $title; ?></title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url(); ?>">Codeignitees</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link" href="<?= base_url(); ?>">Home</a>
                    <a class="nav-item nav-link" href="<?= base_url(); ?>inventory">Inventory</a>
                    <a class="nav-item nav-link" href="<?= base_url(); ?>transaksi/order">Order</a>
                    <a class="nav-item nav-link" href="<?= base_url(); ?>transaksi">Transaksi</a>
                </div>
            </div>
        </div>
    </nav>