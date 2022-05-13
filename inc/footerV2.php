<footer class="py-4 bg-success border-top-danger-5">
    <div class="container">
        <div class="row px-0 px-md-4">
            <div class="col-lg-4 mb-4 mb-lg-0">
                <h5 class="text-light border-bottom-3 pb-2 mb-4">Tentang Kami</h5>
                <div class="text-light">
                    <?= $deskripsiFooter ?>
                </div>
            </div>
            <div class="col-lg-4 mb-4 mb-lg-0">
                <h5 class="text-light border-bottom-3 pb-2 mb-4">Kontak Kami</h5>

                <div class="text-light">
                    <?= $alamatFooter ?>
                </div>

                <hr />

                <h5 class="text-light border-bottom-3 pb-2">Ubah Bahasa Ke</h5>

                <div id="google_translate_element"></div>

                <!-- <div class="d-grid gap-2">
                    <a target="_blank" href="https://api.whatsapp.com/send?phone=<?= whatsApp($nomorWhatsApp1); ?>&text=Hallo%20<?= $namaweb ?>..." class="btn btn-block btn-success text-start shadow">
                        <i class="fab fa-whatsapp fa-lg"> <?= $nomorWhatsApp1 ?></i>
                    </a>

                    <a target="_blank" href="https://api.whatsapp.com/send?phone=<?= whatsApp($nomorWhatsApp2); ?>&text=Hallo%20<?= $namaweb ?>..." class="btn btn-block btn-success text-start shadow">
                        <i class="fab fa-whatsapp fa-lg"> <?= $nomorWhatsApp2 ?></i>
                    </a>
                </div> -->

                <!-- <div class="d-block gap-3 mt-2">
                    <a target="_blank" href="<?= $linkFacebook ?>" class="btn btn-block btn-success text-start shadow">
                        <i class="fab fa-facebook fa-lg"></i>
                    </a>

                    <a href="mailto:<?= $email ?>" class="btn btn-block btn-success text-start shadow">
                        <i class="fas fa-envelope fa-lg"></i>
                    </a>
                </div> -->
            </div>
            <div class="col-lg-4 mb-4 mb-lg-0">
                <h5 class="text-light border-bottom-3 pb-2 mb-4">Maps</h5>
                <div class="text-light">
                    <?= $googleMaps ?>
                </div>
            </div>
        </div>
    </div>
</footer>
<footer class="py-3 bg-danger">
    <div class="container">
        <div class="row px-0 px-md-4 justify-content-between">
            <div class="col-12 text-center pt-2">
                <small class="text-light">Copyright &copy; <?= $namaweb; ?> 2021-<?= date("Y") ?>. All right reserved.</small>
            </div>
        </div>
    </div>
</footer>