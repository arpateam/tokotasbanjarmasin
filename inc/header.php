<header class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-sm-10 col-md-5 col-xl-4 text-center">
            <img src="assets/images/<?= $logoVersiDesktop ?>" alt="Logo <?= $namaweb; ?>" class="img-fluid">
        </div>
    </div>
</header>

<nav class="navbar sticky-top navbar-expand-md navbar-dark bg-success-navbar-dark shadow-sm py-1 py-md-3">
    <div class="container">
        <a class="navbar-brand d-block d-md-none" href="/">
          <img src="assets/images/<?= $logoVersiMobile ?>" alt="Logo <?= $namaweb; ?>" height="50">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        	<hr class="border-danger d-block d-md-none">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link p-2 p-md-2 mt-2 mt-md-0 <?php if ($_GET['module']==='home') { echo 'active'; } ?>" aria-current="page" href="/">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link p-2 p-md-2 mt-2 mt-md-0 position-relative" href="produk/">Produk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link p-2 p-md-2 mt-2 mt-md-0 <?php if ($_GET['module']==='testimoni') { echo 'active'; } ?>" href="testimoni">Testimoni</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link p-2 p-md-2 mt-2 mt-md-0 <?php if ($_GET['module']==='tanya-jawab') { echo 'active'; } ?>" href="faq">FAQ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link p-2 p-md-2 mt-2 mt-md-0 position-relative" href="promo/">Promo <i class="fas fa-tag"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link p-2 p-md-2 mt-2 mt-md-0 <?php if ($_GET['module']==='keranjang' OR $_GET['module']==='transaksi') { echo 'active'; } ?>" href="keranjang-saya">
                        <span class="d-inline d-md-none">Keranjang Saya </span>
                        <i class="fas fa-shopping-cart position-relative pe-3">
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"><?= $_SESSION['qty_FamillyFood'] ?></span>
                        </i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>