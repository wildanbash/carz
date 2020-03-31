
    <!--== Page Title Area Start ==-->
    <section id="page-title-area" class="section-padding overlay" style="background-image: url('<?=base_url()?>assets/img/page-title.jpg')">
        <div class="container">
            <div class="row">
                <!-- Page Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">
                        <h2>List Mobil</h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
                        <p>Daftar List Mobil Perusahaan Carz</p>
                    </div>
                </div>
                <!-- Page Title End -->
            </div>
        </div>
    </section>
    <!--== Page Title Area End ==-->

    <!--== Car List Area Start ==-->
    <section id="car-list-area" class="section-padding">
        <div class="container">
            <div class="row">
                <!-- Car List Content Start -->
                <div class="col-lg-12">
                    <div class="car-list-content">
                        <div class="row">

                            <!-- Single Car Start -->
                            <?php for ($i=0; $i < count($mobil['data']); $i++) { ?>
                                <div class="col-lg-6 col-md-6">
                                    <div class="single-car-wrap">
                                        <div class="car-list-thumb">
                                            <img src="<?= $mobil['data'][$i]['gambar'] ?>" style="height: 320px; width: 540px">
                                        </div>
                                        <div class="car-list-info without-bar">
                                            <h2><a href="<?= base_url('customer/rental/detail_mobil/').$mobil['data'][$i]['id_mobil']?>"><?= $mobil['data'][$i]['merk'] ?></a></h2>
                                            <h5 style="color: #ae8b0c">Rp. <?= $mobil['data'][$i]['harga'] ?> / hari</h5>
                                            <?php if($mobil['data'][$i]['status'] == "Tersedia") { ?>
                                                <a href="<?= base_url('customer/rental/detail_mobil/').$mobil['data'][$i]['id_mobil'] ?>" class="btn btn-lg btn-dark text-white" style="cursor: pointer">Rental</a>
                                                <a href="<?= base_url('customer/rental/detail_mobil/').$mobil['data'][$i]['id_mobil'] ?>" class="btn btn-lg btn-dark text-white" style="cursor: pointer">Detail</a>
                                            <?php }else{ ?>
                                                <a class="btn btn-lg btn-danger text-white" style="cursor: unset">Disewa</a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <!-- Single Car End -->

                        </div>
                    </div>

                    <!-- Page Pagination Start -->
                    <!-- <div class="page-pagi">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                <li class="page-item"><a class="page-link" href="#">5</a></li>
                                <li class="page-item"><a class="page-link" href="#">Next</a></li>
                            </ul>
                        </nav>
                    </div> -->
                    <!-- Page Pagination End -->
                </div>
                <!-- Car List Content End -->
            </div>
        </div>
    </section>
    <!--== Car List Area End ==-->